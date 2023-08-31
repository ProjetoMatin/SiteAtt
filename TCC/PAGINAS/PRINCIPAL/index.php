<!DOCTYPE html>

<!--

    FAVOR DEIXAR O NOME DE TODAS AS VARIÁVEIS, CLASSES, ID'S E NAMES EM PORTUGUES!

-->

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="shortcut icon" href="../../IMG/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/home.css">
    <link rel="stylesheet" href="../../STYLES/GERAL/basico.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php
    //O CSS GERAL VAI ESTAR AQUI DENTRO DESSE HEADER.PHP, EU FIZ DESSE JEITO PARA NÃO TER QUE FICAR REPETINDO LINHAS DE CÓDIGO, SE MUDAR ALGUMA COISA DESSE HEADER.PHP VAI MUDAR PARA TODAS AS PAGINAS QUE DÃO REQUIRE NESSE ARQUIVO.

    require_once '../PAGS-REP/header.php';
    ?>

    <main>
        <div class="carrosel show" id="primeiraPagCarrosel">

            <div class="produtosInteresse">
                <h2 class="interesseTexto">Produtos que possam ser do seu interesse</h2>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="infoVend">
                            <h3 class="card-title">Kiwi Gold</h5>
                                <div class="fotoVend">
                                    <i class="material-icons">person</i>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Vendedor</h6>
                                </div>
                        </div>
                        <figure>
                            <img src="../../IMG/kiwi.png" alt="">
                        </figure>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="btnAcoes">
                            <img src="../../IMG/cart.png" alt="" class="icone" onclick="trocaIcone(2, this)">
                            <button class="btnComprar" onclick="trocapag(1)">Comprar</button>
                            <img src="../../IMG/heartpng.png" alt="" class="icone" onclick="trocaIcone(1, this)">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="infoVend">
                            <h3 class="card-title">Kiwi Gold</h5>
                                <div class="fotoVend">
                                    <i class="material-icons">person</i>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Vendedor</h6>
                                </div>
                        </div>
                        <figure>
                            <img src="../../IMG/kiwi.png" alt="">
                        </figure>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="btnAcoes">
                            <img src="../../IMG/cart.png" alt="" class="icone" onclick="trocaIcone(2, this)">
                            <button class="btnComprar" onclick="trocapag(1)">Comprar</button>
                            <img src="../../IMG/heartpng.png" alt="" class="icone" onclick="trocaIcone(1, this)">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="infoVend">
                            <h3 class="card-title">Kiwi Gold</h5>
                                <div class="fotoVend">
                                    <i class="material-icons">person</i>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Vendedor</h6>
                                </div>
                        </div>
                        <figure>
                            <img src="../../IMG/kiwi.png" alt="">
                        </figure>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="btnAcoes">
                            <img src="../../IMG/cart.png" alt="" class="icone" onclick="trocaIcone(2, this)">
                            <button class="btnComprar" onclick="trocapag(1)">Comprar</button>
                            <img src="../../IMG/heartpng.png" alt="" class="icone" onclick="trocaIcone(1, this)">
                        </div>
                    </div>
                </div>

            </div>
            <div class="pagsCarrosel">
                <span class="pagCarrosel ativo" onclick="mudarSecao(1)"></span>
                <span class="pagCarrosel" onclick="mudarSecao(2)"></span>
            </div>
        </div>
        </div>
        </div>

        <div class="carrosel hide" id="segundaPagCarrosel">
            <div class="produtosInteresse">
                <h2 class="interesseTexto">Produtos que possam ser do seu interesse</h2>
            </div>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="infoVend">
                            <h3 class="card-title">Kiwi Gold</h5>
                                <div class="fotoVend">
                                    <i class="material-icons">person</i>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Vendedor</h6>
                                </div>
                        </div>
                        <figure>
                            <img src="../../IMG/kiwi.png" alt="">
                        </figure>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="btnAcoes">
                            <img src="../../IMG/cart.png" alt="" class="icone" onclick="trocaIcone(2, this)">
                            <button class="btnComprar" onclick="trocapag(1)">Comprar</button>
                            <img src="../../IMG/heartpng.png" alt="" class="icone" onclick="trocaIcone(1, this)">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="infoVend">
                            <h3 class="card-title">Kiwi Gold</h5>
                                <div class="fotoVend">
                                    <i class="material-icons">person</i>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Vendedor</h6>
                                </div>
                        </div>
                        <figure>
                            <img src="../../IMG/kiwi.png" alt="">
                        </figure>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="btnAcoes">
                            <img src="../../IMG/cart.png" alt="" class="icone" onclick="trocaIcone(2, this)">
                            <button class="btnComprar" onclick="trocapag(1)">Comprar</button>
                            <img src="../../IMG/heartpng.png" alt="" class="icone" onclick="trocaIcone(1, this)">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="infoVend">
                            <h3 class="card-title">CACHORRO Gold</h5>
                                <div class="fotoVend">
                                    <i class="material-icons">person</i>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Vendedor</h6>
                                </div>
                        </div>
                        <figure>
                            <img src="../../IMG/kiwi.png" alt="">
                        </figure>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="btnAcoes">
                            <img src="../../IMG/cart.png" alt="" class="icone" onclick="trocaIcone(2, this)">
                            <button class="btnComprar" onclick="trocapag(1)">Comprar</button>
                            <img src="../../IMG/heartpng.png" alt="" class="icone" onclick="trocaIcone(1, this)">
                        </div>
                    </div>
                </div>
            </div>
            <div class="pagsCarrosel">
                <span class="pagCarrosel ativo" id="btnPrimeiraPag" onclick="mudarSecao(1)"></span>
                <span class="pagCarrosel" id="btnSegundaPag" onclick="mudarSecao(2)"></span>
            </div>
        </div>
        <div class="sectionCinza">
            <h1 class="cath1">Categorias mais buscadas</h1>
            <section>

                <div class="catitem">

                    <figure>
                        <a href="#"><img src="../../IMG/sementes-salvas.jpg" alt=""></a>
                    </figure>

                    <div class="infoitem">
                        <h1><a href="#">Sementes</a></h1>
                        <p><a href="#">160.000 vendidos nesta ultima semana!</a></p>
                        <input type="button" value="Saiba mais">
                    </div>

                </div>

                <div class="catitem">
                    <figure>
                        <a href="#"><img src="../../IMG/nutritious-breakfast-based-milk-1536x1024.jpg" alt=""></a>
                    </figure>

                    <div class="infoitem">
                        <h1><a href="#">Laticinios</a></h1>
                        <p><a href="#">160.000 vendidos nesta ultima semana!</a></p>
                        <input type="button" value="Saiba mais">
                    </div>

                </div>

                <div class="catitem">
                    <figure>
                        <a href="#"><img src="../../IMG/97f9675f-8982-47ab-84ca-64782e01187c.jpeg" alt=""></a>
                    </figure>
                    <div class="infoitem">
                        <h1><a href="#">Hortifruti</a></h1>
                        <p><a href="#">160.000 vendidos nesta ultima semana!</a></p>
                        <input type="button" value="Saiba mais">
                    </div>
                </div>
            </section>
        </div>

    </main>

    <footer id="tipo1">
        <h1>Deseja ver recomendações personalizadas?</h1>

        <input type="button" value="Faça seu login">

        <p>Cliente novo? <strong><a href="#">Comece aqui</a></strong></p>
    </footer>

    <script src="../../JAVASCRIPT/ESPECIFICO/CARROSEL/carrosel.js"></script>
    <script src="../../JAVASCRIPT/GERAL/trocapag.js"></script>
    <script src="../../JAVASCRIPT/ESPECIFICO/CARROSEL/trocaicone.js"></script>

</body>

</html>