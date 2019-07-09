<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Retur 
            <i class="fa fa-angle-right"></i>  
            <a href="<?php echo base_url('index.php/Retur/edit'); ?>"> Edit Data Retur </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['edit']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Retur/update'); ?>">          
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Retur <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_retur" name="no_retur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_retur']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal"
                                class="form-control myline input-small" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
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
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px" readonly><?php echo  $header['remarks']; ?></textarea>                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Penimbang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['penimbang']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="m_customer_id" name="m_customer_id" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Contact Person
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="contact_person" name="contact_person" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Packing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_packing_id" name="jenis_packing_id" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['jenis_packing']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Type Retur <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <?php if ($header['jenis_retur'] == 0){ ?>
                            <input type="text" id="type_retur" name="type_retur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Ganti Barang">
                            <?php } else if ($header['jenis_retur'] == 1){ ?>
                            <input type="text" id="type_retur" name="type_retur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Mengurangi Hutang">
                            <?php } ?>
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
                                <option value="<?=$p->bobbin_size;?>"><?=$p->bobbin_size;?> </option>
                                <?php } ?>    
                            </select> 
                            <input type="hidden" name="id_packing" id="id_packing">                       
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th width="20%">Jenis Barang</th>
                                <th>Bruto</th>
                                <th>Berat Packing</th>
                                <th></th>
                                <th>Netto (Kg)</th>
                                <th>Nomor Packing / Barcode</th>
                                <th width="20%">Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></td>
                                <td>
                                <select id="jenis_barang_id" name="jenis_barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom(this.value)">
                                <option value=""></option>
                                <?php
                                    foreach ($jenis_barang_list as $value){
                                        echo "<option value='".$value->id."'>".$value->jenis_barang."</option>";
                                    }
                                ?>
                                </select>
                                </td>
                                <input type="hidden" id="ukuran" name="ukuran">
                                <td><input type="number" id="bruto" name="bruto" class="form-control myline"/></td>
                                <td><input type="number" id="berat_bobbin" = name="berat_bobbin" class="form-control myline"/></td>
                                <td><a href="javascript:;" onclick="timbang_netto()" class="btn btn-xs btn-circle blue"><i class="fa fa-dashboard"></i> Timbang</a></td>
                                <td><input type="text" id="netto" name="netto" class="form-control myline" readonly="readonly"/></td>
                                <td><input type="text" value="Auto" class="form-control myline" readonly="readonly"></td>
                                <td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/Retur/'); ?>" class="btn blue-hoki"> 
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
function timbang_netto(){
    var bruto = $("#bruto").val();
    var berat_palette = $("#berat_bobbin").val();
    var total_netto = bruto - berat_palette;
    const total = total_netto.toFixed(2);
    $("#netto").val(total);
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Retur/load_detail_rambut'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Retur/get_uom'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#ukuran').val(result['ukuran']);
        }
    })
}

// function get_packing(id){
//     if(''!=id){
//     $.ajax({
//         url: "<?php echo base_url('index.php/GudangFG/get_bobbin'); ?>",
//         async: false,
//         type: "POST",
//         data: "id="+id,
//         dataType: "json",
//         success: function(result) {
//             if(result){
//                 $('#id_packing').val(result['id']);
//             } else {
//                 alert('Bobbin/Keranjang tidak ditemukan, coba lagi');
//                 $('#no_packing').val('');
//             }
//         }
//     });
//     }
// }

function saveDetail(){
    if($.trim($("#netto").val()) == ""){
        $('#message').html("Silahkan isi netto barang!");
        $('.alert-danger').show(); 
    }else if($.trim($("#no_packing").val()) == ""){
        $('#message').html("Silahkan pilih packing barang!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Retur/save_detail_b600g'); ?>',
            data:{
                id:$('#id').val(),
                jenis_barang_id: $('#jenis_barang_id').val(),
                tanggal: $('#tanggal').val(),
                bruto:$('#bruto').val(),
                netto: $('#netto').val(),
                ukuran: $('#ukuran').val(),
                berat_bobbin: $('#berat_bobbin').val(),
                no_packing: $('#no_packing').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $('#jenis_barang_id').select2('val','');
                    $('#bruto').val('');
                    $('#berat_bobbin').val('');
                    $('#netto').val('');
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
    var r=confirm("Anda yakin menghapus item barang ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Retur/delete_detail'); ?>',
            data:"id="+ id,
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

function printBarcode(id){
    window.open('<?php echo base_url('index.php/Retur/print_barcode_kardus?id=');?>'+id,'_blank');
}
</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>    
    loadDetail(<?php echo $header['id']; ?>);
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