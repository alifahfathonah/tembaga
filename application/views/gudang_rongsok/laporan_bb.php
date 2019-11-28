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
        <h3>Laporan Bahan Baku</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                           Bulan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bulan" name="bulan" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                    <option value="01">JANUARI</option>
                                    <option value="02">FEBRUARI</option>
                                    <option value="03">MARET</option>
                                    <option value="04">APRIL</option>
                                    <option value="05">MEI</option>
                                    <option value="06">JUNI</option>
                                    <option value="07">JULI</option>
                                    <option value="08">AGUSTUS</option>
                                    <option value="09">SEPTEMBER</option>
                                    <option value="10">OKTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DESEMBER</option>
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
        $('#message').html("Bulan harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tahun").val()) == ""){
        $('#message').html("Tahun harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{ 
        var s=$('#bulan').val();
        var e=$('#tahun').val();
        window.open('<?php echo base_url();?>index.php/GudangRongsok/print_laporan_bb?b='+s+'&t='+e,'_blank');
    };
};
</script>