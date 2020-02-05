<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/surat_jalan'); ?>"> Surat Jalan </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/edit_surat_jalan'); ?>"> Edit Surat Jalan </a> 
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
              id="formku" action="<?php echo base_url('index.php/GudangFG/update_surat_jalan'); ?>">
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
                                value="<?= (($this->session->userdata('user_ppn') == 1)? $header['nama_customer'] : $header['nama_customer_kh']) ?>">
                            <input type="hidden" id="id_customer" name="id_customer" value="<?php echo $header['id_customer'];?>" readonly="readonly">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="alamat" name="alamat" rows="2" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?= (($this->session->userdata('user_ppn') == 1)? $header['alamat'] : $header['alamat_kh']) ?></textarea>                           
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
                            Type Kendaraan
                        </div>
                        <div class="col-md-8">
                            <select id="m_type_kendaraan_id" name="m_type_kendaraan_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onclick="get_type_kendaraan(this.value);">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                        <?php if($header['jenis_barang']=='LAIN'){ ?>
                            <thead>
                                <th>No</th>
                                <th width="40%">Nama Item</th>
                                <th width="10%">UOM</th>
                                <th width="15%">Quantity</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                            </tbody>
                                <tr>
                                    <td style="text-align: center;"><div id="no_tabel">+</div></td>
                                    <td>
                                        <select id="barang_id" name="barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onChange="get_uom(this.value,1);">
                                            <option value=""></option>
                                        <?php foreach ($jenis_barang as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?=$value->jenis_barang;?>
                                            </option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="id_barang" id="id_barang">
                                    <input type="hidden" id="jenis_barang_id" name="jenis_barang_id" class="form-control myline">
                                    <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="netto" name="netto" class="form-control myline"></td>
                                    <td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" value=""></td>
                                    <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="save"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="delete" href="javascript:;" class="btn btn-xs btn-circle red" onclick="hapusDetail();" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Delete </a>
                                    </td>
                                </tr>
                            <?php }else{ ?>
                            <thead>
                                <th>No</th>
                                <th width="25%">Nama Item</th>
                                <th width="10%">UOM</th>
                                <th width="10%">Bruto</th>
                                <th width="10%">Berat</th>
                                <th></th>
                                <th width="10%">Netto</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                            </tbody>
                                <tr>
                                    <td style="text-align: center;"><div id="no_tabel">+</div></td>
                                    <td>
                                        <select id="barang_id" name="barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onChange="get_uom(this.value,1);">
                                            <option value=""></option>
                                        <?php foreach ($jenis_barang as $value){ ?>
                                            <option value='<?=$value->id;?>'>
                                                <?='('.$value->kode_rongsok.') '.$value->nama_item;?>
                                            </option>
                                        <?php } ?>
                                        </select>
                                    </td>
                                    <input type="hidden" name="id_barang" id="id_barang">
                                    <input type="hidden" id="jenis_barang_id" name="jenis_barang_id" class="form-control myline">
                                    <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>
                                    <td><input type="text" id="bruto" name="bruto" class="form-control myline"></td>
                                    <td><input type="text" id="berat" name="berat" class="form-control myline"></td>
                                    <td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen" onclick="timbang_netto();"> <i class="fa fa-dashboard"></i> Timbang </a></td>  
                                    <td><input type="text" id="netto" name="netto" class="form-control myline"></td>
                                    <td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()" value=""></td>
                                    <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="save"><i class="fa fa-plus"></i> Tambah </a>
                                    <a id="delete" href="javascript:;" class="btn btn-xs btn-circle red" onclick="hapusDetail();" style="margin-top:5px; display: none;"><i class="fa fa-trash"></i> Delete </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                <?php if(!empty($retur_list)){ ?>
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                <?php } ?>
                    <a href="<?php echo base_url('index.php/GudangFG/surat_jalan'); ?>" class="btn blue-hoki"> 
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
function genPacking(id){
    const str = $('#no_packing_'+id).val();
    const res = str.substring(7, 11);
    var ukuran = $('#barang_alias_id_'+id).find(':selected').attr('data-id');
    console.log(ukuran);
    if(ukuran==0 || ukuran==undefined){
        var ukuran = $('#barang_id_'+id).find(':selected').attr('data-id');
    }
    console.log(ukuran);
    const no_packing = str.replace(res, ukuran);
    $('#no_packing_'+id).val(no_packing);    
}

function timbang_netto(id){
    var bruto = $("#bruto").val();
    var berat_palette = $("#berat").val();
    var total_netto = bruto - berat_palette;
    const netto = total_netto.toFixed(2);
    $("#netto").val(netto);
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#jenis_barang").val()) == ""){
        $('#message').html("Silahkan pilih jenis barang!");
        $('.alert-danger').show(); 
    }else if($.trim($("#nama_customer").val()) == ""){
        $('#message').html("Silahkan pilih customer");
        $('.alert-danger').show(); 
    }else{
        result = confirm('Anda yakin untuk menyimpannya ?');
        if(result){
            $('#formku').submit();
        } 
    };
};

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $('#no_tabel_'+id).closest('tr').remove();
        }
}

function get_type_kendaraan(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/SalesOrder/get_type_kendaraan'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#type_kendaraan").val(result['type_kendaraan']);
        } 
    });
}

function get_uom(id){
    const jenis = $('#jenis_barang').val();
    $.ajax({
        url: "<?php echo base_url('index.php/SalesOrder/get_uom_so'); ?>",
        type: "POST",
        data: {
            id: id,
            jenis: jenis
        },
        dataType: "json",
        success: function(result) {
            $('#uom').val(result['uom']);
        }
    })
}

function loadDetail(id){
    var jenis = $('#jenis_barang').val();
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/GudangFG/load_detail_sj'); ?>',
        data:{
            id: id,
            jenis: jenis
        },
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}


function saveDetail(){
    if($.trim($("#barang_id").val()) == ""){
        $('#message').html("Silahkan pilih item rongsok!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto").val()) == ""){
        $('#message').html("Jumlah item/netto rongsok tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangFG/save_detail_sj'); ?>',
            data:{
                id:$('#id').val(),
                barang_id:$('#barang_id').val(),
                netto:$('#netto').val(),
                keterangan:$('#line_remarks').val(),
            <?php if($header['jenis_barang']=='AMPAS'){ ?>
                bruto:$('#bruto').val(),
                berat:$('#berat').val(),
            <?php } ?>
                jenis:$('#jenis_barang').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    $('#barang_id').select2("val", "");
                    $('#uom').val('');
                    $('#bruto').val('');
                    $('#berat').val('');
                    $('#netto').val('');
                    $('#line_remarks').val('');
                    loadDetail($('#id').val());
                    $('#message').html("");
                    $('.alert-danger').hide(); 
                }else{
                    $('#message').html(result['message']);
                    $('.alert-danger').show(); 
                }            
            }
        });
    }
}

function hapusDetail(id){
    var r=confirm("Anda yakin menghapus barang ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/GudangFG/delete_detail_sj'); ?>',
            data:{
                id: id,
                jenis:$('#jenis_barang').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                }else{
                    alert(result['message']);
                }     
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
        dateFormat: 'dd-mm-yy'
    }); 

    loadDetail(<?php echo $header['id']; ?>);
});
</script> 