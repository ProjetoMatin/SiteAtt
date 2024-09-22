<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/perfil.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/SAC.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/compras.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/politicas.css">

<?php require_once 'BASE/config.php'; ?>
<?php require_once 'MODEL/autenticacao.php'; ?>

<?php

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
    <?php
        echo "<div class='info-perfil'>
        <div class='flex-mais-flex'>
            <img src='IMAGES-BD/USUARIOS/" . $dados['fotos_usu'] . "?>' class='img-perfil' alt='Foto de perfil'><div class='flex-perfil'>";
                    if ($selectP->rowCount() > 0) {
                        echo '<h2>' . $dados['nome_usu'] . '</h2>';
                    } else {
            
                        echo 'oi';
                    }
                    echo "<a href='?page=editPerfil' class='btn_acoes_perfil link_perfil'><img src='IMAGES/editar.png'></a></div>
        </div>
            <div class='visao-geral'>
                <h3><img src='IMAGES/quadrado_verde.png'> Visão Geral</h3>
                <div class='itens'>
                    <hr>    
                    <ul>
                        <li><a href='?page=minha_conta'>Minha Conta</a></li>
                        <li><a href='?page=compras'>Minhas Compras</a></li>
                        <li><a href='dashboard.php'>Dashboard</a></li>
                        <li><a href='?page=sac'>Serviço ao Cliente</a></li>
                        <li><a href='?page=politicas'>Políticas</a></li> 
                    </ul>
                    <hr>
                </div>
            </div>
            <a href='?config=sair' class='btn_acoes_perfil link_perfil'>Sair</a>
        </div>

    <div class='flex-divs'>
    <div class='info1'>
    <h2>Olá, <strong>" . $dados['nome_usu'] . "!</strong></h2>
    <div class='botoes'>
        <div class='botoes-gerais'>
            <a href='?page=historico' class='link_perfil'><img src='IMAGES/historico.png' alt='Histórico'></a>
            Histórico
        </div>
        <div class='botoes-gerais'>
            <a href='?page=cupons' class='link_perfil'><img src='IMAGES/cupons.png' alt='Cupons'></a>
            Cupons
        </div>
        <div class='botoes-gerais'>
            <a href='?page=seguindo' class='link_perfil'><img src='IMAGES/seguindo.png' alt='Seguindo'></a>
            Seguindo
        </div>
        <div class='botoes-gerais'>
            <a href='?page=notificacoes' class='link_perfil'><img src='IMAGES/notificacoes.png' alt='Notificações'></a>
            Notificações
        </div>
        <div class='botoes-gerais'>
            <a href='?page=mensagens' class='link_perfil'><img src='IMAGES/mensagens.png' alt='Mensagens'></a>
            Mensagens
        </div>
    </div>
    </div>";
    echo "<div class='pedidos'><div class='ver-tudo'>";
                    
    switch ($dados['nvl_usu']) {
        case 'A':
            echo '<h2>Pedidos</h2>';
            break;
        default:
            echo '<h2>Produtos</h2>';
            break;
    }


    echo "  <a href='#'>Ver tudo ></a></div>
    <div class='flex-pagamentos'>
        <div class='pag-situacao'>
            <figure class='icone-pag'>
                <img src='IMAGES/pedidos_pagamento.png' alt='Pedidos Aguardando Pagamento'>
            </figure>
            <h2>Pedidos Aguardando Pagamento</h2>
        </div>
        <div class='pag-situacao'>
            <figure class='icone-pag'>
                <img src='IMAGES/aguardando_envio.png' alt=''>
            </figure>
            <h2>Aguardando Envio</h2>
        </div>
        <div class='pag-situacao'>
            <figure class='icone-pag'>
                <img src='IMAGES/enviado.png' alt=''>
            </figure>
            <h2>Enviado</h2>
        </div>
        <div class='pag-situacao'>
            <figure class='icone-pag'>
                <img src='IMAGES/aguardando_avaliacao.png' alt=''>
            </figure>
            <h2>Aguardando Avaliação</h2>
        </div>
    </div>
    <div class='reembolsos'><p style='display: flex; align-items: center; gap:5px;'><img src='IMAGES/moeda.png'><a href='#'>     Reembolsos e Devoluções</a></p>
    <p><a href='#'>></a></a></p></div>    
    </div>
    </div>";        
    ?>
</main>

<?php require_once 'BASE/footer.php'; ?>