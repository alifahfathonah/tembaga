<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/po_list'); ?>"> PO List </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/view_po'); ?>"> View Purchase Order (PO) </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b>Edit PO Sparepart</b></h3>
        <hr class="divider" />
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <form class="eventInsForm" method="post" target="_self" name="frmReject" 
                              id="frmReject">                            
                            <div class="row">
                                <div class="col-md-4">
                                    Reject Remarks <font color="#f00">*</font>
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
            if( ($group_id==1)||($hak_akses['view_po']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" id="formku" action="<?php echo base_url('index.php/BeliSparePart/update_po'); ?>">   
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" class="form-control myline input-small" style="margin-bottom:5px;float:left;" value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No Pengajuan 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pengajuan" name="no_pengajuan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_pengajuan']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tgl Pengajuan 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tgl_pengajuan" name="tgl_pengajuan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['tgl_pengajuan'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Yang Mengajukan 
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="created_name" name="created_name" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['pemohon']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <select id="supplier_id" name="supplier_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                                <option value=""></option>
                                <?php
                                    foreach ($supplier_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['supplier_id'])? 'selected="selected"': '').'>'.$row->nama_supplier.'</option>';
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
                            Term of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="term_of_payment" name="term_of_payment" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['term_of_payment']; ?>" onkeyup="this.value = this.value.toUpperCase()">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Discount
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="diskon" name="diskon" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['diskon']; ?>">
                        </div>
                        <div class="col-md-1">
                            <label>%</label>
                        </div>
                        <div class="col-md-2">
                            PPN
                        </div>
                        <div class="col-md-4">
                            <select id="ppn" name="ppn" class="form-control myline" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px">
                                <option value="0" <?php echo ((0==$header['ppn'])? 'selected="selected"': '');?>>No</option>
                                <option value="1" <?php echo ((1==$header['ppn'])? 'selected="selected"': '');?>>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Materai
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="materai" name="materai" class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['materai']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Currency
                        </div>
                        <div class="col-md-4">
                            <select id="currency" name="currency" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" onchange="get_cur(this.value);">
                                <option value="IDR" <?=($header['currency']=='IDR')? 'selected':'';?>>IDR</option>
                                <option value="USD" <?=($header['currency']=='USD')? 'selected':'';?>>USD</option>
                            </select>
                        </div>
                        <div id="show_kurs">
                        <div class="col-md-2">
                            Kurs
                        </div>
                        <div class="col-md-4">
                            <input type="number" id="kurs" name="kurs" class="form-control myline" value="<?=$header['kurs'];?>">
                        </div>
                        </div>
                    </div>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item Spare Part</th>
                                <th>Unit of Measure</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($details as $row){
                                    echo '<tr>';
                                    if($header['lpb_dibayar']==0){
                                    echo '<input type="hidden" name="details['.$no.'][po_detail_id]" value="'.$row->id.'">';
                                    }
                                    echo '<td style="text-align:center">'.$no.'</td>';
                                    echo '<td>'.$row->nama_item.'</td>';
                                    echo '<td>'.$row->uom.'</td>';
                                    echo '<td>';
                                    if($header['lpb_dibayar']==0){
                                    echo '<input type="text" id="amount_'.$no.'" name="details['.$no.'][amount]" onkeyup="getComa(this.value, this.id, '.$no.');" value="'.number_format($row->amount,2,'.', ',').'">';
                                    }else{
                                    echo number_format($row->amount,2,',','.');
                                    }
                                    echo '</td>';
                                    if($header['lpb_dibayar']==0){
                                    echo '<td><input type="text" id="qty_'.$no.'" name="details['.$no.'][qty]" onkeyup="getComa(this.value, this.id, '.$no.');" value="'.number_format($row->qty,2,'.', ',').'"></td>';
                                    }else{
                                    echo '<td>'.$row->qty.'</td>';
                                    }
                                    if($header['lpb_dibayar']==0){
                                    echo '<td><input type="text" id="total_amount_'.$no.'" class="form-control" name="details['.$no.'][total_amount]" value="'.number_format($row->total_amount,2,'.', ',').'" readonly></td>';
                                    }else{
                                    echo '<td>'.$row->total_amount.'</td>';
                                    }
                                    echo '</tr>';
                                    $no++;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Simpan </a>
                    <a href="<?php echo base_url('index.php/BeliSparePart/po_list'); ?>" id="btn_kembali" class="btn blue-hoki"> 
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
function get_cur(id){
    if(id=='USD'){
        $('#show_kurs').show();
    }else if(id=='IDR'){
        $('#show_kurs').hide();
        $('#kurs').val(1);
    }
}

function getComa(value, id, no){
    angka = value.toString().replace(/\,/g, "");
    $('#'+id).val(angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    hitungSubTotal(no);
}

function hitungSubTotal(id){
    harga = $('#amount_'+id).val().toString().replace(/\,/g, "");
    qty   = $('#qty_'+id).val().toString().replace(/\,/g, "");
    total_harga = Number(harga)* Number(qty);
    total_harga = total_harga.toFixed(2);
    console.log(total_harga);
    $('#total_amount_'+id).val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
}

function simpanData(){
    if($.trim($("#no_po").val()) == ""){
        $('#message').html("Nomor PO harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#supplier_id").val()) == ""){
        $('#message').html("Silahkan pilih nama supplier!");
        $('.alert-danger').show(); 
    }else if($.trim($("#term_of_payment").val()) == ""){
        $('#message').html("Term of payment harus diisi!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/BeliSparePart/get_no_po_manual'); ?>",
            data: {
                no_po: $('#no_po').val(),
                id_po: $('#id').val()
            },
            cache: false,
            success: function(result) {
                var res = result['type'];
                if(res=='duplicate'){
                    $('#message').html("No. PO Sudah Ada!");
                    $('.alert-danger').show(); 
                }else{
                    $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
                    $('#formku').submit(); 
                }
            }
        });  
    };
};

function get_contact(id){
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('index.php/BeliSparePart/get_contact_name'); ?>",
        data: {id: id},
        cache: false,
        success: function(result) {
            $("#contact_person").val(result['pic']);
        } 
    });
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
});
</script>