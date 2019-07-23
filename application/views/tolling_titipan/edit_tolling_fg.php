<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Tolling FG </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/edit'); ?>"> Edit PO Tolling</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 align="center"><b> Konfirmasi Close PO Rongsok</b></h3>
                    <hr class="divider" />
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <form class="eventInsForm" method="post" target="_self" name="frmReject" 
                              id="frmReject">                            
                            <div class="row">
                                <div class="col-md-4">
                                    Keterang Close PO <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="reject_remarks" name="reject_remarks" 
                                        class="form-control myline" style="margin-bottom:5px" 
                                        onkeyup="this.value = this.value.toUpperCase()" rows="3"></textarea>
                                    <input type="hidden" id="header_id" name="header_id">
                                </div>
                            </div>                           
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="rejectData();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
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
              id="formku" action="<?php echo base_url('index.php/Tolling/update_tolling_fg'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO Tolling <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
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
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px"><?=$header['remarks'];?></textarea>                           
                        </div>
                    </div> 
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="customer_id" name="customer_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onchange="get_cp(this.value);" style="margin-bottom:5px">
                            <option value=""></option>
                                <?php
                                    foreach ($customer_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['customer_id'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
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
                            Jenis PO
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_po" name="jenis_po" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['jenis_po']; ?>">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-4">
                            Term Of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="top" name="top" 
                                class="form-control input myline" style="margin-bottom:5px; float:left;" value="<?php echo $header['term_of_payment']; ?>">
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
                                <th>UOM</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></i></td>
                                <td>
                                <select id="barang_id" name="barang_id" class="form-control select2me myline"  data-placeholder="Pilih..." style="margin-bottom:5px" <?=($header['jenis_po']=='Rongsok')? 'onclick="get_uom_rsk(this.value);"' : 'onclick="get_uom(this.value);"';?> >
                                    <option value=""></option>
                                    <?php foreach ($list_barang as $value){
                                        echo '<option value="'.$value->id.'">('.$value->kode.') '.$value->jenis_barang.'</option>';
                                    }?>
                                </select>
                                </td>
                                <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="qty" name="qty" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="15" value="0" onkeyup="getComa(this.value, this.id);"></td>
                                <td><input type="text" id="harga" name="harga" class="form-control myline" onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);"></td>
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
                    <?php
                        if( ($group_id==1)||($hak_akses['close_po']==1) ){
                            echo '<a href="javascript:;" class="btn red-sunglo" onclick="showRejectBox();"> 
                                <i class="fa fa-lock"></i> Close PO </a>';
                        }
                    ?>
                    <a href="<?php echo base_url('index.php/Tolling/po_list'); ?>" class="btn blue-hoki"> 
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
function getComa(value, id){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    hitungSubTotal();
}

function hitungSubTotal(){
    harga = $('#harga').val().toString().replace(/\,/g, "");
    qty   = $('#qty').val().toString().replace(/\,/g, "");
    total_harga = Number(harga)* Number(qty);
    total_harga = total_harga.toFixed(2);
    $('#total_harga').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
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
        url:'<?php echo base_url('index.php/Tolling/load_detail_tolling'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);     
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Tolling/get_uom_tolling'); ?>",
        async: false,
        type: "POST",
        data: "id="+id,
        dataType: "json",
        success: function(result) {
            $('#uom').val(result['uom']);
        }
    })
}

function get_uom_rsk(id){
    $.ajax({
        url: "<?php echo base_url('index.php/Tolling/get_uom_tolling_rsk'); ?>",
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
        $('#message').html("Silahkan pilih item!");
        $('.alert-danger').show(); 
    }else if($.trim($("#qty").val()) == ""){
        $('#message').html("Jumlah tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#harga").val()) == ""){
        $('#message').html("Harga item tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Tolling/save_detail_tolling'); ?>',
            data:{
                id:$('#id').val(),
                jenis_barang:$('#barang_id').val(),
                harga:$('#harga').val(),
                qty:$('#qty').val(),
                total:$('#total_harga').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail(<?php echo $header['id']; ?>);
                    $('#barang_id').select2('val','');
                    $('#harga').val('');
                    $('#qty').val('');
                    $('#total_harga').val('');
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
    var r=confirm("Anda yakin menghapus item ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/Tolling/delete_detail_tolling'); ?>',
            data:"id="+ id,
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail(<?php echo $header['id'];?>);
                }else{
                    alert(result['message']);
                }     
            }
        });
    }
}

function get_cp(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/Tolling/get_cp'); ?>",
        data: {id: id},
        cache: false,
        success: function(result){
            $("#contact_person").val(result['pic']);
        } 
    });
}

function showRejectBox(){
    var r=confirm("Anda yakin me-close PO ini?");
    if (r==true){
        $('#header_id').val($('#id').val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Close PO Rongsok');
        $("#myModal").modal('show',{backdrop: 'true'}); 
    }
}

function rejectData(){
    if($.trim($("#reject_remarks").val()) == ""){
        $('#message').html("Close remarks harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/Tolling/close_po");
        $('#frmReject').submit(); 
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