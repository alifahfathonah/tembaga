<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_PurchaseOrder'); ?>"> Purchase Order </a> 
            <i class="fa fa-angle-right"></i> Input PO CV
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($hak_akses['add']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/R_PurchaseOrder/save_po'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" name="id" id="id" value="<?= $header['id'] ?>">
                            <input type="text" id="no_po" name="no_po" maxlength="25" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" style="margin-bottom:5px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            No. Invoice FG <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_invoice" name="no_invoice" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['no_invoice'];?>" readonly="readonly">

                            <input type="hidden" name="r_invoice_id" value="<?php echo $header['id'];?>">
                            <input type="hidden" name="id_invoice" value="<?php echo $header['invoice_id'];?>">
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-4">
                            No. PO. Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po_customer" name="no_po_customer" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['no_po'];?>" readonly="readonly">
                            <input type="hidden" id="f_invoice_id" name="f_invoice_id" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['f_invoice_id'];?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Term of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="term_of_payment" name="term_of_payment" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Details PO </a>
                        </div>    
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            CV <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <!-- <select id="customer_id" name="customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                            <option value=""></option>
                                <?php
                                    foreach ($cv_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->nama_cv.'</option>';
                                    }
                                ?>
                             </select> -->
                             <input type="text" id="nama_cv" name="nama_cv" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()" value="<?= $header['nama_cv']?>" readonly="readonly">
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
function simpanData(){
    if($.trim($("#no_po").val()) == ""){
        $('#message').html("Nomor PO harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#term_of_payment").val()) == ""){
        $('#message').html("Term of payment harus diisi!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function get_contact(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/R_PurchaseOrder/get_contact_name'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#contact_person").val(result['pic']);
        } 
    });
}
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
      