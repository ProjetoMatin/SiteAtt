<?php
require_once '../../../BASE/config.php';

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
                // header("Location: adminDash.php?page=loc_list&aviso=6");
                // echo "Não é possível excluir esta localidade. Existem usuários vinculados a ela.";
            } else {
                apagarLocalidadeCompleta($cx, $ref);
                // Não há usuários vinculados, então prossiga com a exclusão
                $deleteQ = "DELETE FROM localidade WHERE idCep = '$ref'";
                $deleteP = $cx->prepare($deleteQ);
                try {
                    $cx->beginTransaction();
                    $deleteP->execute();
                    $cx->commit();
                    // header("Location: adminDash.php?page=loc_list&aviso=7");
                } catch (PDOException $e) {
                    $cx->rollBack();
                    // header("Location: adminDash.php?page=loc_list&aviso=5");
                }
            }
            break;
        case 'usuario':
            // echo ' dentro do case';
            $selectQ = "SELECT * FROM usuario WHERE idUsu = '$ref'";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $total = $selectP->rowCount();

            if ($total != 1) {
                header('Location: ../../dashboard.php?page=usu_list&aviso=9');
                // echo "nao existe";
                die();
            } else {
                deletarUsuarioCompleto($cx, $ref);
                header('Location: ../../dashboard.php?page=usu_list&aviso=8');
            }
            break;

        case 'produto':
            $selectQ = "SELECT * FROM produto WHERE idProduto = '$ref'";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $total = $selectP->rowCount();

            if ($total != 1) {
                header('Location: ../../dashboard.php?page=usu_list&aviso=9');
                die();
            } else {
                deletarProdutoCompleto($cx, $ref);
                header('Location: ../../dashboard.php?page=usu_list&aviso=8');
            }
            break;

        case 'nPedido':
            $selectQ = "SELECT * FROM npedido WHERE idNPedido = '$ref'";
            $selectP = $cx->prepare($selectQ);
            $selectP->execute();
            $total = $selectP->rowCount();

            if ($total != 1) {
                header('Location: ../../dashboard.php?page=npedido_list&aviso=9');
                die();
            } else {
                deletarNPedidoCompleto($cx, $ref);
                header('Location: ../../dashboard.php?page=npedido_list&aviso=8');
            }
            break;

        case 'categoria':
            $tipo = $_REQUEST['tipo'] ?? "";

            if ($tipo == "especifico") {

                $selectQ = "SELECT * FROM produto WHERE idProduto = '$ref'";
                $selectP = $cx->prepare($selectQ);
                $selectP->execute();
                $total = $selectP->rowCount();

                if ($total != 1) {
                    // deletarCategoriaCompleto($cx, $ref);
                    // header('Location: ../../dashboard.php?page=cat_list&aviso=9');
                    die();
                } else {
                    deletarProdutoCompleto($cx, $ref);
                    header('Location: ../../dashboard.php?page=cat_list&aviso=8');
                }
            }else if ($tipo == "geral") {
                $selectQ = "SELECT prod.idCategoria AS produtoCategoria 
                            FROM categoria cat 
                            LEFT JOIN produto prod ON cat.idCategoria = prod.idCategoria 
                            WHERE cat.idCategoria = :ref";
                $selectP = $cx->prepare($selectQ);
                $selectP->bindParam(':ref', $ref, PDO::PARAM_INT);
                $selectP->execute();
                $dados = $selectP->fetch(PDO::FETCH_ASSOC);
            
                // Verifica se há algum produto vinculado à categoria
                if ($dados['produtoCategoria']) {
                    // Caso tenha produtos, redireciona com aviso 10
                    header('Location: ../../dashboard.php?page=cat_list&aviso=10');
                    die();
                }
            
                // Caso não tenha produtos vinculados, procede com a exclusão
                deletarCategoriaCompleta($cx, $ref);
                header('Location: ../../dashboard.php?page=usu_list&aviso=9');
                die();
            }
            break;
            
    }
} else {
}

function deletarCategoriaCompleta($cx, $ref)
{
    $tipo = $_REQUEST['tipo'] ?? ""; 
    if($tipo == "especifico"){
        deletarProdutoCategoria($cx, $ref);
    }else{
        deletarCategoria($cx, $ref);
    }

}

function deletarProdutoCategoria($cx, $ref){
    deletarProdutoCompleto($cx, $ref);
}

function deletarCategoria($cx, $ref)
{
    $deleteQ = "DELETE FROM categoria WHERE idCategoria = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarNPedidoCompleto($cx, $ref)
{
    $deleteQ = "DELETE FROM npedido WHERE idNPedido = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function apagarLocalidadeCompleta($cx, $ref)
{
    $deleteQ = "DELETE FROM local WHERE CEP = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarProdutoCompleto($cx, $ref)
{
    try{

        deletarNPedido($cx, $ref);
        deletarCria($cx, $ref);
        deletarDoCarrinho($cx, $ref);
        deletarFavorito($cx, $ref);
        deletarAvaliacaoProduto($cx, $ref);
        deletarFotosProduto($cx, $ref);
        deletarProduto($cx, $ref);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function deletarFotosProduto($cx, $ref){
    $deleteQ = "DELETE FROM produto_has_foto WHERE idProd = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarAvaliacaoProduto($cx, $ref){
    $deleteQ = "DELETE FROM avaliacao WHERE idProduto = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarFavorito($cx, $ref){
    $deleteQ = "DELETE FROM favoritos WHERE idProduto = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarNPedido($cx, $ref)
{
    $deleteQ = "DELETE FROM npedido WHERE idProduto = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarCria($cx, $ref)
{
    $deleteQ = "DELETE FROM cria WHERE idProduto = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarDoCarrinho($cx, $ref)
{
    $deleteQ = "DELETE FROM carrinho WHERE idProduto = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header('Location: ../DASHBOARD/adminDash.php?page=dash_ini');
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarProduto($cx, $ref)
{
    $deleteQ = "DELETE FROM produto WHERE idProduto = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        // header("Location: adminDash.php?page=prod_list&aviso=7");
    } catch (PDOException $e) {
        // echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=prod_list&aviso=5");
    }
}

function deletarUsuarioCompleto($cx, $ref)
{
    deletarUsuarioTemPergunta($cx, $ref);
    deletarNPedidoUsuario($cx, $ref);
    deletarCriaUsuario($cx, $ref);
    deletarCarrinhoUsuario($cx, $ref);
    deletarAvaliacaoUsuario($cx, $ref);
    deletarUsuario($cx, $ref);
}

function deletarAvaliacaoUsuario($cx, $ref)
{
    $deleteQ = "DELETE FROM avaliacao WHERE idUsu = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        echo "matou";
        // header("Location: adminDash.php?page=usu_list&aviso=7");
    } catch (PDOException $e) {
        echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=usu_list&aviso=5");
    }
}

function deletarUsuarioTemPergunta($cx, $ref)
{
    $deleteQ = "DELETE FROM usuario_has_pergunta WHERE id_vendedor = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        echo "matou";
        // header("Location: adminDash.php?page=usu_list&aviso=7");
    } catch (PDOException $e) {
        echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=usu_list&aviso=5");
    }
}

function deletarNPedidoUsuario($cx, $ref)
{
    $deleteQ = "DELETE FROM npedido WHERE idUsuVendedor = '$ref' OR idUsuComprador = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        echo "matou";
        // header("Location: adminDash.php?page=usu_list&aviso=7");
    } catch (PDOException $e) {
        echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=usu_list&aviso=5");
    }
}

function deletarCriaUsuario($cx, $ref)
{
    $deleteQ = "DELETE FROM cria WHERE idUsu = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        echo "matou";
        // header("Location: adminDash.php?page=usu_list&aviso=7");
    } catch (PDOException $e) {
        echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=usu_list&aviso=5");
    }
}

function deletarCarrinhoUsuario($cx, $ref)
{
    $deleteQ = "DELETE FROM carrinho WHERE idUsu = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        echo "matou";
        // header("Location: adminDash.php?page=usu_list&aviso=7");
    } catch (PDOException $e) {
        echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=usu_list&aviso=5");
    }
}

function deletarUsuario($cx, $ref)
{
    $deleteQ = "DELETE FROM usuario WHERE idUsu = '$ref'";
    $deleteP = $cx->prepare($deleteQ);
    try {
        // echo ' dentro do try';
        $cx->beginTransaction();
        $deleteP->execute();
        $cx->commit();
        echo "matou";
        // header("Location: adminDash.php?page=usu_list&aviso=7");
    } catch (PDOException $e) {
        echo ' caí no catch';
        $cx->rollBack();
        echo $e->getMessage();
        // header("Location: adminDash.php?page=usu_list&aviso=5");
    }
}
