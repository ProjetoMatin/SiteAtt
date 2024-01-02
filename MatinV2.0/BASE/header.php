<style>
    h1,
    img,
    ul,
    figure,
    .mb-3 {
        margin: 0 !important;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 15px;
    }

    header .logo {
        display: flex;
        align-items: center;
    }

    header .logo img {
        width: 55px;
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
        /* background-color: orange; */
    }

    nav .ul_menus, nav .info_add {
        display: flex;
        align-items: center;
        list-style: none;
        padding: 0 !important;
    }

    nav .ul_menus li, nav .info_add li {
        padding: 0 15px;

    }

    nav .ul_menus li .dropdown button {
        background-color: var(--branco00);
        border: 0;
        color: var(--preto00);
        font-weight: bold;
    }

    nav .ul_menus li .dropdown button:hover,
    nav .ul_menus li .dropdown button:focus,
    nav .ul_menus li .dropdown button:active {
        background-color: var(--branco00) !important;
        color: var(--preto00) !important;
    }

    nav .ul_menus li a, nav .info_add li a {
        color: var(--preto00);
        font-weight: bold;
        text-decoration: none;
    }

    nav .info_add, nav .info_add .redes_soc a{
        display: flex;
        align-items: center;
    }

    nav .info_add .redes_soc a div{
        margin-left: 15px;
    }
</style>
<header>
    <div class="logo">
        <img src="IMAGES/logo.png" alt="logo Mat-in">

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
            <li><img src="IMAGES/user.png" alt=""></li>
            <li><img src="IMAGES/heart.png" alt=""></li>
            <li><img src="IMAGES/shoppingcart.png" alt=""></li>
            <li><img src="IMAGES/headphones.png" alt=""></li>
        </ul>
    </div>
</header>

<nav>
    <ul class="ul_menus">
        <li>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorias
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Template</a></li>
                    <li><a class="dropdown-item" href="#">Template</a></li>
                    <li><a class="dropdown-item" href="#">Template</a></li>
                </ul>
            </div>
        </li>

        <li><a href="#">Ofertas do Dia</a></li>
        <li><a href="#">Mais Vendidos</a></li>
        <li><a href="#">Novidades</a></li>
    </ul>

    <ul class="info_add"> <!-- INFO ADICIONAL -->
        <li><a href="#">Acesso Nosso App</a></li>
        <li class="redes_soc">
            <a href="#">Siga-nos em:
                <div>
                    <img src="IMAGES/Vector.png" alt="Tiktok">
                    <img src="IMAGES/instagram-logo-fill-svgrepo-com 1.png" alt="Instagram">
                    <img src="IMAGES/layer1.png" alt="X (Twitter)">
                </div>
            </a>
        </li>
    </ul>

</nav>