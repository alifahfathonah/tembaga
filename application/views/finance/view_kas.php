<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/list_kas'); ?>"> View Kas</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <?php if($header['jenis_trx']){
           $jenis_trx='Uang Keluar'; 
        }else{
           $jenis_trx='Uang Masuk';
        }?>
        <h3 align="center"><b> Detail Kas <?= $jenis_trx;?></b></h3>
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
            if( ($group_id==1)||($hak_akses['view_kas']==1) ){
        ?>
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Transaksi
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $jenis_trx; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('Y-m-d', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <?php if($header['id_um']==0 && $header['id_slip_setoran'] == 0){?>
                    <div class="row">
                        <div class="col-md-4">
                            Giro / Cek
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_rek" name="no_rek" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_giro']; ?>">
                        </div>
                    </div>
                    <?php
                    }else if($header['id_slip_setoran']!=0){
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Pembayaran
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_pembayaran" name="no_pembayaran" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_pembayaran']; ?>">
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            Nominal
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['currency'].' '.number_format($header['nominal'],0,',','.');?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Catatan
                        </div>
                        <div class="col-md-8">
                            <textarea readonly="readonly" id="remarks" name="remarks" rows="2" onkeyup="this.value = this.value.toUpperCase()"
                                class="form-control myline" style="margin-bottom:5px"><?php echo $header['keterangan']; ?></textarea>                           
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Kode Bank
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['kode_bank']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nama Bank
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nama_bank']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Rekening
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['nomor_rekening']; ?>">
                        </div>
                    </div>
                    <?php if($header['id_matching']>0){?>
                    <div class="row">
                        <div class="col-md-4">
                            No. Matching Pembayaran
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_po" name="no_po" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_pembayaran']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                </div>              
            </div>
        <?php if($header['id_um']!=0){?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Uang Masuk</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No Uang Masuk</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Bank Pembayaran</th>
                                            <th>Rekening/Nomor Cek</th>
                                            <th>Nama Customer</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            echo '<tr>';
                                            echo '<td style="text-align:center">'.$header['no_uang_masuk'].'</td>';
                                            echo '<td>'.$header['jenis_pembayaran'].'</td>';
                                            echo '<td>'.$header['bank_pembayaran'].'</td>';
                                            echo '<td>'.$header['nomor'].'</td>';
                                            echo '<td>'.$header['nama_customer'].'</td>';
                                            echo '<td>'.$header['ket_v'].'</td>';
                                            echo '</tr>';
                                        ?>
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
                    <a href="<?php echo base_url('index.php/Finance/list_kas'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                </div>    
            </div>
        </form>
        <?php }else if($header['id_vc']!=0){ ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                                <h4 align="center" style="font-weight: bold;">Detail Voucher</h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th style="width:40px">No Voucher</th>
                                            <th>Jenis Voucher</th>
                                            <th>No PO</th>
                                        <?php if(!empty($header['nama_customer'])){
                                            echo '<th>Nama Customer</th>';
                                        }else if(!empty($header['nama_supplier'])){
                                            echo '<th>Nama Supplier</th>';
                                        }else{
                                            echo '<th>Nama Cost</th>';
                                        }?>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                            echo '<tr>';
                                            echo '<td style="text-align:center">'.$header['no_voucher'].'</td>';
                                            echo '<td>'.$header['jenis_voucher'].'</td>';
                                            echo '<td>'.$header['no_po'].'</td>';
                                            echo '<td>'.$header['nama_customer'].$header['nama_supplier'].$header['nm_cost'].'</td>';
                                            echo '<td>'.$header['ket_v'].'</td>';
                                            echo '</tr>';
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <a href="<?php echo base_url('index.php/Finance/list_kas'); ?>" class="btn blue-hoki"> 
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
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
      