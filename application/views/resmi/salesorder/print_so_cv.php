<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
        <style type="text/css">
            body{
                font-family:Times New Roman;
            }

            @media print{
                body{
                    font-family:Times New Roman;
                }
            }
        </style>
    </head>
    <body class="margin-left:40px;">
        <h3><u><?= $header['nama_cv'] ?></u></h3>
        <h3 align="center"><u>SALES ORDER</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Kepada</td>
                            <td>: <?= $header['nama_customer'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $header['alamat_cs'] ?></td>
                        </tr>
                        <tr>
                            <td>Telp</td>
                            <td>: <?= $header['telepon_cs'] ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. SO</td>
                            <td>: <?= $header['no_so'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?= tanggal_indo($header['tanggal']) ?></td>
                        </tr>      
                        <tr>
                            <td>No. PO</td>
                            <td>: <?= $header['no_po'] ?></td>
                        </tr> 
                        <tr>
                            <td>Catatan</td>
                            <td>: Ongkos Kerja</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table border="0" cellpadding="5" cellspacing="0" width="900px">
            <thead>
                <th style="border-left: 1px solid; border-top: 1px solid;">No</th>
                <th style="border-left: 1px solid; border-top: 1px solid;">Nama Barang</th>
                <th style="border-left: 1px solid; border-top: 1px solid;" width="20%">Quantity</th>
                <th style="border-left: 1px solid; border-top: 1px solid;">Harga</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-right: 1px solid;">Sub Total</th>
                <!-- <th style="border-left: 1px solid; border-top: 1px solid; border-right: 1px solid;">Keterangan</th> -->
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    foreach ($myDetails as $v) { 
                ?>
                    <tr>
                        <td style="border-left: 1px solid; border-top: 1px solid;" align="center"><?= $no ?></td>
                        <td style="border-left: 1px solid; border-top: 1px solid;"><?=$v->jenis_barang?></td>
                        <td style="border-left: 1px solid; border-top: 1px solid;" align="center"><?= number_format($v->netto,2,".",",")." ".$v->uom ?></td>
                        <td style="border-left: 1px solid; border-top: 1px solid;" align="right">
                            <table width="100%">
                                <tr>
                                    <td>Rp</td>
                                    <td align="right"><?= number_format($v->amount,2,".",",") ?></td>
                                </tr>
                            </table>
                        </td>
                        <td style="border-left: 1px solid; border-top: 1px solid; border-right: 1px solid;" align="right">
                            <table width="100%">
                                <tr>
                                    <td>Rp</td>
                                    <td align="right"><?= number_format($v->total_amount,2,".",",") ?></td>
                                </tr>
                            </table>
                        </td>
                        <!-- <td style="border-left: 1px solid; border-top: 1px solid; border-right: 1px solid;"></td> -->
                    </tr>
                <?php
                        $total += $v->total_amount;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;" colspan="4" align="right"><b>TOTAL</b></td>
                    <td style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid;" align="right">
                        <table width="100%">
                            <tr>
                                <td>Rp</td>
                                <td align="right"><b><?= number_format($total,2,".",",") ?></b></td>
                            </tr>
                        </table>
                    </td>
                    <!-- <td style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid;"></td> -->
                </tr>
            </tbody>
        </table>
        <br>
        <table border="0" cellpadding="2" cellspacing="0" width="900px">
            <tr>
                <td>Disetujui Oleh,</td>
                <td width="60%" align="center"></td>
                <td>Dibuat oleh,</td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        