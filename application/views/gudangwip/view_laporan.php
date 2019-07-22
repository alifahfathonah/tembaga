<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang WIP
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangWIP/laporan_list'); ?>"> List Laporan WIP</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">
    <?php
        $tahun = $tgl['tahun'];
        $bulan = $tgl['bulan'];
    ?>
    <div class="col-md-12">
        <h3 align="center"><b> Detail Kuantitas dan Stok WIP <?php echo "<i>".date('F', strtotime("$tahun-$bulan-01"))." ".$tahun."</i>";?></b></h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span id="message">&nbsp;</span>
                    </div>
                </div>
            </div>
        <?php
            if( ($group_id==1 || $group_id==21)||($hak_akses['view_spb']==1) ){
        ?>            
            <div class="col-md-12" style="margin-top: 10px;"> 
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cubes"></i> Laporan Stok WIP
                        </div>
                    </div> 
                    <div class="portlet-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
                        <thead>
                            <th style="width:40px">No</th>
                            <th>Nama Item</th>
                            <th>Jumlah Item</th>
                            <th>Qty Masuk</th>
                            <th>Bruto Masuk</th>
                            <th>Qty Keluar</th>
                            <th>Bruto Keluar</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $total_m = 0;
                        $total_k = 0;
                        foreach ($detailLaporan as $row){
                            echo '<tr>';
                            echo '<td style="text-align:center">'.$no.'</td>';
                            echo '<td>'.$row->jenis_barang.'</td>';
                            echo '<td>'.$row->jumlah.'</td>';
                            echo '<td>'.number_format($row->qty_masuk, 2, '.', ',').'</td>';
                            echo '<td>'.number_format($row->berat_masuk, 2, '.', ',').'</td>';
                            echo '<td>'.number_format($row->qty_keluar, 2, '.', ',').'</td>';
                            echo '<td>'.number_format($row->berat_keluar, 2, '.', ',').'</td>';
                            $no++;
                        ?>
                        <td><?php
                        if($group_id==1 || $group_id==21 || $hak_akses['view_spb']==1){
                        ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/GudangWIP/view_detail_laporan/<?php echo $tahun.$bulan.'/'.$row->jenis_barang_id;?>" style="margin-bottom:4px"> &nbsp; <i class="fa fa-file-text-o"></i> Detail &nbsp; </a>
                        <?php
                            }
                        echo '</td>';
                        }
                        ?>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('index.php/GudangWIP/laporan_list'); ?>" class="btn blue-hoki"> 
            <i class="fa fa-angle-left"></i> Kembali </a>
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
<script>

</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>