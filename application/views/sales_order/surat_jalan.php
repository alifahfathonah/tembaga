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
                <table class="table table-striped table-bordered table-hover" id="sample_6">
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
                    <?php 
                        $no = 0;
                        foreach ($list_data as $data){
                            $no++;
                    ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td><?php echo $data->no_surat_jalan; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->jenis_barang; ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->alamat; ?></td>  
                        <td><?php echo $data->no_sales_order; ?></td>  
                        <td><?php echo $data->jumlah_item; ?></td>
                        <td><?php if($data->inv != NULL){
                                echo '<div style="background-color:green; padding:3px; color:white">Sudah ada Invoice</div>';
                                }else{
                                echo '<div style="background-color:darkkhaki; padding:3px; color:white">Belum ada Invoice</div>';
                                }
                                ?></td>
                        <td style="text-align:center">
                            <?php
                                if($data->status==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($data->status==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($data->status==2){
                                    echo '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                                }else if($data->status==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                        </td>  
                        <td style="text-align:center"> 
                            <?php
                                if($group_id==1 || $hak_akses['view_surat_jalan']==1){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/SalesOrder/view_surat_jalan/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa fa-file-text-o"></i> View &nbsp; </a>
                            <?php
                                }
                                if(($group_id==1 || $hak_akses['edit_surat_jalan']==1) && $data->status==9){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/SalesOrder/edit_surat_jalan/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-pencil"></i> Edit &nbsp;</a>
                            <a href="<?php echo base_url(); ?>index.php/SalesOrder/delete_surat_jalan/<?php echo $data->id; ?>" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus surat jalan ini?');"><i class="fa fa-trash-o"></i> Delete</a>
                            <?php
                                }
                                if(($group_id==1 || $hak_akses['revisi_surat_jalan']==1) && $data->status==1 && $data->inv==NULL){
                            ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/SalesOrder/revisi_surat_jalan/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil"></i> Revisi &nbsp; </a>
                            <?php
                            } 
                            if($group_id==1 || $hak_akses['print_surat_jalan']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/SalesOrder/print_surat_jalan/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                            <?php
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
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         