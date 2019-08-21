<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan Rongsok
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangRongsok/index'); ?>">Gudang Rongsok</a> 
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
        <h3>Laporan Kartu Stok</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Item Rongsok <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="rongsok_id" name="rongsok_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                    <option value=""></option>
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
                            Bentuk Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bl" name="bl" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                    <option value="0">Global</option>
                                    <option value="1">Per Palette</option>
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
    }else if($.trim($("#rongsok_id").val()) == ""){
        $('#message').html("Item harus diisi!");
        $('.alert-danger').show(); 
    }else{ 
        var r=$('#rongsok_id').val();
        var bl=$('#bl').val();
        var s=$('#tgl_start').val();
        var e=$('#tgl_end').val();
        window.open('<?php echo base_url();?>index.php/GudangRongsok/kartu_stok?r='+r+'&ts='+s+'&te='+e+'&bl='+bl,'_blank');
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