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

    case 'cadastro':
        header("Location: ../CREDENTIALS/cadastroUsu.php");
        break;

    case 'login':
        header("Location: ../CREDENTIALS/loginUsu.php");
        break;

    default:
        require_once 'PAGES/home.php';
        break;
}
