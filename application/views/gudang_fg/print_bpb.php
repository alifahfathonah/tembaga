<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWATMAS PRAKASA<br>'; }?>BUKTI PENERIMAAN BARANG FINISHGOOD</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. BPB</td>
                            <td>: <?php echo $header['no_bpb_fg']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>      
                        <tr>
                            <td>No. Produksi</td>
                            <td>: <?php echo $header['no_laporan_produksi']; ?></td>
                        </tr>           
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Jenis Barang</td>
                            <td>: FINISH GOOD</td>
                        </tr>
                        <tr>
                            <td>Pengirim</td>
                            <td>: <?php echo $header['pengirim']; ?></td>
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
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Bobbin</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Packing</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Bruto</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat Bobbin</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Netto</strong></td>
                            <td style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $netto = 0;
                            $bruto = 0;
                            $berat = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->nomor_bobbin.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->no_packing_barcode.'</td>';
                                echo '<td style="text-align: right; border-left:1px solid #000">'.number_format($row->bruto,2,'.',',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->berat_bobbin,2,'.',',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->netto,2,'.',',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000"></td>';
                                echo '</tr>';
                                $no++;
                                $netto += $row->netto;
                                $bruto += $row->bruto;
                                $berat += $row->berat_bobbin;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: right;" colspan="4"><strong>Total</strong></td>
                            <td style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000;"><strong><?php echo number_format($bruto,2,'.',','); ?></strong></td>
                            <td style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000; border-right: :1px solid #000;"><strong><?php echo number_format($berat,2,'.',','); ?></strong></td>
                            <td style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000; border-right: :1px solid #000;"><strong><?php echo number_format($netto,2,'.',','); ?></strong></td>
                            <td style="border-left:1px solid #000;"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table width="100%" align="center" border="0">
                        <tr>
                            <td style="text-align:center">
                                Diketahui,<br>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>______________</p>
                            </td>
                            <td style="text-align:center">
                                Diterima Gudang,<br>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>______________</p>
                            </td>
                            <td style="text-align:center">
                                Bagian QC,<br>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>______________</p>
                            </td>
                            <td style="text-align:center">
                                Yang Mengajukan,<br>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <?php echo $header['pengirim']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
	<body onLoad="window.print()">
    </body>
</html>