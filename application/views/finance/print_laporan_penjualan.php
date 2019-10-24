<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()"><?=($this->session->userdata('user_ppn')==1)?'<strong>PT. KAWAT MAS PRAKASA</strong><br>':'';?>

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
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Nilai Materai</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Total Harga</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $last_series = null;
        $last_series2 = null;
        $last_tolling = null;
        $netto = 0;
        $ni = 0;
        $np = 0;
        $nt = 0;
        $nm = 0;
        $nilai_netto = 0;
        $nilai_invoice = 0;
        $nilai_ppn = 0;
        $nilai_total = 0;
        $nilai_materai = 0;
        $nettoc = 0;
        $nic = 0;
        $npc = 0;
        $ntc = 0;
        $nmc = 0;
        $nettot = 0;
        $nit = 0;
        $npt = 0;
        $ntt = 0;
        $nmt = 0;
        $materai = 0;
        foreach($detailLaporan as $row){ 
          // $total_harga = $row->total_harga+$row->nilai_ppn;
 /*           $total_amount = $row->netto * $row->amount;  */
              if($last_series2 != $row->no_surat_jalan && $last_series != null){
                if($last_ppn==1){
                    if($last_currency=='IDR'){
                        $ppn = round($ni*10/100);
                    }else{
                        $ppn = 0;
                    }
                }else{
                    $ppn = 0;
                }
                $total_harga = $ni + $ppn + $nm;
                echo '
                <td style="border-top: 1px solid; border-left: 1px solid;">'.number_format($ni,2,',','.').'</td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;">'.number_format($ppn,2,',','.').'</td>
                <td style="border-top: 1px solid; border-left: 1px solid;">'.number_format($nm,2,',','.').'</td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($total_harga,2,',','.').'</td>';
                $nilai_netto += $netto;
                $nilai_invoice += $ni;
                $nilai_ppn += $ppn;
                $nilai_total += $total_harga;
                $materai += $nm;

                //nilai per jenis
                $nettoc += $netto;
                $nic += $ni;
                $npc += $ppn;
                $nmc += $nm;
                $ntc += $total_harga;

                //nilai per tolling
                $nettot += $netto;
                $nit += $ni;
                $npt += $ppn;
                $nmt += $nm;
                $ntt += $total_harga;

                //reset
                $total_harga = 0;
                $ni = 0;
                $nt = 0;
                $nm = 0;
                // $materai = 0;
              }elseif($last_series2 != null){
                $nilai_netto += $netto;
                $nettoc += $netto;
                $nettot += $netto;
                echo '
                <td style="border-top: 1px solid; border-left: 1px solid;"></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"></td>';
              }
              if($last_series != $row->kode_customer && $last_series != null){
                echo '<tr>
                    <td colspan="7" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nettoc,2,',','.').'</td>
                    <td style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nic,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($npc,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nmc,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($ntc,2,',','.').'</td>
                  </tr>';
                $nettoc = 0;
                $nic = 0;
                $npc = 0;
                $ntc = 0;
                $nmc = 0;
              }

              if($last_tolling != $row->flag_tolling && $last_tolling != null){
                echo '<tr>
                    <td colspan="7" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total Penjualan</strong></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nettot,2,',','.').'</td>
                    <td style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nit,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($npt,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nmt,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($ntt,2,',','.').'</td>
                  </tr>';
                $nettot = 0;
                $nit = 0;
                $npt = 0;
                $ntt = 0;
                $nmt = 0;
              }
            $last_currency = $row->currency;
            $last_ppn = $row->flag_ppn;
        ?>
            <tr>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$no ; ?></td>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->kode_customer ; ?></td>
                <?php echo ($last_series==$row->kode_customer) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->customer; ?></td>
                <?php echo ($last_series2==$row->no_surat_jalan) ? '<td align="left" style="border-left: 1px solid;">' : '<td align="left" style="border-top: 1px solid; border-left: 1px solid;">'.$row->no_surat_jalan; ?></td>
                <?php echo ($last_series2==$row->no_surat_jalan) ? '<td align="center" style="border-left: 1px solid;">': '<td align="center" style="border-top: 1px solid; border-left: 1px solid;">'.date('d-m-Y', strtotime($row->tanggal))?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->kode_barang ?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->nama_barang ?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->netto,2,',','.');?></td>
                <td style="border-top: 1px solid; border-left: 1px solid;"><?=($row->currency=='IDR')?'Rp.': '$ -> Rp.';?></td>
        <?php 
            if($last_series==$row->no_surat_jalan){
              $ni += $row->total_harga;
              $nm = $row->materai;
              $netto = $row->netto;
              $no++;
            }else{
              $netto = $row->netto;
              $ni +=$row->total_harga;
              $nm = $row->materai;
            }
          ($last_series==$row->kode_customer)?'':$no++;
          $last_tolling = $row->flag_tolling;
          $last_series = $row->kode_customer;
          $last_series2 = $row->no_surat_jalan;
          } 

                if($last_ppn==1){
                    if($last_currency=='IDR'){
                        $ppn = round($ni*10/100);
                    }else{
                        $ppn = 0;
                    }
                }else{
                    $ppn = 0;
                }
                $total_harga = $ni + $ppn + $nm;
                echo '
                <td style="border-top: 1px solid; border-left: 1px solid;">'.number_format($ni,2,',','.').'</td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;">'.number_format($ppn,2,',','.').'</td>
                <td style="border-top: 1px solid; border-left: 1px solid;">'.number_format($nm,2,',','.').'</td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($total_harga,2,',','.').'</td>';
                $nilai_netto += $netto;
                $nilai_invoice += $ni;
                $nilai_ppn += $ppn;
                $nilai_total += $total_harga;
                $materai += $nm;

                //nilai per customer
                $nettoc += $netto;
                $nic += $ni;
                $npc += $ppn;
                $nmc += $nm;
                $ntc += $total_harga;

                //nilai per tolling
                $nettot += $netto;
                $nit += $ni;
                $npt += $ppn;
                $nmt += $nm;
                $ntt += $total_harga;
                echo '<tr>
                    <td colspan="7" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nettoc,2,',','.').'</td>
                    <td style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"></td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nic,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($npc,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;">'.number_format($nmc,2,',','.').'</td>
                    <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;">'.number_format($ntc,2,',','.').'</td>
                  </tr>';
          ?>
          <tr>
            <td colspan="7" style="text-align: right; border-top: 2px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Total Penjualan</strong></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nettot,2,',','.');?></td>
            <td style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nit,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($npt,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nmt,2,',','.');?></td>
            <td align="right" style="border-top: 2px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"><?=number_format($ntt,2,',','.');?></td>
          </tr>
          <tr>
            <td colspan="7" style="text-align: right; border-top: 5px solid;border-bottom:1px solid;border-left: 1px solid;"><strong>Grand Total</strong></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_netto,2,',','.');?></td>
            <td style="border-bottom:1px solid; border-left: 1px solid; border-top: 5px solid;"></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_invoice,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid;"><?=number_format($nilai_ppn,2,',','.');?></td>
            <td style="border-bottom:1px solid; border-left: 1px solid; border-top: 5px solid;"><?=number_format($materai,2,',','.');?></td>
            <td align="right" style="border-top: 5px solid;border-bottom:1px solid; border-left: 1px solid; border-right: 1px solid;"><?=number_format($nilai_total,2,',','.');?></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>