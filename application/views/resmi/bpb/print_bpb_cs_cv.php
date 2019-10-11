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
        <h3><?= $header['nama_cv']; ?></h3>
        <h3 align="center"><u>BUKTI PENERIMAAN BAHAN BAKU CUSTOMER</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. BPB</td>
                            <td>: <?= $header['no_bpb'] ?></td>
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
                            <td>No. Surat Jalan</td>
                            <td>: </td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Customer</td>
                            <td>: <?= $header['nama_customer'] ?></td>
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
        <table border="0" cellpadding="5" cellspacing="0" width="900px">
            <thead>
                <th style="border-left: 1px solid; border-top: 1px solid;">No</th>
                <th style="border-left: 1px solid; border-top: 1px solid;">Nama Barang</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-right: 1px solid;" width="20%">Quantity</th>
                <!-- <th>Keterangan</th> -->
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    foreach ($list_bpb_detail as $v) { 
                ?>
                    <tr>
                        <td style="border-left: 1px solid; border-top: 1px solid;" align="center"><?= $no ?></td>
                        <td style="border-left: 1px solid; border-top: 1px solid;"><?= $v->nama_item ?></td>
                        <td style="border-left: 1px solid; border-top: 1px solid; border-right: 1px solid;" align="center"><?= number_format($v->netto,2,".",",")." ".$v->uom ?></td>
                        <!-- <td></td> -->
                    </tr>
                <?php
                        $total += $v->netto;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;" colspan="2" align="right"><b>TOTAL</b></td>
                    <td style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid; border-right: 1px solid;" align="center"><b><?= number_format($total,2,".",",")." ".$v->uom ?></b></td>
                    <!-- <td></td> -->
                </tr>
            </tbody>
        </table>
        <br>
        <table border="0" cellpadding="2" cellspacing="0" width="900px">
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
        