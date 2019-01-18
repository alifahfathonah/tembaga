<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/add_produksi'); ?>"> Gudang WIP </a> 
        </h5>          
    </div>
</div>

<form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/GudangWIP/save_proses_wip'); ?>">
<div class="row">&nbsp;</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Produksi WIP <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input id="no_produksi" name="no_produksi" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="Auto generate" type="text">
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
                            Pilih Proses <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_masak" name="jenis_masak" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px;" onchange="pilih_data(this.value,6)">
                                <option value=""></option>
                                <?php 
                                foreach($pil_masak as $k=>$pm){
                                ?>
                                <option value="<?php echo $k; ?>"><?php echo $pm; ?> </option>
                                <?php } ?>    
                            </select>   
                        </div>
                    </div>
                    <div class="row hidden disabled" id="div_spb_cuci">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="id_spb_kh" name="id_spb" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px;" onchange="get_data(this.value,6);">
                                <option value=""></option>
                                <?php
                                foreach($spb_kawat_hitam as $v){
                                ?>
                                <option value="<?php echo $v->id; ?>"><?php echo $v->no_spb_wip; ?> </option>
                                <?php } ?>    
                            </select>   
                        </div>
                    </div>
                    <div class="row hidden disabled" id="div_spb_rolling">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="id_spb_ingot" name="id_spb" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px;" onchange="get_data(this.value,2);">
                                <option value=""></option>
                                <?php
                                foreach($spb_ingot as $v){
                                ?>
                                <option value="<?php echo $v->id; ?>"><?php echo $v->no_spb_wip; ?> </option>
                                <?php } ?>    
                            </select>   
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input id="nama_pic" name="nama_pic" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="<?php echo $this->session->userdata('realname');?>" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            KETERANGAN
                        </div>
                        <div class="col-md-8">
                            <textarea id="keterangan" name="keterangan" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                    <!-- ROLLING -->
                    <div class="hidden disabled" id="div_data_spb">
                        <div class="row">
                            <div class="col-md-3">
                                Jumlah Ingot
                            </div>
                            <div class="col-md-3">
                                <input id="jml_ingot" name="jml_ingot" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="" type="text">
                            </div>
                            <div class="col-md-3">
                                Berat Ingot
                            </div>
                            <div class="col-md-3">
                                <input id="berat_ingot" name="berat_ingot" class="form-control myline" style="margin-bottom:5px" readonly="readonly" value="" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                Susut Jumlah
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="susut_jumlah_ingot" name="susut_jumlah_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                            </div>
                            <div class="col-md-2">
                                Susut Berat
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="susut_berat_ingot" name="susut_berat_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- ROLLING -->
                    <!-- CUCI -->
                    <div class="hidden disabled" id="div_data_spb_kh">
                        <div class="row">
                            <div class="col-md-3">
                                Jumlah Kawat Hitam
                            </div>
                            <div class="col-md-3">
                                <input id="jml_kawat_hitam" name="jml_kawat_hitam" class="form-control myline" style="margin-bottom:5px" readonly="readonly" type="text">
                            </div>
                            <div class="col-md-3">
                                Berat Kawat Hitam
                            </div>
                            <div class="col-md-3">
                                <input id="berat_kawat_hitam" name="berat_kawat_hitam" class="form-control myline" style="margin-bottom:5px" readonly="readonly" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                Susut Jumlah
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="susut_jumlah_kh" name="susut_jumlah_kh" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                            </div>
                            <div class="col-md-3">
                                Susut Berat
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="susut_berat_kh" name="susut" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- CUCI -->
                </div>
            </div>
            <!-- BAKAR ULANG-->
            <div class="col-md-8 hidden disabled" id="div_stok_keras">
                <div class="row">
                    <div class="col-md-2">
                        Stok Jumlah
                    </div>
                    <div class="col-md-2">
                    <?php $jumlah = $stok_keras['total_qty_in'] - $stok_keras['total_qty_out'];?>
                    <input type="text" id="stok_jumlah" name="stok_jumlah" class="form-control myline" style="margin-bottom:5px;float:left;" value="<?php echo $jumlah;?>" readonly>
                    </div>
                    <div class="col-md-2">
                        Jumlah yang Digunakan
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="jml_ingot_keras" name="jml_ingot_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" onchange="cek_jumlah();">
                    </div>
                    <div class="col-md-2">
                        Susut Jumlah
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="susut_jumlah_keras" name="susut_jumlah_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"> 
                        Stok Berat
                    </div>
                    <div class="col-md-2">
                    <?php $berat = $stok_keras['total_berat_in'] - $stok_keras['total_berat_out'];?>
                    <input type="text" id="stok_keras" name="stok_keras" class="form-control myline" style="margin-bottom:5px;float:left;" value="<?php echo $berat;?>" readonly>
                    </div>
                    <div class="col-md-2">
                        Berat yang Digunakan
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="jml_berat_keras" name="jml_berat_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" onchange="cek_berat();">
                    </div>
                    <div class="col-md-2">
                        Susut Berat
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="susut_berat_keras" name="susut_berat_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                    </div>
                </div>
            </div>
            <!-- BAKAR ULANG-->
    </div>
</div>

<hr class="divider"/>

<h4 class="text-center">Hasil Masak WIP</h4>
<!-- kolom isian hasil produksi wip-->
<input type="hidden" id="id_jenis_barang" name="id_jenis_barang">
<div class="row"> 
    <div id="div_kawat_hitam_masuk" class="hidden disabled">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Jumlah Kawat Hitam </label>
                                <input type="text" id="qty_kh_in" name="qty_kh" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Jumlah Kawat Hitam" onchange="hitung_susut_jumlah();" />
                                <!-- <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"> -->
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Kawat Hitam </label>
                                <input type="text" id="berat_kh_in" name="berat_kh" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Kawat Hitam" onchange="hitung_susut_berat();"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Jumlah Kawat Keras </label>
                                <input type="text" id="jml_keras_in" name="jml_keras" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Kawat Hitam Keras" onchange="hitung_susut_jumlah();"/>
                                <label> Roll</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Kawat Keras </label>
                                <input type="text" id="berat_keras_in" name="berat_keras" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Kawat Hitam Keras" onchange="hitung_susut_berat();"/>
                                <label> Kg </label>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                            <label>Berat Serbuk</label>
                            <input id="berat_serbuk_in" name="serbuk" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Serbuk" onchange="hitung_susut_berat();"/>
                                <label> Kg </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat BS </label>
                                <input type="text" id="berat_bs_in" name="bs" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat BS" onchange="hitung_susut_berat();"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Tali Rolling </label>
                                <input type="text" id="berat_tali_rolling" name="tali_rolling" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Tali Rolling" onchange="hitung_susut_berat();"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <br/>
                <br/>
                <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-save"></i> Proses Masukan Kawat Hitam </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="div_kawat_merah_masuk" class="hidden disabled">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Jumlah Kawat Merah</label>
                                <input type="text" id="qty_km_in" name="qty_km" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Jumlah Kawat Merah" onchange="hitung_susut_jumlah();"/>
                                <!-- <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"> -->
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Kawat Merah</label>
                                <input type="text" id="berat_km_in" name="berat_km" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Kawat Merah" onchange="hitung_susut_berat();"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Serbuk</label>
                                <input type="text" id="berat_serbuk_km" name="serbuk"
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Serbuk" onchange="hitung_susut_berat();"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat BS </label>
                                <input type="text" id="berat_bs_km" name="bs" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat BS" onchange="hitung_susut_berat();"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <br/><br/>
                <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-save"></i> Proses Masukan Kawat Merah </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</form> 
<script>
function reset_values(){
    $('#qty_kh_in').val('');
    $('#jml_keras_in').val('');
    $('#berat_kh_in').val('');
    $('#berat_keras_in').val('');
    $('#berat_tali_rolling').val('');
    $('#berat_bs_in').val('');
    $('#berat_serbuk_in').val('');
}
function hitung_susut_jumlah(){
    if($('#jenis_masak').val()=='ROLLING'){
        var susut = Number(Number($('#jml_ingot').val()) - (Number($('#qty_kh_in').val()) + Number($('#jml_keras_in').val())));
        $('#susut_jumlah_ingot').val(susut);
    }else if($('#jenis_masak').val()=='BAKAR ULANG'){
        var susut = Number(Number($('#jml_ingot_keras').val()) - (Number($('#qty_kh_in').val()) + Number($('#jml_keras_in').val())));
        $('#susut_jumlah_keras').val(susut);
    }else if($('#jenis_masak').val()=='CUCI'){
        var susut = Number(Number($('#jml_kawat_hitam').val()) - (Number($('#qty_km_in').val())));
        $('#susut_jumlah_kh').val(susut);
    }
}
function hitung_susut_berat(){
    if($('#jenis_masak').val()=='ROLLING'){
        var susut = Number(Number($('#berat_ingot').val()) - (Number($('#berat_kh_in').val()) + Number($('#berat_keras_in').val()) + Number($('#berat_tali_rolling').val()) + Number($('#berat_bs_in').val()) + Number($('#berat_serbuk_in').val())));
        $('#susut_berat_ingot').val(susut);
    }else if($('#jenis_masak').val()=='BAKAR ULANG'){
        var susut = Number(Number($('#jml_berat_keras').val()) - (Number($('#berat_kh_in').val()) + Number($('#berat_keras_in').val()) + Number($('#berat_tali_rolling').val()) + Number($('#berat_bs_in').val()) + Number($('#berat_serbuk_in').val())));
        $('#susut_berat_keras').val(susut);
    }else if($('#jenis_masak').val()=='CUCI'){
        var susut = Number(Number($('#berat_kawat_hitam').val()) - (Number($('#berat_km_in').val()) + Number($('#berat_bs_km').val()) + Number($('#berat_serbuk_km').val())));
        $('#susut_berat_kh').val(susut);
    }
}
function cek_jumlah(){
    if (Number($('#jml_ingot_keras').val()) > Number($('#stok_jumlah').val())){
        $('#message').html("Jumlah melebihi stok"); 
        $('.alert-danger').show();
        $('#jml_ingot_keras').val(0);
    }else{
        hitung_susut_jumlah();
    }
}
function cek_berat(){
    if (Number($('#jml_berat_keras').val()) > Number($('#stok_keras').val())){
        $('#message').html("Berat melebihi stok"); 
        $('.alert-danger').show();
        $('#jml_berat_keras').val(0);
    }else{
        hitung_susut_berat();
    }
}
function get_data(id,jb){
    $.ajax({
        url: "<?php echo base_url('index.php/GudangWIP/get_spb'); ?>",
        type: "POST",
        data: {
            id:id,
            jb:jb
        },
        dataType: "json",
        success: function(result){
            if(jb==2){
                $('#jml_ingot').val(result['qty']);
                $('#berat_ingot').val(result['berat']);
                hitung_susut_berat();
                hitung_susut_jumlah();
            }else if(jb==6){
                $('#jml_kawat_hitam').val(result['qty']);
                $('#berat_kawat_hitam').val(result['berat']);
                hitung_susut_berat();
                hitung_susut_jumlah();
            }
        }
    });
}
function pilih_data(id){
    if(id == 'ROLLING'){
        $('#div_kawat_merah_masuk').addClass('hidden disabled');
        $('#div_stok_keras').addClass('hidden disabled');
        $('#div_spb_cuci').addClass('hidden disabled');
        $('#div_data_spb_kh').addClass('hidden disabled');
        $('#div_data_spb').removeClass('hidden disabled');
        $('#div_kawat_hitam_masuk').removeClass('hidden disabled');
        $('#div_spb_rolling').removeClass('hidden disabled');
        $('#id_jenis_barang').val('6');
        reset_values();
        $("#id_spb_ingot").select2("val", "");
    }else if(id == 'BAKAR ULANG'){
        $('#div_kawat_merah_masuk').addClass('hidden disabled');
        $('#div_spb_rolling').addClass('hidden disabled');
        $('#div_data_spb').addClass('hidden disabled');
        $('#div_spb_cuci').addClass('hidden disabled');
        $('#div_data_spb_kh').addClass('hidden disabled');
        $('#div_kawat_hitam_masuk').removeClass('hidden disabled');
        $('#div_stok_keras').removeClass('hidden disabled');
        $('#id_jenis_barang').val('6');
        reset_values();
    }else if(id == 'CUCI'){
        $('#div_spb_rolling').addClass('hidden disabled');
        $('#div_kawat_hitam_masuk').addClass('hidden disabled');
        $('#div_stok_keras').addClass('hidden disabled');
        $('#div_data_spb').addClass('hidden disabled');
        $('#div_data_spb_kh').removeClass('hidden disabled');
        $('#div_spb_cuci').removeClass('hidden disabled');
        $('#div_kawat_merah_masuk').removeClass('hidden disabled');
        $('#id_jenis_barang').val('5');
        $("#id_spb_kh").select2("val", "");
        $('#jml_kawat_hitam').val('');
        $('#berat_kawat_hitam').val('');
        $('#qty_km').val('');
        $('#berat_km_in').val('');
        $('#berat_serbuk_km').val('');
        $('#berat_bs_km').val('');
        $('#susut_jumlah_kh').val('');
        $('#susut_berat_kh').val('');
    }
}
function simpanData(){
    id = $('#jenis_masak').val();
    if(id == 'ROLLING'){
        if($.trim($("#id_spb_ingot").val()) == ""){
            $('#message').html("SPB harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#qty_kh_in").val()) == ""){
            $('#message').html("Jumlah Kawat Hitam harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#berat_kh_in").val()) == ""){
            $('#message').html("Berat Kawat Hitam harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else{
            $('#formku').submit();
        }
    }else if(id == 'BAKAR ULANG'){
        if($.trim($("#jml_ingot_keras").val()) == ("" || 0)){
            $('#message').html("Jumlah Ingot Keras harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($('#jml_berat_keras').val()) == ("" || 0)){
            $('#message').html("Berat Ingot Keras harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#qty_kh_in").val()) == ""){
            $('#message').html("Jumlah Kawat Hitam harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#berat_kh_in").val()) == ""){
            $('#message').html("Berat Kawat Hitam harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else{
            $('#formku').submit();
        }
    }else if(id == 'CUCI'){
        if($.trim($("#id_spb_kh").val()) == ""){
            $('#message').html("SPB harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#qty_km_in").val()) == ""){
            $('#message').html("Jumlah Kawat Merah harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#berat_km_in").val()) == ""){
            $('#message').html("Berat Kawat Merah harus diisi, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else{
            $('#formku').submit();
        }
    }
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
      