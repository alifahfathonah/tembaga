<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> BPB 
        </h4>          
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
                    <i class="fa fa-beer"></i>List BPB
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. BPB</th>
                    <th>No. SO / No. PO</th>
                    <th>Tanggal</th>
                    <th>Jenis<br>Barang</th>                     
                    <th>Customer</th>
                    <th>Jumlah<br>Item</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($list_bpb as $row) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no; ?></td>
                        <td><?php echo $row->no_bpb; ?></td>
                        <td><?php echo $row->no_reff; ?></td>
                        <td><?php echo $row->tanggal; ?></td>
                        <td><?php echo $row->jenis_barang; ?></td>
                        <td><?php echo $row->nama_customer; ?></td>
                        <td><?php echo $row->jumlah_item; ?></td>
                        <td><?php echo $row->remarks; ?></td>
                        <td style="text-align: center;">
                            
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/R_BPB/edit_bpb/<?php echo $row->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>

                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/R_BPB/view_bpb/<?php echo $row->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa fa-file-text-o"></i> View &nbsp; </a>
                            <br>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/R_BPB/print_bpb/<?php echo $row->id; ?>" 
                                style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                            
                            <?php if( ($row->flag_tolling==0 && ($row->r_so_id == 0 || $row->r_po_id == 0) && $row->r_inv_jasa_id == 0) && $row->jenis_barang == 'FG' && $row->r_sj_id == 0){ ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/R_InvoiceJasa/add/<?php echo $row->id; ?>" 
                                style="margin-bottom:4px"> &nbsp; <i class="fa fa-truck"></i> Create Invoice Jasa &nbsp; </a>
                            
                            <?php }if(($row->flag_tolling==0 && ($row->r_so_id == 0 || $row->r_po_id == 0) && $row->r_inv_jasa_id == 0) && $row->jenis_barang == 'FG' && $row->r_sj_id != 0 && $row->jenis_bpb != 'BPB FG'){ ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/R_InvoiceJasa/add_inv_cust/<?php echo $row->id; ?>" 
                                style="margin-bottom:4px"> &nbsp; <i class="fa fa-truck"></i> Create Invoice Jasa&nbsp; </a>
                            
                            <?php }if(($row->jenis_bpb == 'BPB RONGSOK' && $row->r_sj_id == 0 && $row->flag_sj_cv == 0)){
                            ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/R_SuratJalan/add_surat_jalan/sj_cv/<?php echo $row->id; ?>" 
                                style="margin-bottom:4px"> &nbsp; <i class="fa fa-truck"></i> Create Surat Jalan CV &nbsp; </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                            $no++;
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