<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>BUKTI PENERIMAAN BOBBIN</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Surat Penerimaan</td>
                            <td>: <?php echo $header['no_penerimaan']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['surat_jalan']; ?></td>
                        </tr>       
                        <tr>
                            <td>Nama Customer</td>
                            <td>: <?php echo $header['pengirim']; ?></td>
                        </tr>               
                    </table>
                </td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo date('d-m-Y', strtotime($header['tanggal'])); ?></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr>
                <td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;"><strong>Ukuran Bobbin</strong></td>
                            <td style="text-align:center; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nomor Bobbin</strong></td>
                            <td style="text-align:center; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat Bobbin</strong></td>
                        </tr>
                        <?php
                            $last_series = null;
                            $no = 0;
                            $qty = 1;
                            $berat = 0;
                            $total = 0;
                            foreach ($details as $row){
                                if($last_series==null){
                                    echo '<tr><td colspan="4" style="border-left:1px solid #000; border-right:1px solid #000;"><u><strong>'.$row->ukuran_bobbin.'</strong></u><td></tr>';
                                }
                                if($row->m_bobbin_size_id!=$last_series && $last_series!=null){
                                    echo '<tr><td style="border-left:1px solid #000;"></td>';
                                    echo '<td style="text-align: center; border-top:1px solid #000; border-left:1px solid #000;border-right:1px solid #000; border-bottom:1px solid #000;">Sub Total</td>';
                                    echo '<td style="text-align: center; border-top:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"><strong>'.$no.' BUAH</strong></td>';
                                    echo '<td style="text-align: center; border-top:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($berat,2,',','.').' KG</strong></td>';
                                    echo '<td>&nbsp;</td></tr>';
                                    echo '<tr><td colspan="4" style="border-left:1px solid #000; border-right:1px solid #000;"><u><strong>'.$row->ukuran_bobbin.'</strong></u><td></tr>';
                                    $no = 0;
                                    $berat = 0;
                                }else{
                                    echo '<tr>';
                                }
                                $no++;
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="text-align:center; border-left:1px solid #000; border-right:1px solid #000;">'.$row->ukuran_bobbin.'</td>';
                                echo '<td style="text-align:center; border-right:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                                echo '<td style="text-align:center; border-right:1px solid #000;">'.$row->berat.'</td>';
                                echo '</tr>';
                                if($row->m_bobbin_size_id==$last_series){
                                    echo '</tr>';
                                }
                                $last_series = $row->m_bobbin_size_id;
                                $berat+=$row->berat;
                                $total+=$row->berat;
                                $qty++;
                            }
                                    echo '<tr><td style="border-left:1px solid #000; border-bottom:1px solid #000;"></td>';
                                    echo '<td style="text-align: center; border-top:1px solid #000; border-left:1px solid #000;border-right:1px solid #000; border-bottom:1px solid #000;">Sub Total</td>';
                                    echo '<td style="text-align: center; border-top:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"><strong>'.$no.' BUAH</strong></td>';
                                    echo '<td style="text-align: center; border-top:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($berat,2,',','.').' KG</strong></td>';
                                    echo '<td>&nbsp;</td></tr>';
                            $qty = $qty - 1;
                        ?>
                            <tr>
                                <td style="border-left:1px solid #000; border-bottom:1px solid #000;"></td>
                                <td style="text-align: center; border-left:1px solid #000;border-right:1px solid #000; border-bottom:1px solid #000;"><strong>TOTAL</strong></td>
                                <td style="text-align: center; border-right:1px solid #000; border-bottom:1px solid #000;"><strong><?=$qty.' BUAH';?></strong></td>
                                <td style="text-align: center; border-right:1px solid #000; border-bottom:1px solid #000;"><strong><?=number_format($total,2,',','.');?> KG</strong></td>
                            </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table width="100%" align="right" border="0">
                        <tr>
                            <td style="text-align:center">
                                Disetujui
                            </td>
                            <td style="text-align:center">
                                Diterima
                            </td>
                            <td style="text-align:center">
                                Diserahkan Oleh
                            </td>
                        </tr>
                        <tr height="50px">
                            <tr>&nbsp;</tr>
                            <tr>&nbsp;</tr>
                            <tr>&nbsp;</tr>
                        </tr>
                        <tr>
                            <td style="text-align:center"><strong>(LINDA)</strong></td>
                            <td style="text-align:center">
                                <u><strong><?php echo $header['realname']; ?></strong></u><br>
                                BAG.GUDANG
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
	<body onLoad="window.print()">
    </body>
</html>
        