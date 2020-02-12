<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Rongsok 
            <i class="fa fa-angle-right"></i>
            <a href="<?php echo base_url('index.php/GudangRongsok/'); ?>"> Edit Laporan Bulanan</a>
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
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku" action="<?php echo base_url('index.php/GudangRongsok/update_laporan'); ?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" 
                                class="form-control myline input-small" style="margin-bottom:5px;float:left;" 
                                value="<?=$this->uri->segment(3);?>" readonly>
                        </div>
                    </div>
                </div>             
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <tr>
                                    <th style="width:40px" rowspan="2">No</th>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Stok Awal</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Netto Masuk</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Netto Keluar</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Stok Akhir</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Stok Fisik</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Koreksi Timbang</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="boxDetail">
                                <?php 
                                    $no = 0;
                                    foreach ($detailLaporan as $row) {
                                        $no++;
                                ?>
                                <tr>
                                    <input type="hidden" name="myDetails[<?=$no;?>][id]" value="<?=$row->id;?>">
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode ?></td>
                                    <td><?= $row->jenis_barang ?></td>
                                    <td align="right"><?= number_format($row->stok_awal,2,'.',',') ?></td>
                                    <td align="right"><?= number_format($row->netto_masuk,2,'.',',') ?></td>
                                    <td align="right"><?= number_format($row->netto_keluar,2,'.',',') ?></td>
                                    <td align="right"><?= number_format($row->stok_akhir,2,'.',',') ?></td>
                                    <td><input type="text" class="form-control myline" name="myDetails[<?=$no;?>][netto]" value="<?=number_format($row->stok_fisik,2,'.','');?>" placeholder="Silahkan isi Stok Fisik..."></td>
                                    <td><input type="text" class="form-control myline" name="myDetails[<?=$no;?>][koreksi_timbang]" value="<?=number_format($row->koreksi_timbang,2,'.','');?>" placeholder="Silahkan isi Stok Fisik..."></td>
                                    <td><input type="text" class="form-control myline" name="myDetails[<?=$no;?>][keterangan]" value="<?=$row->keterangan;?>" placeholder="Silahkan isi Keterangan..."></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url('index.php/GudangRongsok/laporan_list'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
                    <a href="javascript:;" class="btn green" id="simpanData" onclick="simpanData();"> 
                        <i class="fa fa-floppy-o"></i> Save </a>
                </div>    
            </div>
        </form>
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
<script type="text/javascript">
function simpanData(){
    $('#simpanData').text('Please Wait ...').prop("onclick", null).off("click");
    $('#formku').submit();
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>