<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>RETUR</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="50%" valign="top">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Retur</td>
                            <td>: <?php echo $header['no_retur']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo(date('Y-m-d', strtotime($header['tanggal']))); ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Barang</td>
                            <td>: <?=$header['jenis_barang'];?></td>
                        </tr>
                        <tr>
                            <td>Jenis Packing</td>
                            <td>: <?=$header['jenis_packing'];?></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $header['remarks']; ?></td>
                        </tr>
                    </table>
                </td>
                <td width="50%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Customer</td>
                            <td>: <?= (($this->session->userdata('user_ppn') == 1)? $header['nama_customer'] : $header['nama_customer_kh']) ?></td>
                        </tr>
                        <tr>
                            <td>PIC</td>
                            <td>: <?= (($this->session->userdata('user_ppn') == 1)? $header['pic'] : $header['pic_kh']) ?></td>
                        </tr>
                        <tr>
                            <td>Type Retur</td>
                            <td>: <?php echo (($header['jenis_retur']==1)? "Ganti Voucher": "Ganti Barang"); ?></td>
                        </tr>
                        <tr>
                            <td>Penimbang</td>
                            <td>: <?php echo $header['penimbang']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['no_sj']; ?></td>
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
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Packing</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Bruto (Kg)</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Netto (Kg)</strong></td>                            
                            <td style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $bruto = 0;
                            $netto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->no_packing.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->bruto,2,'.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->netto,2,'.', ',').'</td>';                                
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                $netto += $row->netto;
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>                            
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>    
                        <tr>
                            <td colspan="3" style="text-align:right"><strong>Total (Kg) </strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($bruto,2,'.', ','); ?></strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($netto,2,'.', ','); ?></strong></td>
                            <td style="border-left:1px solid #000;">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            
        </table>
	<body onLoad="window.print()">
    </body>
</html>
        