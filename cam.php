<?php
//554
//3702
error_reporting(E_ALL);
    $img="http://192.168.5.5:37777/snapshot.cgi?user=admin&pwd=saguremote2018"; 
    header ('content-type: image/jpeg');
    readfile($img);

?> 
        