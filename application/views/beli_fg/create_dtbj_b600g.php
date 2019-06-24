<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliFinishGood'); ?>"> Pembelian Finish Good</a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliFinishGood/create_dtbj'); ?>"> Create Data Timbang Barang Jadi (DTBJ) </a> 
        </h5>          
    </div>
</div>

<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php
            if( ($group_id==1)||($hak_akses['create_dtbj']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/BeliFinishGood/save_dtbj'); ?>">  
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. DTBJ <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_dtbj" name="no_dtbj"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?= $header['no_dtbj'];?>">

                            <input type="hidden" id="id" name="id" value="<?= $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?= $header['tanggal'];?>">
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
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"></textarea>                           
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
                            <select id="supplier_id" name="supplier_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    echo '<option value="0"'.(('0'==$header['supplier_id'])? 'selected="selected"': '').'>**TIDAK ADA SUPPLIER**</option>';
                                    foreach ($supplier_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['supplier_id'])? 'selected="selected"': '').'>'.$row->nama_supplier.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="BOBBIN PLASTIK">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Pilih Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select  id="no_packing" name="no_packing" placeholder="Silahkan pilih..." class="form-control myline select2me" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php 
                                foreach($packing as $p){
                                ?>
                                <option value="<?=$p->bobbin_size;?>"><?=$p->bobbin_size.' ('.$p->keterangan.')';?> </option>
                                <?php } ?>    
                            </select> 
                            <input type="hidden" name="id_packing" id="id_packing">                       
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
                    
                </div>              
            </div>
            
           
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <th style="width:40px">No</th>
                                <th style="width:20%">Nama Item Finish Good</th>
                                <th>UOM</th>
                                <th>Bruto</th>
                                <th>Berat Palette</th>
                                <th></th>
                                <th>Netto (Kg)</th>
                                <th style="width:20%">No. Packing</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                            <tr>
                                <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                <input type="hidden" id="fg_id_1" name="myDetails[1][fg_id]" value="">
                                <td><select id="name_rongsok_1" name="myDetails[1][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom_po(this.value,1);">
                                    <option value=""></option>
                                    <?php foreach ($list_fg_on_po as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?='('.$value->kode.') '.$value->jenis_barang;?>
                                            </option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" id="ukuran_1" name="myDetails[1][ukuran]">
                                </td>
                                <td><input type="text" id="uom_1" name="myDetails[1][uom]" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="bruto_1" name="myDetails[1][bruto]" class="form-control myline" value="0" maxlength="10"></td>
                                <td><input type="number" id="berat_bobbin_1" name="myDetails[1][berat_bobbin]" class="form-control myline" value="0" maxlength="4"></td>
                                <td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto(1);" id="timbang_1"> <i class="fa fa-dashboard"></i> Timbang </a></td>
                                <td><input type="text" id="netto_1" name="myDetails[1][netto]" class="form-control myline" value="0" maxlength="10" readonly="readonly"></td>
                                <td><input type="text" name="myDetails[1][no_packing]" id="no_packing_1" class="form-control myline" readonly placeholder="Auto"></td>
                                <input type="hidden" name="myDetails[1][no_bobbin]" class="form-control myline" value="">
                                <input type="hidden" name="myDetails[1][line_remarks]" class="form-control myline" value="">
                                <td style="text-align:center"><a id="save_1" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail(1);" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
                                    <a id="print_1" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode(1);" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Create DTBJ </a>

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
function timbang_netto(id){
    const bruto = $('#bruto_'+id).val();
    const berat = $('#berat_bobbin_'+id).val();
    $('#netto_'+id).val(bruto - berat);
}

function simpanData(){
    if($.trim($("#no_dtbj").val()) == ""){
        $('#message').html("Nomor DTBJ harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else if($.trim($("#supplier_id").val()) == ""){
        $('#message').html("Supplier harus diisi, tidak boleh kososng!");
        $('.alert-danger').show(); 
    }else{   
        $('#message').html("");
        $('.alert-danger').hide(); 
        $('#formku').submit();
    };
};

function get_uom_po(id, nmr){
    if($.trim($('#name_rongsok_'+nmr).val())!=''){    
            $.ajax({
                url: "<?php echo base_url('index.php/BeliFinishGood/get_uom'); ?>",
                type: "POST",
                data: {id: id},
                dataType: "json",
                success: function(result) {
                    $('#uom_'+nmr).val(result['uom']);
                    $('#fg_id_'+nmr).val(id);
                    $('#ukuran_'+nmr).val(result['ukuran']);
                }
            });
    }
}

// function get_packing(id){
//     if(''!=id){
//         $.ajax({
//             url: "<?php echo base_url('index.php/GudangFG/get_bobbin'); ?>",
//             type: "POST",
//             data: "id="+id,
//             dataType: "json",
//             success: function(result) {
//                 if(result){
//                     $('#id_packing').val(result['id']);
//                 } else {
//                     alert('Bobbin/Keranjang tidak ditemukan, coba lagi');
//                     $('#no_packing').val('');
//                 }
//             }
//         });
//     }
// }

function saveDetail(id){
    if($.trim($("#name_rongsok_"+id).val()) == ""){
        $('#message').html("Silahkan pilih nama item finish good!");
        $('.alert-danger').show();
    }else if($.trim($("#netto_"+id).val()) ==  ("" || 0)){
        $('#message').html("Jumlah netto tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#no_packing").val()) == ""){
        $('#message').html("Silahkan pilih packing!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            url: "<?php echo base_url('index.php/BeliFinishGood/get_packing_b600g'); ?>",
            type: "POST",
            data: {
                id:id,
                tanggal: $('#tanggal').val(),
                no_packing: $('#no_packing').val(),
                ukuran: $('#ukuran_'+id).val()
            },
            dataType: "json",
            success: function(result){
                $('#no_packing_'+id).val(result['no_packing']);
            }
        });
        $("#name_rongsok_"+id).attr('readonly','readonly');
        $("#timbang_"+id).attr('disabled','disabled');
        $("#netto_"+id).attr('readonly','readonly');
        $("#bruto_"+id).attr('readonly','readonly');
        $("#berat_bobbin_"+id).attr('readonly','readonly');
        $("#save_"+id).hide();
        $("#print_"+id).show();
        $("#delete_"+id).removeClass('disabled');
        var new_id = id+1; 
        $("#tabel_dtr>tbody").append(
            '<tr>'+
                '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
                '<input type="hidden" id="po_id_'+new_id+'" name="myDetails['+new_id+'][po_detail_id]" value="">'+
                '<input type="hidden" id="fg_id_'+new_id+'" name="myDetails['+new_id+'][fg_id]" value="">'+
                '<td><select id="name_rongsok_'+new_id+'" name="myDetails['+new_id+'][nama_item]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom_po(this.value,'+new_id+');">'+
                    '<option value=""></option>'+
                    '<?php foreach($list_fg_on_po as $v){ print('<option value="'.$v->id.'">'.$v->jenis_barang.'</option>');}?>'+
                '</select>'+
                '</td>'+
                '<td><input type="text" id="uom_'+new_id+'" name="myDetails['+new_id+'][uom]" class="form-control myline" readonly="readonly"></td>'+
                '<input type="hidden" id="ukuran_'+new_id+'" name="myDetails['+new_id+'][ukuran]">'+
                '<td><input type="text" id="bruto_'+new_id+'" name="myDetails['+new_id+'][bruto]" class="form-control myline" value="0" maxlength="10"></td>'+
                '<td><input type="number" id="berat_bobbin_'+new_id+'" name="myDetails['+new_id+'][berat_bobbin]" class="form-control myline" value="0" maxlength="4"></td>'+
                '<td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto('+new_id+');" id="timbang_'+new_id+'"> <i class="fa fa-dashboard"></i> Timbang </a></td>'+
                '<td><input type="text" id="netto_'+new_id+'" name="myDetails['+new_id+'][netto]" class="form-control myline" value="0" maxlength="10" readonly="readonly"></td>'+
                '<td><input type="text" name="myDetails['+new_id+'][no_packing]" id="no_packing_'+new_id+'" class="form-control myline" readonly placeholder="Auto"></td>'+
                '<input type="hidden" name="myDetails['+new_id+'][no_bobbin]" class="form-control myline" value="">'+
                '<input type="hidden" name="myDetails['+new_id+'][line_remarks]" class="form-control myline" value="">'+
                '<td style="text-align:center"><a id="save_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail('+new_id+');" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a>'+
                    '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="deleteDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>'+
                    '<a id="print_'+new_id+'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('+new_id+');" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a></td>'+
            '</tr>'
        );
    }$('#name_rongsok_'+new_id).select2();
}

function deleteDetail(id){
    var r=confirm("Anda yakin menghapus item rongsok ini?");
    if (r==true){
        $('#no_tabel_'+id).closest('tr').remove();
        }
}

function printBarcode(id){
    const fg = $('#fg_id_'+id).val();
    const b = $('#bruto_'+id).val();
    const bb = $('#berat_bobbin_'+id).val();
    const n = $('#netto_'+id).val();
    const np = $('#no_packing_'+id).val();
    console.log(id+' | '+fg+' | '+b+' | '+bb+' | '+n+' | '+np);
    window.open('<?php echo base_url();?>index.php/BeliFinishGood/print_barcode?fg='+fg+'&b='+b+'&bb='+bb+'&n='+n+'&np='+np,'_blank');
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