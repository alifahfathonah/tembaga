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
                            <!-- <input id="jenis_masak" name="jenis_masak" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?= $pil_masak ?>" type="text"> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_barang" name="jenis_barang" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px;" onchange="pilih_data(this.value,6)">
                                <option value=""></option>
                                <?php 
                                foreach($jenis_barang as $k){
                                ?>
                                <option value="<?=$k->id;?>"><?=$k->jenis_barang;?></option>
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
                    <!-- <div class="row hidden disabled" id="div_spb_rolling">
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
                    </div> -->
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
                            Keterangan
                        </div>
                        <div class="col-md-8">
                            <textarea id="keterangan" name="keterangan" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"></textarea>
                        </div>
                    </div>
                    <!-- ROLLING 
                    <div class="hidden disabled" id="div_data_spb">
                        <div class="row">
                            <div class="col-md-3">
                                Jumlah Ingot
                            </div>
                            <div class="col-md-3">
                                <input id="jml_ingot" name="jml_ingot" class="form-control myline" style="margin-bottom:5px" value="" type="text">
                            </div>
                            <div class="col-md-3">
                                Berat Ingot
                            </div>
                            <div class="col-md-3">
                                <input id="berat_ingot" name="berat_ingot" class="form-control myline" style="margin-bottom:5px" value="" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                Susut Jumlah
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="susut_jumlah_ingot" name="susut_jumlah_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                            </div>
                            <div class="col-md-2">
                                Susut Berat
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="susut_berat_ingot" name="susut_berat_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                            </div>
                        </div>
                    </div>
                     ROLLING -->
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
                                <input type="text" id="susut_berat_kh" name="susut_berat_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                            </div>
                        </div>
                    </div>
                    <!-- CUCI -->
                </div>
            </div>
            <!-- BAKAR ULANG-->
            <div class="col-md-8 hidden disabled" id="div_stok_keras">
                <div class="row">
                    <?php $jumlah = $stok_keras['total_qty_in'] - $stok_keras['total_qty_out'];?>
                    <!-- <div class="col-md-2">
                        Stok Jumlah
                    </div>
                    <div class="col-md-2">
                    <input type="text" id="stok_jumlah" name="stok_jumlah" class="form-control myline" style="margin-bottom:5px;float:left;" value="<?php echo $jumlah;?>" readonly>
                    </div> -->
                    <div class="col-md-2">
                        Jumlah yang Digunakan
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="jml_ingot_keras" name="jml_ingot_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" value="<?php echo $jumlah;?>" readonly="readonly">
                    </div>
                    <div class="col-md-2">
                        Susut Jumlah
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="susut_jumlah_keras" name="susut_jumlah_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" readonly>
                    </div>
                </div>
                <div class="row">
                    <?php $berat = $stok_keras['total_berat_in'] - $stok_keras['total_berat_out'];?>
                    <!-- <div class="col-md-2"> 
                        Stok Berat
                    </div>
                    <div class="col-md-2">
                    <input type="text" id="stok_keras" name="stok_keras" class="form-control myline" style="margin-bottom:5px;float:left;" value="<?php echo $berat;?>" readonly>
                    </div> -->
                    <div class="col-md-2">
                        Berat yang Digunakan
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="jml_berat_keras" name="jml_berat_keras" class="form-control myline" style="margin-bottom: 5px;float: left;" value="<?=$berat;?>" readonly>
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
<!-- <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"> -->
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
                                value="" placeholder="Jumlah Kawat Hitam" onchange="hitung_susut_jumlah();"/>
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
                <div class="row" id="div_kawat_keras">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Jumlah Kawat Keras </label>
                                <input type="text" id="jml_keras_in" name="jml_keras" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Kawat Hitam Keras"/>
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
                                value="" placeholder="Berat Kawat Hitam Keras"/>
                                <label> Kg </label>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row" id="div_gas">
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Gas Kiri</label>
                                <input type="text" id="gas" name="gas" 
                                class="form-control myline" size="25" 
                                value="0" placeholder="Input Gas Kiri...">
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Gas Kanan</label>
                                <input type="text" id="gas_r" name="gas_r" 
                                class="form-control myline" size="25" 
                                value="0" placeholder="Input Gas Kanan...">
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="dtr" style="display: none;">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th style="width:20%">Nama Item Rongsok</th>
                                <th style="width: 15%;">Bruto (Kg)</th>
                                <th style="width: 10%;">Berat Palette</th>
                                <th style="width: 15%;">Netto (Kg)</th>
                                <th></th>
                                <th style="width:15%">No. Pallete</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                            <tr>
                                <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                <input type="hidden" id="po_id_1" name="myDetails[1][po_detail_id]" value="">
                                <input type="hidden" id="rongsok_id_1" name="myDetails[1][rongsok_id]" value="">
                                <td><select id="name_rongsok_1" name="myDetails[1][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom_po(this.value,1);">
                                    <option value=""></option>
                                    <?php foreach ($rongsok as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?='('.$value->kode_rongsok.') '.$value->nama_item;?>
                                            </option>
                                    <?php } ?>
                                </select>
                                </td>
                                <td><input type="number" id="bruto_1" name="myDetails[1][bruto]" class="form-control myline" value="0" maxlength="10"></td>
                                <td><input type="number" id="berat_palette_1" name="myDetails[1][berat_palette]" class="form-control myline" value="0" maxlength="10"></td>
                                <td><input type="text" id="netto_1" name="myDetails[1][netto]" class="form-control myline" value="0" maxlength="10" readonly="readonly" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>
                                <td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto(1);"> <i class="fa fa-dashboard"></i> Timbang </a></td>                          
                                <td><input type="text" name="myDetails[1][no_pallete]" id="no_pallete_1"class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" readonly="readonly"></td>
                                <td style="text-align:center">
                                    <a id="save_1" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail(1);" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                    <a id="print_1" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode(1);" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total :</strong></td>
                                    <td><input type="text" id="total_bruto" class="form-control" readonly="readonly"></td>
                                    <td><input type="text" id="total_berat" class="form-control" readonly="readonly"></td>
                                    <td><input type="text" id="total_netto" name="bs" class="form-control" readonly="readonly" value="0"></td>
                                    <td colspan="4"></td>
                                </tr>
                            </tfoot>
                        </table>
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
                <input type="hidden" name="gas" value="0">
                <input type="hidden" name="gas_r" value="0">
                <br>
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Serbuk</label>
                                <input type="text" id="berat_serbuk_km" name="serbuk"
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat Serbuk" onchange="hitung_susut_berat();"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat BS </label>
                                <input type="text" id="berat_bs_km" name="bs" 
                                class="form-control myline" size="25" 
                                value="" placeholder="Berat BS" onchange="hitung_susut_berat();"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div> -->
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
    $('#berat_bs_8m').val('');
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
        var susut = Number(Number($('#berat_ingot').val()) - (Number($('#berat_kh_in').val()) + Number($('#berat_keras_in').val()) + Number($('#berat_bs_8m').val()) + Number($('#berat_bs_rolling').val()) + Number($('#berat_serbuk_in').val()) + Number($('#berat_bs_ingot').val())));
        $('#susut_berat_ingot').val(susut);
    }else if($('#jenis_masak').val()=='BAKAR ULANG'){
        var susut = Number(Number($('#jml_berat_keras').val()) - (Number($('#berat_kh_in').val()) + Number($('#berat_keras_in').val()) + Number($('#total_netto').val())));
        $('#susut_berat_keras').val(susut);
    }else if($('#jenis_masak').val()=='CUCI'){
        var susut = Number(Number($('#berat_kawat_hitam').val()) - Number($('#berat_km_in').val()));
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

//DTR
function timbang_netto(id){
    var bruto = $("#bruto_"+id).val();
    var berat_palette = $("#berat_palette_"+id).val();
    var total_netto = bruto - berat_palette;
    const netto = total_netto.toFixed(2);
    $("#netto_"+id).val(netto);
}

function get_uom_po(id, nmr){
    // var idpo = $('#po_id').val();
    if($.trim($('#name_rongsok_'+nmr).val())!=''){
        $.ajax({
            url: "<?php echo base_url('index.php/BeliRongsok/get_uom_po'); ?>",
            type: "POST",
            data: {iditem: id},
            dataType: "json",
            success: function(result) {
                $('#rongsok_id_'+nmr).val(result['id']);
            }
        });
    }
}

function saveDetail(id){
    if($.trim($("#name_rongsok_"+id).val()) == ""){
        $('#message').html("Silahkan pilih nama item rongsok!");
        $('.alert-danger').show(); 
    }else if($.trim($("#bruto_"+id).val()) == "" || 0){
        $('#message').html("Jumlah bruto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto_"+id).val()) == ("" || 0)){
        $('#message').html("Jumlah netto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            url: "<?php echo base_url('index.php/BeliRongsok/generate_palette'); ?>",
            type: "POST",
            data: {
                id:id,
                tanggal: $('#tanggal').val()
            },
            dataType: "json",
            success: function(result){
                $('#no_pallete_'+id).val(result['no_packing']);
            }
        });
        $('#total_bruto').val((Number($('#total_bruto').val())+Number($('#bruto_'+id).val())).toFixed(2));
        $('#total_berat').val((Number($('#total_berat').val())+Number($('#berat_palette_'+id).val())).toFixed(2));
        $('#total_netto').val((Number($('#total_netto').val())+Number($('#netto_'+id).val())).toFixed(2));
        $("#name_rongsok_"+id).attr('disabled','disabled');
        $("#save_"+id).hide();
        $('#qty_'+id).attr('readonly','readonly');
        $('#bruto_'+id).attr('readonly','readonly');
        $('#berat_palette_'+id).attr('readonly','readonly');
        $('#no_pallete_'+id).attr('readonly','readonly');
        $("#print_"+id).show();
        $("#delete_"+id).removeClass('disabled');
        var new_id = id+1; 
        $("#tabel_dtr>tbody").append(
            '<tr>'+
                '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<input type="hidden" id="po_id_'+new_id+'" name="myDetails['+new_id+'][po_detail_id]" value="">'+
                '<input type="hidden" id="rongsok_id_'+new_id+'" name="myDetails['+new_id+'][rongsok_id]" value="">'+
                '<td><select id="name_rongsok_'+new_id+'" name="myDetails['+new_id+'][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom_po(this.value,'+new_id+');">'+
                    '<option value=""></option>'+
                    '<?php foreach($rongsok as $v){ print('<option value="'.$v->id.'">('.$v->kode_rongsok.') '.$v->nama_item.'</option>');}?>'+
                '</select>'+
                '</td>'+
                '<td><input type="number" id="bruto_'+new_id+'" name="myDetails['+new_id+'][bruto]" class="form-control myline" value="0" maxlength="10"></td>'+
                '<td><input type="text" id="berat_palette_'+new_id+'" name="myDetails['+new_id+'][berat_palette]" class="form-control myline" value="0" maxlength="10"></td>'+
                '<td><input type="text" id="netto_'+new_id+'" name="myDetails['+new_id+'][netto]" class="form-control myline" value="0" maxlength="10" readonly="readonly" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>'+
                '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto('+new_id+');"> <i class="fa fa-dashboard"></i> Timbang </a></td>'+
                '<td><input type="text" name="myDetails['+new_id+'][no_pallete]" id="no_pallete_'+new_id+'"class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" readonly="readonly"></td>'+
                '<td style="text-align:center"><a id="save_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail('+new_id+');" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>'+
                    '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>'+
                ' <a id="print_'+new_id+'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('+new_id+');" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a>'+
                '</td>'+
            '</tr>'
        );
        $('#name_rongsok_'+new_id).select2();
        hitung_susut_berat();
    }
}

function deleteDetail(id){
    var r=confirm("Anda yakin menghapus item rongsok ini?");
    if (r==true){
        $('#total_bruto').val(Number($('#total_bruto').val())-Number($('#bruto_'+id).val()));
        $('#total_berat').val(Number($('#total_berat').val())-Number($('#berat_palette_'+id).val()));
        $('#total_netto').val(Number($('#total_netto').val())-Number($('#netto_'+id).val()));
        $('#no_tabel_'+id).closest('tr').remove();
    }
    hitung_susut();
}

function pilih_data(id){
    if(id == 'ROLLING'){
        $('#div_kawat_merah_masuk').addClass('hidden disabled');
        $('#div_stok_keras').addClass('hidden disabled');
        $('#div_spb_cuci').addClass('hidden disabled');
        $('#div_data_spb_kh').addClass('hidden disabled');
        $('#id_spb_kh').prop("disabled", true);
        $('#id_spb_ingot').prop("disabled", false);
        $('#div_data_spb').removeClass('hidden disabled');
        $('#div_kawat_hitam_masuk').removeClass('hidden disabled');
        $('#div_spb_rolling').removeClass('hidden disabled');
        // $('#id_jenis_barang').val('6');
        $('#div_kawat_hitam_masuk :input').attr('disabled', false);
        $('#div_kawat_merah_masuk :input').attr('disabled', true);
        $('#div_data_spb :input').attr('disabled', false);
        $('#div_data_spb_kh :input').attr('disabled', true);
        $('#div_stok_keras :input').attr('disabled', true);
        $('#dtr').show();
        $('#div_kawat_keras').show();
        reset_values();
        $("#id_spb_ingot").select2("val", "");
    }else if(id == 'BAKAR ULANG'){
        $('#div_kawat_merah_masuk').addClass('hidden disabled');
        $('#div_spb_rolling').addClass('hidden disabled');
        $('#div_data_spb').addClass('hidden disabled');
        $('#div_spb_cuci').addClass('hidden disabled');
        $('#div_data_spb_kh').addClass('hidden disabled');
        $('#id_spb_kh').prop("disabled", true);
        $('#id_spb_ingot').prop("disabled", true);
        $('#div_kawat_hitam_masuk').removeClass('hidden disabled');
        $('#div_stok_keras').removeClass('hidden disabled');
        // $('#id_jenis_barang').val('6');
        $('#div_kawat_hitam_masuk :input').attr('disabled', false);
        $('#div_kawat_merah_masuk :input').attr('disabled', true);
        $('#div_data_spb :input').attr('disabled', true);
        $('#div_data_spb_kh :input').attr('disabled', true);
        $('#div_stok_keras :input').attr('disabled', false);
        $('#dtr').show();
        $('#div_kawat_keras').hide();
        reset_values();
    }else if(id == 'CUCI'){
        $('#div_spb_rolling').addClass('hidden disabled');
        $('#div_kawat_hitam_masuk').addClass('hidden disabled');
        $('#div_stok_keras').addClass('hidden disabled');
        $('#div_data_spb').addClass('hidden disabled');
        $('#id_spb_kh').prop("disabled", false);
        $('#id_spb_ingot').prop("disabled", true);
        $('#div_data_spb_kh').removeClass('hidden disabled');
        $('#div_spb_cuci').removeClass('hidden disabled');
        $('#div_kawat_merah_masuk').removeClass('hidden disabled');
        // $('#id_jenis_barang').val('5');
        $("#id_spb_kh").select2("val", "");
        $('#jml_kawat_hitam').val('');
        $('#berat_kawat_hitam').val('');
        $('#qty_km').val('');
        $('#berat_km_in').val('');
        $('#berat_serbuk_km').val('');
        $('#susut_jumlah_kh').val('');
        $('#susut_berat_kh').val('');
        $('#div_kawat_hitam_masuk :input').attr('disabled', true);
        $('#div_kawat_merah_masuk :input').attr('disabled', false);
        $('#div_data_spb :input').attr('disabled', true);
        $('#div_data_spb_kh :input').attr('disabled', false);
        $('#div_stok_keras :input').attr('disabled', true);
    }
}

function simpanData(){
    id = $('#jenis_masak').val();
    if(id == 'ROLLING'){
        // if($.trim($("#id_spb_ingot").val()) == ""){
        //     $('#message').html("SPB harus diisi, tidak boleh kosong!");
        //     $('.alert-danger').show(); 
        // }else
        if($.trim($("#jenis_barang").val()) == ""){
            $('#message').html("Jenis Barang harus dipilih, tidak boleh kosong!");
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
        if($.trim($("#jenis_barang").val()) == ""){
            $('#message').html("Jenis Barang harus dipilih, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#jml_ingot_keras").val()) == ("" || 0)){
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
        if($.trim($("#jenis_barang").val()) == ""){
            $('#message').html("Jenis Barang harus dipilih, tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#id_spb_kh").val()) == ""){
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