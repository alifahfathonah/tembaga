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
                            <i class="fa fa-beer"></i>Sinkronisasi SO CV | Header dan Detail <?= "(".$so['jumlah']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_so_cv'); ?>" id="formSync_so">
                            <select class="form-control myline select2me" name="cv_id" id="cv_id_so" style="margin-bottom: 5px;" onchange="getData_so(this.value)">
                                    <option></option>
                                <?php foreach ($list_so as $key => $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama_cv.' | ('.$value->jumlah.' Data Belum disinkronisasi )';?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_so();" id="btnSync_so" class="btn blue" style="display: none;"><span class="fa fa-upload"></span> Sinkronisasi SO</a>
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
                            <i class="fa fa-beer"></i>Sinkronisasi BPB CV | Header dan Detail <?= "(".$bpb['jumlah']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_bpb_cv'); ?>" id="formSync_bpb">
                            <select class="form-control myline select2me" name="cv_id" id="cv_id_bpb" style="margin-bottom: 5px;" onchange="getData_bpb(this.value)">
                                    <option></option>
                                <?php foreach ($list_bpb as $key => $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama_cv.' | ('.$value->jumlah.' Data Belum disinkronisasi )';?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_bpb();" id="btnSync_bpb" class="btn blue" style="display: none;"><span class="fa fa-upload"></span> Sinkronisasi BPB</a>
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
                            <i class="fa fa-beer"></i>Sinkronisasi PO CV | Header dan Detail <?= "(".$po['jumlah']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_po_cv'); ?>" id="formSync_po">
                            <select class="form-control myline select2me" name="cv_id" id="cv_id_po" style="margin-bottom: 5px;" onchange="getData_po(this.value)">
                                    <option></option>
                                <?php foreach ($list_po as $key => $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama_cv.' | ('.$value->jumlah.' Data Belum disinkronisasi )';?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_po();" id="btnSync_po" class="btn blue" style="display: none;"><span class="fa fa-upload"></span> Sinkronisasi PO</a>
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
                            <i class="fa fa-beer"></i>Sinkronisasi Surat Jalan Rongsok CV | Header dan Detail <?= "(".$sj_rsk['jumlah']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_sj_rsk_cv'); ?>" id="formSync_sj_rsk">
                            <select class="form-control myline select2me" name="cv_id" id="cv_id_sj_rsk" style="margin-bottom: 5px;" onchange="getData_sj_rsk(this.value)">
                                    <option></option>
                                <?php foreach ($list_sj_rsk as $key => $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama_cv.' | ('.$value->jumlah.' Data Belum disinkronisasi )'; ?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_sj_rsk();" id="btnSync_sj_rsk" class="btn blue" style="display: none;"><span class="fa fa-upload"></span> Sinkronisasi Surat Jalan CV KE KMP (Rongsok)</a>
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
                            <i class="fa fa-beer"></i>Sinkronisasi SJ Customer CV dan BPB FG | Header dan Detail <?= "(".$sj_bpb['jumlah']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_sj_bpb_cv'); ?>" id="formSync_sj_bpb">
                            <select class="form-control myline select2me" name="cv_id" id="cv_id_sj_bpb" style="margin-bottom: 5px;" onchange="getData_sj_bpb(this.value)">
                                    <option></option>
                                <?php foreach ($list_sj_bpb as $key => $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama_cv.' | ('.$value->jumlah.' Data Belum disinkronisasi )';?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_sj_bpb();" id="btnSync_sj_bpb" class="btn blue" style="display: none;"><span class="fa fa-upload"></span> Sinkronisasi SJ BPB</a>
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
                            <i class="fa fa-beer"></i>Sinkronisasi Invoice Jasa CV | Header dan Detail <?= "(".$inv['jumlah']." Data belum disinkronisasi)" ?>
                        </div>
                        <div class="tools">
                        </div>
                    </div>
                    <div class="portlet-body">
                        <p>Klik tombol di bawah ini untuk memulai sinkronisasi.</p>
                        <form method="post" action="<?php echo base_url('index.php/R_Sinkronisasi/do_sync_inv_jasa_cv'); ?>" id="formSync_inv">
                            <select class="form-control myline select2me" name="cv_id" id="cv_id_inv" style="margin-bottom: 5px;" onchange="getData_inv(this.value)">
                                    <option></option>
                                <?php foreach ($list_inv as $key => $value): ?>
                                    <option value="<?= $value->id ?>"><?= $value->nama_cv.' | ('.$value->jumlah.' Data Belum disinkronisasi )'; ?></option>
                                <?php endforeach ?>
                            </select>
                            <!-- <input type="submit" name="Submit" value="Submit"> -->
                            <a href="javascript:;" onclick="sync_invoice();" id="btnSync_inv" class="btn blue" style="display: none;"><span class="fa fa-upload"></span> Sinkronisasi Invoice</a>
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
function sync_so(){
    $('#formSync_so').submit();
    $('#btnSync_so').text('Please Wait ...').prop("onclick", null).off("click");
}

function sync_bpb(){
    $('#formSync_bpb').submit();
    $('#btnSync_bpb').text('Please Wait ...').prop("onclick", null).off("click");
}

function sync_po(){
    $('#formSync_po').submit();
    $('#btnSync_po').text('Please Wait ...').prop("onclick", null).off("click");
}

function sync_sj_rsk(){
    $('#formSync_sj_rsk').submit();
    $('#btnSync_sj_rsk').text('Please Wait ...').prop("onclick", null).off("click");
}

function sync_sj_bpb(){
    $('#formSync_sj_bpb').submit();
    $('#btnSync_sj_bpb').text('Please Wait ...').prop("onclick", null).off("click");
}

function sync_invoice(){
    $('#formSync_inv').submit();
    $('#btnSync_inv').text('Please Wait ...').prop("onclick", null).off("click");
}
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function() {
    $('#cv_id_so').change(function(){
        if($('#cv_id_so').val() > 0) {
            $('#btnSync_so').show();
        } else {
            $('#btnSync_so').hide(); 
        } 
    });

    $('#cv_id_bpb').change(function(){
        if($('#cv_id_bpb').val() > 0) {
            $('#btnSync_bpb').show();
        } else {
            $('#btnSync_bpb').hide(); 
        } 
    });

    $('#cv_id_po').change(function(){
        if($('#cv_id_po').val() > 0) {
            $('#btnSync_po').show();
        } else {
            $('#btnSync_po').hide(); 
        } 
    });

    $('#cv_id_sj_rsk').change(function(){
        if($('#cv_id_sj_rsk').val() > 0) {
            $('#btnSync_sj_rsk').show(); 
        } else {
            $('#btnSync_sj_rsk').hide(); 
        } 
    });

    $('#cv_id_sj_bpb').change(function(){
        if($('#cv_id_sj_bpb').val() > 0) {
            $('#btnSync_sj_bpb').show(); 
        } else {
            $('#btnSync_sj_bpb').hide(); 
        } 
    });

    $('#cv_id_inv').change(function(){
        if($('#cv_id_inv').val() > 0) {
            $('#btnSync_inv').show(); 
        } else {
            $('#btnSync_inv').hide(); 
        } 
    });
});
</script>