<?php 
$bdhost = "localhost";
$bduser = "root";
$bdpass = "";
$bdname = "vetcardonabd";
$dsn = "mysql:host=$bdhost;dbname=$bdname";

try{
     $conn = new PDO($dsn, $bduser, $bdpass);
} catch(PDOException $error) {
     echo $error->getMessage();
}