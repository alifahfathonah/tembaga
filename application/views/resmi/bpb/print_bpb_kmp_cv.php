<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3><?= $header['nama_cv']; ?></h3>
        <h3 align="center"><u>BUKTI PENERIMAAN BARANG</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. BPB</td>
                            <td>: <?= $header['no_bpb'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?= $header['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?= $header['no_po'] ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Supplier</td>
                            <td>: PT. KAWAT MAS PRAKASA</td>
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
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    foreach ($list_bpb_detail as $v) { 
                ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td><?= $v->jenis_barang ?></td>
                        <td align="center"><?= number_format($v->netto,2,".",",")." ".$v->uom ?></td>
                        <td></td>
                    </tr>
                <?php
                        $total += $v->netto;
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
                <td>DITERIMA :</td>
                <td width="60%"></td>
                <td>DIKIRIM OLEH :</td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        