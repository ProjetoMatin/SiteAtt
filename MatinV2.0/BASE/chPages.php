<?php
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'home';

switch ($page) {
    case 'home':
        require_once 'PAGES/home.php';
        break;

    case 'perfil':
        require_once 'PAGES/perfil.php';
        break;

    case 'carrinho':
        require_once 'PAGES/carrinho.php';
        break;

    case 'produto':
        require_once 'PAGES/produto.php';
        break;

    case 'perfilVendedor':
        require_once 'PAGES/perfilVendedor.php';
        break;

    case 'cadastro':
        header("Location: ../CREDENTIALS/cadastroUsu.php");
        break;

    case 'login':
        header("Location: ../CREDENTIALS/loginUsu.php");
        break;

    case 'pagar':
        echo "<script>location.href='PAGES/pagar.php'</script>";
        break;

    case 'selos':
        require_once "PAGES/PERFIL/selos.php";
        break;

    case 'pesquisa':
        require_once "PAGES/pesquisa.php";
        break;


    default:
        require_once 'PAGES/home.php';
        break;
}
