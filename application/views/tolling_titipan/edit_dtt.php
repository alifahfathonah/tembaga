<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Tolling Ke Customer</a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/create_dtbj'); ?>"> Create Data Timbang Tolling(DTT) </a> 
        </h5>          
    </div>
</div>

<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_dtr']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Tolling/save_dtt_detail'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTT <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtt" name="no_dtt" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_dtt'];?>">

                            <input type="hidden" name="id" value="<?php echo $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            No. PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="po_id" name="po_id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>  -->                   
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks'];?></textarea>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5"> 
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo $header['nama_supplier'];?>" class="form-control myline" style="margin-bottom:5px" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Penimbang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_barang'];?>">
                        </div>
                    </div>
                    <?php if($header['jenis_barang']=='FG'){?>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_packing" name="jenis_packing" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_packing'];?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <?php if($header['jenis_barang']=='FG'){?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th style="width:20%">Nama Item</th>
                                <th>UOM</th>
                                <th>Bruto (Kg)</th>
                                <th>Berat Bobbin</th>
                                <th>Netto (Kg)</th>
                                <th></th>
                                <th>No. Bobbin</th>
                                <th>No. Packing</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                            <tr>
                                <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                <input type="hidden" id="jb_id_1" name="myDetails[1][jb_id]" value="">
                                <input type="hidden" id="ukuran_1" value="">
                                <td><select id="nama_item_1" name="myDetails[1][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom(this.value,1);">
                                    <option value=""></option>
                                    <?php foreach ($list_barang as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=$value->jenis_barang;?>
                                            </option>
                                    <?php } ?>
                                </select>
                                </td>
                                <td><input type="text" id="uom_1" name="myDetails[1][uom]" class="form-control myline" readonly="readonly"></td>
                                <td><input type="number" id="bruto_1" name="myDetails[1][bruto]" class="form-control myline" maxlength="10"></td>
                                <td><input type="text" id="berat_bobbin_1" name="myDetails[1][berat_bobbin]" class="form-control myline" value="0" readonly maxlength="10"></td>
                                <td><input type="text" id="netto_1" name="myDetails[1][netto]" class="form-control myline" value="0" maxlength="10" readonly="readonly">
                                </td>
                                <td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto(1);" id="timbang_1"> <i class="fa fa-dashboard"></i> Timbang </a></td>                          
                                <td><input type="text" name="myDetails[1][no_bobbin]" id="no_bobbin_1"class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" onchange="get_bobbin(this.value,1)"></td>
                                <td><input type="text" name="myDetails[1][no_packing]" id="no_packing_1" class="form-control myline" readonly placeholder="Auto"></td>
                                <td><input type="text" name="myDetails[1][line_remarks]" id="line_remarks_1" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                <td style="text-align:center">
                                    <a id="save_1" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail(1);" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                    <a id="print_1" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode(1);" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php }else if($header['jenis_barang'] == 'WIP'){ ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th style="width:20%">Nama Item</th>
                                <th>UOM</th>
                                <th>Qty</th>
                                <th>Berat (Kg)</th>
                                <th></th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                <input type="hidden" id="jb_id_1" name="myDetails[1][jb_id]" value="">
                                <td><select id="nama_item_1" name="myDetails[1][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom(this.value,1);">
                                    <option value=""></option>
                                    <?php foreach ($list_barang as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=$value->jenis_barang;?>
                                            </option>
                                    <?php } ?>
                                </select>
                                </td>
                                <td><input type="text" id="uom_1" name="myDetails[1][uom]" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="qty_1" name="myDetails[1][qty]" class="form-control myline" value="0" maxlength="10"></td>
                                <td><input type="text" id="berat_1" name="myDetails[1][netto]" class="form-control myline" value="0" maxlength="10">
                                </td>
                                <td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto(1);" id="timbang_1"> <i class="fa fa-dashboard"></i> Timbang </a></td>       
                                <td><input type="text" name="myDetails[1][line_remarks]" id="line_remarks_1" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                <td style="text-align:center">
                                    <a id="save_1" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail(1);" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Create DTT </a>

                    <a href="<?php echo base_url('index.php/BeliFinishGood/dtbj_list'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
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
function get_bobbin(id, nmr){
    if(''!=id){
        const ukuran = $('#ukuran_'+nmr).val();
        $.ajax({
            url: "<?php echo base_url('index.php/Tolling/get_bobbin'); ?>",
            async: false,
            type: "POST",
            data: {
                id:id,
                ukuran:ukuran
                },
            dataType: "json",
            success: function(result) {
                if(result['id'] != null){
                    $('#berat_bobbin_'+nmr).val(result['berat']);
                    $('#id_bobbin_'+nmr).val(result['id']);
                    $('#no_packing_'+nmr).val(result['no_packing']);
                    console.log($('#no_packing_'+nmr).val());
                } else {
                    alert('Bobbin/Keranjang tidak ditemukan atau belum dipesan, coba lagi');
                    $('#no_bobbin_'+nmr).val('');
                    $('#id_bobbin_'+nmr).val('');
                    $('#berat_bobbin_'+nmr).val('');
                    $('#no_packing_'+nmr).val('');
                }
            }
        });
    }
}

function timbang_netto(id){
    var bruto = $("#bruto_"+id).val();
    var berat_palette = $("#berat_bobbin_"+id).val();
    var total_netto = bruto - berat_palette;
    var total = total_netto.toFixed(2);
    $("#netto_"+id).val(total);
}

function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kososng!");
        $('.alert-danger').show();
    }else{   
        $('#message').html("");
        $('.alert-danger').hide(); 
        $('#formku').submit();
    };
};

function get_uom(id, nmr){
    // var idpo = $('#po_id').val();
    if($.trim($('#nama_item_'+nmr).val())!=''){
        $.ajax({
            url: "<?php echo base_url('index.php/BeliFinishGood/get_uom'); ?>",
            type: "POST",
            data: {id: id},
            dataType: "json",
            success: function(result) {
                $('#uom_'+nmr).val(result['uom']);
                $('#jb_id_'+nmr).val(id);
                $('#ukuran_'+nmr).val(result['ukuran']);
                console.log($('#ukuran_'+nmr).val());
            }
        });
    }
}

function saveDetail(id){
    if($('#jenis_barang').val()=='FG'){
        if($.trim($("#nama_item_"+id).val()) == ""){
            $('#message').html("Silahkan pilih nama item finish good!");
            $('.alert-danger').show(); 
        }else if($.trim($("#bruto_"+id).val()) == "" || 0){
            $('#message').html("Jumlah bruto tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#netto_"+id).val()) == "" || 0){
            $('#message').html("Jumlah netto tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#no_bobbin_"+id).val()) == ""){
            $('#message').html("nomor bobbin tidak boleh kosong!");
            $('.alert-danger').show();
        }else{
            $("#nama_item_"+id).attr('readonly','readonly');
            $("#bruto_"+id).attr('readonly','readonly');
            $("#berat_bobbin_"+id).attr('readonly','readonly');
            $("#no_bobbin_"+id).attr('readonly','readonly');
            $("#timbang_"+id).attr('disabled','disabled');
            $("#line_remarks_"+id).attr('readonly','readonly');
            $("#save_"+id).hide();
            $("#print_"+id).show();
            $("#delete_"+id).removeClass('disabled');
            var new_id = id+1; 
            $("#tabel_dtr>tbody").append(
                '<tr>'+
                    '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                    '<input type="hidden" id="jb_id_'+new_id+'" name="myDetails['+new_id+'][jb_id]" value="">'+
                    '<input type="hidden" id="ukuran_'+new_id+'" value="">'+
                    '<td><select id="nama_item_'+new_id+'" name="myDetails['+new_id+'][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom(this.value,'+new_id+');">'+
                        '<option value=""></option>'+
                        '<?php foreach($list_barang as $v){ print('<option value="'.$v->id.'">'.$v->jenis_barang.'</option>');}?>'+
                    '</select>'+
                    '</td>'+
                    '<td><input type="text" id="uom_'+new_id+'" name="myDetails['+new_id+'][uom]" class="form-control myline" readonly="readonly"></td>'+
                    '<td><input type="number" id="bruto_'+new_id+'" name="myDetails['+new_id+'][bruto]" class="form-control myline" maxlength="10"></td>'+
                    '<td><input type="text" id="berat_bobbin_'+new_id+'" name="myDetails['+new_id+'][berat_bobbin]" class="form-control myline" value="0" maxlength="10" readonly="readonly"></td>'+
                    '<td><input type="text" id="netto_'+new_id+'" name="myDetails['+new_id+'][netto]" class="form-control myline" value="0" maxlength="10" readonly="readonly"></td>'+
                    '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto('+new_id+');" id="timbang_'+new_id+'"> <i class="fa fa-dashboard"></i> Timbang </a></td>'+
                    '<td><input type="text" name="myDetails['+new_id+'][no_bobbin]" id="no_bobbin_'+new_id+'"class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" onchange="get_bobbin(this.value,'+new_id+');"></td>'+
                    '<td><input type="text" name="myDetails['+new_id+'][no_packing]" id="no_packing_'+new_id+'" class="form-control myline" readonly placeholder="Auto"></td>'+
                    '<td><input type="text" name="myDetails['+new_id+'][line_remarks]" id="line_remarks_'+new_id+'" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>'+
                    '<td style="text-align:center"><a id="save_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail('+new_id+');" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>'+
                        '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>'+
                        '<a id="print_'+new_id+'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('+new_id+');" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a></td>'+
                '</tr>'
            );
        $('#nama_item_'+new_id).select2();
        }//if trim
    }else if($('#jenis_barang').val() == 'WIP'){
        if($.trim($("#nama_item_"+id).val()) == ""){
            $('#message').html("Silahkan pilih nama item WIP!");
            $('.alert-danger').show(); 
        }else if($.trim($("#qty_"+id).val()) == "" || 0){
            $('#message').html("Jumlah Quantity tidak boleh kosong!");
            $('.alert-danger').show(); 
        }else if($.trim($("#berat_"+id).val()) == "" || 0){
            $('#message').html("Jumlah netto tidak boleh kosong!");
            $('.alert-danger').show();
        }else{
            $("#nama_item_"+id).attr('readonly','readonly');
            $('#qty_'+id).attr('readonly', 'readonly');
            $('#berat_'+id).attr('readonly', 'readonly');
            $("#timbang_"+id).attr('disabled','disabled');
            $("#line_remarks_"+id).attr('readonly','readonly');
            $("#save_"+id).attr('disabled','disabled');
            $("#delete_"+id).removeClass('disabled');
            var new_id = id+1;
            $("#tabel_dtr>tbody").append(
            '<tr>'+
                    '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                    '<input type="hidden" id="jb_id_'+new_id+'" name="myDetails['+new_id+'][jb_id]" value="">'+
                    '<td><select id="nama_item_'+new_id+'" name="myDetails['+new_id+'][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom(this.value,'+new_id+');">'+
                        '<option value=""></option>'+
                        '<?php foreach($list_barang as $v){ print('<option value="'.$v->id.'">'.$v->jenis_barang.'</option>');}?>'+
                    '</select>'+
                    '</td>'+
                    '<td><input type="text" id="uom_'+new_id+'" name="myDetails['+new_id+'][uom]" class="form-control myline" readonly="readonly"></td>'+
                    '<td><input type="text" id="qty_'+new_id+'" name="myDetails['+new_id+'][qty]" class="form-control myline" value="0" maxlength="10"></td>'+
                    '<td><input type="text" id="berat_'+new_id+'" name="myDetails['+new_id+'][netto]" class="form-control myline" value="0" maxlength="10"></td>'+
                    '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto('+new_id+');" id="timbang_'+new_id+'"> <i class="fa fa-dashboard"></i> Timbang </a></td>'+
                    '<td><input type="text" name="myDetails['+new_id+'][line_remarks]" id="line_remarks_'+new_id+'" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>'+
                    '<td style="text-align:center"><a id="save_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail('+new_id+');" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>'+
                        '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a></td>'+
                '</tr>'
            );
        $('#nama_item_'+new_id).select2();
        }//if trim
    }
}

function deleteDetail(id){
    var r=confirm("Anda yakin menghapus item rongsok ini?");
    if (r==true){
        $('#no_tabel_'+id).closest('tr').remove();
        }
}

function printBarcode(id){
    const fg = $('#jb_id_'+id).val();
    const b = $('#bruto_'+id).val();
    const bp = $('#berat_bobbin_'+id).val();
    const n = $('#netto_'+id).val();
    const np = $('#no_packing_'+id).val();
    console.log(id+' | '+fg+' | '+b+' | '+bp+' | '+n+' | '+np);
    window.open('<?php echo base_url();?>index.php/Tolling/print_barcode_dtt?fg='+fg+'&b='+b+'&bp='+bp+'&n='+n+'&np='+np,'_blank');
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