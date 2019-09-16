<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_SuratJalan/'); ?>"> Sinkronisasi </a> 
            <i class="fa fa-angle-right"></i> Sinkronisasi KMP 1
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
        
        <!-- <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Sinkronisasi Data
                </div>
                <div class="tools">   
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="javascript:;" onclick="showModalAdd()">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="portlet-body">
                <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                <form method="post" action="<?= base_url() ?>index.php/R_Sinkronisasi/do_sinkronisasi_kmp1" id="formSync">
                    <input type="submit" name="Submit" value="Submit">
                    <a href="javascript:;" onclick="sync_kmp1()" id="btnSync" class="btn blue"><span class="fa fa-upload"></span> Sinkronisasi</a>
                </form>
            </div>
        </div> -->
        <div class="row">                            
            <div class="col-md-12"> 
                <div class="portlet box grey-gallery">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-beer"></i>Sinkronisasi SO -> SPB Header dan Detail <?= "(".$count_so['count_so']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_so'); ?>" id="formSync">
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_so();" id="btnSync" class="btn blue"><span class="fa fa-upload"></span> Sinkronisasi</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">                            
            <div class="col-md-12"> 
                <div class="portlet box grey-gallery">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-beer"></i>Sinkronisasi SJ -> Gudang -> Penerimaan <?= "(".$count_sj['count_sj']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">   
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_sj'); ?>" id="formSyncDetail">
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_sj()" id="btnSyncDetail" class="btn blue"><span class="fa fa-upload"></span> Sinkronisasi</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">                            
            <div class="col-md-12"> 
                <div class="portlet box grey-gallery">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-beer"></i>Sinkronisasi Invoice <?= "(".$count_inv['count_inv']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">   
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_inv'); ?>" id="formSyncInv">
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_inv()" id="btnSyncInv" class="btn blue"><span class="fa fa-upload"></span> Sinkronisasi</a>
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
    function sync_kmp1(){
        $('#formSync').submit();
        $('#btnSync').text('Please Wait ...').prop("onclick", null).off("click");
    }

    function sync_so(){
        $('#formSync').submit();
        $('#btnSync').text('Please Wait ...').prop("onclick", null).off("click");
    }

    function sync_sj(){
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
      