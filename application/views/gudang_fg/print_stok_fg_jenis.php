 <h2 align="center"><b><u>STOK BARANG JADI</u></b></h2>
 <table width="100%">
    <tr>
        <td width="33%">&nbsp;</td>
        <?php
        $tanggal = tanggal_indo(date("Y-m-d"));
        $split = explode('-', $tanggal);
        ?>
        <td width="34%" align="center"><h3>As Of : <?=date('h:i:s').' '.$split['0'].' '.$split['1'].' '.$split['2'];?></h3></td>
        <td width="33%">&nbsp;</td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td width="32%" style="vertical-align: top">
            <table width="100%" border="0" cellpadding="4" cellspacing="0" style="font-size: 13px;">
                <thead>
                    <th colspan="3" style="border-left:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">KAWAT RAMBUT</th>
                </thead>
                <thead>
                    <th style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000;">Nama Item</th>
                    <th style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">Netto</th>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $netto1 = 0;

                foreach ($detailLaporan as $row){
                    echo '<tr>';
                    echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000;">'.$row->jenis_barang.'</td>';
                    echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;">'.number_format($row->netto,2,',','.').'</td>';
                    echo '</tr>';
                    $no++;
                    $netto1 += $row->netto;
                }
                ?>
                </tbody>
            </table>
        </td>
        <td width="32%" style="vertical-align: top">
            <table width="100%" border="0" cellpadding="4" cellspacing="0" style="font-size: 13px;">
                <thead>
                    <th colspan="3" style="border-left:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">KAWAT HALUS</th>
                </thead>
                <thead>
                    <th style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000;">Nama Item</th>
                    <th style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">Netto</th>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $netto2 = 0;

                foreach ($detailLaporan2 as $row){
                    echo '<tr>';
                    echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000;">'.$row->jenis_barang.'</td>';
                    echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;">'.number_format($row->netto,2,',','.').'</td>';
                    echo '</tr>';
                    $no++;
                    $netto2 += $row->netto;
                }
                ?>
                </tbody>
            </table>
        </td>
        <td width="32%" style="vertical-align: top">
            <table width="100%" border="0" cellpadding="4" cellspacing="0" style="font-size: 13px;">
                <thead>
                    <th colspan="3" style="border-left:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">KAWAT BERAS</th>
                </thead>
                <thead>
                    <th style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000;">Nama Item</th>
                    <th style="border-bottom:1px solid #000; border-left:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">Netto</th>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $netto3 = 0;

                foreach ($detailLaporan3 as $row){
                    echo '<tr>';
                    echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000;">'.$row->jenis_barang.'</td>';
                    echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;">'.number_format($row->netto,2,',','.').'</td>';
                    echo '</tr>';
                    $no++;
                    $netto3 += $row->netto;
                }
                ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td style="border-left: 1px solid #000;border-right: 1px solid #000; border-top: 1px solid #000; border-bottom: 1px solid #000;">
            <table width="100%">
                <tr>
                    <td><strong>SUB TOTAL</strong></td>
                    <td colspan="2" style="text-align: center;"><strong><?=number_format($netto1,2,',','.');?></strong></td>
                </tr>
            </table>
        </td>
        <td style="border-left: 1px solid #000;border-right: 1px solid #000; border-top: 1px solid #000; border-bottom: 1px solid #000;">
            <table width="100%">
                <tr>
                    <td><strong>SUB TOTAL</strong></td>
                    <td colspan="2" style="text-align: center;"><strong><?=number_format($netto2,2,',','.');?></strong></td>
                </tr>
            </table>
        </td>
        <td style="border-left: 1px solid #000;border-right: 1px solid #000; border-top: 1px solid #000; border-bottom: 1px solid #000;">
            <table width="100%">
                <tr>
                    <td><strong>SUB TOTAL</strong></td>
                    <td colspan="2" style="text-align: center;"><strong><?=number_format($netto3,2,',','.');?></strong></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <table width="100%" style="font-size: 13px;">
            <tr>
                <td width="10%"></td>
                <td style="text-align: left;" width="25%">GRAND TOTAL :</td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td width="10%"></td>
                <td style="text-align: left;" width="25%">STOCK BARANG JADI</td>
                <td style="text-align: left;" width="15%"><strong>PER <?=date("d-m-Y");?></strong></td>
                <td style="text-align: right;"><?=number_format($netto1+$netto2+$netto3,2,',','.');?></td>
                <td width="40%"></td>
            </tr>
            <tr>
                <td width="10%"></td>
                <td style="text-align: left;" width="25%">PENJUALAN</td>
                <td style="text-align: left;" width="15%"><strong>PER <?=date("d-m-Y");?></strong></td>
                <td style="text-align: right;"><?=number_format($header['penjualan']['netto'],2,',','.');?></td>
                <td width="40%"></td>
            </tr>
            <tr>
                <td width="10%"></td>
                <td style="text-align: left;" width="25%">TOTAL PENJUALAN</td>
                <td style="text-align: left;" width="15%"><strong>PER <?=date("d-m-Y");?></strong></td>
                <td style="text-align: right;"><?=number_format($header['t_penjualan']['netto'],2,',','.');?></td>
                <td width="40%"></td>
            </tr>
            <tr>
                <td width="10%"></td>
                <td style="text-align: left;" width="25%">STOCK 8 MM TMS</td>
                <td style="text-align: left;" width="15%"><strong>PER <?=date("d-m-Y");?></strong></td>
                <td style="text-align: right;"><?=number_format($header['8mm']['total_berat_in']-$header['8mm']['total_berat_out'],2,',','.');?></td>
                <td width="40%"></td>
            </tr>
            <tr>
                <td width="10%"></td>
                <td style="text-align: left;" width="25%">STOCK 7,6 ALUM MM</td>
                <td style="text-align: left;" width="15%"><strong>PER <?=date("d-m-Y");?></strong></td>
                <td style="text-align: right;"><?=number_format($header['76mm']['total_netto'],2,',','.');?></td>
                <td width="40%"></td>
            </tr>
            <tr>
                <td width="10%"></td>
                <td style="text-align: left;" width="25%">STOCK 2,60 MM TMS</td>
                <td style="text-align: left;" width="15%"><strong>PER <?=date("d-m-Y");?></strong></td>
                <td style="text-align: right;"><?=number_format($header['26mm']['total_netto'],2,',','.');?></td>
                <td width="40%"></td>
            </tr>
            <!-- <tr>
                <td width="10%"></td>
                <td style="text-align: left;" width="25%">STOCK 2,80 MM TMS</td>
                <td style="text-align: left;" width="15%"><strong>PER <?=date("d-m-Y");?></strong></td>
                <td style="text-align: right;"><?=number_format($netto1+$netto2+$netto3,2,',','.');?></td>
                <td width="40%"></td>
            </tr> -->
        </table>
    </tr>
</table>
    <body onLoad="window.print()">
    </body>