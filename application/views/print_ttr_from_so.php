<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWAT MAS PRAKASA<br>'; }?>TANDA TERIMA RONGSOK (TTR)</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. TTR</td>
                            <td>: <?php echo $header['no_ttr']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo date('d-m-Y', strtotime($header['tanggal'])); ?></td>
                        </tr>                        
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $header['remarks']; ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Customer</td>
                            <td>: <?php echo $header['nama_customer']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Sales Order</td>
                            <td>: <?php echo $header['no_sales_order']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Reff/ DTR</td>
                            <td>: <?php echo $header['no_dtr']; ?></td>
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
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>UOM</strong></td>
                           <!--  <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jumlah</strong></td> -->
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
                                echo '<td style="border-left:1px solid #000">'.$row->nama_item.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->uom.'</td>';
                                // echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->qty,0,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->bruto, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->netto, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                $netto += $row->netto;
                                $no++;
                            }
                        ?>
                        <tr style="height:50px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td><!-- 
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td> -->
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000"><strong>Jumlah Berat Netto</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($bruto, 2, '.', ','); ?></strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000"><strong><?php echo number_format($netto, 2, '.', ','); ?></strong></td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">Jumlah Pengepakan</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td><!-- 
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td> -->
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000; text-align: right;"><?php echo number_format($header['jmlh_pengepakan'],2,'.',','); ?></td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">Jumlah Afkiran</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td><!-- 
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td> -->
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000; text-align: right;"><?php echo number_format($header['jmlh_afkiran'],2,'.',','); ?></td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">Jumlah Lain - Lain</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td><!-- 
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td> -->
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000; text-align: right;"><?php echo number_format($header['jmlh_lain'],2,'.',','); ?></td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td width="400px" style="text-align:center">Ditimbang Oleh </td>
                            <td width="400px" style="text-align:center">Diterima Oleh </td>
                        </tr>
                        <tr>
                            <td height="50px" style="text-align:center"></td>
                            <td height="50px" style="text-align:center"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center">(Sabar) </td>
                            <td style="text-align:center">(Kevin)</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <body onLoad="window.print()">
    </body>
</html> 