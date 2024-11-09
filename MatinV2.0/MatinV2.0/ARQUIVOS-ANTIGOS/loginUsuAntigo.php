<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça o login</title>
    <link rel="stylesheet" href="../ASSETS/CREDENTIALS/login.css">
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../IMAGES/matin-logo-png.png" type="image/x-icon">
</head>
<script type="module" src="../JS/FIREBASE/realTimeDatabase.js"></script>

<body>

    <?php require_once '../BASE/config.php'; ?>

    <?php require_once '../BASE/alerts.php'; ?>

    <main>
        <section class="imgLogin"></section>
        <div class="rightSide">
            <div class="divTop">
                <div class="logo">
                    <figure>
                        <a href="../index.php" class="linkLogo"><img src="../IMAGES/matin-logo-png.png" alt="Mat-in logo"></a>
                    </figure>
                    <a href="../index.php" class="linkLogo">
                        <h1>Mat-in</h1>
                    </a>
                </div>
                <div class="tituloLogin">
                    <h1>Seja bem-vindo!</h1>
                </div>
            </div>
            <div class="formulario">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                    <div class="formInputs">
                        <label for="name" style="margin-top: 30px !important;">Nome de usuario</label>
                        <div class="campo">
                            <img src="../IMAGES/userBranco.png" alt="" class="icon">
                            <input type="text" name="name" id="name" placeholder="Digite seu e-mail..." class="formInput" maxlength="100">
                        </div>
                        <label for="email">E-mail</label>
                        <div class="campo">
                            <img src="../IMAGES/email.png" alt="" class="icon">
                            <input type="email" name="email" id="email" placeholder="Digite seu e-mail..." class="formInput" maxlength="100">
                        </div>
                        <label for="senha">Senha</label>
                        <div class="campo">
                            <img src="../IMAGES/padlock.png" alt="" class="icon">
                            <input type="password" name="senha" id="senha" placeholder="Digite sua senha..." class="formInput" autocomplete="on">
                        </div>
                        <div class="naoCad">
                            <p>Não possui cadastro? <a href="cadastroUsu.php">Cadastre-se</a></p>
                        </div>
                    </div>
                    <div class="inputEntrar">
                        <input type="submit" value="Entrar" name="entrar" id="entrar">
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

<?php
$email = $_REQUEST['email'] ?? '';
$senha = $_REQUEST['senha'] ?? '';

if (isset($_REQUEST['entrar'])) {
    if (!empty($email) || !empty($senha)) {
        try {
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
                        session_start();
                        $_SESSION['idUsu'] = $idUsu;
                        break;
                    case '0':
                        break;
                }

                header("Location: ../index.php");
                die();
            }
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }
    }
}
?>

</html>