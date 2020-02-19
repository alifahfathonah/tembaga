<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td colspan="2" align="center">
            <!-- <h4>Laporan sisa Sales Order per <?= date("M Y", strtotime($this->uri->segment(3))) ?></h4> -->
            <h4>Laporan sisa Titipan Bahan Tolling per <?=tanggal_indo(date("Y-m-d")); ?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="1" cellspacing="0" style="font-size: 13px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Customer</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No PO</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Tanggal</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Netto PO</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Netto Kirim</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Netto Terima</th>
                <th width="5%" style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Netto Sisa</th>
           </tr>
         </thead>
         <tbody>
          <?php
          $no = 1;

          $netto_awal_c = 0;
          $netto_terima_c = 0;
          $netto_kirim_c = 0;
          $t_netto_sisa_c = 0;

          $netto_awal = 0;
          $netto_terima = 0;
          $netto_kirim = 0;
          $t_netto_sisa = 0;
          $last_series = null;
          foreach ($detailLaporan as $row){
            if($last_series!=$row->nama_supplier && $last_series!= null){
              $no++;
              echo '
          <tr>
            <td colspan="4" style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; "><strong>Total</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($netto_terima_c,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($netto_awal_c,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($netto_kirim_c,2,',','.').'</strong></td>
            <td style="border:1px solid #000;">'.number_format($t_netto_sisa_c,2,',','.').'</td>
          </tr>';

              $netto_awal_c = 0;
              $netto_terima_c = 0;
              $netto_kirim_c = 0;
              $t_netto_sisa_c = 0;
            }
              echo '<tr>';
              echo ($last_series==$row->nama_supplier)? '<td align="center" style="border-left: 1px solid;"></td>' : '<td align="center" style="border-top: 1px solid; border-left: 1px solid;">'.$no.'</td>';
              echo ($last_series==$row->nama_supplier)? '<td style="border-left:1px solid #000"></td>' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->nama_supplier.'</td>';
              echo '<td style="text-align:right; border-top: 1px solid;border-left: 1px solid">'.$row->no_po.'</td>';
              echo '<td style="text-align:right; border-top: 1px solid;border-left: 1px solid">'.$row->tanggal.'</td>';
              echo '<td style="text-align:right; border-top: 1px solid;border-left: 1px solid">'.number_format($row->netto_awal,2,',','.').'</td>';
              echo '<td style="text-align:right; border-top: 1px solid;border-left: 1px solid">'.number_format($row->netto_kirim,2,',','.').'</td>';
              echo '<td style="text-align:right; border-top: 1px solid;border-left: 1px solid">'.number_format($row->netto_terima,2,',','.').'</td>';
              $netto_sisa = $row->netto_kirim-$row->netto_terima;
              echo '<td style="text-align:right; border-top: 1px solid;border-left: 1px solid;border-right: 1px solid">'.number_format($netto_sisa,2,',','.').'</td>';
              echo '</tr>';
              $last_series = $row->nama_supplier;

              $netto_awal_c += $row->netto_awal;
              $netto_terima_c += $row->netto_terima;
              $netto_kirim_c += $row->netto_kirim;
              $t_netto_sisa_c += $netto_sisa;

              $netto_awal += $row->netto_awal;
              $netto_terima += $row->netto_terima;
              $netto_kirim += $row->netto_kirim;
              $t_netto_sisa += $netto_sisa;
          }
              echo '
          <tr>
            <td colspan="4" style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; "><strong>Total</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($netto_awal_c,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($netto_kirim_c,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($netto_terima_c,2,',','.').'</strong></td>
            <td style="border:1px solid #000;">'.number_format($t_netto_sisa_c,2,',','.').'</td>
          </tr>';
          ?>
          <tr>
            <td colspan="4" style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; "><strong>Grand Total</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong><?=number_format($netto_awal,2,',','.');?></strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong><?=number_format($netto_kirim,2,',','.');?></strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong><?=number_format($netto_terima,2,',','.');?></strong></td>
            <td style="border:1px solid #000;"><?=number_format($t_netto_sisa,2,',','.');?></td>
          </tr>
        </tbody>
      </table>
    </body>
</html>