<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWATMAS PRAKASA<br>'; }?>PACKING LIST SEMENTARA<br>FINISH GOOD</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="55%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. SPB</td>
                            <td>: <?php echo $header['no_spb']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td>: <?=$header['nama_customer'];?></td>
                        </tr>             
                    </table>
                </td>
                <td width="45%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Jenis Barang</td>
                            <td>: Finish Good</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>: <?=$header['keterangan'];?></td>
                        </tr>
                        <tr>
                            <td rowspan="2">&nbsp;</td>
                        </tr>
                    <!-- <?php
                        if($header['status'] == '9'){
                    ?>
                        <tr>
                            <td>Di tolak oleh</td>
                            <td>: <?php echo $header['reject_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $header['reject_remarks']; ?></td>
                        </tr>
                    <?php
                    } else if($header['status'] == '1'){
                    ?>
                        <tr>
                            <td>Di terima oleh</td>
                            <td>: <?php echo $header['approved_name']; ?></td>
                        </tr>
                    <?php
                    }
                    ?> -->
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Kode Barang</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Barang</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No.Bobbin</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No.Packing</strong></td>
                            <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Qty</strong></td>
                            <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>Approved</strong></td>
                        </tr>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Bruto</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat Bobbin</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Netto</strong></td>
                        </tr>
                        <?php
                            $last_series = null;
                            $no = 1;
                            $bruto = 0;
                            $bobin = 0;
                            $netto = 0;
                            $total_bruto = 0;
                            $total_bobin = 0;
                            $total_netto = 0;
                            foreach ($details as $row){
                                if($row->jenis_barang!=$last_series && $last_series!=null){
                                    echo '<tr><td colspan="5" style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>Total :</strong></td>';
                                    echo '<td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000">
                                            <strong>'.number_format($bruto, 2, '.', ',').'</strong>
                                        </td>
                                        <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000">
                                            <strong>'.number_format($bobin, 2, '.', ',').'</strong>
                                        </td>
                                        <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">
                                            <strong>'.number_format($netto, 2, '.', ',').'</strong>
                                        </td>
                                        <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"></td></tr>';
                                    $bruto = 0;
                                    $bobin = 0;
                                    $netto = 0;
                                    $no = 1;
                                }else{
                                    echo '<tr>';
                                }
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->kode.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->nomor_bobbin.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->no_packing.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->bruto, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->berat_bobbin, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->netto, 2, '.', ',').' '.$row->uom.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.(($row->jenis_trx == 0)? 'NO':'YES').'</td>';
                                echo '</tr>';
                                if($row->jenis_barang==$last_series){
                                    echo '<tr>';
                                }
                                $last_series = $row->jenis_barang;
                                $bruto += $row->bruto;
                                $bobin += $row->berat_bobbin;
                                $netto += $row->netto;
                                $total_bruto += $row->bruto;
                                $total_bobin += $row->berat_bobbin;
                                $total_netto += $row->netto;
                                $no++;
                            }
                        ?>
                        <tr style="height:1px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;" colspan="5"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($bruto, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($bobin, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($netto, 2, '.', ','); ?></strong>
                            </td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"></td>
                        </tr>
                        <tr>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;" colspan="5"><strong>Grand Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total_bruto, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total_bobin, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total_netto, 2, '.', ','); ?></strong>
                            </td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" width="100%">
                       <tr>
                            <td style="text-align:center">
                                Yang Mengajukan,<br>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <?php echo $header['pic']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> -->
        </table>
	<body onLoad="window.print()">
    </body>
</html>