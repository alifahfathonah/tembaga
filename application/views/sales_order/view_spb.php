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
        <h3 align="center"><b> Konfirmasi Permintaan SPB</b></h3>
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
                                value="<?php echo $myData['no_sales_order']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $myData['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $myData['no_spb_detail']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($myData['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['nama_customer']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Contact Person
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="cp_customer" name="cp_customer" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $myData['jenis_barang']; ?>">
                        </div>
                    </div>
                    <?php
                        if($myData['status']=="9"){
                    ?>
                    <div class="row">
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
                    </div>
                    <?php
                        }else if($myData['status']=="1"){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            Status
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px; background-color: green; color: white;" readonly="readonly" 
                                value="Approved">
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>              
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php if ($myData['status']==0) { 

                        if($myData['jenis_barang']=='FG'){
                    ?> 
                        <a href="<?php echo base_url();?>index.php/GudangFG/view_spb/<?php echo $myData['no_spb']; ?>" class="btn blue-hoki"> 
                        Menuju Pemenuhan SPB FG <i class="fa fa-angle-left"></i></a>
                    <?php
                        }else if($myData['jenis_barang']=='WIP'){
                    ?>
                        <a href="<?php echo base_url();?>index.php/GudangWIP/view_spb/<?php echo $myData['no_spb']; ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Menuju Pemenuhan SPB WIP</a>
                    <?php
                        }else if($myData['jenis_barang']=='RONGSOK'){
                    ?>
                        <a href="<?php echo base_url();?>index.php/Ingot/view_spb/<?php echo $myData['no_spb']; ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Menuju Pemenuhan SPB Rongsok</a>
                    <?php                        
                        }else if($myData['jenis_barang']=='AMPAS'){?>
                        <a href="<?php echo base_url();?>index.php/PengirimanAmpas/view_spb/<?php echo $myData['no_spb']; ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Menuju Pemenuhan SPB Ampas</a>
                    <?php
                        }
                     } else { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Permintaan SPB FG</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>UOM</th>
                                            <th>Jumlah</th>
                                            <th>Bruto</th>
                                            <th>Netto (UOM)</th>
                                            <th>Amount</th>
                                            <th>Total Amount</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no=1; foreach ($myDetail as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $row->nama_barang;?></td>
                                            <td><?php echo $row->uom;?></td>
                                            <td><?php echo $row->qty;?></td>
                                            <td><?php echo $row->bruto;?></td>
                                            <td><?php echo $row->netto;?></td>
                                            <td><?php echo 'Rp '.number_format($row->amount,0,',','.');?></td>
                                            <td><?php echo 'Rp '.number_format($row->total_amount,0,',','.');?></td>
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

                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center">Pemenuhan SPB FG</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Barang</th>      
                                        <?php if($myData['jenis_barang']=='FG'){ ?>
                                            <td>No Packing</td>
                                            <td>Bruto</td>
                                        <?php } else if($myData['jenis_barang']=='WIP') {?>
                                            <th>UOM</th>
                                            <th>Jumlah</th>
                                        <?php } else {?>
                                            <th>UOM</th>
                                        <?php }?>
                                            <th>Netto (KG)</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; $total_netto=0; foreach($detailSPB as $v) { 
                                                if(isset($v->berat)){
                                            ?>
                                            <tr>
                                                <td><?=$no;?></div></td>
                                                <td><?=$v->nama_barang;?></td>
                                            <?php if($myData['jenis_barang']=='FG'){ ?>
                                                <td><?=$v->no_packing;?></td>
                                                <td><?=$v->bruto;?></td>
                                            <?php } else if($myData['jenis_barang']=='WIP'){?>
                                                <td><?=$v->uom;?></td>
                                                <td><?=$v->qty;?></td>
                                            <?php } else {?>
                                                <td><?=$v->uom;?></td>
                                            <?php } ?>
                                                <td><?=$v->berat;?></td>
                                                <td><?=$v->keterangan;?></td>
                                            </tr>
                                            <?php 
                                            $no++; 
                                            $total_netto += $v->berat; 
                                            }//if dalam nested
                                        } ?>
                                        </tbody>
                                        <tbody>
                                        <?php if($myData['jenis_barang']!='RONGSOK'){ ?>   
                                            <td colspan="4">
                                                Total
                                            </td>
                                        <?php } else {?>
                                            <td colspan="3">
                                                Total
                                            </td>
                                        <?php } ?>
                                            <td style="text-align:right; background-color:green; color:white"><strong><?php echo $total_netto;?></strong></td>
                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        <a href="<?php echo base_url('index.php/SalesOrder/spb_list'); ?>" class="btn blue-hoki"> 
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
      