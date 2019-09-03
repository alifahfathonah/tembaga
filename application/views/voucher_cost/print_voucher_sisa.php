 <h3 align="center"><b> Voucher yang Belum Dibayar</b></h3>

<table width="100%" cellpadding="2" style="font-size: 10px;">
    <thead>
        <th style="width:40px">No</th>
        <th>Tanggal</th>
        <th>Nomor Bukti</th>
        <th>Nama Customer</th> 
        <th>No. PO</th> 
        <th>Keterangan</th>
        <th>Nominal</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $nominal = 0;
    foreach ($list_data as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-right: 1px solid #000;">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->tanggal.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->no_voucher.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->nama.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->no_po.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-right: 1px solid #000;">'.$row->keterangan.'</td>';
        echo '<td style="text-align:right; border-bottom:1px solid #000; border-right: 1px solid #000;">'.number_format($row->amount,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $nominal += $row->amount;
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