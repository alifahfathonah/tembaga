<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWATMAS PRAKASA<br>'; }?></h3>
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
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
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
                            <td>: <?php echo $header['no_pengajuan']; ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
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
        <table cellpadding="5" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif; border: 1px solid;">
            <thead>
                <th style="border-bottom: 1px solid;">#</th>
                <th style="border-bottom: 1px solid;">URAIAN / DESCRIPTION</th>
                <th style="border-bottom: 1px solid;" width="20%">Quantity</th>
                <th style="border-bottom: 1px solid;" colspan="2">HARGA SATUAN / UNIT PRICE</th>
                <th style="border-bottom: 1px solid;">SUB TOTAL</th>
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
                        <td><?= $v->nama_item ?></td>
                        <td align="center"><?= number_format($v->qty,2,".",",")." ".$v->uom ?></td>
                        <td align="right"><?= "Rp ".number_format($v->amount,2,".",",") ?></td>
                        <td>&nbsp;</td>
                        <td align="right"><?= "Rp ".number_format($v->total_amount,2,".",",") ?></td>
                    </tr>
                <?php
                        $total += $v->qty;
                        $total_harga += $v->total_amount;
                        $no++; 
                    } 
                    if($header['ppn']==1){
                        $total_amount = ($total_harga-$header['diskon'])*110/100;
                    }else{
                        $total_amount = ($total_harga-$header['diskon']);
                    }
                ?>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5">&nbsp;</td>
                </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>DISC : &nbsp; &nbsp;<?=$header['diskon'];?></td>
                        <td>PPN  : &nbsp; &nbsp;<?=($header['ppn']==1) ? '10%' : '0%';?></td>
                    </tr>
                <tr>
                    <td style="border-top: 1px solid;" colspan="2" align="right"><b>TOTAL</b></td>
                    <td style="border-top: 1px solid;" align="center"><b><?= number_format($total,2,".",",")." ".$v->uom ?></b></td>
                    <td style="border-top: 1px solid;" colspan="2" ></td>
                    <td style="border-top: 1px solid;" align="right"><?= "Rp ".number_format($total_harga,2,".",",") ?></td>
                </tr>
                <tr><!-- 
                    <td></td>
                    <td>Tanggal Kirim</td>
                    <td colspan="2"><?= $header['tgl_kirim'] ?></td>
                </tr> -->
            </tbody>
        </table>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="20%" style="border-bottom: 1px solid;">Total Harga</td>
                <td rowspan="2">: <?php echo 'Rp. '.number_format($total_amount,2,'.',',');?></td>
            </tr>
            <tr>
                <td>Total Value</td>
            </tr>
            <tr>
                <td width="20%" style="border-bottom: 1px solid;">Pembayaran</td>
                <td rowspan="2">: <?= $header['term_of_payment'] ?></td>
            </tr>
            <tr>
                <td>Payment</td>
            </tr>
            <tr>
                <td width="20%" style="border-bottom: 1px solid;">Penyerahan</td>
                <td rowspan="2">: </td>
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
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td><u>Disetujui oleh,</u><br>Approved by</td>
                <td width="60%"></td>
                <td><u>Hormat kami</u><br>Your faithfully</td>
            </tr>
            <tr>
                <td height="20" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td><u>Tanggal</u><br>Date</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>
        <p>NB : Harap dicantumkan nomor PO kami pada faktur.</p>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        