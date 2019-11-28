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
<div class="portlet box yellow-gold">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-beer"></i>Peminjaman BP & Kardus
        </div> 
        <!-- <div class="tools">
        <?php
            if( ($group_id==1)||($hak_akses['add']==1) ){
        ?>
            <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add">
            <i class="fa fa-plus"></i> Buat Surat Peminjaman</a>
        <?php } ?>
        </div>  -->               
    </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th>No</th>
            <th>No. Surat Jalan</th>
            <th>Nama</th>
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
            <td><?php echo $row->no_surat_jalan; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td style="text-align: center"><?php echo $row->jumlah; ?></td>
            <td style="text-align:center">
              <?php
                if($group_id==1 || $hak_akses['print']==1){
                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangBobbin/print_bpk/'.$row->id.'" 
                        style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>';
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

function get_spb(){
    $.ajax({
        url: "<?php echo base_url('index.php/BeliBobbin/get_spb'); ?>",
        type: "POST",
        data: {id: id},
        dataType: "json",
        success: function(result) {
            $('#uom_'+nmr).val(result['uom']);
            $('#wip_id_'+nmr).val(id);
        }
    });
}
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
      