<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça o login</title>
    <link rel="stylesheet" href="../ASSETS/PAGINAS-CSS/login.css">
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    
    <section class="imgLogin"></section>

    <main>
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
            <form action="home.php" method="post">
                <div class="formInputs">
                    <label for="email">E-mail</label>
                    <div class="campo">
                        <i class="material-icons">mail</i>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail..." class="formInput" maxlength="100">
                    </div>
                    <label for="senha">Senha</label>
                    <div class="campo">
                        <i class="material-icons">vpn_key</i>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha..." class="formInput" autocomplete="on">
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