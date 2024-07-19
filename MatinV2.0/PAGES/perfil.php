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

<main>
    <div class="div-principal">
        <div class="area-perfil">
            <div class="aba-perfil">
                <nav>

                    <img src="IMAGES-BD/USUARIOS/<?php echo $dados['fotos_usu']; ?>" alt="">
                    <?php

                    if ($selectP->rowCount() > 0) {
                        echo "<h2>{$dados['nome_usu']}</h2>";
                    } else {

                        echo "oi";
                    }
                    ?>
                </nav>
                <div class="titulo-perfil">
                </div>
                <div class="acesso-dashboard">

                    <a href="PAGES/dashboard.php"><img src="IMAGES/dashboardIcone.png" alt=""></a>
                </div>
            </div>
            <div class="div-button">

                <a href="?page=editPerfil" class="btn">Editar Perfil</a>
                <a href="?config=sair" class="btn">Sair</a>
            </div>
        </div>

        <div class="div-ul">
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


            <ul>
                <li><img src="IMAGES/bebida.png" alt="" class="foto1">Produtos: <mark><?php echo $linhas ?></mark></li>
                <li><img src="IMAGES/seguidor.png" alt="" class="foto1">Seguindo: <mark><?php echo $linhasPU ?></mark></li>
                <li><img src="IMAGES/bater-papo.png" alt="" class="foto1">Taxa de Resposta Do Chat: <mark>87% (Poucas Horas)</mark></li>
            </ul>
            <ul>
                <li><img src="IMAGES/seguidores.png" alt="" class="foto1">Seguidores: <mark>12,5 Mil</mark></li>
                <li><img src="IMAGES/estrela.png" alt="" class="foto1">Avaliação Geral Do Vendedor: <mark>4.9 (980 Avaliação)</mark></li>
                <li><img src="IMAGES/perfil-verificado.png" alt="" class="foto2">Vendedor Mat-In Desde: <mark>6 Meses Atrás</mark></li>
            </ul>
        </div>
    </div>
</main>