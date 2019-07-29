<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
<body class="margin-left:40px;">
 <h3 align="center"><b>Laporan Permintaan Rongsok Keluar <?php echo " <i>".$start.' s/d '.$end."</i>";?></b></h3>
 <table width="100%" >
    <tr>
        <td width="34%" align="center"><b>Per Tanggal : <?=$end;?></b></td>
    </tr>
 </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6" style="font-size: 13px;">
    <thead>
        <th style="width:40px">No</th>
        <th>Kode</th>
        <th>Nama Item</th>
        <th>Nomor SPB</th>
        <th>Tanggal</th>
        <th>Bruto</th>
        <th>Netto</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $bruto = 0;
    $netto = 0;
    $t_bruto = 0;
    $t_netto = 0;
    $last_series = null;
    foreach ($detailLaporan as $row){
        if($last_series != $row->kode_rongsok && $last_series != null){    
            echo '<tr>
                <td colspan="5"></td>
                <td style="border-bottom:1px solid #000; border-top:1px solid #000">'.number_format($bruto,2,',','.').'</td>
                <td style="border-bottom:1px solid #000; border-top:1px solid #000">'.number_format($netto,2,',','.').'</td>
            </tr>';
            $bruto=0;
            $netto=0;
        }
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->kode_rongsok.'</td>';
        echo '<td>'.$row->nama_item.'</td>';
        echo '<td>'.$row->no_spb.'</td>';
        echo '<td>'.$row->tanggal_keluar.'</td>';
        echo '<td>'.number_format($row->bruto,2,',','.').'</td>';
        echo '<td>'.number_format($row->netto,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $last_series = $row->kode_rongsok;
        $bruto += $row->bruto;
        $netto += $row->netto;
        $t_bruto += $row->bruto;
        $t_netto += $row->netto;
    }
    ?>
    <tr>
        <td colspan="5"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($bruto,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($netto,2,',','.');?></td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: right;"><strong>TOTAL</strong></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($t_bruto,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($t_netto,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    </body>
</html>