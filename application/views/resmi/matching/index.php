<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Matching Invoice
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
                    <i class="fa fa-beer"></i>List Invoice
                </div>
                <div class="tools">    
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?php echo base_url(); ?>index.php/Matching/add">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px; text-align: center;">No</th>
                    <th>No. Invoice</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>                     
                    <th>Keterangan</th> 
                    <th style="text-align: center;">Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach ($list_data as $row) {
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no; ?></td>
                        <td><?php echo $row->no_invoice_resmi; ?></td>
                        <td><?php echo $row->tanggal; ?></td>
                        <td><?php echo $row->jumlah_item; ?></td>
                        <td><?php echo $row->remarks; ?></td>
                        <td style="text-align: center;">
                             <?php
                                if( ($group_id==9 || $hak_akses['view']==1)){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Matching/view_invoice/<?php echo $row->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-book"></i> View &nbsp; </a>
                            <?php
                                } if( ($group_id==9)||($hak_akses['edit']==1)){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/Matching/matching_invoice/<?php echo $row->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php 
                                }if($group_id==9 || $hak_akses['print']==1){
                            ?><br>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/Matching/print_invoice/<?php echo $row->id; ?>" 
                                style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                            <?php
                                }
                            ?>
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