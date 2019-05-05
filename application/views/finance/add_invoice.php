<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/Invoice'); ?>"> Data Invoice </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add_invoice']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Finance/save_invoice'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pembayaran" name="no_pembayaran" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Auto generate">

                            <input type="hidden" id="flag_ppn" name="flag_ppn" value="<?= $ppn ;?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_pembuat" name="nama_pembuat" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Term Of Payment
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
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onclick="get_no_so(this.value);">
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
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="sales_order_id" name="sales_order_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_no_sj(this.value);">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="surat_jalan_id" name="surat_jalan_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="flag_tolling" name="flag_tolling">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Jatuh Tempo<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_jatuh" name="tanggal_jatuh" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;"
                                value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Currency
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="currency" name="currency" class="form-control myline" readonly="readonly">
                        </div>
                        <div id="show_kurs">
                        <div class="col-md-2">
                            Kurs
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="kurs" name="kurs" class="form-control myline" readonly="readonly">
                        </div>
                        </div>
                    </div>
                </div>         
            </div>
            <?php if($ppn == 1){ ?>
            <hr class="divider">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Nama Direktur
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_direktur" name="nama_direktur" class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Bank <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bank_id" name="bank_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($bank_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->nama_bank.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Diskon
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="diskon" name="diskon" class="form-control myline" style="margin-bottom:5px" value="0" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Biaya Tambahan
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="add_cost" name="add_cost" class="form-control myline" style="margin-bottom:5px" value="0" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Materai
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="materai" name="materai" class="form-control myline" style="margin-bottom:5px" value="0" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id)">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Input Details </a>
                            <a href="<?php echo base_url('index.php/Finance/invoice'); ?>" class="btn blue-hoki"> 
                            <i class="fa fa-angle-left"></i> Kembali </a>
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
function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    hitungSubTotal();
}

function get_no_so(id){
    const ppn = $('#flag_ppn').val();
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_so_list'); ?>",
        async: false,
        type: "POST",
        data: {id:id, ppn:ppn},
        dataType: "html",
        success: function(result) {
            $('#sales_order_id').html(result);
            $('#sales_order_id').select2('val','');
            $('#surat_jalan_id').select2('val','');
        }
    });
}

function get_no_sj(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_sj_list'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "html",
        success: function(result) {
            $('#surat_jalan_id').html(result);
            $('#surat_jalan_id').select2('val','');
        }
    });

    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_flag');?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#flag_tolling').val(result['flag_tolling']);
        }
    });

    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_currency_so'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#currency').val(result['currency']);
            $('#kurs').val(result['kurs']);
        }
    });
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#surat_jalan_id").val()) == ""){
        $('#message').html("Silahkan pilih Surat Jalan");
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
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
    $("#tanggal_jatuh").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
});
</script>