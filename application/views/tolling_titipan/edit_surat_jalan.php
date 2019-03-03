<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/surat_jalan'); ?>"> Surat Jalan </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/edit_surat_jalan'); ?>"> Edit Surat Jalan </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['edit_surat_jalan']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Tolling/update_surat_jalan'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_surat_jalan" name="no_surat_jalan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_surat_jalan']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="alamat" name="alamat" rows="2" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['alamat']; ?></textarea>                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sales_order" name="no_sales_order" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">

                            <input type="hidden" id="so_id" name="so_id" value="<?php echo $header['sales_order_id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB FG<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="spb_fg" name="spb_fg" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nomor_spb']; ?>">

                            <input type="hidden" id="no_spb_fg" name="no_spb_fg" value="<?php echo $header['no_spb'];?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Status SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <?php
                                if($header['status_spb']==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($header['status_spb']==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($header['status_spb']==2 || $header['status_spb']==4){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Belum Dipenuhi Semua</div>';
                                }else if($header['status_spb']==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                            <input type="hidden" name="status_spb" value="<?php echo $header['status_spb'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Type Kendaraan
                        </div>
                        <div class="col-md-8">
                            <select id="m_type_kendaraan_id" name="m_type_kendaraan_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($type_kendaraan_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_type_kendaraan_id'])? 'selected="selected"': '').'>'.$row->type_kendaraan.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Kendaraan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="no_kendaraan" id="no_kendaraan" class="form-control myline" 
                                   style="margin-bottom:5px" value="<?php echo $header['no_kendaraan']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Supir
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="supir" name="supir" onkeyup="this.value = this.value.toUpperCase()"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['supir']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks']; ?></textarea>                           
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">Nama Item</th>
                                <th style="width: 20%;">Nama Alias</th>
                                <th>UOM</th>
                                <th>No. Packing</th>
                                <th>Bruto<br>(Kg)</th>
                                <th>Netto<br>(Kg)</th>
                                <th>Nomor Bobbin</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                <tr>
                                    <td style="text-align: center;"><div id="no_tabel_1">1</div></td>
                                    <td>
                                        <select id="barang_id_1" name="details[1][barang_id]" class="form-control myline select2me" data-placeholder="Pilih..." style="margin-bottom:5px" onChange="get_data(1);">
                                            <option value=""></option>
                                        <?php foreach ($list_barang_spb as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=$value->jenis_barang;?>
                                            </option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="details[1][id_barang]" id="id_barang_1">
                                    <input type="hidden" id="jenis_barang_id_1" name="details[1][jenis_barang_id]" class="form-control myline">
                                    <td>
                                        <select id="barang_alias_id_1" name="details[1][barang_alias_id]" class="form-control select2me myline" disabled data-placeholder="Pilih..." style="margin-bottom:5px">
                                            <option></option>
                                            <option value="0">TIDAK ADA ALIAS</option>
                                        <?php foreach ($jenis_barang as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=$value->jenis_barang;?>
                                            </option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                    <td><input type="text" id="uom_1" name="details[1][uom]" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="no_packing_1" name="details[1][no_packing]" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="bruto_1" name="details[1][bruto]" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="netto_1" name="details[1][netto]" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="bobbin_1" name="details[1][bobbin]" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="line_remarks_1" name="details[1][line_remarks]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
                                    <td style="text-align:center">
                                        <a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="create_new_input(1);" style="margin-top:5px" id="save_1"><i class="fa fa-plus"></i> Tambah </a>
                                        <a id="delete_1" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail(1);" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>
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
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                    <a href="<?php echo base_url('index.php/Tolling/surat_jalan'); ?>" class="btn blue-hoki"> 
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
function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{     
        $('#formku').submit(); 
    };
};

function create_new_input(id){
    $("#barang_id_"+id).attr('disabled','disabled');
    $("#save_"+id).attr('disabled','disabled').hide();
    $("#delete_"+id).removeClass('disabled');
        if($('#barang_alias_id_'+id).val() > 0){
           $('#print_'+id).show();
        }
    var new_id = id+1; 
    $("#tabel_barang>tbody").append(
    '<tr>'+
        '<td style="text-align: center;"><div id="no_tabel_'+new_id+'">'+new_id+'</div></td>'+
        '<td>'+
            '<select id="barang_id_'+new_id+'" name="details['+new_id+'][barang_id]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_data('+new_id+');">'+
                '<option value=""></option>'+
                '<?php foreach($list_barang_spb as $v){ print('<option value="'.$v->id.'">'.$v->jenis_barang.'</option>');}?>'+
            '</select>' +
        '</td>'+
        '<td>'+
            '<select id="barang_alias_id_'+new_id+'" name="details['+new_id+'][barang_alias_id]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">'+
                '<option value=""></option>'+
                '<option value="0">TIDAK ADA ALIAS</option>'+
                '<?php if($header["jenis_barang"]=="FG"){foreach($jenis_barang as $v){ print('<option value="'.$v->id.'">'.$v->jenis_barang.'</option>');}}?>'+
            '</select>'+
        '</td>'+
        '<input type="hidden" name="details['+new_id+'][id_barang]" id="id_barang_'+new_id+'">'+
        '<input type="hidden" id="jenis_barang_id_'+new_id+'" name="details['+new_id+'][jenis_barang_id]" class="form-control myline">'+
        '<td><input type="text" id="uom_'+new_id+'" name="details['+new_id+'][uom]" class="form-control myline" readonly="readonly"></td>'+
        '<td><input type="text" id="no_packing_'+new_id+'" name="details['+new_id+'][no_packing]" class="form-control myline" readonly="readonly"></td>'+
        '<td><input type="text" id="bruto_'+new_id+'" name="details['+new_id+'][bruto]" class="form-control myline" readonly="readonly"></td>'+
        '<td><input type="text" id="netto_'+new_id+'" name="details['+new_id+'][netto]" class="form-control myline" readonly="readonly"></td>'+
        '<td><input type="text" id="bobbin_'+new_id+'" name="details['+new_id+'][bobbin]" class="form-control myline" readonly="readonly"></td>'+
        '<td><input type="text" id="line_remarks_'+new_id+'" name="details['+new_id+'][line_remarks]" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>'+
        '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="create_new_input('+new_id+');" style="margin-top:5px" id="save_'+new_id+'"><i class="fa fa-plus"></i> Tambah </a>'+
        '<a id="delete_'+new_id+'" href="javascript:;" class="btn btn-xs btn-circle red disabled" onclick="hapusDetail('+new_id+');" style="margin-top:5px"><i class="fa fa-trash"></i> Delete </a>'+
        '<a id="print_'+new_id+'" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcode('+new_id+');" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Print </a></td>'+
    '</tr>');
    $('#barang_id_'+new_id).select2();
    $('#barang_alias_id_'+new_id).select2();
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $('#no_tabel_'+id).closest('tr').remove();
        }
}

function check_duplicate(){
    var valid = true;
        $.each($("select[name$='[barang_id]']"), function (index1, item1) {
            $.each($("select[name$='[barang_id]']").not(this), function (index2, item2) {
                if ($(item1).val() == $(item2).val()) {
                    valid = false;
                }
            });
        });
        return valid;
}

function get_data(id){
    $("#id_barang_"+id).val($("#barang_id_"+id).val());
    var id_barang = $("#barang_id_"+id).val();
    var spb = $("#id").val();
    console.log(id_barang);
    console.log(spb);
    if(id_barang!=''){    
        var check = check_duplicate();
        if(check){
        $.ajax({
            url: "<?php echo base_url('index.php/Tolling/get_data_fg'); ?>",
            async: false,
            type: "POST",
            data: "id="+id_barang,
            dataType: "json",
            success: function(result) {
                $('#barang_alias_id_'+id).prop("disabled", false);
                $('#jenis_barang_id_'+id).val(result['jenis_barang_id']);
                $('#uom_'+id).val(result['uom']);
                $('#no_packing_'+id).val(result['no_packing']);
                $('#bruto_'+id).val(result['bruto']);
                $('#netto_'+id).val(result['netto']);
                $('#bobbin_'+id).val(result['nomor_bobbin']);
            }
        });
        } else {
            alert('Inputan barang tidak boleh sama dengan inputan sebelumnya!');
            $("#barang_id_"+id).val('');
        }
    }
}

function printBarcode(id){
    const fg = $('#barang_alias_id_'+id).val();
    const b = $('#bruto_'+id).val();
    const n = $('#netto_'+id).val();
    const bp = b - n;
    const bb = bp.toFixed(2);
    const np = $('#no_packing_'+id).val();
    console.log(id+' | '+fg+' | '+b+' | '+bb+' | '+n+' | '+np);
    window.open('<?php echo base_url();?>index.php/SalesOrder/print_barcode_fg?fg='+fg+'&b='+b+'&bb='+bb+'&n='+n+'&np='+np,'_blank');
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
    
    //loadDetail(<?php echo $header['id'];?>);
});
</script>
      