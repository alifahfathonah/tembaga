<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan Gudang FG
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/index'); ?>">Gudang FG</a> 
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
        <h3>Laporan Pemasukan dan Pengeluaran Gudang FG</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Bentuk Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bl" name="bl" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                <option></option>
                                <optgroup label="Pengeluaran">
                                    <option value="15">Global</option>
                                    <option value="17">Penjualan</option>
                                    <option value="8">Retur (Pengganti)</option>
                                    <option value="18">Retur (Produksi)</option>
                                    <option value="11">Kirim ke Rongsok</option>
                                    <option value="10">SDM</option>
                                    <option value="16">Repacking (-)</option>
                                    <option value="13">Adjustment (-)</option>
                                    <option value="20">Eksternal</option>
                                </optgroup>
                                <optgroup label="Pemasukan">
                                    <option value="0">Global</option>
                                    <option value="1">Produksi</option>
                                    <option value="2">Global (Detail)</option>
                                    <option value="3">Produksi (Detail)</option>
                                    <option value="19">SDM</option>
                                    <?php if($this->session->userdata('user_ppn')==0){ ?>
                                    <option value="4">PO (KH)</option>
                                    <?php } ?>
                                    <option value="5">PO (KMP)</option>
                                    <?php if($this->session->userdata('user_ppn')==0){ ?>
                                    <option value="6">Tolling (KH)</option>
                                    <?php } ?>
                                    <option value="7">Tolling (KMP)</option>
                                    <option value="9">Retur (Customer)</option>
                                    <option value="12">Repacking (+)</option>
                                    <option value="14">Adjustment (+)</option>
                                    <option value="21">Gudang/Rongsok</option>
                                    <option value="22">Lain-Lain</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Tanggal Awal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_start" name="tgl_start" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('01-m-Y'); ?>">
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
    if($.trim($("#tgl_start").val()) == ""){
        $('#message').html("Tanggal Awal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#tgl_end").val()) == ""){
        $('#message').html("Tanggal Akhir harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{   
        var l=$('#bl').val();
        var s=$('#tgl_start').val();
        var e=$('#tgl_end').val();
        window.open('<?php echo base_url();?>index.php/GudangFG/print_laporan_gudang_fg?ts='+s+'&te='+e+'&l='+l,'_blank');
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