<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Sales Order </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/add'); ?>"> Input Sales Order </a> 
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
              id="formku" action="<?php echo base_url('index.php/Tolling/save_tolling_fg'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="no_sales_order" name="no_sales_order" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_detail(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($so_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->no_sales_order.'</option>';
                                    }
                                ?>
                            </select>               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nama_customer" id="nama_customer" readonly="readonly" class="form-control myline" style="margin-bottom:5px">

                            <input type="hidden" name="id_customer" id="id_customer">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jumlah Item<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="jumlah_item" id="jumlah_item" readonly="readonly" class="form-control myline" style="margin-bottom:5px">
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
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Details Tolling FG </a>
                        </div>    
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
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
                            Marketing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="marketing" id="marketing" readonly="readonly" class="form-control myline" style="margin-bottom:5px">

                            <input type="hidden" name="marketing_id" id="marketing_id">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Netto Yang Di terima
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="netto" name="netto" readonly="readonly"
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
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#nama_customer").val()) == ""){
        $('#message').html("Silahkan pilih nama customer!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto").val()) == ""){
        $('#message').html("Netto Belum Ada");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function get_detail(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/Tolling/get_detail_so'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $('#nama_customer').val(result['nama_customer']);
            $('#id_customer').val(result['m_customer_id']);
            $('#jumlah_item').val(result['jumlah_item']);
            $('#contact_person').val(result['pic']);
            $('#marketing').val(result['nama_marketing']);
            $('#marketing_id').val(result['marketing_id']);
            $('#netto').val(result['netto']);
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
      