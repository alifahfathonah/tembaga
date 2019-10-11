<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_SuratJalan/'); ?>"> Sinkronisasi CV</a> 
            <i class="fa fa-angle-right"></i> Sinkronisasi Invoice CV
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($hak_akses['add_surat_jalan']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
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
                <div class="portlet box grey-gallery">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-beer"></i>Sinkronisasi Invoice Jasa CV | Header dan Detail <?= "(".$count_tolling['count_inv']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_inv_jasa_cv'); ?>" id="formSync">
                            <select class="form-control myline select2me" name="cv_id" id="cv_id" style="margin-bottom: 5px;" onchange="getData(this.value)">
                                    <option></option>
                                <?php foreach ($list_cv as $key => $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama_cv ?></option>
                                <?php endforeach ?>
                            </select>
                            <input type="text" id="jumlah_data" name="jumlah_data" class="form-control" style="margin-bottom:5px" readonly="readonly" style="display: none;">
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_invoice();" id="btnSync" class="btn blue" style="display: none;"><span class="fa fa-upload"></span> Sinkronisasi</a>
                        </form>
                    </div>
                </div>
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
function sync_invoice(){
    $('#formSync').submit();
    $('#btnSync').text('Please Wait ...').prop("onclick", null).off("click");
}

function getData(id){
    if($.trim($('#cv_id').val())!=''){    
        $.ajax({
            url: "<?php echo base_url('index.php/R_Sinkronisasi/get_data_inv_cv'); ?>",
            type: "POST",
            data: {id: id},
            dataType: "json",
            success: function(result) {
                $("#jumlah_data").val(result['jumlah']+' Data Belum di Sinkronisasi');
            }
        });
    }
}
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function() {
    $('#cv_id').change(function(){
        if($('#cv_id').val() > 0) {
            $('#btnSync').show(); 
            $('#jumlah_data').show(); 
        } else {
            $('#btnSync').hide(); 
            $('#jumlah_data').hide();
        } 
    });
});
</script>