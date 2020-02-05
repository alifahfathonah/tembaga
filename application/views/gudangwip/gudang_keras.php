<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang WIP 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangWIP/gudang_keras'); ?>"> Gudang Keras List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1 || $group_id==21)||($hak_akses['spb_list']==1) ){
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
                    <i class="fa fa-file-word-o"></i>Gudang Keras List
                </div> 
                <div class="tools">
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/GudangWIP/add_gudang_keras"> <i class="fa fa-plus"></i> Tambah</a>
                </div>               
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Jenis Trx</th>
                    <th>Asal</th>
                    <th>Jenis Barang</th>
                    <th>Tanggal</th>
                    <th>Qty</th>
                    <th>Netto</th>
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
                        <?php ($data->jenis_trx == 0) ? print('<td style="background-color:green; color: white;"><i class="fa fa-arrow-circle-up fa-xs" style="padding-top: 5px;"></i></td>'): print('<td style="background-color:red; color: white;"><i class="fa fa-arrow-circle-down fa-xs" style="padding-top: 5px;"></i></td>');?>
                        <td style="background-color: "><?php echo $data->no_produksi_wip; ?></td>
                        <td style="background-color: "><?php echo $data->jenis_barang; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td style="text-align:center"><?php echo number_format($data->qty,2,',','.'); ?></td>
                        <td style="text-align:center"><?php echo number_format($data->berat,2,',','.'); ?></td>
                        <td style="text-align:center">
                        <?php if($data->t_hasil_wip_id==0||empty($data->no_produksi_wip)){ ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/GudangWIP/edit_gudang_keras/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil"></i> Edit &nbsp; </a>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/GudangWIP/delete_gudang_keras/<?php echo $data->id;?>" onclick="return confirm('Anda yakin menghapus transaksi ini?');" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-trash"></i> Hapus &nbsp; </a>
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
$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         