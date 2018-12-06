<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Sparepart
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/BeliSparePart/laporan_list'); ?>"> List Laporan Sparepart </a> 
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
        <h3 align="center"><b> Detail Kuantitas dan Stok Sparepart <?php echo "<i>".date('F', strtotime("$tahun-$bulan-01"))." ".$tahun."</i>";?></b></h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span id="message">&nbsp;</span>
                    </div>
                </div>
            </div>
        <?php
            if( ($group_id==1)||($hak_akses['view_spb']==1) ){
        ?>            
            <div class="col-md-12" style="margin-top: 10px;"> 
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cubes"></i> Laporan Stok SparePart
                        </div>
                    </div> 
                    <div class="portlet-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
                        <thead>
                            <th style="width:40px">No</th>
                            <th>Nama Item</th>
                            <th>Jumlah Item</th>
                            <th>Bruto Masuk</th>
                            <th>Netto Masuk</th>
                            <th>Bruto Keluar</th>
                            <th>Netto Keluar</th>
                            <th>Stok Akhir Bruto</th>
                            <th>Stok Akhir Netto</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <?php $no=1;
                if(isset($reg)) { foreach ($reg as $data){ ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?= $data['nama_produk'] ;?></td>
                        <td><?= $data['jumlah'] ;?></td>
                        <td><?= $data['bruto_masuk'] ;?></td>
                        <td><?= $data['netto_masuk'] ;?></td>
                        <td><?= $data['bruto_keluar'] ;?></td>
                        <td><?= $data['netto_keluar'] ;?></td>
                        <td style="background-color: turquoise;"><?= ($data['bruto_masuk_b'] - $data['bruto_keluar_b']) ;?></td>
                        <td style="background-color: turquoise;"><?= ($data['netto_masuk_b'] - $data['netto_keluar_b']) ;?></td>
                        <td><?php
                        if($group_id==1 || $hak_akses['view_spb']==1){
                        ?>
                            <a class="btn btn-circle btn-xs red" href="<?php echo base_url(); ?>index.php/BeliSparePart/view_detail_laporan/<?php echo $data['tanggal'].'/'.$data['id'];?>" style="margin-bottom:4px"> &nbsp; <i class="fa fa-file-text-o"></i> Detail &nbsp; </a>
                        <?php
                            }//if group
                            $no++;
                        }//foreach
                    echo '</tr>';
                    }//if ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url('index.php/BeliSparePart/laporan_list'); ?>" class="btn blue-hoki"> 
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