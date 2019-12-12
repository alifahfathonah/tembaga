<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Finance
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Finance'); ?>"> Data Bank Masuk </a>
        </h4>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['index']==1) ){
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
                                    <?php 
                                    foreach($list_customer as $p){
                                    ?>
                                    <option value="<?=$p->id;?>"><?=$p->nama_customer;?> </option>
                                    <?php } ?>    
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
                    <i class="fa fa-file-word-o"></i>Data Bank Masuk
                </div> 
                <div class="tools">
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Cek</a>
                <?php
                    if( ($group_id==1)||($hak_akses['add_um']==1) ){
                ?>
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/Finance/add_bm"> <i class="fa fa-plus"></i> Input Bank Masuk</a>
                <?php } ?>
                </div>               
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Nama Customer</th>
                    <th>No<br> Bank Masuk</th>
                    <th>Tanggal</th>
                    <th>Jenis<br>Pembayaran</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Matching</th>
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
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->no_uang_masuk; ?></td>
                        <td><?php echo $data->tanggal; ?></td>
                        <td><?php echo $data->jenis_pembayaran; ?></td>
                        <td><?php echo $data->currency.' '.number_format($data->nominal,2,',','.');?></td>
                        <td><?php echo $data->keterangan; ?></td>
                        <td style="text-align:center">
                            <?php
                                if($data->status==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Belum Cair</div>';
                                }else if($data->status==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Sudah Cair</div>';
                                }else if($data->status==2){
                                    echo '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                                }else if($data->status==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Gagal Cair</div>';
                                }else if($data->status==8){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Sudah Diganti</div>';
                                }
                            ?>
                        </td>
                        <td><?= ($data->flag_matching > 0) ? '<div style="background-color:green; color:#fff; padding:3px">Sudah Matching</div>' : '<div style="background-color:darkkhaki; padding:3px">Belum Matching</div>';?></td>
                        <td style="text-align:center"> 
                            <?php 
                                if( (($group_id==1)||($hak_akses['delete']==1)) && $data->flag_matching == 0 && $data->id_slip_setoran == 0 ){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/Finance/delete_um/<?php echo $data->id; ?>" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus transaksi ini?');">
                                <i class="fa fa-trash-o"></i> Delete 
                            </a>                            
                            <?php 
                                }
                                if($group_id==1 || $hak_akses['view_um']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/Finance/view_um/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                               
                            <?php
                                }
                                if($group_id==1 || $hak_akses['print_um']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/Finance/print_um_match/'.$data->id.'" 
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
function filterData(){
    var id=$('#customer').val();
    window.location = 'filter_cek/'+id;
}
</script>         