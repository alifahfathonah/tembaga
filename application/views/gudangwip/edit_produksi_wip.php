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

<form class="eventInsForm" method="post" target="_self" name="formku" id="formku" action="<?php echo base_url('index.php/GudangWIP/update_proses_wip'); ?>">
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
                            <input id="no_produksi" name="no_produksi" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?=$header['no_produksi_wip'];?>" type="text">

                            <input type="hidden" name="id_thw" value="<?=$header['id'];?>">
                            <input type="hidden" name="id_thm" value="<?=$header['hasil_masak_id'];?>">
                            <input type="hidden" name="id_bpb" value="<?=$header['id_bpb'];?>">
                            <input type="hidden" name="id_dtr" value="<?php echo $header['id_dtr']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?=$header['tanggal'];?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Proses <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input id="jenis_masak" name="jenis_masak" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="<?=$header['jenis_masak'];?>" type="text">
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
                                <option value="<?=$k->id;?>" <?php echo (($header['jenis_barang_id']==$k->id)? 'selected': '');?>><?=$k->jenis_barang;?></option>
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
                </div>
            </div>
    </div>
</div>
<div class="row"> 
    <div id="div_kawat_hitam_masuk">
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
                                value="<?=$header['qty'];?>" readonly placeholder="Jumlah Kawat Hitam"/>
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
                                value="<?=$header['berat'];?>" readonly placeholder="Berat Kawat Hitam"/>
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
                                <label>Jumlah Kawat <?=(($header['jenis_masak']=='CUCI')? 'Cuci Bakar Ulang': 'Hitam');?> </label>
                                <input type="text" id="qty_kh_in" name="qty_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['qty_keras'];?>" readonly placeholder="Jumlah Kawat Hitam"/>
                                <!-- <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"> -->
                                <label> Roll </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Berat Kawat <?=(($header['jenis_masak']=='CUCI')? 'Cuci Bakar Ulang': 'Hitam');?> </label>
                                <input type="text" id="berat_kh_in" name="berat_kh" 
                                class="form-control myline" size="25" 
                                value="<?=$header['keras'];?>" readonly placeholder="Berat Kawat Hitam"/>
                                <label> Kg</label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
        <?php if(empty($header['id_dtr'])){ ?>
            <div class="row" id="dtr">
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
            <?php }elseif($header['status_dtr']==0){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th>No</th>
                                <th>Nama Item Rongsok</th>
                                <th>Bruto (Kg)</th>
                                <th>Berat Pallete</th>
                                <th>Netto (Kg)</th>
                                <th></th>
                                <th width="15%">No. Pallete</th>
                                <th>Print</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $netto = 0;
                                // print_r($details);die();
                                foreach ($details as $row){
                                    echo '<tr>';
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td><input type="text" name="myDetails['.$no.'][nama_item]" '
                                            . 'class="form-control myline" value="'.$row->nama_item.'" '
                                            . 'readonly="readonly">';
                                    
                                    echo '<input type="hidden" name="myDetails['.$no.'][id]" value="'.$row->id.'">';
                                    echo '<input type="hidden" name="myDetails['.$no.'][rongsok_id]" id="rongsok_id_'.$no.'" value="'.$row->rongsok_id.'";?>';                                    
                                    echo '</td>';
                                    echo '<td><input type="number" id="bruto_'.$no.'" id="bruto_'.$no.'" name="myDetails['.$no.'][bruto]" '
                                            . 'class="form-control myline" maxlength="10" value="'.$row->bruto.'"></td>';
                                    echo '<td><input type="text" id="berat_palette_'.$no.'" name="myDetails['.$no.'][berat_palette]" '
                                            . 'class="form-control myline" maxlength="10" value="'.$row->berat_palette.'"></td>';
                                    echo '<td><input type="text" id="netto_'.$no.'" name="myDetails['.$no.'][netto]" '
                                            . 'class="form-control myline" maxlength="10" value="'.$row->netto.'" readonly></td>';
                                    echo '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto('.$no.',1);"> <i class="fa fa-dashboard"></i> Timbang </a></td>';
                                    
                                    echo '<td><input type="text" id="no_pallete_'.$no.'" name="myDetails['.$no.'][no_pallete]" value="'.$row->no_pallete.'" '
                                            . 'class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>';
                                    echo '<td style="text-align:center"><a id="print_'.$no.'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('.$no.');" style="margin-top:5px;"><i class="fa fa-trash"></i> Print </a></td>';
                                    echo '</tr>';
                                    $no++;
                                    $netto+= $row->netto;
                                }
                            ?>
                            <tr>
                                <td style="text-align: center;"><div id="no_tabel_<?=$no;?>"><?=$no;?></div></td>
                                <input type="hidden" id="po_id_<?=$no;?>" name="myDetails[<?=$no;?>][po_detail_id]" value="">
                                <input type="hidden" id="rongsok_id_<?=$no;?>" name="myDetails[<?=$no;?>][rongsok_id]" value="">
                                <td><select id="name_rongsok_<?=$no;?>" name="myDetails[<?=$no;?>][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom_po(this.value,<?=$no;?>);">
                                    <option value=""></option>
                                    <?php foreach ($rongsok as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?='('.$value->kode_rongsok.') '.$value->nama_item;?>
                                            </option>
                                    <?php } ?>
                                </select>
                                </td>
                                <input type="hidden" name="myDetails[<?=$no;?>][id]" value="0">
                                <td><input type="number" id="bruto_<?=$no;?>" name="myDetails[<?=$no;?>][bruto]" class="form-control myline" value="0" maxlength="10"></td>
                                <td><input type="number" id="berat_palette_<?=$no;?>" name="myDetails[<?=$no;?>][berat_palette]" class="form-control myline" value="0" maxlength="10"></td>
                                <td><input type="text" id="netto_<?=$no;?>" name="myDetails[<?=$no;?>][netto]" class="form-control myline" value="0" maxlength="10" readonly="readonly" onkeydown="return myCurrency(event);" onkeyup="getComa(this.value, this.id);"></td>
                                <td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto(<?=$no;?>,<?=$no;?>);"> <i class="fa fa-dashboard"></i> Timbang </a></td>                          
                                <td><input type="text" name="myDetails[<?=$no;?>][no_pallete]" id="no_pallete_<?=$no;?>"class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" readonly="readonly"></td>
                                <td style="text-align:center">
                                    <a id="save_<?=$no;?>" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail(<?=$no;?>);" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="delete_<?=$no;?>" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail(<?=$no;?>);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                    <a id="print_<?=$no;?>" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode(<?=$no;?>);" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total :</strong></td>
                                    <td><input type="text" id="total_bruto" class="form-control" readonly="readonly"></td>
                                    <td><input type="text" id="total_berat" class="form-control" readonly="readonly"></td>
                                    <td><input type="text" id="total_netto" name="bs" class="form-control" readonly="readonly" value="<?=$netto;?>"></td>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<hr class="divider"/>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-save"></i> Simpan</a>
                </div>
            </div>
        </div>
    </div>
</form> 
<script>
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

<?php if(empty($header['id_dtr'])){ ?>
function timbang_netto(id){
    var bruto = $("#bruto_"+id).val();
    var berat_palette = $("#berat_palette_"+id).val();
    var total_netto = bruto - berat_palette;
    const netto = total_netto.toFixed(2);
    $("#netto_"+id).val(netto);
}
<?php }else{ ?>
function timbang_netto(id,jn){
  if(jn==1){
    var bruto = $("#bruto_"+id).val();
    var berat_palette = $("#berat_palette_"+id).val();
    var total_netto = bruto - berat_palette;
    var bs = $('#total_netto').val();
    bs_new = Number(bs)-Number($('#netto_'+id).val());
    const netto = total_netto.toFixed(2);
    $("#netto_"+id).val(netto);
    bs_new = Number(bs_new) + Number(netto);
    $('#total_netto').val(bs_new);
  }else{
    var bruto = $("#bruto_"+id).val();
    var berat_palette = $("#berat_palette_"+id).val();
    var total_netto = bruto - berat_palette;
    const netto = total_netto.toFixed(2);
    $("#netto_"+id).val(netto);
  }
}
<?php } ?>

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
                '<input type="hidden" name="myDetails['+new_id+'][id]" value="0">'+
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