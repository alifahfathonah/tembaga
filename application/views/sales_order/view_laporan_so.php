<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/laporan_list_so'); ?>"> Laporan Sales Order </a> 
        </h5>          
    </div>
</div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                <button class="close" data-close="alert"></button>
                <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
            </div>
        </div>
    </div>
  
   <div class="col-md-12" style="margin-top: 10px;">
        <p>
            <a href="<?= base_url('index.php/SalesOrder/print_laporan_so/'.$this->uri->segment(3)) ?>" target="_blank" class="btn blue-ebonyclay">
                <i class="fa fa-print"></i>
                Print
            </a> 
        </p>
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes"></i> Laporan Penjualan Per <?= date("F Y", strtotime($this->uri->segment(3))) ?>
                </div>                            
            </div> 
           <div class="portlet-body"> 
               <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                   <tr>
                        <th rowspan="2" style="text-align: center;">No</th>
                        <th rowspan="2" style="text-align: center;">Nama Barang</th>
                        <th colspan="3" style="text-align: center;">Penjualan Bruto</th>
                        <th colspan="3" style="text-align: center;">Retur</th>
                        <th colspan="3" style="text-align: center;">Penjualan Netto</th>
                   </tr>
                   <tr>
                       <th style="text-align: center; border-top: 1px solid lightgray;">(KG)</th>
                       <th style="text-align: center; border-top: 1px solid lightgray;">Harga(Rp.)</th>
                       <th style="text-align: center; border-top: 1px solid lightgray;">Value(Rp.)</th>
                       <th style="text-align: center; border-top: 1px solid lightgray;">(KG)</th>
                       <th style="text-align: center; border-top: 1px solid lightgray;">Harga(Rp.)</th>
                       <th style="text-align: center; border-top: 1px solid lightgray;">Value(Rp.)</th>
                       <th style="text-align: center; border-top: 1px solid lightgray;">(KG)</th>
                       <th style="text-align: center; border-top: 1px solid lightgray;">Harga(Rp.)</th>
                       <th style="text-align: center; border-top: 1px solid lightgray; border-right: 1px solid lightgray;">Value(Rp.)</th>
                   </tr>
                 </thead>
                 <tbody>
                <?php 
                $no = 1; 
                $total_amount_b = 0;
                $total_amount_n = 0;
                foreach($detailLaporan as $row){ 
                    $total_amount_b = $row->bruto * $row->amount;
                    $total_amount_n = $row->netto * $row->amount;
                ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td><?= $row->jenis_barang ?></td>
                        <td align="right"><?= number_format($row->bruto,2) ?></td>
                        <td align="right"><?= number_format($row->amount,2) ?></td>
                        <td align="right"><?= number_format($total_amount_b,2) ?></td>
                        <td align="right"></td>
                        <td align="right"></td>
                        <td align="right"></td>
                        <td align="right"><?= number_format($row->netto,2) ?></td>
                        <td align="right"><?= number_format($row->amount,2) ?></td>
                        <td align="right"><?= number_format($total_amount_n,2) ?></td>
                    </tr>
                <?php $no++; } ?>
                </tbody>   
                </table>
            </div>
        </div>
    </div>
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