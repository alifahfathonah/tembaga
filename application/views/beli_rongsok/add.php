<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/add'); ?>"> Input PO </a> 
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
              id="formku" action="<?php echo base_url('index.php/BeliRongsok/save'); ?>">                            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"
                                value="Auto generate">
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
                    <div class="row">
                        <div class="col-md-4">
                            Term of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="term_of_payment" name="term_of_payment" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Details Rongsok </a>
                        </div>    
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="supplier_id" name="supplier_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($supplier_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->nama_supplier.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Contact Person
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="contact_person" name="contact_person" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Currency
                        </div>
                        <div class="col-md-8">
                            <select id="currency" name="currency" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cur(this.value);">
                                <option value="IDR">IDR</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="show_kurs">
                        <div class="col-md-4">
                            Kurs
                        </div>
                        <div class="col-md-8">
                            <input type="number" id="kurs" name="kurs" class="form-control myline" value="0" style="margin-bottom:5px">
                        </div>
                    </div>
                    <?php if($this->session->userdata('user_ppn')==1){?>
                    <div class="row">
                        <div class="col-md-4">
                            PPN
                        </div>
                        <div class="col-md-8">
                            <select id="ppn" name="ppn" class="form-control myline" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <?php } else{ ?>
                        <input type="hidden" id="ppn" name="ppn" value="0">
                    <?php } ?>
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
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#supplier_id").val()) == ""){
        $('#message').html("Silahkan pilih nama supplier!");
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
        url: "<?php echo base_url('index.php/BeliSparePart/get_contact_name'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#contact_person").val(result['pic']);
        } 
    });
}

function get_cur(id){
    if(id=='USD'){
        $('#show_kurs').show();
    }else if(id=='IDR'){
        $('#show_kurs').hide();
        $('#kurs').val(0);
    }
}
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $('#show_kurs').hide();   
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
      