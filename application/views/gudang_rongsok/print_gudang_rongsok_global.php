<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <h2 align="center"><b><u>Rekap Gudang Rongsok Tanggal <?= tanggal_indo($tgl); ?></u></b></h2>
        <table width="100%" class="table table-striped table-bordered table-hover" id="sample_6" style="font-size:15px;">
            <thead>
                <th></th>
                <th></th> 
            </thead>
            <tbody>
            <?php
            $no = 1;
            $netto = 0;
            foreach ($detailLaporan as $row){
                echo '<tr>';
                echo '<td>'.$row->nama_item.'</td>';
                echo '<td style="text-align:right;">'.number_format($row->netto,2,',','.').'</td>';
                echo '</tr>';
                $no++;;
                $netto += $row->netto;
            }
            ?>
            <tr>
                <td></td>
                <td style="border-bottom:1px solid #000; border-top:1px solid #000; text-align: right;"><?=number_format($netto,2,',','.');?></td>
            </tr>
            </tbody>
        </table>
    <body onLoad="window.print()">
    </body>
</html>