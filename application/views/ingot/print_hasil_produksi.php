<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br><u>BON PRODUKSI</u></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Produksi</td>
                            <td>: <?php echo $header['no_produksi_wip']; ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo tanggal_indo(date('Y-m-d', strtotime($header['tanggal']))); ?></td>
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
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jumlah Satuan</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Berat</strong></td>
                        </tr>
                        <?php 
                        $no = 1;
                        if($header['berat_ingot']!=0){?>
                        <tr>
                            <td style="border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;">INGOT</td>
                            <td style="border-left:1px solid #000;">KG</td>
                            <td style="border-left:1px solid #000;"><?=$header['ingot'];?></td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000;"><?=$header['berat_ingot'];?></td>
                        </tr>
                        <?php } 
                        if($header['bs']!=0){
                            $no++;
                        ?>
                        <tr>
                            <td style="border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;">BS APOLLO</td>
                            <td style="border-left:1px solid #000;">KG</td>
                            <td style="border-left:1px solid #000;">0</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000;"><?=$header['bs'];?></td>
                        </tr>
                        <?php }
                        if($header['bs_service']!=0){
                            $no++;
                        ?>
                        <tr>
                            <td style="border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;">BS SERVICE</td>
                            <td style="border-left:1px solid #000;">KG</td>
                            <td style="border-left:1px solid #000;">0</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000;"><?=$header['bs_service'];?></td>
                        </tr>
                        <?php }
                        if($header['ampas']!=0){
                            $no++;
                        ?>
                        <tr>
                            <td style="border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;">AMPAS APOLLO</td>
                            <td style="border-left:1px solid #000;">KG</td>
                            <td style="border-left:1px solid #000;">0</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000;"><?=$header['ampas'];?></td>
                        </tr>
                        <?php }
                        if($header['serbuk']!=0){
                            $no++;
                        ?>
                        <tr>
                            <td style="border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;">SERBUK</td>
                            <td style="border-left:1px solid #000;">KG</td>
                            <td style="border-left:1px solid #000;">0</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000;"><?=$header['serbuk'];?></td>
                        </tr>
                        <?php }
                        if($header['susut']!=0){
                            $no++;
                        ?>
                        <tr>
                            <td style="border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;">SUSUT</td>
                            <td style="border-left:1px solid #000;">KG</td>
                            <td style="border-left:1px solid #000;">0</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000;"><?=$header['susut'];?></td>
                        </tr>
                        <?php } 
                        $total = $header['berat_ingot'] + $header['bs'] + $header['bs_service'] + $header['ampas'] + $header['serbuk'] + $header['susut'];
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"></td>
                            <td colspan="2" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>TOTAL</strong></td>
                            <td style="text-align: right; border-left: 1px solid #000; border-bottom: 1px solid #000;"><?=$header['ingot'];?></td>
                            <td style="text-align: right; border-left: 1px solid #000; border-bottom: 1px solid #000; border-right: 1px solid #000;"><?=$total;?></td>
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