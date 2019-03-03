<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliWIP'); ?>"> Pembelian WIP </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['index']==1) ){
        ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku">                            
                            <div class="row">
                                <div class="col-md-5">
                                    No. Voucher <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_voucher" name="no_voucher" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly" value="Auto Generate">
                                    
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>                             
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('d-m-Y'); ?>">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Jenis Barang
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="jenis_barang" name="jenis_barang" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly" value="WIP">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    No. PO
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_po" name="no_po" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Tanggal PO
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="tanggal_po" name="tanggal_po" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly">                                                                       
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Supplier
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nama_supplier" name="nama_supplier" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        readonly="readonly"> 
                                    <input type="hidden" name="supplier_id" id="supplier_id">                                                                 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Total Nilai PO (Rp) <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input id="nilai_po" name="nilai_po" class="form-control myline" style="margin-bottom:5px" readonly="readonly" type="text">                                                                       
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Terbilang
                                </div>
                                <div class="col-md-7">
                                    <textarea id="terbilang" name="terbilang" class="form-control myline" style="margin-bottom: 5px;" readonly></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Total Voucher DP (Rp) <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input id="nilai_dp" name="nilai_dp" class="form-control myline" style="margin-bottom:5px" readonly="readonly" type="text"> 
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-5">
                                    Amount <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="amount" name="amount" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);">           
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Keterangan
                                </div>
                                <div class="col-md-7">
                                    <textarea id="keterangan" name="keterangan" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" rows="3"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="saveVoucher();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>       
        
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
                    <i class="fa fa-beer"></i>Purchase Order List
                </div>
                <div class="tools">
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/BeliWIP/po_list_outdated"> <i class="fa fa-minus"></i> PO LIST OUTDATED</a>
                <?php
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/BeliWIP/add').'"> '
                        .'<i class="fa fa-plus"></i> Input PO </a>';
                    }
                ?>                    
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. PO</th>
                    <th>Tanggal</th>
                    <th>Supplier</th> 
                    <th>Attention To</th>
                    <th>PPN</th> 
                    <th>Jumlah <br>Items</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Voucher<br>Pembayaran</th>
                    <th>Actions</th>
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
                        <td><?php echo $data->no_po; ?></td>
                        <?php
                        if(strtotime($data->tanggal) < strtotime('-2 MONTH')) {
                        ?>
                        <td style="background-color: red;"><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <?php
                        } else {
                        ?>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <?php
                        }
                        ?>
                        <td><?php echo $data->nama_supplier; ?></td>
                        <td><?php echo $data->pic; ?></td>
                        <td>
                        <?php 
                           echo (($data->ppn==1)? '<i class="fa fa-check"></i> Yes': '<i class="fa fa-times"></i> No');
                        ?>
                        </td>
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:center">
                            <?php 
                                if($data->status==0){ 
                                    echo '<div style="background-color:bisque; padding:4px">Draft</div>';
                                }else if($data->status==1){ 
                                    echo '<div style="background-color:green; color:white; padding:4px">Closed</div>';
                                }else if($data->status==2){ 
                                    echo '<div style="background-color:yellow; padding:4px;">Processing</div>';
                                }else if($data->status==3){
                                    echo '<div style="background-color:powderblue; padding:4px;">Waiting Voucher</div>';
                                }else if($data->status==4){
                                    echo '<div style="background-color:limegreen; padding:4px; font-weight: bold;">Sudah Dibayar</div>';
                                }
                            ?>
                        </td>
                        <td><?php echo $data->remarks; ?></td>
                        <td style="text-align:center">
                            <?php
                                if($data->tot_voucher>0){print('Ada <b>'.$data->tot_voucher.'</b> Voucher<br/>');}
                                if( ($group_id==1 || $hak_akses['create_voucher_dp']==1) && $data->flag_pelunasan==0 && $data->status==(2 || 3)){
                                    echo '<a class="btn btn-circle btn-xs green" href="javascript:;" onclick="createVoucher('.$data->id.');"
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil-square-o"></i> Create &nbsp; </a>';
                                }
                                if($data->status==4 || $data->status==1){
                                    echo '<small style="color:green"><i>Sudah Lunas</i></small>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php
                                if( ($group_id==1 || $hak_akses['edit']==1) && $data->status != 1 ){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/BeliWIP/edit/<?php echo $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php
                                }
                                if($group_id==1 || $hak_akses['print_po']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/BeliWIP/print_po/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                            <?php
                                }
                            ?>
                        </td>
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

function createVoucher(id){
    console.log(id);
    $.ajax({
        url: "<?php echo base_url('index.php/BeliWIP/create_voucher'); ?>",
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
            $('#amount').val(result['sisa']);
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
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/BeliWIP/save_voucher");
        $('#formku').submit(); 
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
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
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
    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         