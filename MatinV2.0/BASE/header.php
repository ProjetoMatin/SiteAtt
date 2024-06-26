<style>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
        background-color: var(--branco00);
    }

    header .logo {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    header .logo img {
        width: 40px;
        margin-right: 10px !important;
    }

    header .search-inp {
        width: 600px;
    }

    header .search-inp input {
        border-right: none !important;
        /* border: none !important; */
    }

    header .search-inp input:focus {
        outline: none !important;
    }

    header .search-inp #inputGroup-sizing-default {
        background-color: transparent;
        border-left: none !important;
    }

    header .search-inp .input-group-text img {
        width: 20px;
    }

    header .info ul {
        display: flex;
        align-items: center;
        list-style: none;
    }

    header .info ul li {
        padding: 0 10px;
    }

    header .info ul li img {
        max-width: 30px;
    }

    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 32px;
        background-color: var(--branco00);
        /* background-color: orange; */
    }

    nav .ul_menus,
    nav .info_add {
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0 !important;
    }

    nav .ul_menus li,
    nav .info_add li {
        padding: 0 15px;

    }

    .dropdown button {
        background-color: var(--branco00);
        border: 0;
        color: var(--preto00);
        font-weight: bold;
    }

    .dropdown button:hover,
    .dropdown button:focus,
    .dropdown button:active {
        background-color: var(--branco00) !important;
        color: var(--preto00) !important;
    }

    nav .ul_menus li a,
    nav .info_add li a {
        color: var(--preto00);
        font-weight: bold;
        text-decoration: none;
    }

    nav .info_add,
    nav .info_add .redes_soc a {
        display: flex;
        align-items: center;
    }

    nav .info_add .redes_soc a div {
        margin-left: 15px;
    }

    nav .appAcesso {
        transition: color 0.1s ease-in-out;
    }

    nav .appAcesso:hover {
        color: var(--verde00);
    }

    nav .navBarItens {
        transition: color 0.1s ease-in-out !important;
    }

    nav .navBarItens:hover {
        color: var(--laranja00) !important;
    }

    .input-group {
        margin-bottom: 0px !important;
    }
</style>    
<header>

    <div class="logo">
        <img src="IMAGES/matin-logo-png.png" alt="logo Mat-in">

        <h1>Mat-in</h1>
    </div>

    <div class="search-inp">
        <div class="input-group mb-3">
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Busque aqui seu produto">

            <span class="input-group-text" id="inputGroup-sizing-default"><img src="IMAGES/search.png" alt=""></span>
        </div>
    </div>

    <div class="info">
        <ul>
            <!-- <li><a href="index.php?page=perfil"><img src="IMAGES/user.png" alt=""></a></li> -->
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <li><button name="perfilPage" style="background-color: transparent;"><img src="IMAGES/user.png" alt=""></button></li>
            </form>
            <li><img src="IMAGES/heart.png" alt=""></li>
            <li><a href="index.php?page=carrinho"><img src="IMAGES/shoppingcart.png" alt=""></a></li>
            <li><a href="PAGES/ouvidoria.php"><img src="IMAGES/headphones.png" alt=""></a></li>
        </ul>
    </div>
</header>

<nav class="navbar">
    <ul class="ul_menus">
        <li>
            <div class="dropdown">
                <button class="navBarItens btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorias
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Template</a></li>
                    <li><a class="dropdown-item" href="#">Template</a></li>
                    <li><a class="dropdown-item" href="#">Template</a></li>
                </ul>
            </div>
        </li>

        <li><a href="#" class="navBarItens">Ofertas do Dia</a></li>
        <li><a href="#" class="navBarItens">Mais Vendidos</a></li>
        <li><a href="#" class="navBarItens">Novidades</a></li>
    </ul>

    <ul class="info_add"> <!-- INFO ADICIONAL -->
        <li><a href="#" class="appAcesso">Acesso Nosso App</a></li>
        <li class="redes_soc">
            <a href="#">Siga-nos em:
                <div>
                    <img src="IMAGES/Vector.png" alt="Tiktok">
                    <img src="IMAGES/instagram-logo-fill-svgrepo-com 1.png" alt="Instagram">
                    <img src="IMAGES/layer1.png" alt="X (Twitter)">
                </div>
            </a>
            <input type="hidden" name="">
        </li>
    </ul>

</nav>

<script>
    const logo = document.querySelector(".logo");
    logo.addEventListener("click", () => {
        location.href = "index.php";
    })
</script>

<?php 

if(isset($_REQUEST['perfilPage'])){
    echo "<script>location.href='index.php?page=perfil'</script>";
}

?>

