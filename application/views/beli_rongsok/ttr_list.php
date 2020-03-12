<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok'); ?>"> Pembelian Rongsok </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliRongsok/ttr_list'); ?>"> TTR List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['ttr_list']==1) ){
        ?>
    <div class="collapse well" id="form_filter" >
        <form class="eventInsForm" method="post" target="_self" name="formku" 
        id="formku">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <select id="jenis" name="jenis" class="form-control select2me myline" data-placeholder="Pilih..." style="margin-bottom:5px">
                                        <option value="0">TTR</option>
                                        <option value="1">BPB-R</option>
                                    </select>
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="tgl_start" name="tgl_start" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?php echo date('Y-m-01'); ?>">
                            </div>
                            <div class="col-md-1">
                                S/D
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="tgl_end" name="tgl_end" 
                                    class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                    value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-2">
                                &nbsp; &nbsp; <a href="javascript:;" onclick="filterData()" class="btn green"><i class="fa fa-search-plus"></i> Filter</a>        
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </form>
    </div> 
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
                <div class="tools">
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_filter" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_filter"><i class="fa fa-search"></i> Filter Tanggal</a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No. TTR</th>
                    <th>Tanggal</th>
                    <th>No. PO</th>
                    <th>Supplier</th>
                    <th>No. Reff/ DTR</th>
                    <th>Tanggal DTR</th>
                    <th>No. SJ</th>
                    <th>Jumlah <br>Items</th>
                    <th>Status</th>
                    <th>Bruto (Kg)</th>
                    <th>Netto (Kg)</th>
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
                        <td><?php echo $data->no_po; ?></td>
                        <td><?php echo $data->nama_supplier; ?></td>
                        <td><?php echo $data->no_dtr; ?></td>                   
                        <td><?php echo date('d-m-Y', strtotime($data->tgl_dtr)); ?></td>  
                        <td><?php echo $data->no_sj;?></td>   
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td>
                        <?php 
                        if($data->ttr_status==0){
                            echo '<div class="bg-yellow">Waiting Approval</div>';
                        }else if($data->ttr_status==9){
                            echo '<div class="bg-red">Rejected</div>';
                        }else if($data->ttr_status==1 || $data->ttr_status==2){
                            echo '<div class="bg-green">Approve</div>';
                        }?></td>
                        <td style="text-align:right"><?php echo number_format($data->bruto,2,'.',','); ?></td>
                        <td style="text-align:right"><?php echo number_format($data->netto,2,'.',','); ?></td>
                        <td style="text-align:center"> 
                            <?php                                
                                if($data->ttr_status==0){
                                    if ($group_id==1 || $hak_akses['review_ttr']==1){
                                    echo '<a class="btn btn-circle btn-xs green" href="'.base_url().'index.php/BeliRongsok/review_ttr/'.$data->id.'" 
                                        style="margin-bottom:4px"> &nbsp; <i class="fa fa-edit"></i> Review &nbsp; </a>';
                                    }
                                }
                                if($group_id==1 || $hak_akses['print_ttr']==1){
                                        echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/BeliRongsok/print_ttr/'.$data->id.'" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a><br/>';
                                    if($data->no_po != ''){
                                        echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/BeliRongsok/print_ttr_harga/'.$data->id.'" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print dengan Harga &nbsp; </a><br/>';
                                    }
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
    $("#tgl_start").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
    });        
    $("#tgl_end").datepicker({
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
function filterData(){
    var j=$('#jenis').val();
    var s=$('#tgl_start').val();
    var e=$('#tgl_end').val();
    if(j==0){
    window.location = '<?=base_url();?>index.php/BeliRongsok/ttr_list/'+s+'/'+e;
    }else{
    window.location = '<?=base_url();?>index.php/BeliRongsok/bpb_list/'+s+'/'+e;
    }
}
</script>         