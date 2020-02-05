<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <h4>Laporan Transaksi Rongsok per <?= tanggal_indo(date("Y-m-d", strtotime($end)));?></h4>
            <!-- <h4>Laporan Penjualan <?= d ?></h4> -->
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="3" cellspacing="0">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Barang</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No Bukti</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No Palet</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Masuk</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Keluar</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Saldo</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Keterangan</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $masuk = 0;
        $keluar = 0;
        $saldo = 0;
        $t_masuk = 0;
        $t_keluar = 0;
        $t_saldo = 0;
        $last_series = null;
        foreach($detailLaporan as $row){ 
            if($last_series!=$row->kode_rongsok && $last_series!=null){
              echo '<tr>
                      <td colspan="4" style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                      <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>'.number_format($masuk,2,',','.').'</strong></td>
                      <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>'.number_format($keluar,2,',','.').'</strong></td>
                      <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>'.number_format($saldo,2,',','.').'</strong></td>
                      <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;border-right: 1px solid;"></td>
                    </tr>';
                    $masuk = 0;
                    $keluar = 0;
                    $saldo = 0;
            }
 /*           $total_amount = $row->netto * $row->amount;  */
          $masuk += $row->netto;
          // echo $row->tanggal_keluar;die();
          if(($row->tanggal_keluar >= $start) && ($row->tanggal_keluar <= $end)){
            $keluar += $row->netto;
            $t_keluar += $row->netto;
          }else{
            $saldo += $row->netto;
            $t_saldo += $row->netto;
          }
          $t_masuk += $row->netto;
        ?>
            <tr>
                <td style="border-top: 1px solid;border-left: 1px solid;"><?=$no;?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->nama_item;?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?= $row->no_ttr;?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?= $row->no_pallete;?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->netto,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?=(($row->tanggal_keluar >= $start) && ($row->tanggal_keluar <= $end))? number_format($row->netto,2,',','.'): '-';?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?=number_format($saldo,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?=(($row->tanggal_keluar >= $start) && ($row->tanggal_keluar <= $end))? $row->remarks:'';?></td>
        <?php 
          $no++;
          $last_series = $row->kode_rongsok;
          } ?>
          <tr>
            <td colspan="4" style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>Total</strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong><?=number_format($masuk,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong><?=number_format($keluar,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong><?=number_format($saldo,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;border-right: 1px solid;"></td>
          </tr>
          <tr>
            <td colspan="4" style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;"><strong>Grand Total</strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;"><strong><?=number_format($t_masuk,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;"><strong><?=number_format($t_keluar,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;"><strong><?=number_format($t_saldo,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;border-right: 1px solid;"></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>