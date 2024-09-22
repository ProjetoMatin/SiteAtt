<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/perfil.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/SAC.css">

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
                <a  class='visao-geral-link' href='?page=perfil'>Visão Geral</a>
                <div class='itens'>
                    <hr>    
                    <ul>
                        <li><a href='?page=minha_conta'>Minha Conta</a></li>
                        <li><a href='?page=compras'>Minhas Compras</a></li>
                        <li><a href='dashboard.php'>Dashboard</a></li>
                        <li><h3><a href=?page=sac'><img src='IMAGES/quadrado_verde.png'> Serviço ao Cliente</h3></a></li>
                        <li><a href='?page=politicas.php'>Políticas</a></li> 
                    </ul>
                    <hr>
                </div>
            </div>
            <a href='?config=sair' class='btn_acoes_perfil link_perfil'>Sair</a>
        </div>";

   ?>
</main>

<?php require_once 'BASE/footer.php'; ?>