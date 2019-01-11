<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Gudangbobbinrequest'); ?>">  Gudang Bobbin Request </a> 
        </h5>          
    </div>
</div>
  <div class="col-md-12" style="margin-top: 10px;"> 
    <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>  Bobbin Request
                </div>                
            </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>No. Surat Peminjaman</th>
            <th>No. Surat Jalan</th>
            <th>Nama Customer</th>
            <th>Jumlah Item</th>
            <th>Actions</th>
       </tr>
     </thead>
     <tbody>
        <?php 
          $no = 0;
          foreach ($list_peminjam as $row) {
            $no++;
        ?>
          <tr>
            <td style="text-align:center;"><?php echo $no; ?></td>
            <td><?php echo $row->no_surat_peminjaman; ?></td>
            <td><?php echo $row->no_surat_jalan; ?></td>
            <td><?php echo $row->nama_customer; ?></td>
            <td style="text-align: center"><?php echo $row->jumlah_item; ?></td>
            <td style="text-align:center">
              <?php
                if($group_id==1 || $hak_akses['print_spb']==1){
                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangBobbin/print_bobbin_request/'.$row->id.'" 
                        style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a> ';
                }
              ?>
            </td>
          </tr>
        <?php   

          }
        ?>



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
      