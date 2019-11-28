<style type="text/css">
table td, table td * {
    vertical-align: top;
}
</style>
 <h2 align="center"><b><u>Kartu Stok <?=($_GET['l']==1)?'Pemasukan':'Pengeluaran';?> Bobbin</u></b></h2>
    <table width="100%" style="page-break-after: auto;">
        <tr>
            <td align="center">
                <h4>per <?=tanggal_indo(date('Y-m-d', strtotime($_GET['ts']))).' sampai '.tanggal_indo(date('Y-m-d', strtotime($_GET['te'])));?></h4>
            </td>
        </tr>
    </table>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6" style="font-size:12px;">
    <thead>
        <th style="width:40px">No</th>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Nomor</th>
        <th>Berat</th>
    </thead>
    <tbody>
    <?php
    $no = 0;
    $qty_j = 0;
    $berat_j = 0;
    $berat = 0;
    $last_series = null;
    foreach ($details as $row){
        if($last_series != null && $last_series != $row->m_bobbin_size_id){
            echo '<tr>
                <td colspan="3"></td>
                <td style="border-bottom:1px solid #000; border-top:1px solid #000">'.number_format($qty_j,2,',','.').'</td>
                <td style="border-bottom:1px solid #000; border-top:1px solid #000">'.number_format($berat_j,2,',','.').'</td>
            </tr>';
            $qty_j = 0;
            $berat_j = 0;
        }
        $no++;
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->tanggal.'</td>';
        echo '<td>'.$row->nomor.'</td>';
        echo '<td>'.$row->nomor_bobbin.'</td>';
        echo '<td>'.number_format($row->berat,2,',','.').'</td>';
        echo '</tr>';
        $qty_j ++;
        $berat_j += $row->berat;
        $berat += $row->berat;
        $last_series = $row->m_bobbin_size_id;
    }
    echo '<tr>
        <td colspan="3"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000">'.number_format($qty_j,2,',','.').'</td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000">'.number_format($berat_j,2,',','.').'</td>
    </tr>';
    ?>
    <tr>
        <td colspan="3"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($no,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($berat,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>