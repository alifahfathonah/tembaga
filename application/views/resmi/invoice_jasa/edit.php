<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_InvoiceJasa'); ?>">Invoice Jasa </a> 
            <i class="fa fa-angle-right"></i> Edit Invoice Jasa Detail
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <h3 align="center"><b> Detail Invoice Jasa</b></h3>
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
              id="formku" action="<?php echo base_url('index.php/R_InvoiceJasa/update'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice Jasa <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_inv_jasa" name="no_inv_jasa"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_invoice_jasa']; ?>">
                            
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
                            No. Surat Jalan Resmi <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sj_resmi']; ?>" readonly="readonly">

                            <input type="hidden" id="id_sj" name="id_sj" value="<?php echo $header['sjr_id']; ?>">
                        </div>
                    </div>
                    <?php
                if($header['r_t_so_id'] > 0){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_so']; ?>">
                            
                            <input type="hidden" id="id_so" name="id_so" value="<?php echo $header['r_t_so_id']; ?>">
                            <input type="hidden" name="id_invoice_resmi" value="0">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal SO.
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="tgl_so" id="tgl_so" class="form-control myline input-small" style="margin-bottom:5px; float: left;" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo date('d-m-Y', strtotime($header['tgl_so'])) ?>" readonly="readonly">
                        </div>
                    </div> 
                <?php
                } else if($header['r_t_po_id'] > 0){
                ?>  
                    <div class="row">
                        <div class="col-md-4">
                            No. Purchase Order
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="id_po" name="id_po" value="<?php echo $header['r_t_po_id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="tgl_po" id="tgl_po" class="form-control myline input-small" style="margin-bottom:5px; float: left;" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo date('d-m-Y', strtotime($header['tgl_po'])) ?>" readonly="readonly">
                        </div>
                    </div> 
                <?php } ?>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['nama_customer'];?>" readonly="readonly">

                            <input type="hidden" name="customer_id" value="<?php echo $header['customer_id'];?>">
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
                            <textarea id="remarks" name="remarks" class="form-control myline" style="margin-bottom: 5px;" onkeyup="this.value = this.value.toUpperCase()"><?php echo $header['remarks'];?></textarea>
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
                                <th>Bruto</th>
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
                                        foreach ($jenis_barang as $value){ 
                                            echo '<option value="'.$value->id.'" '.(($value->id==$row->jenis_barang_id)? 'selected="selected"': '').'>'.$value->jenis_barang.'</option>';
                                         } 
                                        '</select>';?>
                                    </td>
                                    <td><?php echo '<input type="text" class="form-control myline " style="margin-bottom:5px;" id="uom_'.$no.'" value="'.$row->uom.'" readonly="readonly">';?>
                                    </td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px;" id="amount_'.$no.'" name="details['.$no.'][amount]" value="'.number_format($row->amount,0,',','.').'" onkeyup="getComa(this.value, this.id,'.$no.');">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px;" id="bruto_'.$no.'" name="details['.$no.'][bruto]" value="'.$row->bruto.'" onkeyup="getComa(this.value, this.id,'.$no.');">';?></td>
                                    <td><?php echo '<input type="number" class="form-control myline" style="margin-bottom:5px;" id="netto_'.$no.'" name="details['.$no.'][netto]" value="'.$row->netto.'" onkeyup="hitungSubTotal('.$no.');">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px;" id="total_amount_'.$no.'" name="details['.$no.'][total_amount]" value="'.number_format($row->total_amount,0,',','.').'" readonly="readonly">';?></td>
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
                        
                    <a href="<?php echo base_url('index.php/R_InvoiceJasa'); ?>" class="btn blue-hoki"> 
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
function get_contact(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/R_PurchaseOrder/get_contact_name'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#contact_person").val(result['pic']);
        } 
    });
}
function myCurrency(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 105))
        return false;
    return true;
}

function getComa(value, id, no){
    angka = value.toString().replace(/\./g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    hitungSubTotal(no);
}

function hitungSubTotal(id){
    harga = $('#amount_'+id).val().toString().replace(/\./g, "");
    netto = $('#netto_'+id).val();
    total_harga = Number(harga)* Number(netto);
    $('#total_amount_'+id).val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function simpanData(){
    if($.trim($("#no_inv_jasa").val()) == ""){
        $('#message').html("Nomor PO harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show();
    }else{     
        $('#formku').submit(); 
    };
};
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
});
</script>