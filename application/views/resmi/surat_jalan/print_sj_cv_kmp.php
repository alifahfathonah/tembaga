<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3><?= $header['nama_cv']; ?></h3>
        <h3 align="center"><u>SURAT JALAN</u></h3>
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
                            <td>: <?= tanggal_indo($header['tanggal']) ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?= $header['no_po'] ?></td>
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
                            <td>Supplier</td>
                            <td>: PT. KAWAT MAS PRAKASA</td>
                        </tr>
                        <!-- <tr>
                            <td>Customer</td>
                            <td>: <?= $header['nama_customer'] ?></td>
                        </tr>    -->                   
                        <tr>
                            <td>Catatan</td>
                            <td>: <?= $header['remarks'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table border="0" cellpadding="5" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif;">
            <thead>
                <th style="border-top: 1px solid; border-bottom: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid; border-left: 1px solid;">Nama Barang</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid; border-left: 1px solid;" width="20%">Quantity</th>
                <th style="border-top: 1px solid; border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid;">Keterangan</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    foreach ($list_sj_detail as $v) { 
                ?>
                    <tr>
                        <td style="border-bottom: 1px solid; border-left: 1px solid;" align="center"><?= $no ?></td>
                        <td style="border-bottom: 1px solid; border-left: 1px solid;"><?= $v->nama_item ?><br>(Ongkos Kerja)</td>
                        <td style="border-bottom: 1px solid; border-left: 1px solid;" align="center"><?= number_format($v->total_netto,2,".",",")." ".$v->uom ?></td>
                        <td style="border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
                    </tr>
                <?php
                        $total += $v->total_netto;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td style="border-bottom: 1px solid; border-left: 1px solid;" colspan="2" align="right"><b>TOTAL</b></td>
                    <td style="border-bottom: 1px solid; border-left: 1px solid;" align="center"><b><?= number_format($total,2,".",",")." ".$v->uom ?></b></td>
                    <td style="border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
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
        