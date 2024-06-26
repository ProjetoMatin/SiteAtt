<style>
    nav {
        background: linear-gradient(to right, var(--verde00), var(--verde01));
        padding: 10px 15px;
        width: 100%;
    }

    a {
        margin: 0;
        text-decoration: none;
    }

    figure,
    h1 {
        margin: 0;
    }

    nav .logo h1 {
        font-size: 1.5em;
        color: var(--branco00);
    }

    .usuario,
    .logo {
        display: flex;
        align-items: center;
    }

    nav .usuario h1 {
        font-size: 1.2em;
        color: var(--branco00);
    }

    .logo figure img {
        width: 50px;
    }

    .usuario figure img {
        width: 30px;
        margin-right: 5px;
    }
</style>

<?php

if (isset($idUsu)) {
    $selectQ = "SELECT * FROM usuario WHERE idUsu = $idUsu";
    $selectP = $cx->prepare($selectQ);
    $selectP->execute();

    $dados = $selectP->fetch(PDO::FETCH_ASSOC);
}

?>

<nav class="d-flex justify-content-between align-items-center">
    <a href="../index.php">
        <div class="logo">
            <figure>
                <img src="../IMAGES/matin-logo-png.png" alt="Matin">
            </figure>
            <h1>Matin</h1>
        </div>
    </a>
    <div class="usuario">
        <figure>
            <img src="../IMAGES/guest-vetor-branco.png" alt="">
        </figure>
        <h1><?php echo $dados['nome_usu'] ?></h1>
    </div>
</nav>