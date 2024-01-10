<style>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.30vh 1.69vh;
        background-color: var(--branco00);
    }

    header .logo a,
    .usuario {
        display: flex;
        align-items: center;
    }

    header .logo img {
        width: 40px;
        margin-right: 10px !important;
    }

    header .logo a {
        text-decoration: none;
        color: var(--preto00);
    }

    header .logo a h1{
        font-size: 1.8em;
    }

    header .usuario img {
        margin-right: 10px !important;
    }

    header .usuario .dropdown button {
        background-color: var(--branco00);
        border: 0;
        color: var(--preto00);
        font-weight: bold;
    }

    header .usuario .dropdown button:hover,
    header .usuario .dropdown button:focus,
    header .usuario .dropdown button:active {
        background-color: var(--branco00) !important;
        color: var(--preto00) !important;
    }
</style>

<header>
    <div class="logo">
        <a href="../index.php">
            <img src="../IMAGES/matin-logo-png.png" alt="">
            <h1>Mat-in</h1>
        </a>
    </div>

    <div class="usuario">
        <img src="../IMAGES/login-icon.png" alt="">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Nome do Usuário
            </button>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Meu Perfil</a></li>
                <li><a class="dropdown-item" href="#">Carrinho</a></li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>
    </div>
</header>