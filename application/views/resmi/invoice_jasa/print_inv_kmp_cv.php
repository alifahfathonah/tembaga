<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;" style="margin-top: 75px;">
        <p>&nbsp;</p>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td><h3>Pengusaha Kena Pajak</h3></td>
            </tr>
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="1" width="100%">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td> PT. KAWAT MAS PRAKASA</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td> Jl. Halim Perdana Kusuma No. 51 Kec. Batu Ceper, Tangerang</td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>:</td>
                            <td> 01.146.699.2.4 16.000</td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Invoice</td>
                            <td>: <?php echo $header['no_invoice_jasa'];?></td>
                        </tr>
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['no_sj_resmi'];?></td>
                        </tr>
                    </table>
                </td>
            </tr>
                <tr>
                    <td colspan="3" style="border-bottom:1px solid #000; border-top:1px solid #000; text-align: center;"><h3>FAKTUR PENJUALAN</h3></td>
                </tr>
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="3">PEMBELI / PENERIMA JASA</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td> <?php echo $header['nama_cv']?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td> <?php echo $header['alamat_cv'];?></td>
                        </tr>
                        <tr>
                            <td>NPWP</td>
                            <td>:</td>
                            <td> <?php echo $header['npwp'];?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Syarat Pembayaran</td>
                            <td>: <?php echo $header['term_of_payment'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Jatuh Tempo</td>
                            <td>: <?php echo tanggal_indo($header['jatuh_tempo']);?></td>
                        </tr>             
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po2'];?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td colspan="4" rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Item</strong></td>
                            <td rowspan="2"  style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Qty</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Netto</strong></td>
                            <td rowspan="2" colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Harga</strong></td>
                            <td rowspan="2" colspan="2" style="text-align:center; border:1px solid #000"><strong>Total Harga</strong></td>
                        </tr>
                                <tr>
                                </tr>
                        <?php
                            $c = "Rp";
                            $no = 1;
                            $total = 0;
                            $total_netto = 0;
                            $harga_ppn = 0;
                            foreach ($myDetail as $row){
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td colspan="4" style="border-left:1px solid #000;"><?=$row->jenis_barang;?></td>
                            <td style="text-align:right; border-left:1px solid #000;"><?=$row->qty;?></td>
                            <td style="text-align:right; border-left:1px solid #000;"><?=number_format($row->sum_netto,2,',','.').' '.$row->uom;?></td>
                            <td style="border-left:1px solid #000;"><?=$c;?></td>
                            <td style="text-align:right;"><?=number_format($row->amount,2,',', '.');?></td>
                            <td style="border-left:1px solid #000;"><?=$c;?></td>
                            <td style="text-align:right; border-right:1px solid #000;"><?=number_format($row->total_amount,2,',', '.');?></td>
                        </tr>
                        <?php
                                $total_netto += $row->sum_netto;
                                $total += $row->total_amount;
                                $no++;
                            }
                            $harga_ppn = ($total-$header['diskon']-$header['cost']) * 10/100;
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td colspan="3" style="border-bottom: 1px solid #000;"></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td colspan="2" style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Jumlah Harga Jual</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000"><?=$c;?></td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($total,0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Dikurangi Potongan Harga</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000"><?=$c;?></td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($header['diskon'],0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Lain Lain</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000"><?=$c;?></td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($header['cost'],0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Dasar Pengenaan Pajak</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000"><?=$c;?></td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($total-$header['diskon']-$header['cost'],0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>PPN = 10% x Dasar Pengenaan Pajak</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000"><?=$c;?></td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($harga_ppn,0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Materai</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000"><?=$c;?></td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($header['materai'],0,',', '.');?></td>
                        </tr>
                        <?php $total_bersih = $total-$header['diskon']-$header['cost']+$header['materai']+$harga_ppn;?>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>T O T A L</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000"><?=$c;?></td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($total_bersih,0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-left: 1px solid #000;">Terbilang</td>
                            <td>:</td>
                            <td colspan="5" rowspan="3" style="vertical-align: top">** <?php echo ucwords(number_to_words_d($total_bersih, $c)); ?> **</td>
                            <td colspan="3"  style="border-right: 1px solid #000;">Tangerang, <?=tanggal_indo($header['tanggal']);?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-left: 1px solid #000;"></td>
                            <td></td>
                            <td colspan="3"  style="border-right: 1px solid #000;"></td>
                        </tr>
                        <tr>
                            <td colspan="11" style="height: 75px; border-right:1px solid #000; border-left:1px solid #000;"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-left: 1px solid #000;"></td>
                            <td colspan="3">Transfer Ke :</td>
                            <td colspan="4" style="border-right: 1px solid #000;"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-left: 1px solid #000;">Perhatian</td>
                            <td>:</td>
                            <td width="30%" rowspan="2" style="border-bottom: 1px solid #000;">Pembayaran dengan Cheque/Giro baru dapat dianggap sah, apabila Cheque/Giro tsb, sudah diuangkan</td>
                            <td colspan="3" rowspan="2" style="border-bottom: 1px solid #000;">Nama:PT. KAWAT MAS PRAKASA <br>
                            ACC: <?= $header['nomor_rekening'] ?><br>
                            BANK <?= $header['kode_bank'] ?><br>
                            <?= $header['kantor_cabang'] ?>
                            </td>
                            <td colspan="4" style="border-right: 1px solid #000;"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"></td>
                            <td colspan="4" style="text-align: center; border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                <strong style="text-decoration: underline;"><?= $header['nama_direktur'] ?></strong><br>
                                <span>Direktur</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
</html>
        
        
