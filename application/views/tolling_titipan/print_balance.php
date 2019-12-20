<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWAT MAS PRAKASA<br>'; }?>TOLLING <?=(($header['jenis']=='SO')? $header['nama_customer']:$header['nama_supplier']).' DAN KMP'?></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
            <?php if($header['jenis']=='SO'){ ?>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Sales Order</td>
                            <td>:</td>
                            <td><?php echo $header['no_sales_order'];?></td>
                        </tr>
                        <tr>
                            <td valign="top">Tanggal</td>
                            <td>:</td>
                            <td><?php echo tanggal_indo($header['tanggal']);?></td>
                        </tr>
                    </table>
                </td>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Nama Customer</td>
                            <td>:</td>
                            <td><?=$header['nama_customer'];?></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>:</td>
                            <td><?php echo $header['keterangan'];?></td>
                        </tr>
                    </table>
                </td>
            <?php }else{ ?>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. PO</td>
                            <td>:</td>
                            <td><?php echo $header['no_po'];?></td>
                        </tr>
                        <tr>
                            <td valign="top">Tanggal</td>
                            <td>:</td>
                            <td><?php echo tanggal_indo($header['tanggal']);?></td>
                        </tr>
                    </table>
                </td>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Nama Supplier</td>
                            <td>:</td>
                            <td><?=$header['nama_supplier'];?></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>:</td>
                            <td><?php echo $header['remarks'];?></td>
                        </tr>
                    </table>
                </td>
            <?php } ?>
            </tr>
            <tr><td colspan="3"><hr></td></tr>
            <tr><td colspan="3" align="center"><h3><?=($header['jenis']=='SO')? 'Detail Bahan Diterima':'Detail Kirim Bahan';?></h3></td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size: 14px;">
                        <tr>
                            <td width="10%" rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td width="45%" rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Penerimaan</strong></td>
                            <!-- <td width="15%" rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat</strong></td>
                            <td width="35%" rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Keterangan</strong></td> -->
                            <td width="45%" rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Netto</strong></td>                        
                        </tr>
                       
                                <tr>
                                </tr>
                        <?php
                            $no = 1;
                            $total = 0;
                            foreach ($details_bahan as $row){
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->nomor;?></td>
                            <!-- <td style="border-left:1px solid #000;">&nbsp;</td>
                            <td style="border-left:1px solid #000;"><?=$row->netto;?></td> -->
                            <td style="text-align:right; border-left:1px solid #000; border-right: 1px solid #000;"><?=number_format($row->netto,2,',', '.');?></td>
                        </tr>
                        <?php
                                $total += $row->netto;
                                $no++;
                            }
                        ?>
                        <tr style="height:50px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <!-- <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td> -->
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;" colspan="2"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right: 1px solid #000;">
                                <strong><?=number_format($total,2,',', '.');?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3"><hr class="divider"></td>
            </tr>
        <?php 
            if(empty($details_kirim)){
                echo '<tr colspan="3"><td> Belum ada Pengiriman </td></tr>';
            }else{
                ?>
            <tr><td colspan="3" align="center"><h3>Detail <?=($header['jenis']=='SO')? 'Kirim':'Terima';?></h3></td></tr>
            <tr>
                <td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size: 14px;">
                        <tr>
                            <td width="10%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td width="45%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Surat Jalan</strong></td>
                            <!-- <td width="15%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Account</strong></td>
                            <td width="35%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Customer</strong></td> -->
                            <td width="45%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Netto</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $nominal = 0;
                            foreach ($details_kirim as $row){
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td style="text-align:left; border-left:1px solid #000;"><?=$row->nomor;?></td>
                            <!-- <td style="border-left:1px solid #000;">&nbsp;</td>
                            <td style="text-align:left; border-left:1px solid #000;"><?=$row->keterangan;?></td> -->
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000;"><?=number_format($row->netto,2,',','.');?></td>
                        </tr>
                        <?php $nominal += $row->netto; $no++; } ?>
                        <tr style="height:50px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <!-- <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td> -->
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000;"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"><strong><?=number_format($nominal,2,',','.');?></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size: 14px;">
                        <td colspan="2" style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong><?=($header['jenis']=='SO')? 'Sisa Belum di Kirim' : 'Sisai Belum di Terima';?></strong></td>
                        <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"><strong><?=number_format($total-$nominal,2,',','.');?></strong></td>
                    </table>
                </td>
            </tr>
        <?php } ?>
            <!-- <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" width="100%">
                        <tr>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center">Dibuat Oleh</td>
                        </tr>
                        <tr style="height:35">
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"></td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center"></td>
                        </tr>
                    </table>
                </td>
            </tr> -->
        </table>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
</html>