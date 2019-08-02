<?php

$content = $_POST['nospb'];
file_put_contents('barcode_new.prn', $content);
shell_exec('PrFile32.exe barcode_new.prn');

//echo" <h1 align='center'> Print.. </h1> <p align='center'><a href='/tembaga/index.php/GudangFG/spb_list'> <input type='button' value='BACK' style='padding:50px;'> </a></p>";
?>
<script type="text/javascript">
window.close();
</script>
