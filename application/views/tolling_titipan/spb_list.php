<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GUdangFG/spb_list'); ?>"> SPB Tolling Keluar </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['spb_list']==1) ){
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
                                <select  id="jb" name="jb" placeholder="Silahkan pilih..."
                                    class="form-control myline select2me" style="margin-bottom:5px">
                                    <option value=""></option>
                                    <option value="rongsok">Rongsok</option>
                                    <option value="wip">WIP</option>
                                    <option value="fg">FinishGood</option>  
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
                    <i class="fa fa-file-word-o"></i>List SPB Tolling
                </div> 
                <div class="tools">    
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Jenis Barang</a>
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/Tolling/add_spb"> <i class="fa fa-plus"></i> Ajukan SPB Tolling Keluar</a>
                </div>               
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. SPB</th>
                    <th>Tanggal</th>
                    <th>Pemohon</th>
                    <th>Jumlah <br>Items</th>
                    <th>Remarks</th>
                    <th>Status</th>
                    <th>Approve/<br>Reject Oleh</th> 
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
                        <td><?php echo $data->pic; ?></td>                            
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td><?php echo $data->keterangan; ?></td>
                        <td style="text-align:center">
                            <?php
                                if($data->status==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($data->status==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($data->status==2){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Belum Dipenuhi Semua</div>';
                                }else if($data->status==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?php 
                                if($data->status==1){
                                    echo $data->approved_name; 
                                }else if($data->status==9){
                                    echo $data->rejected_name;
                                }
                            ?>
                        </td>
                        <td style="text-align:center">
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/GudangFG/view_spb/<?php echo $data->id; ?>" 
                               style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                            <?php
                                if($group_id==1 || $hak_akses['print_po']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangFG/print_spb/'.$data->id.'" 
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
$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
function filterData(){
    var id=$('#jb').val();
    window.location = 'filter_spb/'+id;
}
</script>