<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3><?= $header_cv_cs['nama_cv']; ?></h3>
        <h3 align="center"><u>SURAT JALAN</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?= $header_cv_cs['no_sj_resmi'] ?></td>
                        </tr>
                        <tr>
                            <td>No. SO</td>
                            <td>: <?= $header_cv_cs['no_so'] ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?= $header_cv_cs['no_po'] ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?= $header_cv_cs['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>: <?= $header_cv_cs['nama_customer'] ?></td>
                        </tr>                      
                        <tr>
                            <td>Catatan</td>
                            <td>: <?= $header_cv_cs['remarks'] ?></td>
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
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    foreach ($list_sj_detail as $v) { 
                ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td><?= $v->jenis_barang ?></td>
                        <td align="center"><?= number_format($v->total_netto,2,".",",")." ".$v->uom ?></td>
                        <td></td>
                    </tr>
                <?php
                        $total += $v->total_netto;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td colspan="2" align="right"><b>TOTAL</b></td>
                    <td align="center"><b><?= number_format($total,2,".",",")." ".$v->uom ?></b></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td>TANDA TERIMA,</td>
                <td width="60%" align="center">MENGETAHUI,</td>
                <td>HORMAT KAMI,</td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        