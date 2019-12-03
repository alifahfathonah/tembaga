<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
<body class="margin-left:40px;">
 <h3 align="center"><b>Laporan Pemasukan Rongsok dari <?php echo $header." <i>".$start.' s/d '.$end."</i>";?></b></h3>
 <table width="100%" >
    <tr>
        <td width="34%" align="center"><b>Per Tanggal : <?=$end;?></b></td>
    </tr>
 </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6" style="font-size: 13px;">
    <thead>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">No</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">Kode</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid; width: 15%;">Nama Barang</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">No. Bukti</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">Tanggal</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid; width: 20%;">Supplier</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">Netto</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $netto = 0;
    $t_netto = 0;
    $last_series = null;
    foreach ($detailLaporan as $row){
        if ($last_series != '') {
            if($last_series != $row->kode_rongsok && $last_series != null){    
                echo '<tr>
                    <td colspan="6"></td>
                    <td style="border-bottom:1px solid #000; border-top:1px solid #000">'.number_format($netto,2,',','.').'</td>
                </tr>';
                $netto=0;
                echo 
                "<tr>
                    <td></td>
                    <td colspan='6'><b><u>".$row->kode_rongsok."</u></b></td>
                </tr>";
            }
        } else {
            echo 
                "<tr>
                    <td></td>
                    <td colspan='6'><b><u>".$row->kode_rongsok."</u></b></td>
                </tr>";
        }
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->kode_rongsok.'</td>';
        echo '<td>'.$row->nama_item.'</td>';
        echo '<td>'.$row->no_ttr.'</td>';
        echo '<td>'.$row->tanggal_masuk.'</td>';
        echo '<td>'.$row->nama.'</td>';
        echo '<td>'.number_format($row->netto,2,',','.').'</td>';
        echo '</tr>';
        $no++;
        $last_series = $row->kode_rongsok;
        $netto += $row->netto;
        $t_netto += $row->netto;
    }
    ?>
    <tr>
        <td colspan="6"></td>\
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($netto,2,',','.');?></td>
    </tr>
    <tr>
        <td colspan="6" style="text-align: right;"><strong>TOTAL</strong></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($t_netto,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    </body>
</html>