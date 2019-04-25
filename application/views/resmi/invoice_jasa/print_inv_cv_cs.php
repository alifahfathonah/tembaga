<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3>Nama CV</h3>
        <h3 align="center"><u>INVOICE</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Invoice</td>
                            <td>: <?= $header['no_invoice_jasa'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?= $header['tanggal'] ?></td>
                        </tr> 
                        <tr>
                            <td>Customer</td>
                            <td>: <?= $header['nama_customer'] ?></td>
                        </tr>  
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?= $header['no_sj_resmi'] ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. PO</td>
                            <td>: <?= $header['no_po'] ?></td>
                        </tr>                   
                        <tr>
                            <td>Catatan</td>
                            <td>: <?= $header['remarks'] ?></td>
                        </tr>
                        <tr rowspan="2">
                            <td colspan="2">&nbsp;</td>
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
                <th>Harga Satuan</th>
                <th>Harga Jual</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total_jual = 0;
                    foreach ($myDetail as $v) { 
                ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td><?= $v->jenis_barang ?></td>
                        <td align="center"><?= number_format($v->sum_netto,2,".",",")." ".$v->uom ?></td>
                        <td align="right"><?= "Rp ".number_format($v->amount,2,".",",") ?></td>
                        <td align="right"><?= "Rp ".number_format($v->sum_total_amount,2,".",",") ?></td>
                        <td><?= $v->line_remarks ?></td>
                    </tr>
                <?php
                        $total_jual += $v->sum_total_amount;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td colspan="4" align="right"><b>TOTAL</b></td>
                    <td align="right"><b><?= "Rp ".number_format($total_jual,2,".",",") ?></b></td>
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
        