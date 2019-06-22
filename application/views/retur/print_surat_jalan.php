<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWATMAS PRAKASA<br>'; }?>PACKING LIST PENGGANTI RETUR</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['no_surat_jalan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo date('d-m-Y', strtotime($header['tanggal'])); ?></td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>: <?php echo $header['nama_customer']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?php echo $header['alamat']; ?></td>
                        </tr>
                        
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%"><!-- 
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po']; ?></td>
                        </tr> -->
                        <tr>
                            <td>Jenis Barang</td>
                            <td>: <?php echo $header['jenis_barang']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Kendaraan</td>
                            <td>: <?php echo $header['no_kendaraan']; ?></td>
                        </tr>
                        <tr>
                            <td>Type Kendaraan</td>
                            <td>: <?php echo $header['type_kendaraan']; ?></td>
                        </tr>                         
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $header['remarks']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Item</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>UOM</strong></td>
                            <!-- <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Produksi</strong></td> -->
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No.Packing</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nomor Bobbin</strong></td>
                            <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Qty</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Bruto</strong></td>
                            <!-- <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Bobin</strong></td>
 -->                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Netto</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $bruto = 0;
                            // $bobin = 0;
                            $netto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->uom.'</td>';
                                // echo '<td style="border-left:1px solid #000">'.$row->no_produksi.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->no_packing.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->nomor_bobbin.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000;">'.number_format($row->bruto,0,',', '.').'</td>';
                                // echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->bobin,0,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000;">'.number_format($row->netto,0,',', '.').'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                // $bobin += $row->bobin;
                                $netto += $row->netto;
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">&nbsp;</td>
                            <!-- <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td> -->
                        </tr>
                        <tr>
                            <td style="text-align:right;" colspan="5"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($bruto,0,',','.'); ?></strong>
                            </td>
                            <!-- <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($bobin,0,',','.'); ?></strong>
                            </td> -->
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">
                                <strong><?php echo number_format($netto,0,',','.'); ?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" width="100%">
                        <tr>
                            <td style="text-align:center">Tanda Terima</td>
                            <td style="text-align:center">Pembawa / Supir</td>
                            <td style="text-align:center">Diperiksa</td>
                            <td style="text-align:center">Mengetahui</td>
                            <td style="text-align:center">Hormat Kami</td>
                        </tr>
                        <tr style="height:35">
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <!-- <td style="text-align:center">&nbsp;</td> -->
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                        </tr>
                        <tr><?php if($this->session->userdata('user_ppn')==1){?>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center"><strong>(Tjan Lin Oy)</strong></td>
                            <td style="text-align:center"><strong>(Istadi)</strong></td>
                            <?php }else{ ?>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center"><strong>(Andi)</strong></td>
                            <td style="text-align:center"><strong>(Bambang)</strong></td>
                            <?php } ?>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        