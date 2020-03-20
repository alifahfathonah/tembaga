<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Produksi Ingot
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/hasil_produksi2'); ?>"> Input Hasil Produksi 2 </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1 || $group_id == 21)||($hak_akses['add_produksi']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Ingot/save_produksi2'); ?>">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Masak <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="no_produksi" name="no_masak" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onclick="get_detail_produksi(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($no_produksi_list as $row){
                                        echo '<option value="'.$row->id.'">'.$row->no_produksi.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tipe Rongsok<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="tipe_rongsok" name="tipe_rongsok" class="form-control myline select2me" data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="D">D</option>
                                <option value="Ampas">Ampas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Produksi
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_prd" name="tgl_prd" readonly="readonly" placeholder="akan terisi otomatis" 
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Tipe Apolo
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tipe_apolo" name="tipe_apolo" readonly="readonly" placeholder="akan terisi otomatis" 
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb_rongsok" readonly="readonly" placeholder="akan terisi otomatis" 
                                class="form-control myline" style="margin-bottom:5px">
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-4">
                            Total Rongsok <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="total_rongsok" name="total_rongsok" readonly="readonly" placeholder="Total Berat Rongsok" 
                                class="form-control myline" style="margin-bottom:5px">
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
                </div>              
            </div>
            <div class="row">&nbsp;</div>
                <div class="row">                            
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                INGOT <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="ingot_balok" name="ingot"
                                                    class="form-control myline" placeholder="ingot/batang" style="margin-bottom:5px; width:110px;" required="required">
                                            </div>
                                            <div class="col-md-2">
                                                <span>Batang</span>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" id="ingot_berat" name="berat_ingot"
                                                    class="form-control myline" placeholder="kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()">
                                            </div>
                                            <div class="cold-md-1">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                SUSUT  <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="susut" name="susut"
                                                    class="form-control myline" placeholder="susut/kg" style="margin-bottom:5px; width:100px;"  required="required" readonly="readonly">
                                            </div>
                                            <div class="col-md-3">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                AMPAS <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="ampas" name="ampas"
                                                    class="form-control myline" placeholder="ampas/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()">     
                                            </div>
                                            <div class="col-md-3">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                SERBUK <font color="#f00">*</font>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" id="serbuk" name="serbuk"
                                                    class="form-control myline" placeholder="serbuk/kg" style="margin-bottom:5px; width:100px;"  required="required" onchange="hitung_susut()">     
                                            </div>
                                            <div class="col-md-3">
                                                <span>KG</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">  
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            MULAI <font color="#f00">*</font>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="time" id="mulai" name="mulai"
                                                class="form-control myline" placeholder="jam mulai" style="margin-bottom:5px; width:130px;"  required="required" >
                                        </div>
                                        <div class="col-md-4">
                                            <input type="time" id="selesai" name="selesai"
                                                class="form-control myline" placeholder="jam selesai" style="margin-bottom:5px; width:130px;"  required="required" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Kayu <font color="#f00">*</font>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="kayu" name="kayu"
                                                class="form-control myline" placeholder="Kayu/Batang" style="margin-bottom:5px; width:120px;"  required="required">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            GAS<font color="#f00">*</font>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" id="gas" name="gas"
                                                class="form-control myline" placeholder="Gas/m3" style="margin-bottom:5px; width:120px;"  required="required">
                                        </div>
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
                                    <td colspan="3" style="text-align: right;"><strong>Total :</strong></td>
                                    <td><input type="text" id="total_bruto" class="form-control" readonly="readonly"></td>
                                    <td><input type="text" id="total_berat" class="form-control" readonly="readonly"></td>
                                    <td><input type="text" id="total_netto" name="bs" class="form-control" readonly="readonly"></td>
                                    <td colspan="4"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
                        <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-md-2">&nbsp; &nbsp; <a href="javascript:;" class="btn green" onclick="simpanData();"><i class="fa fa-floppy-o"></i> Save </a>
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
function hitung_susut(){
    var susut = Number(Number($('#total_rongsok').val()) - (Number($('#ingot_berat').val()) + Number($('#total_netto').val()) + Number($('#ampas').val()) + Number($('#serbuk').val())));
    $('#susut').val(susut.toFixed(2));
}

function get_detail_produksi(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/Ingot/get_detail_produksi'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $('#dtr').show();
            $("#no_spb").val(result['no_spb']);
            $('#tgl_prd').val(result['tgl_prd']);
            $('#tanggal').val(result['tgl_prd']);
            $('#tipe_apolo').val(result['tipe_apolo']);
            $("#total_rongsok").val(Number(result['total_rongsok']).toFixed(2)); 
            hitung_susut();
        } 
    });
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#ingot_balok").val()) == ""){
        $('#message').html("Silahkan Input Batang Ingot!");
        $('.alert-danger').show();
    }else if($.trim($("#ingot_berat").val()) == ""){
        $('#message').html("Silahkan Input Berat Ingot!");
        $('.alert-danger').show();
    }else if($.trim($("#tipe_rongsok").val()) == ""){
        $('#message').html("Tipe Rongsok Belum Dipilih!");
        $('.alert-danger').show();
    }else{     
        $('#formku').submit(); 
    };
};

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
        hitung_susut();
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
});
</script>
      