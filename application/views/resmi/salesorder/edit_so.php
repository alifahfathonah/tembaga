<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SO'); ?>"> Sales Order </a> 
            <i class="fa fa-angle-right"></i> Edit Sales Order
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($hak_akses['edit']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/SO/update_so'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so"
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $header['no_so']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal']))?>">
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
                    <div class="row">
                        <div class="col-md-4">
                            Keterangan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="3"
                                class="form-control myline" style="margin-bottom:5px" 
                                onkeyup="this.value = this.value.toUpperCase()"><?php echo $header['remarks']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nomor PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po"
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $header['no_so']; ?>" readonly="readonly">

                            <input type="hidden" id="po_id" name="po_id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_po" name="tanggal_po" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tgl_po'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="m_customer_id" name="m_customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->nama_customer==$header['nama_customer'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
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
                                <th>Bruto</th>
                                <th>Netto (Kg)</th>
                                <th>Sub Total(Rp)</th>
                                <th style="width: 15%; text-align: center">Actions</th>
                            </thead>
                            <tbody id="boxDetail">
                                
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
                        
                    <a href="<?php echo base_url('index.php/SO'); ?>" class="btn blue-hoki"> 
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
function myCurrency_a(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa_a(value, id, no){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    hitungSubTotal_a(no);
}

function hitungSubTotal_a(id){
    harga = $('#amount_'+id).val().toString().replace(/\./g, "");
    netto = $('#netto_'+id).val().toString().replace(/\./g, "");
    total_harga = Number(harga)* Number(netto);
    $('#total_amount_'+id).val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
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
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/SO/load_detail_so'); ?>',
        data:{
            id: id,
        },
        dataType: "json",
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/SalesOrder/get_uom'); ?>",
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('.uom').val(result['uom']);
        }
    })
}

function saveDetail(){
    if($.trim($("#barang_id").val()) == ""){
        $('#message').html("Silahkan pilih item finish good!");
        $('.alert-danger').show(); 
    }else if(($.trim($("#netto").val()) || $.trim($("#qty").val())) == ""){
        $('#message').html("Jumlah item/netto rongsok tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#harga").val()) == ""){
        $('#message').html("Harga item rongsok tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/SO/save_detail_so'); ?>',
            data:{
                id:$('#id').val(),
                barang_id:$('#barang_id').val(),
                harga:$('#harga').val(),
                uom:$('#uom').val(),
                qty:$('#qty').val(),
                total_harga:$('#total_harga').val(),
                bruto:$('#bruto').val(),
                netto:$('#netto').val(),
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

function editDetail(id){
    $('#btnEdit_'+id).hide();
    $('#lbl_jenis_barang_'+id).hide();
    $('#lbl_uom_'+id).hide();
    $('#lbl_amount_'+id).hide();
    $('#lbl_bruto_'+id).hide();
    $('#lbl_netto_'+id).hide();
    $('#lbl_total_amount_'+id).hide();
    
    $('#btnUpdate_'+id).show();
    $('#jenis_barang_id_'+id).show();
    $('#uom_'+id).show();
    $('#amount_'+id).show();
    $('#bruto_'+id).show();
    $('#netto_'+id).show();
    $('#total_amount_'+id).show();
}

function updateDetail(id){
    if($.trim($("#jenis_barang_id_"+id).val()) == ""){
        $('#message').html("Silahkan pilih nama spare part!");
        $('.alert-danger').show(); 
    }else if($.trim($("#netto_"+id).val()) == ""){
        $('#message').html("Jumlah spare part tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/SO/update_detail_so'); ?>',
            data:{
                detail_id:$('#detail_id_'+id).val(),
                jenis_barang_id:$('#jenis_barang_id_'+id).val(),
                bruto:$('#bruto_'+id).val(),
                netto:$('#netto_'+id).val(),
                amount:$('#amount_'+id).val(),
                total_amount:$('#total_amount_'+id).val(),
            },
            success:function(result){
                if(result['message_type']=="sukses"){
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

$(function(){        
    $("#tanggal_po").datepicker({
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
      