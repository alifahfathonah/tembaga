<style>
    table { page-break-inside:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    thead { display:table-header-group }
    tfoot { display:table-footer-group }
</style>
<h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>
    LAPORAN PEMAKAIAN BAHAN BAKU APOLLO</h3>
 <h3 align="center"><b>Tahun <?=$tahun;?></b></h3>
    <table class="report" border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size:13px;">
        <thead colspan="3">
            <tr>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Tanggal</strong></td>
                <td colspan="40" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>RONGSOK</strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>TOTAL</strong></td>
            </tr>
            <tr>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">ABCW</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">B C</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">B<br>BAKAR</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">COVER<br>TAPE</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">B<br>TELP</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D<br>KALENG</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D<br>HALUS</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">A RMBT</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>APL</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>ROLL</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>SDM</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">AFK<br>8MM</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>INGOT</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">PIPA</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D/D<br>BARU</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">TRAVO</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>QC</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">DDG</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS 13,5<br>&15,5</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">COPER<br>SCRAP</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">%</th>
            </tr>
        </td>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $ABCW = 0;
    $BC = 0;
    $BBAKAR= 0;
    $COVERTAPE= 0;
    $BTELP= 0;
    $DK = 0;
    $DH = 0;
    $ARMBT= 0;
    $BSAPL= 0;
    $BSROLL= 0;
    $BSSDM= 0;
    $AFK8MM= 0;
    $BSINGOT= 0;
    $PIPA = 0;
    $DDBARU= 0;
    $TRAVO= 0;
    $BSQC = 0;
    $DDG = 0;
    $BS = 0;
    $COPER= 0;
    $total= 0;
    $i = 0;
    foreach ($detailLaporan as $row){
        $p_ABCW = (($row->ABCW>0)? (($row->ABCW/$row->total)*100): 0);
        $p_BC = (($row->BC>0)? (($row->BC/$row->total)*100): 0);
        $p_BBAKAR= (($row->BBAKAR>0)? (($row->BBAKAR/$row->total)*100): 0);
        $p_COVERTAPE= (($row->COVERTAPE>0)? (($row->COVERTAPE/$row->total)*100): 0);
        $p_BTELP= (($row->BTELP>0)? (($row->BTELP/$row->total)*100): 0);
        $p_DK = (($row->DK>0)? (($row->DK/$row->total)*100): 0);
        $p_DH = (($row->DH>0)? (($row->DH/$row->total)*100): 0);
        $p_ARMBT= (($row->ARMBT>0)? (($row->ARMBT/$row->total)*100): 0);
        $p_BSAPL= (($row->BSAPL>0)? (($row->BSAPL/$row->total)*100): 0);
        $p_BSROLL= (($row->BSROLL>0)? (($row->BSROLL/$row->total)*100): 0);
        $p_BSSDM= (($row->BSSDM>0)? (($row->BSSDM/$row->total)*100): 0);
        $p_AFK8MM= (($row->AFK8MM>0)? (($row->AFK8MM/$row->total)*100): 0);
        $p_BSINGOT= (($row->BSINGOT>0)? (($row->BSINGOT/$row->total)*100): 0);
        $p_PIPA = (($row->PIPA>0)? (($row->PIPA/$row->total)*100): 0);
        $p_DDBARU= (($row->DDBARU>0)? (($row->DDBARU/$row->total)*100): 0);
        $p_TRAVO= (($row->TRAVO>0)? (($row->TRAVO/$row->total)*100): 0);
        $p_BSQC = (($row->BSQC>0)? (($row->BSQC/$row->total)*100): 0);
        $p_DDG = (($row->DDG>0)? (($row->DDG/$row->total)*100): 0);
        $p_BS = (($row->BS>0)? (($row->BS/$row->total)*100): 0);
        $p_COPER= (($row->COPER>0)? (($row->COPER/$row->total)*100): 0);

        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->ABCW,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_ABCW,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BC,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BC,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BBAKAR,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BBAKAR,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->COVERTAPE,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_COVERTAPE,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BTELP,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BTELP,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->DK,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_DK,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->DH,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_DH,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->ARMBT,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_ARMBT,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSAPL,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BSAPL,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSROLL,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BSROLL,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSSDM,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BSSDM,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->AFK8MM,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_AFK8MM,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSINGOT,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BSINGOT,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->PIPA,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_PIPA,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->DDBARU,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_DDBARU,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->TRAVO,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_TRAVO,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSQC,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BSQC,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->DDG,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_DDG,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BS,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_BS,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->COPER,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($p_COPER,2,',','.').'</td>';
        echo '<td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->total,2,',','.').'</td>';
        echo '</tr>';
        $no++;
    $ABCW += $row->ABCW;
    $BC += $row->BC;
    $BBAKAR+= $row->BBAKAR;
    $COVERTAPE+= $row->COVERTAPE;
    $BTELP+= $row->BTELP;
    $DK += $row->DK;
    $DH += $row->DH;
    $ARMBT+= $row->ARMBT;
    $BSAPL+= $row->BSAPL;
    $BSROLL+= $row->BSROLL;
    $BSSDM+= $row->BSSDM;
    $AFK8MM+= $row->AFK8MM;
    $BSINGOT+= $row->BSINGOT;
    $PIPA += $row->PIPA;
    $DDBARU+= $row->DDBARU;
    $TRAVO+= $row->TRAVO;
    $BSQC += $row->BSQC;
    $DDG += $row->DDG;
    $BS += $row->BS;
    $COPER+= $row->COPER;
    $total+= $row->total;
    }
        $tp_ABCW = (($ABCW>0)? (($ABCW/$total)*100) : 0);
        $tp_BC = (($BC>0)? (($BC/$total)*100) : 0);
        $tp_BBAKAR= (($BBAKAR>0)? (($BBAKAR/$total)*100) : 0);
        $tp_COVERTAPE= (($COVERTAPE>0)? (($COVERTAPE/$total)*100) : 0);
        $tp_BTELP= (($BTELP>0)? (($BTELP/$total)*100) : 0);
        $tp_DK = (($DK>0)? (($DK/$total)*100) : 0);
        $tp_DH = (($DH>0)? (($DH/$total)*100) : 0);
        $tp_ARMBT= (($ARMBT>0)? (($ARMBT/$total)*100) : 0);
        $tp_BSAPL= (($BSAPL>0)? (($BSAPL/$total)*100) : 0);
        $tp_BSROLL= (($BSROLL>0)? (($BSROLL/$total)*100) : 0);
        $tp_BSSDM= (($BSSDM>0)? (($BSSDM/$total)*100) : 0);
        $tp_AFK8MM= (($AFK8MM>0)? (($AFK8MM/$total)*100) : 0);
        $tp_BSINGOT= (($BSINGOT>0)? (($BSINGOT/$total)*100) : 0);
        $tp_PIPA = (($PIPA>0)? (($PIPA/$total)*100) : 0);
        $tp_DDBARU= (($DDBARU>0)? (($DDBARU/$total)*100) : 0);
        $tp_TRAVO= (($TRAVO>0)? (($TRAVO/$total)*100) : 0);
        $tp_BSQC = (($BSQC>0)? (($BSQC/$total)*100) : 0);
        $tp_DDG = (($DDG>0)? (($DDG/$total)*100) : 0);
        $tp_BS = (($BS>0)? (($BS/$total)*100) : 0);
        $tp_COPER= (($COPER>0)? (($COPER/$total)*100) : 0);
    ?>
    <tr>
        <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>T O T A L</strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($ABCW,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_ABCW,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BC,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BC,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BBAKAR,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BBAKAR,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($COVERTAPE,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_COVERTAPE,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BTELP,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BTELP,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($DK,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_DK,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($DH,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_DH,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($ARMBT,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_ARMBT,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSAPL,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BSAPL,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSROLL,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BSROLL,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSSDM,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BSSDM,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($AFK8MM,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_AFK8MM,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSINGOT,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BSINGOT,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($PIPA,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_PIPA,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($DDBARU,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_DDBARU,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($TRAVO,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_TRAVO,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSQC,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BSQC,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($DDG,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_DDG,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BS,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_BS,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($COPER,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($tp_COPER,2,',','.');?></strong></td>
        <td style="text-align: right; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000"><strong><?=number_format($total,2,',','.');?></strong></td>
    </tr>
    </tbody>
    <tr>
        <td colspan="42" style="border-left:1px solid #000; border-bottom:1px solid #000;border-right:1px solid #000">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" >
                <tr>
                    <td colspan="3" align="center">Tangerang, <?=tanggal_indo(date('Y-m-d'));?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center">Mengetahui. </td>
                    <td style="text-align:center">Disetujui, </td>
                    <td style="text-align:center">Dibuat Oleh, </td>
                </tr>
                <tr style="height:50px;">
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