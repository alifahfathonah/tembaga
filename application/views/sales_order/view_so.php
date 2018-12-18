<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang FG
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/spb_list'); ?>"> View Surat Permintaan Barang (SPB)</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> View Sales Order</b></h3>
        <hr class="divider" />
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
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">

                            <input type="hidden" id="no_spb" name="no_spb" value="<?php echo $header['no_spb']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb_barang']; ?>">

                            <input type="hidden" id="id_spb" name="id_spb" value="<?php echo $header['no_spb']; ?>">
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
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['nama_customer']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Contact Person
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="cp_customer" name="cp_customer" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div>
                </div>              
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center"><strong>Detail Sales Order</strong></h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>UOM</th>
                                            <th>Jumlah</th>
                                            <th>Amount</th>
                                            <th>Total Amount</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total = 0;
                                        $jumlah = 0;
                                        $no=1; foreach ($details as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->jenis_barang;?></td>
                                            <td><?php echo $row->uom;?></td>
                                            <td><?php echo $row->netto;?></td>
                                            <td><?php echo 'Rp '.number_format($row->amount,0,',','.');?></td>
                                            <td><?php echo 'Rp '.number_format($row->total_amount,0,',','.');?></td>
                                        </tr>
                                        <?php
                                        $no++;
                                        $jumlah += $row->netto;
                                        $total += $row->total_amount;
                                        }
                                        ?>
                                        </tbody>
                                        <tr>
                                            <td colspan="3" style="text-align: right; font-weight: bold;">Total Jumlah</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($jumlah,0,',','.');?></td>
                                            <td style="text-align: right; font-weight: bold;">Total Harga</td>
                                            <td style="background-color: green; color: white;"><?php echo 'Rp '.number_format($total,0,',','.');?></td>
                                        </tr>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center"><strong>Detail SPB Fullfilment</strong></h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Jenis Barang</th>
                                            <th>No Packing</th>
                                            <th>Bruto</th>
                                            <th>Berat</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no=1; foreach ($detailSPB as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama_barang;?></td>
                                            <td><?php 
                                            if($row->no_packing == 0){
                                            echo 'WIP tidak ada No Packing';
                                            }else{
                                            echo $row->no_packing;
                                            }
                                            ?>
                                            </td>
                                            <td><?php 
                                            if($row->bruto == 0){
                                            echo 'WIP tidak ada Bruto';
                                            }else{
                                            echo $row->bruto;
                                            }
                                            ?>
                                            </td>
                                            <td><?php echo $row->berat;?></td>
                                            <td><?php echo $row->qty;?></td>
                                            <?php
                                            if($row->berat == 0){
                                                echo '<td style="background-color: red; color: white;">SPB Belum Dipenuhi</td>';
                                            }else{
                                                echo '<td>'.$row->keterangan.'</td>';
                                            }
                                            ?>
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
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center"><strong>Detail Surat Jalan</strong></h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Jenis Barang</th>
                                            <th>UOM</th>
                                            <th>No Packing</th>
                                            <th>Bruto</th>
                                            <th>Netto</th>
                                            <th>Jumlah</th>
                                            <th>Nomor Bobbin</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no=1; foreach ($detailSJ as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->jenis_barang;?></td>
                                            <td><?php echo $row->uom;?></td>
                                            <td><?php 
                                            if($row->no_packing == 0){
                                            echo 'WIP tidak ada No Packing';
                                            }else{
                                            echo $row->no_packing;
                                            }
                                            ?>
                                            </td>
                                            <td><?php 
                                            if($row->bruto == 0){
                                            echo 'WIP tidak ada Bruto';
                                            }else{
                                            echo $row->bruto;
                                            }
                                            ?>
                                            </td>
                                            <td><?php echo $row->netto;?></td>
                                            <td><?php echo $row->qty;?></td>
                                            <td><?php 
                                            if($row->nomor_bobbin == 0){
                                            echo 'WIP tidak ada Nomor Bobbin';
                                            }else{
                                            echo $row->bruto;
                                            }
                                            ?>
                                            </td>
                                            <td><?php echo $row->line_remarks;?></td>
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
                </div>
            </div>
        <a href="<?php echo base_url('index.php/SalesOrder'); ?>" class="btn blue-hoki"> 
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
      