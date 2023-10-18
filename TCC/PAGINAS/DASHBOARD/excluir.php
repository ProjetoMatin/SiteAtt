<?php

require_once '../BANCO/abrirBanco.php';

$ref = $_REQUEST['ref'] ?? '';
$tbl = $_REQUEST['tbl'] ?? '';
// echo $tbl;
// echo $ref;

if (!empty($ref) || !empty($tbl)) {
    switch ($tbl) {
        case 'localidade':
            // Verificar se há usuários vinculados a esta localidade
            $selectQ = "SELECT COUNT(*) as userCount FROM usuario WHERE idCep = '$ref'";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $selectP = $selectP->fetch(PDO::FETCH_ASSOC);
            $total = $selectP['userCount'];

            if ($total > 0) {
                // Há usuários vinculados a esta localidade, então não exclua
                header("Location: adminDash.php?page=loc_list&aviso=6");
                // echo "Não é possível excluir esta localidade. Existem usuários vinculados a ela.";
            } else {
                // Não há usuários vinculados, então prossiga com a exclusão
                $deleteQ = "DELETE FROM localidade WHERE idCep = '$ref'";
                $deleteP = $cx->prepare($deleteQ);
                try {
                    $cx->beginTransaction();
                    $deleteP->execute();
                    $cx->commit();
                    header("Location: adminDash.php?page=loc_list&aviso=7");
                } catch (PDOException $e) {
                    $cx->rollBack();
                    header("Location: adminDash.php?page=loc_list&aviso=5");
                }
            }
            break;
        case 'usuario':
            echo ' dentro do case';
            $selectQ = "SELECT * FROM usuario WHERE idUsu = '$ref'";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $total = $selectP->rowCount();

            if ($total != 1) {
                header('Location: ../DASHBOARD/adminDash.php');
                die();
            } else {
                echo ' dentro do else';
                $deleteQ = "DELETE FROM usuario WHERE idUsu = '$ref'";
                $deleteP = $cx->prepare($deleteQ);
                try {
                    echo ' dentro do try';
                    $cx->beginTransaction();
                    $deleteP->execute();
                    $cx->commit();
                    header('Location: ../DASHBOARD/adminDash.php');
                } catch (PDOException $e) {
                    echo ' caí no catch';
                    $cx->rollBack();
                    $e->getMessage();
                }
            }
            break;
    }
} else {
    header('Location: ../DASHBOARD/adminDash.php');
}

require_once '../BANCO/fecharBanco.php';
