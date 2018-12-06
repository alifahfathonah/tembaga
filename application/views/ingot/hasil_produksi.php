<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Produksi Ingot
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/Ingot/hasil_produksi'); ?>"> Hasil Produksi </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['hasil_produksi']==1) ){
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
                    <i class="fa fa-truck"></i>List Hasil Produksi
                </div>  
                <div class="tools">    
                <?php
                    if( ($group_id==1)||($hak_akses['add_produksi']==1) ){
                        echo '<a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="'.base_url('index.php/Ingot/hasil_produksi2').'"> '
                        .'<i class="fa fa-plus"></i> Input Hasil Produksi </a>';
                    }
                ?>                    
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. Produksi</th>
                    <th>Tanggal</th>
                    <th>Total<br/> Rongsok (kg)</th>                     
                    <th>No. SPB</th> 
                    <th>PIC</th>
                    <th>Hasil <br/>Ingot (Btg)</th>
                    <th>Berat <br/>Ingot (Kg)</th>
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
                        <td><?php echo $data->no_produksi; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->total_rongsok; ?></td>
                        <td><?php echo $data->no_bpb_rongsok; ?></td>
                        <td><?php echo $data->pic; ?></td>                        
                        <td style="text-align:center"><?php echo $data->ingot; ?></td>                        
                        <td><?php echo $data->berat_ingot; ?></td>                        
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