<h3 style="text-align: center; text-decoration: underline;"><!-- PT. KAWAT MAS PRAKASA<br> -->
    LAPORAN HASIL PRODUKSI <?php
    if($_GET['r']==1){ echo 'APOLLO';
    }elseif($_GET['r']==2){ echo 'ROLLING';
    }elseif($_GET['r']==4){ echo 'CUCI';}
    ?></h3>
 <h3 align="center"><b><?php echo " <i>".tanggal_indo(date('Y-m-d', strtotime($start))).' s/d '.tanggal_indo(date('Y-m-d', strtotime($end)))."</i>";?></b></h3>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <tr>
        <td colspan="3">
        <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size:12px;">
            <tr>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Tanggal</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nomor</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Bahan 8,00 & 13.5, 15.5, 17.5 mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Hasil Cuci 8,00 mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Hasil Cuci 13,5 mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Hasil Cuci 15,5 mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Hasil Cuci 17,5 mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Hasil Cuci Bakar Ulang</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Total</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BS<br>Cuci</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Susut</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>WIP<br>Akhir<strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>Ket</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
            </tr>
        </td>
    </tr>
    <tbody>
    <?php
    $no = 1;
    $berat_qty = 0;
    $berat_rongsok = 0;
    $berat_ingot = 0;
    $berat = 0;
    $berat_susut = 0;
    $qty8 = 0;
    $berat8 = 0;
    $qty13 = 0;
    $berat13 = 0;
    $qty15 = 0;
    $berat15 = 0;
    $qty17 = 0;
    $qty_cbu = 0;
    $berat_cbu = 0;
    $berat17 = 0;
    foreach ($detailLaporan as $row){
        $tot = $row->berat+$row->keras;
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->nomor.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty_rsk,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_rsk,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 654)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 654)?number_format($row->berat,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 663)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 663)?number_format($row->berat,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 665)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 665)?number_format($row->berat,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 662)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 662)?number_format($row->berat,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty_keras,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->keras,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($tot,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_rsk - $tot,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">-</td>';
        echo '</tr>';
        $no++;
        if($row->jenis_barang_id == 654){
            $qty8 += $row->qty;
            $berat8 += $row->berat;
        }elseif($row->jenis_barang_id == 663){
            $qty13 += $row->qty;
            $berat13 += $row->berat;
        }elseif($row->jenis_barang_id == 665){
            $qty15 += $row->qty;
            $berat15 += $row->berat;
        }elseif($row->jenis_barang_id == 662){
            $qty17 += $row->qty;
            $berat17 += $row->berat;
        }
        $qty_cbu += $row->qty_keras;
        $berat_cbu += $row->keras;
        $berat_qty += $row->qty;
        $berat_rongsok += $row->berat_rsk;
        $berat_ingot += $row->qty;
        $berat += $tot;
        $berat_susut += $row->berat_rsk - $tot;
    }
    ?>
    <tr>
        <td colspan="3" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Grand Total</strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_qty,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_rongsok,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty8,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat8,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty13,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat13,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty15,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat15,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty17,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat17,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty_cbu,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_cbu,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_ingot,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_susut,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($berat_susut/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;"></td>
    </tr>
    </tr>
    </tbody>
    <tr>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000; text-align: center;" colspan="22"><?=number_format($berat,2,',','.').' + '.number_format($berat_susut,2,',','.').' = '.number_format($berat+$berat_susut,2,',','.');?></td>
    </tr>
    <tr>
        <td colspan="22" style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;">
            <table border="0" width="100%">
                <tr>
                    <td colspan="2"></td>
                    <td align="center">Tangerang, <?=tanggal_indo(date('Y-m-d'));?></td>
                </tr>
                <tr>
                    <td style="text-align:center">Mengetahui. </td>
                    <td style="text-align:center">Disetujui, </td>
                    <td style="text-align:center">Dibuat Oleh, </td>
                </tr>
                <tr style="height:35">
                    <td style="text-align:center">&nbsp;</td>
                    <td style="text-align:center">&nbsp;</td>
                    <td style="text-align:center">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center">( Amin. Tj )</td>
                    <td style="text-align:center">( Tjan Lin Oy )</td>
                    <td style="text-align:center">( Warsinem )</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
    <body onLoad="window.print()">
    </body>
</html>