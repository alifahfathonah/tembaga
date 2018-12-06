<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Tolling Titipan
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Tolling/ttr_list'); ?>"> TTR List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['ttr_list']==1) ){
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
                    <i class="fa fa-beer"></i>TTR List
                </div>                
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. TTR</th>
                    <th>Tanggal</th>
                    <th>No. Sales Order</th>
                    <th>Customer</th>
                    <th>No. Reff/ DTR</th>                    
                    <th>Jumlah <br>Items</th>
                    <th>Broto (Kg)</th>
                    <th>Netto (Kg)</th>
                    <th>Jmlh <br>Afkiran</th>
                    <th>Jmlh <br>Pengepakan</th>
                    <th>Jmlh <br>Lain-lain</th>
                    <!--th>Voucher <br>Pelunasan</th-->
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
                        <td style="background-color: "><?php echo $data->no_ttr; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->no_sales_order; ?></td>
                        <td><?php echo $data->nama_customer; ?></td>
                        <td><?php echo $data->no_dtr; ?></td>                        
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td style="text-align:right"><?php echo number_format($data->bruto,0,',','.'); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->netto,0,',','.'); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->jmlh_afkiran,0,',','.'); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->jmlh_pengepakan,0,',','.'); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->jmlh_lain,0,',','.'); ?></td>
                        <!--td style="text-align:center">
                            <?php
                                if( ($group_id==1 || $hak_akses['create_voucher_pelunasan']==1)  && $data->flag_bayar==0){
                                    echo '<a class="btn btn-circle btn-xs green" href="javascript:;" onclick="createVoucher('.$data->id.');"
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-pencil-square-o"></i> Create &nbsp; </a>';
                                }
                            ?>
                        </td-->
                        <td style="text-align:center"> 
                            <?php                                
                                if($group_id==1 || $hak_akses['print_ttr']==1){
                                    echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/Tolling/print_ttr/'.$data->id.'" 
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