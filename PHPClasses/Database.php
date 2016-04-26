<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database
{
    function connection(){

        $host = 'localhost';
        $username = 'uniquexrana';
        $password = 'Q1w2e3r4t5y6@';
        $dbname = 'uniquexrana';
        $port = '';

        $conn = mysqli_connect($host, $username, $password, $dbname, NULL, NULL);
//       if ($conn){
//           echo "connected";
//       }
        return $conn;
    }

}
