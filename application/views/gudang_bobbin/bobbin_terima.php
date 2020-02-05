<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/gudangbobbin/bobbin_terima'); ?>">  Gudang Bobbin Terima Barang </a> 
        </h5>          
    </div>
</div>
   <div class="row">&nbsp;</div>
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
                    <i class="fa fa-beer"></i> Bobbin Terima Barang 
                </div>
                <div class="tools">
                <?php
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                ?>
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/GudangBobbin/add_penerimaan_bobbin"> <i class="fa fa-plus"></i> Ajukan Terima Bobbin</a>  
                <?php } ?>            
                </div>             
            </div> 
   <div class="portlet-body"> 
   <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
       <tr >
            <th style="text-align: center">No</th>
            <th>Nomor Penerimaan</th>
            <th>Tanggal</th>
            <th>Surat Jalan</th>
            <th>Jumlah Item</th>
            <th>Keterangan</th>
            <th style="text-align: center">Actions</th>
       </tr>
     </thead>
     <tbody>
        <?php
        $no = 0;
        foreach ($list_bobbin as $row) {
        $no++;
        ?>
        <tr>
          <td style="text-align: center"><?php echo $no; ?></td>
          <td><?php echo $row->no_penerimaan ?></td>
          <td><?php echo $row->tanggal ?></td>
          <td><?php echo $row->surat_jalan ?></td>
          <td><?php echo $row->jumlah_item ?></td>
          <td><?php echo $row->remarks ?></td>
          <td style="text-align:center">
            <?php
                                if(($group_id==1 || $hak_akses['view_spb']==1) && $row->jumlah_item > 0){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/GudangBobbin/view_penerimaan_bobbin/<?php echo $row->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                           
                            <?php   
                                }
                                echo '<a class="btn btn-circle btn-xs blue" href="'.base_url().'index.php/GudangBobbin/edit_penerimaan_bobbin/'.$row->id.'" style="margin-bottom:4px"> &nbsp;<i class="fa fa-edit"></i> Edit &nbsp;</a> ';
                                if(($group_id==1 || $hak_akses['print']==1) && $row->jumlah_item > 0){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangBobbin/print_bobbin_terima/'.$row->id.'" 
                                        style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a> ';
                                }
                                if(($group_id==1 || $hak_akses['edit']==1) && $row->jumlah_item == 0){
                                }
                                  echo '<a class="btn btn-circle btn-xs red" href="'.base_url().'index.php/GudangBobbin/delete_penerimaan_bobbin/'.$row->id.'" style="margin-bottom:4px"> &nbsp;<i class="fa fa-trash"></i> Hapus &nbsp;</a> ';
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
      