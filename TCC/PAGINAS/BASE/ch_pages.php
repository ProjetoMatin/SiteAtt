<?php
require_once '../BANCO/abrirBanco.php';

//NOMES NÃO CONHECIDOS... PROCURE NO ME-LEIA.

if (isset($_REQUEST['page'])) {
    switch ($_REQUEST['page']) {
        case 'dash_ini':
            require_once '../DASHBOARD/dash_ini.php';
            break;

        case 'usu_list':
            require_once '../DASHBOARD/usu_list.php';
            break;
        case 'loc_list':
            require_once '../DASHBOARD/loc_list.php';
            break;

        case 'add_usu';
            require_once '../DASHBOARD/add_usu.php';
            break;
        case 'add_loc';
            require_once '../DASHBOARD/add_loc.php';
            break;
    }
}
?>
<?php require_once '../BANCO/fecharBanco.php'; ?>