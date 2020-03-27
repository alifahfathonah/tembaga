<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Pembelian 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart'); ?>"> Pembelian Spare Part </a> 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/bpb_list'); ?>"> BPB List </a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12"> 
        <?php
            if( ($group_id==1)||($hak_akses['bpb_list']==1) ){
        ?>
    <div class="collapse well" id="form_filter" >
        <form class="eventInsForm" method="post" target="_self" name="formku" 
        id="formku">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
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
                    <i class="fa fa-beer"></i>BPB List
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
                    <th>No. BPB</th>
                    <th>Tanggal</th>
                    <th>No. PO</th>
                    <th>Currency</th>
                    <th>Supplier</th>
                    <th>Jumlah <br>Items</th>
                    <th>Remarks</th>
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
                        <td><?php echo $data->no_bpb; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($data->tanggal)); ?></td>
                        <td><?php echo $data->no_po; ?></td>
                        <td><?php echo $data->currency; ?></td>
                        <td><?php echo $data->nama_supplier; ?></td>                     
                        <td style="text-align:center"><?php echo $data->jumlah_item; ?></td>
                        <td><?php echo $data->remarks; ?></td>
                        <td style="text-align:center">
                            <?php 
                                if($data->vk_id==0){ 
                                    echo '<div style="background-color:bisque; padding:4px">Belum Dibayar</div>';
                                }else if($data->vk_id > 0){ 
                                    echo '<div style="background-color:green; color:white; padding:4px">Sudah Dibayar</div>';
                                }
                            ?>
                        </td>
                        <td style="text-align:center"> 
                            <?php
                            if($data->currency!='IDR'){
                                echo '<a class="btn btn-circle btn-xs blue" href="'.base_url().'index.php/BeliSparePart/edit_lpb/'.$data->id.'" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-pencil"></i> Edit &nbsp; </a>';
                            }
                            if($data->vk_id==0){
                                echo '<a href="'.base_url().'index.php/BeliSparePart/delete_lpb/'.$data->id.'" class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm(\'Anda yakin menghapus transaksi ini?\');"><i class="fa fa-trash-o"></i> Delete </a>';
                            }
                                if($group_id==1 || $hak_akses['print_bpb']==1){
                            ?>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/BeliSparePart/print_lpb/<?php echo $data->id; ?>" 
                                style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa fa-print"></i> Print &nbsp; </a>
                                                                                
                            <?php } ?>
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
$(function(){    
    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
function filterData(){
    var s=$('#tgl_start').val();
    var e=$('#tgl_end').val();
    window.location = '<?=base_url();?>index.php/BeliSparePart/lpb_list/'+s+'/'+e;
}
</script>