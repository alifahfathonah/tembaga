<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/add'); ?>"> Pengajuan Baru </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/BeliSparePart/save'); ?>">                            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No Pengajuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                        <?php if($this->session->userdata('user_ppn') == 1 ){?>
                            <input type="text" id="no_pengajuan" name="no_pengajuan" class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        <?php }else{ ?>
                            <input type="text" id="no_pengajuan" name="no_pengajuan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Auto generate">
                        <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tgl Pengajuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_pengajuan" name="tgl_pengajuan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Kebutuhan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-3">
                            <select id="jenis_kebutuhan" name="jenis_kebutuhan" class="form-control myline" 
                                    style="margin-bottom:5px" onclick="showTanggal(this.value);">
                                <option value=""></option>
                                <option value="1">Segera</option>
                                <option value="0">Tanggal</option>
                            </select>
                        </div>
                        <div class="col-md-5" id="boxTanggal" style="display:none">
                            <input type="text" id="tgl_spare_part" name="tgl_spare_part" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Spare Part </a>
                        </div>    
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3">
                            Nama yang Mengajukan
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="nama_pengaju" name="nama_pengaju" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" style="margin-bottom:5px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Keterangan
                        </div>
                        <div class="col-md-9">
                            <textarea id="keterangan" name="keterangan" rows="3"
                                class="form-control myline" style="margin-bottom:5px" 
                                onkeyup="this.value = this.value.toUpperCase()"></textarea>
                        </div>
                      </div>
                </div>              
            </div>
            
        </form>
        
        <?php
            }else{
        ?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span id="message">Anda tidak memiliki hak akses ke halaman ini!</span>
        </div>
        <?php
            }
        ?>
    </div>
</div> 
<script>
function showTanggal(nilai){
    if(nilai=="0"){
        $('#boxTanggal').show();
    }else{
        $('#boxTanggal').hide();
    }
}

function simpanData(){
    if($.trim($("#no_pengajuan").val()) == ""){
        $('#message').html("Nomor Pengajuan harus diisi!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jenis_kebutuhan").val()) == ""){
        $('#message').html("Silahkan pilih jenis kebutuhan!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $("#tgl_spare_part").datepicker({
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
      