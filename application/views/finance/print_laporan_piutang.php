<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <h4>Daftar Piutang Belum Lunas per <?=tanggal_indo(date('Y-m-d'));?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="1" cellspacing="0" style="font-size: 11px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Kode</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Customer</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No. Invoice</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Tgl</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Tgl JT</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Saldo (Rp.)</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Saldo (US$)</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">CM</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $last_series = null;
        $ni = 0;
        $nus = 0;
        $nt = 0;
        $total_invoice = 0;
        $nilai_us = 0;
        $nilai_total = 0;
        foreach($detailLaporan as $row){ 
              $nilai_invoice = $row->nilai_invoice - $row->nilai_invoice_bayar;
 /*           $total_amount = $row->netto * $row->amount;  */
              if($last_series != $row->kode_customer && $last_series != null){
                echo '<tr>
                    <td colspan="6" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($ni,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;">'.number_format($nus,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($nt,2,',','.').'</td>
                  </tr>';
                  $no++;
                $ni = 0;
                $nus = 0;
                $nt = 0;
              }
        ?>
            <tr>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$no ; ?></td>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->kode_customer ; ?></td>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->nama_customer; ?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->no_invoice ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= date('d-m-Y', strtotime($row->tgl_jatuh_tempo)) ?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($nilai_invoice,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->nilai_us,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?= number_format($row->nilai_cm,2,',','.');?></td>
        <?php 
          $last_series = $row->kode_customer;
          $ni +=$nilai_invoice;
          $nt += $row->nilai_cm;
          $total_invoice +=$nilai_invoice;
          $nilai_us += $row->nilai_us;
          $nilai_total += $row->nilai_cm;
          } ?>
          <tr>
            <td colspan="6" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
            <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;"><?=number_format($ni,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid;"><?=number_format($nus,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:4px solid; border-left: 1px solid; border-right: 1px solid;"><?=number_format($nt,2,',','.');?></td>
          </tr>
          <tr>
            <td colspan="6" style="text-align: right; border-top: 5px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Grand Total</strong></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($total_invoice,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_us,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"><?=number_format($nilai_total,2,',','.');?></td></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>