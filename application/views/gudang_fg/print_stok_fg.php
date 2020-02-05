 <h2 align="center"><b><u>Daftar Stok Saat Ini</u></b></h2>
 <table width="100%">
    <tr>
        <td width="33%">&nbsp;</td>
        <?php
        $tanggal = tanggal_indo(date("Y-m-d"));
        $split = explode('-', $tanggal);
        ?>
        <td width="34%" align="center"><h3>As Of : <?=date('h:i:s').' '.$split['0'].' '.$split['1'].' '.$split['2'];?></h3></td>
        <td width="33%">&nbsp;</td>
    </tr>
</table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <thead>
        <th style="width:40px">No</th>
        <th>Kode</th>
        <th>Nama Item</th>
        <th>Unit</th>
        <th>Netto</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $netto = 0;

    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000;">'.$row->kode.'</td>';
        echo '<td style="border-bottom:1px solid #000;">'.$row->jenis_barang.'</td>';
        echo '<td style="border-bottom:1px solid #000;">'.$row->uom.'</td>';
        echo '<td style="border-bottom:1px solid #000; text-align:right;">'.number_format($row->netto,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $netto += $row->netto;
    }
    ?>
    <tr>
        <td colspan="4"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align:right;"><?=number_format($netto,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>