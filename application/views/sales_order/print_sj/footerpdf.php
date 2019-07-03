        <table border="0" width="100%">
            <tr>
                <td style="text-align:center">Tanda Terima</td>
                <td style="text-align:center">Pembawa / Supir</td>
                <td style="text-align:center">Diperiksa</td>
                <td style="text-align:center">Mengetahui</td>
                <td style="text-align:center">Hormat Kami</td>
            </tr>
            <tr style="height:35">
                <td style="text-align:center">&nbsp;</td>
                <td style="text-align:center">&nbsp;</td>
                <!-- <td style="text-align:center">&nbsp;</td> -->
                <td style="text-align:center">&nbsp;</td>
                <td style="text-align:center">&nbsp;</td>
            </tr>
            <tr><?php if($this->session->userdata('user_ppn')==1){?>
                <td style="text-align:center">(_____________)</td>
                <td style="text-align:center">(_____________)</td>
                <td style="text-align:center">(_____________)</td>
                <td style="text-align:center"><strong>(Tjan Lin Oy)</strong></td>
                <td style="text-align:center"><strong>(Istadi)</strong></td>
                <?php }else{ ?>
                <td style="text-align:center">(_____________)</td>
                <td style="text-align:center">(_____________)</td>
                <td style="text-align:center">(_____________)</td>
                <td style="text-align:center"><strong>(Andi)</strong></td>
                <td style="text-align:center"><strong>(Bambang)</strong></td>
                <?php } ?>
            </tr>
        </table>
    </body>
</html>