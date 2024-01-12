<?php 

$localhost = "localhost";
$root = "root";
$passw = "";
$db = "matin";

try{
    $cx = new PDO("mysql:host=$localhost;dbname=$db", $root, $passw);
    // echo "foi";
}catch(PDOException $e){
    $e->getMessage();
    // echo "foi nao pit";
}

?>