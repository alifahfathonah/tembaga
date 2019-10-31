<style type="text/css">
table td, table td * {
    vertical-align: top;
}
</style>
 <h2 align="center"><b><u>STOK BOBBIN BESI KOSONG</u></b></h2>
    <table width="100%" style="page-break-after: auto;">
        <tr>
            <td align="center">
                <h4>per <?=tanggal_indo(date('Y-m-d', strtotime($_GET['ts']))).' sampai '.tanggal_indo(date('Y-m-d', strtotime($_GET['te'])));?></h4>
            </td>
        </tr>
    </table>
    <table width="100%" cellpadding="4" cellspacing="0" style="border-left:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">
    <tr>
        <td style="text-align:center; border-bottom:1px solid #000;">No.</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000">Ukuran Bobbin</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000">Pemasukan</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000">Pengeluaran</td>
    </tr>
    <?php 
        $no = 0;
        $pemasukan = 0;
        $pengeluaran = 0;
        foreach ($details as $row) {
            $no++;
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">( '.$row->bobbin_size.' ) '.$row->keterangan.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->pemasukan.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000">'.$row->pengeluaran.'</td>';
        echo '</tr>';
        $pemasukan += $row->pemasukan;
        $pengeluaran += $row->pengeluaran;
    } ?>
    <tr>
        <td colspan="2" style="text-align:right; border-bottom:1px solid #000;"><strong>Total</strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=$pemasukan;?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=$pengeluaran;?></strong></td>
    </tr>
    </table>
    <body onLoad="window.print()">
    </body>
</html>