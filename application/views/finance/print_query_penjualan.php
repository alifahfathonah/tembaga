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
            <h4>Laporan Penjualan <?= date("M Y") ?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="0" cellspacing="0">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Customer</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No. Sales Order</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No. Invoice</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Tanggal</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Jenis Barang SO</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Kode Barang</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Nama Barang</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Netto</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Total Harga</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Tipe SO</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $last_series = null;
        foreach($detailLaporan as $row){ 
 /*           $total_amount = $row->netto * $row->amount;  */
        ?>
            <tr>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $no ?></td>
                <?php echo ($last_series==$row->no_sales_order) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->customer; ?></td>
                <?php echo ($last_series==$row->no_sales_order) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->no_sales_order; ?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->no_invoice ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->tipe ?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?= $row->kode_barang ?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?= $row->nama_barang ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->netto,2) ?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->total_harga,2) ?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?= ($row->flag_tolling==0) ? 'SO Biasa' : 'SO Tolling'; ?></td>
        <?php $no++;
          $last_series = $row->no_sales_order;
          } ?>
        </tbody>   
      </table>
    </body>
</html>