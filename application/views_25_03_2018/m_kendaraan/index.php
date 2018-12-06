<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Master 
            <i class="fa fa-angle-right"></i> 
            <i class="fa fa-angle-right"></i> Kendaraan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Kendaraan'); ?>"> Data Kendaraan </a>
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
                        <h4 class="modal-title">Judul</h4>
                    </div>
                    <div class="modal-body">
                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        <span id="message">&nbsp;</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Type Kendaraan <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <select id="m_type_kendaraan_id" name="m_type_kendaraan_id" class="form-control myline select2me" 
                                        data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                        <option value=""></option>
                                        <?php
                                            foreach ($mtk_list as $row){
                                                echo '<option value="'.$row->id.'">'.$row->type_kendaraan.'</option>';
                                            }
                                        ?>
                                    </select>
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    No Polisi <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_kendaraan" name="no_kendaraan" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" maxlength="11" 
                                        onkeydown="return cekChar(event);">
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
                    <i class="fa fa-taxi"></i>Daftar Kendaraan
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
                    <th>No</th>
                    <th>No Polisi</th>   
                    <th>Type Kendaraan</th> 
                    <th>Keterangan</th>                    
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
                        <td style="width:50px; text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->no_kendaraan; ?></td>
                        <td><?php echo $data->type_kendaraan; ?></td> 
                        <td><?php echo $data->keterangan; ?></td>                        
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
                            <a href="<?php echo base_url(); ?>index.php/Kendaraan/delete/<?php echo $data->id; ?>" 
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

function cekChar(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode==8 || charCode==127 || (charCode>47 && charCode<58) || (charCode>64 && charCode<91))
        return true;
    return false;
}

function newData(){
    $('#no_kendaraan').val('');
    $('#m_type_kendaraan_id').select2('val','');
    $('#keterangan').val('');
    $('#id').val('');
    dsState = "Input";
    
    $('#message').html("");
    $('.alert-danger').hide();
    
    $("#myModal").find('.modal-title').text('Tambah Kendaraan');
    $("#myModal").modal('show',{backdrop: 'true'}); 
}

function simpandata(){
    if($.trim($("#no_kendaraan").val()) == ""){
        $('#message').html("No Polisi harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#m_type_kendaraan_id").val()) == ""){
        $('#message').html("Silahkan pilih type kendaraan!");
        $('.alert-danger').show();
    }else{      
        if(dsState=="Input"){
            $.ajax({
                type:"POST",
                url:'<?php echo base_url('index.php/Kendaraan/cek_code'); ?>',
                data:"data="+$("#no_kendaraan").val(),
                success:function(result){
                    if(result=="ADA"){
                        $('#message').html("Nomor polisi sudah dipakai kendaraan lain, silahkan ganti!");
                        $('.alert-danger').show();
                    }else{
                        $('#message').html("");
                        $('.alert-danger').hide();
                        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Kendaraan/save");
                        $('#formku').submit();                    
                    }
                }
            });
        }else{
            $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Kendaraan/update");
            $('#formku').submit(); 
        }
    };
};

function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/Kendaraan/edit'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            console.log(result);
            $('#no_kendaraan').val(result['no_kendaraan']);
            $('#keterangan').val(result['keterangan']);
            $('#m_type_kendaraan_id').select2('val',result['m_type_kendaraan_id']);
            $('#id').val(result['id']);            

            $("#myModal").find('.modal-title').text('Edit Kendaraan');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         