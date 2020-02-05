<style type="text/css">
table td, table td * {
    vertical-align: top;
}
</style>
 <h2 align="center"><b><u>LAPORAN STATUS BOBBIN</u></b></h2>
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
<table width="100%" cellpadding="5" cellspacing="0" style="font-size:12px;">
    <tr>
        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <?php 
                    $baris = 0;
                    $counter = 0;
                    $c = count($ready);
                    $b = count($k_ready);
                    $t = $c+$b;
                    $c_t = ($c/$t)*12;
                    $b_t = ($b/$t)*12;
                    // echo $c_t." | ".$b_t;
                    $bagi = round($c_t);
                    $bagik = round($b_t);
                    if($bagi==0){
                        $bagi = $bagi+1;
                        $bagik = $bagik-1;
                    }elseif($bagik==0){
                        $bagi = $bagi-1;
                        $bagik = $bagik+1;
                    }
                    if($bagi+$bagik==0){
                        $bagic=1;
                    }else{
                        $bagic = $bagi+$bagik;
                    }
                    $jml = 0; ?>
            <tr>
                <td colspan="<?=$bagic;?>" style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;"><strong>READY</strong></td>
            </tr>
            <tr>
                <td>
                <table border="0" cellpadding="2" cellspacing="0" width="100%">
                    <tr>
                    <?php for ($i=0; $i < $bagi ; $i++) {
                        $baris++; ?>
                        <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BOBBIN</strong></td>
                    <?php } ?>
                    </tr>
                    <?php
                    foreach ($ready as $row){
                        $n=0;
                        if($counter % $bagi == 0){
                            echo '<tr>';
                        }
                                echo '<td style="text-align:center; border-bottom:1px solid #000;border-left:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        if(($counter +1) % $bagi == 0){ 
                            $n=0;
                            echo '</tr>';
                        }
                        $counter++;
                    }
                    ?>
                </table>
                </td>
                <td>
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                    <?php
                     for ($i=0; $i < $bagik ; $i++) {
                    $baris++; ?>
                        <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KRJ</strong></td>
                    <?php } ?>
                        </tr>
                    <?php
                    $counter = 0;
                    foreach ($k_ready as $row){
                        $n=0;
                            if($counter % $bagik == 0){
                                echo '<tr>';
                            }
                                    echo '<td style="text-align:center; border-bottom:1px solid #000;border-left:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                            if(($counter +1) % $bagik == 0){ 
                                $n=0;
                                echo '</tr>';
                            }
                            $counter++;
                    } ?>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
    <tr>
        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <?php 
                    $baris = 0;
                    $counter = 0;
                    $c = count($booked);
                    $b = count($k_booked);
                    $t = $c+$b;
                    $c_t = ($c/$t)*12;
                    $b_t = ($b/$t)*12;
                    // echo $c_t." | ".$b_t;
                    $bagi = round($c_t);
                    $bagik = round($b_t);
                    if($bagi==0){
                        $bagi = $bagi+1;
                        $bagik = $bagik-1;
                    }elseif($bagik==0){
                        $bagi = $bagi-1;
                        $bagik = $bagik+1;
                    }
                    if($bagi+$bagik==0){
                        $bagic=1;
                    }else{
                        $bagic = $bagi+$bagik;
                    }
                    $jml = 0; ?>
            <tr>
                <td colspan="<?=$bagic;?>" style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;"><strong>Booked</strong></td>
            </tr>
            <tr>
                <td>
                <table border="0" cellpadding="2" cellspacing="0" width="100%">
                    <tr>
                    <?php for ($i=0; $i < $bagi ; $i++) {
                        $baris++; ?>
                        <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BOBBIN</strong></td>
                    <?php } ?>
                    </tr>
                    <?php
                    foreach ($booked as $row){
                        $n=0;
                        if($counter % $bagi == 0){
                            echo '<tr>';
                        }
                                echo '<td style="text-align:center; border-bottom:1px solid #000;border-left:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        if(($counter +1) % $bagi == 0){ 
                            $n=0;
                            echo '</tr>';
                        }
                        $counter++;
                    }
                    ?>
                </table>
                </td>
                <td>
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                    <?php
                     for ($i=0; $i < $bagik ; $i++) {
                    $baris++; ?>
                        <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KRJ</strong></td>
                    <?php } ?>
                        </tr>
                    <?php
                    $counter = 0;
                    foreach ($k_booked as $row){
                        $n=0;
                            if($counter % $bagik == 0){
                                echo '<tr>';
                            }
                                    echo '<td style="text-align:center; border-bottom:1px solid #000;border-left:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                            if(($counter +1) % $bagik == 0){ 
                                $n=0;
                                echo '</tr>';
                            }
                            $counter++;
                    } ?>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
    <tr>
        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <?php 
                    $baris = 0;
                    $counter = 0;
                    $c = count($used);
                    $b = count($k_used);
                    $t = $c+$b;
                    $c_t = ($c/$t)*12;
                    $b_t = ($b/$t)*12;
                    // echo $c_t." | ".$b_t;
                    $bagi = round($c_t);
                    $bagik = round($b_t);
                    if($bagi==0){
                        $bagi = $bagi+1;
                        $bagik = $bagik-1;
                    }elseif($bagik==0){
                        $bagi = $bagi-1;
                        $bagik = $bagik+1;
                    }
                    if($bagi+$bagik==0){
                        $bagic=1;
                    }else{
                        $bagic = $bagi+$bagik;
                    }
                    $jml = 0; ?>
            <tr>
                <td colspan="<?=$bagic;?>" style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;"><strong>USED</strong></td>
            </tr>
            <tr>
                <td>
                <table border="0" cellpadding="2" cellspacing="0" width="100%">
                    <tr>
                    <?php for ($i=0; $i < $bagi ; $i++) {
                        $baris++; ?>
                        <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BOBBIN</strong></td>
                    <?php } ?>
                    </tr>
                    <?php
                    foreach ($used as $row){
                        $n=0;
                        if($counter % $bagi == 0){
                            echo '<tr>';
                        }
                                echo '<td style="text-align:center; border-bottom:1px solid #000;border-left:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        if(($counter +1) % $bagi == 0){ 
                            $n=0;
                            echo '</tr>';
                        }
                        $counter++;
                    }
                    ?>
                </table>
                </td>
                <td>
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                    <?php
                     for ($i=0; $i < $bagik ; $i++) {
                    $baris++; ?>
                        <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KRJ</strong></td>
                    <?php } ?>
                        </tr>
                    <?php
                    $counter = 0;
                    foreach ($k_used as $row){
                        $n=0;
                            if($counter % $bagik == 0){
                                echo '<tr>';
                            }
                                    echo '<td style="text-align:center; border-bottom:1px solid #000;border-left:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                            if(($counter +1) % $bagik == 0){ 
                                $n=0;
                                echo '</tr>';
                            }
                            $counter++;
                    } ?>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
    <tr>
        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <?php 
                    $baris = 0;
                    $counter = 0;
                    $c = count($delivered);
                    $b = count($k_delivered);
                    $t = $c+$b;
                    $c_t = ($c/$t)*12;
                    $b_t = ($b/$t)*12;
                    // echo $c_t." | ".$b_t;
                    $bagi = round($c_t);
                    $bagik = round($b_t);
                    if($bagi==0){
                        $bagi = $bagi+1;
                        $bagik = $bagik-1;
                    }elseif($bagik==0){
                        $bagi = $bagi-1;
                        $bagik = $bagik+1;
                    }
                    if($bagi+$bagik==0){
                        $bagic=1;
                    }else{
                        $bagic = $bagi+$bagik;
                    }
                    $jml = 0; ?>
            <tr>
                <td colspan="<?=$bagic;?>" style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000;"><strong>DELIVERED</strong></td>
            </tr>
            <tr>
                <td>
                <table border="0" cellpadding="2" cellspacing="0" width="100%">
                    <tr>
                    <?php for ($i=0; $i < $bagi ; $i++) {
                        $baris++; ?>
                        <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>BOBBIN</strong></td>
                    <?php } ?>
                    </tr>
                    <?php
                    foreach ($delivered as $row){
                        $n=0;
                        if($counter % $bagi == 0){
                            echo '<tr>';
                        }
                                echo '<td style="text-align:center; border-bottom:1px solid #000;border-left:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        if(($counter +1) % $bagi == 0){ 
                            $n=0;
                            echo '</tr>';
                        }
                        $counter++;
                    }
                    ?>
                </table>
                </td>
                <td>
                    <table border="0" cellpadding="2" cellspacing="0" width="100%">
                        <tr>
                    <?php
                     for ($i=0; $i < $bagik ; $i++) {
                    $baris++; ?>
                        <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000;"><strong>KRJ</strong></td>
                    <?php } ?>
                        </tr>
                    <?php
                    $counter = 0;
                    foreach ($k_delivered as $row){
                        $n=0;
                            if($counter % $bagik == 0){
                                echo '<tr>';
                            }
                                    echo '<td style="text-align:center; border-bottom:1px solid #000;border-left:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                            if(($counter +1) % $bagik == 0){ 
                                $n=0;
                                echo '</tr>';
                            }
                            $counter++;
                    } ?>
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>
    <body onLoad="window.print()">
    </body>
</html>