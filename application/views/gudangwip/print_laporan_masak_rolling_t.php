 <h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>
    LAPORAN HASIL PRODUKSI <?php
    if($r==1){ echo 'APOLLO';
    }elseif($r==2){ echo 'ROLLING';
    }elseif($r==4){ echo 'CUCI';}
    ?></h3>
 <h3 align="center"><b>Tahun <?=$tahun;?></b></h3>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <tr>
        <td colspan="3">
        <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size:12px;">
            <tr>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Bulan</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>WIP<br>Awal</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Penerimaan Bahan Baku</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Tali<br>Rolling</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Rod Lunak</strong></td>
            <?php 
            $colspan = 0;
            $test = 0;?>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Rod Bakar Ulang</strong></td>
                <td colspan="3" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Total</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>BS Rolling</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>BS 8mm</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>BS Ingot</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Susut</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>WIP<br>Akhir<br></strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS<br>(M<sup>3</sup>)</strong></td>
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
    $no = 1;
    $berat_qty_rsk = 0;
    $berat_rongsok = 0;
    $qty_lunak = 0;
    $berat_lunak = 0;
    $qty_bu = 0;
    $berat_bu= 0;
    $berat_ingot = 0;
    $berat = 0;
    $bs_rolling = 0;
    $bs_8m = 0;
    $bs_ingot = 0;
    $berat_gas = 0;
    $qty_bu = 0;
    $berat_bu = 0;
    $qty8 = 0;
    $berat8 = 0;
    $t_wip_awal = 0;
    $t_wip_akhir = 0;
    $tali_rolling = 0;
    $t_berat_susut = 0;
    foreach ($detailLaporan as $row){
        $wip_awal = $row->wip_awal + $row->produksi_awal;
        $wip_akhir = $row->wip_akhir + $row->wip_awal + $row->produksi_akhir;
        $total_qty = $row->qty+$row->qty_bu;
        $total_berat = $row->berat+$row->berat_bu;
        $persen = ($total_berat/($row->berat_rsk+$wip_awal+$row->tali_rolling))*100;
        $berat_rongsok_keluar = ($row->berat_rsk + $row->tali_rolling + $wip_awal);
        $berat_susut = $berat_rongsok_keluar- ($total_berat + $row->bs_rolling + $row->bs_ingot + $row->bs_8m + $wip_akhir);
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($wip_awal,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty_rsk,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_rsk,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->tali_rolling,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->qty_bu,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_bu,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($total_qty,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($total_berat,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($persen,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_rolling,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format(($row->bs_rolling/$berat_rongsok_keluar)*100,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_8m,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format(($row->bs_8m/$berat_rongsok_keluar)*100,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_ingot,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format(($row->bs_ingot/$berat_rongsok_keluar)*100,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($berat_susut,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format(($berat_susut/$berat_rongsok_keluar)*100,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($wip_akhir,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->gas,2,',','.').'</td>';
        echo '<td style="border-left:1px solid #000; border-right:1px solid #000"></td>';
        echo '</tr>';
        $no++;

        $berat_qty_rsk += $row->qty_rsk;
        $berat_rongsok += $row->berat_rsk;
        $berat_ingot += $total_qty;
        $berat += $total_berat;
        $bs_rolling += $row->bs_rolling;
        $bs_8m += $row->bs_8m;
        $bs_ingot += $row->bs_ingot;
        $berat_gas += $row->gas;
        $t_wip_awal += $wip_awal;
        $t_wip_akhir += $wip_akhir;
        $tali_rolling += $row->tali_rolling;
        $qty_lunak += $row->qty;
        $berat_lunak += $row->berat;
        $qty_bu += $row->qty_bu;
        $berat_bu += $row->berat_bu;
        $t_berat_susut += $berat_susut;
    }
    // $berat_keras_akhir = $b_ak + ($b['berat_masuk']-$b['berat_keluar']);
    // $berat_susut = ($berat_rongsok + $tr['netto'] + $b_ak + $ia['netto']) - ($berat + $bs_rolling + $bs_ingot + $bs_8m + $berat_keras_akhir + $ib['netto']);
    ?>
    <tr>
        <!-- <?php $wip_awal = $b_ak+$ia['netto'];?> -->
        <td style="border-left: 1px solid #000; border-bottom: 1px solid #000; text-align: center">TOTAL</td>
        <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><?=number_format($t_wip_awal,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_qty_rsk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_rongsok,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($tali_rolling,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty_lunak,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_lunak,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($qty_bu,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_bu,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_ingot,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($berat/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($bs_rolling,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($bs_rolling/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($bs_8m,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($bs_8m/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($bs_ingot,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($bs_ingot/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($t_berat_susut,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format(($t_berat_susut/$berat_rongsok*100),2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($t_wip_akhir,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($berat_gas,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right: 1px solid #000;"></td>
    </tr>
    <tr>
        <td colspan="22" style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;" align="center">
            <?='('.number_format($berat_rongsok_keluar,2,',','.').' + '.number_format($bs_ingot,2,',','.').' + '.number_format($bs_rolling,2,',','.').' + '.number_format($bs_8m,2,',','.').' + '.number_format($t_berat_susut,2,',','.').' + '.number_format($t_wip_akhir,2,',','.').' + ';?>
        </td>
    </tr>
    <tr>
        <td colspan="<?=24+$colspan;?>" style="border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">
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
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>
</html>