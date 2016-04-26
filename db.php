<?php

$host='localhost';
$username='uniquexrana';
$password='Q1w2e3r4t5y6@';
$databse='uniquexrana';

$conn=mysqli_connect($host,$username,$password,$databse,'3306',null);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "connection established";
}


