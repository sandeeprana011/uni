<?php

$filename="alora";
$hashed="smitaskdf";

$data=$filename."".$hashed;
$ret = file_put_contents('image_config.txt', $data, FILE_TEXT | LOCK_EX);