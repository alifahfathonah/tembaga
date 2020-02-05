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
        <h3>Laporan Masak WIP Tahunan</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="laporan" name="laporan" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                    <option value=""></option>
                                    <optgroup label="Apollo">
                                        <option value="1">Apollo</option>
                                        <option value="5">Bahan Baku Apollo</option>
                                        <!-- <option value="7">Pemakaian Bahan Bakar Apollo</option>
                                        <option value="8">Bahan Bakar & Hasil Apollo</option> -->
                                    </optgroup>
                                    <optgroup label="Rolling">
                                        <option value="2">Rolling</option>
                                        <!-- <option value="6">Bahan Bakar Rolling</option> -->
                                    </optgroup>
                                    <optgroup label="Cuci">
                                        <option value="4">Cuci</option>
                                    </optgroup>
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
    if($.trim($("#laporan").val()) == ""){
        $('#message').html("Laporan harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tahun").val()) == ""){
        $('#message').html("Tahun harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{     
        var l=$('#laporan').val();
        var t=$('#tahun').val();
        window.open('<?php echo base_url();?>index.php/GudangWIP/print_laporan_produksi_tahunan?l='+l+'&t='+t,'_blank');
    };
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>