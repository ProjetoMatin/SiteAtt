<?php
require_once '../../../BASE/config.php';

$idUsu = $_REQUEST['idUsu'] ?? "";
$idProduto = $_REQUEST['idProduto'] ?? "";
$nomeProduto = $_REQUEST['Nome'] ?? "";
$qntProd = $_REQUEST['qntProd'] ?? "";
$preco = $_REQUEST['preco'] ?? ""; 

$promocao = $_REQUEST['promocao'] ?? "";

if ($promocao) {
    $promocaoNumero = $_REQUEST['promocaoNumero'] ?? null;  
} else {
    $promocaoNumero = null;
}

$parcela = $_REQUEST['parcela'] ?? null;
$categoria = $_REQUEST['categoria'] ?? ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['fotos'])) {
        $foto_original = $_FILES['fotos'];
        $origem = $foto_original['tmp_name'];
        $nomeOriginal = $foto_original['name'];

        if (!empty($origem)) {
            $ext = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
            $destino = "foto-produto-$idUsu-$idProduto.$ext";
            move_uploaded_file($origem, "../../../IMAGES-BD/PRODUTOS/" . $destino);
        } else {
            $destino = 'sem_foto.png';
        }
        
        $dataAtual = date('Y-m-d');

        if($parcela){
            $insertQ = "INSERT INTO produto (nome_prod, qnt_prod_estoque, data_criacao_prod, preco_prod, fotos_prod, qnt_vendas, promocao, parcela, idCategoria) VALUES (:nome_prod, :qnt_prod_estoque, :data_criacao_prod, :preco_prod, :fotos_prod, 0, :promocao, 12, :idCategoria)";
        }else{
            $insertQ = "INSERT INTO produto (nome_prod, qnt_prod_estoque, data_criacao_prod, preco_prod, fotos_prod, qnt_vendas, promocao, parcela, idCategoria) VALUES (:nome_prod, :qnt_prod_estoque, :data_criacao_prod, :preco_prod, :fotos_prod, 0, :promocao, null, :idCategoria)";
            
        }
        $insertP = $cx->prepare($insertQ);   
        
        try {
            $cx->beginTransaction();
            $insertP->execute([
                ':nome_prod' => $nomeProduto,
                ':qnt_prod_estoque' => $qntProd,
                ':data_criacao_prod' => $dataAtual,
                ':preco_prod' => $preco,
                ':fotos_prod' => $destino,
                ':promocao' => $promocaoNumero,
                ':idCategoria' => $categoria
            ]);         
            $cx->commit();
            header("Location: ../../../PAGES/dashboard.php?page=prod_list&aviso=6");
        } catch(PDOException $e) {
            $cx->rollBack();
            echo "Erro ao cadastrar o produto: " . $e->getMessage();
        }
    }
}
?>
