<div class="row">                            
    <div class="col-md-12"> 
     
        <?php
            if( ($group_id==1)||($hak_akses['index']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>Master Jenis Brg Wip
                </div>
                <div class="tools">        
                    <a style="height:28px" class="btn btn-circle btn-sm default" href="<?= base_url(); ?>index.php/Mjenisbrgwip/add">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Barang</th>   
                    <th>Keterangan</th> 
                    <th>Edit</th> 
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($list_data as $data){
                            $no++;
                    ?>
                    <tr>
                        <td style="width:50px; text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->jenis_barang; ?></td>
                        <td><?php echo $data->keterangan; ?></td>
                        <td style="width:200px; text-align:center"> 
                            <?php
                                if( ($group_id==1)||($hak_akses['edit']==1) ){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?= base_url();?>index.php/Mjenisbrgwip/edit/<?= $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php 
                                }
                                ?>
                        </td><td> 
                            <?php       
                                if( ($group_id==1)||($hak_akses['delete']==1) ){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/Mjenisbrgwip/delete/<?php echo $data->id; ?>" 
                               class="btn btn-xs btn-circle red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus data ini?');">
                                <i class="fa fa-trash-o"></i> Hapus </a>
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
