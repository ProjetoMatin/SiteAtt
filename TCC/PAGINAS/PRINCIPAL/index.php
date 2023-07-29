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
</head>

<body>

    <?php
        //O CSS GERAL VAI ESTAR AQUI DENTRO DESSE HEADER.PHP, EU FIZ DESSE JEITO PARA NÃO TER QUE FICAR REPETINDO LINHAS DE CÓDIGO, SE MUDAR ALGUMA COISA DESSE HEADER.PHP VAI MUDAR PARA TODAS AS PAGINAS QUE DÃO REQUIRE NESSE ARQUIVO.
        
        require_once '../PAGS-REP/header.php';
    ?>

    <main>
        <div class="carrosselbg">
            <img src="../../IMG/pexels-oleksandr-pidvalnyi-321542.jpg" alt="">

            <div class="carrosselitens">
                <h1>Produtos que possam ser do seu interesse</h1>
            </div>
        </div>

        <!--Não sei fazer carrossel-->
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

    <script src="../../JAVASCRIPT/script.js"></script>
</body>

</html>