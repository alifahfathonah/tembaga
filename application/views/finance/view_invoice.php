<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang FG
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangFG/view_spb'); ?>"> View Surat Permintaan Barang (SPB) FG</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> Detail Invoice</b></h3>
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
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <?php
            if( ($group_id==1)||($hak_akses['view_spb']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Invoice<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_invoice']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_so" name="no_so" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">

                            <input type="hidden" id="so_id" name="so_id" value="<?php echo $header['id_sales_order'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_surat_jalan']; ?>">
                            <input type="hidden" id="id_sj" name="id_sj" value="<?php echo $header['id_surat_jalan']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal Jatuh Tempo<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['tgl_jatuh_tempo'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['keterangan']; ?></textarea>                           
                        </div>
                    </div>
                    <?php
                       // if($header['status']=="9"){
                    ?>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            Rejected By
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="rejected_by" name="rejected_by" readonly="readonly"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $myData['reject_name']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Reject Remarks
                        </div>
                        <div class="col-md-8">
                            <textarea id="reject_remarks" name="reject_remarks" rows="3" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $myData['reject_remarks']; ?></textarea>
                        </div>
                    </div> -->
                    <?php
                        //}
                    ?>
                </div>              
            </div>
        <?php if(empty($detailInvoice)){?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Surat Jalan</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>No Packing</th>
                                            <th>Qty</th>
                                            <th>Bruto</th>
                                            <th>Netto (UOM)</th>
                                            <th>Nomor<br>Bobbin</th>
                                            <th>Nomor Packing</th>
                                            <th>Amount</th>
                                            <th>Keterangan</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $total_all = 0;
                                            foreach ($details as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->no_packing.'</td>';
                                                echo '<td>'.$row->qty.'</td>';
                                                echo '<td>'.$row->bruto.'</td>';
                                                echo '<td>'.$row->netto.' '.$row->uom.'</td>';
                                                echo '<td>'.$row->nomor_bobbin.'</td>';
                                                echo '<td>'.$row->no_packing.'</td>';
                                                echo '<td>'.number_format($row->amount,0,',','.').'</td>';
                                                echo '<td>'.$row->line_remarks.'</td>';
                                                $total = ($row->netto * $row->amount);
                                                echo '<td>'.number_format($total,0,',','.').'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $total_all += $total;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="9" style="text-align: right; font-weight: bold;">Total</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($total_all,0,',','.');?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if( ($group_id==1 || $hak_akses['approve_spb']==1)){
                            echo '<a href="javascript:;" class="btn green" onclick="simpanData();"> '
                                .'<i class="fa fa-check"></i> Simpan </a> ';
                        }
                    ?>
                    <a href="<?php echo base_url('index.php/Finance/invoice'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
        </form>
        <?php }else{ ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Surat Jalan</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>Qty</th>
                                            <th>Netto (UOM)</th>
                                            <th>Amount</th>
                                            <th>Total</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $total_all = 0;
                                            foreach ($detailInvoice as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->jenis_barang.'</td>';
                                                echo '<td>'.$row->qty.'</td>';
                                                echo '<td>'.$row->netto.' '.$row->uom.'</td>';
                                                echo '<td>'.number_format($row->harga,0,',','.').'</td>';
                                                echo '<td>'.number_format($row->total_harga,0,',','.').'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $total_all += $row->total_harga;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="5" style="text-align: right; font-weight: bold;">Total</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($total_all,0,',','.');?></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <a href="<?php echo base_url('index.php/Finance/invoice'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
        <?php
                }//ELSE IF EMPTY
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
function simpanData(){
    var r=confirm("Anda yakin invoice sudah benar?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/Finance/simpan_invoice");    
        $('#formku').submit(); 
    }
};

// function showRejectBox(){
//     var r=confirm("Anda yakin me-reject permintaan barang ini?");
//     if (r==true){
//         $('#header_id').val($('#id').val());
//         $('#message').html("");
//         $('.alert-danger').hide();
        
//         $("#myModal").find('.modal-title').text('Reject Permintaan Barang');
//         $("#myModal").modal('show',{backdrop: 'true'}); 
//     }
// }

// function rejectData(){
//     if($.trim($("#reject_remarks").val()) == ""){
//         $('#message').html("Reject remarks harus diisi, tidak boleh kosong!");
//         $('.alert-danger').show(); 
//     }else{
//         $('#message').html("");
//         $('.alert-danger').hide();
//         $('#frmReject').attr("action", "<?php echo base_url(); ?>index.php/Finance/reject_invoice");
//         $('#frmReject').submit(); 
//     }
// }
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
$(function(){    
    loadDetail(<?php echo $myData['id']; ?>);
});
</script>
      