 <h3 align="center"><b> List CM yang Belum Cair</b></h3>
<table width="100%" cellpadding="2" style="font-size: 11px;">
    <thead>
        <th>No</th>
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
    $nominalc = 0;
        $last_series = null;
    foreach ($detailLaporan as $row){

        if($last_series != $row->nama_customer && $last_series != null){
            echo '<tr>
                <td colspan="6" style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;"><strong>Total</strong></td>
                <td style="text-align:right; border-bottom:1px solid #000;"><strong>'.number_format($nominalc,2,',','.').'</strong></td>
            </tr>';
            $nominalc = 0;
        }
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
        $nominalc += $row->nominal;
        $last_series = $row->nama_customer;
    }
    echo '<tr>
                <td colspan="6" style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;"><strong>Total</strong></td>
                <td style="text-align:right; border-bottom:1px solid #000;"><strong>'.number_format($nominalc,2,',','.').'</strong></td>
            </tr>';
    ?>
    <tr>
        <td colspan="6" style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000;"><strong>Grand Total</strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-top:1px solid #000"><strong><?=number_format($nominal,2,',','.');?></strong></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>