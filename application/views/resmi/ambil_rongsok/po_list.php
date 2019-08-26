<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_Rongsok/po_list'); ?>"> Pembelian Rongsok </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==16)||($hak_akses['index']==1) ){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
                </div>
            </div>
        </div>
        <div class="collapse well" id="form_filter" border="1">
            <form class="eventInsForm" method="post" target="_self" name="filter" 
            id="filter">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                Dari Tanggal
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="tgl_start" name="tgl_start" class="form-control myline input-small" style="margin-bottom:5px;float:left;" value="<?= date('d-m-Y');?>">  
                            </div>
                            <div class="col-md-1" style="margin-bottom: 5px;">S/D</div>
                            <div class="col-md-3">
                                <input type="text" id="tgl_end" name="tgl_end" class="form-control myline input-small" style="margin-bottom:5px;float:left;" value="<?= date('d-m-Y');?>">  
                            </div>
                            <div class="col-md-3">
                                &nbsp; &nbsp; <a href="javascript:;" onclick="filterData()" class="btn green"><i class="fa fa-search-plus"></i> Filter</a>        
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-beer"></i>Purchase Order List
                </div>
                <div class="tools">
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Tanggal</a>
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/BeliRongsok/po_list_outdated"> <i class="fa fa-minus"></i> PO LIST OUTDATED</a>
                <?php
                    if( ($group_id==16)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/R_Rongsok/add_po').'"><i class="fa fa-plus"></i> Input PO </a>';
                    }
                ?>                    
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. PO</th>
                    <th>Tanggal</th>
                    <th>Supplier</th> 
                    <th>Attention To</th>
                    <th>PPN</th> 
                    <th>Jumlah <br>Items</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Voucher<br>Pembayaran</th>
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
                        <td><?php echo $data->no_po; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->nama_supplier; ?></td>
                        <td><?php echo $data->pic; ?></td>
                        <?php 
                           echo (($data->ppn==1)? '<td><i class="fa fa-check"></i> Yes</td>': '<td><i class="fa fa-times"></i> No</td>');
                        ?>
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:center">
                            <?php 
                                if($data->status==0){ 
                                    echo '<div style="background-color:bisque; padding:4px">Draft</div>';
                                }else if($data->status==1){ 
                                    echo '<div style="background-color:green; color:white; padding:4px">Closed</div>';
                                }else if($data->status==2){ 
                                    echo '<div style="background-color:yellow; padding:4px;">Processing</div>';
                                }else if($data->status==3){
                                    echo '<div style="background-color:powderblue; padding:4px;">Waiting Voucher</div>';
                                }else if($data->status==4){
                                    echo '<div style="background-color:limegreen; padding:4px; font-weight: bold;">Sudah Dibayar</div>';
                                }
                            ?>
                        </td>
                        <td><?php echo $data->remarks; ?></td>
                        <td style="text-align:center">
                        </td>
                        <td style="text-align:center"> 
                            <?php
                                if( ($group_id==16 || $hak_akses['edit']==1) && $data->status != 1 ){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/R_Rongsok/edit_po/<?php echo $data->id; ?>" style="margin-bottom:4px">
                                &nbsp; <i class="fa fa-edit"></i> Edit &nbsp; </a>
                            <?php
                                }
                                if($group_id==16 || $hak_akses['print_po']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/BeliRongsok/print_po/<?php echo $data->id; ?>" 
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
<script>
function filterData(){
    const start=$('#tgl_start').val();
    const end=$('#tgl_end').val()
    window.location = '<?php echo base_url('index.php/BeliRongsok/filter_po/');?>'+start+'&'+end;
}
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script>
$(function(){   
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    }); 
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         