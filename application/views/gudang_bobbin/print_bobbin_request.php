<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <p>&nbsp;</p>
        <h3 style="text-align: center; text-decoration: underline;">PT. KAWATMAS PRAKASA<br>SURAT PEMINJAMAN BOBBIN</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>No. Surat Peminjaman</td>
                            <td>: <?php echo $header['no_surat_peminjaman']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Surat Jalan</td>
                            <td>: <?php echo $header['no_surat_jalan']; ?></td>
                        </tr>       
                        <tr>
                            <?php if ($header['nama_customer'] != null){ ?>
                            <td>Nama Customer</td>
                        <?php } else { ?>
                            <td>Nama Supplier</td>
                        <?php } ?>
                            <td>: <?php echo $header['nama_peminjam']; ?></td>
                        </tr>               
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        
                        <tr>
                            <td>Pembuat</td>
                            <td>: <?php echo $header['realname']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>: <?php echo date('d-m-Y', strtotime($header['created_at'])); ?></td>
                        </tr>  
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nomor Bobbin</strong></td>
                            <td style="text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat Bobbin</strong></td>
                        </tr>
                        <?php
                            $no = 1;
                            $berat = 0;
                            foreach ($details as $row){
                                echo '<tr>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$no.'</td>';
                                echo '<td style="text-align:center; border-left:1px solid #000">'.$row->nomor_bobbin.'</td>';
                                echo '<td style="text-align:center; border-left:1px solid #000; border-right:1px solid #000;">'.$row->berat.'</td>';
                                echo '</tr>';
                                $berat += $row->berat;
                                $no++;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:right;"><strong>Total</strong></td>
                            <td style="text-align: center; border-bottom: 1px solid #000;"><?= $berat ;?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                <table border="0" cellpadding="4" cellspacing="0" width="100%">
                    <tr>
                        <td style="text-align:center">
                            Tanda Terima<br>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>(____________)</p>
                        </td>
                        <td style="text-align:center">
                            Diperiksa<br>
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
                            Yang Membuat,<br>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <?php echo $header['realname']; ?>
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
        