<!DOCTYPE html>
<html lang="en">

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
            <h1><a href="compra-prod.php" class="pagAtual">Descrição</a></h1>
            <h1><a href="#">Avaliações</a></h1>
            <h1><a href="#">Perguntas</a></h1>
        </div>

        <div class="desc">
            <div class="desc-encl">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias fugit doloribus quaerat consequuntur, incidunt ea, eligendi vel minima iusto molestiae enim nihil soluta, at voluptas reprehenderit harum beatae ad voluptates! Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam dolorum soluta amet ipsum quia. Quo est ipsum consectetur minus sunt placeat delectus aut. Aspernatur recusandae distinctio eius enim repellendus sequi?</p>
                <hr>
            </div>
            <div class="desc-encl">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis quos pariatur saepe, eos reiciendis minima laboriosam! Voluptas eius blanditiis impedit maiores, quam quisquam minima sint dolores expedita nulla atque autem.
                Et harum consectetur, laboriosam veniam dolorem corporis recusandae optio quam cum alias exercitationem accusamus veritatis officia quidem cumque illum corrupti, voluptatum a beatae enim totam dicta iusto quis. Fuga, exercitationem!</p>
                <hr>
            </div>
            <div class="desc-encl">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At suscipit ipsam recusandae eligendi esse, cumque vel doloremque reiciendis, minima illo asperiores incidunt laudantium sit, voluptates dolorem perspiciatis molestiae modi nemo.
                Error aut doloribus laborum iusto possimus minus sit tenetur, corporis repudiandae repellendus vitae consectetur cum dignissimos eum mollitia libero quibusdam, magnam quam illum voluptate distinctio at laudantium alias odio! Modi.</p>
            </div>
        </div>
    </div>


    <?php

    require_once '../../PAGINAS/PAGS-REP/footerVers1.php';

    ?>
</body>
<script src="../../JAVASCRIPT/GERAL/btn-highlight.js"></script>
<script src="../../JAVASCRIPT/ESPECIFICO/COMPRAPROD/qnt-prod.js"></script>

</html>