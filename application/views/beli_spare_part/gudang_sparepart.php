<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/'); ?>"> Gudang  Sparepart </a> 
        </h5>          
    </div>
</div>

   <div class="row">&nbsp;</div>
  
   <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes"></i> Gudang Sparepart
                </div>                
            </div> 
   <div class="portlet-body"> 
   <table class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>Item Sparepart</th>
            <th>Qty Masuk</th>
            <th>Qty Keluar</th>
            <th>Qty Stok</th>
       </tr>
     </thead>
     <tbody>
        <?php $no=1; 
        foreach($list_data as $data) { ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data->nama_item; ?></td>
            <td><?= $data->total_qty_in; ?></td>
            <td><?= $data->total_qty_out; ?></td>
            <td><?= $data->total_qty_in - $data->total_qty_out;?></td>
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
      