<?php

/**
 * Created by PhpStorm.
 * User: sandeeprana
 * Date: 15/04/16
 * Time: 1:04 AM
 */
//require_once "../db.php";
include "Database.php";

class Downloader
{
    function returnVideo($hashString)
    {

        $co=new Database();
        $conn=$co->connection();


//  echo "succes";
        $sql="SELECT path_video FROM ux_video WHERE `thumbnail`=\"".$hashString."\"";
        $result=$conn->query($sql);
        if ($result->num_rows>0){
            $row=$result->fetch_assoc();
            $file = $row['path_video'];
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($file) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
//                $fi=fopen($file,"r");
//                $res=fread($fi,filesize($file));

                return readfile($file);
//                return $res;
                $conn->close();
                exit;
            }
        }
        else{
            echo "no result found";
        }
    }


}