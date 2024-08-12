<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/home.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/cards.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<?php require_once 'BASE/config.php'; ?>
<style>
    .img-produto {
        width: 200px;
    }
</style>
<main>
    <!-- CARROSSEL -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="IMAGES/matinBanner.png" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <!-- CARDS -->
    <div class="cards-encl">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Visto recentemente</h5>

                <div class="img-coracao">
                    <img src="IMAGES/div-img-produto.png" alt="">
                </div>

                <p class="card-text">Kiwi importado Nova Zelândia Gold KG</p>

                <div class="precos">
                    <p class="precoAntigo">R$60.00</p>
                    <div class="preco-Promocao">
                        <p class="precoNovo">R$44,99</p>
                        <p class="promocao">12% OFF</p>
                    </div>
                </div>

                <p>em <mark>12x R$5,80 sem juros</mark></p>
            </div>
        </div>

        <div class="card">
            <?php

            try {
                $selectQ = "SELECT * FROM produto ORDER BY RAND() LIMIT 1";
                $selectP = $cx->prepare($selectQ);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->execute();
                $row = $selectP->rowCount();

                while ($dados = $selectP->fetch()) {
                    echo "<a href='?page=produto&idProd=" . $dados['idProduto'] . "' class='card-encl-texto-redirect'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Oferta Recomendada</h5>";
                    echo "<div class='img-coracao'>";
                    echo "<img src='IMAGES-BD/PRODUTOS/{$dados['fotos_prod']}' alt=''>";
                    echo "</div>";
                    echo "<p class='card-text'>{$dados['nome_prod']}</p>";
                    echo "<div class='precos'>";

                    if (!is_null($dados['promocao'])) {
                        echo "<p class='precoAntigo'>R$ {$dados['preco_prod']}</p>";
                        echo "<div class='preco-Promocao'>";

                        $precoAntigo = $dados['preco_prod'];
                        $promocao = $dados['promocao'];
                        $formula = ($promocao / 100) * $precoAntigo;

                        $formulaFormatada = number_format($formula, 2);

                        echo "<p class='precoNovo'>R$ {$formulaFormatada}</p>";
                        echo "<p class='promocao'>{$dados['promocao']}% OFF</p>";

                        echo "</div>";

                        if (!is_null($dados['parcela'])) {
                            $parcela = $dados['parcela'];
                            $formula2 = $formulaFormatada / $parcela;
                            $formulaFormatada2 = number_format($formula2, 2);

                            echo "<p>em <mark>{$dados['parcela']}x de R$ {$formulaFormatada2} sem juros.</mark></p>";
                        }
                    } else {
                        echo "<div class='preco-Promocao'>";
                        echo "<p class='precoNovo'>R$" . $dados['preco_prod'] . "</p>";
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</a>";
                }
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo $erro . "oi";
            }

            ?>
        </div>
        <div class="card">

            <?php

            $selectQ = "SELECT * FROM produto ORDER BY qnt_vendas DESC LIMIT 1";
            $selectP = $cx->prepare($selectQ);
            $selectP->setFetchMode(PDO::FETCH_ASSOC);
            $selectP->execute();

            while ($dados = $selectP->fetch()) {
                echo "<a href='?page=produto&idProd=" . $dados['idProduto'] . "' class='card-encl-texto-redirect'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>Mais vendido</h5>";
                echo "<div class='img-coracao'>";
                echo "<img src='IMAGES-BD/PRODUTOS/{$dados['fotos_prod']}' alt=''>";
                echo "</div>";
                echo "<p class='card-text'>{$dados['nome_prod']}</p>";
                echo "<div class='precos'>";

                if (!is_null($dados['promocao'])) {
                    echo "<p class='precoAntigo'>R$ {$dados['preco_prod']}</p>";
                    echo "<div class='preco-Promocao'>";

                    $precoAntigo = $dados['preco_prod'];
                    $promocao = $dados['promocao'];
                    $formula = ($promocao / 100) * $precoAntigo;
                    $formulaFinal = $precoAntigo - $formula;

                    $formulaFormatada = number_format($formulaFinal, 2);

                    echo "<p class='precoNovo'>R$ {$formulaFormatada}</p>";
                    echo "<p class='promocao'>{$dados['promocao']}% OFF</p>";

                    echo "</div>";

                    if (!is_null($dados['parcela'])) {
                        $parcela = $dados['parcela'];
                        $formula2 = $formulaFormatada / $parcela;
                        $formulaFormatada2 = number_format($formula2, 2);

                        echo "<p>em <mark>{$dados['parcela']}x de R$ {$formulaFormatada2} sem juros.</mark></p>";
                    }
                } else {
                    echo "<div class='preco-Promocao'>";
                    echo "<p class='precoNovo'>R$" . $dados['preco_prod'] . "</p>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
                echo "</a>";
            }

            ?>
        </div>
        <div class="card no-photo">
            <div class="card-body">
                <h5 class="card-title">Acesse nosso app</h5>

                <p class="card-text">Disponivel para Android e IOS</p>

                <button class="btnCard">
                    Baixar Agora
                </button>
            </div>
        </div>
        <div class="card no-photo">
            <div class="card-body">
                <h5 class="card-title">Entre na sua conta</h5>

                <p class="card-text" style="margin-top: 8.4rem !important;">Desfrute de diversas vantagens e compre
                    livremente</p>

                <form action="<?= $_SERVER['PHP_SELF'] ?>">
                    <button class="btnCard" name="login">
                        Entrar
                    </button>
                </form>

                <?php

                if (isset($_REQUEST['login'])) {
                    echo "<script>location.href='PAGES/loginUsu.php'</script>";
                }

                ?>
            </div>
        </div>
        <div class="card no-photo">
            <div class="card-body">
                <h5 class="card-title">Meios de pagamento</h5>

                <p class="card-text ultimo" style="margin-top: 8.7rem !important;">Otimize seus pagamentos e esteja
                    seguro</p>

                <button class="btnCard">
                    Pagar
                </button>
            </div>
        </div>
    </div>
</main>

<!--

SECTION 1

-->

<section class="categorias">
    <h1 class="tituloSection">Categorias mais buscadas</h1>
    <div class="cards-encl-categoria">
        <?php
        $selectQ = "SELECT * FROM categoria ORDER BY qnt_vis DESC LIMIT 4 ";
        $selectP = $cx->prepare($selectQ);
        $selectP->setFetchMode(PDO::FETCH_ASSOC);
        $selectP->execute();
        $dados = $selectP->rowCount();

        while ($dados = $selectP->fetch()) {
            echo "<div class='card-redondo'>";
            echo "<img src='IMAGES-BD/CATEGORIAS/{$dados['img_cat']}' alt=''>";

                echo "<p class='card-text'>{$dados['nome_cat']}</p>";
            echo "</div>";
        }
        ?>
    </div>

</section>

<body>
<?php 

require_once "BASE/cards.php";

$arrayTitulosProduto = ["Inspirado no visto por ultimo", "Também pode se interessar", "Ofertas do Dia"];
gerarCards($cx, $arrayTitulosProduto);

?> 
    
</body>
    <?php require_once 'BASE/footer.php'?> 

    <form id="localStorageForm" action="" method="POST" style="display: none;">
        <input type="hidden" name="idVistoPorUltimo" id="idVistoPorUltimo">
        <input type="submit" value="Enviar">
    </form>

    </script>
    <!-- Isso aqui faz um monte de animações suaves no site. -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        window.addEventListener("load", () => {

            if (typeof jQuery === 'undefined') {
                console.error("jQuery não está carregado.");
                return;
            }

            let cartElements = document.getElementsByClassName("acaoCart");
            let favoritoElements = document.getElementsByClassName("acaoFavorito");

            if (cartElements.length > 0 && favoritoElements.length > 0) {
                for (let contador = 0; contador < cartElements.length; contador++) {
                    let cart = $(cartElements[contador]);
                    let favorito = $(favoritoElements[contador]);

                    const cartImage1 = 'IMAGES/grocery-store.png';
                    const cartImage2 = 'IMAGES/shoppingcart.png';
                    const favoritoImage1 = 'IMAGES/Union (Stroke).png';
                    const favoritoImage2 = 'IMAGES/Union.png';

                    favorito.on("click", () => {
                        favorito.fadeOut(200, () => {
                            if (favorito.attr('src').includes(favoritoImage1)) {
                                favorito.attr('src', favoritoImage2);
                            } else {
                                favorito.attr('src', favoritoImage1);
                            }
                            favorito.fadeIn(200);
                        });
                    });

                    cart.on("click", () => {
                        cart.fadeOut(200, () => {
                            if (cart.attr('src').includes(cartImage1)) {
                                cart.attr('src', cartImage2);
                            } else {
                                cart.attr('src', cartImage1);
                            }
                            cart.fadeIn(200);
                        });
                    });
                }

                console.log(favorito.attr('src'), cart.attr('src'));
            } else {
                console.error("Os elementos com as classes especificadas não foram encontrados.");
            }
        });
    </script>

    <script>
        $(document).ready(function() {

            function initCarousel(sectionClass) {
                const sections = document.querySelectorAll(sectionClass + ' .content');
                const buttons = document.querySelectorAll(sectionClass + ' .botoes-carrossel span');

                if (sections.length === 0 || buttons.length === 0) {
                    console.error('Elementos não encontrados para a classe:', sectionClass);
                    return;
                }

                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        const index = this.getAttribute('data-index');

                        sections.forEach(section => {
                            section.classList.remove('ativo');
                        });
                        buttons.forEach(btn => btn.classList.remove('ativo'));

                        sections[index].classList.add('ativo');
                        this.classList.add('ativo');

                        console.log('Seção ativada:', index);
                    });
                });
            }

            initCarousel('.produtos');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Recupera o dado do localStorage
            const idVistoPorUltimo = localStorage.getItem('idVistoPorUltimo');

            if (idVistoPorUltimo) {
                // Define o valor do input hidden
                document.getElementById('idVistoPorUltimo').value = idVistoPorUltimo;

                // Envia o formulário automaticamente
                document.getElementById('localStorageForm').submit();
            }
        });
    </script>

    <!-- Isso aqui faz uma animação de mostrar o conteudo quando scrolla pra baixo :) (bonitinho mas ta ferrando meu codigo entao ta comentado :)  -->
    <!-- <script src="https://unpkg.com/scrollreveal"></script> 
<script>
window.sr = ScrollReveal({
    reset: true
});
sr.reveal('.cards-encl', {
    duration: 800
});
sr.reveal('.cards-encl-categoria');
sr.reveal('.cards-encl-ofertas');
</script> -->