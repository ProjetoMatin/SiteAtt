<style>
    .aviso {
        display: block;
        width: 90%;
        padding: 5px;
    }

    .verde {
        background-color: var(--verdeescuroTabela3);
        color: var(--branco);
        font-weight: bolder;
    }

    .vermelho {
        background-color: var(--vermelho);
        color: var(--branco);
        font-weight: bolder;
    }
</style>

<?php

$aviso = $_REQUEST['aviso'] ?? '';

switch ($aviso) {

        //LOGIN

    case 1:
        echo "<p class='aviso verde'>Login feito com sucesso!</p>";
        break;
    case 2:
        echo "<p class='aviso vermelho'>Email e/ou senha inválidos</p>";
        break;

        //CADASTRO

    case 3:
        echo "<p class='aviso vermelho'>Não foi possível realizar o cadastro, tente novamente mais tarde!</p>";
        break;
    case 4:
        echo "<p class='aviso verde'>Cadastro realizado com sucesso!</p>";
        break;

        //EXCLUSÃO

    case 5:
        echo "<p class='aviso vermelho'>Não foi possível realizar a exclusão, tente novamente mais tarde!</p>";
        break;
        
    case 6:
        // EXCLUSÃO - LOCALIZAÇÃO
        echo "<p class='aviso vermelho'>Ainda há usuários vinculados a esse endereço!</p>";
        break;

    case 7:
        echo "<p class='aviso verde'>Exclusão realizada com sucesso!</p>";
        break;

    default:
        # code...
        break;
}

?>