<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%">
        <tr>
          <td align="center">
            <h4>Laporan Penjualan per <?= date("M Y", strtotime($this->uri->segment(3))) ?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellspacing="0" cellpadding="2">
        <thead>
           <tr>
                <th rowspan="2" style="text-align: center; border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">No</th>
                <th rowspan="2" style="text-align: center; border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Nama Barang</th>
                <th colspan="3" style="text-align: center; border-left: 1px solid; border-top: 1px solid;">Penjualan Bruto</th>
                <th colspan="3" style="text-align: center; border-left: 1px solid; border-top: 1px solid;">Retur</th>
                <th colspan="3" style="text-align: center; border-left: 1px solid; border-top: 1px solid; border-right: 1px solid;">Penjualan Netto</th>
           </tr>
           <tr>
               <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">(KG)</th>
               <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Harga(Rp.)</th>
               <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Value(Rp.)</th>
               <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">(KG)</th>
               <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Harga(Rp.)</th>
               <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Value(Rp.)</th>
               <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">(KG)</th>
               <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Harga(Rp.)</th>
               <th style="text-align: center; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid; border-bottom: 1px solid;">Value(Rp.)</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $total_amount_b = 0;
        $total_amount_n = 0;
        foreach($detailLaporan as $row){ 
            $total_amount_b = $row->bruto * $row->amount;
            $total_amount_n = $row->netto * $row->amount;
        ?>
            <tr>
                <td align="center" style="border-left: 1px solid; border-bottom: 1px solid;"><?= $no ?></td>
                <td style="border-left: 1px solid; border-bottom: 1px solid;"><?= $row->jenis_barang ?></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid;"><?= number_format($row->bruto,2) ?></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid;"><?= number_format($row->amount,2) ?></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid;"><?= number_format($total_amount_b,2) ?></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid;"></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid;"></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid;"></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid;"><?= number_format($row->netto,2) ?></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid;"><?= number_format($row->amount,2) ?></td>
                <td align="right" style="border-left: 1px solid; border-bottom: 1px solid; border-right: 1px solid;"><?= number_format($total_amount_n,2) ?></td>
            </tr>
        <?php $no++; } ?>
        </tbody>   
        </table>
    </body>
</html>