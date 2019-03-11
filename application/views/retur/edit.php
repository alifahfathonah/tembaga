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
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['created_at'])); ?>">
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div> -->
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
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th width="20%">Nama Item Retur</th>
                                <th>No. Packing</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>ID Bobbin / Keranjang</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></i></td>
                                <td>
                                <select id="jenis_barang_id" name="jenis_barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($jenis_barang_list as $value){
                                        echo "<option value='".$value->id."'>".$value->jenis_barang."</option>";
                                    }
                                ?>
                                </select>
                                </td>
                                <td><input type="text" id="no_packing" name="no_packing" class="form-control myline" readonly="readonly" value="Auto"></td>
                                <td><input type="text" id="bruto" name="bruto" class="form-control myline"></td>
                                <td><input type="text" id="netto" name="netto" class="form-control myline" readonly="readonly"/></td>
                                <td><input type="text" id="no_bobbin" name="no_bobbin" class="form-control myline" onchange="get_bobbin(this.value)" onkeyup="this.value = this.value.toUpperCase()"/><input type="hidden" name="id_bobbin" id="id_bobbin"></td>
                                <!-- <td><a href="javascript:;" class="btn btn-xs btn-circle green-seagreen"> <i class="fa fa-dashboard"></i> Timbang </a></td> -->
                                <td><input type="text" id="line_remarks" name="line_remarks" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>
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
                        
                    <a href="<?php echo base_url('index.php/Retur'); ?>" class="btn blue-hoki"> 
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
function get_bobbin(id){
    if(''!=id){
    $.ajax({
        url: "<?php echo base_url('index.php/GudangFG/get_bobbin'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            console.log(result);
            if(result){
                $('#berat_bobbin').val(result['berat']);
                $('#pemilik').val(result['nama_owner']);
                $('#id_bobbin').val(result['id']);
                const netto = ($('#bruto').val() - result['berat']);
                $('#netto').val(Math.round(netto*100)/100);
            } else {
                alert('Bobbin/Keranjang tidak ditemukan atau belum dipesan, coba lagi');
                $('#no_bobbin').val('');
                $('#id_bobbin').val('');
                $('#berat_bobbin').val('');
                $('#pemilik').val('');
                $('#netto').val('');
            }
        }
    });
    }
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
    //hitungSubTotal();
}

function hitungSubTotal(){
    harga = $('#harga').val().toString().replace(/\./g, "");
    qty   = $('#qty').val().toString().replace(/\./g, "");
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
    }else if($.trim($("#type_retur").val()) == ""){
        $('#message').html("Silahkan pilih type retur!");
        $('.alert-danger').show();  
    }else{     
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/Retur/load_detail'); ?>',
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
            $('#uom').val(result['uom']);
        }
    })
}

function saveDetail(){
    if($.trim($("#jenis_barang_id").val()) == ""){
        $('#message').html("Silahkan pilih detail item retur!");
        $('.alert-danger').show(); 
    }else if($.trim($("#bruto").val()) == ""){
        $('#message').html("Bruto tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto").val()) == ""){
        $('#message').html("Netto tidak boleh kosong!");
        $('.alert-danger').show();
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Retur/save_detail'); ?>',
            data:{
                id:$('#id').val(),
                jenis_barang_id:$('#jenis_barang_id').val(),
                qty:$('#qty').val(),
                bruto:$('#bruto').val(),
                netto:$('#netto').val(),
                no_bobbin:$('#no_bobbin').val(),
                id_bobbin:$('#id_bobbin').val(),
                line_remarks:$('#line_remarks').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    $('#jenis_barang_id').select2('val','');
                    $('#qty').val('');
                    $('#bruto').val('');
                    $('#netto').val('');
                    $('#no_bobbin').val('');
                    $('#id_bobbin').val('');
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
    var r=confirm("Anda yakin menghapus detail item retur ini?");
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

</script>

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){        
    $("#tgl_spare_part").datepicker({
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
      