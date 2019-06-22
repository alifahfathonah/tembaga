<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Voucher</td>
                            <td>: <?php echo $header['no_voucher'];?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo $header['tanggal'];?></td>
                        </tr>
                        <tr>
                            <td>PIC</td>
                            <td>: <?php echo $header['pic']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Supplier</td>
                            <td>: <?php echo $header['nama_supplier'] ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="50%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po'];?></td>
                        </tr>
                        <tr>
                            <td>No. Pembayaran</td>
                            <td>: <?php echo $header['no_pembayaran'];?></td>
                        </tr>             
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $header['keterangan'];?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jenis Voucher</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jenis Barang</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Keterangan</strong></td>
                            <td rowspan="2" style="text-align:center; border:1px solid #000;"><strong>Amount (Rp)</strong></td>
                        </tr>
                       
                                <tr>
                                </tr>
                        <?php
                            $no = 0;
                            $total_vc = 0;
                            foreach ($list_data as $row){
                                $no++;
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->jenis_voucher;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->jenis_barang;?></td>
                            <td style="text-align:right; border-left:1px solid #000;"><?=$row->keterangan;?></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right: 1px solid #000;"><?=number_format($row->amount,2,',', '.');?></td>
                        </tr>
                        <?php
                                $total_vc += $row->amount;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right;" colspan="4"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?=number_format($total_vc,2,',', '.');?></strong>
                            </td>
                            <td style="border-left:1px solid #000;"></td>
                            <td style="text-align:right;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" width="100%">
                        <tr>
                            <td style="text-align:center">Mengetahui</td>
                            <td style="text-align:center">Disetujui</td>
                            <td style="text-align:center">Pembukuan</td>
                            <td style="text-align:center">Kassa/Keuangan</td>
                            <td style="text-align:center">Disetor / Diterima</td>
                        </tr>
                        <tr style="height:35">
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center">(_______________)</td>
                            <td style="text-align:center">(_______________)</td>
                            <td style="text-align:center">(_______________)</td>
                            <td style="text-align:center">(_______________)</td>
                            <td style="text-align:center">(_______________)</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
</html>
        