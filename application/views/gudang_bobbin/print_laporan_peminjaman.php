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
            <h3 align="center"><b> Laporan Peminjaman <?=$header['nama_customer'];?> per <?php echo " <i>".tanggal_indo(date("Y-m-d"))."</i>";?></b></h3>
          </td>
        </tr>
      </table>
      <table width="100%" cellpadding="3" cellspacing="0" style="font-size: 10px;">
        <thead>
           <tr>
                <th rowspan="2" style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th rowspan="2" style="border-top: 1px solid; border-left: 1px solid;">Tanggal</th>
                <th rowspan="2" style="border-top: 1px solid; border-left: 1px solid;">No Peminjaman</th>
                <th rowspan="2" style="border-top: 1px solid; border-left: 1px solid;">No Pengembalian</th>
                <th rowspan="2" style="border-top: 1px solid; border-left: 1px solid;">No Surat Jalan</th>
                <th colspan="8" style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Dipinjamkan</th>
                <th colspan="8" style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Dikembalikan</th>
                <th colspan="8" style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Sisa Pinjaman</th>
           </tr>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">L</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">M</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">S</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">T</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">K</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">D</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">KRJ</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;"></th>

                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">L</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">M</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">S</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">T</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">K</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">D</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">KRJ</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;"></th>

                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">L</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">M</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">S</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">T</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">K</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">D</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">KRJ</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"></th>

           </tr>
         </thead>
         <tbody>
            <tr>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>

              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>

              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$stok_awal['L'];?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$stok_awal['M'];?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$stok_awal['S'];?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$stok_awal['T'];?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$stok_awal['K'];?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$stok_awal['D'];?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$stok_awal['KRJ'];?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;border-right: 1px solid;"><?=$stok_awal['BP'];?></td>
            </tr>
        <?php 
        $start = date('Y-m-d');
        $no = 1;

        $l_p = 0;
        $m_p = 0;
        $s_p = 0;
        $t_p = 0;
        $k_p = 0;
        $d_p = 0;
        $krj_p = 0;
        $bp_p = 0;

        $l_k = 0;
        $m_k = 0;
        $s_k = 0;
        $t_k = 0;
        $k_k = 0;
        $d_k = 0;
        $krj_k = 0;
        $bp_k = 0;

        $l_s = $stok_awal['L'];
        $m_s = $stok_awal['M'];
        $s_s = $stok_awal['S'];
        $t_s = $stok_awal['T'];
        $k_s = $stok_awal['K'];
        $d_s = $stok_awal['D'];
        $krj_s = $stok_awal['KRJ'];
        $bp_s = $stok_awal['BP'];

        foreach($details as $row){ 

          if($row->trx==0){
            $l_p += $row->L;
            $m_p += $row->M;
            $s_p += $row->S;
            $t_p += $row->T;
            $k_p += $row->K;
            $d_p += $row->D;
            $krj_p += $row->krj;
            $bp_p += $row->bp;
          }

          if($row->trx==1){
            $l_k += $row->L;
            $m_k += $row->M;
            $s_k += $row->S;
            $t_k += $row->T;
            $k_k += $row->K;
            $d_k += $row->D;
            $krj_k += $row->krj;
            $bp_k += $row->bp;
          }

          if($row->trx==0){
            $l_s += $row->L;
            $m_s += $row->M;
            $s_s += $row->S;
            $t_s += $row->T;
            $k_s += $row->K;
            $d_s += $row->D;
            $krj_s += $row->krj;
            $bp_s += $row->bp;
          }else{
            $l_s -= $row->L;
            $m_s -= $row->M;
            $s_s -= $row->S;
            $t_s -= $row->T;
            $k_s -= $row->K;
            $d_s -= $row->D;
            $krj_s -= $row->krj;
            $bp_s -= $row->bp;
          }

        ?>
            <tr>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $no ?></td>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= date('Y-m-d', strtotime($row->tanggal)) ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->nomor:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->nomor:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$row->no_surat_jalan;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->L:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->M:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->S:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->T:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->K:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->D:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->krj:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==0)? $row->bp:''; ?></td>

              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->L:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->M:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->S:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->T:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->K:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->D:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->krj:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->trx==1)? $row->bp:''; ?></td>

              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$l_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$m_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$s_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$t_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$k_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$d_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$krj_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?=$bp_s;?></td>
            </tr>
        <?php $no++;
          }
          ?>
          <tr>
              <td colspan="5" align="center" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><b>Total</b></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$l_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$m_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$s_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$t_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$k_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$d_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$krj_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$bp_p;?></td>

              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$l_k;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$m_k;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$s_k;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$t_k;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$k_k;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$d_k;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$krj_k;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$bp_k;?></td>

              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$l_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$m_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$s_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$t_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$k_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$d_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$krj_s;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; border-right: 1px solid;"><?=$bp_s;?></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>