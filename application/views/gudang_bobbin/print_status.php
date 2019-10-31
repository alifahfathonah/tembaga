<style type="text/css">
table td, table td * {
    vertical-align: top;
}
</style>
 <h2 align="center"><b><u>LAPORAN STATUS BOBBIN (
       <?php if($_GET['s']==0){
            echo 'READY';
        }elseif($_GET['s']==1){
            echo 'USED';
        }elseif($_GET['s']==2){
            echo 'DELIVERED';
        }else{
            echo 'BOOKED';
        }?>)</u></b></h2>
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
<table width="100%" cellpadding="0" cellspacing="0" style="font-size:12px;">
    <tr>
    <?php 
        foreach ($jenis as $key => $value) {
    ?>
        <td style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;">
        <table border="0" cellpadding="2" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" style="padding-top:4px; padding-bottom:4px; text-align:center; border-top:1px solid #000; width: 25%"><strong><?=$value->bobbin_size;?></strong></td>
            </tr>
            <tr>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>Nomor</strong></td>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>Berat</strong></td>
            </tr>
            <tr>
                    <?php
                    $jml = 0;
                    $query = $this->db->query('select * from m_bobbin where m_bobbin_size_id ='.$value->id.' and status ='.$_GET['s'])->result();
                    foreach ($query as $row){
                    $jml++;
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->berat.'</td>';
                        echo '</tr>';
                    }
                    ?>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>= <?=$jml;?></td>
            </tr>
        </table>
        </td>
    <?php } ?>
    </tr>
</table>
    <body onLoad="window.print()">
    </body>
</html>