<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <table border="0" cellpadding="0" width="900px" cellspacing="0" style="font-family:Microsoft Sans Serif">
            <!-- <?php if($this->session->userdata('user_ppn')==1){?>
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
            <?php } ?>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr> -->
            <tr>
                <td colspan="3"><p align="center" style="font-size:18px;"><strong><u>
                    <?php
                    if($header['status']==1){
                        echo 'PACKING LIST';
                    }else{
                        echo 'PACKING LIST SEMENTARA';
                    }?></u></strong></p></td>
            </tr>
        </table>
        <br>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Times New Roman;">
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Netto</td>
                            <td>: <?php echo number_format($netto,2,',','.');?> KG</td>
                        </tr>
                        <tr>
                            <td>Bruto</td>
                            <td>: <?php echo number_format($bruto,2,',','.');?> KG</td>
                        </tr>
                        <tr>
                            <td>Packing</td>
                            <td>: <?php echo $jumlah;?> Bag</td>
                        </tr>
                    </table>
                </td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td>&nbsp;</td>
                            <td><?=$jenis_barang;?></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="2">
                    <table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td colspan="4">SJ NO. <?php echo $header['no_surat_jalan']; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BAG NO</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NETTO (KG)</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;; border-right:1px solid #000"><strong>BRUTO (KG)</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $total_bruto = 0;
                            $total_netto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000;">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000; border-bottom:1px solid #000;">'.$row->no_packing.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;">'.number_format($row->netto, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;">'.number_format($row->bruto, 2, '.', ',').'</td>';
                                echo '</tr>';

                                $total_bruto += $row->bruto;
                                $total_netto += $row->netto;
                                $no++;
                            }
                        ?>
                        <tr>
                            <td colspan="2" style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;"><strong>Grand Total :</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total_netto, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">
                                <strong><?php echo number_format($total_bruto, 2, '.', ','); ?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="2">
                    <p>&nbsp;</p>
                    <table border="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td style="text-align:center">Diserahkan</td>
                            <td style="text-align:center">Diterima</td>
                        </tr>
                        <tr style="height:50px">
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center">(_____________)</td>
                            <td style="text-align:center">(_____________)</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        