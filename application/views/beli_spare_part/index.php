<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a>
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
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
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Data Pembelian Spare Part
                </div>
                <div class="tools">    
                <?php
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/BeliSparePart/add').'"> '
                        .'<i class="fa fa-plus"></i> Pengajuan Baru </a>';
                    }
                    // foreach ($hak_akses as $v => $c) {
                    //      print "$v: $c\t";
                    // }
                    // print "\r\n";
                ?>                    
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No Pengajuan</th>   
                    <th>Tgl Pengajuan</th>
                    <th>Yg Mengajukan</th>
                    <th>Jenis Kebutuhan</th> 
                    <th>Items</th> 
                    <th>Status</th>
                    <th>Disetujui<br>Oleh</th> 
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
                        <td><?php echo $data->no_pengajuan; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tgl_pengajuan)); ?></td>
                        <td><?php echo $data->realname; ?></td>
                        <td>
                        <?php 
                            if($data->jenis_kebutuhan==1){
                                echo "Segera";
                            }else{
                                echo "Tanggal ".date('d-m-Y', strtotime($data->tgl_sparepart_dibutuhkan));
                            } 
                        ?>
                        </td>
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:center">
                            <?php
                                if($data->status==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($data->status==1){
                                    echo '<div style="background-color:yellow; padding:3px">Approved, PO processing</div>';
                                }else if($data->status==2){
                                    echo '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                                }else if($data->status==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center"><?php echo $data->approve_name; ?></td>
                        <td style="text-align:center"> 
                            <?php
                                if($group_id==1 || $hak_akses['view']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/BeliSparePart/view/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                            <?php
                                }
                                if( ($group_id==1 || $hak_akses['create_po']==1) && $data->status==1 && $data->ready_to_create>0){
                            ?>
                            <a class="btn btn-circle btn-xs red-sunglo" href="<?php echo base_url(); ?>index.php/BeliSparePart/create_po/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-truck"></i> Create PO &nbsp; </a>
                            <?php
                                }
                                if( ($group_id==1||$hak_akses['edit']==1) && $data->status==0 ){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/BeliSparePart/edit/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php 
                                }
                                if( ($group_id==1||$hak_akses['delete']==1)&& $data->status==0 ){
                            ?>
                            <a href="<?php echo base_url(); ?>index.php/BeliSparePart/delete/<?php echo $data->id; ?>" 
                               class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus data ini?');">
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
<script>
$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         