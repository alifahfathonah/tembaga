<style type="text/css">
table td, table td * {
    vertical-align: top;
}
</style>
<h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>
    LAPORAN HASIL PRODUKSI APOLLO</h3>
<h3 align="center"><b><?php echo " <i>".tanggal_indo(date('Y-m-d', strtotime($start))).' s/d '.tanggal_indo(date('Y-m-d', strtotime($end)))."</i>";?></b></h3>
<table width="100%" cellpadding="0" cellspacing="0" style="border-left: 1px solid #000;">
    <tr>
        <td>
            <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                <tr>
                    <td rowspan="2" style="text-align:center; border-top:1px solid #000;"><br><strong>TANGGAL</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong><br>NO PRODUKSI</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>GAS</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>JML<br>KAYU</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>JUMLAH<br>JAM</strong></td>
                    <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>RONGSOK</strong></td>
                    <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>HASIL PRODUKSI</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong><br>BS APOLLO</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong><br>BS INGOT</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;"><strong>SUSUT<br>APOLLO</strong></td>
                </tr>
                <tr>
                    <td style="text-align:center; border-left:1px solid #000; border-top:1px solid #000; border-left:1px solid #000;"><strong>(M<sup>3</sup>)</strong></td>
                    <td style="text-align:center; border-top:1px solid #000; border-left: 1px solid #000"><strong>Type</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>BTG</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                </tr>
<?php
    $no = 0;
    $berat_rongsok = 0;
    $berat_ingot = 0;
    $berat = 0;
    $berat_susut = 0;
    $gas = 0;
    $kayu = 0;
    $bs_service = 0;
    $bs = 0;
    $jam = 0;
    $last_tanggal = null;
    foreach ($detailLaporan as $row){
        $to = $row->mulai;
        $from = $row->selesai;

        $total      = strtotime($from) - strtotime($to);
        $hours      = floor($total / 60 / 60);
        $minutes    = round(($total - ($hours * 60 * 60)) / 60);
        $no++;
        echo '<tr>';
        echo (($last_tanggal==$row->tanggal) ? '<td style="text-align:center;">' : '<td style="text-align:center; border-top:1px solid #000;">'.$row->tanggal).'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.$row->no_produksi.'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.number_format($row->gas,2,',','.').'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.number_format($row->kayu,2,',','.').'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.$hours.'j, '.$minutes.'m</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.number_format($row->total_rongsok,2,',','.').'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.number_format($row->ingot,2,',','.').'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_ingot,2,',','.').'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.number_format($row->bs,2,',','.').'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_service,2,',','.').'</td>';
        echo '<td style="border-top:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;">'.number_format($row->total_rongsok-$row->berat_ingot-$row->bs-$row->bs_service,2,',','.').'</td>';
        echo '</tr>';
        $berat_rongsok += $row->total_rongsok;
        $berat_ingot += $row->ingot;
        $berat += $row->berat_ingot;
        $berat_susut += $row->total_rongsok-$row->berat_ingot-$row->bs-$row->bs_service;
        $gas += $row->gas;
        $jam += $total;
        $kayu += $row->kayu;
        $bs += $row->bs;
        $bs_service += $row->bs_service;
        $last_tanggal = $row->tanggal;
    }

    $t_hours      = floor($jam / 60 / 60);
    $t_minutes    = round(($jam - ($t_hours * 60 * 60)) / 60);
    $hasil_bss = $bs_service/$berat_rongsok*100;
    $hasil_bs = $bs/$berat_rongsok*100;
    $all_bs = $hasil_bss + $hasil_bs;
    $tot_bs = $bs+$bs_service;
    $hasil_susut = $berat_susut/$berat_rongsok*100;
    ?>
                <tbody>
                    <tr>
                        <td colspan="2" style="border-top: 1px solid #000;"><strong>Grand Total</strong></td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($gas,2,',','.');?>
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($kayu,2,',','.');?>
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            <?=$t_hours.'j, '.$t_minutes;?>m
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            -
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat_rongsok,2,',','.');?>
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat_ingot,2,',','.');?>
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat,2,',','.');?>
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($bs,2,',','.');?>
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($bs_service,2,',','.');?>
                        </td>
                        <td style="border-top:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">
                            <?=number_format($berat_susut,2,',','.');?>
                        </td>
                    </tr>
                </tbody>
        </td>
    </tr>
    <tr>
        <td colspan="5" style="border-bottom:1px solid #000;border-top:1px solid #000;">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size: 12px;">
                <tr>
                    <td style="text-align:left">PENGGUNAAN BAHAN </td>
                </tr>
                <tr>
                    <td style="text-align:left">HASIL </td>
                    <td>:</td>
                    <td><?=number_format($berat/$berat_rongsok*100,2,',','.');?></td>
                </tr>
                <tr>
                    <td style="text-align:left">BS </td>
                    <td>:</td>
                    <td><?=number_format($tot_bs/$berat_rongsok*100,2,',','.');?></td>
                </tr>
                <tr>
                    <td style="text-align:left">SUSUT </td>
                    <td>:</td>
                    <td><?=number_format($berat_susut/$berat_rongsok*100,2,',','.');?></td>
                </tr>
                <tr>
                    <td style="text-align:left">SUSUT 25 %</td>
                    <td>:</td>
                    <td><?=number_format($berat_susut*25/100,2,',','.');?></td>
                </tr>
            </table>
        </td>
        <td colspan="7" style="border-bottom:1px solid #000;border-top:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;">
            <table border="0" width="100%" cellpadding="4" cellspacing="2" >
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