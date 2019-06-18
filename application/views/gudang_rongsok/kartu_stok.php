 <h3 align="center"><b> Kartu Stok Rongsok <?php echo " <i>".$start.' s/d '.$end."</i>";?></b></h3>
 <table width="100%" >
    <tr>
        <td width="33%"><b>Nama Barang : </b><?=$rongsok['nama_item'];?></td>
        <td width="34%" align="center"><b>Per Tanggal : <?=$end;?></b></td>
        <td width="33%"><b>Kode Rongsok : </b><?=$rongsok['kode_rongsok'];?></td>
    </tr>
 </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
        <th style="width:40px">No</th>
        <th>Tanggal</th>
        <th>Nama Item</th>
        <th>Nomor DTR</th>     
        <th>Keterangan</th>   
        <th>Masuk</th>
        <th>Keluar</th>
        <th>Sisa</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $masuk = 0;
    $keluar = 0;
    $sisa_now = 0;
    $sisa = $stok_before['netto_masuk'] - $stok_before['netto_keluar'];
        echo '<tr>';
        echo '<td style="text-align:center"> - </td>';
        echo '<td></td>';
        echo '<td>Saldo Sebelumnya</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>'.number_format($sisa,2,',','.').'</td>';
        echo '</tr>';
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->tanggal_masuk.$row->tanggal_keluar.'</td>';
        echo '<td>'.$row->nama_item.'</td>';
        echo '<td>'.$row->no_dtr.'</td>';
        echo '<td>'.$row->nomor.'</td>';
        echo '<td>'.number_format($row->netto_masuk,2,',','.').'</td>';
        echo '<td>'.number_format($row->netto_keluar,2,',','.').'</td>';
        $sisa_now = $sisa + $row->netto_masuk - $row->netto_keluar;
        echo '<td>'.number_format($sisa_now,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $sisa = $sisa_now;
        $masuk += $row->netto_masuk;
        $keluar += $row->netto_keluar;
    }
    ?>
    <tr>
        <td colspan="5"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($keluar,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($sisa,2,',','.');?></td>
    </tr>
    </tbody>
</table>