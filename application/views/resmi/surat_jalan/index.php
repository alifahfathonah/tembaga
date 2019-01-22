<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Surat Jalan 
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 

        <?php
            if( ($group_id==9)||($hak_akses['index']==1) ){
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
                    <i class="fa fa-beer"></i>List Surat Jalan
                </div>
                <div class="tools">    
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" onclick="newData()">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. Surat Jalan</th>
                    <th>Tanggal</th>
                    <th>Jenis<br>Barang</th>                     
                    <th>Customer</th> 
                    <th>Alamat</th> 
                    <th>No. Sales Order</th>
                    <th>Jumlah<br>Item</th>
                    <th>Kendaraan</th>
                    <th>Supir</th>
                    <th>Status<br>Invoice</th>
                    <th>Status<br>Surat Jalan</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                                                                                                     
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
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
var dsState;

function newData(){
    $('#nama_item').val('');
    $('#uom').val('');
    $('#description').val('');
    $('#alias').val('');
    $('#id').val('');
    dsState = "Input";
    
    $('#message').html("");
    $('.alert-danger').hide(); 
    
    $("#myModal").find('.modal-title').text('Input Data Ampas');
    $("#myModal").modal('show',{backdrop: 'true'}); 
}

function simpandata(){
    if($.trim($("#nama_item").val()) == ""){
        $('#message').html("Nama item harus diisi!");
        $('.alert-danger').show(); 
    }else if($.trim($("#uom").val()) == ""){
        $('#message').html("Nama unit of measure harus diisi!");
        $('.alert-danger').show(); 
    }else{      
        if(dsState=="Input"){
            $.ajax({
                type:"POST",
                url:'<?php echo base_url('index.php/Ampas/cek_code'); ?>',
                data:"data="+$("#nama_item").val(),
                success:function(result){
                    if(result=="ADA"){
                        $('#message').html("Nama item sudah ada, silahkan ganti dengan nama lain!");
                        $('.alert-danger').show();
                    }else{
                        $('#message').html("");
                        $('.alert-danger').hide();
                        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Ampas/save");
                        $('#formku').submit();                    
                    }
                }
            });
        }else{
            $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Ampas/update");
            $('#formku').submit(); 
        }
    };
};

function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/Ampas/edit'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#nama_item').val(result['nama_item']);
            $('#uom').val(result['uom']);
            $('#description').val(result['description']);
            $('#alias').val(result['alias']);
            $('#id').val(result['id']);
            
            $("#myModal").find('.modal-title').text('Edit Ampas');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         