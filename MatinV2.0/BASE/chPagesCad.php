<?php
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'verif';

switch ($page) {
    case 'verif':

        break;

    case 'cadUserEnterpriseAccount':
        require_once '../CREDENTIALS/cadUserEnterprise.php';
        break;

    case 'cadUserCommonAccount':
        require_once '../CREDENTIALS/cadUserCommonAccount.php';
        break;

    default:
        # code...
        break;
}
