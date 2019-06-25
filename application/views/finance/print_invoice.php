<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <?php if($header['currency']=='IDR'){
        $c='Rp ';
    }else{
        $c='$ ';
    }?>
    <body class="margin-left:40px;">
        <h2 style="text-align: center; text-decoration: underline;">I N V O I C E</h2>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="50%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Invoice</td>
                            <td>: <?php echo $header['no_invoice'];?></td>
                        </tr>
                        <!-- <tr>
                            <td>No. Sales Order</td>
                            <td>: <?php echo $header['no_sales_order'];?></td>
                        </tr> -->
                        <tr>
                            <td>Customer</td>
                            <td>: <?php echo $header['nama_customer'];?></td>
                        </tr>
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['no_surat_jalan'];?></td>
                        </tr>
                        <!-- <tr>
                            <td valign="top">Sejumlah</td>
                            <td>:**<?php echo ucwords(number_to_words_d($total, $header['currency'])); ?>**</td>
                        </tr> -->
                    </table>
                </td>
                <td width="50%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td width="40%">Syarat Pembayaran</td>
                            <td>: <?php echo $header['term_of_payment'];?></td>
                        </tr>
                        <tr>
                            <td width="40%">Tgl Jatuh Tempo</td>
                            <td>: <?php echo tanggal_indo($header['tgl_jatuh_tempo']);?></td>
                        </tr>             
                        <tr>
                            <td width="40%">No. PO</td>
                            <td>: <?php echo $header['no_po'];?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Barang</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Netto</strong></td>
                            <td width="20%" rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong><?='('.$header['currency'].') ';?>Harga Satuan</strong></td>
                            <td width="30%" rowspan="2" style="text-align:center; border:1px solid #000"><strong><?='('.$header['currency'].') ';?>Harga Jual</strong></td>
                        </tr>
                       
                                <tr>
                                </tr>
                        <?php
                            $no = 1;
                            $total = 0;
                            $total_netto = 0;
                            if($header['flag_tolling'] > 0){
                                $ok = '(Ongkos Kerja)';
                            }else{
                                $ok = '';
                            }
                            foreach ($details as $row){
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->jenis_barang.$ok;?></td>
                            <td style="text-align:right; border-left:1px solid #000;"><?= number_format($row->netto,2,',','.').' '.$row->uom;?></td>
                            <td style="text-align:right; border-left:1px solid #000;">
                                <table width="100%">
                                    <tr>
                                        <td><?= $c ?></td>
                                        <td align="right"><?= number_format($row->harga,2,',', '.');?></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000;">
                                <table width="100%">
                                    <tr>
                                        <td><?= $c ?></td>
                                        <td align="right"><?= number_format($row->total_harga,2,',', '.');?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <?php
                                $total_netto += $row->netto;
                                $total += $row->total_harga;
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left: 1PX solid #000; border-bottom: 1px solid #000;" colspan="4"><strong>Jumlah Harga Jual</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <table width="100%">
                                    <tr>
                                        <td><strong><?= $c ?></strong></td>
                                        <td align="right"><strong><?= number_format($total,2,',', '.');?></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="border-left:1px solid #000;"></td>
                            <td style="text-align:right;"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left: 1PX solid #000; border-bottom: 1px solid #000;" colspan="4"><strong>Dikurangi Potongan Harga</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <table width="100%">
                                    <tr>
                                        <td><strong><?=$c?></strong></td>
                                        <td align="right"><strong><?= number_format($header['diskon'],2,',', '.');?></strong></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="border-left:1px solid #000;"></td>
                            <td style="text-align:right;"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left: 1PX solid #000; border-bottom: 1px solid #000;" colspan="4"><strong>Uang muka yang diterima</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <table width="100%">
                                    <tr>
                                        <td><strong><?=$c?></strong></td>
                                        <td align="right"><strong>0,00</strong></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="border-left:1px solid #000;"></td>
                            <td style="text-align:right;"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left: 1PX solid #000; border-bottom: 1px solid #000;" colspan="4"><strong>T o t a l</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <table width="100%">
                                    <tr>
                                        <td><strong><?=$c;?></strong></td>
                                        <td align="right"><strong><?=number_format($total,2,',', '.');?></strong></td>
                                    </tr>
                                </table>
                            </td>
                            <td style="border-left:1px solid #000;"></td>
                            <td style="text-align:right;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="0" width="100%">
                        <tr>
                            <td style="text-align:center" width="10%">Terbilang :</td>
                            <td style="text-align:left" colspan="2">**<?php echo ucwords(number_to_words_d($total, $header['currency'])); ?>**</td>
                            <td style="text-align:center" width="35%">Tangerang,<?php echo tanggal_indo($header['tanggal']);?></td>
                        </tr>
                        <tr style="height:35">
                            <td style="text-align:center" width="10%">Catatan :</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:right;">&nbsp;</td>
                            <td style="text-align:right;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:left; padding-left: 15px;" colspan="2">Pembayaran dengan Cheque/Giro dianggap lunas Setelah Cheque/Giro tersebut diuangkan / diterima dananya</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
</html>
        