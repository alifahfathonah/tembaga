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
            <div class="row">
                <div class="col-md-10">
                    <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('Y-m', strtotime($this->uri->segment(3))); ?>">
                    <a href="javascript:;" onclick="cari()" class="btn yellow-gold">
                        <i class="fa fa-search"></i>
                        Cari
                    </a> 
                </div>
                <div class="col-md-2" align="right">
                    <a href="<?= base_url('index.php/SalesOrder/print_laporan_so_by_sj/'.$this->uri->segment(3)) ?>" target="_blank" class="btn blue-ebonyclay">
                        <i class="fa fa-print"></i>
                        Print
                    </a> 
                </div>
            </div>
            
            
        </p>
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
                        <th>No. Surat Jalan</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th style="text-align: center;">Satuan</th>
                        <th style="text-align: center;">Qty</th>
                        <th style="text-align: center;">Bruto</th>
                        <th style="text-align: center;">Netto</th>
                        <th style="text-align: center;">Sub Total</th>
                   </tr>
                 </thead>
                 <tbody>
                <?php 
                $no = 1; 
                $total_amount = 0;
                foreach($detailLaporan as $row){ 
                    $total_amount = $row->netto * $row->amount;
                ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td><?= $row->no_surat_jalan ?></td>
                        <td><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                        <td><?= $row->jenis_barang ?></td>
                        <td><?= $row->uom ?></td>
                        <td align="right"><?= $row->qty ?></td>
                        <td align="right"><?= number_format($row->bruto,2) ?></td>
                        <td align="right"><?= number_format($row->netto,2) ?></td>
                        <td align="right"><?= number_format($total_amount,2) ?></td>
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
function cari(){
    var tanggal = $("#tanggal").val();
    if (tanggal != "") {
    //     var date    = new Date(tanggal),
    //     yr      = date.getFullYear(),
    //     month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth(),
    //     newDate = yr + '-' + month;
        window.location.href = '<?php echo base_url(); ?>index.php/SalesOrder/view_laporan_so_by_sj/'+tanggal;
    }
}

$(function(){        
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm'
    });       
});
</script>