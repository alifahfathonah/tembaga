<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <!-- <h4>Laporan sisa Sales Order per <?= date("M Y", strtotime($this->uri->segment(3))) ?></h4> -->
            <h3 align="center"><b> Laporan Retur <?php echo " <i>".tanggal_indo($start).' s/d '.tanggal_indo($end)."</i>";?></b></h3>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="3" cellspacing="0" style="font-size: 13px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Nama Barang</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Stok Awal</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Terima Qty</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Kirim Qty</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Potong Qty</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Stok Akhir</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $netto_awal = 0;
        $stok_awal = 0;
        $netto_terima = 0;
        $kirim_qty = 0;
        $potong_qty = 0;

        $t_stok_akhir = 0;
        $t_stok_awal = 0;
        $t_netto_terima = 0;
        $t_kirim_qty = 0;
        $t_potong_qty = 0;

        $last_series = null;
        $last_series2 = null;
        foreach($detailLaporan as $row){ 
 /*           $total_amount = $row->netto * $row->amount;  */
          $stok_akhir = (($row->netto-$row->netto_kirim_b)+$row->netto_terima-$row->netto_kirim-$row->netto_potong);
        ?>
            <tr>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $no ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->jenis_barang ?></td>
              <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->netto-$row->netto_kirim_b,2) ?></td>
              <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?=number_format($row->netto_terima,2);?></td>
              <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?=number_format($row->netto_kirim,2);?></td>
              <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?=number_format($row->netto_potong,2);?></td>
              <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?=number_format((($row->netto-$row->netto_kirim_b)+$row->netto_terima-$row->netto_kirim-$row->netto_potong),2,',','.')?></td>
            </tr>
        <?php $no++;
          $t_stok_awal += $row->netto-$row->netto_kirim_b;
          $t_stok_akhir += $stok_akhir;
          $t_netto_terima += $row->netto_terima;
          $t_kirim_qty += $row->netto_kirim;
          $t_potong_qty += $row->netto_potong;
          }
            echo '<tr>
                  <td colspan="2" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($t_stok_awal,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($t_netto_terima,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($t_kirim_qty,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($t_potong_qty,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($t_stok_akhir,2,',','.').'</td>
                </tr>';
          ?>
        </tbody>   
      </table>
    </body>
</html>