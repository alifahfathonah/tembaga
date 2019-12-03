<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Rongsok 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangRongsok/spb_list'); ?>"> SPB Rongsok </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1 || $group_id == 21)||($hak_akses['spb_list']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="collapse well" id="form_filter" >
        <form class="eventInsForm" method="post" target="_self" name="formku" 
        id="formku">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-8">
                                <select id="filter" name="filter" placeholder="Silahkan pilih..."
                                    class="form-control myline select2me" style="margin-bottom:5px">
                                    <option value=""></option>
                                    <option value="1">Permintaan Produksi</option>
                                    <option value="0">Permintaan Lain</option>
                                    <option value="2">Permintaan Semua</option>
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
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>SPB List
                </div>
                <div class="tools">
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Cek</a>
                    <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?php echo base_url('index.php/Ingot/add_spb_keluar');?>"><i class="fa fa-plus"></i> Create SPB Rongsok </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. SPB</th>
                    <th>Tanggal</th>
                    <th>No. Produksi</th>
                    <th>Tipe Apolo</th>
                    <th>Pemohon</th>
                    <th>Remarks</th>
                    <th>Jenis</th>
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
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td style="background-color: "><?php echo $data->no_spb; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->no_produksi; ?></td>
                        <td><?php echo $data->tipe_apolo; ?></td>
                        <td><?php echo $data->pic; ?></td>                            
                        <td><?php echo $data->remarks; ?></td>
                        <td style="text-align:center">
                            <?php
                                if($data->jenis_spb==0){
                                    echo 'SDM';
                                }else if($data->jenis_spb==4){
                                    echo 'Tolling';
                                }else if($data->jenis_spb==5){
                                    echo 'Kirim Rongsok';
                                }else if($data->jenis_spb==6){
                                    echo 'SO';
                                }else if($data->jenis_spb==7){
                                    echo 'Retur';
                                }else if($data->jenis_spb==8){
                                    echo 'Repacking';
                                }else if($data->jenis_spb==9){
                                    echo 'Retur K';
                                }else if($data->jenis_spb==10){
                                    echo 'Tali Rolling';
                                }
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?php
                                if($data->status==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Review</div>';
                                }else if($data->status==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($data->status==2){
                                    echo '<div style="background-color:green; color:#fff; padding:3px">Finished</div>';
                                }else if($data->status==3){
                                    echo '<div style="background-color:blue; color:#fff; padding:3px">Waiting Approval</div>';
                                }else if($data->status==4){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Belum Dipenuhi Semua</div>';
                                }else if($data->status==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php
                                if($group_id==1 || $group_id == 21 || $hak_akses['view_spb']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/GudangRongsok/view_spb/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                               
                            <?php
                                }
                                #if($group_id==1 || $hak_akses['edit_spb']==1 && $hak_akses['status']!=1 ){
                            ?>
                            <!--a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/Ingot/edit_spb/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-pencil"></i> Edit &nbsp; </a-->
                            <?php   
                                #}
                                if($group_id==1 || $group_id == 21 || $hak_akses['print_spb']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/Ingot/print_spb/'.$data->id.'" 
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
    var id=$('#filter').val();
    if(id == 2){
    window.location = '<?php echo base_url('index.php/GudangRongsok/spb_list');?>';
    }else{
    window.location = 'filter_spb/'+id;
    }
}

$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         