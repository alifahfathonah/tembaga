<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Master 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Bank'); ?>"> Master Bank </a>
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
                                    Kode Bank
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="kode_bank" name="kode_bank" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()">
                                    
                                    <input type="hidden" id="id" name="id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nama Bank <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="nama_bank" name="nama_bank" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nomor Rekening <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_rek" name="no_rek" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Nomor Account <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="no_acc" name="no_acc" 
                                        class="form-control myline" style="margin-bottom:5px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Atas Nama A/N
                                </div>
                                <div class="col-md-7">
                                    <input type="text" id="an" name="an" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Currency <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <select id="currency" name="currency" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                    <option value=""></option>
                                    <option value="IDR">IDR</option>
                                    <option value="USD">USD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Kantor Cabang
                                </div>
                                <div class="col-md-7">
                                    <textarea id="kc" name="kc" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    Jenis Rekening <font color="#f00">*</font>
                                </div>
                                <div class="col-md-7">
                                    <select id="ppn" name="ppn" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                    <option value=""></option>
                                    <option value="0">Non-PPN</option>
                                    <option value="1">PPN</option>
                                    </select>
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
                    <i class="fa fa-bank"></i>Master Bank
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
                    <th>Kode Bank</th>   
                    <th>Nama Bank</th>
                    <th>Nomor Rekening</th>
                    <th>A/N</th>
                    <th>PPN</th>
                    <th>Currency</th>
                    <th>Kantor Cabang</th>
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
                        <td><?php echo $data->kode_bank; ?></td>
                        <td><?php echo $data->nama_bank; ?></td>
                        <td><?= $data->nomor_rekening; ?></td>
                        <td><?= $data->atas_nama; ?></td>
                        <?php echo (($data->ppn==1)? '<td><i class="fa fa-check"></i> Yes</td>': '<td><i class="fa fa-times"></i> No</td>');?>
                        <td><?= $data->currency; ?></td>
                        <td><?= $data->kantor_cabang; ?></td>                         
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
                            <a href="<?php echo base_url(); ?>index.php/Bank/delete/<?php echo $data->id; ?>" 
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
    $('#kode_bank').val('');
    $('#nama_bank').val('');
    $('#no_rek').val('');
    $('#an').val('');
    $('#currency').select2('val', '');
    $('#kc').val('');
    $('#ppn').select2('val', '');
    $('#id').val('');
    dsState = "Input";
    
    $('#message').html("");
    $('.alert-danger').hide(); 
    
    $("#myModal").find('.modal-title').text('Input Data Bank');
    $("#myModal").modal('show',{backdrop: 'true'}); 
}

function simpandata(){
    if($.trim($("#kode_bank").val()) == ""){
        $('#message').html("Kode Bank harus diisi!");
        $('.alert-danger').show(); 
    }else if($.trim($("#nama_bank").val()) == ""){
        $('#message').html("Nama Bank harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#no_rek").val()) == ""){
        $('#message').html("Nomor Rekening harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#currency").val()) == ""){
        $('#message').html("Currency harus diisi!");
        $('.alert-danger').show();
    }else if($.trim($("#ppn").val()) == ""){
        $('#message').html("Jenis Rekening harus diisi!");
        $('.alert-danger').show();
    }else{      
        if(dsState=="Input"){
            $.ajax({
                type:"POST",
                url:'<?php echo base_url('index.php/Bank/cek_code'); ?>',
                data:"data="+$("#kode_bank").val(),
                success:function(result){
                    if(result=="ADA"){
                        $('#message').html("Kode bank sudah ada, silahkan ganti dengan kode lain!");
                        $('.alert-danger').show();
                    }else{
                        $('#message').html("");
                        $('.alert-danger').hide();
                        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Bank/save");
                        $('#formku').submit();                    
                    }
                }
            });
        }else{
            $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Bank/update");
            $('#formku').submit(); 
        }
    };
};

function editData(id){
    dsState = "Edit";
    $.ajax({
        url: "<?php echo base_url('index.php/Bank/edit'); ?>",
        type: "POST",
        data : {id: id},
        success: function (result){
            $('#kode_bank').val(result['kode_bank']);
            $('#nama_bank').val(result['nama_bank']);
            $('#no_rek').val(result['nomor_rekening']);
            $('#no_acc').val(result['no_acc']);
            $('#an').val(result['atas_nama']);
            $('#currency').select2('val', result['currency']);
            $('#kc').val(result['kantor_cabang']);
            $('#ppn').select2('val', result['ppn']);
            $('#id').val(result['id']);
            
            $("#myModal").find('.modal-title').text('Edit Bank');
            $("#myModal").modal('show',{backdrop: 'true'});           
        }
    });
}

$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         