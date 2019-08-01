<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
        <style type="text/css">
            body{
                font-family: "Times New Roman", Times, serif;
            }

            @media print{
                body{
                    font-family: "Times New Roman", Times, serif;
                }
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top: -10px;"><?php echo $header['nama_cv']; ?></h2>
        <h2 align="center"><u>SURAT PESANAN</u></h2>
        <h3 align="center" style="margin-top: -20px;">PURCHASE ORDER</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:'Times New Roman'">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="5" cellspacing="0" width="100%">
                        <tr>
                            <td style="border-bottom: 1px solid;">Kepada Yth.</td>
                            <td rowspan="2" valign="middle">: PT. KAWAT MAS PRAKASA</td>
                        </tr>
                        <tr>
                            <td>To.</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid;">U. P.</td>
                            <td rowspan="2" valign="middle">: TJAN LIN OY</td>
                        </tr>
                        <tr>
                            <td>Attention to</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid;">Dengan Hormat</td>
                            <td rowspan="2" valign="middle">: </td>
                        </tr>
                        <tr>
                            <td>Dear Sirs</td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="5" cellspacing="0" width="100%">
                        <tr height="50">
                            <td>No. PO</td>
                            <td>: <?= $header['no_po'] ?></td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid;">Tanggal</td>
                            <td rowspan="2" valign="middle">: <?= date("d/m/Y", strtotime($header['tanggal'])) ?></td>
                        </tr>
                        <tr>
                            <td>Date</td>
                        </tr>
                        <tr height="50">
                            <td>No. PP</td>
                            <td>: </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <p>
            <span style="border-bottom: 1px solid;">Dengan ini kami memesan barang-barang kepada Tuan, harap disupply menurut keterangan dan kondisi sebagai berikut :</span><br>
            We have pleasure in placing the following order with you, which is to be supplied strictly in accordance with the specification and conditions, as follows :
        </p>
        <table cellpadding="5" cellspacing="0" width="900px" style="font-family:'Times New Roman'; border: 1px solid;">
            <thead>
                <th style="border-bottom: 1px solid;">NO.</th>
                <th style="border-bottom: 1px solid;">URAIAN / DESCRIPTION</th>
                <th style="border-bottom: 1px solid;" width="15%">QUANTITY</th>
                <th style="border-bottom: 1px solid;" align="right">UNIT PRICE</th>
                <th style="border-bottom: 1px solid;" align="right">SUB TOTAL</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    $total_harga = 0;
                    foreach ($details as $v) { 
                ?>
                    <tr>
                        <td align="center"><?= $no ?>.</td>
                        <td><?= $v->jenis_barang ?></td>
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
                    <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>DISC : &nbsp; &nbsp;0%</td>
                        <td>PPN  : &nbsp; &nbsp;10%</td>
                    </tr>
                <tr>
                    <td style="border-top: 1px solid;" colspan="2" align="right"><b>TOTAL</b></td>
                    <td style="border-top: 1px solid;" align="center"><b><?= number_format($total,2,".",",")." ".$v->uom ?></b></td>
                    <td style="border-top: 1px solid;" ></td>
                    <td style="border-top: 1px solid;" align="right"><b><?= "Rp ".number_format($total_harga,2,".",",") ?></b></td>
                </tr>
                <tr><!-- 
                    <td></td>
                    <td>Tanggal Kirim</td>
                    <td colspan="2"><?= $header['tgl_kirim'] ?></td>
                </tr> -->
            </tbody>
        </table>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:'Times New Roman'">
            <tr>
                <td width="20%" style="border-bottom: 1px solid;">Total Harga</td>
                <td rowspan="2">: <?php echo 'Rp. &nbsp;'.number_format($total_amount,2,'.',',');?></td>
            </tr>
            <tr>
                <td>Total Value</td>
            </tr>
            <tr>
                <td width="20%" style="border-bottom: 1px solid;">Pembayaran</td>
                <td rowspan="2">: <?= ucwords($header['term_of_payment']) ?></td>
            </tr>
            <tr>
                <td>Payment</td>
            </tr>
            <tr>
                <td width="20%" style="border-bottom: 1px solid;">Penyerahan</td>
                <td rowspan="2">: Ditempat</td>
            </tr>
            <tr>
                <td>Delivery</td>
            </tr>
            <tr>
                <td width="20%" style="border-bottom: 1px solid;">Keterangan</td>
                <td rowspan="2">: <?= $header['remarks'] ?></td>
            </tr>
            <tr>
                <td>Remark</td>
            </tr>
        </table>
        
        <p>
            <u>Harap kembalikan copy dari surat pesanan ini setelah disetujui dan di tanda-tangani.</u><br>
            Kindly return the copies duly signed acceptan
        </p>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:'Times New Roman'">
            <tr>
                <td height="20" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td><u>Disetujui oleh,</u><br>Approved by</td>
                <td width="50%"></td>
                <td><u>Hormat kami</u><br>Your faithfully</td>
            </tr>
            <tr>
                <td height="60" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td><u>Tanggal Kirim</u><br>Shipment Date</td>
                <td>: <?= date("d/m/Y", strtotime($header['tanggal_kirim'])) ?></td>
                <td></td>
            </tr>
        </table>
        <p>NB : Harap dicantumkan nomor PO kami pada faktur.</p>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
</html>
        