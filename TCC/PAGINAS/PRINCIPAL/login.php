<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça o login</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/login.css">
    <link rel="stylesheet" href="../../STYLES/GERAL/basico.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <section class="imgLogin"></section>
    <main>
        <div class="divTop">
            <div class="logo">
                <figure>
                    <a href="index.php" class="linkLogo"><img src="../../IMG/logo.png" alt="Mat-in logo"></a>
                </figure>
                <a href="index.php" class="linkLogo">
                    <h1>Mat-in</h1>
                </a>
            </div>
            <div class="tituloLogin">
                <h1>Seja bem-vindo!</h1>
            </div>
        </div>
        <div class="formulario">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="formInputs">
                    <div class="campo">
                        <label for="email">E-mail</label>
                        <div>
                            <i class="material-icons">mail</i>
                            <input type="email" name="email" id="email" placeholder="Digite seu e-mail" class="formInput">
                        </div>
                    </div>
                    <div class="campo">
                        <label for="email">Senha</label>
                        <div>
                            <i class="material-icons">password</i>
                            <input type="email" name="email" id="email" placeholder="Digite seu e-mail" class="formInput">
                        </div>
                    </div>
                    <div class="naoCad">
                        <p>Não possui cadastro? <a href="cadastro.php">Cadastre-se</a></p>
                    </div>
                </div>
                <div class="inputEntrar">
                    <input type="submit" value="Entrar">
                </div>
            </form>
        </div>
    </main>
</body>
</html>