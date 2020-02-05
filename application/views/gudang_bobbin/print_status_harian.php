<style type="text/css">
table td, table td * {
    vertical-align: top;
}
</style>
 <h2 align="center"><b><u>LAPORAN STATUS BOBBIN (
       <?php if($_GET['l']==0){
            echo 'ALL STATUS -> READY';
        }elseif($_GET['l']==1){
            echo 'BOOKED -> USED';
        }elseif($_GET['l']==2){
            echo 'USED -> DELIVERED';
        }else{
            echo 'READY -> BOOKED';
        }?>)</u></b></h2>
 <table width="100%">
    <tr>
        <td width="33%">&nbsp;</td>
        <?php
        $tanggal = tanggal_indo(date("Y-m-d"));
        $split = explode('-', $tanggal);
        ?>
        <td width="34%" align="center"><h3>As Of : <?=tanggal_indo(date('Y-m-d', strtotime($_GET['t'])));?></h3></td>
        <td width="33%">&nbsp;</td>
    </tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0" style="font-size:12px;">
    <tr>
    <?php 
    $baris = 0;
    $last_size = null;
        foreach ($jenis as $key => $value) {

            if($last_size != $value->bobbin_size && $last_size != null){
    ?>
                    <td>Jumlah</td>
                    <td>= <?=$baris;?></td>
                </tr>
            </table>
        </td>    
    <?php $baris = 0;} 

     if($last_size != $value->bobbin_size){ ?>
        <td style="border-left: 1px solid #000; border-right: 1px solid #000; border-bottom: 1px solid #000;">
            <table border="0" cellpadding="2" cellspacing="0" width="100%">
                <tr>
                    <td colspan="2" style="padding-top:4px; padding-bottom:4px; text-align:center; border-top:1px solid #000; width: 25%"><strong><?=$value->bobbin_size;?></strong></td>
                </tr>
                <tr>
                    <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Nomor</strong></td>
                    <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>Berat</strong></td>
                </tr>
    <?php }  ?>
                <tr>
                    <?php
                    $baris++;
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$value->nomor_bobbin.'</td>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$value->berat.'</td>';
                ?>
                </tr>
                <tr>
    <?php 
        $last_size = $value->bobbin_size;
    }
        // if($baris==11){
        //     echo "</tr>";
        //     echo "</table>";
        //     echo "<br><br><br><br>";
        //     echo '<table width="100%" cellpadding="0" cellspacing="0" style="font-size:12px;">';
        //     echo "<tr>";
        // }?><td>Jumlah</td>
                    <td>= <?=$baris;?></td>
                </tr>
            </table>
        </td>  
</tr>
</table>
    <body onLoad="window.print()">
    </body>
</html>