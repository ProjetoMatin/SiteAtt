<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/home.css">
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
                <img src="IMAGES/MAC.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="IMAGES/MAC (2).png" class="d-block w-100" alt="...">
            </div>

        </div>
    </div>

    <!-- CARDS -->
    <div class="cards-encl">
        <div class="card" style="width: 18rem;">
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

        <div class="card" style="width: 18rem;">
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
                        echo "<p class='precoNovo'>R$44,99</p>";
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
        <div class="card" style="width: 18rem;">

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
                    echo "<p class='precoNovo'>R$44,99</p>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
                echo "</a>";
            }

            ?>
        </div>
        <div class="card no-photo" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Acesse nosso app</h5>

                <p class="card-text">Disponivel para Android e IOS</p>

                <button class="btnCard">
                    Baixar Agora
                </button>
            </div>
        </div>
        <div class="card no-photo" style="width: 18rem;">
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
        <div class="card no-photo" style="width: 18rem;">
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
    <h1 class="tituloSection categoria_h1">Categorias mais buscadas</h1>

    <div class="cards-encl-categoria">
        <?php

        $selectQ = "SELECT * FROM categoria ORDER BY qnt_vis DESC LIMIT 4 ";
        $selectP = $cx->prepare($selectQ);
        $selectP->setFetchMode(PDO::FETCH_ASSOC);
        $selectP->execute();
        $dados = $selectP->rowCount();


        while ($dados = $selectP->fetch()) {
            echo "<div class='card-categorias' style='width: 18rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$dados['nome_cat']}</h5>";
            echo "<div class='img-coracao'>";
            echo "<img src='IMAGES-BD/PRODUTOS/{$dados['img_cat']}' class='img-comida' alt=''>";
            echo "</div>";
            echo "<p class='card-text'>{$dados['desc_cat']}</p>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>

</section>
<style>
    .produtos .content {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    .produtos .content.ativo {
        display: block;
        opacity: 1;
    }

    .botoes-carrossel span {
        transition: .2s;
    }

    .card-body a {
        color: var(--preto00);
        text-decoration: none;
    }
</style>

<body>
    <?php
    $maxSectionsToShow = 10;
    $sql = "SELECT COUNT(*) as total FROM produto";
    $prepare = $cx->prepare($sql);
    $prepare->setFetchMode(PDO::FETCH_ASSOC);
    $prepare->execute();
    $dados = $prepare->fetch();
    $totalProdutos = $dados['total'];
    $itemsPerSection = 4;
    $totalSections = ceil($totalProdutos / $itemsPerSection);

    $numSectionsToShow = min($totalSections, $maxSectionsToShow);
    ?>

<section class="produtos">
        <div class="content-title">
            <div>
                <h1>Ofertas do dia</h1>
            </div>
            <div class="botoes-carrossel">
                <?php
                for ($i = 0; $i < $numSectionsToShow; $i++) {
                    $activeClass = ($i == 0) ? 'ativo' : '';
                    echo "<span class='$activeClass' data-index='$i'></span>";
                }
                ?>
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM produto ORDER BY RAND()";
        $prepare = $cx->prepare($sql);
        $prepare->setFetchMode(PDO::FETCH_ASSOC);
        $prepare->execute();
        $sectionIndex = 0;
        $currentItem = 0;


        while ($dados = $prepare->fetch()) {
            if ($currentItem % $itemsPerSection == 0) {
                if ($currentItem > 0) echo '</div></div>';
                $sectionClass = ($sectionIndex == 0) ? 'content ativo' : 'content';
                echo "<div class='$sectionClass'><div class='flex-ultimos-vistos'>";
                $sectionIndex++;
            }
        ?>
            <div class="carrossel0 cards-encl-ofertas">
                <div class="card-ofertas" style="width: 18rem;">
                    <div class="card-body">
                        <div class="flex-avaliacoes">
                            <p><?= $dados['qnt_vendas'] ?> vendidos</p>
                            <div class="estrelas">
                                <img src="IMAGES/fullStar.png" alt="">
                                <img src="IMAGES/fullStar.png" alt="">
                                <img src="IMAGES/fullStar.png" alt="">
                                <img src="IMAGES/fullStar.png" alt="">
                                <img src="IMAGES/halfStar.png" alt="">
                                <span class="media-avaliacao">(4.2)</span>
                            </div>
                        </div>
                        <div class="flex-img-acoes">
                            <span class="acao"><img src="IMAGES/shoppingcart.png" alt="Adicionar ao carrinho" class="acaoCart"></span>
                            <img src="IMAGES-BD/PRODUTOS/<?= $dados['fotos_prod'] ?>" class="img-produto" alt="Kiwi Gold">
                            <span class="acao"><img src="IMAGES/Union.png" alt="Adicionar aos favoritos" class="acaoFavorito"></span>
                        </div>
                        <a href="index.php?page=produto&idProd=<?= $dados['idProduto'] ?>" class="link-produto">
                            <div class="desc-produto">
                                <p class="card-text"><?= $dados['nome_prod'] ?></p>
                                <div class="precos">
                                    <?php
                                    if (!is_null($dados['promocao'])) {
                                        echo "<p class='precoAntigo'>De: R$ " . $dados['preco_prod'] . "</p>";
                                        echo "<div class='preco-Promocao'>";
                                        $precoAntigo = $dados['preco_prod'];
                                        $promocao = $dados['promocao'];
                                        $formula = $precoAntigo - (($promocao / 100) * $precoAntigo);
                                        $formulaFormatada = number_format($formula, 2);
                                        echo "<p class='precoNovo'>Por: <strong>R$" . $formulaFormatada . "</strong></p>";
                                        echo "<p class='promocao'>" . $dados['promocao'] . "% OFF</p>";
                                        echo "</div>";
                                        if (!is_null($dados['parcela'])) {
                                            $parcela = $dados['parcela'];
                                            $formula2 = $formulaFormatada / $parcela;
                                            $formulaFormatada2 = number_format($formula2, 2);
                                            echo "<p>em<strong class='parcela'> " . $dados['parcela'] . "x de R$" . $formulaFormatada2 . " sem juros.</strong></p>";
                                        }
                                    } else {
                                        echo "<div class='preco-Promocao'>";
                                        echo "<p class='precoNovo'>R$ " . $dados['preco_prod'] . "</p>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php
            $currentItem++;
        }
        ?>
        </div>
        </div>
    </section>

    <section class="produtos">
        <div class="content-title">
            <div>
                <h1>Inspirado no último visto</h1>
            </div>
            <div class="botoes-carrossel">
                <?php
                for ($i = 0; $i < $numSectionsToShow; $i++) {
                    $activeClass = ($i == 0) ? 'ativo' : '';
                    echo "<span class='$activeClass' data-index='$i'></span>";
                }
                ?>
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM produto ORDER BY idProduto DESC";
        $prepare = $cx->prepare($sql);
        $prepare->setFetchMode(PDO::FETCH_ASSOC);
        $prepare->execute();
        $sectionIndex = 0;
        $currentItem = 0;


        while ($dados = $prepare->fetch()) {
            if ($currentItem % $itemsPerSection == 0) {
                if ($currentItem > 0) echo '</div></div>';
                $sectionClass = ($sectionIndex == 0) ? 'content ativo' : 'content';
                echo "<div class='$sectionClass'><div class='flex-ultimos-vistos'>";
                $sectionIndex++;
            }
        ?>
            <div class="carrossel0 cards-encl-ofertas">
                <div class="card-ofertas" style="width: 18rem;">
                    <div class="card-body">
                        <div class="flex-avaliacoes">
                            <p><?= $dados['qnt_vendas'] ?> vendidos</p>
                            <div class="estrelas">
                                <img src="IMAGES/fullStar.png" alt="">
                                <img src="IMAGES/fullStar.png" alt="">
                                <img src="IMAGES/fullStar.png" alt="">
                                <img src="IMAGES/fullStar.png" alt="">
                                <img src="IMAGES/halfStar.png" alt="">
                                <span class="media-avaliacao">(4.2)</span>
                            </div>
                        </div>
                        <div class="flex-img-acoes">
                            <span class="acao"><img src="IMAGES/shoppingcart.png" alt="Adicionar ao carrinho" class="acaoCart"></span>
                            <img src="IMAGES-BD/PRODUTOS/<?= $dados['fotos_prod'] ?>" class="img-produto" alt="Kiwi Gold">
                            <span class="acao"><img src="IMAGES/Union.png" alt="Adicionar aos favoritos" class="acaoFavorito"></span>
                        </div>
                        <a href="index.php?page=produto&idProd=<?= $dados['idProduto'] ?>" class="link-produto">
                            <div class="desc-produto">
                                <p class="card-text"><?= $dados['nome_prod'] ?></p>
                                <div class="precos">
                                    <?php
                                    if (!is_null($dados['promocao'])) {
                                        echo "<p class='precoAntigo'>De: R$ " . $dados['preco_prod'] . "</p>";
                                        echo "<div class='preco-Promocao'>";
                                        $precoAntigo = $dados['preco_prod'];
                                        $promocao = $dados['promocao'];
                                        $formula = $precoAntigo - (($promocao / 100) * $precoAntigo);
                                        $formulaFormatada = number_format($formula, 2);
                                        echo "<p class='precoNovo'>Por: <strong>R$" . $formulaFormatada . "</strong></p>";
                                        echo "<p class='promocao'>" . $dados['promocao'] . "% OFF</p>";
                                        echo "</div>";
                                        if (!is_null($dados['parcela'])) {
                                            $parcela = $dados['parcela'];
                                            $formula2 = $formulaFormatada / $parcela;
                                            $formulaFormatada2 = number_format($formula2, 2);
                                            echo "<p>em<strong class='parcela'> " . $dados['parcela'] . "x de R$" . $formulaFormatada2 . " sem juros.</strong></p>";
                                        }
                                    } else {
                                        echo "<div class='preco-Promocao'>";
                                        echo "<p class='precoNovo'>R$ " . $dados['preco_prod'] . "</p>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php
            $currentItem++;
        }
        ?>
        </div>
        </div>
    </section>

    <section class="interesses">
        <div class="content-title">
            <div>
                <h1>Também pode se interessar</h1>
            </div>
            <button class="btn"><a href="#">Ver mais produtos</a></button>
        </div>
        </div>
        <?php
        $sql = "SELECT * FROM produto ORDER BY RAND() DESC LIMIT 4";
        $prepare = $cx->prepare($sql);
        $prepare->setFetchMode(PDO::FETCH_ASSOC);
        $prepare->execute();
        $sectionIndex = 0;
        $currentItem = 0;

        while ($dados = $prepare->fetch()) {
            if ($currentItem % $itemsPerSection == 0) {
                if ($currentItem > 0) echo '</div></div>';
                $sectionClass = ($sectionIndex == 0) ? 'content ativo' : 'content';
                echo "<div class='$sectionClass'><div class='flex-ultimos-vistos'>";
                $sectionIndex++;
            }
        ?>
            <div class="carrossel0 cards-encl-ofertas">
                <div class="card-ofertas" style="width: 18rem;">
                    <div class="card-body">
                        <a href="index.php?page=produto&idProd<?= $dados['idProduto'] ?>">
                            <div class="flex-avaliacoes">
                                <p><?= $dados['qnt_vendas'] ?> vendidos</p>
                                <div class="estrelas">
                                    <img src="IMAGES/fullStar.png" alt="">
                                    <img src="IMAGES/fullStar.png" alt="">
                                    <img src="IMAGES/fullStar.png" alt="">
                                    <img src="IMAGES/fullStar.png" alt="">
                                    <img src="IMAGES/halfStar.png" alt="">
                                    <span class="media-avaliacao">(4.2)</span>
                                </div>
                            </div>
                            <div class="flex-img-acoes">
                                <span class="acao"><img src="IMAGES/shoppingcart.png" alt="Adicionar ao carrinho" class="acaoCart"></span>
                                <img src="IMAGES-BD/PRODUTOS/<?= $dados['fotos_prod'] ?>" class="img-produto" alt="Kiwi Gold">
                                <span class="acao"><img src="IMAGES/Union.png" alt="Adicionar aos favoritos" class="acaoFavorito"></span>
                            </div>
                            <div class="desc-produto">
                                <p class="card-text"><?= $dados['nome_prod'] ?></p>
                                <div class="precos">
                                    <?php
                                    if (!is_null($dados['promocao'])) {
                                        echo "<p class='precoAntigo'>De: R$ " . $dados['preco_prod'] . "</p>";
                                        echo "<div class='preco-Promocao'>";
                                        $precoAntigo = $dados['preco_prod'];
                                        $promocao = $dados['promocao'];
                                        $formula = $precoAntigo - (($promocao / 100) * $precoAntigo);
                                        $formulaFormatada = number_format($formula, 2);
                                        echo "<p class='precoNovo'>Por: <strong>R$" . $formulaFormatada . "</strong></p>";
                                        echo "<p class='promocao'>" . $dados['promocao'] . "% OFF</p>";
                                        echo "</div>";
                                        if (!is_null($dados['parcela'])) {
                                            $parcela = $dados['parcela'];
                                            $formula2 = $formulaFormatada / $parcela;
                                            $formulaFormatada2 = number_format($formula2, 2);
                                            echo "<p>em<strong class='parcela'> " . $dados['parcela'] . "x de R$" . $formulaFormatada2 . " sem juros.</strong></p>";
                                        }
                                    } else {
                                        echo "<div class='preco-Promocao'>";
                                        echo "<p class='precoNovo'>R$ " . $dados['preco_prod'] . "</p>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php
            $currentItem++;
        }
        ?>
        </div>
        </div>
    </section>
    <footer>
        <div class="logo">
            <img src="IMAGES/matin-logo-png.png" alt="logo Mat-in">
            <p>Mat-in</p>
        </div>

        <div class="links">
            <div class="link">
                <p class='link-title'>EMPRESA</p>
                <p class="link-item"><a href="#">Sobre nós</a></p>
                <p class="link-item"><a href="#">Endereço</a></p>
                <p class="link-item"><a href="#">Contato</a></p>
            </div>
            <div class="link">
                <p class='link-title'>COMUNIDADES</p>
                <p class="link-item"><a href="#">Vendedores</a></p>
                <p class="link-item"><a href="#">Compradores</a></p>
                <p class="link-item"><a href="#">Premium</a></p>
                <p class="link-item"><a href="#">Desenvolvedores</a></p>
            </div>
            <div class="link">
                <p class='link-title'>LINKS ÚTEIS</p>
                <p class="link-item"><a href="#">Suporte</a></p>
                <p class="link-item"><a href="#">Aplicativo mobile gratuito</a></p>
                <p class="link-item"><a href="#">Termos e Condições de Uso</a></p>
            </div>
        </div>

        <div class="redes-sociais">
            <div class="rede-social">
                <a href="#">
                    <figure>
                        <img src="IMAGES/facebook.png" alt="Facebook">
                    </figure>
                </a>
            </div>
            <div class="rede-social">
                <a href="#">
                    <figure>
                        <img src="IMAGES/whatsapp.png" alt="WhatsApp">
                    </figure>
                </a>
            </div>
            <div class="rede-social">
                <a href="#">
                    <figure>
                        <img src="IMAGES/twitter.png" alt="Twitter">
                    </figure>
                </a>
            </div>
            <div class="rede-social">
                <a href="#">
                    <figure>
                        <img src="IMAGES/telegram.png" alt="Telegram">
                    </figure>
                </a>
            </div>
        </div>
    </footer>
    <div class="sub-footer">
        <p>&copy;2024 | Mat-in. Todos os direitos reservados.</p>
    </div>
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