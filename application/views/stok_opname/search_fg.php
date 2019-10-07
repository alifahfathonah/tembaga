<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan FG
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
        <h3>Stok Opname per Jenis Barang</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Item <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="fg_id" name="fg_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                    <?php foreach ($list_fg as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=' ('.$value->kode.') '.$value->jenis_barang;?>
                                            </option>
                                    <?php } ?>
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
    if($.trim($("#fg_id").val()) == ""){
        $('#message').html("Item harus diisi!");
        $('.alert-danger').show(); 
    }else{     
        var r=$('#fg_id').val();
        var l=<?=$this->uri->segment(3);?>;
        window.open('<?php echo base_url();?>index.php/StokOpname/print_stok_fg_per_jb?r='+r+'&l='+l,'_blank');
    };
};
</script>