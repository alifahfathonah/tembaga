<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
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
                            <td> Jl. Halim Perdana Kusuma No. 51 Kec. Batu Ceper, Tanggerang</td>
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
                            <td>: <?php echo $header['no_invoice'];?></td>
                        </tr>
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['no_surat_jalan'];?></td>
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
                            <td> <?php echo $header['alias'];?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td> <?php echo $header['alamat'];?></td>
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
                            <td>: Tunai</td>
                        </tr>
                        <tr>
                            <td>Tanggal Jatuh Tempo</td>
                            <td>: <?php echo tanggal_indo($header['tgl_jatuh_tempo']);?></td>
                        </tr>             
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po'];?></td>
                        </tr>
                        <tr>
                            <td>Pajak</td>
                            <td>: <?php echo $header['flag_ppn']==1 ? "PPN" : "NON-PPN" ?></td>
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
                            $no = 1;
                            $total = 0;
                            $total_netto = 0;
                            $harga_ppn = 0;
                            foreach ($details as $row){
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td colspan="4" style="border-left:1px solid #000;"><?=$row->jenis_barang;?></td>
                            <td style="text-align:right; border-left:1px solid #000;"><?=$row->qty;?></td>
                            <td style="text-align:right; border-left:1px solid #000;"><?=$row->netto.' '.$row->uom;?></td>
                            <td style="border-left:1px solid #000;">Rp.</td>
                            <td style="text-align:right;"><?=number_format($row->harga,0,',', '.');?></td>
                            <td style="border-left:1px solid #000;">Rp.</td>
                            <td style="text-align:right; border-right:1px solid #000;"><?=number_format($row->total_harga,0,',', '.');?></td>
                        </tr>
                        <?php
                                $total_netto += $row->netto;
                                $total += $row->total_harga;
                                $no++;
                            }
                        if($header['flag_ppn']==1){
                            $harga_ppn = ($total+$header['diskon']) * 10/100;
                        }
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
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">Rp.</td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($total,0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Dikurangi Potongan Harga</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">Rp.</td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($header['diskon'],0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Lain Lain</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">Rp.</td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($header['add_cost'],0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Dasar Pengenaan Pajak</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">Rp.</td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($total-$header['diskon'],0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>PPN = 10% x Dasar Pengenaan Pajak</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">Rp.</td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($harga_ppn,0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>Materai</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">Rp.</td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($header['materai'],0,',', '.');?></td>
                        </tr>
                        <?php $total_bersih = $total-$header['diskon']-$header['add_cost']+$header['materai']+$harga_ppn;?>
                        <tr>
                            <td style="text-align:left; border-left:1px solid #000; border-bottom:1px solid #000" colspan="9"><strong>T O T A L</strong></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">Rp.</td>
                            <td style="text-align:right; border-right:1px solid #000; border-bottom:1px solid #000"><?=number_format($total_bersih,0,',', '.');?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-left: 1px solid #000;">Terbilang</td>
                            <td>:</td>
                            <td colspan="5" rowspan="2">** <?php echo ucwords(number_to_words($total)); ?> **</td>
                            <td colspan="3"  style="border-right: 1px solid #000;">Tanggerang, <? =tanggal_indo($header['tanggal']);?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-left: 1px solid #000;"></td>
                            <td></td>
                            <td colspan="3"  style="border-right: 1px solid #000;"></td>
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
                            ACC: <?=$header['nomor_rekening'];?><br>
                            BANK <?=$header['kode_bank'];?><br>
                            </td>
                            <td colspan="4" style="border-right: 1px solid #000;"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"></td>
                            <td colspan="4" style="text-align: center; border-bottom: 1px solid #000; border-right: 1px solid #000;">
                                <strong style="text-decoration: underline;"><?php echo '('.$header['nama_direktur'].')';?></strong><br>
                                <span>Direktur</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
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
                            <td style="text-align:center"><?=$header['realname'];?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"></td>
                            <td style="text-align:center">&nbsp;</td>
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
        