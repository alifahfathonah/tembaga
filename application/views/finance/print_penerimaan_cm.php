 <h3 align="center"><b> Rekap Penerimaan CM</b></h3>
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
        <th>Nama Customer</th>  
        <th>Nomor Cek</th>
        <th>Tanggal JT</th>
        <th>Nominal</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $nominal = 0;
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-right: 1px solid #000;">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->nomor.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->nama_customer.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->nomor_cek.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->tgl_cair.'</td>';
        echo '<td style="text-align:right; border-bottom:1px solid #000; border-right: 1px solid #000;">'.number_format($row->nominal,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $nominal += $row->nominal;
    }
    ?>
    <tr>
        <td colspan="6"></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-top:1px solid #000"><strong><?=number_format($nominal,2,',','.');?></strong></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>