<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan WIP
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangWIP/index'); ?>">Gudang WIP</a> 
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
        <h3>Laporan Permintaan Keluar Masuk Gudang WIP</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                           Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="laporan" name="laporan" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                <optgroup label="Pengeluaran">
                                    <option value="0">Ingot</option>
                                    <option value="1">8mm Hitam</option>
                                    <option value="2">8mm Cuci</option>
                                    <option value="3">Produksi</option>
                                    <option value="4">Penjualan (KMP)</option>
                                    <?php if($this->session->userdata('user_ppn')==0){ ?>
                                    <option value="5">Penjualan (KH)</option>
                                    <?php } ?>
                                    <option value="6">Adjustment</option>
                                </optgroup>
                                <optgroup label="Pemasukan">
                                    <?php if($this->session->userdata('user_ppn')==0){ ?>
                                    <option value="7">Pemasukan dari PO (KH)</option>
                                    <?php } ?>
                                    <option value="8">Pemasukan dari PO (KMP)</option>
                                    <?php if($this->session->userdata('user_ppn')==0){ ?>
                                    <option value="9">Pemasukan dari Tolling (KH)</option>
                                    <?php } ?>
                                    <option value="10">Pemasukan dari Tolling (KMP)</option>
                                    <option value="11">Pemasukan dari Apollo</option>
                                    <option value="12">Pemasukan dari Rolling</option>
                                    <option value="13">Pemasukan dari Cuci</option>
                                    <option value="15">SDM</option>
                                    <option value="14">Adjustment</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="row">
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
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tgl_end").val()) == ""){
        $('#message').html("Silahkan pilih nama supplier!");
        $('.alert-danger').show();
    }else{
        var l=$('#laporan').val();
        var s=$('#tgl_start').val();
        var e=$('#tgl_end').val();
        window.open('<?php echo base_url();?>index.php/GudangWIP/print_permintaan_gudang?ts='+s+'&te='+e+'&l='+l,'_blank');
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