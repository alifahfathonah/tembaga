<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>DATA TIMBANG WIP (DTWIP)</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                 <td width="50%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. DTWIP</td>
                            <td>: <?php echo $header['no_dtwip']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo date('d-m-Y', strtotime($header['tanggal'])); ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po']; ?></td>
                        </tr>
                        <tr>
                            <td>No. SJ</td>
                            <td>: <?php echo $header['no_sj']; ?></td>
                        </tr>
                    </table>
                </td>
                <td width="50%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Supplier</td>
                            <td>: <?php echo $header['nama_supplier']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Barang</td>
                            <td>: <?php echo $header['jenis_barang']; ?></td>
                        </tr>
                        <tr>
                            <td>Penimbang</td>
                            <td>: <?php echo $header['penimbang']; ?></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $header['remarks']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Item</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>UOM</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Qty</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat (Kg)</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Harga</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>DPP</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>PPN</strong></td>
                            <td style="text-align:center; border:1px solid #000"><strong>Total Harga</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $berat = 0;
                            $th    = 0;
                            $total = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->uom.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.$row->qty.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->berat,2,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->amount,2,',', '.').'</td>';
                                $total_harga = $row->berat*$row->amount;
                                if($header['ppn']==1){
                                    $ppn = $total_harga*10/100;
                                }else{
                                    $ppn=0;
                                }
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($total_harga,2,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($ppn,2,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.number_format($total_harga+$ppn,2,',', '.').'</td>';
                                echo '</tr>';
                                $berat += $row->berat;
                                $th    += $total_harga;
                                $total += $total_harga+$ppn;
                                $no++;
                            }
                        ?>
                        <tr style="height:50px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>    
                        <tr>
                            <td colspan="4" style="text-align:right"><strong>Total (Kg) </strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($berat,2,',', '.'); ?></strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($th,2,',', '.'); ?></strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($total,2,',', '.'); ?></strong></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            
        </table>
	<body onLoad="window.print()">
    </body>
</html>
        