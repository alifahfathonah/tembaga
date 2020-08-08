<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/index'); ?>">Finance</a> 
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
        <h3>Laporan Penjualan Piutang</h3>
        <hr class="divider">
        <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onclick="get_no_so(this.value);">
                                <option value="0">Global</option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'">'.(($this->session->userdata('user_ppn') == 1)? $row->nama_customer : $row->nama_customer_kh).'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                           Laporan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="laporan" name="laporan" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                    <option value=""></option>
                                <?php if($this->session->userdata('user_ppn')==0){ ?>
                                    <option value="0">KH</option>
                                    <option value="2">KMP + KH</option>
                                <?php }else{ ?>
                                    <option value="1">KMP</option>
                                    <option value="3">KMP + CV</option>
                                <?php } ?>
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                           Jenis <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis" name="jenis" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_jenis(this.value)">
                                    <option value="0">Saat Ini</option>
                                    <option value="1">Tanggal</option> 
                                </select>
                        </div>
                    </div>
                    <div class="row" id="show_tanggal" style="display:none">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
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
function get_jenis(id){
    if(id==0){
        $('#show_tanggal').hide();
    }else{
        $('#show_tanggal').show();
    }

}

function simpanData(){
    if($.trim($("#laporan").val()) == ""){
        $('#message').html("Laporan harus dipilih, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        var c=$('#m_customer_id').val();
        var l=$('#laporan').val();
        var j=$('#jenis').val();
        var t=$('#tanggal').val();
        window.open('<?php echo base_url();?>index.php/Finance/print_penjualan_piutang?laporan='+l+'&t='+t+'&j='+j+'&c='+c,'_blank');
    };
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){
    $("#tanggal").datepicker({
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