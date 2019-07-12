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
                <td colspan="3"><p align="center" style="font-size:20px;"><strong><u>SALES ORDER</u></strong></p></td>
            </tr>
        </table>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Kepada</td>
                            <td>: <?php echo ($header['alias'] == NULL) ? $header['nama_customer'] : $header['alias']; ?></td>
                        </tr>
                        <tr>
                            <td>UP.</td>
                            <td>: <?php echo $header['pic']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?php echo $header['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>Telepon</td>
                            <td>: <?php echo $header['telepon']; ?></td>
                        </tr>
                    </table>
                </td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Sales Order</td>
                            <td>: <?php echo $header['no_sales_order']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo date('d-m-Y', strtotime($header['tanggal'])); ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po'];?></td>
                        </tr>                        
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KD Barang</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Barang</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Quantity</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Harga (<?=$header['currency'];?>)</strong></td>
                            <td style="text-align:center; border:1px solid #000"><strong>Sub Total (<?=$header['currency'];?>)</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $total = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->kode.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.' (Ongkos Kerja)</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">';
                                if($row->netto != 0){
                                        echo number_format($row->netto,2,',', '.');
                                    }else{
                                        echo number_format($row->qty,2,',', '.');
                                    }
                                echo '</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->amount,3,',', '.').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->total_amount,2,',', '.').'</td>';
                                echo '</tr>';
                                $total += $row->total_amount;
                                $no++;
                            }
                            if($header['currency']=='USD'){
                                $ppn = 0;
                            }else{
                                if($this->session->userdata('user_ppn')==1){
                                    $ppn = $total*10/100;
                                }else{
                                    $ppn = 0;
                                }
                            }
                        ?>
                        <tr style="height:20px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000;" colspan="4"><strong><u>Note :</u></strong></td>
                            <td style="text-align:left; border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Jumlah Harga Jual </strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total,2,',','.'); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000;">Payment</td>
                            <td colspan="3">: <?= $header['term_of_payment'];?></td>
                            <td style="text-align:left; border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Discount</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format(0,2,',','.'); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000;">Delivery</td>
                            <td colspan="3">: SECEPATNYA</td>
                            <td style="text-align:left; border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>PPN 10%</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($ppn,2,',','.'); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000;border-bottom: 1px solid #000;">Keterangan</td>
                            <td style="border-bottom: 1px solid #000;" colspan="3">: <?= $header['keterangan'];?></td>
                            <td style="text-align:left; border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Total Seluruhnya</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total+$ppn,2,',','.'); ?></strong>
                            </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td style="text-align: center" width="25%"><strong>Disetujui Oleh :</strong></td>
                            <td width="25%"></td>
                            <td width="25%"></td>
                            <td style="text-align: center" width="25%"><strong>Dibuat oleh :</strong></td>
                        </tr>
                        <tr style="height: 50px">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="text-align: center"><strong><?php echo ($this->session->userdata('user_ppn')==0) ? 'Frans. Tj' : 'Tjan Lin Oy';?></strong></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center"><strong><?php echo ($this->session->userdata('user_ppn')==0) ? 'Lia' : 'War';?></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <body onLoad="window.print()">
    </body>
</html>