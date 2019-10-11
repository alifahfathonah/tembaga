<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()"><strong>PT. KAWAT MAS PRAKASA</strong><br>

      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <h4>Laporan Detail Penjualan per <?=tanggal_indo(date('Y-m-d', strtotime($_GET['ts']))).' sampai '.tanggal_indo(date('Y-m-d', strtotime($_GET['te'])));?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="2" cellspacing="0" style="font-size: 13px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Kode</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Customer</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No. Surat Jalan</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Tanggal</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Kode Barang</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Jenis Barang</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Netto</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Cur</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Nilai Invoice</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Nilai PPN</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Total Harga</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Tipe SO</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $last_series = null;
        $last_tolling = null;
        $netto = 0;
        $ni = 0;
        $np = 0;
        $nt = 0;
        $nilai_netto = 0;
        $nilai_invoice = 0;
        $nilai_ppn = 0;
        $nilai_total = 0;
        $nettoc = 0;
        $nic = 0;
        $npc = 0;
        $ntc = 0;
        foreach($detailLaporan as $row){ 
          $total_harga = $row->total_harga+$row->nilai_ppn;
 /*           $total_amount = $row->netto * $row->amount;  */
              if($last_series != $row->kode_customer && $last_series != null){
                echo '<tr>
                    <td colspan="7" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($netto,2,',','.').'</td>
                    <td style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($ni,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($np,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nt,2,',','.').'</td>
                    <td colspan="2" align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
                  </tr>';
                $nettoc = 0;
                $nic = 0;
                $npc = 0;
                $ntc = 0;
              }

              if($last_tolling != $row->flag_tolling && $last_tolling != null){
                echo '<tr>
                    <td colspan="7" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($netto,2,',','.').'</td>
                    <td style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($ni,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($np,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nt,2,',','.').'</td>
                    <td colspan="2" align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
                  </tr>';
                $netto = 0;
                $ni = 0;
                $np = 0;
                $nt = 0;
              }
        ?>
            <tr>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$no ; ?></td>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->kode_customer ; ?></td>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->customer; ?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->no_surat_jalan ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= date('d-m-Y', strtotime($row->tanggal)) ?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->kode_barang ?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->nama_barang ?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->netto,2,',','.');?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?=($row->currency=='IDR')?'Rp.': '$ -> Rp.';?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->total_harga-$row->materai,2,',','.');?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->nilai_ppn,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($total_harga,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?= ($row->flag_tolling==0) ? 'SO Biasa' : 'SO Tolling'; ?></td>
        <?php 
          ($last_series==$row->kode_customer)?'':$no++;
          $last_tolling = $row->flag_tolling;
          $last_series = $row->kode_customer;
          $netto += $row->netto;
          $ni +=$row->total_harga;
          $np += $row->nilai_ppn;
          $nt += $total_harga;
          $nilai_netto += $row->netto;
          $nilai_invoice +=$row->total_harga;
          $nilai_ppn += $row->nilai_ppn;
          $nilai_total += $total_harga;
          $nettoc += $row->netto;
          $nic +=$row->total_harga;
          $npc += $row->nilai_ppn;
          $ntc += $total_harga;
          } ?>
          <tr>
            <td colspan="7" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($netto,2,',','.');?></td>
            <td style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($ni,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($np,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nt,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
          </tr>
          <tr>
            <td colspan="7" style="text-align: right; border-top: 5px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Grand Total</strong></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_netto,2,',','.');?></td>
            <td style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_invoice,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_ppn,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_total,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>