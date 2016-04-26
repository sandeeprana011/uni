<?php
include '../PHPClasses/Downloader.php';
//echo "downloader";
$download=new Downloader();
//$download->returnVideo("9af0b9861216ec4391a18c315ee438d9.gif");
$download->returnVideo($_REQUEST['token']);
?>