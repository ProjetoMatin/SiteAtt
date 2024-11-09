<?php

require_once '../BASE/config.php';

function criarBairro($cx, $endereco, $cepFormatado)
{

    if ($endereco->erro == true) {
        try {
            $insertQ = "INSERT INTO local (CEP, Logradouro, Bairro, Cidade, UF) VALUES (:cep, :logradouro, :bairro, :cidade, :uf)";
            $insertP = $cx->prepare($insertQ);
            $insertP->bindParam(":cep", $cepFormatado);
            $insertP->bindParam(":logradouro", $endereco->logradouro);
            $insertP->bindParam(":bairro", $endereco->bairro);
            $insertP->bindParam(":cidade", $endereco->localidade);
            $insertP->bindParam(":uf", $endereco->uf);
            $insertP->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();

            echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";

            return false;
        }
    } else {

        echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";
        return false;
    }
}

function criarusu($cx, $nome, $email, $senha, $telefone, $NR)
{
    try {
        $selectQ = "SELECT * FROM usuario WHERE NRCIR = :cpf";
        $selectP = $cx->prepare($selectQ);
        $selectP->bindParam(":cpf", $NR);
        $selectP->execute();
        $count = $selectP->rowCount();

        if ($count == 0) {
            date_default_timezone_set('America/Sao_Paulo');
            $currentDate = date('Y-m-d H:i:s');

            $insertQ = "INSERT INTO usuario(nome_usu, ativo, data_criacao, email_usu, senha_usu, tel_usu, fotos_usu, premium, NR, comp, TCIR, NRCIR, nvl_usu, Local_CEP) 
                        VALUES (:nome, '1', :dataCriacao, :email, :senha, :tel, 'sem_foto.png', '0', 'N/S', 'N/S', 'CPF', :cpf, 'C', NULL)";
            $insertP = $cx->prepare($insertQ);
            $insertP->bindParam(':nome', $nome);
            $insertP->bindParam(':dataCriacao', $currentDate);
            $insertP->bindParam(':email', $email);
            $insertP->bindParam(':cpf', $NR);
            $insertP->bindParam(':senha', $senha);
            $insertP->bindParam(':tel', $telefone);

            $insertP->execute();

            echo "<script>window.location.href='loginUsu.php'</script>";
        } else {
            echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$nome = $_REQUEST['nomeUsuarioInput'] ?? '';
$sobrenome = $_REQUEST['sobrenomeInput'] ?? '';

$nome = $nome . " " . $sobrenome;

$email = $_REQUEST['Email'] ?? '';

$senha = $_REQUEST['senhaUsuarioInput'] ?? '';
$senha2 = $_REQUEST['senhaUsuarioInput2'] ?? '';

$cpf = $_REQUEST['CPF'] ?? '';
$telefone = $_REQUEST['telefone'] ?? '';

if (!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone) && !empty($cpf)) {

    if ($senha == $senha2) {
        // $endereco = get_endereco($cep);

        // if ($endereco->erro == "true") {
        //     echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";
        //     die();
        // }

        // $cepFormatado = str_replace("-", "", $cep);
        
        $NRCIRFormatado1 = str_replace(".", "", $cpf);
        $NRCIRFormatado2 = str_replace("-", "", $NRCIRFormatado1);

        $telFormatado1 = str_replace("(", "", $telefone);
        $telFormatado2 = str_replace(")", "", $telFormatado1);

        echo "<script>location.href='cadastroEndereco.php?nome=$nome&email=$email&senha=$senha&cpf=$NRCIRFormatado2&telefone=$telFormatado2'</script>";


        // criarusu($cx, $nome, $email, $senha, $telFormatado2, $NRCIRFormatado2);
    } else {
        echo "<script>window.location.href='cadastroUsuNovo.php?senhasIguais=false'</script>";
        echo "<script>alert('oiii')</script>";
        // header("Location: ?senhaIgual=false");
    }
    // if (!empty($endereco)) {
    //     $selectQ = "SELECT * from local WHERE CEP = :cep";
    //     $selectP = $cx->prepare($selectQ);
    //     $selectP->bindParam(":cep", $cepFormatado);
    //     $selectP->execute();
    //     $count = $selectP->rowCount();

    //     if ($count >= 1) {
    //         criarusu($cx, $nome, $email, $senha, $cepFormatado, $telFormatado2, $NRCIRFormatado2, $comp);
    //     } else {
    //         $criarBairroBoolean = criarBairro($cx, $endereco, $cepFormatado);
    //         if ($criarBairroBoolean == true) {
    //             criarusu($cx, $nome, $email, $senha, $cepFormatado, $telFormatado2, $NRCIRFormatado2, $comp);
    //         } else {
    //             echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";
    //         }
    //     }
    // }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link rel="stylesheet" href="../ASSETS/CREDENTIALS/cadastro.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../IMAGES/matin-logo-png.png" type="image/x-icon">
</head>

<body>
    <?php require_once '../BASE/headerCredentials.php' ?>

    <main>
        <h1 id="titulo">Crie sua conta</h1>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <div class="inputs-encl row1">
                <div class="input">
                    <label for="nomeUsuarioInput">Nome:</label>
                    <input type="text" name="nomeUsuarioInput" id="nomeUsuarioInput" required placeholder="Nome">
                </div>

                <div class="input">
                    <label for="sobrenomeInput">Sobrenome:</label>
                    <input type="text" name="sobrenomeInput" id="sobrenomeInput" required placeholder="Sobrenome">
                </div>

                <div class="input">
                    <label for="CPF">CPF:</label>
                    <input type="text" name="CPF" id="CPF" placeholder="XXX.XXX.XXX-XX" required>
                </div>

                <div class="input">
                    <label for="Email">Email:</label>
                    <input type="email" name="Email" id="Email" placeholder="SeuEmailLegal@gmail.com" required>
                </div>
            </div>

            <div class="inputs-encl row2">
                <div class="input">
                    <label for="senhaUsuarioInput">Senha:</label>
                    <input type="password" name="senhaUsuarioInput" id="senhaUsuarioInput" placeholder="SuaSenhaSegura123" required>
                </div>

                <div class="input">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" placeholder="(XX) XXXXX-XXXX" required>
                </div>
            </div>

            <div class="inputs-encl row3">
                <div class="input">
                    <input type="password" name="senhaUsuarioInput2" id="senhaUsuarioInput2" placeholder="Repita sua senha" required>

                    <?php 

                    $senhasIguais = $_REQUEST['senhasIguais'] ?? "";
                    
                    if($senhasIguais == "false"){
                        echo "<div class='avisoErro' style='visibility: visible;'>";
                        echo "<img src='../IMAGES/warning.png' alt=''>";
                        echo "<p>As senhas digitadas não coincidem</p>";
                        echo "</div>";
                    }
                    
                    ?>                   
                </div>
            </div>

            <div class="inputs-encl row4">
                <div class="div-esquerda">
                    <div class="topo">
                        <img src="../IMAGES/escudo.png" alt="">
                        <p>Requisitos para senha:</p>
                    </div>
                    <ul>
                        <li>No minimo 6 caracteres.</li>
                        <li>Pelo menos 1 letra maiúscula.</li>
                        <li>Deve conter pelo menos 1 letra e 1 número.</li>
                    </ul>
                </div>
                <div class="div-direita">
                    <p>Ao criar uma conta, você concorda com as <mark>Condições de Uso</mark> do Mat-In. Por favor verifique a <mark>Notificação de Privacidade</mark>, <mark>Notificação de Cookies </mark>e a <mark>Notificação de Anúncios Baseados em Interesse.</mark></p>
                </div>
            </div>

            <input type="submit" value="Continuar" name="entrarBtn" class="entrarBtn" id="entrarBtn">

            <div class="separador-encl">

                <div class="div-separador">
                    <div class="hr metade"></div>
                    <p>Ou</p>
                    <div class="hr metade"></div>
                </div>

                <div class="redes-sociais-encl">
                    <div class="rede-social">
                        <img src="../IMAGES/facebook-azul.png" alt="">
                        <p><a href="">Facebook</a></p>
                    </div>
                    <div class="rede-social">
                        <img src="../IMAGES/gmail.png" alt="">
                        <p><a href="">Facebook</a></p>
                    </div>
                    <div class="rede-social">
                        <img src="../IMAGES/apple-logo.png" alt="">
                        <p><a href="">Facebook</a></p>
                    </div>
                </div>
            </div>
        </form>

        <p class="possuiConta">Já possui conta Mat-in? <mark><a href="../BASE/chPages.php?page=login">Faça login</ </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script>
    $(document).ready(function() {
        $('#CPF').mask('000.000.000-00');
        $('#telefone').mask('(00) 00000-0000');
        // $('#cepinp').mask('00000-000');
    })
</script>

</html>