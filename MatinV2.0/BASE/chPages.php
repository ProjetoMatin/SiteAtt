<?php
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'home';

switch ($page) {
    case 'home':
        require_once 'BASE/home.php';
        break;
    
    case 'perfil':
        require_once 'PAGES/perfil.php';
        break;
        
    default:
        require_once 'BASE/home.php';
        break;
}
