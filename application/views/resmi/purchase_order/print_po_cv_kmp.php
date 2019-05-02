<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3><?= $header['nama_cv'] ?></h3>
        <h2 align="center"><u>SURAT PESANAN</u></h2>
        <h3 align="center" style="margin-top: -20px;">PURCHASE ORDER</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td><u>Kepada Yth.</u></td>
                            <td rowspan="2" valign="middle">: PT. KAWAT MAS PRAKASA</td>
                        </tr>
                        <tr>
                            <td>To.</td>
                        </tr>
                        <tr>
                            <td><u>U. P.</u></td>
                            <td rowspan="2" valign="middle">: <?= $header['pic'] ?></td>
                        </tr>
                        <tr>
                            <td>Attention to</td>
                        </tr>
                        <tr>
                            <td><u>Dengan Hormat</u></td>
                            <td rowspan="2" valign="middle">: </td>
                        </tr>
                        <tr>
                            <td>Dear Sirs</td>
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
                            <td><u>Tanggal</u></td>
                            <td rowspan="2" valign="middle">: <?= date("d/m/Y", strtotime($header['tanggal'])) ?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                        </tr>
                        <tr>
                            <td>No. PP</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td>Disc</td>
                            <td>: 0%</td>
                        </tr>
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
            Dengan ini kami memesan barang-barang kepada Tuan, harap disupply menurut keterangan dan kondisi sebagai berikut :<hr style="margin-top: -18px; margin-bottom: 1px;">
            We have pleasure in placing the following order with you, which is to be supplied strictly in accordance with the specification and conditions, as follows :
        </p>
        <table border="1" cellpadding="5" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif;">
            <thead>
                <th>#</th>
                <th>URAIAN / DESCRIPTION</th>
                <th width="20%">Quantity</th>
                <th>HARGA SATUAN / UNIT PRICE</th>
                <th>SUB TOTAL</th>
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
                        <td><?= $v->jenis_barang ?><br>(Ongkos Kerja)</td>
                        <td align="center"><?= number_format($v->netto,2,".",",")." ".$v->uom ?></td>
                        <td align="right"><?= "Rp ".number_format($v->amount,2,".",",") ?></td>
                        <td align="right"><?= "Rp ".number_format($v->total_amount,2,".",",") ?></td>
                    </tr>
                <?php
                        $total += $v->netto;
                        $total_harga += $v->total_amount;
                        $no++; 
                    } 
                ?>
                <tr>
                    <td colspan="2" align="right"><b>TOTAL</b></td>
                    <td align="center"><b><?= number_format($total,2,".",",")." ".$v->uom ?></b></td>
                    <td></td>
                    <td align="right"><?= "Rp ".number_format($total_harga,2,".",",") ?></td>
                </tr>
                <tr><!-- 
                    <td></td>
                    <td>Tanggal Kirim</td>
                    <td colspan="2"><?= $header['tgl_kirim'] ?></td>
                </tr> -->
            </tbody>
        </table>
        Pembayaran : <?= $header['term_of_payment'] ?>
        <br>
        Keterangan : <?= $header['remarks'] ?>
        <p>Harap kembalikan copy dari surat pesanan ini setelah disetujui dan di tanda-tangani.</p>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td>Disetujui oleh,</td>
                <td width="60%"></td>
                <td>Hormat kami</td>
            </tr>
            <tr>
                <td height="60" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>Tanggal :</td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        