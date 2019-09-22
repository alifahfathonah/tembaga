 <h3 align="center"><b> Kartu Stok FG <?php echo " <i>".$start.' s/d '.$end."</i>";?></b></h3>
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
        <th>Kode Barang</th>
        <th>Jenis Barang</th>
        <th>Masuk</th>
        <th>Keluar</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $masuk = 0;
    $keluar = 0;
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->kode.'</td>';
        echo '<td>'.$row->jenis_barang.'</td>';
        echo '<td>'.number_format($row->netto_masuk,2,',','.').'</td>';
        echo '<td>'.number_format($row->netto_keluar,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $masuk += $row->netto_masuk;
        $keluar += $row->netto_keluar;
    }
    ?>
    <tr>
        <td colspan="3"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($keluar,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>
</html>