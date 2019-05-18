<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Sales Order </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/edit'); ?>"> Edit Sales Order </a> 
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
              id="formku" action="<?php echo base_url('index.php/Tolling/update'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id'];?>">
                            <input type="hidden" id="id_tso" name="id_tso" value="<?php echo $header['id_tso']; ?>">
                            <input type="hidden" id="id_spb" name="id_spb" value="<?php echo $header['no_spb'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nomor_spb']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal SO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_po" name="tanggal_po" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tgl_po'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Marketing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_marketing" name="nama_marketing" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?= $header['nama_marketing'];?>">
                            <input type="hidden" id="marketing_id" name="marketing_id" value="<?= $header['marketing_id'];?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_customer_id'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
                                    }
                                ?>
                            </select>
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
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Keterangan
                        </div>
                        <div class="col-md-8">
                            <textarea id="keterangan" name="keterangan" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['keterangan'];?></textarea>
                        </div>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th style="width: 22%">Nama Item </th>
                                <th style="width: 5%">Unit of Measure</th>
                                <th>Harga (Rp)</th>
                                <th>Netto (Kg)</th>
                                <th>Sub Total (Rp)</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tr>
                                <td style="text-align:center">+</td>
                                <td>
                                <select id="jenis_barang_id" name="jenis_barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">
                                <option value=""></option><?php
                                    foreach ($list_barang as $value){
                                        echo "<option value='".$value->id."'>".$value->jenis_barang."</option>";
                                    }?>
                                </select>
                                </td>
                                <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="harga" name="harga" class="form-control myline" onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);"></td>
                                <td><input type="text" id="netto" name="netto" class="form-control myline" maxlength="10" value="0" onkeyup="hitungSubTotal();"></td>
                                <td><input type="text" id="total_harga" name="total_harga" class="form-control myline" readonly="readonly" value="0"></td>
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
                    <a href="<?php echo base_url('index.php/Tolling'); ?>" class="btn blue-hoki"> 
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
function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    hitungSubTotal();
}

function hitungSubTotal(){
    harga = $('#harga').val().toString().replace(/\./g, "");
    qty   = $('#netto').val().toString().replace(/\./g, "");
    qty   = $('#netto').val().toString().replace(/\,/g, ".");
    total_harga = Number(harga)* Number(qty);
    $('#total_harga').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#m_customer_id").val()) == ""){
        $('#message').html("Silahkan pilih nama customer!");
        $('.alert-danger').show();
    }else{     
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    console.log(id);
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Tolling/load_detail'); ?>',
        data:"id="+ id,
        success:function(result){
            console.log(result);
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Tolling/get_uom'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#uom').val(result['uom']);
        }
    })
}

function saveDetail(){
    if($.trim($("#jenis_barang_id").val()) == ""){
        $('#message').html("Silahkan pilih item!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto").val()) == ""){
        $('#message').html("Jumlah Netto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#harga").val()) == ""){
        $('#message').html("Harga item tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Tolling/save_detail'); ?>',
            data:{
                id:$('#id_tso').val(),
                id_spb:$('#id_spb').val(),
                jb:$('#jenis_barang').val(),
                jenis_barang:$('#jenis_barang_id').val(),
                tanggal:$('#tanggal').val(),
                uom:$('#uom').val(),
                harga:$('#harga').val(),
                total_harga:$('#total_harga').val(),
                netto:$('#netto').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id_tso').val());
                    $("#jenis_barang_id").select2("val", "");
                    $("#uom").val('');
                    $("#harga").val('');
                    $("#netto").val('');
                    $("#total_harga").val('');
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

function hapusDetail(id,id_spb){
    var r=confirm("Anda yakin menghapus item ini?");
    if (r==true){
        const jb = $('#jenis_barang').val();
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Tolling/delete_detail'); ?>',
            data:{
                id: id,
                id_spb: id_spb,
                jb: jb
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id_tso').val());
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
    
    $("#tanggal_po").datepicker({
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
      