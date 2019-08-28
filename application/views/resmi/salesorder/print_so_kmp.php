<!-- <html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 align="center"><u>SALES ORDER</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Kepada</td>
                            <td>: <?= $header['nama_cv'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $header['alamat'] ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. SO</td>
                            <td>: <?= $header['no_so'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?= $header['tanggal'] ?></td>
                        </tr>         
                        <tr>
                            <td>PPN</td>
                            <td>: 10%</td>
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
                <th>Harga</th>
                <th>Sub Total</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                <?php
                    $no = 1; 
                    $total = 0;
                    foreach ($myDetails as $v) { 
                ?>
                    <tr>
                        <td align="center"><?= $no ?></td>
                        <td><?= $v->jenis_barang ?></td>
                        <td align="center"><?= number_format($v->netto,2,".",",")." ".$v->uom ?></td>
                        <td align="right"><?= "Rp ".number_format($v->amount,2,".",",") ?></td>
                        <td align="right"><?= "Rp ".number_format($v->total_amount,2,".",",") ?></td>
                        <td><?= $v->line_remarks ?></td>
                    </tr>
                <?php
                        $total += $v->total_amount;
                        $no++; 
                    } 
                    $total_amount = $total*110/100;
                ?>
                <tr>
                    <td colspan="4" align="right"><b>TOTAL</b></td>
                    <td align="right"><b><?= "Rp ".number_format($total_amount,2,".",",") ?></b></td>
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
         -->
 <html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <table border="0" cellpadding="0" width="900px" cellspacing="0" style="font-family:Microsoft Sans Serif">
            
            <tr>
                <td align="left" colspan="3">
                    <strong><span style="font-size:20px;">PT. KAWAT MAS PRAKASA</span></strong>
                </td>
            </tr>
            <tr>
                <td height="5px"></td>
            </tr>
            <tr>
                <td colspan="3"><span style="font-size:15px;">JL. HALIM PERDANA KUSUMA NO. 51,Tangerang</td>
            </tr>
            <tr>
                <td>T: (021) 5523547-46, F:(021) 5523548</span></td>
            </tr>
            
            <tr>
                <td colspan="3"><p align="center" style="font-size:20px;"><strong><u>SALES ORDER</u></strong></p></td>
            </tr>
        </table>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Kepada</td>
                            <td>: <?php echo $header['nama_cv']; ?></td>
                        </tr>
                        <tr>
                            <td>UP.</td>
                            <td>: <?php echo $header['pic']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?php echo $header['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: <?php // echo $header['hp']; ?></td>
                        </tr>
                    </table>
                </td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Sales Order</td>
                            <td>: <?php echo $header['no_so']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po'];?></td>
                        </tr>     
                        <tr>
                            <td>Catatan</td>
                            <td>: Ongkos Kerja</td>
                        </tr>                    
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KD Barang</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Barang</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Quantity</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Harga (IDR)</strong></td>
                            <td style="text-align:center; border:1px solid #000"><strong>Sub Total (IDR)</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $total = 0;
                            foreach ($myDetails as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->kode.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">';
                                if($row->netto != 0){
                                        echo number_format($row->netto,2,',', '.');
                                    }else{
                                        echo number_format($row->qty,2,',', '.');
                                    }
                                echo '</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->amount,3,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->total_amount,2,',', '.').'</td>';
                                echo '</tr>';
                                $total += $row->total_amount;
                                $no++;
                            }
                                $ppn = $total*10/100;
                        ?>
                        <tr style="height:20px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000;" colspan="4"><strong><u>Note :</u></strong></td>
                            <td style="text-align:left; border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Jumlah Harga Jual </strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total,2,',','.'); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000;">Payment</td>
                            <td colspan="3">: <?= $header['term_of_payment'];?></td>
                            <td style="text-align:left; border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Discount</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format(0,2,',','.'); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000;">Delivery</td>
                            <td colspan="3">: SECEPATNYA</td>
                            <td style="text-align:left; border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>PPN 10%</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($ppn,2,',','.'); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000;">Keterangan</td>
                            <td style="border-bottom: 1px solid #000;" colspan="3">: <?= $header['remarks'];?></td>
                            <td style="text-align:left; border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Total Seluruhnya</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total+$ppn,2,',','.'); ?></strong>
                            </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td style="text-align: center" width="25%"><strong>Disetujui Oleh :</strong></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                            <td style="text-align: center" width="25%"><strong>Dibuat oleh :</strong></td>
                        </tr>
                        <tr style="height: 50px">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: center"><strong><?php echo ($this->session->userdata('user_ppn')==0) ? 'Frans. Tj' : 'Tjan Lin Oy';?></strong></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center"><strong><?php echo ($this->session->userdata('user_ppn')==0) ? 'Lia' : 'War';?></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <body onLoad="window.print()">
    </body>
</html>
        