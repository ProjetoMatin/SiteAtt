<?php 

$localhost = "localhost";
$root = "root";
$passw = "";
$db = "matin";

try{
    $cx = new PDO("mysql:host=$localhost;dbname=$db", $root, $passw);
    // echo "foi";
}catch(PDOException $e){
    throw $e;
}

?>