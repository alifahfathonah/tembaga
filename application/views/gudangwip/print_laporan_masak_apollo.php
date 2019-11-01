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
                    <td rowspan="2" style="text-align:center; border-bottom:1px solid #000; border-top:1px solid #000;"><br><strong>NO</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong><br>TANGGAL</strong></td>
                    <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>RONGSOK</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong><br>TOTAL</strong></td>
                    <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>HASIL INGOT</strong></td>
                    <td colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BS INGOT</strong></td>
                    <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BS APOLLO</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>SUSUT<br>APOLLO</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong><br>%</strong></td>
                    <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong><br>Minyak<strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS</strong></td>
                </tr>
                <tr>
                    <td style="text-align:center; border-bottom:1px solid #000; border-top:1px solid #000; border-left: 1px solid #000"><strong>A</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>B</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>D</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BTG</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BTG</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KG</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>%</strong></td>
                    <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-left:1px solid #000;"><strong>(M<sup>3</sup>)</strong></td>
                </tr>
<?php
    $no = 0;
    $berat_rongsok = 0;
    $berat_rongsok_a = 0;
    $berat_rongsok_b = 0;
    $berat_rongsok_d = 0;
    $berat_ingot = 0;
    $berat = 0;
    $berat_susut = 0;
    $gas = 0;
    $bs_service = 0;
    $bs = 0;
    $count = 0;
    foreach ($detailLaporan as $row){
        $no++;
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->tipe=='A')?number_format($row->total_rongsok,2,',','.') : '-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->tipe=='B')?number_format($row->total_rongsok,2,',','.') : '-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->tipe=='D')?number_format($row->total_rongsok,2,',','.') : '-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->total_rongsok,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->ingot,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_ingot,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs_service,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->bs,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->total_rongsok-$row->berat_ingot-$row->bs-$row->bs_service,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">-</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->gas+$row->gas_r,2,',','.').'</td>';
        echo '</tr>';
        $berat_rongsok += $row->total_rongsok;
        if($row->tipe=='A'){
            $berat_rongsok_a += $row->total_rongsok;
        }elseif($row->tipe=='B'){
            $berat_rongsok_b += $row->total_rongsok;
        }else{
            $berat_rongsok_d += $row->total_rongsok;
        }

        $berat_ingot += $row->ingot;
        $berat += $row->berat_ingot;
        $berat_susut += $row->total_rongsok-$row->berat_ingot-$row->bs-$row->bs_service;
        $gas += $row->gas+$row->gas_r;
        $bs += $row->bs;
        $bs_service += $row->bs_service;
        $count += $row->count;
    }
    $hasil = $berat/$berat_rongsok*100;
    $hasil_bss = $bs_service/$berat_rongsok*100;
    $hasil_bs = $bs/$berat_rongsok*100;
    $all_bs = $hasil_bss + $hasil_bs;
    $tot_bs = $bs+$bs_service;
    $hasil_susut = $berat_susut/$berat_rongsok*100;
    ?>
                <tbody>
                    <tr>
                        <td colspan="2" style="border-bottom: 1px solid #000;"><strong>Grand Total</strong></td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat_rongsok_a,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat_rongsok_b,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat_rongsok_d,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat_rongsok,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat_ingot,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($hasil,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($hasil_bss,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($hasil_bss,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($bs,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($hasil_bs,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($berat_susut,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($hasil_susut,2,',','.');?>
                        </td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
                        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">
                            <?=number_format($gas,2,',','.');?>
                        </td>
                    </tr>
                </tbody>
                <tr>
                    <td style="border-bottom:1px solid #000; text-align: center;" colspan="18">
                        <?=number_format($berat,2,',','.').' + '.number_format($bs_service,2,',','.').' + '.number_format($bs,2,',','.').' + '.number_format($berat_susut,2,',','.').' = '.number_format($berat+$berat_susut+$tot_bs,2,',','.');?>
                    </td>
                </tr>
            </table>
        </td>
        <td rowspan="2">
            <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                <tr>
                    <td style="height: 50px;text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong><br>KETERANGAN</strong></td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-size:12px;">
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">
                        <?=$no;?> HARI =
                            <?=$count;?> X PELEBURAN</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000"></td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">Prosentasi</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">Hasil :
                        <?=number_format($hasil,2,',','.');?>%</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">BS :
                        <?=number_format($all_bs,2,',','.');?>%</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">Susut :
                        <?=number_format($hasil_susut,2,',','.');?>%</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">Susut di Pot. 25% :</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; text-align: right;border-right:1px solid #000">
                        <?=number_format($berat_susut*75/100,2,',','.');?>
                            <br>
                            <?=number_format($hasil_susut*75/100,2,',','.');?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">Rata-rata pemakaian bahan baku/harian</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; text-align: right;border-right:1px solid #000">
                        <?=number_format($berat_rongsok/$no,2,',','.');?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">Rata-rata BS/hari</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; text-align: right;border-right:1px solid #000">
                        <?=number_format($tot_bs/$no,2,',','.');?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000;">Rata-rata Susut/hari</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; text-align: right;border-right:1px solid #000">
                        <?=number_format($berat_susut/$no,2,',','.');?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">Rata-rata Pemakaian Bahan Bakar Gas<br>M<sup>3</sup>/Kg = M<sup>3</sup></td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; text-align: right;border-right:1px solid #000">
                        <?=number_format($gas/$berat,10,',','.');?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">M<sup>3</sup>/Ton = M<sup>3</sup></td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; text-align: right;border-right:1px solid #000">
                        <?=number_format($gas/($berat/1000),4,',','.');?>
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">Rata-rata Pemakaian=F.K<br>M<sup>3</sup>/Kg = M<sup>3</sup></td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; text-align: right;border-right:1px solid #000">&nbsp;</td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">M<sup>3</sup>/Ton = M<sup>3</sup></td>
                </tr>
                <tr>
                    <td style="padding-left: 3px; border-left:1px solid #000; text-align: right; border-right:1px solid #000">&nbsp;</td>
                </tr>
                <tr style="font-size: 10px;">
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000">SUSUT = KG (25%)</td>
                </tr>
                <tr style="text-align: right;">
                    <td style="padding-left: 3px; border-left:1px solid #000; border-right:1px solid #000;border-bottom:1px solid #000;"><?=number_format($berat_susut,2,',','.');?><br><?=number_format($berat_susut*25/100,2,',','.');?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #000;">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" >
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