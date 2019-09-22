 <h3 align="center"><b> Kartu Stok WIP <?php echo " <i>".$start.' s/d '.$end."</i>";?></b></h3>
 <table width="100%" >
    <tr>
        <td width="33%"><b>Nama Barang : </b><?=$jb['jenis_barang'];?></td>
        <td width="34%" align="center"><b>Per Tanggal : <?=$end;?></b></td>
        <td width="33%"><b>Kode : </b><?=$jb['kode'];?></td>
    </tr>
 </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6" style="font-size:12px;">
    <thead>
        <th style="width:40px">No</th>
        <th>Tanggal</th>
        <th>Nomor</th>
        <th>Keterangan</th>
        <th>Qty Masuk</th>
        <th>Berat Masuk</th>
        <th>Qty Keluar</th>
        <th>Berat Keluar</th>
        <th>Sisa Qty</th>
        <th>Sisa Berat</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $masuk = 0;
    $keluar = 0;
    $qty_masuk = 0;
    $berat_masuk = 0;
    $qty_keluar = 0;
    $berat_keluar = 0;
    $sisa_qty = $stok_before['qty_in'] - $stok_before['qty_out'];
    $sisa_berat = $stok_before['berat_in'] - $stok_before['berat_out'];
        echo '<tr>';
        echo '<td style="text-align:center"> - </td>';
        echo '<td></td>';
        echo '<td>Saldo Sebelumnya</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>'.number_format($sisa_qty,2,',','.').'</td>';
        echo '<td>'.number_format($sisa_berat,2,',','.').'</td>';
        echo '</tr>';
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->tanggal.'</td>';
        echo '<td>'.$row->nomor.'</td>';
        echo '<td>'.$row->keterangan.'</td>';
        echo '<td>'.number_format($row->qty_in,2,',','.').'</td>';
        echo '<td>'.number_format($row->berat_in,2,',','.').'</td>';
        echo '<td>'.number_format($row->qty_out,2,',','.').'</td>';
        echo '<td>'.number_format($row->berat_out,2,',','.').'</td>';
        $qty = $sisa_qty + $row->qty_in - $row->qty_out;    
        $berat = $sisa_berat + $row->berat_in - $row->berat_out;
        echo '<td>'.number_format($qty,2,',','.').'</td>';
        echo '<td>'.number_format($berat,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $qty_masuk += $row->qty_in;
        $qty_keluar += $row->qty_out;
        $berat_masuk += $row->berat_in;
        $berat_keluar += $row->berat_out;
        $sisa_qty = $qty;
        $sisa_berat = $berat;
    }
    ?>
    <tr>
        <td colspan="4"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($qty_masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($berat_masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($qty_keluar,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($berat_keluar,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($sisa_qty,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($sisa_berat,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>
</html>