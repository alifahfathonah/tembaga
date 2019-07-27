<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Stok Opname 
            <i class="fa fa-angle-right"></i>
            <a href="<?php echo base_url('index.php/StokOpname'); ?>"> Scan FG</a>
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['index']==1) ){
        
        ?>      
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Stok Opname (Ada data di gudang, tapi belum discan)
                </div>
                <div class="tools">
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?= base_url('index.php/StokOpname/print_check_stock/'.$tanggal) ?>" target="_blank">
                                    <i class="fa fa-print"></i> Print</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Tanggal</th>
                    <th>Nama Barang</th> 
                    <th>UOM</th>
                    <th>Bruto</th>
                    <th>Netto</th>
                    <th>Berat Bobbin</th>
                    <th>No. Packing</th>
                    <!-- <th>Actions</th> -->
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($list_data as $data){
                            $no++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->jenis_barang; ?></td>
                        <td><?php echo $data->uom; ?></td>
                        <td><?php echo number_format($data->bruto,2,'.',','); ?></td>
                        <td><?php echo number_format($data->netto,2,'.',','); ?></td>
                        <td><?php echo number_format($data->berat_bobbin,2,'.',','); ?></td>
                        <td><?php echo $data->no_packing; ?></td>
                        <!-- <td style="text-align:center"> 
                            <?php
                                if( ($group_id==1 || $hak_akses['edit']==1)){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/StokOpname/detail_fg/<?php echo $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php 
                                }
                                if( (($group_id==1)||($hak_akses['delete']==1))){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/BeliFinishGood/delete_po/<?php echo $data->id; ?>" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus po ini?');">
                                <i class="fa fa-trash-o"></i> Delete 
                            </a>                            
                            <?php 
                                }
                                if($group_id==1 || $hak_akses['view']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/StokOpname/view/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px"> &nbsp; <i class="fa fa-file"></i> View &nbsp; </a>
                            <?php
                                }
                            ?>
                        </td> -->
                    </tr>
                    <?php
                        }
                    ?>                                                                                    
                </tbody>
                </table>
            </div>
        </div>
        <?php
            }else{
        ?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span id="message">Anda tidak memiliki hak akses ke halaman ini!</span>
        </div>
        <?php
            }
        ?>
    </div>
</div> 
<script>
function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function get_currency(id){
    if(id > 0){
        $.ajax({
            url: "<?php echo base_url('index.php/Finance/get_currency'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                    $('#currency').val(result['currency']);
                if(result['currency']=='IDR'){
                    $('#kurs').val(1);
                    $('#show_kurs').hide();
                }else{
                    $('#show_kurs').show();
                    $('#kurs')
                }
            }
        });
    }else{
        $('#show_kurs').hide();
        $('#currency').val('IDR');
    }
}

function createVoucher(id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliFinishGood/create_voucher'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            //console.log(result);
            $('#no_po').val(result['no_po']);
            $('#tanggal_po').val(result['tanggal']);
            $('#nama_supplier').val(result['nama_supplier']);
            $('#supplier_id').val(result['supplier_id']);
            $('#amount').val('0');
            $('#nilai_po').val(result['nilai_po']);
            $('#terbilang').val(result['terbilang']);
            $('#nilai_dp').val(result['nilai_dp']);
            $('#nilai_ppn').val(result['nilai_ppn']);
            $('#nilai_before_ppn').val(result['nilai_before_ppn']);
            $('#currency_po').val(result['currency']);
            $('#amount').val(result['sisa']);
            $('#status_vc').val(result['status']);
            $('#keterangan').val('');
            $('#id').val(result['id']);
            
            $('#message').html("");
            $('.alert-danger').hide(); 
            
            $("#myModal").find('.modal-title').text('Create Voucher');
            $("#myModal").modal('show',{backdrop: 'true'});
        }
    });
}

function saveVoucher(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#amount").val()) == "" || $("#amount").val()=="0"){
        $('#message').html("Amount harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{    
        $('#message').html("");
        $('.alert-danger').hide();
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/BeliFinishGood/save_voucher");
        $('#formku').submit(); 
    };
};

function prosesVoucher(){
    if($.trim($("#no_uk").val()) == ""){
        $('#msg_voucher').html("Nomor Uang Keluar harus diisi, tidak boleh kosong!");
        $('#box_error_voucher').show(); 
    }else if($.trim($("#tanggal").val()) == ""){
        $('#msg_voucher').html("Tanggal harus diisi, tidak boleh kosong!");
        $('#box_error_voucher').show(); 
    }else if($.trim($("#amount").val()) == "" || $("#amount").val()=="0"){
        $('#msg_voucher').html("Amount harus diisi, tidak boleh kosong!");
        $('#box_error_voucher').show();
    }else if($.trim($("#bank_id").val()) == ""){
        $('#msg_voucher').html("Bank harus dipilih!");
        $('#box_error_voucher').show();
    }else{
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/BeliRongsok/get_no_uang_keluar'); ?>",
            data: {
                no_uk: $('#no_uk').val(),
                tanggal: $('#tanggal').val(),
                bank_id: $('#bank_id').val()
            },
            cache: false,
            success: function(result) {
                var res = result['type'];
                if(res=='duplicate'){
                    $('#msg_voucher').html("Nomor Uang Keluar sudah ada, tolong coba lagi!");
                    $('#box_error_voucher').show();
                }else{
                    $('#prosesVoucher').text('Please Wait ...').prop("onclick", null).off("click");
                    $('#msg_voucher').html("");
                    $('#box_error_voucher').hide();
                    $('#formku').attr("action", "<?php echo base_url(); ?>index.php/BeliFinishGood/save_voucher_pembayaran");
                    $('#formku').submit(); 
                }
            }
        });
    };
};

// function createVoucherPelunasan(id){
//     $.ajax({
//         url: "<?php echo base_url('index.php/BeliRongsok/create_voucher_pelunasan'); ?>",
//         type: "POST",
//         data : {id: id},
//         success: function (result){
//             //console.log(result);
//             $('#no_po_pelunasan').val(result['no_po']);
//             $('#tanggal_po_pelunasan').val(result['tanggal']);
//             $('#nama_supplier_pelunasan').val(result['nama_supplier']);
//             $('#nilai_po_pelunasan').val(result['nilai_po']);
//             $('#nilai_dp_pelunasan').val(result['nilai_dp']);
            
//             $('#amount_pelunasan').val(result['sisa']);
//             $('#keterangan_pelunasan').val('');
//             $('#id_pelunasan').val(result['id']);
            
//             $('#msg_pelunasan').html("");
//             $('#box_error_pelunasan').hide(); 
            
//             $("#myModalPelunasan").find('.modal-title').text('Create Voucher Pelunasan');
//             $("#myModalPelunasan").modal('show',{backdrop: 'true'});           
//         }
//     });
// }

// function prosesPelunasan(){
//     if($.trim($("#tanggal_pelunasan").val()) == ""){
//         $('#msg_pelunasan').html("Tanggal harus diisi, tidak boleh kosong!");
//         $('#box_error_pelunasan').show(); 
//     }else if($.trim($("#amount_pelunasan").val()) == "" || $("#amount_pelunasan").val()=="0"){
//         $('#msg_pelunasan').html("Amount harus diisi, tidak boleh kosong!");
//         $('#box_error_pelunasan').show();
//     }else{    
//         $('#msg_pelunasan').html("");
//         $('#box_error_pelunasan').hide();
//         $('#frm_pelunasan').attr("action", "<?php echo base_url(); ?>index.php/BeliRongsok/save_voucher_pelunasan");
//         $('#frm_pelunasan').submit(); 
//     };
// };
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){
    $('#show_kurs').hide();
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    }); 
    
    $("#tanggal_pelunasan").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    }); 

    $("#tanggal_jatuh").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    }); 
    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         