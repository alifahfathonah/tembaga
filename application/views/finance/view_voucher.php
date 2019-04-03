<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance'); ?>"> View Voucher </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['view_vc']==1) ){
        ?>
        
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/Finance/approve_pmb'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Voucher<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pmb" name="no_pmb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_voucher']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control input-small myline" style="margin-bottom:5px; float:left;" value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            PIC
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_penimbang" name="nama_penimbang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['pic']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Supplier
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="nama_supplier" id="nama_supplier" class="form-control myline" style="margin-bottom: 5px;" readonly value="<?php echo $header['nama_supplier']; ?>">
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO
                        </div>
                        <div class="col-md-8">
                            <input class="form-control myline" style="margin-bottom: 5px;" type="text" name="no_po" id="no_po" value="<?php echo $header['no_po'] ?>" readonly>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-4">
                            No. Pembayaran
                        </div>
                        <div class="col-md-8">
                            <input class="form-control myline" style="margin-bottom: 5px;" type="text" name="no_pembayaran" id="no_pembayaran" value="<?php echo $header['no_pembayaran'] ?>" readonly>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()" class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?php echo $header['keterangan'];?></textarea>
                        </div>
                    </div> 
                </div>
                <div class="col-md-2">&nbsp;</div>
            <hr class="divider"/>
    <!-- VOUCHER -->
            <div class="row">
                <div class="col-md-12">
                    <h4 align="center" style="font-weight: bold;">Detail Voucher Pembayaran</h4>
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <th>No</th>
                                <th>Jenis Voucher</th>
                                <th>Jenis Barang</th>
                                <th>Keterangan</th>
                                <th>Amount (Rp)</th>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 0;
                                $total_vc = 0;
                                foreach ($list_data as $data){
                                    $no++;
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no; ?></td>
                                <td><?php echo $data->jenis_voucher; ?></td>
                                <td><?php echo $data->jenis_barang.$data->nm_cost; ?></td>
                                <td><?php echo $data->keterangan; ?></td>
                                <td style="text-align:right"><?php echo number_format($data->amount,0,',','.'); ?></td>
                            </tr>
                            <?php
                                $total_vc += $data->amount;
                                }
                            ?>
                            <tr>
                                <td colspan="4" style="text-align: right; font-weight: bold;"> Total</td>
                                <td style="background-color: green; color: white; text-align: right;"><?php echo number_format($total_vc,0,',','.');?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr class="divider"/>
    
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/Finance/voucher_list'); ?>" class="btn blue-hoki">
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

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>