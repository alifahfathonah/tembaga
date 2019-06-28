<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/surat_jalan'); ?>"> Surat Jalan </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/view_surat_jalan'); ?>"> View Surat Jalan </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
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
                                    
                                    <input type="hidden" id="sj_id" name="sj_id">
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
            if( ($group_id==1)||($hak_akses['edit_surat_jalan']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/SalesOrder/approve_surat_jalan'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. Surat Jalan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_surat_jalan" name="no_surat_jalan" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_surat_jalan']; ?>">
                            
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sales_order" name="no_sales_order" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">

                            <input type="hidden" id="so_id" name="so_id" value="<?php echo $header['sales_order_id'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" 
                                readonly value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?= (($this->session->userdata('user_ppn') == 1)? $header['nama_customer'] : $header['nama_customer_kh']) ?>">
                            <input type="hidden" id="id_customer" name="id_customer" value="<?php echo $header['id_customer'];?>" readonly="readonly">
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-4">
                            Alamat
                        </div>
                        <div class="col-md-8">
                            <textarea id="alamat" name="alamat" rows="2" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px"><?= (($this->session->userdata('user_ppn') == 1)? $header['alamat'] : $header['alamat_kh']) ?></textarea>                           
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Status SPB <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <?php
                                if($header['status_spb']==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($header['status_spb']==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($header['status_spb']==2 || $header['status_spb']==4){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Belum Dipenuhi Semua</div>';
                                }else if($header['status_spb']==3){
                                    echo '<div style="background-color:blue; color:#fff; padding:3px">Waiting Approval</div>';
                                }else if($header['status_spb']==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                            <input type="hidden" name="status_spb" value="<?php echo $header['status_spb'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Type Kendaraan
                        </div>
                        <div class="col-md-8">
                            <select disabled id="m_type_kendaraan_id" name="m_type_kendaraan_id" class="form-control myline select2me" 
                                data-placeholder="Silahkan pilih..." style="margin-bottom:5px" 
                                onclick="get_type_kendaraan(this.value);">
                                <option value=""></option>
                                <?php
                                    foreach ($type_kendaraan_list as $row){
                                        echo '<option value="'.$row->id.'" '.(($row->id==$header['m_type_kendaraan_id'])? 'selected="selected"': '').'>'.$row->type_kendaraan.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Kendaraan <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input readonly type="text" name="no_kendaraan" id="no_kendaraan" class="form-control myline" 
                                   style="margin-bottom:5px" value="<?php echo $header['no_kendaraan']; ?>">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Supir
                        </div>
                        <div class="col-md-8">
                            <input readonly=" type="text" id="supir" name="supir" onkeyup="this.value = this.value.toUpperCase()"
                                   class="form-control myline" style="margin-bottom:5px" value="<?php echo $header['supir']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea readonly id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['remarks']; ?></textarea>                           
                        </div>
                    </div>
                    <?php if ($header['status'] == 1){ ?>
                    <div class="row">
                        <div class="col-md-4">
                            Approved By
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="approved_name" id="approved_name" readonly class="form-control myline" style="margin-bottom: 5px;" value="<?php echo $header['approved_name']; ?>">
                        </div>
                    </div>
                    <?php } else if ($header['status'] == 9){?>
                    <div class="row">
                        <div class="col-md-4">
                            Rejected By
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="approved_name" id="approved_name" readonly class="form-control myline" style="margin-bottom: 5px;" value="<?php echo $header['rejected_name']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>              
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                    <?php if($header['jenis_barang']=='FG'){?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 19%">Nama Item</th>
                                <th style="width: 19%">Nama Item Alias</th>
                                <th>UOM</th>
                                <th style="width: 15%">No. Packing</th>
                                <th>Bruto (Kg)</th>
                                <th>Netto (Kg)</th>
                                <th>Bobbin</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $last_series = null;
                                    $no=1; 
                                    $bruto=0;
                                    $netto=0;
                                    foreach ($list_sj as $row) { 
                                        if($row->jenis_barang!=$last_series && $last_series!=null){
                                    echo '<tr>
                                                <td style="text-align: right;" colspan="5"><strong>Total</strong></td>
                                                <td style="background-color: green; color: white;">'.number_format($bruto,2,',','.').'</td>
                                                <td style="background-color: green; color: white;">'.number_format($netto,2,',','.').'</td>
                                                <td colspan="2"></td>
                                            </tr>';
                                            $bruto = 0;
                                            $netto = 0;
                                        }else{
                                            echo '</tr>';
                                        }
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->jenis_barang; ?></td>
                                    <?php if(is_null($row->jenis_barang_a)){ ?>
                                    <td>TIDAK ADA ALIAS</td>
                                    <?php } else { ?>
                                    <td><?php echo $row->jenis_barang_a; ?></td>
                                    <?php } ?>
                                    <td><?php echo $row->uom; ?></td>
                                    <td><?php echo $row->no_packing; ?></td>
                                    <td><?php echo number_format($row->bruto,2,',','.'); ?></td>
                                    <td><?php echo number_format($row->netto,2,',','.'); ?></td>
                                    <td><?php echo $row->nomor_bobbin; ?></td>
                                    <td><a id="print" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcodeSJ(<?=$row->id;?>);" style="margin-top:5px;"><i class="fa fa-print"></i> Print Barcode</a></td>
                                <?php
                                        if($row->jenis_barang==$last_series){
                                            echo '<tr>';
                                        }
                                    $bruto += $row->bruto;
                                    $netto += $row->netto; 
                                    $no++; 
                                $last_series = $row->jenis_barang;
                                    } 
                                ?>
                                <tr>
                                    <td style="text-align: right;" colspan="5"><strong>Total</strong></td>
                                    <td style="background-color: green; color: white;"><?=number_format($bruto,2,',','.');?></td>
                                    <td style="background-color: green; color: white;"><?=number_format($netto,2,',','.');?></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } else if($header['jenis_barang']=='WIP'){ ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th>UOM</th>
                                <th>Qty</th>
                                <th>Netto (Kg)</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $no=1; 
                                    $qty = 0;
                                    $berat = 0;
                                    foreach ($list_sj as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->jenis_barang; ?></td>
                                    <td><?php echo $row->uom; ?></td>
                                    <td><?php echo $row->qty; ?></td>
                                    <td><?php echo number_format($row->netto,2,',','.'); ?></td>
                                    <td><?php echo $row->line_remarks; ?></td>
                                </tr>
                                <?php $no++; $qty += $row->qty; $berat += $row->netto;} ?>
                                <tr>
                                    <td colspan="3" style="text-align: right;">Total :</td>
                                    <td style="background-color: green; color: white;"><?=$qty;?></td>
                                    <td style="background-color: green; color: white;"><?=number_format($berat,2,',','.');?></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php
                    }else if($header['jenis_barang']=='LAIN'){
                    ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th style="width: 6%;">UOM</th>
                                <th style="width: 8%;">Bruto</th>
                                <th style="width: 8%;">Netto (Kg)</th>
                                <th style="width: 6%;">Berat Palette</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $no=1; 
                                    foreach ($list_sj as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->jenis_barang; ?></td>
                                    <td><?php echo $row->uom; ?></td>
                                    <td><?php echo number_format($row->bruto,0,',','.');?></td>
                                    <td><?php echo number_format($row->netto,0,',','.'); ?></td>
                                    <td><?php echo ($row->bruto - $row->netto); ?></td>
                                    <td><?php echo $row->line_remarks; ?></td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </table>
                    <?php } else if($header['jenis_barang']=='RONGSOK'){ ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">No Palette</th>
                                <th>Nama Item</th>
                                <th style="width: 6%;">UOM</th>
                                <th style="width: 8%;">Bruto</th>
                                <th style="width: 8%;">Netto (Kg)</th>
                                <th style="width: 6%;">Berat<br>Palette</th>
                                <th>Action</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $no=1; 
                                    $bruto=0;
                                    $netto=0;
                                    foreach ($list_sj as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->no_packing; ?></td>
                                    <td><?php echo ($row->nama_barang_alias==NULL)? $row->jenis_barang: $row->nama_barang_alias; ?></td>
                                    <td><?php echo $row->uom; ?></td>
                                    <td><?php echo $row->bruto; ?></td>
                                    <td><?php echo $row->netto; ?></td>
                                    <td><?php echo ($row->bruto - $row->netto); ?></td>
                                    <td><a id="print" href="javascript:;" class="btn btn-circle btn-xs blue-ebonyclay" onclick="printBarcodeSJ(<?=$row->id;?>);" style="margin-top:5px;"><i class="fa fa-print"></i> Print Barcode</a></td>
                                </tr>
                                <?php
                                    $bruto += $row->bruto;
                                    $netto += $row->netto; 
                                    $no++; 
                                    } 
                                ?>
                                <tr>
                                    <td style="text-align: right;" colspan="4"><strong>Total</strong></td>
                                    <td><?=number_format($bruto,2,',','.');?></td>
                                    <td><?=number_format($netto,2,',','.');?></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php
                    }else { ?>
                        <table class="table table-bordered table-striped table-hover" id="tabel_barang">
                            <thead>
                                <th>No</th>
                                <th style="width: 20%;">No Palette</th>
                                <th>Nama Item</th>
                                <th style="width: 6%;">UOM</th>
                                <th style="width: 8%;">Bruto</th>
                                <th style="width: 8%;">Netto (Kg)</th>
                                <th style="width: 6%;">Berat<br>Palette</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $no=1; 
                                    $bruto=0;
                                    $netto=0;
                                    foreach ($list_sj as $row) { 
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row->no_packing; ?></td>
                                    <td><?php echo $row->jenis_barang; ?></td>
                                    <td><?php echo $row->uom; ?></td>
                                    <td><?php echo $row->bruto; ?></td>
                                    <td><?php echo $row->netto; ?></td>
                                    <td><?php echo ($row->bruto - $row->netto); ?></td>
                                    <td><?php echo $row->line_remarks; ?></td>
                                </tr>
                                <?php
                                    $bruto += $row->bruto;
                                    $netto += $row->netto; 
                                    $no++; 
                                    } 
                                ?>
                                <tr>
                                    <td style="text-align: right;" colspan="4"><strong>Total</strong></td>
                                    <td><?=number_format($bruto,2,',','.');?></td>
                                    <td><?=number_format($netto,2,',','.');?></td>
                                    <td colspan="2"></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if( ($group_id==1 || $hak_akses['approve_sj']==1) && $header['status']=="0"){
                            echo '<a href="javascript:;" class="btn green" id="approveData" onclick="approveData();"> '
                                .'<i class="fa fa-check"></i> Approve </a> ';
                        }
                        if( ($group_id==1 || $hak_akses['reject_sj']==1) && $header['status']=="0"){
                            echo '<a href="javascript:;" class="btn red" onclick="showRejectBox();"> '
                                .'<i class="fa fa-ban"></i> Reject </a>';
                        }
                    ?>

                    <a href="<?php echo base_url('index.php/SalesOrder/surat_jalan'); ?>" class="btn blue-hoki"> 
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
function approveData(){
    var r=confirm("Anda yakin me-approve surat jalan ini?");
    if(r == true){
        $('#approveData').text('Please Wait ...').prop("onclick", null).off("click");
        $('#formku').submit(); 
    }
};

function printBarcodeSJ(id){
    const jb = $('#jenis_barang').val();
    window.open('<?php echo base_url();?>index.php/SalesOrder/print_barcode_sj?id='+id+'&jb='+jb,'_blank');
}

function showRejectBox(){
    var r=confirm("Anda yakin me-reject surat jalan ini?");
    if(r == true){
        $('#sj_id').val($('#id').val());
        $('#message').html("");
        $('.alert-danger').hide();
        $('#myModal').find('.modal-title').text('Reject Surat Jalan');
        $('#myModal').modal('show', {backdrop : 'true'});
    }
}

function rejectData(){
    if($.trim($('#reject_remarks').val()) == ""){
        $('#message').html("Reject remarks tidak boleh kosong!");
        $('.alert-danger').show();
    } else {
        $('#message').val("");
        $('.alert-danger').hide();
        $('#frmReject').attr('action', '<?php echo base_url(); ?>index.php/SalesOrder/reject_surat_jalan');
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

    //loadDetail(<?php echo $header['id']; ?>);
});
</script>
      