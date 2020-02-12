 <h3 style="text-align: center; text-decoration: underline;"><!-- PT. KAWAT MAS PRAKASA<br> -->
    LAPORAN PEMAKAIAN BAHAN BAKU APOLLO</h3>
 <h3 align="center"><b><?php echo " <i>".tanggal_indo(date('Y-m-d', strtotime($start))).' s/d '.tanggal_indo(date('Y-m-d', strtotime($end)))."</i>";?></b></h3>
<?php $ex = explode('-',tanggal_indo(date('Y-m-d', strtotime($end))));?>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <tr>
        <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size:13px;">
        <td colspan="3">
            <tr>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Tanggal</strong></td>
                <td colspan="20" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>RONGSOK</strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>TOTAL</strong></td>
            </tr>
            <tr>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">ABCW</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">B C</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">B<br>BAKAR</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">COVER<br>TAPE</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">B<br>TELP</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D<br>KALENG</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D<br>HALUS</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">A RMBT</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>APL</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>ROLL</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>SDM</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">AFK<br>8MM</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>INGOT</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">PIPA</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">D/D<br>BARU</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">TRAVO</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS<br>QC</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">DDG</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">BS 13,5<br>&15,5</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">COPER<br>SCRAP</th>
            </tr>
        </td>
    </tr>
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
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->ABCW,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BC,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BBAKAR,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->COVERTAPE,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BTELP,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->DK,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->DH,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->ARMBT,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSAPL,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSROLL,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSSDM,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->AFK8MM,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSINGOT,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->PIPA,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->DDBARU,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->TRAVO,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BSQC,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->DDG,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->BS,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.number_format($row->COPER,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->total,2,',','.').'</td>';
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
    ?>
    <tr>
        <td style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Grand Total</strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($ABCW,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BC,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BBAKAR,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($COVERTAPE,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BTELP,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($DK,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($DH,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($ARMBT,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSAPL,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSROLL,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSSDM,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($AFK8MM,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSINGOT,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($PIPA,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($DDBARU,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($TRAVO,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BSQC,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($DDG,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($BS,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($COPER,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000"><strong><?=number_format($total,2,',','.');?></strong></td>
    </tr>
    </tbody>
    <tr>
        <td colspan="14" style="border-bottom:1px solid #000;border-left:1px solid #000;">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" style="font-size: 14px;">
                <tr>
                    <td colspan="11"><strong><u>PEMAKAIAN BAHAN BAKU APOLLO :</u> &nbsp; <?='<u>'.strtoupper($ex[1]).'</u> '.$ex[2];?></strong></td>
                </tr>
                <tr>
                    <td colspan="11">&nbsp;</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>A. BCW</td>
                    <td>=</td>
                    <td align="right"><?=number_format($ABCW,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($ABCW/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>11</td>
                    <td>AFKIR 8 MM </td>
                    <td>=</td>
                    <td align="right"><?=number_format($AFK8MM,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($AFK8MM/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>BC</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BC,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BC/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>12</td>
                    <td>BS INGOT</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BSINGOT,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BSINGOT/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>COVER TAPE</td>
                    <td>=</td>
                    <td align="right"><?=number_format($COVERTAPE,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($COVERTAPE/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>13</td>
                    <td>PIPA</td>
                    <td>=</td>
                    <td align="right"><?=number_format($PIPA,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($PIPA/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>B BAKAR</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BBAKAR,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BBAKAR/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>14</td>
                    <td>DINAMO</td>
                    <td>=</td>
                    <td align="right"><?=number_format($DDBARU,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($DDBARU/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>B TELP</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BTELP,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BTELP/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>15</td>
                    <td>TRAVO</td>
                    <td>=</td>
                    <td align="right"><?=number_format($TRAVO,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($TRAVO/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>D KALENG</td>
                    <td>=</td>
                    <td align="right"><?=number_format($DK,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($DK/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>16</td>
                    <td>SCRAP</td>
                    <td>=</td>
                    <td align="right"><?=number_format($COPER,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($COPER/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>D HALUS</td>
                    <td>=</td>
                    <td align="right"><?=number_format($DH,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($DH/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>17</td>
                    <td>BS QC</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BSQC,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BSQC/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>A RAMBUT</td>
                    <td>=</td>
                    <td align="right"><?=number_format($ARMBT,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($ARMBT/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>18</td>
                    <td>BS 13,5 & 15,4 mm</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BS,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BS/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>BS APOLLO</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BSAPL,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BSAPL/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>19</td>
                    <td>BS TALI ROLLING</td>
                    <td>=</td>
                    <td align="right"><?=number_format($COPER,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($COPER/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>BS ROLLING</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BSROLL,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BSROLL/$total*100,3,',','.');?> %</td>
                    <td width="7%"></td>
                    <td>20</td>
                    <td>BS SDM</td>
                    <td>=</td>
                    <td align="right"><?=number_format($BSSDM,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </td>
                    <td align="right"><?=number_format($BSSDM/$total*100,3,',','.');?> %</td>
                </tr>
                <tr>
                    <td colspan="7">&nbsp;</td>
                    <td><strong>TOTAL</strong></td>
                    <td><strong>=</strong></td>
                    <td align="right"><strong><?=number_format($total,2,',','.');?> &nbsp; KG &nbsp; = &nbsp; </strong></td>
                    <td align="right"><strong>100,000 %</strong></td>
                </tr>
                <tr>
                    <td colspan="11">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="11">TOTAL PEMAKAIAN BAHAN BAKAR BAGIAN FURNACE BULAN <?=strtoupper($ex[1]).' '.$ex[2].' (GAS) = '.number_format($addition['gas'],2,',','.');?> M<sup>3</sup></td>
                </tr>
                <tr>
                    <td colspan="11">TOTAL PEMAKAIAN KAYU BAGIAN FURNACE BULAN <?=strtoupper($ex[1]).' '.$ex[2].' (KAYU) = '.number_format($addition['kayu'],2,',','.');?> BTG</td>
                </tr>
            </table>
        </td>
        <td colspan="8" style="border-bottom:1px solid #000;border-right:1px solid #000">
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