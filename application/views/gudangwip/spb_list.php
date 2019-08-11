<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang WIP 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GUdangWIP/spb_list'); ?>"> SPB WIP List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1 || $group_id==21)||($hak_akses['spb_list']==1) ){
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
                    <i class="fa fa-file-word-o"></i>SPB WIP List
                </div> 
                <div class="tools"> 
                <?php if( ($group_id==1 || $group_id==21)||($hak_akses['add_spb']==1) ){
                    if($this->uri->segment(3) == "CUCI"){
                ?>
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/GudangWIP/add_spb/CUCI"> <i class="fa fa-plus"></i> Ajukan SPB WIP</a>  
                <?php }  else { ?>
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/GudangWIP/add_spb"> <i class="fa fa-plus"></i> Ajukan SPB WIP</a> 
                <?php    }
                }
                ?>            
                </div>               
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. SPB WIP</th>
                    <th>Tanggal</th>
                    <th>Pemohon</th>
                    <th>Keperluan</th>
                    <th>Jumlah <br>Items</th>
                    <th>Remarks</th>
                    <th>Status</th>
                    <th>Approve/<br>Reject Oleh</th> 
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
                        <td style="background-color: "><?php echo $data->no_spb_wip; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->pic; ?></td>
                        <?php 
                            if($data->flag_produksi==0){
                                $flag_produksi = 'SDM';
                            }else if($data->flag_produksi==2){
                                $flag_produksi = 'ROLLING';
                            }else if($data->flag_produksi==3){
                                $flag_produksi = 'CUCI';
                            }else if($data->flag_produksi==5){
                                $flag_produksi = 'KIRIM KE RONGSOK';
                            }else if($data->flag_produksi==6){
                                $flag_produksi = 'SO';
                            }else if($data->flag_produksi==7){
                                $flag_produksi = 'Retur';
                            }else if($data->flag_produksi==8){
                                $flag_produksi = 'Repacking';
                            } ?>
                        <td><?=$flag_produksi;?></td>
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td><?php echo $data->keterangan; ?></td>
                        <td style="text-align:center">
                            <?php
                                if($data->status==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Review</div>';
                                }else if($data->status==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($data->status==2){
                                    echo '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                                }else if($data->status==3){
                                    echo '<div style="background-color:blue; color:#fff; padding:3px">Waiting Approval</div>';
                                }else if($data->status==4){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Belum Dipenuhi Semua</div>';
                                }else if($data->status==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?php 
                                if($data->status==1){
                                    echo $data->approved_name; 
                                }else if($data->status==9){
                                    echo $data->rejected_name;
                                }
                            ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php
                                if($group_id==1 || $group_id==21 || $hak_akses['view_spb']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/GudangWIP/view_spb/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                               
                            <?php
                                }
                                if(($group_id==1 || $group_id==21 || $hak_akses['edit_spb']==1) && $data->jumlah_fulfilment==0 && $data->flag_produksi!=5){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/GudangWIP/edit_spb/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-pencil"></i> Edit &nbsp; </a>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/GudangWIP/delete_spb/<?php echo $data->id; ?>/<?= $data->flag_produksi ?>" onclick="return confirm('Anda yakin menghapus transaksi ini?');" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-trash"></i> Hapus &nbsp; </a>
                            <?php   
                                }
                                if($group_id==1 || $group_id==21 || $hak_akses['print_spb']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangWIP/print_spb/'.$data->id.'" 
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