<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance'); ?>"> Data Cek Masuk </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add_um']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <form class="eventInsForm" method="post" target="_self" name="formku" id="formku" action="<?php echo base_url('index.php/Finance/save'); ?>">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Cek Masuk
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="no_uang_masuk" id="no_uang_masuk" class="form-control myline" style="margin-bottom:5px" placeholder="Silahkan isi Nomor Uang Masuk ..." onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                </div>
            </div>              
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="customer_id" name="customer_id" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="resetAllValues();$('#show_replace').hide();$('#show_replace_detail').hide();$('#jenis_id').select2('val','');">
                                <option value=""></option>
                                <option value="0">**Tidak Ada Customer**</option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->nama_customer.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="show_jenis_pmb">
                        <div class="col-md-4">
                            Jenis Pembayaran <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_id" name="jenis_id" class="form-control myline select2me" 
                                placeholder="Silahkan pilih Jenis Pembayaran ..." onchange="get_cek(this.value);" style="margin-bottom:5px">
                                <option value="0"></option>
                                <option value="Lain-Lain">Lain-Lain</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="show_bank_tuj">
                        <div class="col-md-4">
                            Rekening Tujuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bank_id" name="bank_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value="0"></option>
                                <?php
                                    foreach ($bank_list as $row){
                                        echo '<option value="'.$row->id.'">('.$row->kode_bank.') '.$row->nomor_rekening.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row" id="show_rek_tuj">
                        <div class="col-md-4">
                            Rekening Tujuan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="bank_id" name="bank_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value="0"></option>
                                <?php
                                    foreach ($bank_list as $row){
                                        echo '<option value="'.$row->id.'">('.$row->kode_bank.') '.$row->nomor_rekening.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div> -->
                    <div class="row" id="show_cek_mu">
                        <div class="col-md-4">
                            Tanggal Cek Mundur<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_cek" name="tanggal_cek" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div> 
                    <div class="row" id="show_bank">
                        <div class="col-md-4">
                            Bank Pengirim
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="bank_pengirim" name="bank_pengirim" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row" id="show_rek">
                        <div class="col-md-4">
                            Rekening Pengirim
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="rek_pengirim" name="rek_pengirim" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row" id="show_nomor_cek">
                        <div class="col-md-4">
                            Nomor Cek
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_cek_pengirim" name="no_cek_pengirim" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Currency
                        </div>
                        <div class="col-md-8">
                            <select id="currency" name="currency" class="form-control myline select2me" data-placeholder="Silahkan pilih Currency..." style="margin-bottom:5px" onchange="get_cur(this.value);">
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
                            <input type="number" id="kurs" name="kurs" class="form-control myline" value="1" style="margin-bottom:5px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nominal
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nominal" name="nominal" class="form-control myline" style="margin-bottom:5px" onkeyup="getComa(this.value, this.id)">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-8">
                            <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                                <i class="fa fa-floppy-o"></i> Simpan </a>
                        </div>    
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                    <div class="row" id="show_replace">
                        <div class="col-md-4">
                            Nomor Cek Lama
                        </div>
                        <div class="col-md-8">
                            <select id="replace_id" name="id_replace" class="form-control myline" 
                                placeholder="Silahkan pilih ..." style="margin-bottom:5px" onchange="get_replace_detail(this.value);">
                            </select>
                        </div>
                    </div>
                <div id="show_replace_detail">
                    <div class="row">
                        <div class="col-md-4">
                            Bank Pembayaran Cek Lama
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="bank_cek_lama" name="bank_cek_lama" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Currency Cek Lama
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="currency_lama" name="currency_lama" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nominal Cek Lama
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nominal_lama" name="nominal_lama" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Cek Mundur Lama
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="cek_mundur_lama" name="cek_mundur_lama" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Keterangan Reject
                        </div>
                        <div class="col-md-8">
                            <textarea type="text" id="reject_remarks" name="reject_remarks" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly">
                            </textarea>
                        </div>
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
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function simpanData(){
    console.log($('#bank_id').val());
    if($.trim($("#no_uang_masuk").val()) == ""){
        $('#message').html("Nomor Uang Masuk harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#customer_id").val()) == ""){
        $('#message').html("Customer harus dipilih, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#currency").val()) == ""){
        $('#message').html("Currency harus dipilih, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#nominal").val()) == ""){
        $('#message').html("Nominal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jenis_id").val()) == 0){
        $('#message').html("Jenis Pembayaran harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($("#jenis_id").val() == "Cek" || $("#jenis_id").val() == "Cek Mundur"){
        if($.trim($("#replace_id").val()) == ""){
            $('#message').html("Cek Lama harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#no_cek_pengirim").val()) == ""){
            $('#message').html("Nomor Cek Pengirim harus diisi, tidak boleh kosong!");
            $('.alert-danger').show();
        }else if($.trim($("#bank_pengirim").val()) == ""){
            $('#message').html("Bank Pengirim harus diisi, tidak boleh kosong!");
            $('.alert-danger').show();
        }else if($('#jenis_id').val() == "Cek Mundur"){
            if($.trim($("#tanggal_cek").val()) == ""){
                $('#message').html("Tanggal Cek Mundur harus diisi, tidak boleh kosong!");
                $('.alert-danger').show();
            }else{
                formSubmit();
                // $('#formku').submit();
            }
        }else{
            formSubmit();
            // $('#formku').submit();
        }
    }else{
        if($.trim($("#bank_id").val()) == 0){
            $('#message').html("Rekening Tujuan harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else{
            formSubmit();
        }
        // $('#formku').submit(); 
    };
};

function formSubmit(){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/Finance/get_no_um'); ?>",
        data: {
            id: $('#no_uang_masuk').val(),
            jenis_id: $('#jenis_id').val(),
            bank_id: $('#bank_id').val(),
            tanggal: $('#tanggal').val()
        },
        cache: false,
        success: function(result) {
            var res = result['type'];
            if(res=='duplicate'){
                $('#message').html("Nomor Uang Masuk sudah ada, tolong coba lagi!");
                $('.alert-danger').show();
            }else{
                $('#message').html("");
                $('.alert-danger').hide();
                $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                $('#formku').submit();
            }
        }
    });
}

function getComa(value, id){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function get_replace(id){
    id_cust = $("#customer_id").val();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url('index.php/Finance/get_replace'); ?>",
        data: {
            id : id_cust,
            jenis : id
        },
        success:function(result){
            $('#replace_id').html(result);    
        }
    });
}

function get_replace_detail(id){
    if(id == 0){
        $('#show_replace_detail').hide();
        resetAllValues();
        $('#replace_id').prop('selectedIndex',1);
    }else{
        $.ajax({
            type:"POST",
            url:"<?php echo base_url('index.php/Finance/get_replace_detail'); ?>",
            data: {
                id : id
            },
            success:function(result){
                $('#show_replace_detail').show();
                $('#bank_cek_lama').val(result['bank_pembayaran']);
                $('#currency_lama').val(result['currency']);
                $('#nominal_lama').val(numberWithCommas(result['nominal']));
                $('#nominal').val(numberWithCommas(result['nominal']));
                $('#nominal').attr('readonly', true);
                $('#cek_mundur_lama').val(result['tgl_cair']);
                $('#reject_remarks').val(result['reject_remarks']);
            }
        });
    }
}

//Custom Functions that reset
function resetAllValues() {
  $('#show_replace_detail').find('input:text').val('');
  //$('#tanggal_cek').val('');
  $('#replace_id').prop('selectedIndex',0);
}

function get_cur(id){
    if(id=='USD'){
        $('#show_kurs').show();
    }else if(id=='IDR'){
        $('#show_kurs').hide();
        $('#kurs').val(1);
    }
}

function get_cek(id){
    if(id === "Cek") {
        resetAllValues();
        $('#show_rek').hide();
        // $("#show_rek_tuj").hide();
        $("#show_cek_mu").hide();
        $("#show_nomor_cek").hide();
        $("#show_replace").hide();
        $('#show_bank_tuj').hide();

        $("#show_bank").show();
        $("#show_replace").show();
        $("#show_nomor_cek").show();
        get_replace('Cek');
    }else if(id === "Cek Mundur") {
        resetAllValues();
        $('#show_rek').hide();
        // $("#show_rek_tuj").hide();
        $("#show_replace").hide();
        $('#show_bank_tuj').hide();

        $("#show_bank").show();
        $("#show_replace").show();
        $("#show_cek_mu").show();
        $("#show_nomor_cek").show();
        $("#tanggal_cek").datepicker({
            showOn: "button",
            buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
            buttonImageOnly: true,
            buttonText: "Select date",
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        get_replace('Cek Mundur');
    }else if(id === "Giro") {
        resetAllValues();
        $('#show_replace').hide();
        $('#show_replace_detail').hide();
        get_replace();
        $("#show_cek_mu").hide();
        $("#show_nomor_cek").hide();

        // $("#show_rek_tuj").show();
        $('#show_bank_tuj').show();
        $("#show_bank").show();
        $("#show_rek").show();
    }else if(id == "Transfer" || id == "Lain-Lain"){
        resetAllValues();
        $('#tanggal_cek').val($('#tanggal').val());
        console.log($('#tanggal_cek').val());
        $('#show_replace').hide();
        $('#show_replace_detail').hide();
        get_replace();
        $("#show_cek_mu").hide();
        $("#show_nomor_cek").hide();

        // $("#show_rek_tuj").show();
        $('#show_bank_tuj').show();
        $("#show_bank").show();
        $("#show_rek").show();
    }else if(id === "Cash") {
        resetAllValues();
        $('#show_replace').hide();
        $('#show_replace_detail').hide();
        get_replace();
        $('#show_rek').hide();
        // $("#show_rek_tuj").hide();
        $("#show_bank").hide();
        $("#show_cek_mu").hide();
        $("#show_nomor_cek").hide();

        $('#show_bank_tuj').show();
    }
};
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){
        $('#show_replace_detail').hide();
        $('#show_rek').hide();
        $("#show_rek_tuj").hide();
        $("#show_bank").hide();
        $("#show_cek_mu").hide();
        $("#show_nomor_cek").hide();
        $("#show_replace").hide();
        $("#show_bank_tuj").hide();
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
      