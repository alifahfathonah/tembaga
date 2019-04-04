<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;">MATCHING INVOICE</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Matching</td>
                            <td>: <?php echo $header['no_matching'];?></td>
                        </tr>
                        <tr>
                            <td valign="top">Sejumlah</td>
                            <td>: <?php echo ucwords(number_to_words($header['total'])); ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']);?></td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>: <?php echo $header['nama_customer'];?></td>
                        </tr>          
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $header['keterangan'];?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr><td colspan="2">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Invoice</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Jumlah Invoice</strong></td>
                        </tr>
                       
                                <tr>
                                </tr>
                        <?php
                            $no = 1;
                            $total = 0;
                            $total_invoice = 0;
                            foreach ($details as $row){
                                $harga_total = $row->total+$row->biaya1+$row->biaya2;
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->no_invoice;?></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000;"><?=number_format($harga_total,0,',','.');?></td>
                        </tr>
                        <?php if($row->biaya1 != 0){ ?>
                        <tr>
                            <td style="border-left:1px solid #000;"></td>
                            <td style="text-align:right;border-left:1px solid #000;"><?=$row->ket1;?></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000;"><?='(-)'.number_format($row->biaya1,0,',','.');?></td>
                        </tr>
                        <?php } 
                              if($row->biaya2 != 0){ ?>
                        <tr>
                            <td style="border-left:1px solid #000;"></td>
                            <td style="text-align:right;border-left:1px solid #000;"><?=$row->ket2;?></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000;"><?='(-)'.number_format($row->biaya2,0,',','.');?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td style="border-left:1px solid #000;"></td>
                            <td style="text-align:right;border-left:1px solid #000;"><strong>Total Invoice</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right: 1px solid #000;"><?=number_format($row->total,0,',', '.');?></td>
                        </tr>
                        <?php
                                $total_invoice += $harga_total;
                                $total += $row->total;
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                Jumlah Invoice: <strong><?=number_format($total_invoice,0,',','.');?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right: 1px solid #000;">
                                Jumlah Total: <strong><?=number_format($total,0,',', '.');?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="2">
                    <table border="1" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Invoice</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Jumlah Invoice</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            foreach ($details_um as $row){
                        ?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$row->no_uang_masuk;?></td>
                            <td><?=$row->nominal;?></td>
                        </tr>
                        <?php $no++; } ?>
                    </table>
                </td>
                <td colspan="2">
                    <table border="1" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Invoice</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Jumlah Invoice</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            foreach ($details_um as $row){
                        ?>
                        <tr>
                            <td><?=$no;?></td>
                            <td><?=$row->no_uang_masuk;?></td>
                            <td><?=$row->nominal;?></td>
                        </tr>
                        <?php $no++; } ?>
                    </table>
                </td>
            </tr>
            <tr><td colspan="4">
                    <p>&nbsp;</p>
                    <table border="0" width="100%">
                        <tr>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center">Dibuat Oleh</td>
                        </tr>
                        <tr style="height:35">
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center"></td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center"></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
</html>
        