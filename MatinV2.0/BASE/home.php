<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/home.css">

<?php require_once 'BASE/config.php'; ?>

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
                $selectQ = "SELECT * FROM produtos ORDER BY RAND() LIMIT 1";
                $selectP = $cx->prepare($selectQ);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->execute();
                $row = $selectP->rowCount();

                while ($dados = $selectP->fetch()) {
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>Oferta Recomendada</h5>";
                    echo "<div class='img-coracao'>";
                    echo "<img src='IMAGES-USU/PRODUTOS/{$dados['fotos_prod']}' alt=''>";
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
                }
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo $erro;
            }

            ?>
        </div>
        <div class="card" style="width: 18rem;">

            <?php

            $selectQ = "SELECT * FROM produtos ORDER BY qnt_vendas DESC LIMIT 1";
            $selectP = $cx->prepare($selectQ);
            $selectP->setFetchMode(PDO::FETCH_ASSOC);
            $selectP->execute();

            while ($dados = $selectP->fetch()) {
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>Mais vendido</h5>";
                echo "<div class='img-coracao'>";
                echo "<img src='IMAGES-USU/PRODUTOS/{$dados['fotos_prod']}' alt=''>";
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

                <form action="<?=$_SERVER['PHP_SELF']?>">
                    <button class="btnCard" name="login">
                        Entrar
                    </button>
                </form>

                <?php 
                
                    if(isset($_REQUEST['login'])){
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
    <h1 class="tituloSection">Categorias mais buscadas</h1>

    <div class="cards-encl-categoria">
        <?php 

        $selectQ = "SELECT * FROM categoria ORDER BY qntVis DESC LIMIT 4 ";
        $selectP = $cx -> prepare($selectQ);
        $selectP->setFetchMode(PDO::FETCH_ASSOC);
        $selectP->execute();
        $dados = $selectP->rowCount();
    

        while($dados = $selectP->fetch()){
           
            echo "<div class='card-categorias' style='width: 18rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$dados['nome_cat']}</h5>";
            echo "<div class='img-coracao'>";
            echo "<img src='IMAGES-USU/PRODUTOS/{$dados['img_cat']}' class='img-comida' alt=''>";
            echo "</div>";
            echo "<p class='card-text'>{$dados['desc_cat']}</p>";
            echo "</div>";
            echo "</div>";
        
        }
        ?>
    </div>

</section>

<section class="ofertas">
    <h1 class="tituloSection">Ofertas do dia</h1>

    <!-- PARTE 1 -->

    <div class="carrossel0 cards-encl-ofertas">
        <div class="card-ofertas" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Principal oferta</h5>
                <div class="img-coracao">
                    <img src="IMAGES/div-img-produto (1).png" class="img-comida" alt="">
                    <button><img src="IMAGES/Union.png" alt="" class="coracaoimg"></button>
                </div>
                <p class="card-text">Ameixa Nacional Cariorta 600g</p>

                <div class="precos">
                    <p class="precoAntigo">R$60.00</p>
                    <div class="preco-Promocao">
                        <p class="precoNovo">R$44,99</p>
                        <p class="promocao">12% OFF</p>
                    </div>
                </div>

                <div class="bottomcard-encl">
                    <div class="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10(2).png" alt="estrelas">
                        <p>(4.5)</p>
                    </div>

                    <div class="qntVendido">
                        <p>3.3mil vendidos</p>
                    </div>
                </div>

                <button class="comprarBtn">Adicionar ao carrinho <img src="IMAGES/Vector (2).png" alt=""></button>
            </div>
        </div>
        <div class="card-ofertas" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Principal oferta</h5>
                <div class="img-coracao">
                    <img src="IMAGES/div-img-produto (1).png" class="img-comida" alt="">
                    <button><img src="IMAGES/Union.png" alt="" class="coracaoimg"></button>
                </div>
                <p class="card-text">Ameixa Nacional Cariorta 600g</p>

                <div class="precos">
                    <p class="precoAntigo">R$60.00</p>
                    <div class="preco-Promocao">
                        <p class="precoNovo">R$44,99</p>
                        <p class="promocao">12% OFF</p>
                    </div>
                </div>

                <div class="bottomcard-encl">
                    <div class="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10(2).png" alt="estrelas">
                        <p>(4.5)</p>
                    </div>

                    <div class="qntVendido">
                        <p>3.3mil vendidos</p>
                    </div>
                </div>

                <button class="comprarBtn">Adicionar ao carrinho <img src="IMAGES/Vector (2).png" alt=""></button>
            </div>
        </div>
        <div class="card-ofertas" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Principal oferta</h5>
                <div class="img-coracao">
                    <img src="IMAGES/div-img-produto (1).png" class="img-comida" alt="">
                    <button><img src="IMAGES/Union.png" alt="" class="coracaoimg"></button>
                </div>
                <p class="card-text">Ameixa Nacional Cariorta 600g</p>

                <div class="precos">
                    <p class="precoAntigo">R$60.00</p>
                    <div class="preco-Promocao">
                        <p class="precoNovo">R$44,99</p>
                        <p class="promocao">12% OFF</p>
                    </div>
                </div>

                <div class="bottomcard-encl">
                    <div class="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10(2).png" alt="estrelas">
                        <p>(4.5)</p>
                    </div>

                    <div class="qntVendido">
                        <p>3.3mil vendidos</p>
                    </div>
                </div>

                <button class="comprarBtn">Adicionar ao carrinho <img src="IMAGES/Vector (2).png" alt=""></button>
            </div>
        </div>
        <div class="card-ofertas" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Principal oferta</h5>
                <div class="img-coracao">
                    <img src="IMAGES/div-img-produto (1).png" class="img-comida" alt="">
                    <button><img src="IMAGES/Union.png" alt="" class="coracaoimg"></button>
                </div>
                <p class="card-text">Ameixa Nacional Cariorta 600g</p>

                <div class="precos">
                    <p class="precoAntigo">R$60.00</p>
                    <div class="preco-Promocao">
                        <p class="precoNovo">R$44,99</p>
                        <p class="promocao">12% OFF</p>
                    </div>
                </div>

                <div class="bottomcard-encl">
                    <div class="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10.png" alt="estrelas">
                        <img src="IMAGES/Star 10(2).png" alt="estrelas">
                        <p>(4.5)</p>
                    </div>

                    <div class="qntVendido">
                        <p>3.3mil vendidos</p>
                    </div>
                </div>

                <button class="comprarBtn">Adicionar ao carrinho <img src="IMAGES/Vector (2).png" alt=""></button>
            </div>
        </div>
    </div>

    <div class="setas">

        <button id="setaVolta">
            <div class="setaEsquerda">
                <img src="IMAGES/arrowLeft.png" alt="">
                <p>Voltar</p>
            </div>
        </button>

        <button id="setaAvanca">
            <div class="setaDireita">
                <p>Avançar</p>
                <img src="IMAGES/arrowRight.png" alt="">
            </div>
        </button>

    </div>

</section>

<!-- Isso aqui faz um monte de animações suaves no site. -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Isso aqui faz uma animação de mostrar o conteudo quando scrolla pra baixo :) -->
<script src="https://unpkg.com/scrollreveal"></script>
<script>
$(document).ready(function() {
    $(".card").hover(function() {
        $(this).addClass("lifted");
    }, function() {
        $(this).removeClass("lifted");
    });

    $(".card-ofertas").hover(function() {
        $(this).addClass("lifted-ofertas");
    }, function() {
        $(this).removeClass("lifted-ofertas");
    });

    $(".card-categorias").hover(function() {
        $(this).addClass("lifted");
    }, function() {
        $(this).removeClass("lifted");
    });
});
</script>

<script>
window.sr = ScrollReveal({
    reset: true
});
sr.reveal('.cards-encl', {
    duration: 1000
});
sr.reveal('.cards-encl-categoria');
sr.reveal('.cards-encl-ofertas');
</script>