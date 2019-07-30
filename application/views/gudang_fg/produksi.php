<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">
        <h5 style="color:navy">
            <a href="
                <?php echo base_url(); ?>">
                <i class="fa fa-home"></i> Home 
            </a>
            <i class="fa fa-angle-right"></i> Gudang FG
            
            <i class="fa fa-angle-right"></i>
            <a href="
                <?php echo base_url('index.php/GudangFG/produksi_fg'); ?>">  Produksi FG 
            </a>
        </h5>
    </div>
</div>
    <?php
        if( ($group_id==1 || $group_id==21)||($hak_akses['produksi']==1) ){
    ?>
<div class="row">&nbsp;</div>
<div class="collapse well" id="form_add" >
    <form class="eventInsForm" method="post" target="_self" name="formku" 
    id="formku" action="<?php echo base_url('index.php/GudangFG/save_laporan'); ?>">
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
                            <div class="col-md-12">
                            Jenis Barang 
                                <font color="#f00">*</font>
                            </div>
                            <div class="col-md-12">
                                <select  id="jenis_barang" name="jenis_barang" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px">
                                    <option value=""></option>
                                    <?php 
                                foreach($jenis_barang as $jb){
                                ?>
                                    <option value="<?=$jb->id;?>"><?='('.$jb->kode.') '.$jb->jenis_barang;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                            No Laporan Produksi
                                <font color="#f00">*</font>
                            </div>
                            <div class="col-md-12">
                                <input type="text" id="no" name="no" readonly="readonly" value="Auto Generate" 
                                class="form-control myline" style="margin-bottom:5px;">
                                </div>
                                <div class="col-md-12">
                            Packing 
                                    <font color="#f00">*</font>
                                </div>
                                <div class="col-md-12">
                                    <select  id="packing" name="packing" placeholder="Silahkan pilih..."
                                class="form-control myline select2me" style="margin-bottom:5px">
                                        <option value=""></option>
                                        <?php 
                                        foreach($packing as $p){
                                        ?>
                                        <option value="<?=$p->id;?>"><?=$p->jenis_packing;?></option>
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
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success 
                    <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                    <button class="close" data-close="alert"></button>
                    <span id="msg_sukses">
                        <?php echo $this->session->flashdata('flash_msg'); ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 10px;">
            <div class="portlet box yellow-gold">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-hourglass"></i>Produksi Finish Good 
                    </div>
                    <div class="tools">
                        <?php if( ($group_id==1 || $group_id==21)||($hak_akses['add']==1) ){ ?>
                        <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="#form_add" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="form_add">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Produksi</th>
                                <th>Tanggal</th>
                                <th>Jenis Barang</th>
                                <th>Jenis Packing</th>
                                <th>Total Detail</th>
                                <th>Total Netto</th>
                                <th>PIC</th>
                                <th>Status BPB</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=0;
                            foreach($list_data as $data) { ?>
                            <tr>
                                <td>
                                    <?= $no ?>
                                </td>
                                <td>
                                    <?= $data->no_laporan_produksi; ?>
                                </td>
                                <td>
                                    <?= $data->tanggal; ?>
                                </td>
                                <td>
                                    <?= $data->jenis_barang; ?>
                                </td>
                                <td>
                                    <?= $data->jenis_packing; ?>
                                </td>
                                <td>
                                    <?= $data->total_barang; ?>
                                </td>
                                <td>
                                    <?= number_format($data->total_netto,2,',','.'); ?>
                                </td>
                                <td>
                                    <?= $data->pembuat; ?>
                                </td>
                                <td style="text-align:center">
                                    <?php 
                                        if($data->status==0){ 
                                            echo '<div style="background-color:bisque; padding:4px">Waiting review</div>';
                                        }else if($data->status==1){ 
                                            echo '<div style="background-color:green; color:white; padding:4px">Approved</div>';
                                        }else if($data->status==9){ 
                                            echo '<div style="background-color:red; padding:4px; color:white">Rejected</div>';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                if(( ($group_id==1 || $group_id==21) && !$data->flag_result) || (!$data->flag_result)){
                    echo '
                                    <a class="btn btn-circle btn-xs blue" href="'.base_url().'index.php/GudangFG/edit_laporan/'.$data->id.'" style="margin-bottom:4px"> &nbsp; 
                                        <i class="fa fa-edit"></i> Edit &nbsp; 
                                    </a> ';
                }else{
                   echo '
                                    <a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangFG/edit_laporan/'.$data->id.'" style="margin-bottom:4px"> &nbsp; 
                                        <i class="fa fa-book"></i> View &nbsp; 
                                    </a> ';
                }
                if(($group_id==1 || $group_id==21) && $data->total_barang==0){
                    echo '
                                    <a class="btn btn-circle btn-xs red" href="'.base_url().'index.php/GudangFG/delete_produksi_fg/'.$data->id.'" style="margin-bottom:4px" onclick="return confirm(\'Anda yakin menghapus transaksi ini?\');"> &nbsp; 
                                        <i class="fa fa-trash"></i> Delete &nbsp; 
                                    </a> ';
                }
                ?>
                                </td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
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

<script>
function simpanData(){
    $('#formku').submit();
};
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
        dateFormat: 'dd-mm-yy'
    });       
});
</script>
      