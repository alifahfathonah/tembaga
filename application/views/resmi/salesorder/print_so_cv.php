<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3><u><?= $header['nama_cv'] ?></u></h3>
        <h3 align="center"><u>SALES ORDER</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
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
                            <td>: <?= $header['remarks'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table border="1" cellpadding="5" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif;">
            <thead>
                <th>No</th>
                <th>Nama Barang</th>
                <th width="20%">Quantity</th>
                <th>Harga</th>
                <th>Sub Total</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    foreach ($myDetails as $v) { 
                ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td><?= $v->jenis_barang ?></td>
                        <td align="center"><?= number_format($v->netto,2,".",",")." ".$v->uom ?></td>
                        <td align="right"><?= "Rp ".number_format($v->amount,2,".",",") ?></td>
                        <td align="right"><?= "Rp ".number_format($v->total_amount,2,".",",") ?></td>
                        <td><?= $v->line_remarks ?></td>
                    </tr>
                <?php
                        $total += $v->total_amount;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td colspan="4" align="right"><b>TOTAL</b></td>
                    <td align="right"><b><?= "Rp ".number_format($total,2,".",",") ?></b></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td></td>
                <td width="80%" align="center"></td>
                <td>Hormat Kami,</td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        