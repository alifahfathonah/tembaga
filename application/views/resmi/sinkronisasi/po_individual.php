<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="#"> Sinkronisasi Individual</a> 
            <i class="fa fa-angle-right"></i> Purchase Order
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
                            <i class="fa fa-beer"></i>Sinkronisasi Purchase Order | Header dan Detail
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sync_Individual/send_po'); ?>" id="formSync">
                            <select class="form-control myline select2me" name="cv_id" id="cv_id" style="margin-bottom: 5px;">
                                <?php foreach ($list_cv as $key => $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama_cv ?></option>
                                <?php endforeach ?>
                            </select>
                            <label>PO ID*</label>
                            <input type="text" name="po_id" id="po_id" class="form-control myline" style="margin-bottom: 5px;">
                            <a href="javascript:;" onclick="sendPo();" id="btnSync" class="btn blue"><span class="fa fa-upload"></span> Proses</a>
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
    function sendPo(){
        cv_id = $('#cv_id').val();
        po_id = $('#po_id').val();
        if (cv_id == '' || po_id == '' || po_id == '0') {
            $('#message').html("Seluruh field harus diisi!");
            $('.alert-danger').show();
        } else {
            $('#formSync').submit();
            $('#btnSync').text('Please Wait ...').prop("onclick", null).off("click");
        }
    }
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
      