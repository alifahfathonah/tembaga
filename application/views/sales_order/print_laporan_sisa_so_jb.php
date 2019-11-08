<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()"><?=(($this->session->userdata('user_ppn')==0)? '' : '<strong>PT. KAWAT MAS PRAKASA</strong><br>');?>
      <table width="100%" style="page-break-after: auto;">
        <tr>
          <td align="center">
            <h4>SISA ORDER per <?= tanggal_indo(date("Y-m-d"));?></h4>
            <!-- <h4>Laporan Penjualan <?= d ?></h4> -->
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="3" cellspacing="0" style="font-size: 13px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Size</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Sisa Order</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Total</th>
           </tr>
         </thead>
         <tbody>
        <?php 
        $no = 1; 
        $bruto = 0;
        $netto = 0;
        $t_netto = 0;
        $last_series = null;
        foreach($detailLaporan as $row){ 
          $sisa_order = $row->netto - $row->netto_kirim;
          if($sisa_order > 0){
            if($last_series!=$row->jenis && $last_series!=null){
              echo '<tr>
                      <td colspan="2" style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>Total</strong></td>
                      <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>'.number_format($netto,2,',','.').'</strong></td>
                      <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;border-right: 1px solid;"><strong>'.number_format($netto,2,',','.').'</strong></td>
                    </tr>';
                    $netto = 0;
            }
 /*           $total_amount = $row->netto * $row->amount;  */
        ?>
            <tr>
                <td style="border-top: 1px solid;border-left: 1px solid;"><?=$no;?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= $row->nama_barang.' '.(($row->flag_tolling==1)? '(OK)' : '');?></td>
                <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?= number_format($sisa_order,2,',','.');?></td>
                <td align="right" style="border-left: 1px solid; border-right: 1px solid;"></td>
              </tr>
        <?php 
          $no++;
          $last_series = $row->jenis;
          $netto += $sisa_order;
          $t_netto += $sisa_order;
          } 
        }
        ?>
          <tr>
            <td colspan="2" style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong>Total</strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;"><strong><?=number_format($netto,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 1px solid;border-left: 1px solid;border-right: 1px solid;"><strong><?=number_format($netto,2,',','.');?></strong></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;"><strong>Grand Total</strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;"><strong><?=number_format($t_netto,2,',','.');?></strong></td>
            <td style="text-align: right;border-bottom: 1px solid; border-top: 5px solid;border-left: 1px solid;border-right: 1px solid;"><strong><?=number_format($t_netto,2,',','.');?></strong></td>
          </tr>
        </tbody>
      </table>
      <?php foreach($so_hari_ini as $v){ 
        if(!empty($v->netto)){
      ?>
        <tr>
          <td><?=$v->jenis_barang;?></td>
          <td><?=number_format($v->netto,2,',','.');?></td>
        </tr>
      <?php 
        }
      } ?>
    </body>
</html>