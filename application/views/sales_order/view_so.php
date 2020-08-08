<div class="row">
    <div class="col-md-12 alert-warning alert-dismissable">        
        <h5 style="color:navy">
            <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> Home </a> 
            <i class="fa fa-angle-right"></i> Gudang FG
            <i class="fa fa-angle-right"></i> 
            <a href="<?php echo base_url('index.php/SalesOrder/spb_list'); ?>"> View Surat Permintaan Barang (SPB)</a> 
        </h5>          
    </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">                            
    <div class="col-md-12">
        <h3 align="center"><b> View Sales Order</b></h3>
        <hr class="divider" />
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span id="message">&nbsp;</span>
                </div>
            </div>
        </div>
        <?php
            if( ($group_id==1)||($hak_akses['view_so']==1) ){
                $c = $header['currency'];
        ?> 
        <form class="eventInsForm" method="post" target="_self" name="formku" 
              id="formku">  
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            No. Sales Order<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_sales_order']; ?>">

                            <input type="hidden" id="id" name="id" value="<?php echo $header['id']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            No. SPB<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_spb_barang']; ?>">

                            <input type="hidden" id="id_spb" name="id_spb" value="<?php echo $header['no_spb']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal <font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['tanggal'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Jenis Barang
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="jenis_barang" name="jenis_barang" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?php echo $header['jenis_barang']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Keterangan
                        </div>
                        <div class="col-md-8">
                            <textarea id="keterangan" name="keterangan" rows="3" class="form-control myline" style="margin-bottom:5px" readonly="readonly"><?= $header['keterangan'];?></textarea>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>

                </div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            No. PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="no_spb" name="no_spb" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo $header['no_po']; ?>">

                            <input type="hidden" id="no_spb" name="no_spb" value="<?php echo $header['no_spb']; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Tanggal PO<font color="#f00">*</font>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="tanggal" name="tanggal" readonly="readonly"
                                class="form-control myline" style="margin-bottom:5px" 
                                value="<?php echo date('d-m-Y', strtotime($header['tgl_po'])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Customer
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="nama_customer" name="nama_customer" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?= (($this->session->userdata('user_ppn') == 1)? $header['nama_customer'] : $header['nama_customer_kh']) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Contact Person
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="cp_customer" name="cp_customer" 
                                class="form-control myline" style="margin-bottom:5px" readonly="readonly" 
                                value="<?= (($this->session->userdata('user_ppn') == 1)? $header['pic'] : $header['pic_kh']) ?>">
                        </div>
                    </div>
                </div>              
            </div>
            
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center"><strong>Detail Sales Order</strong></h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Nama Item</th>
                                            <th>UOM</th>
                                            <th>Jumlah</th>
                                            <th>Amount</th>
                                            <th>Total Amount</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total = 0;
                                        $jumlah = 0;
                                        $no=1; foreach ($details as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo '('.$row->kode.') '.$row->jenis_barang;?></td>
                                            <td><?php echo $row->uom;?></td>
                                            <td>
                                                <?php 
                                                    if($row->netto != 0){
                                                        echo $row->netto;
                                                    }else{
                                                        echo $row->qty;
                                                    }
                                                ?>    
                                            </td>
                                            <td><?php echo $c.' '.number_format($row->amount,3,',','.');?></td>
                                            <td><?php echo $c.' '.number_format($row->total_amount,2,',','.');?></td>
                                        </tr>
                                            <?php
                                                $no++;
                                                    if($row->netto != 0){
                                                    $jumlah += $row->netto;
                                                    }else{
                                                    $jumlah += $row->qty;
                                                    }
                                                $total += $row->total_amount;
                                            }//END LOOP FOREACH
                                        ?>
                                        </tbody>
                                        <tr>
                                            <td colspan="3" style="text-align: right; font-weight: bold;">Total Jumlah</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($jumlah,0,',','.');?></td>
                                            <td style="text-align: right; font-weight: bold;">Total Harga</td>
                                            <td style="background-color: green; color: white;"><?php echo $c.' '.number_format($total,2,',','.');?></td>
                                        </tr>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <?php if($header['jenis_barang'] == 'LAIN'){ ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center"><strong>Detail Surat Jalan</strong></h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Jenis Barang</th>
                                            <th>No Packing</th>
                                            <th>Bruto</th>
                                            <th>Netto</th>
                                            <th>Jumlah</th>
                                            <th>Nomor Bobbin</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $netto_sj=0;
                                        $no=1; foreach ($detailSJ as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo '('.$row->kode.') '.$row->jenis_barang;?></td>
                                            <td><?php 
                                            if($row->no_packing == 0){
                                                echo ' - ';
                                            }else{
                                                echo $row->no_packing;
                                            }
                                            ?>
                                            </td>
                                            <td><?php 
                                            if($row->bruto == 0){
                                                echo ' - ';
                                            }else{
                                                echo $row->bruto;
                                            }
                                            ?>
                                            </td>
                                            <td><?php echo $row->netto;?></td>
                                            <td><?php echo $row->qty;?></td>
                                            <td><?php 
                                            if(is_null($row->nomor_bobbin)){
                                                echo 'Tidak ada Nomor Bobbin';
                                            }else{
                                                echo $row->nomor_bobbin;
                                            }
                                            ?>
                                            </td>
                                            <td><?php echo $row->line_remarks;?></td>
                                        </tr>
                                        <?php
                                        $no++;
                                        $netto_sj += $row->netto;
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="5" style="text-align: right;"><strong>Total :</strong></td>
                                            <td style="background-color: green; color: white;"><?=number_format($netto_sj,2,',','.');?></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <?php }else if($header['jenis_barang'] == 'WIP' || $header['jenis_barang'] == 'AMPAS'){ ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center"><strong>Detail SPB Fullfilment</strong></h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Jenis Barang</th>
                                            <th>No Packing</th>
                                            <th>Bruto</th>
                                            <th>Berat</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total_berat=0;
                                        $no=1; foreach ($detailSPB as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo '('.$row->kode.') '.$row->nama_barang;?></td>
                                            <td><?php 
                                            if($row->no_packing == 0){
                                            echo ' - ';
                                            }else{
                                            echo $row->no_packing;
                                            }
                                            ?>
                                            </td>
                                            <td><?php 
                                            if($row->bruto == 0){
                                            echo ' -  ';
                                            }else{
                                            echo $row->bruto;
                                            }
                                            ?>
                                            </td>
                                            <td><?php echo $row->berat;?></td>
                                            <td><?php echo $row->qty?></td>
                                            <?php
                                            if($row->berat == 0){
                                                echo '<td style="background-color: red; color: white;">SPB Belum Dipenuhi</td>';
                                            }else{
                                                echo '<td>'.$row->keterangan.'</td>';
                                            }
                                            if($header['jenis_barang']=='FG'||$header['jenis_barang']=='WIP'){
                                            echo (($row->flag_taken==1)? '<td style="background-color: green; color: white">Sudah di Kirim</td>':'<td>Belum Dikirim</td>');
                                            }elseif($header['jenis_barang']=='RONGSOK'){
                                            echo (($row->so_id>0)?'<td style="background-color: green; color: white">Sudah di Kirim</td>':'<td>Belum Dikirim</td>');
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        $total_berat += $row->berat;
                                        $no++;
                                        }
                                        ?>
                                        </tbody>
                                        <tr>
                                            <td colspan="4" style="text-align: right; font-weight: bold;">Total Jumlah</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($total_berat,0,',','.');?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 align="center"><strong>Detail SPB Fullfilment</strong></h4>
                                <div class="table-scrollable">
                                    <table class="table table-bordered table-striped table-hover" id="tabel_pallete">
                                        <thead>
                                            <th style="width:40px">No</th>
                                            <th>Jenis Barang</th>
                                            <th>No Packing</th>
                                            <th>Bruto</th>
                                            <th>Berat</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total_berat=0;
                                        $total_sj=0;

                                        $last_series = null;
                                        $no=1; foreach ($detailSPB as $row) {
                                            if($last_series==null){
                                                echo '<tr>
                                                    <td colspan="8" style="border-left: 1px solid;">'.$row->no_surat_jalan.' | '.$row->tgl_sj.'</td>
                                                </tr>';
                                            }else if($last_series!=$row->no_surat_jalan){
                                                echo '<tr>
                                                    <td colspan="4" style="text-align: right; font-weight: bold;">Total Surat Jalan</td>
                                                    <td style="background-color: green; color: white;">'.number_format($total_sj,2,',','.').'</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="8" style="border-left: 1px solid;">'.$row->no_surat_jalan.' | '.$row->tgl_sj.'</td>
                                                </tr>';
                                                $no=1;
                                                $total_sj=0;
                                            } else {
                                                // echo '<td style="border-top: 1px solid;border-left: 1px solid;">'.$no.'</td>';
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo '('.$row->kode.') '.$row->nama_barang;?></td>
                                            <td><?php 
                                            if($row->no_packing == 0){
                                            echo ' - ';
                                            }else{
                                            echo $row->no_packing;
                                            }
                                            ?>
                                            </td>
                                            <td><?php 
                                            if($row->bruto == 0){
                                            echo ' -  ';
                                            }else{
                                            echo $row->bruto;
                                            }
                                            ?>
                                            </td>
                                            <td><?php echo $row->berat;?></td>
                                            <td><?php echo $row->qty?></td>
                                            <?php
                                            if($row->berat == 0){
                                                echo '<td style="background-color: red; color: white;">SPB Belum Dipenuhi</td>';
                                            }else{
                                                echo '<td>'.$row->keterangan.'</td>';
                                            }
                                            if($header['jenis_barang']=='FG'||$header['jenis_barang']=='WIP'){
                                            echo (($row->flag_taken==1)? '<td style="background-color: green; color: white">Sudah di Kirim</td>':'<td>Belum Dikirim</td>');
                                            }elseif($header['jenis_barang']=='RONGSOK'){
                                            echo (($row->so_id>0)?'<td style="background-color: green; color: white">Sudah di Kirim</td>':'<td>Belum Dikirim</td>');
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                        $last_series = $row->no_surat_jalan;
                                        $total_sj += $row->berat;
                                        $total_berat += $row->berat;
                                        $no++;
                                        }

                                                echo '<tr>
                                                    <td colspan="4" style="text-align: right; font-weight: bold;">Total Surat Jalan</td>
                                                    <td style="background-color: green; color: white;">'.number_format($total_sj,2,',','.').'</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>';
                                        ?>
                                        </tbody>
                                        <tr>
                                            <td colspan="4" style="text-align: right; font-weight: bold;">Total Jumlah</td>
                                            <td style="background-color: green; color: white;"><?php echo number_format($total_berat,2,',','.');?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <?php 
                                            $no=1; foreach ($total_so as $v) {
                                            echo '
                                                <tr>
                                                    <td colspan="4">'.$v->nama_barang.'</td>
                                                    <td>'.number_format($v->netto,2,',','.').'</td>
                                                    <td colspan="3"></td>
                                                </tr>';
                                            } ?>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        <a href="<?php echo base_url('index.php/SalesOrder'); ?>" class="btn blue-hoki"> 
                        <i class="fa fa-angle-left"></i> Kembali </a>
        <?php if($header['status_spb']!=1 || $header['flag_sj']!=1 || $header['flag_invoice']!=1){ ?>
        <a href="javascript:;" onclick="closeSO();" class="btn red"> 
                        <i class="fa fa-ban"></i> Close SO </a>
        <?php }else{ ?>
        <a href="javascript:;" onclick="openSO();" class="btn green"> 
                        <i class="fa fa-plus"></i> Open SO </a>
        <?php } if($header['flag_sj']==1){?>
        <a href="javascript:;" onclick="openSJ();" class="btn green"> 
                        <i class="fa fa-car"></i> Open Untuk Buat Surat Jalan </a>
        <?php } if($header['flag_invoice']==1){?>
        <a href="javascript:;" onclick="openINV();" class="btn green"> 
                        <i class="fa fa-money"></i> Open Untuk Buat Invoice </a>
        <?php } ?>
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
function closeSO(){
    var r=confirm("Anda yakin meng-close SO ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/SalesOrder/close_so");    
        $('#formku').submit(); 
    }
};

function openSO(){
    var r=confirm("Anda yakin meng-Open SO ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/SalesOrder/open_so");    
        $('#formku').submit(); 
    }
};

function openINV(){
    var r=confirm("Anda yakin meng-Open Invoice SO ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/SalesOrder/open_inv");    
        $('#formku').submit(); 
    }
};

function openSJ(){
    var r=confirm("Anda yakin meng-Open Surat Jalan SO ini?");
    if (r==true){
        $('#formku').attr("action", "<?php echo base_url(); ?>index.php/SalesOrder/open_sj");    
        $('#formku').submit(); 
    }
};
</script>
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>