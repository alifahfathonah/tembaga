<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangRongsok/laporan_list'); ?>"> Laporan Sales Order </a> 
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
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes"></i> Laporan Penjualan
                </div>                            
            </div> 
           <div class="portlet-body"> 
               <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                   <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Bulan</th>
                        <th style="text-align: center;">Penjualan Bruto (Kg)</th>
                        <th style="text-align: center;">Retur (Kg)</th>
                        <th style="text-align: center;">Penjualan Netto (Kg)</th>
                        <th style="text-align: center;">Action</th>
                   </tr>
                 </thead>
                 <tbody>
                <?php $no = 1; foreach($summary as $row){ ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td><?= date('F Y', strtotime($row->tanggal)) ?></td>
                        <td align="right"><?= number_format($row->jumlah_bruto,2) ?></td>
                        <td></td>
                        <td align="right"><?= number_format($row->jumlah_netto,2) ?></td>
                        <td align="center">
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/SalesOrder/view_laporan_so/<?php echo date('Y-m', strtotime($row->tanggal)); ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                        </td>
                    </tr>
                <?php } ?>
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