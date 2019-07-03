<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <h4>Laporan Penjualan per <?= date("M Y", strtotime($this->uri->segment(3))) ?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="2" cellspacing="0">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">No. Surat Jalan</th>
                <th style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Tanggal</th>
                <th style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Nama Barang</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Satuan</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Qty</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Bruto</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Netto</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid; border-bottom: 1px solid;">Sub Total</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $total_amount = 0;
        foreach($detailLaporan as $row){ 
            $total_amount = $row->netto * $row->amount;
        ?>
            <tr>
                <td align="center" style="border-bottom: 1px solid; border-left: 1px solid;"><?= $no ?></td>
                <td style="border-bottom: 1px solid; border-left: 1px solid;"><?= $row->no_surat_jalan ?></td>
                <td align="center" style="border-bottom: 1px solid; border-left: 1px solid;"><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                <td style="border-bottom: 1px solid; border-left: 1px solid;"><?= $row->jenis_barang ?></td>
                <td align="center" style="border-bottom: 1px solid; border-left: 1px solid;"><?= $row->uom ?></td>
                <td align="right" style="border-bottom: 1px solid; border-left: 1px solid;"><?= $row->qty ?></td>
                <td align="right" style="border-bottom: 1px solid; border-left: 1px solid;"><?= number_format($row->bruto,2) ?></td>
                <td align="right" style="border-bottom: 1px solid; border-left: 1px solid;"><?= number_format($row->netto,2) ?></td>
                <td align="right" style="border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?= number_format($total_amount,2) ?></td>
            </tr>
        <?php $no++; } ?>
        </tbody>   
      </table>
    </body>
</html>