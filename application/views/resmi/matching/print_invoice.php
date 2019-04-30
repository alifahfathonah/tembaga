<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 align="center"><u>Matching Invoice</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Matching</td>
                            <td>: <?= $header['no_invoice_resmi'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?= $header['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <td>PIC</td>
                            <td>: <?= $header['pic'] ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Jumlah (Kg)</td>
                            <td>: <?= $header['jumlah'] ?></td>
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
                <th style="width:40px">No</th>
                <th>Nama Item</th>
                <th>Bruto (Kg)</th>
                <th>Netto (Kg)</th>
                <th>Berat Pallete (Kg)</th>
                <th>Nomor Pallete</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    foreach ($list_invoice_detail as $v) { 
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no ?></td>
                        <td><?php echo $v->nama_item ?></td>
                        <td align="right"><?php echo $v->bruto ?></td>
                        <td align="right"><?php echo $v->netto ?></td>
                        <td><?php echo $v->berat_pallete ?></td>
                        <td><?php echo $v->no_pallete ?></td>
                        <td><?php echo $v->line_remarks ?></td>
                    </tr>
                <?php
                        $total += $v->netto;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td colspan="3" align="right"><b>TOTAL</b></td>
                    <td align="right"><b><?= number_format($total,2,".",",") ?></b></td>
                    <td colspan="3"></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td></td>
                <td width="60%" align="center"></td>
                <td>Dibuat Oleh,</td>
            </tr>
        </table>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
</html>
        