 <h2 align="center"><b><u>Daftar Transaksi Barang</u></b></h2>
 <table width="100%" >
    <?php
        $tahun = $tgl['tahun'];
        $bulan = $tgl['bulan'];
    ?>
    <tr>
        <td width="33%">&nbsp;</td>
        <?php
        $tanggal = tanggal_indo($tahun.'-'.$bulan.'-01');
        $split = explode('-', $tanggal);
        ?>
        <td width="34%" align="center"><h3>Periode : <?=$split['1'].' '.$split['2'];?></h3></td>
        <td width="33%">&nbsp;</td>
    </tr>
 </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
        <th style="width:40px">No</th>
        <th>Kode</th>
        <th>Nama Item</th>
        <th>Unit</th>
        <th>Stok Awal</th>
        <th>Masuk</th>
        <th>Keluar</th>
        <th>Stok Akhir</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $total_awal = 0;
    $masuk = 0;
    $keluar = 0;
    $total_akhir = 0;
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->kode_rongsok.'</td>';
        echo '<td>'.$row->nama_item.'</td>';
        echo '<td>'.$row->uom.'</td>';
        $awal = $row->netto_masuk_before - $row->netto_keluar_before;
        echo '<td>'.number_format($awal,2,',','.').'</td>';
        echo '<td>'.number_format($row->netto_masuk,2,',','.').'</td>';
        echo '<td>'.number_format($row->netto_keluar,2,',','.').'</td>';
        $akhir = $awal + $row->netto_masuk - $row->netto_keluar;
        echo '<td>'.number_format($akhir,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $total_awal += $awal;
        $masuk += $row->netto_masuk;
        $keluar += $row->netto_keluar;
        $total_akhir += $akhir;
    }
    ?>
    <tr>
        <td colspan="4"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($total_awal,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($keluar,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($total_akhir,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>