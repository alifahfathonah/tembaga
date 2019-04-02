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
            if( ($group_id==1)||($hak_akses['view_invoice']==1) ){
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
                <?php if($header['id_retur'] == 0){?>
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
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/SalesOrder/view_so/<?php echo $header['id_sales_order']; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View Sales Order &nbsp; </a>
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
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/SalesOrder/view_surat_jalan/<?php echo $header['id_surat_jalan']; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View SJ &nbsp; </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. Matching<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px;" 
                                value="<?php echo $header['no_matching']; ?>">
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Finance/matching_invoice/<?php echo $header['flag_matching']; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View Matching &nbsp; </a>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Retur<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_retur" name="no_retur" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_retur']; ?>">
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Retur/view/<?php echo $header['id_retur']; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View Retur &nbsp; </a>
                        </div>
                    </div>
                <?php } ?>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Customer<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_sj" name="no_sj" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_customer']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Term Of Payment <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="term_of_payment" name="term_of_payment" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['term_of_payment'];?>">
                        </div>
                    </div>
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
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['keterangan']; ?></textarea>                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Bank <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_bank" name="nama_bank" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_bank']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Rekening <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_rek" name="no_rek" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nomor_rekening']; ?>">
                        </div>
                    </div>
                </div>              
            </div>
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
                                            $ppn = 0;
                                            $ppn1 = 0;
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
                                            if($header['flag_ppn']==1){
                                                $ppn1 = $total_all - $header['diskon'];
                                                $ppn = $ppn1*10/100;
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
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Biaya</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <td>Harga Total Invoice</td>
                                            <td>Rp. <?=number_format($total_all,0,',','.');?></td>
                                        </tr>
                                        <tr>
                                            <td>Diskon</td>
                                            <td>(<i class="fa fa-minus"></i>) <?=number_format($header['diskon'],0,',','.');?></td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Tambahan</td>
                                            <td>(<i class="fa fa-minus"></i>) <?=number_format($header['add_cost'],0,',','.');?></td>
                                        </tr>
                                        <tr>
                                            <td>Materai</td>
                                            <td>(<i class="fa fa-plus"></i>) <?=number_format($header['materai'],0,',','.');?></td>
                                        </tr>
                                        <tr>
                                            <td>Pajak</td>
                                            <td>(<i class="fa fa-plus"></i>) <?=number_format($ppn,0,',','.');?></td>
                                        </tr>
                                        <?php 
                                        $total_bersih = 0;
                                        $total_bersih = $total_all - $header['diskon'] - $header['add_cost'] + $header['materai'] + $ppn;
                                        ?>
                                        <tr>
                                            <td style="text-align: right;"><strong>Total Bersih</strong></td>
                                            <td style="background-color: green; color: white;">Rp. <?=number_format($total_bersih,0,',','.');?></td>
                                        </tr>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <?php if($header['id_retur']==0){?>
                <hr class="divider">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Matching Uang Masuk</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>No Uang Masuk</th>
                                            <th>Jenis<br>Pembayaran</th>
                                            <th>Bank<br>Pembayaran</th>
                                            <th>Rekening Pembayaran /<br>Nomor Cek</th>
                                            <th>Currency</th>
                                            <th>Nominal</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                            $total_all = 0;
                                            foreach ($matching as $row){
                                                echo '<tr>';
                                                echo '<td style="text-align:center">'.$no.'</td>';
                                                echo '<td>'.$row->no_uang_masuk.'</td>';
                                                echo '<td>'.$row->jenis_pembayaran.'</td>';
                                                echo '<td>'.$row->bank_pembayaran.'</td>';
                                                echo '<td>'.$row->rekening_pembayaran.$row->nomor_cek.'</td>';
                                                echo '<td>'.$row->currency.'</td>';
                                                echo '<td>'.number_format($row->nominal,0,',','.').'</td>';
                                                echo '<td>'.$row->keterangan.'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $total_all += $row->nominal;
                                            }
                                        ?>
                                        <tr>
                                            <td colspan="6" style="text-align: right; font-weight: bold;">Total</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($total_all,0,',','.');?></td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        <a href="<?php echo base_url('index.php/Finance/invoice'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
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
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>