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
<table width="100%" cellpadding="0" cellspacing="0" style="font-size:12px;">
    <tr>
        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000; width: 25%"><strong>READY</strong></td>
            </tr>
            <tr>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>BOBBIN</strong></td>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>KERANJANG</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">
                <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                    <?php
                    foreach ($ready as $row){
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                </td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">
                <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                    <?php
                    foreach ($k_ready as $row){
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                </td>
            </tr>
        </table>
        </td>
        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000; width: 25%"><strong>BOOKED</strong></td>
            </tr>
            <tr>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>BOBBIN</strong></td>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>KERANJANG</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">
                <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                    <?php
                    foreach ($booked as $row){
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                </td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">
                <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                    <?php
                    foreach ($k_booked as $row){
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                </td>
            </tr>
        </table>
        </td>
        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000; width: 25%"><strong>USED</strong></td>
            </tr>
            <tr>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>BOBBIN</strong></td>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>KERANJANG</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">
                <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                    <?php
                    foreach ($used as $row){
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                </td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">
                <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                    <?php
                    foreach ($k_used as $row){
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                </td>
            </tr>
        </table>
        </td>
        <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-top:1px solid #000; width: 25%"><strong>DELIVERED</strong></td>
            </tr>
            <tr>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>BOBBIN</strong></td>
                <td style="padding-top:4px; padding-bottom:4px; text-align:center; border-left:1px solid #000; border-right:1px solid #000; border-bottom:1px solid #000; border-top:1px solid #000; width: 50%"><strong>KERANJANG</strong></td>
            </tr>
            <tr>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000">
                <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                    <?php
                    foreach ($delivered as $row){
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
                </td>
                <td style="text-align:center; border-bottom:1px solid #000; border-left:1px solid #000; border-right:1px solid #000">
                <table border="0" cellpadding="4" cellspacing="0" width="100%" style="font-size:12px;">
                    <?php
                    foreach ($k_delivered as $row){
                        echo '<tr>';
                        echo '<td style="text-align:center; border-bottom:1px solid #000;">'.$row->nomor_bobbin.'</td>';
                        echo '</tr>';
                    }
                    ?>
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