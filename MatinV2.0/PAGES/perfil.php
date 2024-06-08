<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/perfil.css">

<?php require_once 'BASE/config.php'; ?>
<?php require_once 'MODEL/autenticacao.php'; ?>

<?php


require_once 'BASE/config.php';

$id = $_SESSION['idUsu'] ?? '';

if(!isset($_SESSION['idUsu'])){
    echo "<script>location.href='CREDENTIALS/loginUsu.php?aviso=3'</script>";
}

?>

<main>
    <div class="div-principal">
        <div class="area-perfil">
            <div class="aba-perfil">
                <nav>
                    <img src="IMAGES/pessoa01.png" alt="">
                </nav>
                <div class="titulo-perfil">
                    <?php

                    $selectQ = "SELECT nome_usu FROM usuario WHERE idUsu = :id";

                    $selectP = $cx->prepare($selectQ);
                    $selectP->setFetchMode(PDO::FETCH_ASSOC);
                    $selectP->bindParam("id", $id);

                    $selectP->execute();

                    if ($selectP->rowCount() > 0) {
                        while ($dados = $selectP->fetch()) {
                            echo "<h2>{$dados['nome_usu']}</h2>";
                        }
                    } else {
                        // Trate o caso em que o usuário não foi encontrado
                        echo "oi";
                    }

                    ?>
                    <p>Último acesso há 14 minutos</p>
                </div>
            </div>
            <div class="div-button">
                <button class="btn">Editar Perfil</button>
                <a href="?config=sair" class="btn">Configurações (sair)</a>
            </div>
        </div>

        <div class="div-ul">

            <?php

                $selectQU = "SELECT * FROM usuario u INNER JOIN seguidores s ON u.idUsu = s.idSeguido WHERE u.idUsu = :id";
                $selectPU = $cx->prepare($selectQU);
                $selectPU->setFetchMode(PDO::FETCH_ASSOC);
                $selectPU->bindParam("id", $id);
                $selectPU->execute();
                $linhasPU = $selectPU->rowCount();



                $selectQ = "SELECT * FROM cria c WHERE c.idUsu = :id";
                $selectP = $cx->prepare($selectQ);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->bindParam("id", $id);
                $selectP->execute();
                $linhas = $selectP->rowCount();

                // echo "<script>alert($linhasPU + ' ID:' + $id);</script>";

                $dado = $selectPU->fetch();
                

            ?>

            <ul>
                <li><img src="IMAGES/bebida.png" alt="" class="foto1">Produtos: <mark><?php echo $linhas?></mark></li>
                <li><img src="IMAGES/seguidor.png" alt="" class="foto1">Seguindo: <mark><?php echo $linhasPU?></mark></li>
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