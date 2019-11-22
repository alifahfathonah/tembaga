<style type="text/css">
table td, table td * {
    vertical-align: top;
}
</style>
 <h2 align="center"><b><u>Kartu Stok Bobbin Global</u></b></h2>
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
        <th>Nomor</th>
        <th>Keterangan</th>
        <th>Masuk</th>
        <th>Keluar</th>
        <th>Qty Masuk</th>
        <th>Qty Keluar</th>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $masuk = 0;
    $keluar = 0;
    $sisa_now = 0;
    foreach ($details as $row){
        echo '<tr>';
        echo '<td style="text-align:center">'.$no.'</td>';
        echo '<td>'.$row->tanggal.'</td>';
        echo '<td>'.$row->nomor_bobbin.'</td>';
        echo '<td>'.$row->nomor.'</td>';
        echo '<td>'.number_format($row->masuk,2,',','.').'</td>';
        echo '<td>'.number_format($row->keluar,2,',','.').'</td>';
        echo '<td>'.$row->qty_masuk.'</td>';
        echo '<td>'.$row->qty_keluar.'</td>';
        echo '</tr>';
        $no++;
        $masuk += $row->qty_masuk;
        $keluar += $row->qty_keluar;
    }
    ?>
    <tr>
        <td colspan="6"></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($masuk,2,',','.');?></td>
        <td style="border-bottom:1px solid #000; border-top:1px solid #000"><?=number_format($keluar,2,',','.');?></td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>