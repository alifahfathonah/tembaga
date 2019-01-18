<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Master 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Rongsok'); ?>"> Data Rongsok </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
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
                                    Nama Item <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="id" name="id" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" readonly="readonly">
                                </div>
                            </div>                          
                            <div class="row">
                                <div class="col-md-5">
                                    Nama Item <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nama_item" name="nama_item" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Kode Rongsok <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="kode_rongsok" name="kode_rongsok" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nama Unit of Measure <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="uom" name="uom" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-5">
                                    Description
                                </div>
                                <div class="col-md-7">
                                    <textarea id="description" name="description" rows="3"
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Alias
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="alias" name="alias" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="simpandata();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

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
                    <i class="fa fa-beer"></i>Data Rongsok
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
                    <th>Nama Item</th>   
                    <th>Kode Rongsok</th>
                    <th>Nama Unit of Measure</th>
                    <th>Description</th>
                    <th>Alias</th> 
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
                        <td style="text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->nama_item; ?></td>
                        <td><?php echo $data->kode_rongsok; ?></td>
                        <td><?php echo $data->uom; ?></td>
                        <td><?php echo $data->description; ?></td>
                        <td><?php echo $data->alias; ?></td>
                        <td style="text-align:center"> 
                            <?php
                                if( ($group_id==1)||($hak_akses['edit']==1) ){
                            ?>
                            <a class="btn btn-circle btn-xs green" onclick="editData(<?php echo $data->id; ?>)" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php 
                                }
                                if( ($group_id==1)||($hak_akses['delete']==1) ){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/Rongsok/delete/<?php echo $data->id; ?>" 
                               class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus data ini?');">
                                <i class="fa fa-trash-o"></i> Hapus </a>
                            <?php }?>
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
    
    $("#myModal").find('.modal-title').text('Input Data Rongsok');
    $("#myModal").modal('show',{backdrop: 'true'}); 
}

function simpandata(){
    if($.trim($("#nama_item").val()) == ""){
        $('#message').html("Nama item harus diisi!");
        $('.alert-danger').show(); 
    }else if($.trim($("#kode_rongsok").val()) == ""){
        $('#message').html("Kode Rongsok harus diisi!");
        $('.alert-danger').show(); 
    }else if($.trim($("#uom").val()) == ""){
        $('#message').html("Nama unit of measure harus diisi!");
        $('.alert-danger').show(); 
    }else{      
        if(dsState=="Input"){
            $.ajax({
                type:"POST",
                url:'<?php echo base_url('index.php/Rongsok/cek_code'); ?>',
                data:{
                    data: $("#nama_item").val(),
                    kode: $("#kode_rongsok").val()
                },
                success:function(result){
                    if(result=="ADA"){
                        $('#message').html("Nama item sudah ada, silahkan ganti dengan nama lain!");
                        $('.alert-danger').show();
                    }else{
                        $('#message').html("");
                        $('.alert-danger').hide();
                        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Rongsok/save");
                        $('#formku').submit();                    
                    }
                }
            });
        }else{
            $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Rongsok/update");
            $('#formku').submit(); 
        }
    };
};

function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/Rongsok/edit'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#nama_item').val(result['nama_item']);
            $('#uom').val(result['uom']);
            $('#description').val(result['description']);
            $('#alias').val(result['alias']);
            $('#id').val(result['id']);
            
            $("#myModal").find('.modal-title').text('Edit Rongsok');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         