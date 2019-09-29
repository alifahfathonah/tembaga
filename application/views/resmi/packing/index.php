<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Master 
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/R_Rongsok/ambil_packing'); ?>"> Data Pindah </a>
        </h4>          
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
<div class="collapse well" id="form_add" >
        <form class="eventInsForm" method="post" target="_self" name="formku" 
    id="formku" action="<?php echo base_url('index.php/R_Rongsok/create_pindah'); ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            Tanggal 
                            <font color="#f00">*</font>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?php echo date('d-m-Y'); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                            Jenis Barang
                                <font color="#f00">*</font>
                            </div>
                            <div class="col-md-12">
                                <select  id="jenis_barang" name="jenis_barang" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px">
                                    <option value=""></option>
                                    <?php 
                                foreach($list_jb as $jb){
                                ?>
                                    <option value="<?=$jb->id;?>"><?='('.$jb->kode.') '.$jb->jenis_barang;?></option>
                                    <?php } ?>
                                </select>
                                </div>
                                <div class="col-md-12 text-right">
                            &nbsp; &nbsp; 
                                    <a href="javascript:;" onclick="simpanData()" class="btn green" >
                                        <i class="fa fa-floppy-o"></i> Buat Laporan 
                                    </a>
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
                    <i class="fa fa-beer"></i>Data 
                </div>
                <div class="tools">    
                        <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add">
                            <i class="fa fa-plus"></i> Tambah Pindah Barcode
                        </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>Tanggal</th>
                    <th>Kode</th>   
                    <th>Jenis Barang</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 0;
                        foreach ($list as $data){
                            $no++;
                    ?>
                    <tr>
                        <td style="text-align:center"><?php echo $no; ?></td>
                        <td><?php echo $data->tanggal; ?></td>
                        <td><?php echo $data->kode; ?></td>
                        <td><?php echo $data->jenis_barang; ?></td>
                        <td style="text-align:center">
                            <a class="btn btn-circle btn-xs green" href="<?php echo base_url(); ?>index.php/R_Rongsok/view_pindah/<?php echo $data->id; ?>" style="margin-bottom:4px">&nbsp; <i class="fa fa-book"></i> View &nbsp; </a>
                            <!-- <a href="<?php echo base_url(); ?>index.php/Rongsok/delete/<?php echo $data->id; ?>" 
                               class="btn btn-circle btn-xs red" style="margin-bottom:4px" onclick="return confirm('Anda yakin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus </a> -->
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
function simpanData(){
    $('#formku').submit();
};

$(function(){
    $("#tanggal").datepicker({
        showOn: "button",
        buttonImage: "<?php echo base_url(); ?>img/Kalender.png",
        buttonImageOnly: true,
        buttonText: "Select date",
        changeMonth: true,
        changeYear: true,
        dateFormat: 'dd-mm-yy'
    });

    window.setTimeout(function() { $(".alert-success").hide(); }, 4000);
});
</script>         