 <html>
     <head>
         <style type="text/css">
             @media print {
                /*body{
                    font-size: 10px;
                }*/
                .green{
                    background-color: green;
                    color: white;
                }
             }
         </style>
     </head>
     <body>
         <h2 align="center"><b><u>Daftar Stok Saat Ini</u></b></h2>
         <table width="100%">
            <tr>
                <td width="33%">&nbsp;</td>
                <?php
                $tanggal = tanggal_indo(date("Y-m-d"));
                $split = explode('-', $tanggal);
                ?>
                <td width="34%" align="center"><h3>As Of : <?=date('h:i:s').' '.$split['0'].' '.$split['1'].' '.$split['2'];?></h3></td>
                <td width="33%">&nbsp;</td>
            </tr>
        </table>
        <table width="100%" border="1" style="border-collapse: collapse; font-size: 13px;" cellspacing="0" cellpadding="4">
            <thead>
                <tr>
                    <th style="width:40px" rowspan="2">No</th>
                    <th rowspan="2">Kode</th>
                    <th rowspan="2">Nama Barang</th>
                    <th rowspan="2">No. Packing</th>
                    <!-- <th rowspan="2">UOM</th> -->
                    <th rowspan="2">Tanggal Masuk</th>
                    <th colspan="3" style="border-bottom: 1px solid;">Berat</th>
                    <th rowspan="2">Keterangan</th>
                </tr>
                <tr>
                    <th>Bruto</th>
                    <th>Bobbin</th>
                    <th>Netto</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $netto = 0;
            $last_series = null;
            foreach ($detailLaporan as $row){
                if($row->nama_item!=$last_series && $last_series!=null){
                    echo '<tr>'.
                        '<td colspan="8"></td>'.
                        '<td class="green" style="border-bottom:1px solid #000; border-top:1px solid #000; background-color:green; color: white;" align="right">'.number_format($netto,2,',','.').'</td>'.
                        '<td></td>'.
                    '</tr>';
                    $netto = 0;
                    $no = 1;
                }else{
                    echo '<tr>';
                }
                echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$no.'</td>';
                echo '<td style="border-bottom:1px solid #000;">'.$row->kode_rongsok.'</td>';
                echo '<td style="border-bottom:1px solid #000;">'.$row->nama_item.'</td>';
                echo '<td style="border-bottom:1px solid #000;">'.$row->hasil_scan.'</td>';
                echo '<td style="border-bottom:1px solid #000;">'.$row->tanggal_masuk.'</td>';
                echo '<td style="border-bottom:1px solid #000;" align="right">'.(($row->bruto==NULL) ? 'tidak ada di gudang' : number_format($row->bruto,2,'.',',')).'</td>';
                echo '<td style="border-bottom:1px solid #000;" align="right">'.number_format($row->berat_palette,2,'.',',').'</td>';
                echo '<td style="border-bottom:1px solid #000;" align="right">'.number_format($row->netto,2,',','.').'</td>';
                echo '<td style="border-bottom:1px solid #000;"></td>';
                if($row->nama_item==$last_series){
                    echo '<tr>';
                }
                $no++;
                $last_series = $row->nama_item;
                $netto += $row->netto;
            }
            ?>
            <tr>
                <td colspan="8"></td>
                <td class="green" style="border-bottom:1px solid #000; border-top:1px solid #000; background-color:green; color: white;" align="right"><?=number_format($netto,2,',','.');?></td>
                <td></td>
            </tr>
            </tbody>
        </table>
     </body>
    <body onLoad="window.print()">
    </body>
 </html>