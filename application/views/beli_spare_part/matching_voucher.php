<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance'); ?>"> Data Uang Masuk </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add_spb']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <form class="eventInsForm" method="post" target="_self" name="frmReject" 
                              id="frmReject">                            
                            <div class="row">
                                <div class="col-md-4">
                                    Reject Remarks <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="reject_remarks" name="reject_remarks" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" rows="3"></textarea>
                                    
                                    <input type="hidden" id="header_id" name="header_id">
                                </div>
                            </div>                           
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="rejectData();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Matching Voucher Sparepart <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pmb" name="no_pmb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_vk']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata['realname']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Supplier
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_supplier" name="nama_supplier" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['nama_supplier']; ?>">
                            <input type="hidden" id="supplier_id" name="supplier_id" value="<?= $header['supplier_id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['keterangan']; ?></textarea>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Status
                        </div>
                        <div class="col-md-8">
                        <?php if($header['status']==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px;">Waiting Approval</div>';
                                }else if($header['status']==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($header['status']==2){
                                    echo '<div style="background-color:blue; padding:3px; color:white">Dijalankan</div>';
                                }else if($header['status']==3){
                                    echo '<div style="background-color:orange; padding:3px; color:white">Butuh Revisi</div>';
                                }else if($header['status']==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                        ?>
                        </div>
                    </div>
                </div>
                <?php if($header['status']==3){ ?>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Reject Remarks
                        </div>
                        <div class="col-md-8">
                            <textarea id="reject_remarks" name="reject_remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['reject_remarks']; ?></textarea>                           
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <hr class="divider"/>
    <!-- VOUCHER -->
            <div class="row">
                <div class="col-md-12">
                    <h4 align="center" style="font-weight: bold;">Detail LPB Yang Ingin Dibayar</h4>
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">No LPB</th>
                                <th>No. PO</th>
                                <th>PPN</th>
                                <th>Currency</th>
                                <th>Amount</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                <tbody id="boxDetailLPB">

                                </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></i></td>
                                <td>
                                    <select id="lpb_id" name="lpb_id" class="form-control select2me myline"  style="margin-bottom:5px;" onchange="get_data_lpb(this.value);">
                                    </select>
                                </td>
                                <td><input type="text" id="no_po" name="no_po" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="ppn" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="currency_add" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="amount_lpb" name="amount_lpb" class="form-control myline" readonly="readonly"/></td>
                                <td><input type="text" id="keterangan_lpb" name="keterangan_lpb" class="form-control myline" readonly="readonly" onkeyup="this.value = this.value.toUpperCase()"></td>      
                                <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail_lpb();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr class="divider"/>
    <!-- BANK -->
            <div class="row">
                <div class="col-md-12">
                    <h4 align="center" style="font-weight: bold;">Detail Uang Keluar</h4>  
                    <div class="row">
                        <div class="col-md-3">
                            Nomor Kas/Bank Keluar
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="no_uk" name="no_uk" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" placeholder="Nomor Uang Keluar ...">   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Nominal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="nominal" name="nominal" class="form-control myline" style="margin-bottom:5px;" placeholder="Nominal" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Pilih Bank Tujuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-9">
                            <select id="bank_id" name="bank_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_currency(this.value);">
                                <option></option>
                                <?php
                                    foreach ($bank_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->kode_bank.' ('.$row->nomor_rekening.')'.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Currency <font color="#f00">*</font>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="currency" name="currency" class="form-control myline" style="margin-bottom:5px;" placeholder="Nominal" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Tanggal Jatuh Tempo<font color="#f00">*</font>
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="tanggal_jatuh" name="tanggal_jatuh" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;"
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-3">
                            Nomor Giro
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="nomor_giro" name="nomor_giro" 
                                class="form-control myline" style="margin-bottom:5px" placeholder="Nomor Giro ...">   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Catatan
                        </div>
                        <div class="col-md-9">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Create </a>
                    <a href="<?php echo base_url('index.php/BeliSparePart/voucher_list'); ?>" class="btn blue-hoki">
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
        </form>
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
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function simpanData(){
    if($.trim($("#no_uk").val()) == ""){
        $('#message').html("Nomor Uang Keluar harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#bank_id").val()) == ""){
        $('#message').html("Bank harus dipilih!");
        $('.alert-danger').show(); 
    }else if($.trim($("#nominal").val()) == ""){
        $('#message').html("Nominal tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/BeliSparePart/save_vk");  
        $('#formku').submit(); 
    };
};

function load_lpb(){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliSparePart/get_lpb_list'); ?>",
        type: "POST",
        data: "supplier_id="+$('#supplier_id').val(),
        dataType: "html",
        success: function(result) {
            $('#lpb_id').html(result);
        }
    })
}

function get_data_lpb(id){
    if(''!=id){
        $.ajax({
            url: "<?php echo base_url('index.php/BeliSparePart/get_data_lpb'); ?>",
            async: false,
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#no_po').val(result['no_po']);
                if(result['ppn']==1){
                    $('#ppn').val('PPN');
                }else{
                    $('#ppn').val('NON PPN');
                }
                $('#currency_add').val(result['currency']);
                $('#amount_lpb').val(numberWithCommas(result['amount']));
                $('#keterangan_lpb').val(result['remarks']);
            }
        });
    }
}

function loadDetail_lpb(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/BeliSparePart/load_detail_lpb'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetailLPB').html(result);
            $('#nominal').val($('#total_lpb').val());
        }
    });
}

function saveDetail_lpb(){
    if($.trim($("#lpb_id").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliSparePart/save_detail_vk'); ?>',
            data:{
                id:$('#id').val(),
                lpb_id:$('#lpb_id').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail_lpb(<?php echo $header['id'];?>);
                    $("#lpb_id").select2("val", "");
                    $("#no_po").val('');
                    $("#ppn").val('');
                    $("#currency_add").val('');
                    $("#amount_lpb").val('');
                    $("#keterangan_lpb").val('');
                    $('#message').html("");
                    $('.alert-danger').hide();
                    load_lpb();
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
    }
}

function hapusDetail_lpb(id){
    var r=confirm("Anda yakin menghapus item ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliSparePart/delete_detail_vk'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail_lpb(<?php echo $header['id'];?>);
                    load_lpb();
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
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
            }
        });
    }else{
        $('#currency').val('IDR');
    }
}
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

    $("#tanggal_jatuh").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    });

    loadDetail_lpb(<?php echo $header['id']; ?>);
    load_lpb();
});
</script>