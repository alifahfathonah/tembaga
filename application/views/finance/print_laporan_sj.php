<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()"><?=(($this->session->userdata('user_ppn')==0)? '' : '<strong>PT. KAWAT MAS PRAKASA</strong><br>');?>
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <h4>Laporan Pengeluaran Surat Jalan per <?= tanggal_indo(date("Y-m-d", strtotime($_GET['ts']))).' sampai '.tanggal_indo(date("Y-m-d", strtotime($_GET['te'])));?></h4>
            <!-- <h4>Laporan Penjualan <?= d ?></h4> -->
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="3" cellspacing="0" style="font-size: 13px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">No Surat Jalan</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Tanggal</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Kode</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama Barang</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Netto</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Total Harga</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 0; 
        $netto = 0;
        $t_harga = 0;
        $t_netto = 0;
        $last_series = null;
        foreach($detailLaporan as $row){ 
          if($last_series!=$row->no_surat_jalan){
            $no++;
          }
 /*           $total_amount = $row->netto * $row->amount;  */
        ?>
            <tr>
                <?php echo ($last_series==$row->no_surat_jalan) ? '<td style="border-left: 1px solid;"></td>' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$no.'</td>';?>
                <?php echo ($last_series==$row->no_surat_jalan) ? '<td style="border-left:1px solid #000">' : '<td style="border-top: 1px solid;border-left: 1px solid;">'.$row->no_surat_jalan ; ?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->tanggal;?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->kode_barang;?></td>
                <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->nama_barang;?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($row->netto,2,',','.');?></td>
                <td align="right" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?=number_format($row->total_harga,2,',','.');?></td>
        <?php 
          $last_series = $row->no_surat_jalan;
          $t_harga += $row->total_harga;
          $t_netto += $row->netto;
          } ?>
          <tr>
            <td colspan="5" style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>Total</strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong><?=number_format($t_netto,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;border-right: 1px solid;"><strong><?=number_format($t_harga,2,',','.');?></strong></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>