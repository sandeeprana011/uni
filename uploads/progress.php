<?php
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$file_ext = strtolower(end(explode('.', $_FILES['file1']['name'])));

if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}

$expensions = array("mp4", "3gp", "avi", "mpeg");

if (in_array($file_ext, $expensions) === false) {
    $errors[] = "extension not allowed, please choose a MP4,3GP,AVI or MPEG file.";
    var_dump($errors);
    exit(0);
}

if ($fileSize > 2097152) {
    $errors[] = 'File size must be excately 2 MB';
    var_dump($errors);
    exit(0);
}

$filePath = "/home/uniquex/public_html/Videos/xxxunique.com-".$fileName;
if (!file_exists($filePath)) {
    if (move_uploaded_file($fileTmpLoc, $filePath)) {
        echo "$fileName upload is complete";
    } else {
        echo "move_uploaded_file function failed";
    }
}else{
    $filePath = "/home/uniquex/public_html/Videos/xxxunique.com-1".$fileName;
    if (move_uploaded_file($fileTmpLoc, $filePath)) {
        echo "$fileName upload is complete";
    } else {
        echo "move_uploaded_file function failed";
    }
}

?>