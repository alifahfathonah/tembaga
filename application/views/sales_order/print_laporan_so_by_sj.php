<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <h4>Laporan Surat Jalan per <?=tanggal_indo(date('Y-m-d', strtotime($_GET['ts']))).' sampai '.tanggal_indo(date('Y-m-d', strtotime($_GET['te'])));?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="2" cellspacing="0" style="font-size: 12px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">No. Surat Jalan</th>
                <th style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Nama Customer</th>
                <th style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Tanggal</th>
                <th style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Nama Barang</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Satuan</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Qty</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Bruto</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;">Netto</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $qty=0;
        $bruto = 0;
        $netto = 0;
        $last_series = null;
        $total_amount = 0;
        foreach($detailLaporan as $row){ 
            $total_amount = $row->netto * $row->amount;
        ?>
            <tr>
                <?php echo ($last_series==$row->no_surat_jalan) ? '<td align="center" style="border-left: 1px solid;">' : '<td align="center" style="border-top: 1px solid; border-left: 1px solid;">'.$no; ?></td>
                <?php echo ($last_series==$row->no_surat_jalan) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->no_surat_jalan; ?></td>
                <?php echo ($last_series==$row->no_surat_jalan) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->nama_customer; ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?= $row->jenis_barang ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->uom ?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->qty ?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->bruto,2) ?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?= number_format($row->netto,2) ?></td>
            </tr>
        <?php $no++; $qty+=$row->qty; $bruto+=$row->bruto; $netto+=$row->netto; 
          $last_series = $row->no_surat_jalan;
        } ?>
            <tr>
              <td colspan="6" style="text-align:right; border-bottom: 1px solid; border-top: 1px solid; border-left: 1px solid;"><strong>Total</strong></td>
              <td style="text-align:right; border-bottom: 1px solid; border-top: 1px solid; border-left: 1px solid;"><strong><?=$qty;?></strong></td>
              <td style="text-align:right; border-bottom: 1px solid; border-top: 1px solid; border-left: 1px solid;"><strong><?=number_format($bruto,2,',','.');?></strong></td>
              <td style="text-align:right; border-bottom: 1px solid; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><strong><?=number_format($netto,2,',','.');?></strong></td>
            </tr>
        </tbody>   
      </table>
    </body>
</html>