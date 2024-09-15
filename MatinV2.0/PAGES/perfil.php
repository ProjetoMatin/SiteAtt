<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/perfil.css">

<?php require_once 'BASE/config.php'; ?>
<?php require_once 'MODEL/autenticacao.php'; ?>

<?php

require_once 'BASE/config.php';

$id = $_SESSION['idUsu'] ?? '';

if (!isset($_SESSION['idUsu'])) {
    echo "<script>location.href='CREDENTIALS/loginUsu.php?aviso=3'</script>";
}

$selectQ = "SELECT * FROM usuario WHERE idUsu = :id";


$selectP = $cx->prepare($selectQ);
$selectP->setFetchMode(PDO::FETCH_ASSOC);
$selectP->bindParam("id", $id);


$selectP->execute();


$dados = $selectP->fetch(PDO::FETCH_ASSOC);
?>
<!-- Mandar via URL o conteudo da página de perfil, tendo como base nessa página apenas a info do perfil, todo o resto dependerá do proprio conteudo via url, ex: conteudo=compras (mostra a lista de compras do usuário) -->
<main>
    <?php 
        require_once "BASE/TipoPagPerfil.php";
    ?>
</main>

    <?php
    // Consulta para selecionar os seguidores do usuário
    $selectQU = "SELECT * FROM usuario u INNER JOIN seguidores s ON u.idUsu = s.idSeguido WHERE u.idUsu = :id";
    $selectPU = $cx->prepare($selectQU);
    $selectPU->setFetchMode(PDO::FETCH_ASSOC);
    $selectPU->bindParam("id", $id);
    $selectPU->execute();
    $linhasPU = $selectPU->rowCount();

    // Consulta para selecionar os produtos criados pelo usuário
    $selectQ = "SELECT * FROM cria c WHERE c.idUsu = :id";
    $selectP = $cx->prepare($selectQ);
    $selectP->setFetchMode(PDO::FETCH_ASSOC);
    $selectP->bindParam("id", $id);
    $selectP->execute();
    $linhas = $selectP->rowCount();

    // Obtém os dados dos seguidores do usuário
    $dado = $selectPU->fetch();
    ?>

<?php require_once 'BASE/footer.php'; ?>