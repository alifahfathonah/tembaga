<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h4 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang Rongsok 
            <i class="fa fa-angle-right"></i>
            <a href="<?php echo base_url('index.php/GudangRongsok/gudang_rongsok'); ?>"> Edit Gudang Rongsok</a>
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
              id="formku" action="<?php echo base_url('index.php/GudangRongsok/update_gudang_rongsok'); ?>">
            <input type="hidden" name="rongsok_id" value="<?=$this->uri->segment(3);?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-striped table-hover" id="tabel_dtr">
                            <thead>
                                <tr>
                                    <th style="width:40px" rowspan="2">No</th>
                                    <th>Nama Barang</th>
                                    <th>Supplier/Customer</th>
                                    <th style="border-bottom: 1px solid lightgrey;">No Palette</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Bruto</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Berat</th>
                                    <th style="border-bottom: 1px solid lightgrey;">Netto</th>
                                    <th>Nomor Seng</th>
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
                                    <td><?= $row->nama_item ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->no_pallete ?></td>
                                    <td align="right"><?= number_format($row->bruto,2,'.',',') ?></td>
                                    <td align="right"><?= number_format($row->berat_palette,2,'.',',') ?></td>
                                    <td align="right"><?= number_format($row->netto,2,'.',',') ?></td>
                                    <td><input type="text" class="form-control myline" name="myDetails[<?=$no;?>][nomor_seng]" value="<?=$row->nomor_seng;?>" placeholder="Silahkan isi Nomor Seng..."></td>
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
                    <a href="<?php echo base_url('index.php/GudangRongsok/gudang_rongsok'); ?>" class="btn blue-hoki"> 
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