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
            if( ($group_id==1)||($hak_akses['edit_so']==1) ){
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
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Marketing <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                        <input type="text" id="nama_marketing" name="nama_marketing"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['realname']; ?>" onkeyup="this.value = this.value.toUpperCase()" readonly="readonly">
                        <input type="hidden" id="marketing_id" name="marketing_id" value="<?php echo $header['marketing_id'];?>">
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
                            <textarea id="keterangan" name="keterangan" rows="3"
                                class="form-control myline" style="margin-bottom:5px" 
                                onkeyup="this.value = this.value.toUpperCase()"><?= $header['keterangan'];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
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
                            Tanggal PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_po" name="tanggal_po" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;"value="<?php echo date('d-m-Y', strtotime($header['tgl_po'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Term of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="term_of_payment" name="term_of_payment" class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()" value="<?= $header['term_of_payment'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis SO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="jenis_so" name="jenis_so" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <option value="0" <?=($header['jenis_so']==0)? 'selected="selected"':'';?> >Lokal</option>
                                <option value="1" <?=($header['jenis_so']==1)? 'selected="selected"':'';?>>Export</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                <?php if($header['flag_invoice']==0){ ?>
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_customer_id'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
                                    }
                                ?>
                            </select>
                <?php }else{ ?>
                        <input type="text" id="nama_customer" name="nama_customer"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?= (($this->session->userdata('user_ppn') == 1)? $header['nama_customer'] : $header['nama_customer_kh']) ?>" onkeyup="this.value = this.value.toUpperCase()" readonly="readonly">
                        <input type="hidden" id="m_customer_id" name="m_customer_id" value="<?php echo $header['m_customer_id'];?>">
                <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Alias Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="alias" name="alias"
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['alias']; ?>" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Currency
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="currency" name="currency" class="form-control myline" value="<?=$header['currency'];?>" readonly="readonly">
                        </div>
                        <div id="show_kurs">
                        <div class="col-md-2">
                            Kurs
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="kurs" name="kurs" class="form-control myline" value="<?=$header['kurs'];?>" readonly="readonly">
                        </div>
                        </div>
                    </div>
                </div>              
            </div>
            <?php if($header['status_spb'] == 0){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">Nama Item</th>
                                <th>Nama Barang Alias</th>
                                <th>Harga (<?=$header['currency'];?>)</th>
                        <?php
                        if($header['jenis_barang'] == 'WIP'){
                        ?>
                                <th>Qty</th>
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
                                <th>Sub Total(<?=$header['currency'];?>)</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                
                            </tbody>
                            <?php
                echo '<tr>'.
                        '<td style="text-align:center"><i class="fa fa-plus"></i></td>'.
                        '<td>'.
                        '<select id="barang_id" name="barang_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onchange="get_uom(this.value);">'.
                        '<option value=""></option>';
                    foreach ($list_barang as $value){
                        echo "<option value='".$value->id."'> (".$value->kode.") ".$value->jenis_barang."</option>";
                    }
                        echo '</select>'.
                        '</td>'.
                        '<input type="hidden" id="uom" name="uom">'.
                        '<td><input type="text" id="nama_barang_1" name="nama_barang" class="form-control myline" onkeyup="this.value = this.value.toUpperCase()"></td>'.
                        '<td><input type="text" id="amount_1" name="harga" class="form-control myline" value="0" onkeyup="getComa_a(this.value, this.id, 1);"></td>';
        if($header['jenis_barang'] == 'WIP'){
                    echo '<td><input type="text" id="qty_1" name="qty" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="5" value="0"></td>'.
                        '<td><input type="text" id="netto_1" name="netto" class="form-control myline" maxlength="10" value="0" onkeyup="hitungSubTotal_a(1)"></td>';  
        } else if($header['jenis_barang'] == 'FG' || $header['jenis_barang'] == 'AMPAS') {
                    echo '<input type="hidden" id="qty_1" name="qty" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="10" value="0">'.
                        '<input type="hidden" id="bruto" name="bruto" class="form-control myline" maxlength="10" value="0">'.
                        '<td><input type="text" id="netto_1" name="netto" class="form-control myline" maxlength="10" value="0" onkeyup="hitungSubTotal_a(1)"></td>';
        } else {
                    echo '<td><input type="text" id="netto_1" name="qty" class="form-control myline" maxlength="10" value="0" onkeyup="hitungSubTotal_a(1)"></td>';
        }
                    echo '<td><input type="text" id="total_amount_1" name="total_harga" class="form-control myline" readonly="readonly" value="0"></td>'.
                        '<td style="text-align:center"><a href="javascript:;" class="btn btn-xs btn-circle yellow-gold" onclick="saveDetail();" style="margin-top:5px" id="btnSaveDetail"><i class="fa fa-plus"></i> Tambah </a></td>';
                                ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                        
                    <a href="<?php echo base_url('index.php/SalesOrder'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
        </form>
            <?php }else{ ?>
        <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">Nama Item</th>
                                <th>Nama Barang Alias</th>
                                <th>Unit of Measure</th>
                                <th>Harga (<?=$header['currency'];?>)</th>
                        <?php
                        if($header['jenis_barang'] == 'WIP'){
                        ?>
                                <th>Qty</th>
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
                                <th>Sub Total(<?=$header['currency'];?>)</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetailEdit">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo (($header['flag_invoice']!=1)? '<a href="javascript:;" class="btn green" onclick="simpanData();"><i class="fa fa-floppy-o"></i> Simpan </a> ':'');
                    ?>                       
                    <a href="<?php echo base_url('index.php/SalesOrder'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
        </form>
        <?php
                }//if status_spb
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
function editDetail(id){
    $('#btnEdit_'+id).hide();
    $('#lbl_jenis_barang_'+id).hide();
    $('#lbl_uom_'+id).hide();
    $('#lbl_amount_'+id).hide();
    $('#lbl_netto_'+id).hide();
    $('#lbl_total_amount_'+id).hide();
    $('#lbl_nama_barang_alias_'+id).hide();
    
    $('#btnUpdate_'+id).show();
    $('#jenis_barang_id_'+id).show();
    $('#uom_'+id).show();
    $('#amount_'+id).show();
    $('#netto_'+id).show();
    $('#total_amount_'+id).show();
    $('#nama_barang_alias_'+id).show();
}

function updateDetail(id){
    const jenis = $("#jenis_barang").val();
    if($.trim($("#jenis_barang_id_"+id).val()) == ""){
        $('#message').html("Silahkan pilih nama spare part!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto_"+id).val()) == ""){
        $('#message').html("Jumlah spare part tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/SalesOrder/update_detail_so'); ?>',
            data:{
                detail_id:$('#detail_id_'+id).val(),
                spb_detail_id:$('#spb_detail_id_'+id).val(),
                jenis: jenis,
                nama_barang_alias:$('#nama_barang_alias_'+id).val(),
                netto:$('#netto_'+id).val(),
                amount:$('#amount_'+id).val(),
                total_amount:$('#total_amount_'+id).val(),
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetailEdit($('#id').val());
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

function myCurrency_a(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa_a(value, id, no){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    hitungSubTotal_a(no);
}

function hitungSubTotal_a(id){
    if($('#jenis_barang').val() == 'FG' || $('#jenis_barang').val() == 'AMPAS' || $('#jenis_barang').val() == 'WIP'){
        harga = $('#amount_'+id).val().toString().replace(/\,/g, "");
        netto = $('#netto_'+id).val().toString().replace(/\,/g, "");
        total_harga = Number(harga)* Number(netto);
        total_harga = total_harga.toFixed(2);
        $('#total_amount_'+id).val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }else{
        harga = $('#amount_'+id).val().toString().replace(/\,/g, "");;
        netto = $('#netto_'+id).val().toString().replace(/\,/g, "");
        total_harga = Number(harga)* Number(netto);
        total_harga = total_harga.toFixed(2);
        $('#total_amount_'+id).val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
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
        $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
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

function loadDetailEdit(id){
    var jenis = $('#jenis_barang').val();
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/SalesOrder/load_detail_so_edit'); ?>',
        data:{
            id: id,
            jenis: jenis
        },
        success:function(result){
            $('#boxDetailEdit').html(result);     
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

function saveDetail(){
    if($.trim($("#barang_id").val()) == ""){
        $('#message').html("Silahkan pilih item rongsok!");
        $('.alert-danger').show(); 
    }else if(($.trim($("#netto_1").val()) || $.trim($("#qty_1").val())) == ""){
        $('#message').html("Jumlah item/netto rongsok tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#amount_1").val()) == ""){
        $('#message').html("Harga item rongsok tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/SalesOrder/save_detail_so'); ?>',
            data:{
                id:$('#id').val(),
                barang_id:$('#barang_id').val(),
                harga:$('#amount_1').val(),
                uom:$('#uom').val(),
                nama_barang:$('#nama_barang_1').val(),
                qty:$('#qty_1').val(),
                total_harga:$('#total_amount_1').val(),
                bruto:$('#bruto').val(),
                netto:$('#netto_1').val(),
                no_spb:$('#no_spb').val(),
                jenis:$('#jenis_barang').val()
            },
            success:function(result){
                console.log(result);
                if(result['message_type']=="sukses"){
                    $('#barang_id').select2("val", "");
                    $('#nama_barang_1').val('');
                    $('#uom').val('');
                    $('#qty_1').val('');
                    $('#bruto').val('');
                    $('#netto_1').val('');
                    $('#amount_1').val('');
                    $('#total_amount_1').val('');
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

    $("#tanggal_po").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        yearRange: "-10:+10",
        dateFormat: 'dd-mm-yy'
    });

    const status = <?= $header['status_spb'] ;?>;
    if(status==0){
        loadDetail(<?php echo $header['id']; ?>);
    }else{
        loadDetailEdit(<?php echo $header['id']; ?>);
    }
});
</script>
      