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
        <h3 align="center"><u>PURCHASE ORDER</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?= tanggal_indo($header['tanggal']) ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>:</td>
                            <td><?= $header['no_po'] ?></td>
                        </tr>
                        <tr>
                            <td valign="top">Kepada</td>
                            <td valign="top">:</td>
                            <td valign="top"><?= $header['nama_cv'] ?><br><?= $header['alamat_cv'] ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        
                    </table>
                </td>
            </tr>
        </table>
        <!-- <hr> -->
        <table width="100%">
            <tr>
                <td style="border-top: 1px solid;">&nbsp;</td>
            </tr>
        </table>
        <!-- <p> -->
            Dengan Hormat,<br>
            <br>
            Bersama surat ini, saya ingin mengajukan pesanan sebagai berikut :<br>
            <br>
        <!-- </p> -->
        <table border="0" cellpadding="5" cellspacing="0" width="900px">
            <thead>
                <th style="border-top: 1px solid; border-left: 1px; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px; border-left: 1px solid;">Jenis Barang</th>
                <th style="border-top: 1px solid; border-left: 1px; border-left: 1px solid;" width="20%">Quantity</th>
                <th style="border-top: 1px solid; border-left: 1px; border-left: 1px solid;">Harga</th>
                <th style="border-top: 1px solid; border-left: 1px; border-left: 1px solid; border-right: 1px solid;">Sub Total</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    $total_harga = 0;
                    foreach ($details as $v) { 
                ?>
                    <tr>
                        <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid;" align="center"><?= $no ?></td>
                        <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid;">Jasa Tolling <?= $v->jenis_barang ?></td>
                        <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid;" align="center"><?= number_format($v->netto,2,".",",")." ".$v->uom ?></td>
                        <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid;" align="right"><?= "Rp ".number_format($v->amount,2,".",",") ?></td>
                        <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid; border-right: 1px solid;" align="right"><?= "Rp ".number_format($v->total_amount,2,".",",") ?></td>
                    </tr>
                <?php
                        $total += $v->netto;
                        $total_harga += $v->total_amount;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid; border-bottom: 1px solid;" colspan="2" align="right"><b>TOTAL</b></td>
                    <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid; border-bottom: 1px solid;" align="center"><b><?= number_format($total,2,".",",")." ".$v->uom ?></b></td>
                    <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid; border-bottom: 1px solid;"></td>
                    <td style="border-top: 1px solid; border-left: 1px; border-left: 1px solid; border-bottom: 1px solid; border-right: 1px solid;" align="right"><?= "Rp ".number_format($total_harga,2,".",",") ?></td>
                </tr>
                <tr><!-- 
                    <td></td>
                    <td>Tanggal Kirim</td>
                    <td colspan="2"><?= $header['tgl_kirim'] ?></td>
                </tr> -->
            </tbody>
        </table>
        Tanggal Kirim : <?= tanggal_indo($header['tanggal_kirim']) ?>
        <br>
        <p>Demikian PO ini saya sampaikan, atas perhatian dan kerja samanya saya ucapkan terima kasih.</p>
        <table border="0" cellpadding="2" cellspacing="0" width="900px">
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
        