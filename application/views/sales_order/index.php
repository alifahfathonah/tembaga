<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Sales Order 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder'); ?>"> Sales Order </a> 
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
        <div class="modal fade" id="modalFilter" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">&nbsp;</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button>
                                    <span id="message">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                        <form class="eventInsForm" method="post" target="_self" name="formku" 
                              id="formku">                            
                            <div class="row">
                                <div class="col-md-5">
                                    Surat Jalan
                                </div>
                                <div class="col-md-7">
                                    <select class="form-control myline" style="margin-bottom: 5px" id="surat_jalan" name="surat_jalan">
                                        <option></option>
                                        <option value="0">Belum dikirim semua</option>
                                        <option value="1">Sudah dikirim semua</option>
                                    </select>
                                    
                                </div>
                            </div>                             
                            
                        </form>
                    </div>
                    <div class="modal-footer">                        
                        <button type="button" class="btn blue" onClick="saveFilter();">Simpan</button>
                        <button type="button" class="btn default" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div> 
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-truck"></i>Sales Order List
                </div>  
                <div class="tools">    
                <?php
                    if( ($group_id==1||($hak_akses['add'])==1) ){
                        echo '<a href="javascript:;" style="height: 28px;" class="btn btn-circle btn-sm blue-ebonyclay" onclick="showFilter()">
                            <i class="fa fa-filter"></i> Filter
                        </a>   ';
                    }
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/SalesOrder/add').'"> '
                        .'<i class="fa fa-plus"></i> Input Sales Order </a>';
                    }
                ?>                    
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. SO</th>
                    <th>Alias</th>
                    <th>No. PO</th>
                    <th>Jenis<br>Barang</th>
                    <th>Tanggal</th>
                    <th>Customer</th> 
                    <th>PPN</th> 
                    <th>Jumlah<br>Items</th>
                    <th>Status<br>Invoice</th>
                    <th>Status<br>Surat Jalan</th>
                    <th>Status<br>SPB</th>
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
                        <td><?php echo $data->no_sales_order; ?></td>
                        <td><?php echo $data->alias; ?></td>
                        <td><?php echo $data->no_po;?></td>
                        <td><?php echo $data->jenis_barang; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td>
                        <?php 
                           echo (($data->flag_ppn==1)? '<i class="fa fa-check"></i> Yes': '<i class="fa fa-times"></i> No');
                        ?>
                        </td>
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td>
                        <?php 
                           if($data->flag_invoice==1){ echo '<div style="background-color:green; padding:3px; color:white; text-align: center;">Invoice Lengkap</div>';
                            }else if($data->flag_invoice==2){
                                echo '<div style="background-color:orange; padding:3px; color:white; text-align: center;">Invoice Sudah Ada</div>';
                            }else{
                                echo '<div style="background-color:darkkhaki; padding:3px; text-align: center;">Invoice Belum Semua</div>';
                            }
                        ?>
                        </td>
                        <td>
                        <?php 
                           echo (($data->flag_sj==1)? '<div style="background-color:green; padding:3px; color:white; text-align: center;">Sudah Dikirim Semua</div>':'<div style="background-color:darkkhaki; padding:3px; text-align: center;">Belum Dikirim Semua</div>');
                        ?>
                        </td>
                        <td style="text-align:center">
                            <?php
                                if($data->status_spb==0){
                                    echo '<div style="background-color:darkkhaki; padding:3px">Waiting Approval</div>';
                                }else if($data->status_spb==1){
                                    echo '<div style="background-color:green; padding:3px; color:white">Approved</div>';
                                }else if($data->status_spb==2 || $data->status_spb ==4){
                                    echo '<div style="background-color:orange; color:#fff; padding:3px">Belum Dipenuhi Semua</div>';
                                }else if($data->status_spb==3){
                                    echo '<div style="background-color:blue; color:#fff; padding:3px">Waiting Approval</div>';
                                }else if($data->status_spb==9){
                                    echo '<div style="background-color:red; color:#fff; padding:3px">Rejected</div>';
                                }
                            ?>
                        </td>     
                    <!--<td style="text-align:center">
                            <?php/*
                                if( ($group_id==1 || $hak_akses['create_dtr']==1) && $data->ready_to_dtr>0){
                                    echo '<a class="btn btn-circle btn-xs green-seagreen" href="'.base_url().'index.php/SalesOrder/create_dtr/'.$data->id.'" 
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil-square-o"></i> Create &nbsp; </a>';
                                }*/
                            ?>
                        </td>-->
                        <td style="text-align:center">
                            <?php
                                if($group_id==1 || $hak_akses['view_so']==1){
                            ?>
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/SalesOrder/view_so/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                            <?php
                                }if(($group_id==1 || $hak_akses['edit_so']==1) && $data->invoice == 0){
                            ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/SalesOrder/edit/<?php echo $data->id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-pencil"></i> Edit &nbsp; </a>
                            <?php
                                }
                            ?>
                            <?php
                                if($group_id==1 || $hak_akses['print_so']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/SalesOrder/print_so/<?php echo $data->id; ?>" 
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
<script>

function showFilter(){  
    $("#modalFilter").find('.modal-title').text('Filter');
    $("#modalFilter").modal('show',{backdrop: 'true'}); 
}

$(function(){       
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});

function saveFilter(){
    if ($.trim($("#surat_jalan").val()) == "") {
        $('#message').html("Silahkan pilih filter surat jalan");
        $('.alert-danger').show();
    } else {
        $('#formku').attr('action','<?php echo base_url(); ?>index.php/SalesOrder/filter_so');
        $('#formku').submit();
    }
}
</script>         