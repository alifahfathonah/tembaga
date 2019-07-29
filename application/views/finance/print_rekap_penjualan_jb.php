<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
      <table width="100%">
        <tr>
          <td align="center">
            <h4>Laporan Rekap Penjualan per <?=tanggal_indo(date('Y-m-d', strtotime($_GET['ts']))).' sampai '.tanggal_indo(date('Y-m-d', strtotime($_GET['te'])));?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellspacing="0" cellpadding="2">
        <thead>
           <tr>
                <th rowspan="2" style="text-align: center; border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">No</th>
                <th rowspan="2" style="text-align: center; border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Kode Barang</th>
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
        $bruto = 0;
        $netto = 0;
        $amount_b = 0;
        $amount_n = 0;
        $last_series = 0;
        $total_bruto = 0;
        $total_netto = 0;
        $total_amount_b = 0;
        $total_amount_n = 0;
        $total_a_b = 0;
        $total_a_n = 0;
        foreach($detailLaporan as $row){
            $total_amount_b = $row->bruto * $row->amount;
            $total_amount_n = $row->netto * $row->amount;
        
        if($last_series!=$row->flag_ppn){
          echo '<tr>
            <td colspan="3" style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; "><strong>Total</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($bruto,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($amount_b,2,',','.').'</strong></td>
            <td colspan="3" style="border:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($netto,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"><strong>'.number_format($amount_n,2,',','.').'</strong></td>
          </tr>';
          $bruto = 0;
          $netto = 0;
          $amount_b = 0;
          $amount_n = 0;
        }else{
           echo '';
        }
        ?>
            <tr>
                <td align="center" style="border-left: 1px solid; border-bottom: 1px solid;"><?= $no ?></td>
                <td style="border-left: 1px solid; border-bottom: 1px solid;"><?= $row->kode;?></td>
                <td style="border-left: 1px solid; border-bottom: 1px solid;"><?= $row->jenis_barang;?></td>
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
        <?php $no++; 
        $last_series = $row->flag_ppn;
        $bruto += $row->bruto;
        $netto += $row->netto;
        $amount_b += $total_amount_b;
        $amount_n += $total_amount_n;
        $total_bruto += $row->bruto;
        $total_netto += $row->netto;
        $total_a_b += $total_amount_b;
        $total_a_n += $total_amount_n;
        } 
        echo 
        '<tr>
            <td colspan="3" style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; "><strong>Total</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($bruto,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($amount_b,2,',','.').'</strong></td>
            <td colspan="3" style="border:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($netto,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"><strong>'.number_format($amount_n,2,',','.').'</strong></td>
          </tr>';
        echo '<tr>
            <td colspan="3" style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:5px solid #000; "><strong>Grand Total</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:5px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($total_bruto,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:5px solid #000; border-bottom:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:5px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($total_a_b,2,',','.').'</strong></td>
            <td colspan="3" style="text-align: right; border-left:1px solid #000; border-top:5px solid #000; border-bottom:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:5px solid #000; border-bottom:1px solid #000;"><strong>'.number_format($total_netto,2,',','.').'</strong></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:5px solid #000; border-bottom:1px solid #000;"></td>
            <td style="text-align: right; border-left:1px solid #000; border-top:5px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"><strong>'.number_format($total_a_n,2,',','.').'</strong></td>
          </tr>';
        ?>
        </tbody>   
        </table>
    </body>
</html>