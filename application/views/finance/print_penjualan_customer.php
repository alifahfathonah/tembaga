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
            <?=($this->session->userdata('user_ppn')==1)? '<h3>PT. KAWAT MAS PRAKASA</h3>' : '';?>
            <h4>Rekap Penjualan Detail Customer<br>Per Tanggal : <?php echo " <i>".tanggal_indo(date("Y-m-d", strtotime($_GET['ts']))).' s/d '.tanggal_indo(date("Y-m-d", strtotime($_GET['te'])))."</i>";?></h4>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="2" cellspacing="0">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Kode</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Customer</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Currency</th>
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
        $ni = 0;
        $np = 0;
        $nt = 0;
        $nilai_invoice = 0;
        $nilai_ppn = 0;
        $nilai_total = 0;
        foreach($detailLaporan as $row){ 
          $total_harga = $row->total_harga + $row->nilai_ppn;
          if($last_series!=$row->flag_tolling && $last_series != null){
            echo '
          <tr>
            <td colspan="4" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($ni,2,',','.').'</td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($np,2,',','.').'</td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nt,2,',','.').'</td>
            <td colspan="2" align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
          </tr>';
        $ni = 0;
        $np = 0;
        $nt = 0;
          }
 /*           $total_amount = $row->netto * $row->amount;  */
        ?>
            <tr>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$no ; ?></td>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->kode_customer ; ?></td>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->customer; ?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?=($row->currency=='IDR')?'Rp.': '$';?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->total_harga,2,',','.');?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->nilai_ppn,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($total_harga,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?= ($row->flag_tolling==0) ? 'SO Biasa' : 'SO Tolling'; ?></td>
        <?php 
          // ($last_series==$row->flag_tolling)?'':$no++;
          $no++;
          $last_series = $row->flag_tolling;
          $ni +=$row->total_harga;
          $np += $row->nilai_ppn;
          $nt += $total_harga;
          $nilai_invoice +=$row->total_harga;
          $nilai_ppn += $row->nilai_ppn;
          $nilai_total += $total_harga;
          } ?>
          <tr>
            <td colspan="4" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($ni,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($np,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nt,2,',','.');?></td>
            <td colspan="2" align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
          </tr>
          <tr>
            <td colspan="4" style="text-align: right; border-top: 5px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Grand Total</strong></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_invoice,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_ppn,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_total,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>