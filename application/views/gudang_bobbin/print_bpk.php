<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')){ echo 'PT. KAWAT MAS PRAKASA<br>';} ?> SURAT PEMINJAMAN BOBBIN</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>:</td>
                            <td><?php echo $header['no_surat_jalan']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?php echo date('d-m-Y', strtotime($header['created_at'])); ?></td>
                        </tr>         
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Kepada Yth.</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tuan/Toko</td>
                            <td>:</td>
                            <td><?php echo $header['nama_customer']; ?></td>
                        </tr>  
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nama Barang</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-right:1px solid #000;  border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Quantity</strong></td>
                            <td style="text-align:center; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Keterangan</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $berat = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$row->nama_jenis.'</td>';
                                if($row->jenis_packing==3){
                                    $jumlah = $row->jumlah * 6;
                                }else{
                                    $jumlah = $row->jumlah;
                                }
                                $jumlah = $jumlah+$row->adjustment;
                                echo '<td style="text-align:center; border-left:1px solid #000; border-right:1px solid #000;">'.$jumlah.'</td>';
                                echo '<td style="text-align:center; border-right:1px solid #000;">'.(($row->ket==1)? 'U/ DIPINJAMKAN': 'U/ DIKEMBALIKAN').'</td>';
                                echo '</tr>';
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">&nbsp;</td>
                            <td style="border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                <table border="0" cellpadding="4" cellspacing="0" width="100%">
                    <tr>
                        <td style="text-align:center">
                            Penerima<br>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>(____________)</p>
                        </td>
                        <td style="text-align:center">
                            Sopir<br>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>(____________)</p>
                        </td>
                        <td style="text-align:center">
                            Mengetahui<br>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>(____________)</p>
                        </td>
                        <td style="text-align:center">
                            Hormat Kami,<br>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>(____________)</p>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
    </body>
	<body onLoad="window.print()">
    </body>
</html>
        