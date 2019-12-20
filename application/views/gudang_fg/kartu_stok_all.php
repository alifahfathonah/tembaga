 <h3 align="center"><b> Kartu Stok FG <?php echo " <i>".$start.' s/d '.$end."</i>";?></b></h3>
<?php 
$total_masuk = 0;
$total_keluar = 0;
$total_sisa = 0;

foreach ($loop as $key => $value) { ?>

 <table width="100%" style="font-size:14px;">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td width="50%"><b>Nama Barang : </b><?=$value['stok_before']['jenis_barang'];?></td>
        <td width="25%" align="center"><b>Per Tanggal : <?=$end;?></b></td>
        <td width="25%" align="right"><b>Kode : </b><?=$value['stok_before']['kode'];?></td>
    </tr>
 </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6" style="font-size:12px;">
    <thead>
        <th width="4%">No</th>
        <th width="10%">Tanggal</th>
        <th width="20%">Nomor</th>
        <th width="30%">Keterangan</th>
        <th width="12%">Masuk</th>
        <th width="12%">Keluar</th>
        <th width="12%">Sisa</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $masuk = 0;
    $keluar = 0;
    $sisa_now = 0;
    // $sisa = $value['stok_before']['stok_awal'];
    $sisa = $value['stok_before']['netto_masuk']-$value['stok_before']['netto_keluar'];
        echo '<tr>';
        echo '<td style="text-align:center"> - </td>';
        echo '<td></td>';
        echo '<td>Saldo Sebelumnya</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>'.number_format($sisa,2,',','.').'</td>';
        echo '</tr>';
    foreach ($value['detailLaporan'] as $row){
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->tanggal_masuk.$row->tanggal_keluar.'</td>';
        echo '<td>'.$row->nomor.'</td>';
        echo '<td>'.$row->keterangan.'</td>';
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
        <td colspan="4"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($keluar,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($sisa,2,',','.');?></td>
    </tr>
    </tbody>
<?php 
    $total_masuk += $masuk;
    $total_keluar += $keluar;
    $total_sisa += $sisa;
} ?>
    <tr>
        <td colspan="4"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($total_masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($total_keluar,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($total_sisa,2,',','.');?></td>
    </tr>
</table>
    <body onLoad="window.print()">
    </body>
</html>