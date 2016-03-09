<?php
$host='localhost';
$username='uniquexrana';
$password='Q1w2e3r4t5y6@';
$databse='uniquexrana';

$conn=mysqli_connect($host,$username,$password,$databse,'3306',null);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
$file_ext = strtolower(end(explode('.', $_FILES['file1']['name'])));
$pornstar_id=$_POST['pornstar_id'];
$description=$_POST['description'];


function makeThumb($filePath,$fileName,$p_id,$description,$cat_id,$user_id,$status,$connect) {
    $fileHashName=hash('md5',$fileName);
    echo "Starting ffmpeg...\n\n";
//    echo shell_exec("ffmpeg -ss 3 -i bbb.mp4 -vframes 20 -s 420x270 Out.jpg ");
    var_dump($filePath);
//    echo shell_exec("ffmpeg -v warning -ss 2 -t 0.8 -i ".$filePath." -vf scale=200:-1 -gifflags +transdiff -y ".$fileHashName.".gif");
    echo shell_exec("ffmpeg -v warning -ss 2 -t 0.8 -i bbbbb.mp4 -vf scale=200:-1 -gifflags +transdiff -y arom.gif");

//    $sql = "INSERT INTO  ux_video () VALUES (".$fileName.", ".$p_id.", ".$description.",".$cat_id.",NOW(),false,".$filePath.",".$user_id.",".$status.",".$fileHashName);
    $sql = "INSERT INTO `uniquexrana`.`ux_video` (`video_id`, `video_name`, `pornstar_id`, `description`, `category_id`, `time_upload`, `delete_video`, `path_video`, `user_id`, `status`, `thumbnail`)
VALUES (NULL, '".$fileName."', '".$p_id."', '".$description."', '".$cat_id."', CURRENT_TIMESTAMP, '0', '".$filePath."', '".$user_id."', '".$status."', '".$fileHashName."');";


    if($connect->query($sql)===TRUE){
        echo 'inserted data';
    }else{
        echo 'insertion failed';
    };

    echo "Done.\n";
}


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
mover($filePath,$fileTmpLoc,$fileName,$pornstar_id,$description,$conn,0);
//if (!file_exists($filePath)) {
//    if (move_uploaded_file($fileTmpLoc, $filePath)) {
//        echo "$fileName upload is complete";
//
//        makeThumb($filePath,$fileName,$pornstar_id,$description,"0","0","1",$conn);
//    } else {
//        echo "move_uploaded_file function failed";
//    }
//}else{
//    $filePath = "/home/uniquex/public_html/Videos/xxxunique.com-1".$fileName;
//
//    if (move_uploaded_file($fileTmpLoc, $filePath)) {
//        makeThumb($filePath,$fileName,$pornstar_id,$description,"0","0","1",$conn);
//        echo "$fileName upload is complete";
//    } else {
//        echo "move_uploaded_file function failed";
//    }
//
//}

function mover($filePath,$fileTmpLoc,$fileName,$pornstar_id,$description,$conn,$incrementer){
    if(!file_exists($filePath)){
        if (move_uploaded_file($fileTmpLoc, $filePath)) {
            echo "$fileName upload is complete";

            makeThumb($filePath,$fileName,$pornstar_id,$description,"0","0","1",$conn);
        } else {
            echo "move_uploaded_file function failed";
        }
    }else{
        $filePath = "/home/uniquex/public_html/Videos/xxxunique.com-".++$incrementer.$fileName;
        mover($filePath,$fileTmpLoc,$fileName,$pornstar_id,$description,$conn,$incrementer);
    }
}



?>