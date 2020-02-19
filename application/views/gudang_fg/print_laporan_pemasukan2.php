<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <h4>Laporan Pemasukan <?=$header;?> Finish Good per <?= tanggal_indo(date("Y-m-d", strtotime($_GET['ts']))).' sampai '.tanggal_indo(date("Y-m-d", strtotime($_GET['te'])));?></h4>
            <!-- <h4>Laporan Penjualan <?= d ?></h4> -->
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="3" cellspacing="0">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Tanggal</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Kode</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Barang</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No Packing</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">UOM</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Bruto</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Netto</th>
           </tr>
         </thead>
         <tbody style="font-size: 11px;">
        <?php 
        $no = 1; 
        $bruto = 0;
        $netto = 0;
        $t_bruto = 0;
        $t_netto = 0;
        $last_series = null;
        foreach($detailLaporan as $row){ 
            if($last_series!=$row->kode && $last_series!=null){
              echo '<tr>
                      <td colspan="6" style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                      <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>'.number_format($bruto,2,',','.').'</strong></td>
                      <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;border-right: 1px solid;"><strong>'.number_format($netto,2,',','.').'</strong></td>
                    </tr>';
                    $bruto = 0;
                    $netto = 0;
            }
 /*           $total_amount = $row->netto * $row->amount;  */
        ?>
            <tr>
                <td style="border-top: 1px solid;border-left: 1px solid;"><?=$no;?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->tanggal;?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->kode;?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->jenis_barang;?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->no_packing;?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->uom;?></td>
                <td style="border-top: 1px solid; border-left: 1px solid; text-align:right;"><?= number_format($row->bruto,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?= number_format($row->netto,2,',','.');?></td>
        <?php 
          $no++;
          $last_series = $row->kode;
          $bruto += $row->bruto;
          $netto += $row->netto;
          $t_bruto += $row->bruto;
          $t_netto += $row->netto;
          } ?>
          <tr>
            <td colspan="6" style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>Total</strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong><?=number_format($bruto,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;border-right: 1px solid;"><?=number_format($netto,2,',','.');?></td>
          </tr>
          <tr>
            <td colspan="6" style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;"><strong>Grand Total</strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;"><strong><?=number_format($t_bruto,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;border-right: 1px solid;"><?=number_format($t_netto,2,',','.');?></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>