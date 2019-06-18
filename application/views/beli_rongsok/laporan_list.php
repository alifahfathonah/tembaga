<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Laporan Rongsok
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/GudangRongsok/laporan_list'); ?>"> List Laporan Rongsok </a> 
        </h5>          
    </div>
</div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success <?php echo (empty($this->session->flashdata('flash_msg'))? "display-hide": ""); ?>" id="box_msg_sukses">
                <button class="close" data-close="alert"></button>
                <span id="msg_sukses"><?php echo $this->session->flashdata('flash_msg'); ?></span>
            </div>
        </div>
    </div>
  
   <div class="col-md-12" style="margin-top: 10px;"> 
        <div class="portlet box yellow-gold">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cubes"></i> Laporan Beli Rongsok
                </div>                            
            </div> 
           <div class="portlet-body"> 
               <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
                <thead>
                   <tr >
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jumlah <br>Item</th>
                        <th>Stok Bruto <br>Sebelum</th>
                        <th>Stok Netto <br>Sebelum</th>
                        <th>Bruto <br>Masuk</th>
                        <th>Netto <br>Masuk</th>
                        <th>Bruto <br>Keluar</th>
                        <th>Netto <br>Keluar</th>
                        <th>Stok Bruto <br>Akhir</th>
                        <th>Stok Netto <br>Akhir</th>
                        <th>Keterangan</th>
                   </tr>
                 </thead>
                 <tbody>
                <?php $no=0;
                $arr = array();
                $arr['bruto_awal'][$no]=0;
                $arr['netto_awal'][$no]=0;
                if(isset($reg)) { foreach ($reg as $data){ 
                    ?>
                    <tr>
                        <td></td>
                        <td><?= $data['showdate'] ;?></td>
                        <td><?= $data['jumlah'] ;?></td>
                        <td style="background-color: powderblue;"><?=number_format($arr['bruto_awal'][$no], 2, '.', ',');?></td>
                        <td style="background-color: powderblue;"><?=number_format($arr['netto_awal'][$no], 2, '.', ',');?></td>
                        <td><?= number_format($data['bruto_masuk'], 2, '.', ',') ;?></td>
                        <td><?= number_format($data['netto_masuk'], 2, '.', ',') ;?></td>
                        <td><?= number_format($data['bruto_keluar'], 2, '.', ',') ;?></td>
                        <td><?= number_format($data['netto_keluar'], 2, '.', ',') ;?></td>
                        <?php 
                        $bruto_akhir = $arr['bruto_awal'][$no] + ($data['bruto_masuk'] - $data['bruto_keluar']);
                        $netto_akhir = $arr['netto_awal'][$no] + ($data['netto_masuk'] - $data['netto_keluar']);
                        ?>
                        <td style="background-color: turquoise;"><?=number_format($bruto_akhir, 2, '.', ',') ;?></td>
                        <td style="background-color: turquoise;"><?=number_format($netto_akhir, 2, '.', ',') ;?></td>
                        <td><?php
                        if($group_id==1 || $hak_akses['view_laporan']==1){
                        ?>
                            <a class="btn btn-circle btn-xs blue" href="<?php echo base_url(); ?>index.php/GudangRongsok/view_laporan/<?php echo $data['tanggal']; ?>" style="margin-bottom:4px"> &nbsp; <i class="fa  fa-file-text-o"></i> View &nbsp; </a>
                            <a class="btn btn-circle btn-xs blue-ebonyclay" href="<?php echo base_url(); ?>index.php/GudangRongsok/print_laporan_bulanan/<?php echo $data['tanggal']; ?>" style="margin-bottom:4px" target="_blank"> &nbsp; <i class="fa  fa-print"></i> Print &nbsp; </a>
                        <?php
                            }//if group
                            $no++;
                        $arr['bruto_awal'][$no] = $bruto_akhir;
                        $arr['netto_awal'][$no] = $netto_akhir;
                        }//foreach
                    echo '</tr>';
                    }//if ?>
                </tbody>   
                </table>
            </div>
        </div>
    </div>
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