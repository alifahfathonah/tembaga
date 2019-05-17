<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 align="center"><u>PURCHASE ORDER</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?= date("d/m/Y", strtotime($header['tanggal'])) ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?= $header['no_po'] ?></td>
                        </tr>
                        <tr>
                            <td>Kepada</td>
                            <td>: <?= $header['nama_cv'] ?><br><?= $header['alamat_cv'] ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>PPN</td>
                            <td>: 10%</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <hr>
        <p>
            Dengan Hormat,<br>
            <br>
            Bersama surat ini, saya ingin mengajukan pesanan sebagai berikut :
        </p>
        <table border="1" cellpadding="5" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif;">
            <thead>
                <th>No</th>
                <th>Jenis Barang</th>
                <th width="20%">Quantity</th>
                <th>Harga</th>
                <th>Sub Total</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    $total_harga = 0;
                    foreach ($details as $v) { 
                ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td>Jasa Tolling <?= $v->jenis_barang ?></td>
                        <td align="center"><?= number_format($v->netto,2,".",",")." ".$v->uom ?></td>
                        <td align="right"><?= "Rp ".number_format($v->amount,2,".",",") ?></td>
                        <td align="right"><?= "Rp ".number_format($v->total_amount,2,".",",") ?></td>
                    </tr>
                <?php
                        $total += $v->netto;
                        $total_harga += $v->total_amount;
                        $no++; 
                    } 
                    $total_amount = $total_harga*110/100;
                ?>
                <tr>
                    <td colspan="2" align="right"><b>TOTAL</b></td>
                    <td align="center"><b><?= number_format($total,2,".",",")." ".$v->uom ?></b></td>
                    <td></td>
                    <td align="right"><?= "Rp ".number_format($total_amount,2,".",",") ?></td>
                </tr>
                <tr><!-- 
                    <td></td>
                    <td>Tanggal Kirim</td>
                    <td colspan="2"><?= $header['tgl_kirim'] ?></td>
                </tr> -->
            </tbody>
        </table>
        Tanggal Kirim : <?= date("d/m/Y", strtotime($header['tgl_kirim'])) ?>
        <br>
        <p>Demikian PO ini saya sampaikan, atas perhatian dan kerja samanya saya ucapkan terima kasih.</p>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td>Hormat Saya,</td>
            </tr>
            <tr>
                <td height="60">&nbsp;</td>
            </tr>
            <tr>
                <td> <?= $header['nama'] ?> </td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        