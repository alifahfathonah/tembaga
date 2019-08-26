 <h3 align="center"><b> Laporan Transaksi</b></h3>
 <table width="100%" >
    <tr>
        <td width="33%"></td>
        <td width="34%" align="center"><b>Per Tanggal : <?php echo " <i>".$_GET['ts'].' s/d '.$_GET['te']."</i>";?></b></td>
        <td width="33%"></td>
    </tr>
 </table>
<table width="100%" cellpadding="2" style="font-size: 13px;">
    <thead>
        <th style="width:40px">No</th>
        <th>Tanggal</th>
        <th>Nomor Bukti</th>
        <th>Keterangan</th>  
        <th>Kredit</th>
        <th>Debit</th>
        <th>Saldo</th>
    </thead>
    <tbody>
    <?php
    $nominal = 0;
    $kredit = 0;
    $debit = 0;
    $saldo_awal = $saldo_awal['nominal'];
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-right: 1px solid #000;"><strong>+</strong></td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;"></td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;"><strong>Saldo Awal</strong></td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;"></td>';
        echo '<td style="text-align:right; border-bottom:1px solid #000; border-right: 1px solid #000;"></td>';
        echo '<td style="text-align:right; border-bottom:1px solid #000; border-right: 1px solid #000;"></td>';
        echo '<td style="text-align:right; border-bottom:1px solid #000; border-right: 1px solid #000;">'.number_format($saldo_awal,2,',','.').'</td>';
        echo '</tr>';
    $no = 1;
    foreach ($detailLaporan as $row){
        (($row->jenis_trx==0)?$saldo_awal = $saldo_awal+$row->nominal : $saldo_awal = $saldo_awal-$row->nominal);
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-right: 1px solid #000;">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->nomor.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->keterangan.'</td>';
        echo '<td style="text-align:right; border-bottom:1px solid #000; border-right: 1px solid #000;">'.(($row->jenis_trx==0)?number_format($row->nominal,2,',','.'):'').'</td>';
        echo '<td style="text-align:right; border-bottom:1px solid #000; border-right: 1px solid #000;">'.(($row->jenis_trx==1)?number_format($row->nominal,2,',','.'):'').'</td>';
        echo '<td style="text-align:right; border-bottom:1px solid #000; border-right: 1px solid #000;">'.number_format($saldo_awal,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        (($row->jenis_trx==0)? $kredit += $row->nominal : $debit += $row->nominal);
    }
    ?>
    <tr>
        <td colspan="4"></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-top:1px solid #000"><strong><?=number_format($kredit,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-top:1px solid #000"><strong><?=number_format($debit,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-top:1px solid #000"><strong><?=number_format($saldo_awal,2,',','.');?></strong></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>