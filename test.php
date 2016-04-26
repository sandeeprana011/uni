<?php

require_once 'getID3-master/getid3/getid3.php';
$getID3=new getID3();

$filename="/home/uniquex/public_html/Videos/bbbbb.mp4";
$file=$getID3->analyze($filename);

echo("Duration: ".$file['playtime_string'].
    " / Dimensions: ".$file['video']['resolution_x']." wide by ".$file['video']['resolution_y']." tall".
    " / Filesize: ".($file['filesize']/(1024*1024))." MB<br />");