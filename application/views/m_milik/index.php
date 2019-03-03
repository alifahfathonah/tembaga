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
                        <form class="eventInsForm" method="post" target="_self" name="formku" id="formku">                            
                            <div class="row">
                                <div class="col-md-5">
                                    Kode Owner <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="k_owner" name="kode_owner" class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                                    <input type="hidden" id="id_edit" name="id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nama Owner <font color="#f00">*</font><br/>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="n_owner" name="nama_owner" maxlength="10" class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>                            
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="simpanEdit();">Simpan</button>
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
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="message"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div id="form_add" class="collapse well">
        <form class="eventInsForm" method="post" target="_self" name="formadd" 
              id="formadd" action="<?php echo base_url('index.php/MMilik/save'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Kode Owner <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input required="required" type="text" id="kode_owner" name="kode_owner" placeholder="Kode Owner" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">

                            <input type="hidden" id="id" name="id">
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Owner <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input required="required" type="text" id="nama_owner" name="nama_owner" placeholder="Nama Owner" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Simpan Bobbin </a>
                        </div>    
                    </div> 
                </div>
            </div>
        </form>
    </div>
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Master Milik
                </div>
                <div class="tools">        
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add"><i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Owner</th>   
                    <th>Nama Owner</th> 
                    <th>Edit</th> 
                    <th>Delete</th>
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
                        <td><?php echo $data->kode_owner; ?></td>
                        <td><?php echo $data->nama_owner; ?></td>
                        <td style="width:200px; text-align:center"> 
                            <?php
                                if( ($group_id==1)||($hak_akses['edit']==1) ){
                            echo '<a class="btn btn-circle btn-xs green" onclick="editData('.$data->id.')"  style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>'; 
                                }
                                ?>
                        </td><td> 
                            <?php       
                                if( ($group_id==1)||($hak_akses['delete']==1) ){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/Mmilik/delete/<?php echo $data->id; ?>" 
                               class="btn btn-xs btn-circle red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus </a>
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
<script type="text/javascript">
function simpanEdit(){
    if($.trim($("#k_owner").val()) == ""){
        alert("Kode Owner harus diisi, tidak boleh kosong!");
    }else if($.trim($("#n_owner").val()) == ""){
        alert("Nama Owner harus diisi, tidak boleh kosong!");
    }else{ 
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/MMilik/update");
        $('#formku').submit();
    } 
};

function simpanData(){
    if($.trim($("#kode_owner").val()) == ""){
        $('#message').html("Kode Owner harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#nama_owner").val()) == ""){
        $('#message').html("Nama Owner harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{ 
        $('#formadd').submit();
    }
}

function editData(id){    
    $.ajax({
        url: "<?php echo base_url('index.php/MMilik/edit'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#k_owner').val(result['kode_owner']);
            $('#n_owner').val(result['nama_owner']);
            $('#id_edit').val(result['id']);
            console.log($('#k_owner').val());
            
            $("#myModal").find('.modal-title').text('Edit Bobin');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
