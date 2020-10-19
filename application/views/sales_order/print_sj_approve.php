<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;" onLoad="window.print()">
    <div class="scale">
        <table border="0" cellpadding="0" width="890px" cellspacing="0" style="font-family:Microsoft Sans Serif">
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
                <td colspan="3"><p align="center" style="font-size:18px;"><strong><u>
                    <?php
                    if($header['status']==1){
                        echo 'PACKING LIST';
                    }else{
                        echo 'PACKING LIST SEMENTARA';
                    }?></u></strong></p></td>
            </tr>
        </table>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Times New Roman;">
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['no_surat_jalan']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Sales Order</td>
                            <td>: <?php echo $header['no_sales_order']; ?></td>
                        </tr>
                        <tr>
                            <td>No. PO</td>
                            <td>: <?php echo $header['no_po']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>Customer</td>
                            <td>: <?php echo $header['nama_customer']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td>Jenis Barang</td>
                            <td>: <?php echo $header['jenis_barang']; ?></td>
                        </tr> -->
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 18px;">
                        <tr>
                            <td>Tanggal SJ</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal SO</td>
                            <td>: <?php echo tanggal_indo($header['tanggal_so']); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2"><?php echo $header['alamat'];?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="5" cellspacing="0" width="100%" style="font-size: <?=$this->uri->segment(4);?>px;">
                        <tr>
                            <td colspan="3">No. Kendaraan: <?php echo $header['no_kendaraan']; ?></td>
                            <td colspan="3">Type Kendaraan: <?php echo $header['type_kendaraan']; ?></td>
                            <td colspan="3">Catatan: <?php echo $header['remarks']; ?></td>
                        </tr>
                        <tr>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NAMA ITEM</strong></td>
                            <!-- <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Produksi</strong></td> -->
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO.PRD</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO.PACKING</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO.BOBBIN</strong></td>
                            <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;; border-right:1px solid #000"><strong>QUANTITY(KG)</strong></td>
                            <!-- <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td> -->
                        </tr>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BRUTO</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BOBBIN</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000"><strong>NETTO</strong></td>
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
                                    echo '<tr><td colspan="5" style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:3px solid #000;"><strong>Total :</strong></td>';
                                    echo '<td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:3px solid #000">
                                            <strong>'.number_format($bruto, 2, '.', ',').'</strong>
                                        </td>
                                        <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:3px solid #000">
                                            <strong>'.number_format($bobin, 2, '.', ',').'</strong>
                                        </td>
                                        <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:3px solid #000; border-right:1px solid #000;">
                                            <strong>'.number_format($netto, 2, '.', ',').'</strong>
                                        </td></tr>';
                                    $bruto = 0;
                                    $bobin = 0;
                                    $netto = 0;
                                    $no = 1;
                                }else{
                                    echo '<tr>';
                                }
                                echo '<td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">'.$row->jenis_barang.'</td>';
                                echo '<td style="border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">'.$row->no_produksi.'</td>';
                                echo '<td style="border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">'.$row->no_packing.'</td>';
                                echo '<td style="border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">'.number_format($row->bruto, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">'.number_format($row->berat, 2, '.', ',').'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;">'.number_format($row->netto, 2, '.', ',').'</td>';
                                // echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->line_remarks.'</td>';
                                if($row->jenis_barang==$last_series){
                                    echo '<tr>';
                                }
                                $last_series = $row->jenis_barang;
                                $bruto += $row->bruto;
                                $bobin += $row->berat;
                                $netto += $row->netto;
                                $total_bruto += $row->bruto;
                                $total_bobin += $row->berat;
                                $total_netto += $row->netto;
                                $no++;
                            }
                            // $no = 1;
                            // $bruto = 0;
                            // $bobin = 0;
                            // $netto = 0;
                            // foreach ($details as $row){
                            //     echo '<tr>';
                            //     echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                            //     echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
                            //     echo '<td style="border-left:1px solid #000">'.$row->no_produksi.'</td>';
                            //     echo '<td style="border-left:1px solid #000">'.$row->no_packing.'</td>';
                            //     echo '<td style="border-left:1px solid #000">'.$row->nomor_bobbin.'</td>';
                            //     echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->bruto, 2, '.', ',').'</td>';
                            //     echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->berat, 2, '.', ',').'</td>';
                            //     echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->netto, 2, '.', ',').'</td>';
                            //     // echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->line_remarks.'</td>';
                            //     echo '</tr>';
                            //     $bruto += $row->bruto;
                            //     $bobin += $row->berat;
                            //     $netto += $row->netto;
                            //     $no++;
                            // }
                        ?>
                        <tr>
                            <td colspan="5" style="text-align:right; border-left:1px solid #000;border-top:1px solid #000; border-bottom:5px solid #000;"><strong>Total :</strong></td>
                            <td style="text-align:right; border-left:1px solid #000;border-top:1px solid #000; border-bottom:5px solid #000">
                                <strong><?php echo number_format($bruto, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000;border-top:1px solid #000; border-bottom:5px solid #000">
                                <strong><?php echo number_format($bobin, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000;border-top:1px solid #000; border-bottom:5px solid #000; border-right:1px solid #000;">
                                <strong><?php echo number_format($netto, 2, '.', ','); ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>Grand Total :</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total_bruto, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000">
                                <strong><?php echo number_format($total_bobin, 2, '.', ','); ?></strong>
                            </td>
                            <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">
                                <strong><?php echo number_format($total_netto, 2, '.', ','); ?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" width="100%" style="font-size: 18px;">
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
<!--     <h3 class="first"></h3>
    <div class="insert"></div> -->
    </div>
    <script type="text/javascript">
        var bottom = 0;
        // $(document).ready(function() {
        //   $("tr:nth-child(10n)").each(function() {
        //     bottom -= 100;
        //     botString = bottom.toString();
        //     var $counter = $('h3.first').clone().removeClass('first');
        //     $counter.css("bottom", botString + "vh");
        //     ($counter).insertBefore('.insert');
        //   });
        // });
    </script>
    </body>
</html>
        