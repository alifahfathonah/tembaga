<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangWIP/hasil_produksi'); ?>"> Hasil Produksi WIP </a> 
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
                    <i class="fa fa-hourglass"></i> Hasil Produksi WIP 
                </div>
                <div class="tools">    
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url('index.php/GudangWIP/proses_wip');?>"> <i class="fa fa-plus"></i> Proses Barang WIP </a>                    
                </div>                
            </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>No. Produksi</th>
            <th>Tanggal</th>
            <th>Jenis Barang WIP</th>
            <th>Jenis Proses</th>
            <th>Quantity</th>
            <th>Berat</th>
            <th>PIC</th>
       </tr>
     </thead>
     <tbody>
        <?php 
            $no = 1;
            foreach($gudang_wip as $data) { ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $data->no_produksi_wip;?></td>
            <td><?= $data->tanggal;?></td>
            <td><?= $data->jenis_barang;?></td>
            <td><?= $data->jenis_masak;?></td>
            <td><?= $data->qty.' '.$data->uom; ?></td>
            <td><?= $data->berat; ?></td>
            <td><?= $data->pembuat;?></td>
            
        </tr>    

    <?php } ?>
    
     </tbody>   
   </table>
</div>
</div>
</div>




<script>
function simpanData(){
  
        $('#formku').submit(); 

};
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
});
</script>
      