<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Bobbin
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/gudangbobbin/laporan_status'); ?>"> Laporan Bobbin </a> 
        </h5>          
    </div>
</div>
   <div class="row">&nbsp;</div>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                <button class="close" data-close="alert"></button>
                <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
            </div>
        </div>
    </div>
  
   <div class="col-md-12" style="margin-top: 10px;"> 
        <h3>Laporan Bobbin di Langganan</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                           Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="laporan" name="laporan" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_cost(this.value);">
                                    <option></option>
                                    <option value="0">Global</option>
                                    <option value="1">Supplier</option>
                                    <option value="2">Customer</option>
                                </select>
                        </div>
                    </div>
                    <div class="row" id="show_nama" style="display: none;">
                        <div class="col-md-4">
                           Nama <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis" name="jenis" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
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
    if($.trim($("#laporan").val()) == ""){
        $('#msg_sukses').html("Laporan harus diisi, tidak boleh kosong!");
        $('.alert-success').show();
    }else if($.trim($("#jenis").val()) == ""){
        $('#msg').html("Nama diisi, tidak boleh kosong!");
        $('.alert-success').show();
    }else{
        var l=$('#laporan').val();
        var j=$('#jenis').val();
        var s=$('#tgl_start').val();
        var e=$('#tgl_end').val();
        window.open('<?php echo base_url();?>index.php/GudangBobbin/print_laporan_langganan?l='+l+'&j='+j,'_blank');
    };
};

function get_cost(id){
    if(id==0){
        $('#show_nama').hide();
    }else{
        $('#show_nama').show();
        $.ajax({
            url: "<?php echo base_url('index.php/GudangBobbin/get_cost_list'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "html",
            success: function(result) {
                $('#jenis').html(result);
            }
        });
    }
}
</script>