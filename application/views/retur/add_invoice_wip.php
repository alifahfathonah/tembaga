<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Retur
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Retur'); ?>"> Retur List</a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add_spb']==1) ){
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
              id="formku" action="<?php echo base_url('index.php/Retur/save_invoice'); ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pembayaran" name="no_pembayaran" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="Auto generate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Retur <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_retur" name="no_retur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_retur'];?>">
                            <input type="hidden" name="id_retur" value="<?php echo $header['id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_pembuat" name="nama_pembuat" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $this->session->userdata('realname'); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks'];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['nama_customer']; ?>">
                            <input type="hidden" name="customer_id" value="<?php echo $header['customer_id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Jatuh Tempo<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal_jatuh" name="tanggal_jatuh" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;"
                                value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>  
                </div>         
            </div>
            <hr class="divider">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 19%">Nama Item</th>
                                <th>UOM</th>
                                <th>Netto (Kg)</th>
                                <th width="15%">Harga</th>
                                <th width="15%">Sub Total</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $no=1; 
                                    foreach ($list_retur as $row) {
                                echo '<input type="hidden" name="details['.$no.'][id]" value="'.$row->id.'">';
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?= $no ;?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" name="details['.$no.'][nama_barang]" value="'.$row->jenis_barang.'" readonly="readonly"><input type="hidden" name="details['.$no.'][jenis_barang_id]" value="'.$row->jenis_barang_id.'">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" value="'.$row->uom.'" readonly="readonly">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" id="netto_'.$no.'" name="details['.$no.'][netto]" value="'.$row->netto.'" readonly="readonly">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" id="amount_'.$no.'" name="details['.$no.'][amount]" onkeyup="getComa(this.value, this.id,'.$no.');">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" id="total_amount_'.$no.'" name="details['.$no.'][total]" readonly="readonly">';?></td>
                                    <td><?php echo '<input type="text" class="form-control myline" style="margin-bottom:5px" name="details['.$no.'][line_remarks]" value="'.$row->line_remarks.'" onkeyup="this.value = this.value.toUpperCase()">';?></td>
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
    console.log(total_harga);
    $('#total_amount_'+id).val(total_harga.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    console.log($('#total_amount_'+id).val());
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
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
        dateFormat: 'yy-mm-dd'
    });
    $("#tanggal_jatuh").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });
});
</script>