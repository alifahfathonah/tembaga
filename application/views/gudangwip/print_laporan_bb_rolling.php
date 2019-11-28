 <h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>
    LAPORAN PEMAKAIAN BAHAN BAKAR ROLLING</h3>
 <h3 align="center"><b><?php echo " <i>".tanggal_indo(date('Y-m-d', strtotime($start))).' s/d '.tanggal_indo(date('Y-m-d', strtotime($end)))."</i>";?></b></h3>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <tr>
        <td colspan="3">
        <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
            <tr>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>TANGGAL</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>V (DIGITAL)</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>GAS</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>HASIL PRODUKSI</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROLLING<br>RATA-RATA<br>M<sup>3</sup>/KG KIRI</strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>ROLLING<br>RATA-RATA<br>M<sup>3</sup>/KG KANAN</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS(KIRI)</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS(KANAN)</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS(KIRI)</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS(KANAN)</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>ROD MM(GAS)</strong></td>
            </tr>
        </td>
    </tr>
    <tbody>
    <?php
    $no = 1;
    $gas = 0;
    $gas_r = 0;
    $hasil = 0;
    $v_digital10 = 0;
    $v_digital9 = 0;
    foreach ($gas_detail as $value) {
        ${"gas".$value->jenis_barang_id} = $value->netto;
    }
    if(empty($gas9)||$gas9==0){
        $gas9 = 0;//kanan
    }
    if(empty($gas10)||$gas10==0){
        $gas10 = 0;//kiri
    }
    $v_digital10 += $gas10;
    $v_digital9 += $gas9;
    foreach ($detailLaporan as $row){
        $rata2 = $row->gas/$row->berat;
        $rata2_r = $row->gas_r/$row->berat;
        $v_digital10 +=$row->gas;
        $v_digital9 +=$row->gas_r;
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($v_digital10,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($v_digital9,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->gas,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->gas_r,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($rata2,10,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">'.number_format($rata2_r,10,',','.').'</td>';
        echo '</tr>';
        $no++;
        $gas += $row->gas;
        $gas_r += $row->gas_r;
        $hasil += $row->berat;
    }
    $rrm = ($gas+$gas_r)/$hasil;
    $rrkiri = $gas/$hasil;
    $rrkanan = $gas_r/$hasil;
    ?>
    <tr>
        <td colspan="2" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Grand Total</strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($gas,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($gas_r,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($hasil,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($rrkiri,10,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;"><?=number_format($rrkanan,10,',','.');?></td>
    </tr>
    </tr>
    </tbody>
    <tr>
        <td colspan="5" style="text-align: left; border-bottom:1px solid #000; border-left:1px solid #000;">
            <table border="0" width="100%" style="text-align:left">
                <tr>
                    <td>TOTAL PEMAKAIAN BAHAN BAKAR ROLLING (GAS)</td>
                    <td>=</td>
                    <td><?=number_format($gas+$gas_r,2,',','.');?></td>
                </tr>
                <tr>
                    <td>TOTAL HASIL ROLLING (GAS)</td>
                    <td>=</td>
                    <td><?=number_format($hasil,2,',','.');?></td>
                </tr>
                <tr>
                    <td>RATA PEMAKAIAN BAHAN BAKAR ROLLING (GAS)</td>
                    <td>=</td>
                    <td><?=number_format($rrm,5,',','.');?></td>
                </tr>
            </table>
        </td>
        <td colspan="4" style="border-bottom:1px solid #000; border-right:1px solid #000;">
            <table border="0" width="100%">
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