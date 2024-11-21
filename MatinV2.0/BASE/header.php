<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    button {
        background-color: transparent;
    }

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

    header .info ul li .dropdown-menu {
        display: none !important;
    }

    header .info ul li .show {
        display: block !important;
    }

    header .info ul li button {

        color: var(--laranja00);
        font-size: 1.2em;
        background-color: transparent !important;
        border: 0 !important;
    }

    header .info ul li button img {
        border-radius: 100%;
        object-fit: contain;
        margin-right: 5px !important;
    }

    .grande {
        width: 30px !important;
        height: 30px !important;
        border-radius: 0 !important;
    }

    .redondo{
        border-radius: 100% !important;
    }

    .normal {
        width: 30px !important;
        height: 30px !important;
        border-radius: 0% !important;
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

    .sub button {
        width: 60px !important;
    }

    .dropdown button {
        background-color: var(--branco00);
        border: 0;
        max-width: 300px !important;
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

    .btn-check:checked+.btn,
    .btn.active,
    .btn.show,
    .btn:first-child:active,
    :not(.btn-check)+.btn:active {
        background-color: transparent;
        color: var(--laranja00);
    }

    .dropdown button:hover,
    .dropdown button:focus,
    .dropdown button:active {
        color: var(--laranja00);
    }

    .dropdown-menu li .dropdown-item {
        display: flex;
        align-items: center;
    }

    .dropdown-menu li .dropdown-item img {
        width: 60px !important;
        height: 60px !important;
        margin-right: 10px !important;
        border-radius: 100%;
        border: 2px solid var(--verde00);
        /* background-color: red; */
    }

    .dropdown-menu li .dropdown-item .top-bottom-sep {
        display: flex;
        flex-direction: column;
    }

    .produtoCarrinhoHeader {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
    }

    .produtoCarrinhoHeader .foto-nome {
        display: flex;
        align-items: center;
    }

    .produtoCarrinhoHeader img {
        width: 30px !important;
        height: 30px !important;

    }

    .nomeProduto {
        font-size: 1em;
        margin-left: 10px !important;
    }

    .precoProduto {
        font-size: 1em;
        color: var(--verde00);
    }

    .semNome {
        width: 50px !important;
        /* background-color: red !important; */
    }

    .tituloMiniCard {
        font-size: 1.2em;
        text-align: center;
    }

    .carrinhoHeaderENCL{
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .carrinhoIMGHeader{
        display: flex;
        align-items: center;
    }

    .hover-laranja, .hover-verde {
        transition: .2s;
    }

    .hover-laranja:hover {
        color: var(--laranja00);
    }

    .hover-verde:hover {
        color: var(--verde00);
    }

    .redes_soc div{
        margin-left: 10px !important;
    }


    .fotosRedesSociais{
        width: 29px !important;
        height: 29px !important;
    }

    .redes_soc{
        display: flex;
        align-items: center;
    }
</style>
<header>

    <div class="logo">
        <img src="IMAGES/matin-logo-png.png" alt="logo Mat-in">

        <h1>Mat-in</h1>
    </div>

    <form action="#" method="get">
        <div class="search-inp">
            <div class="input-group mb-3">
                <input type="hidden" name="page" value="pesquisa">
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Busque aqui seu produto" name="search">
                <span class="input-group-text" id="inputGroup-sizing-default"><img src="IMAGES/search.png" alt=""></span>
            </div>
        </div>
    </form>

    <div class="info">
        <ul>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <?php
                $idUsu = isset($_SESSION['idUsu']) ? $_SESSION['idUsu'] : null;

                if (isset($idUsu)) {
                    $idUsu = $_SESSION['idUsu'];
                    $selectQ = "SELECT * FROM usuario WHERE idUsu = $idUsu";
                    $selectP = $cx->prepare($selectQ);
                    $selectP->execute();
                    $dado = $selectP->fetch(PDO::FETCH_ASSOC);
                ?>

                    <li>
                        <div class="dropdown">
                            <button class="navBarItens btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo "<img class='grande redondo' src='IMAGES-BD/USUARIOS/" . $dado['fotos_usu'] . "' alt=''>" . $dado['nome_usu'] . "" ?>
                            </button>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="?page=perfil">
                                        <img src="<?php echo "IMAGES-BD/USUARIOS/" . $dado['fotos_usu'] ?>" alt="">
                                        <div class="top-bottom-sep">
                                            <h4><?php echo $dado['nome_usu'] ?></h4>
                                            <h6>Meu Perfil ></h6>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item hover-verde" href="#">Minhas Compras</a></li>
                                <li><a class="dropdown-item hover-verde" href="#">Meus Cupons</a></li>
                                <li><a class="dropdown-item hover-verde" href="#">Mensagens</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item hover-laranja" href="#">Seja um Vendedor</a></li>
                                <li><a class="dropdown-item hover-laranja" href="#">Proteção ao Consumidor</a></li>
                                <li><a class="dropdown-item hover-laranja" href="#">Baixar o App Mobile</a></li>
                                <li><a class="dropdown-item hover-laranja" href="#">Central de Ajuda</a></li>
                                <li><a class="dropdown-item hover-laranja" href="#">Mais serviços</a></li>
                                <li><a class="dropdown-item hover-laranja" href="#">Acessibilidade</a></li>
                                
                            </ul>
                        </div>
                    </li>

                <?php

                } else {
                    echo "<li><button name='perfilPage' style='background-color: transparent;'><img src='IMAGES/profile-laranja.png' alt='' class='grande'></button></li>";
                }

                ?>

            </form>
            <!-- <li></li> -->
            <li class="semNome">
                <?php

                if (isset($idUsu)) {
                    $selectQ2 = "SELECT * FROM favoritos WHERE idUsu = $idUsu";
                    $selectP2 = $cx->prepare($selectQ2);
                    $selectP2->execute();
                    $RC = $selectP2->rowCount();

                ?>

                    <button type="button" class="btn btn-secondary semNome" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="<?php echo 'Você tem ' . $RC . ' itens favoritados!'; ?>">
                        <img src="IMAGES/heart-laranja.png" class="normal" alt="">
                    </button>

            </li>
        <?php
                } else {
                    $popoverContent00 = "<p class='tituloMiniCard'>Faça Login</p>";
                    $popoverContent00 .= "
                    <br>
                    <p>Para acessar seus favoritos!</p>
                    ";
        ?>

            <button type="button" class="btn btn-secondary semNome" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-html="true" data-bs-content="<?php echo htmlspecialchars($popoverContent00, ENT_QUOTES, 'UTF-8'); ?>">
                <img src="IMAGES/heart-laranja.png" class="normal" alt="">
            </button>

        <?php
                }
        ?>

        <li>
            <?php

            if (isset($idUsu)) {
                $selectQ3 = "SELECT * FROM carrinho c INNER JOIN produto p ON c.idProduto = p.idProduto WHERE c.idUsu = $idUsu LIMIT 5";
                $selectP3 = $cx->prepare($selectQ3);
                $selectP3->execute();
                $RC = $selectP3->rowCount();

                
                if($RC != 0){
                    $popoverContent = "Produtos adicionados recentemente";
                    while ($dados = $selectP3->fetch(PDO::FETCH_ASSOC)) {
                        $nomeProduto = $dados['nome_prod'];
    
                        if (strlen($nomeProduto) > 20) {
                            // Truncar o nome do produto para 20 caracteres e adicionar "..."
                            $nomeProduto = substr($nomeProduto, 0, 20) . '...';
                        }
    
    
                        $popoverContent .= "
                        <br>
                        
                        <div class='produtoCarrinhoHeader'>
                        <div class='foto-nome'>
                        <img src='IMAGES-BD/PRODUTOS/" . $dados['fotos_prod'] . "' class='produtoCarrinhoFoto'>
                        <p class='nomeProduto'>" . htmlspecialchars($nomeProduto, ENT_QUOTES, 'UTF-8') . "</p>
                        </div>
                        <p class='precoProduto'>R$" . $dados['preco_prod'] . "</p>
                        </div>
    
                        ";
                    }
                }else{
                    $popoverContent = "
                    
                    <div class='carrinhoHeaderENCL'>
                    <img src='IMAGES/carrinhoVazio.png' class='carrinhoIMGHeader'>
                    <p>O carrinho de compras está vazio!</p>
                </div>

                    ";

                }
            ?>
                <a href="?page=carrinho">
                    <button type="button" class="btn btn-secondary semNome" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-html="true" data-bs-content="<?php echo htmlspecialchars($popoverContent, ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="IMAGES/cart-laranja.png" class="normal" alt="">
                    </button>
                </a>
        </li>

    <?php

            }else{

                $popoverContent = "";

                $popoverContent .= "
                <div class='carrinhoHeaderENCL'>
                    <img src='IMAGES/carrinhoVazio.png' class='carrinhoIMGHeader'>
                    <p>O carrinho de compras está vazio!</p>
                </div>
                ";
                ?>

<a href="?page=carrinho">
    <button type="button" class="btn btn-secondary semNome" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-html="true" data-bs-content="<?php echo htmlspecialchars($popoverContent, ENT_QUOTES, 'UTF-8'); ?>">
                        <img src="IMAGES/cart-laranja.png" class="normal" alt="">
                    </button>
</a>

                <?php 
            }
    ?>
    <li>
        <?php

        $popoverContent2 = "<p class='tituloMiniCard'>Atendimento ao Cliente</p>";

        $popoverContent2 .= "
                <br>

                <p>O que podemos fazer por você?</p>

                ";

        ?>
        <button type="button" class="btn btn-secondary semNome" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-html="true" data-bs-content="<?php echo htmlspecialchars($popoverContent2, ENT_QUOTES, 'UTF-8'); ?>">
            <img src="IMAGES/headphones-laranja.png" class="normal" alt="">
        </button>
    </li>
    <!-- <li><a href="index.php?page=carrinho"><img src="IMAGES/cart-laranja.png" alt=""></a></li>
            <li><a href="PAGES/ouvidoria.php"><img src="IMAGES/headphones-laranja.png" alt=""></a></li> -->
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
                    <?php 
                    
                    $selectQ = "SELECT * FROM categoria ORDER BY qnt_vis LIMIT 5";
                    $selectP = $cx->prepare($selectQ);
                    $selectP->execute();

                    while($dados = $selectP->fetch(PDO::FETCH_ASSOC)){
                        echo "<li><a class='dropdown-item' href='#'>" . $dados['nome_cat'] ."</a></li>";
                    }
                    
                    ?>
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
            <a href="#" style="display: flex; align-items: center;">Siga-nos em:
                <div>
                    <a href="https://github.com/ProjetoMatin?tab=repositories" target="_blank"><img src="IMAGES/githubLogo.png" class="fotosRedesSociais" alt="Github"></a>
                    <a href="https://www.instagram.com/equipematin/" target="_blank"><img src="IMAGES/instagram-logo-fill-svgrepo-com 1.png" alt="Instagram" class="fotosRedesSociais"></a>
                    <a href="https://x.com/equipematin" target="_blank"><img src="IMAGES/layer1.png" alt="X (Twitter)" class="fotosRedesSociais"></a>
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

if (isset($_REQUEST['perfilPage'])) {
    echo "<script>location.href='index.php?page=perfil'</script>";
}

?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl, {
                trigger: 'hover'
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzWf1DwG5OZ8a8WUJqxk3z9lFtfvjxs9LMca8QvoCZ39" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-o+RDsa0BX+t0gC39QGJhO/nItp3GX2oqw1Ll1DL+Rg5WnBwD5y2Qp5/2y5K6M1nD" crossorigin="anonymous"></script>