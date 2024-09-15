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
    <div class="info-perfil">
        <img src="IMAGES-BD/USUARIOS/<?php echo $dados['fotos_usu']; ?>" alt="Foto de perfil">
        <?php 
            if ($selectP->rowCount() > 0) {
                echo "<h2>{$dados['nome_usu']}</h2>";
            } else {

                echo "oi";
            }
        ?>
        <a href="?page=editPerfil" class="btn_acoes_perfil link">Editar Perfil</a>
        <div class="visao-geral">
            <h3>Visão Geral</h3>
            <div></div>
        </div>
        <a href="?config=sair" class="btn_acoes_perfil link">Sair</a>
    </div>

    <div class="flex-divs">
        <div class="info1">
            <h2>Olá, <strong><?=$dados['nome_usu']?>!</strong></h2>
            <div class="botoes">
                <figure>
                    <a href="?page=historico" class="link"><img src="" alt="">Histórico</a>
                    <a href="?page=cupons" class="link"><img src="" alt="">Cupons</a>
                    <a href="?page=seguindo" class="link"><img src="" alt="">Seguindo</a>
                    <a href="?page=notificacoes" class="link"><img src="" alt="">Notificações</a>
                </figure>
            </div>
        </div>
        <div class="acordeao">
            <hr>
            <div class="accordion accordion-flush" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <?php
                    switch ($dados['nvl_usu']) {
                        case 'A':
                            echo "Pedidos";
                            break;
                        default:
                            echo "Produtos";
                            break;
                    }
                    ?>
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="flex-pagamentos">
                                <div class="pag-situacao">
                                    <figure class="icone-pag">
                                        <img src="" alt="">
                                    </figure>
                                    <h2>Pedidos Aguardando Pagamento</h2>
                                </div>
                                <div class="pag-situacao">
                                    <figure class="icone-pag">
                                        <img src="" alt="">
                                    </figure>
                                    <h2>Aguardando Envio</h2>
                                </div>
                                <div class="pag-situacao">
                                    <figure class="icone-pag">
                                        <img src="" alt="">
                                    </figure>
                                    <h2>Enviado</h2>
                                </div>
                                <div class="pag-situacao">
                                    <figure class="icone-pag">
                                        <img src="" alt="">
                                    </figure>
                                    <h2>Aguardando Avaliação</h2>
                                </div>
                            </div>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo voluptatem ipsam pariatur repellendus odit velit atque exercitationem sunt ut, accusantium dolore itaque, porro hic qui officia esse adipisci eveniet quia?
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apelações
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illo, alias neque voluptatem dolor minima dolores, deserunt velit ea nihil ex quas quod iure nam suscipit accusantium debitis fugiat libero?
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Reembolsos e Devoluções
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim perspiciatis placeat similique eius? Facilis ea eius iure, in a eos illo illum sunt quisquam eaque. Officia sit eaque similique ullam.
                        </div>
                    </div>
            </div>
        </div>
</main>

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

<?php require_once 'BASE/footer.php'; ?>