<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_PurchaseOrder'); ?>"> Purchase Order </a> 
            <i class="fa fa-angle-right"></i> Edit Purchase Order
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <h3 align="center"><b> PO Finish Good</b></h3>
        <hr class="divider" />
        
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
              id="formku" action="<?php echo base_url('index.php/R_PurchaseOrder/update_po_fcustomer'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po"
                                class="form-control myline" style="margin-bottom:5px" maxlength="25"
                                value="<?php echo $header['no_po']; ?>" onkeyup="this.value = this.value.toUpperCase()">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal"
                                class="form-control myline input-small" style="margin-bottom:5px; float:left;" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Kirim <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_kirim" name="tanggal_kirim" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Term of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="term_of_payment" name="term_of_payment" 
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['term_of_payment']; ?>">
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
                                data-placeholder="Silahkan pilih..." onclick="get_contact_customer(this.value);" style="margin-bottom:5px">
                            <option value=""></option>
                                <?php
                                    foreach ($cust_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['customer_id'])? 'selected="selected"': '').'>'.$row->nama_customer.'</option>';
                                    }
                                ?>
                             </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" name="so_id" id="so_id" value="<?= $header['so_id'] ?>">
                            <input type="text" id="no_so" name="no_so"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['no_so']; ?>">
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
                            Keterangan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" class="form-control myline" style="margin-bottom: 5px;" onkeyup="this.value = this.value.toUpperCase()"></textarea>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width: 40px">No</th>
                                <th style="width: 20%">Nama Item Finish Good</th>
                                <th style="width: 5%">Unit of Measure</th>
                                <th>Harga (Rp)</th>
                                <th style="width: 10%">Netto</th>
                                <th>Sub Total (Rp)</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                                 <?php 
                                    $no = 1;
                                    foreach ($myDetail as $row) {
                                echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no ;?></td>
                                    <td>
                                    <?php echo '<select name="details['.$no.'][barang_id]" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px; top: auto; bottom: auto;" onchange="window.scrollTo(0, 150);">
                                        <option value=""></option>';
                                        foreach ($list_fg as $value){ 
                                            echo '<option value="'.$value->id.'" '.(($value->id==$row->jenis_barang_id)? 'selected="selected"': '').'>'.$value->jenis_barang.'</option>';
                                         } 
                                        '</select>';?>
                                    </td>
                                    <td><?php echo '<input type="text" class="form-control myline " style="margin-bottom:5px;" id="uom_'.$no.'" value="'.$row->uom.'" readonly="readonly">';?>
                                    </td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px;" id="amount_'.$no.'" name="details['.$no.'][amount]" value="'.number_format($row->amount,2,'.',',').'" onkeyup="getComa(this.value, this.id,'.$no.');">';?></td>
                                    <td><?php echo '<input type="number" class="form-control myline" style="margin-bottom:5px;" id="netto_'.$no.'" name="details['.$no.'][netto]" value="'.$row->netto.'" onkeyup="hitungSubTotal('.$no.');">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px;" id="total_amount_'.$no.'" name="details['.$no.'][total_amount]" value="'.number_format($row->total_amount,2,'.',',').'" readonly="readonly">';?></td>
                                     <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px;" name="details['.$no.'][line_remarks]" value="'.$row->line_remarks.'"  onkeyup="this.value = this.value.toUpperCase()">';?></td>
                                </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
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
                        
                    <a href="<?php echo base_url('index.php/R_PurchaseOrder'); ?>" class="btn blue-hoki"> 
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
function get_contact_customer(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/R_PurchaseOrder/get_contact_name_customer'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#contact_person").val(result['pic']);
        } 
    });
}

function getComa(value, id, no){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    hitungSubTotal(no);
}

function hitungSubTotal(id){
    harga = $('#amount_'+id).val().toString().replace(/\,/g, "");
    netto = $('#netto_'+id).val();
    total_harga = Number(harga)*Number(netto);
    total_harga = total_harga.toFixed(2);
    $('#total_amount_'+id).val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function simpanData(){
    if($.trim($("#no_po").val()) == ""){
        $('#message').html("Nomor PO harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tanggal_kirim").val()) == ""){
        $('#message').html("Tanggal kirim harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#customer_id").val()) == ""){
        $('#message').html("Silahkan pilih nama customer!");
        $('.alert-danger').show(); 
    }else if($.trim($("#term_of_payment").val()) == ""){
        $('#message').html("Term of payment harus diisi!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function saveDetail(){
    if($.trim($("#fg_id").val()) == ""){
        $('#message').html("Silahkan pilih item finish good!");
        $('.alert-danger').show();
    }else if($.trim($("#harga").val()) == ""){
        $('#message').html("Harga jasa item finish good tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/R_PurchaseOrder/save_detail_po'); ?>',
            data:{
                id:$('#id').val(),
                fg_id:$('#fg_id').val(),
                harga:$('#harga').val(),
                qty:$('#qty').val(),
                total_harga:$('#total_harga').val()
            },
            success:function(result){
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $("#fg_id").select2("val", "");
                    $('#fg_id').val('');
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
    var r=confirm("Anda yakin menghapus item Finish Good ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/R_PurchaseOrder/delete_detail_po'); ?>',
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
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    }); 

    $("#tanggal_kirim").datepicker({
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
      