<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/index'); ?>">Laporan Bahan Pembantu dan Pelumas</a> 
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
  
   <div class="col-md-12" style="margin-top: 10px;"> 
        <h3>Laporan Bahan Pembantu dan Pelumas</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <!-- <div class="row">
                        <div class="col-md-4">
                           Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="laporan" name="laporan" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                    <option value=""></option>
                                <?php if($this->session->userdata('user_ppn')==0){ ?>
                                    <option value="1">KH</option>
                                    <option value="2">KMP + KH</option>
                                <?php }else{ ?>
                                    <option value="3">KMP + CV</option>
                                <?php } ?>
                                </select>
                        </div>
                    </div> -->
                    <!-- <div class="row">
                        <div class="col-md-4">
                            Tanggal Awal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_start" name="tgl_start" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Akhir <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_end" name="tgl_end" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-4">
                            Bulan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control myline select2me" style="margin-bottom: 5px;" name="bulan" id="bulan" data-placeHolder="Silahkan pilih..">
                                <option value=""></option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tahun <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control myline select2me" style="margin-bottom: 5px;" name="tahun" id="tahun" data-placeHolder="Silahkan pilih..">
                                <option value=""></option>
                                <?php for ($i=0; $i < 5; $i++) { 
                                    echo "<option value='".date('Y', strtotime('-'.$i.' years'))."'>".date('Y', strtotime('-'.$i.' years'))."</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-search"></i> Proses </a>
                        </div>    
                    </div>
                </div>        
            </div>
    </div>
<script type="text/javascript">
function simpanData(){
    if($.trim($("#bulan").val()) == ""){
        $('#message').html("Silahkan pilih bulan!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tahun").val()) == ""){
        $('#message').html("Silahkan pilih tahun!");
        $('.alert-danger').show();
    }else{     
        var b=$('#bulan').val();
        var t=$('#tahun').val();
        window.open('<?php echo base_url();?>index.php/Finance/print_laporan_bahan_pembantu?b='+b+'&t='+t,'_blank');
    };
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $("#tgl_start").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    });        
    $("#tgl_end").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    });    
});
</script>