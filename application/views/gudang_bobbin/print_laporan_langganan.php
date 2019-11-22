<style type="text/css">
table td, table td * {
    vertical-align: top;
}
</style>
 <h3 align="center"><b><u>LAPORAN BOBBIN <?=$nama['nama'];?></u></b></h3>
    <table width="100%" style="page-break-after: auto;">
        <tr>
            <td align="center">
                <h4>per <?=tanggal_indo(date('Y-m-d'));?></h4>
            </td>
        </tr>
    </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6" style="font-size:12px;">
    <thead>
        <th style="width:40px">No</th>
        <th>Nama</th>
        <th>Nomor</th>
        <th>Berat</th>
    </thead>
    <tbody>
    <?php
    $no = 0;
    $berat = 0;
    $berat_n = 0;
    $last_series = null;
    foreach ($details as $row){
        if($last_series != null && $last_series != $row->nama){
            echo '<tr>
                <td colspan="3"></td>
                <td style="border-bottom:1px solid #000; border-top:1px solid #000">'.number_format($berat_n,2,',','.').'</td>
            </tr>';
            $berat_n = 0;
        }
        $no++;
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->nama.'</td>';
        echo '<td>'.$row->nomor_bobbin.'</td>';
        echo '<td>'.number_format($row->berat,2,',','.').'</td>';
        echo '</tr>';
        $berat += $row->berat;
        $berat_n += $row->berat;
        $last_series = $row->nama;
    }
    ?>
    <tr>
        <td colspan="3"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($berat_n,2,',','.');?></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($berat,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>