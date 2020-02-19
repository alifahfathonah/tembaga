<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8" />
    </head>
    <body class="margin-left:40px;">
        <h3 style="text-align: center; text-decoration: underline;"><?php if($this->session->userdata('user_ppn')==1){ echo 'PT. KAWAT MAS PRAKASA<br>'; }?>TOLLING <?=(($header['jenis']=='SO')? $header['nama_customer']:$header['nama_supplier']).' DAN KMP'?></h3>
        <table border="0" cellpadding="2" cellspacing="0" width="900px" style="font-family:Microsoft Sans Serif">
            <tr>
                <td align="center"><h3>Terima Scrap</h3></td>
                <td align="center"><h3>Kirim BCW / Barang Jadi</h3></td>
            </tr>
            <tr>
                <td style="vertical-align: top;">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 14px;">
                        <tr>
                            <td width="5%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td width="28%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Sales Order</strong></td>
                            <td width="32%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Penerimaan</strong></td>
                            <td width="18%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Tanggal</strong></td>
                            <td width="17%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Netto</strong></td>                        
                        </tr>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000;"></td>
                            <td colspan="3" style="border-left:1px solid #000; border-bottom:1px solid #000;">SISA AWAL BLN</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right: 1px solid #000; border-bottom:1px solid #000;"><?=number_format($stok_awal['netto'],2,',', '.');?></td>
                        </tr>
                        <?php
                            $no = 1;
                            $total = 0;
                            foreach ($details_bahan as $row){
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->no_sales_order;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->nomor;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->tanggal;?></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right: 1px solid #000;"><?=number_format($row->netto,2,',', '.');?></td>
                        </tr>
                        <?php
                                $total += $row->netto;
                                $no++;
                            }
                            $grand_total = $total+$stok_awal['netto'];
                        ?>
                        <tr style="height:50px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;" colspan="4"><strong>Sub Total</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right: 1px solid #000;">
                                <strong><?=number_format($total,2,',', '.');?></strong>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;" colspan="4"><strong>Grand Total In</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right: 1px solid #000;">
                                <strong><?=number_format($grand_total,2,',', '.');?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="vertical-align: top;">
                    <table border="0" cellpadding="2" cellspacing="0" width="100%" style="font-size: 14px;">
                        <tr>
                            <td width="5%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No</strong></td>
                            <td width="28%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Sales Order</strong></td>
                            <td width="30%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>No. Surat Jalan</strong></td>
                            <td width="20%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Tanggal</strong></td>
                            <td width="17%" style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; border-right:1px solid #000;"><strong>Netto</strong></td>         
                        </tr>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000;"></td>
                            <td colspan="3" style="border-left:1px solid #000; border-bottom:1px solid #000;">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right: 1px solid #000; border-bottom:1px solid #000;"></td>
                        </tr>
                        <?php
                            $no = 1;
                            $nominal = 0;
                            foreach ($details_kirim as $row){
                        ?>
                        <tr>
                            <td style="text-align:center; border-left:1px solid #000;"><?=$no;?></td>
                            <td style="border-left:1px solid #000;"><?=$row->no_sales_order;?></td>
                            <td style="text-align:left; border-left:1px solid #000;"><?=$row->nomor;?></td>
                            <td style="text-align:left; border-left:1px solid #000;"><?=$row->tanggal;?></td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000;"><?=number_format($row->netto,2,',','.');?></td>
                        </tr>
                        <?php $nominal += $row->netto; $no++;
                    } 
                    $sisa = $grand_total-$nominal;
                    ?>
                        <tr style="height:50px">
                            <td style="text-align:center; border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="border-left:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                            <td style="text-align:right; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align: right; border-left:1px solid #000; border-bottom:1px solid #000;"><strong>Grand Total Out</strong></td>
                            <td style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"><strong><?=number_format($nominal,2,',','.');?></strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size: 14px;">
                        <td style="text-align: right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000;"><strong>Sisa Yang Belum Dikirim KMP</strong></td>
                        <td style="text-align:right; border-left:1px solid #000; border-top:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"><strong><?=number_format($sisa,2,',','.');?></strong></td>
                    </table>
                </td>
            </tr>
        </table>
        <?php
            $ppn = $this->session->userdata('user_ppn');
            $next_m =  date('Y-m-d', strtotime('first day of next month', strtotime($start)));
            $query = $this->db->query("select * from stok_awal_laporan where tanggal ='".$next_m."' and customer_id =".$_GET['l']." and supplier_id = 0 and jenis= 1 and flag_ppn = ".$ppn." and tipe = 0")->row_array();
            if(empty($query)){
                if($sisa > 0){
                    $this->db->insert('stok_awal_laporan', array(
                        'flag_ppn'=>$ppn,
                        'jenis'=>1,
                        'tipe'=>0,
                        'tanggal'=>$next_m,
                        'customer_id'=>$_GET['l'],
                        'supplier_id'=>0,
                        'netto'=>$sisa,
                        'created_by'=> $this->session->userdata('user_id'),
                        'created_at'=> date('Y-m-d H:i:s')
                    ));
                }
            }else{
                $this->db->where('id', $query['id']);
                $this->db->update('stok_awal_laporan', array(
                    'netto'=>$sisa,
                    'created_by'=> $this->session->userdata('user_id'),
                    'created_at'=> date('Y-m-d H:i:s')
                ));
            }
        ?>
        <p>&nbsp;</p>
    <body onLoad="window.print()">
    </body>
</html> 