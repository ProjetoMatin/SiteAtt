<?php 

$aviso = $_REQUEST['aviso'] ?? '';

switch ($aviso) {
    //LOGIN
    case 1:
        echo "<p class='aviso verde'>Login feito com sucesso!</p>";
        break;
    case 2:
        echo "<p class='aviso vermelho'>Email e/ou senha inválidos</p>";
    
    default:
        # code...
        break;
}

?>