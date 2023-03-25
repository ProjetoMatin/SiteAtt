<?php
    include_once('config.php');
    session_start();
    try{
        if(isset($_REQUEST['confirm'])){
            $nomeUsuario = $_REQUEST['Username'];
            $senhaUsuario= $_REQUEST['Password'];
            
            $sql = $conexao->query("SELECT * FROM caduser WHERE nome = '$nomeUsuario' and senha = '$senhaUsuario'");
            $qntCnts = $sql->rowCount();

            if($qntCnts == 1){
                $_SESSION['usuario'] = $_REQUEST['Username'];
                header('Location: sitenormal.php');
            }
        }
    } catch(PDOException $e){
        echo $e;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <figure>
            <img src="../img/Logo.png" alt="">
        </figure>
    </header>

    <main>
        <h1>LOGIN</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <p>
                <label for="Username">Nome De Usuario:</label>   
                <input type="text" name="Username" id="UserInput" required>
            </p>

            <p>
                <label for="Password">Senha:</label>   
                <input type="password" name="Password" id="PassInput" required>
            </p>

            <p>
                <input type="submit" value="Entrar" name="confirm">
            </p>
            
        </form>
    </main>
</body>
</html>