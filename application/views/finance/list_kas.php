<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance/list_kas'); ?>"> List Kas </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['list_kas']==1) ){
        ?>
    <div class="collapse well" id="form_filter" >
        <form class="eventInsForm" method="post" target="_self" name="formku" 
        id="formku">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-8">
                                <select  id="customer" name="customer" placeholder="Silahkan pilih..."
                                    class="form-control myline select2me" style="margin-bottom:5px">
                                    <option value=""></option>
                                    <option value="0">Transaksi Keluar</option>
                                    <option value="1">Transaksi Masuk</option>
                                </select> 
                            </div>
                            <div class="col-md-4">
                                &nbsp; &nbsp; <a href="javascript:;" onclick="filterData()" class="btn green"><i class="fa fa-search-plus"></i> Filter</a>        
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </form>
    </div>
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
                <div class="tools">
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Cek</a>
                <?php
                    if( ($group_id==1)||($hak_akses['add_kas']==1) ){
                ?>
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/Finance/add_kas"> <i class="fa fa-plus"></i> Input Kas</a>
                <?php } ?>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Jenis Transaksi</th> 
                    <th>Bank</th> 
                    <th>No. Uang Masuk/<br>No. Giro/ No. Pembayaran</th>
                    <th>Nama Customer</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
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
                        <td><?php ($data->jenis_trx) ? print('<i class="fa fa-arrow-circle-up"></i> Keluar'): print('<i class="fa fa-arrow-circle-down"></i> Masuk');?></td>
                        <td><?php echo $data->kode_bank; ?></td>
                        <td><?php echo $data->no_uang_masuk.$data->no_giro.$data->no_pembayaran; ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->currency.' '.number_format($data->nominal,0,',','.') ?></td>
                        <td><?php echo $data->keterangan; ?></td>
                        <td><?php
                                if( ($group_id==1)||($hak_akses['view_kas']==1) ){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Finance/view_kas/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
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
function filterData(){
    var id=$('#customer').val();
    window.location = 'Finance/filter_kas/'+id;
}
</script>  