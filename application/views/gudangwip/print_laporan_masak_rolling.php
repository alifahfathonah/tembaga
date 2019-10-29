 <h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>
    LAPORAN HASIL PRODUKSI <?php
    if($_GET['r']==1){ echo 'APOLLO';
    }elseif($_GET['r']==2){ echo 'ROLLING';
    }elseif($_GET['r']==4){ echo 'CUCI';}
    ?></h3>
 <h3 align="center"><b><?php echo " <i>".$start.' s/d '.$end."</i>";?></b></h3>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <tr>
        <td colspan="3">
        <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
            <tr>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>WIP<br>Awal</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Tanggal</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nomor</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Penerimaan Bahan Baku</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Rod Lunak</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Rod 13,5 mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Rod 15,5 mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Rod 17,5 mm</strong></td>
                <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Total</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BS Rolling</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Susut</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>WIP Akhir<br>8MM KRS.</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>SOL<br>AR</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS(M<sup>3</sup>)</strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BATANG</strong></td>
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
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
            </tr>
        </td>
    </tr>
    <tbody>
    <?php
    $b_ak = $a['berat_masuk']-$a['berat_keluar'];
    $no = 1;
    $berat_qty = 0;
    $berat_rongsok = 0;
    $berat_ingot = 0;
    $berat = 0;
    $berat_bs = 0;
    $berat_gas = 0;
    $berat_keras = 0;
    $qty8 = 0;
    $berat8 = 0;
    $qty13 = 0;
    $berat13 = 0;
    $qty15 = 0;
    $berat15 = 0;
    $qty17 = 0;
    $berat17 = 0;
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000"></td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->nomor.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty_rsk,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_rsk,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 656)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 656)?number_format($row->berat,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 663)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 663)?number_format($row->berat,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 665)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 665)?number_format($row->berat,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 662)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 662)?number_format($row->berat,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->gas,2,',','.').'</td>';
        echo '<td style="border-left:1px solid #000; border-right:1px solid #000"></td>';
        echo '</tr>';
        $no++;
        if($row->jenis_barang_id == 656){
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
        $berat_qty += $row->qty_rsk;
        $berat_rongsok += $row->berat_rsk;
        $berat_ingot += $row->qty;
        $berat += $row->berat;
        $berat_bs += $row->bs;
        $berat_gas += $row->gas;
        // $berat_susut += $row->berat_rsk - ($row->berat + $row->bs);
    }
    $berat_susut = $berat_rongsok - ($berat + $berat_bs);
    ?>
    <tr>
        <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><?=$b_ak;?></td>
        <td colspan="19" style="border-bottom:1px solid #000; border-left:1px solid #000;"></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=$b_ak + ($b['berat_masuk']-$b['berat_keluar']);?></td>
        <td colspan="2" style="border-bottom:1px solid #000; border-left:1px solid #000;"></td>
        <td style="border-left:1px solid #000; border-right:1px solid #000;"></td>
    </tr>
    <tr>
        <td colspan="3" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"></td>
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
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_ingot,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($berat/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_bs,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($berat_bs/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_susut,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($berat_susut/$berat*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_gas,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right: 1px solid #000;"></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>
</html>