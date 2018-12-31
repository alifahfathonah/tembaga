<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder'); ?>"> Sales Order </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/edit'); ?>"> Edit Sales Order </a> 
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
              id="formku" action="<?php echo base_url('index.php/SalesOrder/update_so'); ?>">
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
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                            <input type="hidden" id="so_id" name="so_id" value="<?php echo $header['so_id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb_barang']; ?>">

                            <input type="hidden" id="no_spb" name="no_spb" value="<?php echo $header['no_spb'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['no_po']; ?>" onkeyup="this.value = this.value.toUpperCase()">
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
                            Marketing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="marketing_id" name="marketing_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($marketing_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['marketing_id'])? 'selected="selected"': '').'>'.$row->realname.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Alias Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="alias" name="alias"
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['alias']; ?>" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
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
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">Nama Item</th>
                                <th>Unit of Measure</th>
                                <th>Harga (Rp)</th>
                        <?php
                        if($header['jenis_barang'] == 'WIP'){
                        ?>
                                <th>Jumlah</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                        <?php
                        } else if($header['jenis_barang'] == 'FG' || $header['jenis_barang'] == 'AMPAS'){
                        ?>
                                <th>Netto (Kg)</th>
                        <?php
                        } else {
                        ?>
                                <th>Jumlah</th>
                        <?php
                        }
                        ?>
                                <th>Sub Total(Rp)</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                
                            </tbody>
                            <?php
                echo '<tr>'.
                        '<td style="text-align:center"><i class="fa fa-plus"></i></td>'.
                        '<td>'.
                        '<select id="barang_id" name="barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">'.
                        '<option value=""></option>';
                    foreach ($list_barang as $value){
                        echo "<option value='".$value->id."'>".$value->jenis_barang."</option>";
                    }
                        echo '</select>'.
                        '</td>'.
                        '<td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>'.
                        '<td><input type="text" id="harga" name="harga" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        if($header['jenis_barang'] == 'WIP'){
                    echo '<td><input type="text" id="qty" name="qty" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="5" value="0" onkeyup="getComa(this.value, this.id);"></td>'.
                        '<td><input type="text" id="bruto" name="bruto" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="10" value="0"></td>'.
                        '<td><input type="text" id="netto" name="netto" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="10" value="0"></td>';  
        } else if($header['jenis_barang'] == 'FG' || $header['jenis_barang'] == 'AMPAS') {
                    echo '<input type="hidden" id="qty" name="qty" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="10" value="1">'.
                        '<input type="hidden" id="bruto" name="bruto" class="form-control myline" maxlength="10" value="0">'.
                        '<td><input type="text" id="netto" name="netto" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="10" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        } else {
                    echo '<td><input type="text" id="qty" name="qty" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="5" value="0" onkeyup="getComa(this.value, this.id);"></td>';
        }
                    echo '<td><input type="text" id="total_harga" name="total_harga" class="form-control myline" readonly="readonly" value="0"></td>'.
                        '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>';
                                ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/SalesOrder'); ?>" class="btn blue-hoki"> 
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
    if($('#jenis_barang').val() == 'FG' || $('#jenis_barang').val() == 'AMPAS'){
        harga = $('#harga').val().toString().replace(/\./g, "");
        netto = $('#netto').val().toString().replace(/\./g, "");
        total_harga = Number(harga)* Number(netto);
        $('#total_harga').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    }else{
        harga = $('#harga').val().toString().replace(/\./g, "");
        qty   = $('#qty').val().toString().replace(/\./g, "");
        total_harga = Number(harga)* Number(qty);
        $('#total_harga').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    }
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#m_customer_id").val()) == ""){
        $('#message').html("Silahkan pilih nama customer!");
        $('.alert-danger').show(); 
    }else if($.trim($("#marketing_id").val()) == ""){
        $('#message').html("Silahkan pilih marketing!");
        $('.alert-danger').show(); 
    }else{
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    var jenis = $('#jenis_barang').val();
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/SalesOrder/load_detail_so'); ?>',
        data:{
            id: id,
            jenis: jenis
        },
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/SalesOrder/get_uom'); ?>",
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
    if($.trim($("#barang_id").val()) == ""){
        $('#message').html("Silahkan pilih item rongsok!");
        $('.alert-danger').show(); 
    }else if($.trim($("#qty").val()) == ""){
        $('#message').html("Jumlah item rongsok tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#harga").val()) == ""){
        $('#message').html("Harga item rongsok tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/SalesOrder/save_detail_so'); ?>',
            data:{
                id:$('#id').val(),
                barang_id:$('#barang_id').val(),
                harga:$('#harga').val(),
                uom:$('#uom').val(),
                qty:$('#qty').val(),
                total_harga:$('#total_harga').val(),
                bruto:$('#bruto').val(),
                netto:$('#netto').val(),
                no_spb:$('#no_spb').val(),
                jenis:$('#jenis_barang').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    $('#barang_id').select2("val", "");;
                    $('#uom').val('');
                    $('#qty').val('');
                    $('#bruto').val('');
                    $('#netto').val('');
                    $('#harga').val('');
                    $('#total_harga').val('');
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
            url:'<?php echo base_url('index.php/SalesOrder/delete_detail_so'); ?>',
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
      