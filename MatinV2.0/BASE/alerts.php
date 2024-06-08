<style>
    .aviso {
        display: block;
        width: 100%;
        padding: 10px;
        text-align: center;
    }

    .verde {
        background-color: var(--verde00);
        color: var(--branco00);
        font-weight: bolder;
    }

    .vermelho {
        background-color: var(--laranja00);
        color: var(--branco00);
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

    case 3:
        echo "<p class='aviso vermelho'>Faça login!</p>";
        break;

        //CADASTRO

    case 4:
        echo "<p class='aviso verde'>Cadastro realizado com sucesso</p>";
        break;

    case 5:
        echo "<p class='aviso vermelho'>Houve um erro ao cadastrar usuario!</p>";
        break;

    default:
        # code...
        break;
}
