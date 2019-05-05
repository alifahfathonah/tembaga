<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliWIP'); ?>"> Pembelian WIP </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliWIP/edit'); ?>"> Edit PO WIP </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <h3 align="center"><b> Edit PO WIP</b></h3>
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
              id="formku" action="<?php echo base_url('index.php/BeliWIP/update'); ?>">                            
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                            <!-- po id -->
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Term of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <?php
                            if ($header['status']==0){
                            ?>
                            <input type="text" id="term_of_payment" name="term_of_payment" 
                                class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()" 
                                value="<?php echo $header['term_of_payment']; ?>">
                            <?php
                            } else {
                            ?>
                            <input type="text" id="term_of_payment" name="term_of_payment" 
                                class="form-control myline" style="margin-bottom:5px"
                                value="<?php echo $header['term_of_payment']; ?>" readonly="readonly">
                            <?php
                            }
                            ?>
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
                            Supplier <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                        <?php
                        if ($header['status']==0){
                        ?>
                            <select id="supplier_id" name="supplier_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." onclick="get_contact(this.value);" style="margin-bottom:5px">
                            <option value=""></option>
                                <?php
                                    foreach ($supplier_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['supplier_id'])? 'selected="selected"': '').'>'.$row->nama_supplier.'</option>';
                                    }
                                ?>
                             </select>
                        <?php
                        }else {
                        ?>
                            <input type="text" id="supplier" name="supplier" 
                                class="form-control myline" style="margin-bottom:5px"
                                value="<?php echo $header['nama_supplier']; ?>"  readonly="readonly">
                        <?php } ?>
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
                            PPN
                        </div>
                        <div class="col-md-8">
                <?php
                if($header['ppn'] == 0){
                ?>
                            <input type="text" id="ppn" name="ppn" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="0">
                        
                <?php                
                }else{
                ?>
                            <input type="text" id="ppn" name="ppn" readonly="readonly" class="form-control myline" style="margin-bottom:5px" value="PPN 10%">
                <?php
                }
                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Currency
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="currency" name="currency" class="form-control myline" readonly="readonly" value="<?=$header['currency'];?>">
                        </div>
                        <div id="show_kurs">
                        <div class="col-md-2">
                            Kurs
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="kurs" name="kurs" class="form-control myline" readonly="readonly" value="<?=$header['kurs'];?>">
                        </div>
                        </div>
                    </div>
                </div>              
            </div>
            <?php
                if ($header['status']==0 || $header['status']==2){
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width: 40px">No</th>
                                <th style="width: 20%">Nama Item WIP</th>
                                <th>Unit of Measure</th>
                                <th>Harga (<?=$header['currency'];?>)</th>
                                <th>Berat</th>
                                <th>Sub Total (<?=$header['currency'];?>)</th>
                                <th>Actions</th>
                            </thead>
                            <tbody id="boxDetail">

                            </tbody>
                            <tr>
                                <td style="text-align:center"><i class="fa fa-plus"></i></td>
                                <td>
                                <select id="wip_id" name="wip_id" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px" onclick="get_uom(this.value);">
                                    <option value=""></option><?php
                                    foreach ($list_wip as $value){
                                        echo "<option value='".$value->id."'>".$value->jenis_barang."</option>";
                                    }?>
                                </select>
                                </td>
                                <td><input type="text" id="uom" name="uom" class="form-control myline" readonly="readonly"></td>
                                <td><input type="text" id="harga" name="harga" class="form-control myline" onkeydown="return myCurrency(event);" value="0" onkeyup="getComa(this.value, this.id);"></td>
                                <td><input type="text" id="qty" name="qty" class="form-control myline" onkeydown="return myCurrency(event);" maxlength="15" value="0" onkeyup="getComa(this.value, this.id);"></td>
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
                        
                    <a href="<?php echo base_url('index.php/BeliWIP'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
            <?php
            }else{
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item WIP</th>
                                <th>Unit of Measure</th>
                                <th>Harga (<?=$header['currency'];?>)</th>
                                <th>Jumlah</th>
                                <th>Sub Total (<?=$header['currency'];?>)</th>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 0;
                                $total = 0;
                                foreach ($list_data as $row){
                                $no++;
                                echo '<tr>';
                                echo '<td style="text-align:center">'.$no.'</td>';
                                echo '<td>'.$row->jenis_barang.'</td>';
                                echo '<td>'.$row->uom.'</td>';
                                echo '<td style="text-align:right">'.number_format($row->amount,0,',','.').'</td>';
                                echo '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
                                echo '<td style="text-align:right">'.number_format($row->total_amount,0,',','.').'</td>';
                                echo '</tr>';
                                $total += $row->total_amount;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="divider"/>
                <h3></h3>
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th style="width:40px">No</th>
                                <th>Nama Item WIP</th>
                                <th>Unit of Measure</th>
                                <th>Jumlah</th>
                                <th>Bruto</th>
                                <th>Netto</th>
                                <th>Jumlah TTR</th>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 0;
                                $qty = 0;
                                $bruto = 0;
                                $netto = 0;
                                $ttr = 0;
                                foreach ($list_detail as $row){
                                $no++;
                            echo '<tr>';
                            echo '<td style="text-align:center">'.$no.'</td>';
                            echo '<td>'.$row->jenis_barang.'</td>';
                            echo '<td>'.$row->uom.'</td>';
                            echo '<td style="text-align:right">'.number_format($row->qty,0,',','.').'</td>';
                            echo '<td style="text-align:right">'.number_format($row->bruto,0,',','.').'</td>';
                            echo '<td style="text-align:right">'.number_format($row->netto,0,',','.').'</td>';
                            echo '<td>'.$row->jml_ttr.'</td>';
                            echo '</tr>';
                            $qty += $row->qty;
                            $bruto += $row->bruto;
                            $netto += $row->netto;
                            $ttr += $row->jml_ttr;                            
                            }
                            ?>
                            </tbody>
                            <tr>
                                <td colspan="3"></td>
                                <td><?=$qty;?></td>
                                <td><?=$bruto;?></td>
                                <td><?=$netto;?></td>
                                <td><?=$ttr;?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if( ($group_id==1)||($hak_akses['close_po']==1) ){
                            echo '<a href="javascript:;" class="btn red-sunglo" onclick="showRejectBox();"> 
                                <i class="fa fa-lock"></i> Close PO </a>';
                        }
                    ?>
                    <a href="<?php echo base_url('index.php/BeliWIP'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
            <?php
            }
            ?>
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
    qty   = $('#qty').val().toString().replace(/\./g, "");
    total_harga = Number(harga)* Number(qty);
    $('#total_harga').val(total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
}

function simpanData(){
    if($.trim($("#tanggal").val()) == ""){
        $('#message').html("Tanggal harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else if($.trim($("#supplier_id").val()) == ""){
        $('#message').html("Silahkan pilih nama supplier!");
        $('.alert-danger').show(); 
    }else if($.trim($("#term_of_payment").val()) == ""){
        $('#message').html("Term of payment harus diisi!");
        $('.alert-danger').show(); 
    }else{     
        $('#formku').submit(); 
    };
};

function loadDetail(id){
    $.ajax({
        type:"POST",
        url:'<?php echo base_url('index.php/BeliWIP/load_detail'); ?>',
        data:"id="+ id,
        success:function(result){
            $('#boxDetail').html(result);   
        }
    });
}

function get_uom(id){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliWIP/get_uom'); ?>",
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
    if($.trim($("#wip_id").val()) == ""){
        $('#message').html("Silahkan pilih item WIP!");
        $('.alert-danger').show();
    }else if($.trim($("#harga").val()) == ""){
        $('#message').html("Harga item WIP tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliWIP/save_detail'); ?>',
            data:{
                id:$('#id').val(),
                wip_id:$('#wip_id').val(),
                harga:$('#harga').val(),
                qty:$('#qty').val(),
                total_harga:$('#total_harga').val()
            },
            success:function(result){
                console.log(result);
                if(result['message_type']=="sukses"){
                    loadDetail($('#id').val());
                    $("#wip_id").select2("val", "");
                    $('#wip_id').val('');
                    $('#uom').val('');
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
    var r=confirm("Anda yakin menghapus item WIP ini?");
    if (r==true){
        $.ajax({
            type:"POST",
            url:'<?php echo base_url('index.php/BeliWIP/delete_detail'); ?>',
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

function showRejectBox(){
    var r=confirm("Anda yakin me-close PO ini?");
    if (r==true){
        $('#header_id').val($('#id').val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Close PO WIP');
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
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/BeliWIP/close_po");
        $('#frmReject').submit(); 
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
      