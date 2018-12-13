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
                            <td>No. BPB Ampas</td>
                            <td>: <?php echo $header['no_bpb']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo date('d-m-Y', strtotime($header['created'])); ?></td>
                        </tr>
                        <tr>
                            <td>PIC</td>
                            <td>: <?php echo $header['realname']; ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Produksi</td>
                            <td>: <?php echo $header['no_produksi']; ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>: <?php echo $header['remarks']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jenis Barang</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat</strong></td>
                            <td style="text-align:center; border:1px solid #000;"><strong>UOM</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            foreach ($myDetail as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$row->berat.'</td>';
                                echo '<td style="text-align:center; border-left:1px solid #000; border-right:1px solid #000;">'.$row->uom.'</td>';
                                echo '</tr>';
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>                        
                    </table>
                </td>
            </tr>
            <br>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td width="400px" style="text-align:center"> </td>
                            <td>&nbsp;</td>
                            <td width="400px" style="text-align:center">Diterima Oleh </td>
                        </tr>
                        <tr style="height:50px">
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center"></td>
                            <td>&nbsp;</td>
                            <td style="text-align:center"><?php echo $header['realname']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
	<body onLoad="window.print()">
    </body>
</html>
        