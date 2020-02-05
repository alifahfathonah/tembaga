<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
<body class="margin-left:40px;">
 <table width="100%" >
    <tr>
        <td width="34%" align="center">
 <h4>Laporan Pemasukan <?=$header;?> Finish Good per <?= tanggal_indo(date("Y-m-d", strtotime($_GET['ts']))).' sampai '.tanggal_indo(date("Y-m-d", strtotime($_GET['te'])));?></h4></td>
    </tr>
 </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6" style="font-size: 13px;">
    <thead>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">Kode</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">Nama Barang</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">No. Bukti</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">Tanggal</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">Supplier</th>
        <th style="border-top: 1px solid; border-bottom: 1px solid;">Netto</th>
    </thead>
         <tbody>
    <?php
    $netto = 0;
    $t_netto = 0;
    $last_series = null;
    foreach ($detailLaporan as $row){
        if ($last_series != '') {
            if($last_series != $row->kode && $last_series != null){    
                echo '<tr>
                    <td colspan="5"></td>
                    <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align:right;">'.number_format($netto,2,',','.').'</td>
                </tr>';
                $netto=0;
                echo 
                "<tr>
                    <td colspan='5'><b><u>".$row->kode."</u></b></td>
                    <td></td>
                </tr>";
            }
        } else {
            echo 
                "<tr>
                    <td colspan='5'><b><u>".$row->kode."</u></b></td>
                    <td></td>
                </tr>";
        }
        echo '<tr>';
        echo '<td>'.$row->kode.'</td>';
        echo '<td>'.$row->jenis_barang.'</td>';
        echo '<td>'.$row->nomor.'</td>';
        echo '<td>'.$row->tanggal.'</td>';
        echo '<td>'.$row->nama.'</td>';
        echo '<td style="text-align:right;">'.number_format($row->netto,2,',','.').'</td>';
        echo '</tr>';
        $last_series = $row->kode;
        $netto += $row->netto;
        $t_netto += $row->netto;
    }
    ?>
    <tr>
        <td colspan="5"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align:right;"><?=number_format($netto,2,',','.');?></td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: right;"><strong>TOTAL</strong></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align:right;"><?=number_format($t_netto,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    </body>
</html>