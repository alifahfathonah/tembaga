<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/'); ?>"> Gudang Rongsok </a> 
        </h5>          
    </div>
</div>

   <div class="row">&nbsp;</div>
  
   <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes"></i> Gudang Rongsok
                </div>                
            </div> 
   <div class="portlet-body"> 
   <table class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>Item Rongsok</th>
            <th>Jumlah Packing</th>
            <th>Stok Bruto</th>
            <th>Stok Netto</th>
            <th>Action</th>
       </tr>
     </thead>
     <tbody>
        <?php $no=1; 
        foreach($list_data as $data) { ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data->kode_rongsok.' | '.$data->nama_item; ?></td>
            <td><?= $data->jumlah_packing ;?></td>
            <td><?= number_format($data->stok_bruto,2,',','.'); ?></td>
            <td style="background-color: green; color: white;"><?= number_format($data->stok_netto,2,',','.'); ?></td>
            <td><a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/GudangRongsok/view_gudang_rongsok/<?php echo $data->rongsok_id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/GudangRongsok/print_gudang_rongsok/<?php echo $data->rongsok_id; ?>" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
            </td>
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