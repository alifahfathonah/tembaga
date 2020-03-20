<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/surat_jalan'); ?>"> Surat Jalan </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['surat_jalan']==1) ){
        ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-truck"></i>List Surat Jalan
                </div>  
                <div class="tools"> 
                <?php
                    if( ($group_id==1)||($hak_akses['add_surat_jalan']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/SalesOrder/add_surat_jalan').'"> '
                        .'<i class="fa fa-plus"></i> Input Surat Jalan </a>';
                    }
                ?>                    
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. Surat Jalan</th>
                    <th>Tanggal</th>
                    <th>Jenis<br>Barang</th>                     
                    <th>Customer</th> 
                    <th>Alamat</th> 
                    <th>No. Sales Order</th>
                    <th>Jumlah<br>Item</th>
                    <th>Status<br>Invoice</th>
                    <th>Status<br>Surat Jalan</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                </table>
            </div>
        </div>
        <?php
            }else{
        ?>
        <div class="alert alert-danger">
            <button class="close" data-close="alert"></button>
            <span id="message">Anda tidak memiliki hak akses ke halaman ini!</span>
        </div>
        <?php
            }
        ?>
    </div>
</div> 

<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){
    var base_url = "<?php echo base_url();?>index.php/"; // You can use full url here but I prefer like this
    $('#datatable').DataTable({
     "pageLength" : 10,
     "serverSide": true,
     "order": [[0, "asc" ]],
     "ajax":{
              url :  base_url+'SalesOrder/showEmployees',
              type : 'POST'
            },
    }); // End of DataTable
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         