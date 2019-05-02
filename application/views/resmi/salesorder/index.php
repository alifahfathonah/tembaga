<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order 
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
                    <i class="fa fa-beer"></i>Sales Order List
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="text-align: center">No</th>
                    <th>No. SO</th>
                    <th>Tanggal</th>
                    <th>Customer</th> 
                    <th>Attention To</th>
                    <th>Jumlah <br>Items</th>
                    <th>Keterangan</th>
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
                        <td><?php echo $data->no_so; ?></td>
                        <?php
                        if(strtotime($data->tanggal) < strtotime('-2 MONTH')) {
                        ?>
                        <td style="background-color: red;"><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <?php
                        } else {
                        ?>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <?php
                        }
                        ?>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->pic; ?></td>
                        </td>
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td><?php echo $data->remarks; ?></td>
                        <td style="text-align:center"> 
                            <?php
                                if( ($group_id==9 || $hak_akses['create_sj_so']==1) && $data->sjr_id == 0 && $data->jenis_so != 'SO CV'){
                            ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/R_SuratJalan/add_surat_jalan/so/<?php echo $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-truck"></i> Create SJ &nbsp; </a>
                            <?php }if( ($group_id==9)||($hak_akses['view']==1)){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/R_SO/view_so/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa fa-file-text-o"></i> View &nbsp; </a>
                            <?php
                                }
                                if( ($group_id==9 || $hak_akses['edit']==1)){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/R_SO/edit_so/<?php echo $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php
                                }
                                if($group_id==9 || $hak_akses['print']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/R_SO/print_so/<?php echo $data->id; ?>" 
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