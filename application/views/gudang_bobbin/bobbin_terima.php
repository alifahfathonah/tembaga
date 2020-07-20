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
    <div class="collapse well" id="form_filter" >
        <form class="eventInsForm" method="post" target="_self" name="formku" 
        id="formku">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <input type="text" id="tgl_start" name="tgl_start" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col-md-1">
                                S/D
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="tgl_end" name="tgl_end" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-2">
                                &nbsp; &nbsp; <a href="javascript:;" onclick="filterData()" class="btn green"><i class="fa fa-search-plus"></i> Filter</a>        
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </form>
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
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Tanggal</a>    
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
            <th>Nama</th>
            <th>Status</th>
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
          <td><?php echo $row->nama ?></td>
          <td><?php
              if($row->status==0){
                  echo '<div style="background-color:green; color:white; padding:4px">Ready</div>';
              }else if($row->status==1){
                  echo '<div style="background-color:blue; color:white; padding:4px">Used</div>';
              }else if($row->status==2){
                  echo '<div style="background-color:yellow; color:black; padding:4px">Delivered</div>';
              }else if($row->status==3){
                  echo '<div style="background-color:orange; color:white; padding:4px">Booked</div>';
              }  ?>
          </td>
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
    $("#tgl_start").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });        
    $("#tgl_end").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });    
  window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
function filterData(){
    var s=$('#tgl_start').val();
    var e=$('#tgl_end').val();
    window.location = '<?=base_url();?>index.php/GudangBobbin/bobbin_terima/'+s+'/'+e;
}
function simpanData(){
  $('#formku').submit();  
};
</script>