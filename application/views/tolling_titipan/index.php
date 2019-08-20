<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling'); ?>"> Sales Order </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['index']==1) ){
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
                    <i class="fa fa-truck"></i>Sales Order Tolling List
                </div>  
                <div class="tools">    
                <?php
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/Tolling/add').'"> '
                        .'<i class="fa fa-plus"></i> Input Sales Order </a>';
                    }
                ?>                    
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. SO</th>
                    <th>Tanggal</th>
                    <th>Customer</th> 
                    <th>PIC</th>
                    <?php if($this->session->userdata('user_ppn') == 0){ echo '<th>PPN</th>'; }?> 
                    <th>Marketing</th>
                    <th>Jumlah <br>Items</th>
                    <th>DTR</th>
                    <th>Status<br>Invoice</th>
                    <th>Status<br>Surat Jalan</th>
                    <th>Status<br>SPB</th>
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
                        <td><?php echo $data->no_sales_order; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->pic; ?></td>
                        <?php if($this->session->userdata('user_ppn') == 0){ 
                           echo (($data->flag_ppn==1)? '<td><i class="fa fa-check"></i> Yes</td>': '<td><i class="fa fa-times"></i> No</td>');
                        }
                        ?>
                        <td><?php echo $data->nama_marketing; ?></td>
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:center">
                            <?php
                                if( ($group_id==1 || $hak_akses['matching']==1) && $data->flag_tolling==1){
                                    echo '<a class="btn btn-circle btn-xs green-seagreen" href="'.base_url().'index.php/Tolling/matching_so/'.$data->id.'" 
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil-square-o"></i> Matching &nbsp; </a>';
                                }else{
                                    echo '<div class="bg-green">Received</div>';
                                }
                            ?>
                        </td>
                        <td>
                        <?php 
                           if($data->flag_invoice==1){ echo '<div style="background-color:green; padding:3px; color:white; text-align: center;">Invoice Lengkap</div>';
                            }else if($data->flag_invoice==2){
                                echo '<div style="background-color:orange; padding:3px; color:white; text-align: center;">Invoice Sudah Ada</div>';
                            }else{
                                echo '<div style="background-color:darkkhaki; padding:3px; text-align: center;">Invoice Belum Semua</div>';
                            }
                        ?>
                        </td>
                        <td>
                        <?php 
                           echo (($data->flag_sj==1)? '<div style="background-color:green; padding:3px; color:white; text-align: center;">Sudah Dikirim Semua</div>':'<div style="background-color:darkkhaki; padding:3px; text-align: center;">Belum Dikirim Semua</div>');
                        ?>
                        </td>
                        <td style="text-align:center">
                            <?php
                                if($data->status_spb==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($data->status_spb==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($data->status_spb==2 || $data->status_spb ==4){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Belum Dipenuhi Semua</div>';
                                }else if($data->status_spb==3){
                                    echo '<div style="background-color:blue; color:#fff; padding:3px">Waiting Approval</div>';
                                }else if($data->status_spb==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                        </td>  
                        <td style="text-align:center">
                            <?php
                            if(($group_id==1 || $hak_akses['view']==1)){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/Tolling/view/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-book"></i> View &nbsp; </a>
                            <?php } if($group_id==1 || $hak_akses['print_so']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/Tolling/print_so/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                            <?php
                                }if(($group_id==1 || $hak_akses['edit']==1) && $data->flag_tolling != 2 ){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Tolling/edit/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-pencil"></i> Edit &nbsp; </a>
                            <?php
                                }if(($group_id==1 || $hak_akses['delete_so']==1) && $data->jumlah_item == 0){?>
                            <a href="<?php echo base_url(); ?>index.php/Tolling/delete/<?php echo $data->id; ?>" 
                               class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus </a>
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