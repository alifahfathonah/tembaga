<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">
        <h5 style="color:navy">
            <a href="
                <?php echo base_url(); ?>">
                <i class="fa fa-home"></i> Home 
            </a>
            <i class="fa fa-angle-right"></i> Gudang
            
            <i class="fa fa-angle-right"></i>
            <a href="
                <?php echo base_url('index.php/GudangWIP'); ?>"> Gudang WIP 
            </a>
        </h5>
    </div>
</div>
<?php
        if( ($group_id==1 || $group_id==21)||($hak_akses['index']==1) ){
    ?>
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
                <i class="fa fa-cubes"></i> Gudang WIP
            </div><!-- 
            <div class="tools"> 
                <?php if( ($group_id==1 || $group_id==21)||($hak_akses['add_spb']==1) ){?>
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="<?=base_url();?>index.php/GudangWIP/spb_kirim_rongsok"> <i class="fa fa-plus"></i> Kirim Ke Rongsok</a>  
                <?php } ?>            
            </div> -->
        </div>
        <div class="portlet-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                    <tr >
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jenis Transaksi</th>
                        <th>No BPB WIP</th>
                        <th>Jenis Barang WIP</th>
                        <th>Quantity</th>
                        <th>Berat</th>
                        <th>Keterangan</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
            $no = 1;
            foreach($gudang_wip as $data) { ?>
                    <tr>
                        <td>
                            <?= $no;?>
                        </td>
                        <td>
                            <?= $data->tanggal;?>
                        </td>
                        <td>
                            <?php ($data->jenis_trx) ? print('
                            <i class="fa fa-arrow-circle-up"></i> Keluar'): print('
                            <i class="fa fa-arrow-circle-down"></i> Masuk');?>
                        </td>
                        <td>
                            <?= $data->no_bpb;?>
                        </td>
                        <td>
                            <?= $data->jenis_barang;?>
                        </td>
                        <td>
                            <?= $data->qty.' '.$data->uom; ?>
                        </td>
                        <td>
                            <?= $data->berat; ?>
                        </td>
                        <td>
                            <?= $data->keterangan; ?>
                        </td>
                        <td>
                            <?php if(!$data->jenis_trx) {?>
                            <a class="btn blue btn-xs btn-circle" href="
                                <?= base_url('index.php/GudangWIP/spb_kirim_rongsok/'.$data->id);?>">
                                <i class="fa fa-exchange"></i> Kirim ke rongsok
                            </a>
                        </td>
                        <?php }?>
                    </tr>
                    <?php } ?>
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
      