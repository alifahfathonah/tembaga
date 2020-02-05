<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <table border="0" cellpadding="0" width="900px" cellspacing="0" style="font-family:Microsoft Sans Serif">
            <?php if($this->session->userdata('user_ppn')==1){?>
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
            </tr>
            <tr>
                <td colspan="3"><p align="center" style="font-size:20px;"><strong><u>
                    SURAT JALAN / TANDA TERIMA    
                </u></strong></p></td>
            </tr>
        </table>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Times New Roman">
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['no_surat_jalan']; ?></td>
                        </tr>
                    <?php if($header['sales_order_id']>0){ ?>
                        <tr>
                            <td>No. Sales Order</td>
                            <td>: <?php echo $header['no_sales_order']; ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po']; ?></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>: <?php echo $header['nama_customer']; ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                    <?php if($header['sales_order_id']>0){ ?>
                        <tr>
                            <td>Tanggal SJ</td>
                            <td>:</td>
                            <td><?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal SO</td>
                            <td>:</td>
                            <td><?php echo tanggal_indo($header['tanggal_so']); ?></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $header['alamat'];?></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td colspan="2">No. Kendaraan: <?php echo $header['no_kendaraan']; ?></td>
                            <td colspan="2">Type Kendaraan: <?php echo $header['type_kendaraan']; ?></td>
                            <td colspan="2">Catatan: <?php echo $header['remarks']; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NAMA ITEM</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>QTY</strong></td>
                            <td style="text-align:center; border:1px solid #000"><strong>KETERANGAN</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $bruto = 0;
                            $berat = 0;
                            $netto = 0;
                            foreach ($details as $row){
                                $berat_palette = $row->bruto-$row->netto;
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->netto, 2, '.', ',').' '.$row->uom.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->line_remarks.'</td>';
                                echo '</tr>';
                                $bruto += $row->bruto;
                                $berat += $row->bruto-$row->netto;
                                $netto += $row->netto;
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                             <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000" colspan="2"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($netto, 2, '.', ',').' '.$row->uom; ?></strong>
                            </td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td style="text-align:center">Penerima</td>
                            <td style="text-align:center">Pembawa / Supir</td>
                            <td style="text-align:center">Mengetahui</td>
                            <td style="text-align:center">Hormat Kami</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
	<body onLoad="window.print()">
    </body>
</html>
        