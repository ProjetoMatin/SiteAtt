<?php

try{
    $localhost = "localhost";
    $dbroot = "root";
    $dbpass = "";
    $db = "testesozinho";

    $conexao = new PDO("mysql:dbname=$db; host=" .$localhost, $dbroot, $dbpass);

    $sql = $conexao->query("SELECT * FROM caduser");
    $sql->execute();
    // echo "Existe " .$sql->rowCount() . " Registros";


}catch(PDOException $e){
    echo $e;
}
?>