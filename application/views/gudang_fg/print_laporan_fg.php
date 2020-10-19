 <h3 style="text-align: center; text-decoration: underline;"><!-- PT. KAWAT MAS PRAKASA<br> -->
    LAPORAN STOK <?=$g;?></h3>
 <h3 align="center"><b><?php echo " <i>".tanggal_indo(date('Y-m-d', strtotime($start))).' s/d '.tanggal_indo(date('Y-m-d', strtotime($end)))."</i>";?></b></h3>
<?php $ex = explode('-',tanggal_indo(date('Y-m-d', strtotime($end))));?>
<table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
    <thead>
        <td colspan="3">
            <tr>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Jenis Barang</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Stock Awal</strong></td>
                <td colspan="7" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Pemasukan</strong></td>
                <td colspan="6" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Pengeluaran</strong></td>
                <td colspan="2" style="text-align:center; border-left:1px solid #000; border-top:1px solid #000;"><strong>Stock Akhir</strong></td>
                <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Selisih</strong></td>
                <td rowspan="2" style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></td>
            </tr>
            <tr>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Produksi</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Retur</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">SDM</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">GD/RSK</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Supplier</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Repacking</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Lain-Lain</th>

                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Konsumen</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">GD/RSK</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">SDM</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Retur</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Repacking</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Lain-Lain</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Buku</th>
                <th style="border-left: 1px solid; border-top: 1px solid; border-bottom: 1px solid;">Fisik</th>
            </tr>
        </td>
    </thead>
    <tbody>
    <?php
    $no = 1;
    $stok_awal = 0;
    $produksi = 0;
    $retur = 0;
    $sdm = 0;
    $gdrsk = 0;
    $supplier = 0;
    $koreksi = 0;
    $lain = 0;

    $konsumen = 0;
    $rongsok = 0;
    $sdm_k = 0;
    $retur_k = 0;
    $koreksi_k = 0;
    $lain2 = 0;
    $stok_akhir = 0;
    $fisik= 0;
    foreach ($detailLaporan as $row){
        echo '<tr>';
        echo '<td style="text-align:center; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.$no.'</td>';
        echo '<td style="border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.$row->jenis_barang.'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->stok_awal==0)? '-':number_format($row->stok_awal,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->produksi==0)? '-':number_format($row->produksi,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->retur==0)? '-':number_format($row->retur,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->sdm==0)? '-':number_format($row->sdm,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->gdrsk==0)? '-':number_format($row->gdrsk,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->supplier==0)? '-':number_format($row->supplier,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->koreksi==0)? '-':number_format($row->koreksi,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->lain==0)? '-':number_format($row->lain,2,',','.')).'</td>';

        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->konsumen==0)? '-':number_format($row->konsumen,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->rongsok==0)? '-':number_format($row->rongsok,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->sdm_k==0)? '-':number_format($row->sdm_k,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->retur_k==0)? '-':number_format($row->retur_k,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->koreksi_k==0)? '-':number_format($row->koreksi_k,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->lain2==0)? '-':number_format($row->lain2,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->stok_akhir==0)? '-':number_format($row->stok_akhir,2,',','.')).'</td>';
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($row->fisik==0)? '-':number_format($row->fisik,2,',','.')).'</td>';
        $selisih = $row->stok_akhir - $row->fisik;
        echo '<td style="text-align:right; border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000">'.(($selisih==0)? '-':number_format($selisih,2,',','.')).'</td>
        <td style="border-top: 1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000 ; border-right:1px solid #000">'.$row->keterangan.'</td>';
        // echo '<td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->fisik,2,',','.').'</td>';
        echo '</tr>';
        $no++;
    $stok_awal += round($row->stok_awal,2);
    $produksi += round($row->produksi,2);
    $retur += round($row->retur,2);
    $sdm += round($row->sdm,2);
    $gdrsk += round($row->gdrsk,2);
    $supplier += round($row->supplier,2);
    $koreksi += round($row->koreksi,2);
    $lain += round($row->lain,2);

    $konsumen += round($row->konsumen,2);
    $rongsok += round($row->rongsok,2);
    $sdm_k += round($row->sdm_k,2);
    $retur_k += round($row->retur_k,2);
    $koreksi_k += round($row->koreksi_k,2);
    $lain2 += round($row->lain2,2);
    $stok_akhir += round($row->stok_akhir,2);
    $fisik+= round($row->fisik,2);
    }
    ?>
    <tr>
        <td colspan="2" style="border-left: 1px solid #000; border-bottom: 1px solid #000;"><strong>Grand Total</strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($stok_awal,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($produksi,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($retur,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($sdm,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($gdrsk,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($supplier,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($koreksi,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($lain,2,',','.');?></strong></td>

        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($konsumen,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($rongsok,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($sdm_k,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($retur_k,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($koreksi_k,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($lain2,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($stok_akhir,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong><?=number_format($fisik,2,',','.');?></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000"><strong></strong></td>
        <td style="text-align:right; border-bottom:1px solid #000; border-left:1px solid #000 ; border-right:1px solid #000"><strong></strong></td>
        <!-- <td style="border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000"><strong><?=number_format($total,2,',','.');?></strong></td> -->
    </tr>
    <tr>
        <td colspan="20" style="border-right:1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000;">
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
    <?php if($this->uri->segment(4)==5){ ?>
    <tr>
        <td colspan="5" style="border-bottom:1px solid #000; border-left:1px solid #000;">
            <table border="0" width="100%" cellpadding="2" cellspacing="0">
                <tr>
                    <td colspan="4" style="border-bottom:1px solid #000;"><strong>Note Pengganti Retur :</strong></td>
                </tr>
                <?php foreach ($note_retur as $v) {
                    echo '<tr>';
                    echo '<td style="border-bottom:1px solid #000; border-right:1px solid #000; border-left:1px solid #000;">'.$v->nama_customer.'</td>';
                    echo '<td style="border-bottom:1px solid #000; border-right:1px solid #000;">'.$v->jenis_barang.'</td>';
                    echo '<td style="border-bottom:1px solid #000; border-right:1px solid #000;">'.number_format($v->netto,2,',','.').'</td>';
                    echo '<td style="border-bottom:1px solid #000; border-right:1px solid #000;">'.$v->tanggal.'</td>';
                    echo '</tr>';
                } ?>
            </table>
        </td>
        <td colspan="15" style="border-right:1px solid #000; border-bottom:1px solid #000;">
            
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
    <body onLoad="window.print()">
    </body>
</html>