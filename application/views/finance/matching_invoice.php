<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/matching'); ?>"> Matching PO - DTR </a>
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['matching']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="frmDetail" 
                              id="frmDetail">
                            <input type="hidden" id="id_modal" name="id_modal">
                            <div class="row">
                                <div class="col-md-4">
                                    No. Uang Masuk<font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="no_um" name="no_um" class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                    <input type="hidden" id="um_id" name="um_id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Nominal
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nominal" name="nominal" class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Biaya 1
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="b_1" name="b_1" class="form-control myline" style="margin-bottom:5px" onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Keterangan 1
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="k_1" name="k_1" class="form-control myline" style="margin-bottom:5px" placeholder="Input Keterangan ...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Biaya 2
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="b_2" name="b_2" class="form-control myline" style="margin-bottom:5px" onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);" max="10">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Keterangan 2
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="k_2" name="k_2" class="form-control myline" style="margin-bottom:5px" placeholder="Input Keterangan ...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    Total Nominal
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="total_nominal" name="total_nominal" class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" id="tambah" onclick="addUM();">Tambah</button>
                        <button type="button" class="btn blue" id="simpan" onclick="saveUM();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
            <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Finance/save_matching'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No Matching<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_matching" name="no_matching" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_matching']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-4">
                            Status
                        </div>
                        <div class="col-md-8">
                            <?php if($header['status']==0){
                                echo '<div style="background-color:darkkhaki; padding:3px">Belum Balance</div>';
                            }else{
                                echo '<div style="background-color:green; padding:3px; color:white;">Balanced</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Customer<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                            <input type="hidden" id="id_customer" name="id_customer" value="<?php echo $header['id_customer']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['alamat']; ?></textarea>                           
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-5">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>List Invoice
                        </div> 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Trx</th>
                                    <th>No Invoice</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="list_inv">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-md-7">                
                <div class="portlet box green-seagreen">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>List Uang Masuk
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>No. Uang Masuk</th>
                                    <th>Jenis</th>
                                    <th>Bank</th>
                                    <th>Status</th>
                                    <th>Currency</th> 
                                    <th>Nominal</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="list_um">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>                          
        <div class="row">
            <div class="col-md-5">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Invoice
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>Trx</th>
                                    <th>No Invoice</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="data_inv">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-md-7">                
                <div class="portlet box green-seagreen">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Uang Masuk
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>No</th>
                                    <th>No. Uang Masuk</th>
                                    <th>Jenis</th>
                                    <th>Bank</th>
                                    <th>Status</th>
                                    <th>Currency</th> 
                                    <th>Nominal</th>
                                    <th>Action</th>
                                </thead>
                                <tbody id="data_um">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <a href="<?php echo base_url('index.php/Finance/matching'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                        &nbsp;
            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
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
function simpanData(){
    var result = confirm("Anda yakin untuk menyimpannya ?");
    if (result) {
        $('#formku').submit(); 
    }
}

function numberWithCommas(x) {
     return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    hitungSubTotal();
}

function hitungSubTotal(){
    nominal = $('#nominal').val().toString().replace(/\,/g, "");
    b1 = $('#b_1').val().toString().replace(/\,/g, "");
    b2 = $('#b_2').val().toString().replace(/\,/g, "");
    total_harga = Number(nominal) + (Number(b1) + Number(b2));
    $('#total_nominal').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function list_inv(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/load_list_invoice'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#list_inv').html(result);
        }
    });
}

function addInv(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Finance/add_inv_match'); ?>',
        data:{
           id:$('#id').val(),
           id_inv:id
        },
        success:function(result){
            if(result['message_type']=="sukses"){
                list_inv(<?php echo $header['id_customer'];?>);
                data_inv(<?php echo $header['id'];?>);
            }else{
                $('#message').html(result['message']);
                $('.alert-danger').show(); 
            }            
        }
    });
}

function delInv(id,id_inv){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Finance/del_inv_match'); ?>',
        data:{
           id:id,
           id_inv:id_inv
        },
        success:function(result){
            if(result['message_type']=="sukses"){
                list_inv(<?php echo $header['id_customer'];?>);
                data_inv(<?php echo $header['id'];?>);
            }else{
                $('#message').html(result['message']);
                $('.alert-danger').show(); 
            }            
        }
    });
}

function data_inv(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/load_data_invoice'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#data_inv').html(result);
        }
    });
}

/** UM DIBAWAH **/

function list_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/load_list_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#list_um').html(result);
        }
    });
}

function input_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_data_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result){
            $("#myModal").find('.modal-title').text('Input Matching');
            $("#myModal").modal('show',{backdrop: 'true'});
            $("#tambah").show();
            $("#simpan").hide();
            $("#id_modal").val(<?php echo $header['id'];?>);
            $("#no_um").val(result['no_uang_masuk']);
            $("#um_id").val(result['id']);
            $("#nominal").val(numberWithCommas(result['nominal']));
            $("#total_nominal").val(numberWithCommas(result['nominal']));
        }
    });
}

function addUM(){
    var result = confirm("Anda yakin untuk menambahnya ?");
    if (result) {
        $('#frmDetail').attr("action", "<?php echo base_url(); ?>index.php/Finance/add_um_match");
        $('#frmDetail').submit(); 
    }
}

function saveUM(){
    var result = confirm("Anda yakin untuk menyimpan ?");
    if (result) {
        $('#frmDetail').attr("action", "<?php echo base_url(); ?>index.php/Finance/save_um_match");
        $('#frmDetail').submit(); 
    }
}

function view_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/view_data_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result){
            $("#myModal").find('.modal-title').text('Edit Matching');
            $("#myModal").modal('show',{backdrop: 'true'});
            $("#tambah").hide();
            $("#simpan").show();
            $("#id_modal").val(<?php echo $header['id'];?>);
            $("#no_um").val(result['no_uang_masuk']);
            $("#um_id").val(id);
            $('#b_1').val(numberWithCommas(result['biaya1']));
            $('#k_1').val(result['ket1'])
            $('#b_2').val(numberWithCommas(result['biaya2']));
            $('#k_2').val(result['ket2']);
            $("#nominal").val(numberWithCommas(result['nominal']));
            $("#total_nominal").val(numberWithCommas(Number(result['nominal'])+(Number(result['biaya1'])+Number(result['biaya2']))));
        }
    });
}

function delUM(id,id_um){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Finance/del_um_match'); ?>',
        data:{
           id:id,
           id_um:id_um
        },
        success:function(result){
            if(result['message_type']=="sukses"){
                list_um(<?php echo $header['id_customer'];?>);
                data_um(<?php echo $header['id'];?>);
            }else{
                $('#message').html(result['message']);
                $('.alert-danger').show(); 
            }            
        }
    });
}

function data_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/load_data_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#data_um').html(result);
        }
    });
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
    list_inv(<?php echo $header['id_customer']; ?>);
    list_um(<?php echo $header['id_customer']; ?>);
    data_inv(<?php echo $header['id']; ?>);
    data_um(<?php echo $header['id']; ?>);
});
</script>