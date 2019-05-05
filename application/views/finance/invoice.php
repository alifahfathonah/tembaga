<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/invoice'); ?>"> Data Invoice </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['add_invoice']==1) ){
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
                    <i class="fa fa-file-word-o"></i>Data Invoice
                </div> 
                <div class="tools">    
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/Finance/add_invoice"> <i class="fa fa-plus"></i> Input Invoice</a>              
                </div>               
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Trx</th>
                    <th>No. Invoice</th>
                    <th>No. Sales Order</th>
                    <th>No. Surat Jalan</th>
                    <th>Currency</th>
                    <th>Nama Customer</th>
                    <th>Tanggal</th>
                    <?php if($this->session->userdata('user_ppn') == 0){ echo '<th>PPN</th>'; }?> 
                    <th>Keterangan</th>
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
                        <td style="text-align:center"><?php echo $no; ?></td>
                        <?php ($data->jenis_trx == 0) ? print('<td style="background-color:green; color: white;"><i class="fa fa-arrow-circle-up fa-2x" style="padding-top: 10px;"></i></td>'): print('<td style="background-color:red; color: white;"><i class="fa fa-arrow-circle-down fa-2x" style="padding-top: 10px;"></i></td>');?>
                        <td><?php echo $data->no_invoice; ?></td>
                        <td><?php echo $data->no_sales_order; ?></td>
                        <td><?php echo $data->no_surat_jalan; ?></td>
                        <td><?php echo $data->currency; ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->tanggal;?></td>
                        <?php if($this->session->userdata('user_ppn') == 0){ 
                           echo (($data->flag_ppn==1)? '<td><i class="fa fa-check"></i> Yes</td>': '<td><i class="fa fa-times"></i> No</td>');
                        }
                        ?>
                        <td><?php echo $data->keterangan;?></td>
                        <td><?= ($data->flag_matching > 0) ? '<div style="background-color:green; color:#fff; padding:3px">Sudah Matching</div>' : '<div style="background-color:darkkhaki; padding:3px">Belum Matching</div>';?></td>
                        <td style="text-align:center"> 
                            <?php
                                if($group_id==1 || $hak_akses['view_invoice']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Finance/view_invoice/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                               
                            <?php
                                }
                                if($group_id==1 || $hak_akses['print_invoice']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/Finance/print_invoice/'.$data->id.'" 
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

</script>