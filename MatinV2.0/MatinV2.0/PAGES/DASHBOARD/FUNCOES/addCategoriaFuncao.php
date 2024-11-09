<?php
require_once '../../../BASE/config.php';

$idUsu = $_REQUEST['idUsu'] ?? "";
$idCategoria = $_REQUEST['idCategoria'] ?? "";
$nomeCategoria = $_REQUEST['Nome'] ?? "";
$descricaoCat = $_REQUEST['descricaoCat'] ?? "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['fotos'])) {
        $foto_original = $_FILES['fotos'];
        $origem = $foto_original['tmp_name'];
        $nomeOriginal = $foto_original['name'];

        if (!empty($origem)) {
            $ext = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
            $destino = "foto-produto-$idUsu-$idCategoria.$ext";
            move_uploaded_file($origem, "../../../IMAGES-BD/CATEGORIAS/" . $destino);
        } else {
            $destino = 'sem_foto.png';
        }

        $insertQ = "INSERT INTO categoria (nome_cat, img_cat, desc_cat, qnt_vis) VALUES (:nomeCat, :img, :descricao, 0)";
        $insertP = $cx->prepare($insertQ);

        try {
            $cx->beginTransaction();
            $insertP->execute([
                ':nomeCat' => $nomeCategoria,
                ':img' => $destino,
                ':descricao' => $descricaoCat,
            ]);
            $cx->commit();
            header("Location: ../../../PAGES/dashboard.php?page=cat_list&idCat=geral&aviso=6");
        } catch (PDOException $e) {
            $cx->rollBack();
            echo "Erro ao cadastrar o produto: " . $e->getMessage();
        }
    }
}
