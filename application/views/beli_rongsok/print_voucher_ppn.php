<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWAT MAS PRAKASA<br>'; }?><?php echo ($header['id_bank'] > 3) ? 'BANK' : 'KAS';?> KELUAR PEMBELIAN RONGSOK</h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td width="60%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Bank</td>
                            <td>: <?php echo $header['nama_bank'];?></td>
                        </tr>
                        <tr>
                            <td>Dibayar Kepada</td>
                            <td>: <?php echo $header['nama_customer'];?></td>
                        </tr>
                        <tr>
                            <td valign="top">Sejumlah</td>
                            <td>: **<?php echo ucwords(number_to_words_d($total, $header['currency'])); ?>**</td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td width="40%">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                            <td>Kode Kas / Bank</td>
                            <td>: <?php echo $header['no_acc'];?></td>
                        </tr>
                        <tr>
                            <td>Nomor Bukti</td>
                            <td>: <?php echo $header['nomor'];?></td>
                        </tr>
                        <tr>
                            <td>Tgl Bukti</td>
                            <td>: <?php echo tanggal_indo($header['tanggal']);?></td>
                        </tr>
                        <tr>
                            <td>Tgl Jth Tmp</td>
                            <td>: <?php echo tanggal_indo($header['tgl_jatuh_tempo']);?></td>
                        </tr>
                        <tr>
                            <td>Cek / Giro</td>
                            <td>: <?php echo $header['no_giro'];?></td>
                        </tr>
                        <tr>
                            <td>Kurs</td>
                            <td>: <?php echo number_format($header['kurs'],2,',','.');?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
            <tr><td colspan="3">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%">
                        <tr>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Keterangan</strong></td>
                            <td rowspan="2" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No Account</strong></td>
                            <td rowspan="2" style="text-align:center; border:1px solid #000;"><strong>Amount (<?=$header['currency'];?>)</strong></td>
                        </tr>
                       
                                <tr>
                                </tr>
                        <?php
                            $no = 0;
                            $total_vc = 0;
                            foreach ($list_data as $row){
                                $no++;
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>   
                            <td style="border-left:1px solid #000;">PEMB. <?=$row->nama.' '.$row->no_po;?></td>
                            <td style="text-align:right; border-left:1px solid #000;"><?=$row->keterangan;?></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right: 1px solid #000;"><?=number_format($row->amount,2,',', '.');?></td>
                        </tr>
                        <?php
                                $total_vc += $row->amount;
                            }
                        ?>
                        <tr style="height:100px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right;" colspan="3"><strong>Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;">
                                <strong><?=number_format($total_vc,2,',', '.');?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr><td colspan="3">
                    <p>&nbsp;</p>
                    <table border="0" width="100%">
                        <tr>
                            <td style="text-align:center">Mengetahui</td>
                            <td style="text-align:center">Disetujui</td>
                            <td style="text-align:center">Pembukuan</td>
                            <td style="text-align:center">Kassa/Keuangan</td>
                            <td style="text-align:center">Disetor / Diterima</td>
                        </tr>
                        <tr style="height:35">
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center">&nbsp;</td>
                            <td style="text-align:center"></td>
                        </tr>
                        <tr>
                            <td style="text-align:center">(_______________)</td>
                            <td style="text-align:center">(_______________)</td>
                            <td style="text-align:center">(_______________)</td>
                            <td style="text-align:center">(_______________)</td>
                            <td style="text-align:center">(_______________)</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
    <script type="text/javascript">
        window.onLoad=
    </script>
</html>
        