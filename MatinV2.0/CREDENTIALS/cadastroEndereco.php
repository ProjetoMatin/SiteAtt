<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link rel="stylesheet" href="../ASSETS/CREDENTIALS/cadastroEndereco.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../IMAGES/matin-logo-png.png" type="image/x-icon">
    <title>Mat-in</title>
</head>

<body>
    <?php

    $nome = $_REQUEST['nome'] ?? "";
    $senha = $_REQUEST['senha'] ?? "";
    $email = $_REQUEST['email'] ?? "";
    $cpf = $_REQUEST['cpf'] ?? "";
    $telefone = $_REQUEST['telefone'] ?? "";
    
    echo $nome . $senha . $email . $cpf . $telefone;

    // echo "<script>
    //     localStorage.setItem('nome', '" . $nome . "');
    //     localStorage.setItem('senha', '" . $senha . "');
    //     localStorage.setItem('email', '" . $email . "');
    //     localStorage.setItem('cpf', '" . $cpf . "');
    //     localStorage.setItem('telefone', '" . $telefone . "');
    // </script>";

    // echo $nome . " " . $senha .  " " . $email . " " .  $cpf . " " . $telefone;

    ?>

    <?php require_once '../BASE/headerCredentials.php'; ?>

    <main>
        <?php echo "<h1 class='titulo'>Olá <mark>$nome!</mark></h1>"; ?>
        <h1 class="titulo" style="margin-top: 15px !important;">Adicione seu endereço</h1>

        <form action="cadastrarUsuario.php" method="get">
            <div class="inputs-encl">

                <input type="hidden" name="nome" value="<?php echo $nome ?>">
                <input type="hidden" name="senha" value="<?php echo $senha ?>">
                <input type="hidden" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="cpf"value="<?php echo $cpf ?>">
                <input type="hidden" name="telefone" value="<?php echo $telefone ?>">

                <div class="input primeiroInputCep">
                    <div class="encl-geral">
                        <label for="CEP">CEP</label>
                        <div class="input-cep-encl">
                            <input type="text" name="CEP" id="CEP" required>
                            <?php echo "<a href='../CREDENTIALS/procurarCEP.php?pg=1&nome=$nome&senha=$senha&email=$email&cpf=$cpf&telefone=$telefone' id='redirectCEP'>Não sei meu CEP</a>" ?>
                        </div>
                    </div>
                </div>

                <div class="row2">
                    <div class="input">
                        <label for="Estado" id="EstadoLabel">Estado</label>
                        <input type="text" name="Estado" id="Estado" disabled>
                    </div>
                    <div class="input">
                        <label for="Cidade" id="CidadeLabel">Cidade</label>
                        <input type="text" name="Cidade" id="Cidade" disabled>
                    </div>
                </div>

                <div class="input">
                    <label for="Bairro" id="BairroLabel">Bairro</label>
                    <input type="text" name="Bairro" id="Bairro" disabled>
                </div>

                <div class="row2">
                    <div class="input">
                        <label for="RuaAvenida" id="RuaAvenidaLabel">Rua/Avenida</label>
                        <input type="text" name="RuaAvenida" id="RuaAvenida" disabled>
                    </div>
                    <div class="input">
                        <label for="Numero">Número</label>
                        <div class="input-SN-encl">
                            <input type="text" name="Numero" id="Numero">
                            <div class="input-label">
                                <label for="SN">Sem Número</label>
                                <input type="checkbox" name="SN" id="SN">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input">
                    <label for="Complemento">Complemento (Opcional)</label>
                    <input type="text" name="Complemento" id="Complemento">
                </div>

                <div class="input">
                    <p>Este é seu trabalho ou sua casa?</p>

                    <div class="inputs-radio">
                        <div class="radio">
                            <input type="radio" name="escolha" value="trabalho" id="trabalho" checked>

                            <label for="trabalho"><img src="../IMAGES/work.png" alt="Maleta"> Trabalho</label>
                        </div>

                        <div class="radio">
                            <input type="radio" name="escolha" id="casa" value="casa">

                            <label for="casa"><img src="../IMAGES/homeIcone.png" alt="Maleta"> Residencial</label>
                        </div>
                    </div>
                </div>

                <div class="input">
                    <label for="Telefone">Telefone</label>
                    <input type="text" name="Telefone" id="Telefone" value="<?php echo $telefone ?>" disabled>
                </div>

                <div class="input">
                    <label for="InfoAdd">Informações adicionais sobre o endereço</label>
                    <input type="text" name="InfoAdd" id="InfoAdd" placeholder="Descrição da fachada, pontos de referência, informações de segurança etc.">
                </div>

                <input type="submit" value="Salvar">

            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.card').on('click', function() {
                $(this).toggleClass('clicked');
                $('.addEnderecoP').toggleClass('clicked');
            });
        });

        $(document).ready(function() {
            $('#Telefone').mask('(00) 00000-0000');
            $('#CEP').mask('00000-000');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('SN');
            const numeroInput = document.getElementById('Numero');

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    numeroInput.disabled = true;
                    numeroInput.value = '';
                } else {
                    numeroInput.disabled = false;
                }
            });
        });
    </script>

</body>

</html>
