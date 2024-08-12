<?php

$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'home';

// PAGINA DE ADM
if ($idUsu == '1') {

    switch ($page) {

        case 'relatorio':
            // header("Location: ../PAGES/RELATORIO/relatorio.php");
            echo "<script>location.href='../PAGES/RELATORIO/relatorio.php'</script>";

        case 'dash_ini':
            require_once '../PAGES/DASHBOARD/dash_ini.php';
            break;

        case 'usu_list':
            require_once '../PAGES/DASHBOARD/usu_list.php';
            break;

        case 'prod_list':
            require_once '../PAGES/DASHBOARD/prod_list.php';
            break;

        case 'compra_list':
            require_once '../PAGES/DASHBOARD/compra_list.php';
            break;

        case 'loc_list':
            require_once '../PAGES/DASHBOARD/loc_list.php';
            break;

        case 'cat_list':
            require_once '../PAGES/DASHBOARD/cat_list.php';
            break;

        case 'add_usu';
            require_once '../PAGES/DASHBOARD/add_usu.php';
            break;

        case 'add_loc';
            require_once '../PAGES/DASHBOARD/add_loc.php';
            break;

        case 'add_prod':
            require_once '../PAGES/DASHBOARD/add_prod.php';
            break;

        case 'add_cat':
            require_once '../PAGES/DASHBOARD/add_cat.php';
            break;

        default:
            require_once '../PAGES/DASHBOARD/dash_ini.php';
            break;
    }
} else if (!isset($idUsu)) {
    echo "<script>location.href='../CREDENTIALS/loginUsu.php?aviso=3'</script>";
} else if ($idUsu != '1') {
    switch ($page) {
        case 'dash_ini':
            require_once '../PAGES/DASHBOARD/dash_ini.php';
            break;

        case 'prod_list':
            require_once '../PAGES/DASHBOARD/prod_list.php';
            break;

        case 'perg_list':
            require_once '../PAGES/DASHBOARD/perg_list.php';
            break;

        case 'add_prod':
            require_once '../PAGES/DASHBOARD/add_prod.php';
            break;

        default:
            require_once '../PAGES/DASHBOARD/dash_ini.php';
            break;
    }
}
