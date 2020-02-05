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
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">SURAT JALAN <?php echo $header['no_surat_jalan']; ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>TUAN/TOKO</td>
                            <td>: <?php echo 'SUMBER URIP ('.$header['nama_customer'].')'; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr><td colspan="2">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="2">Type Kendaraan: <?php echo $header['type_kendaraan']; ?></td>
                            <td>No. Kendaraan: <?php echo $header['no_kendaraan']; ?></td>
                            <td colspan="2">Kami ada kirim barang2 tersebut dibawah ini :</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Banyaknya</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>UOM</strong></td>
                            <td colspan="3" style="text-align:center; border:1px solid #000"><strong>N A M A &nbsp; B A R A N G</strong></td>
                        </tr>
                        <?php
                            $bruto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$row->jumlah.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->uom_ekspedisi.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td>'.number_format($row->netto,2,',','.').' KG</td>';
                                echo '<td style="text-align:right; border-right:1px solid #000">'.$header['no_po'].'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                            }
                        ?>
                        <tr style="height:80px">
                            <td style="text-align:center; border-left:1px solid #000; ">&nbsp;</td>
                            <td style="border-left:1px solid #000; ">&nbsp;</td>
                            <td colspan="3" style="border-left:1px solid #000; border-right:1px solid #000;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td align="left" colspan="3" style="border-left:1px solid #000; border-right:1px solid #000;border-bottom:1px solid #000">BRUTO <?=number_format($bruto,2,',','.').' KG';?></td>
                        </tr>
              
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td style="text-align:center">Tanda Terima</td>
                            <td style="text-align:center">Diperiksa</td>
                            <td style="text-align:center">Mengetahui</td>
                            <td style="text-align:center">Hormat Kami</td>
                        </tr>
                        <tr style="height:50px">
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <!-- <td style="text-align:center">&nbsp;</td> -->
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                        </tr>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center"><strong>(Tjan Lin Oy)</strong></td>
                            <td style="text-align:center"><strong>(Istadi)</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
	<body onLoad="window.print()">
    </body>
</html>
        