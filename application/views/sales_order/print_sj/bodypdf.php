<table border="0" cellpadding="4" cellspacing="0" width="100%">
    
    <thead>
        <tr>
            <th rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO</strong></th>
            <th rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NAMA ITEM</strong></th>
            <!-- <th rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Produksi</strong></th> -->
            <th rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO.PRD</strong></th>
            <th rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO.PACKING</strong></th>
            <th rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>NO.BOBBIN</strong></th>
            <th colspan="3" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;; border-right:1px solid #000"><strong>QUANTITY(KG)</strong></th>
            <!-- <th rowspan="2" style="text-align:center; border:1px solid #000"><strong>Keterangan</strong></th> -->
        </tr>
        <tr>
            <th style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BRUTO</strong></th>
            <th style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BOBBIN</strong></th>
            <th style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000"><strong>NETTO</strong></th>
        </tr>
    </thead>
    <?php
        $last_series = null;
        $no = 1;
        $bruto = 0;
        $bobin = 0;
        $netto = 0;
        $total_bruto = 0;
        $total_bobin = 0;
        $total_netto = 0;
        for($i = 0; $i < 200; $i++){
        foreach ($details as $row){
            if($row->jenis_barang!=$last_series && $last_series!=null){
                echo '<tr><td colspan="5" style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>Total :</strong></td>';
                echo '<td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000">
                        <strong>'.number_format($bruto, 2, '.', ',').'</strong>
                    </td>
                    <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000">
                        <strong>'.number_format($bobin, 2, '.', ',').'</strong>
                    </td>
                    <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">
                        <strong>'.number_format($netto, 2, '.', ',').'</strong>
                    </td></tr>';
                $bruto = 0;
                $bobin = 0;
                $netto = 0;
                $no = 1;
            }else{
                echo '<tr>';
            }
            $berat = $row->bruto-$row->netto;
            echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
            echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
            echo '<td style="border-left:1px solid #000">'.$row->no_produksi.'</td>';
            echo '<td style="border-left:1px solid #000">'.$row->no_packing.'</td>';
            echo '<td style="border-left:1px solid #000">'.$row->nomor_bobbin.'</td>';
            echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->bruto, 2, '.', ',').'</td>';
            echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($berat, 2, '.', ',').'</td>';
            echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->netto, 2, '.', ',').'</td>';
            // echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->line_remarks.'</td>';
            if($row->jenis_barang==$last_series){
                echo '<tr>';
            }
            $last_series = $row->jenis_barang;
            $bruto += $row->bruto;
            $bobin += $berat;
            $netto += $row->netto;
            $total_bruto += $row->bruto;
            $total_bobin += $berat;
            $total_netto += $row->netto;
            $no++;
        }}
        // $no = 1;
        // $bruto = 0;
        // $bobin = 0;
        // $netto = 0;
        // foreach ($details as $row){
        //     echo '<tr>';
        //     echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
        //     echo '<td style="border-left:1px solid #000">'.$row->jenis_barang.'</td>';
        //     echo '<td style="border-left:1px solid #000">'.$row->no_produksi.'</td>';
        //     echo '<td style="border-left:1px solid #000">'.$row->no_packing.'</td>';
        //     echo '<td style="border-left:1px solid #000">'.$row->nomor_bobbin.'</td>';
        //     echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->bruto, 2, '.', ',').'</td>';
        //     echo '<td style="text-align:right; border-left:1px solid #000">'.number_format($row->berat, 2, '.', ',').'</td>';
        //     echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.number_format($row->netto, 2, '.', ',').'</td>';
        //     // echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->line_remarks.'</td>';
        //     echo '</tr>';
        //     $bruto += $row->bruto;
        //     $bobin += $row->berat;
        //     $netto += $row->netto;
        //     $no++;
        // }
    ?>
    <tr>
        <td colspan="5" style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>Total :</strong></td>
        <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000">
            <strong><?php echo number_format($bruto, 2, '.', ','); ?></strong>
        </td>
        <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000">
            <strong><?php echo number_format($bobin, 2, '.', ','); ?></strong>
        </td>
        <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;">
            <strong><?php echo number_format($netto, 2, '.', ','); ?></strong>
        </td>
    </tr>
    <tr>
        <td colspan="5" style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;"><strong>Grand Total :</strong></td>
        <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
            <strong><?php echo number_format($total_bruto, 2, '.', ','); ?></strong>
        </td>
        <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">
            <strong><?php echo number_format($total_bobin, 2, '.', ','); ?></strong>
        </td>
        <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">
            <strong><?php echo number_format($total_netto, 2, '.', ','); ?></strong>
        </td>
    </tr>
</table>