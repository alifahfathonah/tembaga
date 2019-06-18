<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliWIP'); ?>"> Pembelian WIP </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliWIP/matching'); ?>"> Matching PO - DTWIP </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['matching']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>                         
        <div class="row">
            <div class="col-md-1">
                No. PO <font color="#f00">*</font>
            </div>
            <div class="col-md-6">
                <select id="po_id" name="po_id" class="form-control myline select2me" 
                    data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                    <option value=""></option>
                    <?php
                        foreach ($po_list as $row){
                            echo '<option value="'.$row->id.'">'.$row->no_po.' ('.$row->nama_supplier.')</option>';
                        }
                    ?>
                </select>
            </div>   
            <div class="col-md-2">
                <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                    <i class="fa fa-floppy-o"></i> Proses </a>
            </div> 
        </div>        
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


function simpanData(){
    if($.trim($("#po_id").val()) == ""){
        $('#message').html("Silahkan pilih nomor PO!");
        $('.alert-danger').show(); 
    }else{ 
        window.location.replace("<?php echo base_url(); ?>index.php/BeliWIP/proses_matching/"+ $("#po_id").val()); 
    };
};


</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>
      