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
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>V (DIGITAL)</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>GAS</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>HASIL PRODUKSI</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>APOLLO 3<br>RATA-RATA<br>M<sup>3</sup>/KG</strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>APOLLO 4<br>RATA-RATA<br>M<sup>3</sup>/KG</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>INGOT III</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>INGOT IV</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>INGOT III</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>INGOT IV</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>INGOT III</strong></td>
                <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>INGOT IV</strong></td>
            </tr>
        </td>
    </tr>
    <tbody>
    <?php
    $no = 1;
    $gas3 = 0;
    $gas4 = 0;
    $hasil3 = 0;
    $hasil4 = 0;
    foreach ($detailLaporan as $row){
        if($row->berat_ingot3 == 0){
            $rata2m3 = 0;
        }else{
            $rata2m3 = ($row->gas3)/$row->berat_ingot3;
        }
        if($row->berat_ingot4 == 0){
            $rata2m4 = 0;
        }else{
            $rata2m4 = ($row->gas4)/$row->berat_ingot4;
        }
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis == 3)? number_format($row->v_digital,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->jenis == 4)? number_format($row->v_digital,2,',','.'):'-').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->gas3,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->gas4,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_ingot3,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->berat_ingot4,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($rata2m3,10,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">'.number_format($rata2m4,10,',','.').'</td>';
        echo '</tr>';
        $no++;
        $gas3 += $row->gas3;
        $gas4 += $row->gas4;
        $hasil3 += $row->berat_ingot3;
        $hasil4 += $row->berat_ingot4;
    }
    $rrm3 = $gas3/$hasil3;
    $rrm4 = $gas4/$hasil4;
    $rrm = ($gas3+$gas4)/($hasil3+$hasil4);
    ?>
    <tr>
        <td colspan="2" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Grand Total</strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;">-</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($gas3,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($gas4,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($hasil3,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($hasil4,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><?=number_format($rrm3,10,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;"><?=number_format($rrm4,10,',','.');?></td>
    </tr>
    </tr>
    </tbody>
    <tr>
        <td colspan="7" style="text-align: left; border-bottom:1px solid #000; border-left:1px solid #000;">
            <table border="0" width="100%" style="text-align:left">
                <tr>
                    <td>TOTAL PEMAKAIAN BAHAN BAKAR ROLLING (GAS)</td>
                    <td>=</td>
                    <td><?=number_format($gas3+$gas4,2,',','.');?></td>
                </tr>
                <tr>
                    <td>TOTAL HASIL ROLLING (GAS)</td>
                    <td>=</td>
                    <td><?=number_format($hasil3+$hasil4,2,',','.');?></td>
                </tr>
                <tr>
                    <td>RATA PEMAKAIAN BAHAN BAKAR ROLLING (GAS)</td>
                    <td>=</td>
                    <td><?=number_format($rrm,5,',','.');?></td>
                </tr>
            </table>
        </td>
        <td colspan="3" style="border-bottom:1px solid #000; border-right:1px solid #000;">
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