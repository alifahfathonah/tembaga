<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan Rongsok
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangRongsok/laporan_bulanan_palet'); ?>">Bulanan per Palette</a> 
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
        <h3>Laporan Stok Bulanan per Palette</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Item Rongsok <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="rongsok_id" name="rongsok_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                    <option value="0">*** Semua Item ***</option>
                                    <?php foreach ($list_rongsok as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=$value->nama_item.' ('.$value->kode_rongsok.') ';?>
                                            </option>
                                    <?php } ?>
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                           Bulan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bulan" name="bulan" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
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
                            Tahun
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control myline" style="margin-bottom:5px" id="tahun" name="tahun" maxlength="4" value="<?=date('Y');?>">
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
        $('#message').html("Tahun harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tahun").val()) == ""){
        $('#message').html("Bulan harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#rongsok_id").val()) == ""){
        $('#message').html("Item harus diisi!");
        $('.alert-danger').show(); 
    }else{ 
        var r=$('#rongsok_id').val();
        var b=$('#bulan').val();
        var t=$('#tahun').val();
        window.open('<?php echo base_url();?>index.php/GudangRongsok/print_transaksi_rongsok?r='+r+'&b='+b+'&t='+t,'_blank');
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