<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Retur'); ?>"> Retur </a> 
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
                    <i class="fa fa-beer"></i>DTR List
                </div>  
                <div class="tools">    
                <?php
                    if( ($group_id==1)||($hak_akses['add']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/Retur/add').'"> '
                        .'<i class="fa fa-plus"></i> Input Retur </a>';
                    }
                ?>                    
                </div>
            </div>
            
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. DTR</th>
                    <th>Tanggal</th>
                    <th>Customer</th>
                    <th>PIC</th>
                    <th>Jenis Barang</th>
                    <th>Penimbang</th>
                    <th>Jumlah <br>Items</th>
                    <th>Remarks</th>
                    <th>Status <br>Pembayaran</th>
                    <th>Type <br>Retur</th>
                    <th>TTR</th>
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
                        <td style="background-color: "><?php echo $data->no_dtr; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->pic; ?></td>
                        <td><?php echo $data->jenis_barang; ?></td>
                        <td><?php echo $data->penimbang; ?></td>                        
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td><?php echo $data->remarks; ?></td>   
                        <td><?php echo (($data->status_pembayaran==1)? "Sudah Bayar": "Belum Bayar"); ?></td>
                        <td><?php echo (($data->type_retur==1)? "Ganti Voucher": "Ganti Barang"); ?></td>
                        <td style="text-align:center">
                            <?php
                                if( ($group_id==1 || $hak_akses['create_ttr']==1) && $data->ready_to_ttr>0){
                                    echo '<a class="btn btn-circle btn-xs green-seagreen" href="'.base_url().'index.php/Retur/create_ttr/'.$data->id.'" 
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil-square-o"></i> Create &nbsp; </a>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php                                                                
                                if($group_id==1 || $hak_akses['print_dtr']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/Retur/print_dtr/'.$data->id.'" 
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
</script>         