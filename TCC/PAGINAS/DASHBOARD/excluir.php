<?php 

require_once '../BANCO/abrirBanco.php';

$ref = $_REQUEST['ref'] ?? '';
$tbl = $_REQUEST['tbl'] ?? '';
echo $tbl;

if(!empty($ref) || !empty($tbl)){
    switch($tbl){
        case 'localidade':
            $selectQ = "SELECT * FROM localidade WHERE idCep = '$ref'";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $total = $selectP->rowCount();

            if($total != 1){
                header('Location: adminDash.php');
                die();
            }else{
                $deleteQ = "DELETE FROM localidade WHERE idCep = '$ref'";
                $deleteP = $cx->prepare($deleteQ);
                try{
                    $cx->beginTransaction();
                    $deleteP->execute();
                    $cx->commit();
                    header('Location: adminDash.php');
                }catch(PDOException $e){
                    $cx->rollBack();
                    $e->getMessage();
                }
            }
            break;
        case 'usuario':
            echo ' dentro do case';
            $selectQ = "SELECT * FROM usuario WHERE idUsu = '$ref'";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $total = $selectP->rowCount();
            
            if($total != 1){
                header('Location: adminDash.php');
                die();
            }else{
                echo ' dentro do else';
                $deleteQ = "DELETE FROM usuario WHERE idUsu = '$ref'";
                $deleteP = $cx->prepare($deleteQ);
                try{
                    echo ' dentro do try';
                    $cx->beginTransaction();
                    $deleteP->execute();
                    $cx->commit();
                    header('Location: adminDash.php');
                }catch(PDOException $e){
                    echo ' caí no catch';
                    $cx->rollBack();
                    $e->getMessage();
                }
            }
            break;
    }
}else{
    header('Location: adminDash.php');
}

require_once '../BANCO/fecharBanco.php';
