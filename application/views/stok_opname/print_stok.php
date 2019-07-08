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
        <th>Kode Barang</th>
        <th>Nama Item</th>
        <th>No Packing</th>
        <th>Bruto</th>
        <th>Netto</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $netto = 0;
    $last_series = null;
    foreach ($detailLaporan as $row){
        if($row->jenis_barang!=$last_series && $last_series!=null){
            echo '<tr>'.
                '<td colspan="5"></td>'.
                '<td style="border-bottom:1px solid #000; border-top:1px solid #000; background-color:green; color: white;">'.number_format($netto,2,',','.').'</td>'.
            '</tr>';
            $netto = 0;
            $no = 1;
        }else{
            echo '<tr>';
        }
        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000;">'.$row->kode.'</td>';
        echo '<td style="border-bottom:1px solid #000;">'.$row->jenis_barang.'</td>';
        echo '<td style="border-bottom:1px solid #000;">'.$row->hasil_scan.'</td>';
        echo '<td style="border-bottom:1px solid #000;">'.(($row->bruto==NULL) ? 'tidak ada di gudang' : $row->bruto).'</td>';
        echo '<td style="border-bottom:1px solid #000;">'.number_format($row->netto,2,',','.').'</td>';
        if($row->jenis_barang==$last_series){
            echo '<tr>';
        }
        $no++;
        $last_series = $row->jenis_barang;
        $netto += $row->netto;
    }
    ?>
    <tr>
        <td colspan="5"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000; background-color:green; color: white;"><?=number_format($netto,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>