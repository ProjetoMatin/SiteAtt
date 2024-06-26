<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link rel="stylesheet" href="../ASSETS/CREDENTIALS/login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../IMAGES/matin-logo-png.png" type="image/x-icon">
</head>

<body>
    <?php require_once '../BASE/config.php'; ?>

    <?php require_once '../BASE/alerts.php'; ?>
    <?php require_once '../BASE/headerCredentials.php' ?>

    <?php
    
    $email = $_REQUEST['txtInputEmail'] ?? '';
    $senha = $_REQUEST['txtInputPassword'] ?? '';

    if (isset($_REQUEST['entrarBtn'])) {
        if (!empty($email) || !empty($senha)) {
            try {
                session_start();
                $selectQ = "SELECT * FROM usuario WHERE email_usu = :email AND senha_usu = :senha";
                $selectP = $cx->prepare($selectQ);
                $selectP->bindParam(":email", $email);
                $selectP->bindParam(":senha", $senha);
                $selectP->execute();
                $qnt = $selectP->rowCount();

                if ($qnt == 0) {
                    header("Location: ?aviso=2");
                    die();
                } else {
                    $fetchU = $selectP->fetch(PDO::FETCH_ASSOC);
                    $idUsu = $fetchU['idUsu'];
                    // echo "-->" . $fetchU['ativo'];

                    switch ($fetchU['ativo']) {
                        case '1':
                            $_SESSION['idUsu'] = $idUsu;
                            header("Location: ../index.php");
                            break;
                        case '0':
                            header("Location: ../index.php?aviso=2");
                            break;
                    }

                    
                       

                    die();
                }
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo $erro;
            }
        }
    }
    ?>

    <main>
        <div class="div-esquerda">
            <h1>Acesse sua conta Mat-in</h1>

            <div class="maxwidth-encl">
                <div class="hr"></div>

                <p><a href="#" id="problemaTxt">Reportar um problema</a></p>

                <div class="opt primeiro">
                    <div class="img-texto">
                        <img src="../IMAGES/smartphone-call.png" id="telefone" alt="">
                        <p><a href="#">Roubo ou perda de celular</a></p>
                    </div>
                    <img src="../IMAGES/arrowRight.png" alt="">
                </div>

                <div class="hr hrSemMarginTop"></div>

                <div class="opt">
                    <div class="img-texto">
                        <img src="../IMAGES/usuario.png" id="telefone" alt="">
                        <p><a href="#">Roubo de conta</a></p>
                    </div>
                    <img src="../IMAGES/arrowRight.png" alt="">
                </div>

                <p class="precisoDeAjuda">Preciso de ajuda com outros temas</p>

                <div class="vendedor-encl">
                    <p class="vendedor">É um vendedor?</p>
                    <p><a href="#" class="vendedorLink">Clique aqui para acessar</a></p>
                </div>
            </div>
        </div>

        <div class="hr vertical"></div>

        <div class="div-direita">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">

                <h1 class="entrarConta">Entre na sua conta</h1>

                <div class="inputs-encl">
                    <div class="input">
                        <label for="txtInputEmail">E-mail:</label>
                        <input type="text" name="txtInputEmail" id="txtInputEmail" placeholder="ExemploDeEmail@gmail.com">
                    </div>

                    <div class="input segundo">
                        <label for="txtInputPassword">Senha:</label>
                        <input type="password" name="txtInputPassword" id="txtInputPassword" placeholder="SuaSenhaSegura123">
                    </div>

                    <input type="submit" value="Entrar" name="entrarBtn" class="entrarBtn" id="entrarBtn">

                </div>
                <p class="esqueciASenha">Esqueci a senha</p>

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
            </form>

            <p class="novoMatin">Novo no Mat-in? <mark><a href="../BASE/chPages.php?page=cadastro">Cadastre-se</a></mark></p>
        </div>
    </main>
</body>




</html>