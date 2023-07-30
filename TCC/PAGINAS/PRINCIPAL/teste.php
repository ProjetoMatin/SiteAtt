<!DOCTYPE html>
<html>
<head>
    <title>Carrossel de Cards</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/carrosel.css">
    <style>
        .carousel {
            display: flex;
            flex-wrap: wrap;
            overflow: hidden; /* Esconde o conteúdo que ultrapassar o tamanho do carousel */
        }

        .card {
        width: 30%; /* Ajuste o tamanho dos cards conforme necessário */
        border: 1px solid #ccc;
        margin-bottom: 10px;
        padding: 10px;
        transition: transform 0.3s ease-in-out; /* Adiciona uma transição de animação */
        }

        .show {
        transform: translateX(0); /* Mostra o card (translação de 0) */
        }

        .hide {
        transform: translateX(-100%); /* Esconde o card (translação para a esquerda) */
        }
    </style>
</head>
<body>
    <div class="carousel">
        <div class="card"> <!-- Card 1 -->
            <!-- Conteúdo do primeiro card aqui -->
        </div>
        <div class="card"> <!-- Card 2 -->
            <!-- Conteúdo do segundo card aqui -->
        </div>
        <div class="card"> <!-- Card 3 -->
            <!-- Conteúdo do terceiro card aqui -->
        </div>
        <div class="card"> <!-- Card 3 -->
        <button id="btnPrev">Anterior</button>
        <button id="btnNext">Próximo</button>
    </div>

    <script src="../../JAVASCRIPT/ESPECIFICO/CARROSEL/carrosel.js"></script>
</body>
</html>