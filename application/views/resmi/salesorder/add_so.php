<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SO'); ?>"> Sales Order </a> 
            <i class="fa fa-angle-right"></i> Input Sales Order
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
              id="formku" action="<?php echo base_url('index.php/SO/save_so'); ?>">                            
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so"
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-md-4">
                            Marketing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="marketing_id" name="marketing_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($marketing_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->realname.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_barang" name="jenis_barang" data-placeholder="Silahkan pilih..." class="form-control myline select2me" style="margin-bottom:5px" required="required">
                                <option value=""></option>
                                <?php
                                    foreach ($option_jenis_barang as $v) {
                                        echo '<option value="'.$v->category.'">'.$v->category.'</option>';
                                    }
                                ?>           
                            </select>
                        </div>
                    </div> -->
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Details Order </a>
                        </div>    
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nomor PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="po_id" name="po_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onchange="get_tanggal(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php 
                                    foreach ($list_po as $row) {
                                        echo '<option value="'.$row->id.'">'.$row->no_po.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_po" name="tanggal_po" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->nama_customer.'</option>';
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
    if($.trim($("#no_so").val()) == ""){
        $('#message').html("Nomor SO harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#marketing_id").val()) == ""){
        $('#message').html("Silahkan pilih marketing!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show(); 
    }else if($.trim($("#po_id").val()) == ""){
        $('#message').html("Silahkan isi nomor PO!");
        $('.alert-danger').show();
    }else if($.trim($("#tanggal_po").val()) == ""){
        $('#message').html("Silahkan pilih tanggal PO!");
        $('.alert-danger').show();
    }else if($.trim($("#m_customer_id").val()) == ""){
        $('#message').html("Silahkan pilih nama customer!");
        $('.alert-danger').show(); 
    }else{   
        $('#formku').submit(); 
    };
};

function get_tanggal(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/SO/get_tanggal_po'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            console.log(result);
            $("#tanggal_po").val(result['tanggal']);
        } 
    });
}

function get_contact(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/SalesOrder/get_contact_name'); ?>",
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

$(function(){        
    $("#tanggal_po").datepicker({
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
      