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
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Penerimaan Bahan Baku</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Rod Lunak</strong></td>
            <?php 
            $colspan = 0;
            $test = 0;
            foreach ($check as $jb) {
                echo '<td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Rod. '.number_format($jb->ukuran/100,2,',','.').' mm</strong></td>';
                $test++;
                $colspan+=2;
            }?>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Rod 8mm Keras</strong></td>
                <td colspan="3" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Total</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>BS Rolling</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>BS 8mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>BS Ingot</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Susut</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>WIP Akhir<br>8MM KRS.</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>SOL<br>AR</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS(M<sup>3</sup>)</strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BATANG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
            <?php for ($i=0; $i <= $test ; $i++) { 
                echo '<td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>';
            }?>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
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
    $bs_rolling = 0;
    $bs_8m = 0;
    $bs_ingot = 0;
    $berat_gas = 0;
    $qty_keras = 0;
    $berat_keras = 0;
    $qty8 = 0;
    $berat8 = 0;
        foreach ($check as $jb) {
            ${'qty'.$jb->jenis_barang_id} =0;
            ${'berat'.$jb->jenis_barang_id} = 0;
        }
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000"></td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->nomor.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty_rsk,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_rsk,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 656)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == 656)?number_format($row->berat,2,',','.'):'-').'</td>';
        foreach ($check as $jb) {
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == $jb->jenis_barang_id)?number_format($row->qty,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis_barang_id == $jb->jenis_barang_id)?number_format($row->berat,2,',','.'):'-').'</td>';
        }
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty_keras,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->keras,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_rolling,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_8m,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_ingot,2,',','.').'</td>';
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
        }

        foreach ($check as $jb) {
            if($row->jenis_barang_id == $jb->jenis_barang_id){
                ${'qty'.$jb->jenis_barang_id} += $row->qty;
                ${'berat'.$jb->jenis_barang_id} += $row->berat;
            }
        }
        $qty_keras += $row->qty_keras;
        $berat_keras += $row->keras;
        $berat_qty += $row->qty_rsk;
        $berat_rongsok += $row->berat_rsk;
        $berat_ingot += $row->qty;
        $berat += $row->berat;
        $bs_rolling += $row->bs_rolling;
        $bs_8m += $row->bs_8m;
        $bs_ingot += $row->bs_ingot;
        $berat_gas += $row->gas;
        // $berat_susut += $row->berat_rsk - ($row->berat + $row->bs);
    }
    $berat_susut = $berat_rongsok - ($berat + $bs_rolling + $bs_ingot + $bs_8m);
    ?>
    <tr>
        <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><?=number_format($b_ak,2,',','.');?></td>
        <td colspan="<?=19+$colspan;?>" style="border-bottom:1px solid #000; border-left:1px solid #000;"></td>
        <?php $berat_keras_akhir = $b_ak + ($b['berat_masuk']-$b['berat_keluar']);?>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_keras_akhir,2,',','.');?></td>
        <td colspan="2" style="border-bottom:1px solid #000; border-left:1px solid #000;"></td>
        <td style="border-left:1px solid #000; border-right:1px solid #000;"></td>
    </tr>
    <tr>
        <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><?=number_format($ia['netto'],2,',','.');?></td>
        <td colspan="<?=19+$colspan;?>" style="border-bottom:1px solid #000; border-left:1px solid #000;"></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($ib['netto'],2,',','.');?></td>
        <td colspan="2" style="border-bottom:1px solid #000; border-left:1px solid #000;"></td>
        <td style="border-left:1px solid #000; border-right:1px solid #000;"></td>
    </tr>
    <tr>
        <?php $wip_awal = $b_ak+$ia['netto'];?>
        <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><?=number_format($wip_awal,2,',','.');?></td>
        <td colspan="2" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_qty,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_rongsok,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty8,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat8,2,',','.');?></td>
        <?php
        foreach ($check as $jb) {
            if($row->jenis_barang_id == $jb->jenis_barang_id){
                echo'<td style="border-bottom:1px solid #000; border-left:1px solid #000;">'.number_format(${'qty'.$jb->jenis_barang_id},2,',','.').'</td>
                <td style="border-bottom:1px solid #000; border-left:1px solid #000;">'.number_format(${'berat'.$jb->jenis_barang_id},2,',','.').'</td>';
            }
        }
        ?>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty_keras,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_keras,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_ingot,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($berat/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($bs_rolling,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($bs_rolling/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($bs_8m,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($bs_8m/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($bs_ingot,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($bs_ingot/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_susut,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($berat_susut/$berat*100),2,',','.');?></td>
        <?php $wip_akhir = $berat_keras_akhir + $ib['netto'];?>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($wip_akhir,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_gas,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right: 1px solid #000;"></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>
</html>