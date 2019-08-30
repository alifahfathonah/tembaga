<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliWIP'); ?>"> Pembelian WIP </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliWIP/dtwip_list'); ?>"> DTWIP List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['dtwip_list']==1) ){
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
                    <i class="fa fa-beer"></i>Data Timbang WIP (DTWIP) List
                </div>
                <div class="tools">    
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/BeliWIP/create_dtwip"> <i class="fa fa-plus"></i> Create DTWIP</a>
                </div>           
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. DTWIP</th>
                    <th>Tanggal</th>
                    <th>No. PO</th>
                    <th>Supplier</th>
                    <th>Penimbang</th>
                    <th>Jumlah <br>Items</th>
                    <th>Remarks</th>
                    <th>Status</th>
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
                        <td style="background-color: "><?php echo $data->no_dtwip; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->no_po; ?></td>
                        <td><?php echo $data->nama_supplier; ?></td>
                        <td><?php echo $data->penimbang; ?></td>                        
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td><?php echo $data->remarks; ?></td>
                        <td style="text-align:center">
                            <?php 
                                if($data->status==0){ 
                                    echo '<div style="background-color:bisque; padding:4px">Waiting review</div>';
                                }else if($data->status==1){ 
                                    echo '<div style="background-color:green; color:white; padding:4px">Approved</div>';
                                }else if($data->status==9){ 
                                    echo '<div style="background-color:red; padding:4px; color:white">Rejected</div>';
                                }
                            ?>
                        </td>                        
                        <td style="text-align:center"> 
                            <?php
                                // if(($group_id==1 || $hak_akses['edit_dtwip']==1) && $data->status==9){
                                //     echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliWIP/edit_dtwip/'.$data->id.'" 
                                //         style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil"></i> Edit &nbsp; </a> ';
                                // }//else if ($data->status==0 && (strpos($data->remarks, 'SISA PRODUKSI') || strpos($data->remarks, 'TRANSFER KE RONGSOK')) !== false){
                                //     echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliWIP/proses_dtwip/'.$data->id.'" 
                                //         style="margin-bottom:4px"> &nbsp; <i class="fa fa-refresh"></i> Proses &nbsp; </a> ';
                                // }
                                if(($group_id==1 || $hak_akses['edit']==1)){
                                echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliWIP/edit_dtwip/'.$data->id.'" style="margin-bottom:4px">&nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>';
                                }
                                if($group_id==1 || $hak_akses['print_dtwip']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/BeliWIP/print_dtwip/'.$data->id.'" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a> ';
                                    if($data->po_id>0){
                                        echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/BeliWIP/print_dtwip_harga/'.$data->id.'" style="margin-bottom:4px" target="_blank">&nbsp;<i class="fa fa-print"></i> Print (Harga)</a> ';
                                    }
                                }
                                if(($group_id==1 || $hak_akses['proses_dtwip']==1) && $data->supplier_id == 0 & $data->status == 0){
                                    echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliWIP/proses_dtwip/'.$data->id.'" style="margin-bottom:4px"> &nbsp; <i class="fa fa-refresh"></i> Proses &nbsp; </a> ';
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