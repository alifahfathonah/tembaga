<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWAT MAS PRAKASA<br>'; }?>BUKTI PENERIMAAN BARANG SPARE PART</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. BPB</td>
                            <td>: <?php echo $header['no_bpb']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo date('d-m-Y', strtotime($header['tanggal'])); ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po']; ?></td>
                        </tr>
                        
                        <tr>
                            <td>Supplier</td>
                            <td>: <?php echo $header['nama_supplier']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Item</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Satuan</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jumlah</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Harga</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Diskon</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>PPN</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Sub Total</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Keterangan</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $total = 0;
                            foreach ($details as $row){
                                $diskon = $row->total*$header['diskon']/100;
                                if($row->ppn==1){
                                    $hp = ($row->total-$diskon)*10/100;
                                }else{
                                    $hp = 0;
                                }
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000;">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000; border-bottom:1px solid #000;">'.$row->nama_item.'</td>';
                                echo '<td style="border-left:1px solid #000; border-bottom:1px solid #000;">'.$row->uom.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;">'.number_format($row->qty,2,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;">'.number_format($row->amount,2,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;">'.number_format($diskon,2,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;">'.number_format($hp,2,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;">'.number_format($row->total-$diskon+$hp,2,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;">'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $total += ($row->total-$diskon)+$hp;
                                $no++;
                            }
                        if($header['materai']>0 && $header['id']==$header['cek']){
                            $total += $header['materai'];
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000"><?=$no;?></td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><?=number_format($header['materai'],0,',','.');?></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">Materai</td>
                        </tr>
                        <?php } ?>
                        <tr style="height:50px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="7" style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;"><?=number_format($total,2,',', '.');?></td>
                            <td style=" border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td width="400px" style="text-align:center">Diserahkan Oleh </td>
                            <td>&nbsp;</td>
                            <td width="400px" style="text-align:center">Diterima Oleh </td>
                        </tr>
                        <tr style="height:50px">
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><?php echo $header['pengirim']; ?></td>
                            <td>&nbsp;</td>
                            <td style="text-align:center"><?php echo $header['penerima']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
	<body onLoad="window.print()">
    </body>
</html>
        