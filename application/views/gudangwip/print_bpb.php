<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWATMAS PRAKASA<br>'; }?>BUKTI PENERIMAAN BARANG WIP</h3>
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
                            <td>: <?php echo tanggal_indo(date('Y-m-d', strtotime($header['created']))); ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Produksi</td>
                            <td>: <?php echo $header['no_produksi_ingot']; ?></td>
                        </tr>
                        
                        <!-- <tr>
                            <td>Supplier</td>
                            <td>: <?php echo $header['nama_supplier']; ?></td>
                        </tr> -->
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
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jumlah</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat</strong></td>
                            <td style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $qty = 0;
                            $netto = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->uom.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->qty,0,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->berat,0,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->keterangan.'</td>';
                                echo '</tr>';
                                $no++;
                                $qty += $row->qty;
                                $netto += $row->berat;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"></td>
                            <td colspan="2" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>TOTAL</strong></td>
                            <td style="text-align: right; border-left: 1px solid #000; border-bottom: 1px solid #000;"><?=$qty;?></td>
                            <td style="text-align: right; border-left: 1px solid #000; border-bottom: 1px solid #000;"><?=$netto;?></td>
                            <td style="border-left: 1px solid #000; border-bottom: 1px solid #000; border-right: 1px solid #000;"></td>
                        </tr>                     
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center">Diterima </td>
                            <td style="text-align:center">Disetujui </td>
                            <td style="text-align:center">Diketahui </td>
                            <td style="text-align:center">Diserahkan </td>
                        </tr>
                        <tr style="height:50px">
                            <td colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><strong><u>Linda</u></strong></td>
                            <td style="text-align:center"><strong>Rahmat</strong><br>BAG. PPC/QC</td>
                            <td style="text-align:center"><strong>Tjan Lin Oy</strong><br>KABAG APL/ROLL</td>
                            <td style="text-align:center"><strong>Padi Sukron</strong><br>KA GROUP APL/ROLL</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <body onLoad="window.print()">
    </body>
</html>