<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_Rongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_Rongsok/matching'); ?>"> Matching PO - DTR </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==16)||($hak_akses['matching']==1) ){
        ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
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
                                    
                                    <input type="hidden" id="po_id" name="po_id" value="<?php echo $header_po['id']; ?>">
                                    <input type="hidden" id="dtr_id" name="dtr_id">
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

        <div class="modal fade" id="approveModal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 align="center"><b>Approve TTR</b></h3>
                    <hr class="divider" />
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span id="msg_approve">&nbsp;</span>
                            </div>
                        </div>
                    </div>
                        <form class="eventInsForm" method="post" target="_self" name="frmApprove" id="frmApprove">
                            <div class="row">
                                <div class="col-md-4">
                                    No DTR<font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nomor_dtr" name="nomor_dtr" class="form-control myline" style="margin-bottom:5px" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    No TTR<font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="nomor_ttr" name="nomor_ttr" class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                                    
                                    <input type="hidden" id="dtr_id_header" name="dtr_id">
                                    <input type="hidden" id="po_id_header" name="po_id">
                                    <input type="hidden" id="dtr_type_1" name="dtr_type" value="1">
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-4">
                                    Tanggal <font color="#f00">*</font>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="tanggal" name="tanggal" 
                                        class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                        value="<?php echo date('d-m-Y'); ?>">
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-md-4">
                                    No Surat Jalan
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="no_sj" name="no_sj" class="form-control myline" style="margin-bottom:5px" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                            </div>      
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" id="approveData" onClick="approveData();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="portlet box yellow-gold">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Purchase Order
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        Supplier
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $header_po['nama_supplier']; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        PIC
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $header_po['pic']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        No. PO
                                    </div>
                                    <div class="col-md-8">
                                        : <div style="color:red; display: inline"><?php echo $header_po['no_po']; ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Tanggal
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $header_po['tanggal']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Item</th>
                                    <th>UOM</th>
                                    <th>Harga (Rp)</th>
                                    <th>Netto</th> 
                                    <th>Sub Total (Rp)</th>                      
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $netto = 0;
                                    $total = 0;
                                    foreach ($details_po as $row){
                                        echo '<tr>';
                                        echo '<td style="text-align:center;">'.$no.'</td>';
                                        echo '<td>'.$row->nama_item.'</td>';
                                        echo '<td>'.$row->uom.'</td>';
                                        echo '<td style="text-align:right;">'.number_format($row->amount,2,',', '.').'</td>';
                                        echo '<td style="text-align:right;">'.number_format($row->qty,2,',', '.').'</td>';
                                        echo '<td style="text-align:right;">'.number_format($row->total_amount,2,',', '.').'</td>';
                                        echo '</tr>';
                                        $netto += $row->qty;
                                        $total += $row->total_amount;
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align:right;" colspan="4"><strong>Total Harga (Rp) </strong></td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($netto,2,',','.'); ?></strong>
                                        </td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($total,2,',','.'); ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="portlet box green-seagreen">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i><span style="color: green; font-weight: bold;">Approved</span> Data Timbang Rongsok (DTR)
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <?php 
                            foreach ($dtr_app as $index=>$row){
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        No. DTR
                                    </div>
                                    <div class="col-md-8">
                                        : <div style="color:red; display: inline"><?php echo $row->no_dtr; ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Tanggal
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $row->tanggal; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        Supplier
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $row->nama_supplier; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Jenis Barang
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $row->jenis_barang; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Penimbang
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $row->penimbang; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Item</th>
                                    <th>UOM</th>
                                    <th>Qty</th>
                                    <th>Bruto (Kg)</th>
                                    <th>Netto (Kg)</th>
                                    <th>No. Pallete</th>                    
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $bruto = 0;
                                    $netto = 0;
                                    foreach ($row->details as $value){
                                        echo '<tr>';
                                        echo '<td style="text-align:center;">'.$no.'</td>';
                                        echo '<td>'.$value->nama_item.'</td>';
                                        echo '<td>'.$value->uom.'</td>';
                                        echo '<td style="text-align:right;">'.number_format($value->qty,2,',', '.').'</td>';
                                        echo '<td style="text-align:right;">'.$value->bruto.'</td>';
                                        echo '<td style="text-align:right;">'.$value->netto.'</td>';
                                        echo '<td>'.$value->no_pallete.'</td>';
                                        echo '</tr>';
                                        $bruto += $value->bruto;
                                        $netto += $value->netto;
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align:right;" colspan="4"><strong>Total (Kg) </strong></td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($bruto,2,',','.'); ?></strong>
                                        </td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($netto,2,',','.'); ?></strong>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>                            
                        </div>
                        <hr>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                
                <div class="portlet box green-seagreen">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-file-word-o"></i>Data Timbang Rongsok (DTR)
                        </div>                 
                    </div>
                    <div class="portlet-body">
                        <?php 
                            foreach ($dtr as $index=>$row){
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        No. DTR
                                    </div>
                                    <div class="col-md-8">
                                        : <div style="color:red; display: inline"><?php echo $row->no_dtr; ?></div>
                                        <input type="hidden" id="no_dtr_<?=$row->id;?>" value="<?=$row->no_dtr;?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Tanggal
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $row->tanggal; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        Supplier
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $row->nama_supplier; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Jenis Barang
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $row->jenis_barang; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Penimbang
                                    </div>
                                    <div class="col-md-8">
                                        : <?php echo $row->penimbang; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Item</th>
                                    <th>UOM</th>
                                    <th>Qty</th>
                                    <th>Bruto (Kg)</th>
                                    <th>Netto (Kg)</th>
                                    <th>No. Pallete</th>                    
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $bruto = 0;
                                    $netto = 0;
                                    foreach ($row->details as $value){
                                        echo '<tr>';
                                        echo '<td style="text-align:center;">'.$no.'</td>';
                                        echo '<td>'.$value->nama_item.'</td>';
                                        echo '<td>'.$value->uom.'</td>';
                                        echo '<td style="text-align:right;">'.number_format($value->qty,0,',', '.').'</td>';
                                        echo '<td style="text-align:right;">'.number_format($value->bruto,2,',','.').'</td>';
                                        echo '<td style="text-align:right;">'.number_format($value->netto,2,',','.').'</td>';
                                        echo '<td>'.$value->no_pallete.'</td>';
                                        echo '</tr>';
                                        $bruto += $value->bruto;
                                        $netto += $value->netto;
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td style="text-align:right;" colspan="4"><strong>Total (Kg) </strong></td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($bruto,2,',','.'); ?></strong>
                                        </td>
                                        <td style="text-align:right;">
                                            <strong><?php echo number_format($netto,2,',','.'); ?></strong>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    if($row->status==0){
                                        echo '<a href="javascript:;" class="btn btn-xs btn-circle green" id="approve_'.$row->id.'" onclick="approve('.$row->id.');"> '
                                        . '<i class="fa fa-check"></i> Approve </a> &nbsp; ';
                                        echo '<a href="javascript:;" class="btn btn-xs btn-circle red" onclick="reject('.$row->id.');"> '
                                        . '<i class="fa fa-check"></i> Reject </a>';
                                    }else if($row->status==1){
                                        echo '<div style="color:green; display:inline">Approved </div> by '.$row->approved_name;
                                    }else if($row->status==9){
                                        echo '<div style="color:red; display:inline">Rejected </div> by '.$row->rejected_name.'<br>';
                                        echo '<i>Rejected remarks :</i><br>';
                                        echo $row->reject_remarks;
                                    }
                                ?>
                            </div>
                        </div>
                        <hr>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>                          
        
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
function approve(id){
        $('#dtr_id_header').val(id);
        $('#po_id_header').val($('#po_id').val());
        $('#nomor_dtr').val($('#no_dtr_'+id).val());
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#approveModal").find('.modal-title').text('Approve DTR');
        $("#approveModal").modal('show',{backdrop: 'true'}); 
};

function approveData(){
    if($.trim($("#nomor_ttr").val()) == ""){
        $('#msg_approve').html("Nomor TTR harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/BeliRongsok/get_no_ttr'); ?>",
            data: {
                no_ttr: $('#nomor_ttr').val(),
                tanggal: $('#tanggal').val()
            },
            cache: false,
            success: function(result) {
                var res = result['type'];
                // console.log(res);
                if(res=='duplicate'){
                    $('#msg_approve').html("Nomor TTR sudah ada, tolong coba lagi!");
                    $('.alert-danger').show(); 
                }else{
                    $('#approveData').text('Please Wait ...').prop("onclick", null).off("click");
                    $('#msg_approve').html("");
                    $('.alert-danger').hide();
                    $('#frmApprove').attr("action", "<?php echo base_url(); ?>index.php/R_Rongsok/approve");
                    $('#frmApprove').submit(); 
                }
            }
        });
    }
}

function reject(id){
    var r=confirm("Anda yakin me-reject DTR ini?");
    if (r==true){
        $('#dtr_id').val(id);
        $('#message').html("");
        $('.alert-danger').hide();
        
        $("#myModal").find('.modal-title').text('Reject DTR');
        $("#myModal").modal('show',{backdrop: 'true'}); 
    }
}

function rejectData(){
    if($.trim($("#reject_remarks").val()) == ""){
        $('#message').html("Reject remarks harus diisi, tidak boleh kosong!");
        $('.alert-danger').show(); 
    }else{
        $('#message').html("");
        $('.alert-danger').hide();
        $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/BeliRongsok/reject");
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
});
</script>