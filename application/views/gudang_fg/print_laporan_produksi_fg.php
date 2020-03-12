 <h3 style="text-align: center; text-decoration: underline;"><!-- PT. KAWAT MAS PRAKASA<br> -->
    LAPORAN PEMAKAIAN BAHAN BAKAR APOLLO</h3>
 <h3 align="center"><b><?php echo " <i>".tanggal_indo(date('Y-m-d', strtotime($start))).' s/d '.tanggal_indo(date('Y-m-d', strtotime($end)))."</i>";?></b></h3>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <tr>
        <td colspan="3">
        <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
            <tr>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>SIZE</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>WIP AWAL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BAHAN BAKU</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Retur</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>TOTAL</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>HASIL PRODUKSI</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BS SDM</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>AFKIR</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>WIP AKHIR</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>TOTAL</strong></td>
                <td style="text-align:center; border:1px solid #000"><strong>SUSUT</strong></td>
            </tr>
        </td>
    </tr>
    <tbody>
    <?php
    $no = 1;
    $wip_awal = 0;
    $bahan_baku = 0;
    $retur = 0;
    $grand_total1 = 0;
    $hasil_produksi = 0;
    $bs_sdm = 0;
    $afkir = 0;
    $wip_akhir = 0;
    $grand_total2 = 0;
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->jenis_barang.'</td>';
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->wip_awal,2,',','.').'</td>';
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bahan_baku,2,',','.').'</td>';
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->retur,2,',','.').'</td>';
        $total1 = $row->wip_awal+$row->bahan_baku+$row->retur;
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($total1,2,',','.').'</td>';
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->hasil_produksi,2,',','.').'</td>';
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_sdm,2,',','.').'</td>';
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->afkir,2,',','.').'</td>';
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->wip_akhir,2,',','.').'</td>';
        $total2 = $row->hasil_produksi+$row->bs_sdm+$row->wip_akhir+$row->afkir;
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($total2,2,',','.').'</td>';
        echo '<td style="text-align: right;border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000"></td>';
        echo '</tr>';
        $no++;
        $wip_awal += $row->wip_awal;
        $bahan_baku += $row->bahan_baku;
        $retur += $row->retur;
        $grand_total1 += $total1;
        $hasil_produksi += $row->hasil_produksi;
        $bs_sdm += $row->bs_sdm;
        $afkir += $row->afkir;
        $wip_akhir += $row->wip_akhir;
        $grand_total2 += $total2;
    }
    ?>
    <tr>
        <td colspan="2" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Grand Total</strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><strong><?=number_format($wip_awal,2,',',',');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><strong><?=number_format($bahan_baku,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><strong><?=number_format($retur,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><u><strong><?=number_format($grand_total1,2,',','.');?></strong></u></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><strong><?=number_format($hasil_produksi,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><strong><?=number_format($bs_sdm,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><strong><?=number_format($afkir,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><strong><?=number_format($wip_akhir,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000;"><u><strong><?=number_format($grand_total2,2,',','.');?></strong></u></td>
        <?php $susut = $grand_total1 - $grand_total2; ?>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;"><u><strong><?=number_format($susut,2,',','.');?></strong></u></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>
</html>