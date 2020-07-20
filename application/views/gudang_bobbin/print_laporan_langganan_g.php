<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body onLoad="window.print()">
 <h3 align="center"><b><u>LAPORAN BOBBIN <?=$nama['nama'];?></u></b></h3>
    <table width="100%" style="page-break-after: auto;">
        <tr>
            <td align="center">
                <h4>per <?=tanggal_indo(date('Y-m-d'));?></h4>
            </td>
        </tr>
    </table>
      <table width="100%" cellpadding="3" cellspacing="0" style="font-size: 10px;">
        <thead>
           <tr>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">No</th>
                <th style="border-top: 1px solid; border-left: 1px solid;">Nama</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">Limit<br>Max</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">D 12"</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">T 16"</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">S 20"</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">M 22"</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">L 24"</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">K 24"</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">KRJ P</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">KRJ Q</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid;">KRJ J</th>
                <th style="text-align: center; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;">Total</th>

           </tr>
         </thead>
         <tbody>
        <?php 
        $start = date('Y-m-d');
        $no = 1;

        $j_p = 0;
        $k_p = 0;
        $l_p = 0;
        $m_p = 0;
        $p_p = 0;
        $q_p = 0;
        $s_p = 0;
        $t_p = 0;
        $d_p = 0;
        $total = 0;

        foreach($details as $row){ 

            $j_p += $row->J;
            $k_p += $row->K;
            $l_p += $row->L;
            $m_p += $row->M;
            $p_p += $row->P;
            $q_p += $row->Q;
            $s_p += $row->S;
            $t_p += $row->T;
            $d_p += $row->D;
            $total += $row->total;
        ?>
            <tr>
              <td align="center" style="border-top: 1px solid; border-left: 1px solid;"><?= $no ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=$row->nama;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;">&nbsp;</td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->D!=0)? $row->D:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->T!=0)? $row->T:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->S!=0)? $row->S:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->M!=0)? $row->M:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->L!=0)? $row->L:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->K!=0)? $row->K:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->P!=0)? $row->P:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->Q!=0)? $row->Q:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid;"><?=($row->J!=0)? $row->J:''; ?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;"><?=$row->total;?></td>
            </tr>
        <?php $no++;
          }
          ?>
          <tr>
              <td colspan="3" align="center" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><b>Total</b></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$d_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$t_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$s_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$m_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$l_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$k_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$p_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$q_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid;"><?=$j_p;?></td>
              <td align="left" style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; border-right: 1px solid;"><?=$total;?></td>
          </tr>
        </tbody>   
      </table>
    </body>
</html>