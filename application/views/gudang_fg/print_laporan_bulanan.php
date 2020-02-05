<strong>PT. KAWAT MAS PRAKASA</strong><br>
 <h2 align="center"><b><u>Laporan Gudang <?=$jb;?></u></b></h2>
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
        echo '<td>'.$row->kode.'</td>';
        echo '<td>'.$row->jenis_barang.'</td>';
        echo '<td>'.$row->uom.'</td>';
        echo '<td style="text-align:right;">'.number_format($row->stok_awal,2,',','.').'</td>';
        echo '<td style="text-align:right;">'.number_format($row->netto_masuk,2,',','.').'</td>';
        echo '<td style="text-align:right;">'.number_format($row->netto_keluar,2,',','.').'</td>';
        echo '<td style="text-align:right;">'.number_format($row->stok_akhir,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $total_awal += $row->stok_awal;
        $masuk += $row->netto_masuk;
        $keluar += $row->netto_keluar;
        $total_akhir += $row->stok_akhir;
    }
    ?>
    <tr>
        <td colspan="4"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align: right;"><?=number_format($total_awal,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align: right;"><?=number_format($masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align: right;"><?=number_format($keluar,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align: right;"><?=number_format($total_akhir,2,',','.');?></td>
    </tr>
    </tbody>
    <body onLoad="window.print()">
    </body>
</table>