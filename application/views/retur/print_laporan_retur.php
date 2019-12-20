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
            <h3 align="center"><b> Laporan Retur <?php echo " <i>".$start.' s/d '.$end."</i>";?></b></h3>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="3" cellspacing="0" style="font-size: 10px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Customer</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No. Retur</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Tanggal</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Keterangan</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Nama Barang</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Netto Awal</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Stok Awal</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Kirim Qty</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Potong Qty</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Tipe Retur</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $netto_awal = 0;
        $stok_awal = 0;
        $kirim_qty = 0;
        $potong_qty = 0;

        $t_netto_awal = 0;
        $t_stok_awal = 0;
        $t_kirim_qty = 0;
        $t_potong_qty = 0;

        $last_series = null;
        $last_series2 = null;
        foreach($detailLaporan as $row){ 
 /*           $total_amount = $row->netto * $row->amount;  */
            if($last_series != $row->nama_customer && $last_series != null){
              echo '<tr>
                  <td colspan="6" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($netto_awal,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($stok_awal,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($kirim_qty,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($potong_qty,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;"></td>
                </tr>';
              $netto_awal = 0;
              $stok_awal = 0;
              $kirim_qty = 0;
              $potong_qty = 0;
            }
        ?>
            <tr>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $no ?></td>
              <?php echo ($last_series==$row->nama_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->nama_customer; ?></td>
              <?php echo ($last_series2==$row->no_retur) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->no_retur; ?></td>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->remarks ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->jenis_barang ?></td>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->netto,2) ?></td>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->netto-$row->netto_kirim_b,2) ?></td>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->jenis_retur==0)? number_format($row->netto_kirim,2): '-';?></td>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->jenis_retur==1)? number_format($row->netto_kirim,2): '-';?></td>
              <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid; font-size: 13px"><?=($row->jenis_retur==0)?"Ganti Barang": "Potong Piutang"; ?></td>
            </tr>
        <?php $no++;
          $netto_awal += $row->netto;
          $stok_awal += $row->netto-$row->netto_kirim_b;
          $t_netto_awal += $row->netto;
          $t_stok_awal += $row->netto-$row->netto_kirim_b;
          if($row->jenis_retur==0){
            $kirim_qty += $row->netto_kirim;
            $t_kirim_qty += $row->netto_kirim;
          }
          if($row->jenis_retur==1){
            $potong_qty += $row->netto_kirim;
            $t_potong_qty += $row->netto_kirim;
          }

          $last_series = $row->nama_customer;
          $last_series2 = $row->no_retur;
          } 
            echo '<tr>
                  <td colspan="6" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($netto_awal,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($stok_awal,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($kirim_qty,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($potong_qty,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;"></td>
                </tr>';
            echo '<tr>
                  <td colspan="6" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($t_netto_awal,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($t_stok_awal,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($t_kirim_qty,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($t_potong_qty,2,',','.').'</td>
                  <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;"></td>
                </tr>';
          ?>
        </tbody>   
      </table>
    </body>
</html>