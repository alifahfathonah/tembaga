<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sinkronisasi
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Sinkronisasi'); ?>"> Sales Order </a> 
        </h5>          
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
            <div class="row">&nbsp;</div>
            <div class="row">                            
                <div class="col-md-12"> 
                    <div class="portlet box grey-gallery">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-beer"></i>Sinkronisasi SO -> SPB Header dan Detail
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                            <form method="post" action="<?php echo base_url('index.php/Sinkronisasi/sync_so'); ?>" id="formSync">
                                <!-- <input type="submit" name="Submit" value="Submit"> -->
                                <a href="javascript:;" onclick="sync_so();" id="btnSync" class="btn blue"><span class="fa fa-upload"></span> Sinkronisasi</a>
                            </form>
                            <?= $so['count'].' Data SO Belum di Kirim'; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">                            
                <div class="col-md-12"> 
                    <div class="portlet box grey-gallery">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-beer"></i>Sinkronisasi SJ -> Gudang -> Penerimaan
                            </div>
                            <div class="tools">   
                            </div>
                        </div>
                        <div class="portlet-body">
                            <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                            <form method="post" action="<?php echo base_url('index.php/Sinkronisasi/sync_sj'); ?>" id="formSyncDetail">
                                <!-- <input type="submit" name="Submit" value="Submit"> -->
                                <a href="javascript:;" onclick="sync_detail()" id="btnSyncDetail" class="btn blue"><span class="fa fa-upload"></span> Sinkronisasi</a>
                            </form>
                            <?= $sj['count'].' Data SJ Belum di Kirim'; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">                            
                <div class="col-md-12"> 
                    <div class="portlet box grey-gallery">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-beer"></i>Sinkronisasi Invoice
                            </div>
                            <div class="tools">   
                            </div>
                        </div>
                        <div class="portlet-body">
                            <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                            <form method="post" action="<?php echo base_url('index.php/Sinkronisasi/sync_inv'); ?>" id="formSyncInv">
                                <!-- <input type="submit" name="Submit" value="Submit"> -->
                                <a href="javascript:;" onclick="sync_inv()" id="btnSyncInv" class="btn blue"><span class="fa fa-upload"></span> Sinkronisasi</a>
                            </form>
                            <?= $inv['count'].' Data Invoice Belum di Kirim'; ?>
                        </div>
                    </div>
                </div>
            </div>
<script>
    function sync_so(){
        $('#formSync').submit();
        $('#btnSync').text('Please Wait ...').prop("onclick", null).off("click");
    }

    function sync_detail(){
        $('#formSyncDetail').submit();
        $('#btnSyncDetail').text('Please Wait ...').prop("onclick", null).off("click");
    }

    function sync_inv(){
        $('#formSyncInv').submit();
        $('#btnSyncInv').text('Please Wait ...').prop("onclick", null).off("click");
    }
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>  
<script>
$(function(){
    window.setTimeout(function(){ $(".alert-success").hide(); }, 5000);
});
</script>