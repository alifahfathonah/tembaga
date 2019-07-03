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
                <?php echo base_url('index.php/GudangWIP/hasil_produksi'); ?>"> Hasil Produksi WIP 
            </a>
        </h5>
    </div>
</div>
<?php
        if( ($group_id==1)||($hak_akses['hasil_produksi']==1) ){
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
                <i class="fa fa-hourglass"></i> Hasil Produksi WIP 
                
            </div>
            <div class="tools">
            <?php
                if( ($group_id==1)||($hak_akses['add']==1) ){
            ?>
                <a style="height:28px" class="btn btn-circle btn-sm blue-ebonyclay" href="
                    <?=base_url('index.php/GudangWIP/proses_wip/'.$this->uri->segment(3));?>">
                    <i class="fa fa-plus"></i> Proses Barang WIP 
                </a>
            <?php } ?>
            </div>
        </div>
        <div class="portlet-body">
            <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                    <tr >
                        <th>No</th>
                        <th>No. Produksi</th>
                        <th>Tanggal</th>
                        <th>Jenis Barang WIP</th>
                        <th>Jenis Proses</th>
                        <th>Quantity</th>
                        <th>Berat</th>
                        <th>PIC</th>
                        <th>Action</th>
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
                            <?= $data->no_produksi_wip;?>
                        </td>
                        <td>
                            <?= $data->tanggal;?>
                        </td>
                        <td>
                            <?= $data->jenis_barang;?>
                        </td>
                        <td>
                            <?= $data->jenis_masak;?>
                        </td>
                        <td>
                            <?= $data->qty.' '.$data->uom; ?>
                        </td>
                        <td>
                            <?= $data->berat; ?>
                        </td>
                        <td>
                            <?= $data->pembuat;?>
                        </td>
                        <td>
                        <?php
                            if($data->id_bpb > 0){
                            echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/GudangWIP/print_bpb/'.$data->id_bpb.'" style="margin-bottom:4px" target="_blank">&nbsp;<i class="fa fa-print"></i> Print BPB &nbsp;</a>';
                            }
                            if($data->id_dtr){
                            echo '<a class="btn btn-circle btn-xs blue-ebonyclay" href="'.base_url().'index.php/Ingot/print_afkir/'.$data->id_dtr.'" target="_blank">&nbsp;<i class="fa fa-print"></i> Print AFKIR &nbsp;</a>';
                            }
                        ?>
                        </td>
                    </tr>
                    <?php } ?>
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
      