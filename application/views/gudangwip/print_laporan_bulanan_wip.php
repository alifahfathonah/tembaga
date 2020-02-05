 <h3 style="text-align: center; text-decoration: underline;">PT. KAWAT MAS PRAKASA<br>
    LAPORAN STOK <?=$g;?></h3>
 <h3 align="center"><b><?php echo " <i>".tanggal_indo(date('Y-m-d', strtotime($start))).' s/d '.tanggal_indo(date('Y-m-d', strtotime($end)))."</i>";?></b></h3>
<?php $ex = explode('-',tanggal_indo(date('Y-m-d', strtotime($end))));?>
<table width="100%" class="table table-striped table-bordered table-hover" id="sample_6">
    <tr>
        <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
        <td colspan="3">
            <tr>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jenis Barang</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Stock Awal</strong></td>
                <td colspan="4" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Pemasukan</strong></td>
                <td colspan="5" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Pengeluaran</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Stock Akhir</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Selisih</strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td>
            </tr>
            <tr>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Produksi</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Bakar Ulang</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">SDM</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Supplier</th>

                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Produksi</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Cuci Bakar Ulang</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">GD/RSK</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Konsumen</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Koreksi</th>

                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Buku</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Fisik</th>
            </tr>
        </td>
    </tr>
    <tbody>
    <?php
    $no = 1;
    $stok_awal = 0;
    $produksi = 0;
    $bu = 0;
    $sdm = 0;
    $supplier = 0;

    $produksi_k = 0;
    $bu_k = 0;
    $gdrsk = 0;
    $konsumen = 0;
    $koreksi = 0;
    $stok_akhir = 0;
    $stok_fisik = 0;
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">'.$no.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000;">'.$row->jenis_barang.'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->stok_awal==0)? '-':number_format($row->stok_awal,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.number_format($row->produksi,2,',','.').'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->bakar_ulang==0)? '-':number_format($row->bakar_ulang,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->sdm==0)? '-':number_format($row->sdm,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->supplier==0)? '-':number_format($row->supplier,2,',','.')).'</td>';

        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->produksi_k==0)? '-':number_format($row->produksi_k,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->bakar_ulang_k==0)? '-':number_format($row->bakar_ulang_k,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->gdrsk==0)? '-':number_format($row->gdrsk,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->konsumen==0)? '-':number_format($row->konsumen,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->koreksi==0)? '-':number_format($row->koreksi,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->stok_akhir==0)? '-':number_format($row->stok_akhir,2,',','.')).'</td>';
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($row->stok_fisik==0)? '-':number_format($row->stok_fisik,2,',','.')).'</td>';
        $selisih = $row->stok_akhir - $row->stok_fisik;
        echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; text-align:right;">'.(($selisih==0)? '-':number_format($selisih,2,',','.')).'</td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000 ; border-right:1px solid #000"><strong></strong></td>';
        // echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->fisik,2,',','.').'</td>';
        echo '</tr>';
        $no++;
    $stok_awal += $row->stok_awal;
    $produksi += $row->produksi;
    $bu += $row->bakar_ulang;
    $sdm += $row->sdm;
    $supplier += $row->supplier;

    $produksi_k += $row->produksi_k;
    $bu_k += $row->bakar_ulang_k;
    $gdrsk += $row->gdrsk;
    $konsumen += $row->konsumen;
    $koreksi += $row->koreksi;
    $stok_akhir += $row->stok_akhir;
    $stok_fisik+= $row->stok_fisik;
    }
    ?>
    <tr>
        <td colspan="2" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Grand Total</strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($stok_awal,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($produksi,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($bu,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($sdm,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($supplier,2,',','.');?></strong></td>

        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($produksi_k,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($bu_k,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($gdrsk,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($konsumen,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($koreksi,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($stok_akhir,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;text-align: right;"><strong><?=number_format($stok_fisik,2,',','.');?></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000;"><strong></strong></td>
        <td style="border-bottom:1px solid #000; border-left:1px solid #000 ; border-right:1px solid #000"><strong></strong></td>
        <!-- <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000"><strong><?=number_format($total,2,',','.');?></strong></td> -->
    </tr>
    <tr>
        <td colspan="19" style="border-right:1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000;">
            <table border="0" width="100%" cellpadding="0" cellspacing="0" >
                <tr>
                    <td colspan="3" align="right"><span style="margin-right: 5%;">Tangerang, <?=tanggal_indo(date('Y-m-d'));?></span></td>
                </tr>
                <tr>
                    <td style="text-align:center">Diketahui Oleh, </td>
                    <td style="text-align:center">Disetujui Oleh, </td>
                    <td style="text-align:center">Dibuat Oleh, </td>
                </tr>
                <tr style="height:35">
                    <td style="text-align:center">&nbsp;</td>
                    <td style="text-align:center">&nbsp;</td>
                    <td style="text-align:center">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center">( Amin Tjandrawinata )</td>
                    <td style="text-align:center">( Linda )</td>
                    <td style="text-align:center">( Landy )</td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>
</html>