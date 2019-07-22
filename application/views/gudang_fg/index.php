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
                <?php echo base_url('index.php/GudangFG/'); ?>"> Gudang  Finish Good 
            </a>
        </h5>
    </div>
</div>
    <?php
        if( ($group_id==1 || $group_id==21)||($hak_akses['index']==1) ){
    ?>
<div class="row">&nbsp;</div>
<div class="col-md-12" style="margin-top: 10px;">
    <div class="portlet box yellow-gold">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cubes"></i> Gudang Finish Good 
                
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                    <tr >
                        <th>No</th>
                        <th>Jenis Barang</th>
                        <th>Jumlah Packing</th>
                        <th>Stok Bruto</th>
                        <th>Stok Netto</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; 
                        foreach($list_data as $data) { 
                    ?>
                    <tr>
                        <td>
                            <?= $no; ?>
                        </td>
                        <td>
                            <?= $data->jenis_barang?>
                        </td>
                        <td>
                            <?= $data->total_qty ?>
                        </td>
                        <td>
                            <?= number_format($data->total_bruto,2,',','.') ?>
                        </td>
                        <td style="background-color: green; color: white;">
                            <?= number_format($data->total_netto,2,',','.') ?>
                        </td>
                        <td><a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/GudangFG/view_gudang_fg/<?php echo $data->jenis_barang_id; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                        </td>
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
      