<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../../IMG/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/compra-prod.css">
    <title>Document</title>
</head>

<body>
    <?php

    require_once '../../PAGINAS/PAGS-REP/header.php';

    ?>

    <main>
        <div class="fotos-prod">
            <!-- NAO SEI FAZER CARROSSEL -->
            <img src="../../IMG/kiwi.png" alt="">
        </div>

        <div class="info-prod">
            <h1>Kiwi Gold</h1>
            <p class='text-adic-peq' style="margin-top: 10px;">De: <strong>R$69,99</strong></p>
            <h1 class="precoAtual">R$44,99</h1>
            <p class='text-adic-peq'>em 12x R$5,80</p>

            <button class="highlight-btn clicked" onclick="highlightButton(this)">Kg</button>
            <button class="highlight-btn" onclick="highlightButton(this)">Unid.</button>

            <p class='pesoInpts'>Peso</p>
            <div class="botoespeso">
                <button class="btnAumDim diminuir" onclick="diminuir()">-</button>
                <!-- valor Base -->
                <span class="valorB">1</span>
                <button class="btnAumDim aumentar" onclick="aumentar()">+</button>
            </div>

            <div class="botoesCompra">
                <button class="btns compra-btn">Comprar</button>
                <button class="btns add-carrinho"><img src="../../IMG/cart-add-verde.png" alt=""><a href="carrinho.php"> Adicionar ao carrinho</a></button>
            </div>
        </div>

    </main>

    <hr>
    <br>
    <section>
        <div class="info-Vend">
            <h1>Informações do vendedor</h1>

            <div class="info-encl">
                <figure>
                    <img src="../../IMG/vetor-guest.png" alt="">
                </figure>
                <h1>Yuri Esteves</h1>
                <figure id="logo">
                    <img src="../../IMG/logo.png" alt="">
                </figure>
                <p>Vendedor <strong>Premium</strong></p>
            </div>

            <div class="nmrsAval">
                <p class="perg">|19 perguntas respondidas</p>
                <p class="aval">(5.832) Avaliações</p>
            </div>

            <div class="avalEstrela">
                <h2>4,5</h2>
                <figure>
                    <img src="../../IMG/estrela-amarelo.png" alt="">
                    <img src="../../IMG/estrela-amarelo.png" alt="">
                    <img src="../../IMG/estrela-amarelo.png" alt="">
                    <img src="../../IMG/estrela-amarelo.png" alt="">
                    <img src="../../IMG/estrela-amarelo.png" alt="" class="estrelaCortada">
                </figure>
            </div>

        </div>

        <div class="melhor-Av">
            <div class="info-user-encl">
                <h1>Melhor avaliação</h1>

                <div class="info-user">
                    <h1>Osiris Nóbrega</h1>
                    <div class="info-user-nomefoto">
                        <p>Usuario <strong>Premium</strong></p>
                        <img src="../../IMG/logo.png" alt="">
                    </div>

                </div>
            </div>
            <p class="textoAv">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas dicta doloremque magnam illum temporibus est repudiandae, eaque quis quo itaque autem exercitationem nostrum labore explicabo beatae in! Nemo, veniam voluptate!</p>

            <div class="avalEstrela">
                <h2>5,0</h2>
                <figure>
                    <img src="../../IMG/estrela-amarelo.png" alt="">
                    <img src="../../IMG/estrela-amarelo.png" alt="">
                    <img src="../../IMG/estrela-amarelo.png" alt="">
                    <img src="../../IMG/estrela-amarelo.png" alt="">
                    <img src="../../IMG/estrela-amarelo.png" alt="" class="estrelaCortada">
                </figure>
            </div>
        </div>
    </section>

    <hr>
    <br>

    <div class="info-add">
        <div class="links">

            <input type="submit" value="Descrição" class="botaoDC" onclick="return conteudo(1)">
            <input type="submit" value="Avaliações" class="botaoAV" onclick="return conteudo(2)">
            <input type="submit" value="Perguntas" class="botaoPE" onclick="return conteudo(3)">

        </div>

        <div class="conteudo">
        </div>
    </div>


    <?php

    require_once '../../PAGINAS/PAGS-REP/footerVers1.php';

    ?>
</body>
<script src="../../JAVASCRIPT/ESPECIFICO/COMPRAPROD/aparecerConteudo.js"></script>
<script src="../../JAVASCRIPT/GERAL/btn-highlight.js"></script>
<script src="../../JAVASCRIPT/ESPECIFICO/COMPRAPROD/qnt-prod.js"></script>

</html>