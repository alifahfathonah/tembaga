<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Invoice Jasa 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==9)||($hak_akses['index']==1) ){
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
                    <i class="fa fa-beer"></i>Invoice Jasa List
                </div>
                <div class="tools">
                <!-- <?php
                    if( ($group_id==9)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/R_InvoiceJasa/add_inv').'"> '
                        .'<i class="fa fa-plus"></i> Input Invoice </a>';
                    }
                ?>     -->                
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th>No. Invoice Jasa</th>
                    <th>Tanggal</th>
                    <th>No. Surat Jalan</th>
                    <th>No. Sales Order<br>No. Purchase Order</th>
                    <th>Customer</th>
                    <th style="text-align: center;">Actions</th>
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
                        <td><?php echo $data->no_invoice_jasa; ?></td>
                        <td><?php echo $data->tanggal; ?></td>
                        <td><?php echo $data->no_sj_resmi; ?></td>
                        <td><?php echo $data->no_so.$data->no_po; ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td style="text-align:center"> 
                            <?php
                                if( ($group_id==9 || $hak_akses['view']==1)){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/R_InvoiceJasa/view_invoice_jasa/<?php echo $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-book"></i> View &nbsp; </a>
                            <?php
                                }if($this->session->userdata('cv_id') != 0){ 
                                    if(($group_id==9)||($hak_akses['edit']==1) && $data->reff_cv != 0){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/R_InvoiceJasa/edit_inv_cust/<?php echo $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php } 
                            }else {
                                    if(($group_id==9)||($hak_akses['edit']==1) && $data->reff_cv == 0){
                                
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/R_InvoiceJasa/edit_inv_jasa/<?php echo $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php
                                } 
                            }if((($group_id==9 || $group_id==14) && $hak_akses['print_po']==1) && $data->jenis_invoice == "INVOICE CV KE CUSTOMER"){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/R_InvoiceJasa/print_invoice/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                            <?php } if((($group_id==9 || $group_id==16) && $hak_akses['print_po']==1) && $data->jenis_invoice == "INVOICE KMP KE CV"){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/R_InvoiceJasa/print_invoice/<?php echo $data->id; ?>" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                        <?php }if((($group_id==9) || ($group_id == 16)) && $data->flag_sjr == 0 ){ ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/R_InvoiceJasa/delete_invoice_jasa/<?php echo $data->id; ?>" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus transaksi ini?');"> &nbsp; <i class="fa fa-trash"></i> Delete &nbsp; </a>
                            <?php
                                }if((($group_id==9) || ($group_id == 14)) && $data->flag_sjr == 0 ){
                            ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/R_SuratJalan/add_surat_jalan/sj_customer/<?php echo $data->sjr_id; ?>" 
                                style="margin-bottom:4px"> &nbsp; <i class="fa fa-truck"></i> Create Surat Jalan CV &nbsp; </a>
                            <?php }?>
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