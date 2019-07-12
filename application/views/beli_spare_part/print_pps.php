<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWAT MAS PRAKASA<br>'; }?>PENGAJUAN PEMBELIAN SPAREPART</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Pengajuan</td>
                            <td>: <?php echo $myData['no_pengajuan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengajuan</td>
                            <td>: <?php echo date('d-m-Y', strtotime($myData['tgl_pengajuan'])); ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kebutuhan</td>
                            <td>: <?php echo (($myData['jenis_kebutuhan']==1)? 'Segera': 'Tanggal '.date('d-m-Y', strtotime($myData['tgl_sparepart_dibutuhkan']))); ?></td>
                        </tr>  
                    </table>
                </td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">             
                        <tr>
                            <td>Catatan</td>
                            <td>: <?php echo $myData['remarks']; ?></td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Item</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>UOM</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Keterangan</strong></td>
                            <td style="text-align:center; border:1px solid #000"><strong>Jumlah</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            foreach ($myDetail as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->nama_item.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->uom.'</td>';
                                echo '<td style="border-left:1px solid #000">'.$row->keterangan.'</td>';
                                echo '<td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000">'.$row->qty.'</td>';
                                echo '</tr>';
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" width="100%">
                        <tr>
                            <td style="text-align:center">Yang Meminta</td>
                            <td style="text-align:center">Mengetahui</td>
                            <td style="text-align:center">Menyetujui</td>
                            <td style="text-align:center">Dibuat Oleh</td>
                        </tr>
                        <tr style="height:55">
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:center"><?=$myData['nama_pengaju'];?></td>
                            <td style="text-align:center"><?=$myData['approve_name'];?></td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center"> <?=$myData['created_name'];?> </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <body onLoad="window.print()">
    </body>
</html>