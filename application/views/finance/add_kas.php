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
            if( ($group_id==1)||($hak_akses['add_spb']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Finance/save_kas'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Nominal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nominal" name="nominal" class="form-control myline" style="margin-bottom:5px;" placeholder="Nominal" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Bank Tujuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bank_id" name="bank_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_currency(this.value);">
                                <option value="0">Masuk ke Kas</option>
                                <?php
                                    foreach ($bank_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->kode_bank.' ('.$row->nomor_rekening.')'.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Currency <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="currency" name="currency" class="form-control myline" style="margin-bottom:5px;" placeholder="Nominal" value="IDR" readonly="readonly">
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
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
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
                <div class="col-md-1">&nbsp;</div>
                <!-- <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Uang Masuk <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="um_id" name="um_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onclick="get_data_um(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($um_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->no_uang_masuk.' ('.$row->jenis_pembayaran.')</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Pembayaran
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_pembayaran" name="jenis_pembayaran" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Bank Pembayaran
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="bank_pembayaran" name="bank_pembayaran" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Rekening Pembayaran/Nomor Cek
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="rekening_nomor" name="rekening_nomor" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nominal
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nominal_view" name="nominal_view" 
                                class="form-control" style="margin-bottom:5px" readonly="readonly">

                            <input type="hidden" id="currency" name="currency">
                            <input type="hidden" id="nominal" name="nominal">
                        </div>
                    </div>
                </div> -->
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

function numberWithCommas(x) {
     return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function get_currency(id){
    if(id > 0){
        $.ajax({
            url: "<?php echo base_url('index.php/Finance/get_currency'); ?>",
            type: "POST",
            data: "id="+id,
            dataType: "json",
            success: function(result) {
                $('#currency').val(result['currency']);
            }
        });
    }else{
        $('#currency').val('IDR');
    }
}

function get_data_um(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Finance/get_data_um'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            if(result['rekening_tujuan'] != 0){
                $('#bank_id').select2('val', result['rekening_tujuan']);
            }
            $('#nama_customer').val(result['nama_customer']);
            $('#jenis_pembayaran').val(result['jenis_pembayaran']);
            $('#bank_pembayaran').val(result['bank_pembayaran']);
            $('#rekening_nomor').val(result['rekening_pembayaran']+result['nomor_cek']);
            $('#nominal_view').val(result['currency']+' '+numberWithCommas(result['nominal']));
            $('#nominal').val(result['nominal']);
            $('#currency').val(result['currency']);
        }
    });
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#bank_id").val()) == ""){
        $('#message').html("Bank Tujuan harus dipilih!");
        $('.alert-danger').show(); 
    // }else if($.trim($("#um_id").val()) == ""){
    //     $('#message').html("Uang Masuk harus dipilih, tidak boleh kosong!");
    //     $('.alert-danger').show(); 
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
        dateFormat: 'dd-mm-yy'
    });       
});
</script>