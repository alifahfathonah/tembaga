<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/pembayaran'); ?>"> Data Pembayaran </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['matching']==1) ){
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
                    <i class="fa fa-file-word-o"></i>Data Matching Invoice Customer
                </div>   
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama Customer</th> 
                    <th>PIC</th> 
                    <th>Alamat</th>
                    <th>Jumlah<br>Sales Order</th>
                    <th>Jumlah<br>Surat Jalan</th>
                    <th>Jumlah<br>Invoice</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($list_data as $data){
                            $no++;
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->pic; ?></td>
                        <td><?php echo $data->alamat; ?></td>
                        <td><?php echo $data->jumlah_so; ?></td>
                        <td><?php echo $data->jumlah_sj; ?></td>
                        <td><?php echo $data->jumlah_invoice; ?></td>
                        <td>
                            <!-- <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Finance/view_matching/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a> -->
                        <?php
                            if( ($group_id==1)||($hak_akses['matching']==1) ){
                        ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/Finance/matching_invoice/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-files-o"></i> Matching &nbsp; </a>
                        <?php } ?>
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

</script>         