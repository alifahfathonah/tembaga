<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Retur/fulfilment_list'); ?>"> Fulfilment List </a> 
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
                    <i class="fa fa-beer"></i>Retur Fulfilment List
                </div>  
                <div class="tools">    
                <?php
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/Retur/fulfilment').'"> '
                        .'<i class="fa fa-plus"></i> Input Fulfilment </a>';
                    }
                ?>                    
                </div>
            </div>
            
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. Retur</th>
                    <th>Tanggal</th>
                    <th>No. SPB</th>
                    <th>Customer</th>
                    <th>Jumlah <br>Items</th>
                    <th style="text-align:center">Status <br>Surat Jalan</th>
                    <th style="text-align:center">Status <br>SPB</th>
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
                        <td style="background-color: "><?php echo $data->no_retur; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->created_at)); ?></td>
                        <td><?php echo $data->no_spb ?></td>
                        <td><?php echo $data->nama_customer; ?></td>                       
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:center">
                            <?php 
                               echo (($data->flag_taken==1)? '<div style="background-color:green; padding:3px; color:white; text-align: center;">Sudah Dikirim Semua</div>':'<div style="background-color:darkkhaki; padding:3px; text-align: center;">Belum Dikirim Semua</div>');
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?php
                                if($data->status_spb==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($data->status_spb==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($data->status_spb==2){
                                    echo '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                                }else if($data->status_spb==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?php
                                if( ($group_id==1 || $hak_akses['view_retur']==1)/* && $data->ready_to_ttr>0*/){
                                    echo '<a class="btn btn-circle btn-xs green-seagreen" href="'.base_url().'index.php/Retur/view/'.$data->id.'" 
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil-square-o"></i> View &nbsp; </a>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php                                                                
                                if($group_id==1 || $hak_akses['print_retur']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/Retur/print/'.$data->id.'" 
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