<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;">PT. KAWATMAS PRAKASA<br>TANDA TERIMA RONGSOK (TTR)</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Supplier</td>
                            <td>: <?php echo $header['nama_supplier']; ?></td>
                        </tr>
                        <tr>
                            <td>No. TTR</td>
                            <td>: <?php echo $header['no_ttr']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>                        
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $header['remarks']; ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal PO</td>
                            <td>: <?php echo tanggal_indo($header['tanggal_po']); ?></td>
                        </tr>
                        <tr>
                            <td>No. Reff/ DTR</td>
                            <td>: <?php echo $header['no_dtr']; ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Item</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>UOM</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jumlah</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Bruto (Kg)</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Netto (Kg)</strong></td>
                            
                            <td style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $bruto = 0;
                            $netto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->nama_item.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->uom.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->qty,0,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->bruto, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->netto, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                $netto += $row->netto;
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>    
                        <tr>
                            <td colspan="4" style="text-align:right"><strong>Total (Kg) </strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($bruto, 2, '.', ','); ?></strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($netto, 2, '.', ','); ?></strong></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td width="400px" style="text-align:center">Diterima Oleh </td>
                            <td>Jumlah Pengepakan</td>
                            <td>:</td>
                            <td style="text-align:right"><?php echo number_format($header['jmlh_pengepakan'],2,'.',','); ?></td>
                        </tr>
                        <tr>
                            <td width="400px" style="text-align:center"></td>
                            <td>Jumlah Afkiran</td>
                            <td>:</td>
                            <td style="text-align:right"><?php echo number_format($header['jmlh_afkiran'],2,'.',','); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><?php echo $header['approved_name']; ?></td>
                            <td>Jumlah Lain-lain</td>
                            <td>:</td>
                            <td style="text-align:right"><?php echo number_format($header['jmlh_lain'],2,'.',','); ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
	<body onLoad="window.print()">
    </body>
</html>
        