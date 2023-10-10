<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carregando...</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/home.css">
    <link rel="stylesheet" href="../../STYLES/GERAl/basico.css">
    <style>
        body {
            background-color: var(--branco);
            color: var(--verdeescuro);
            position: relative;
            width: 100vw;
            height: 100vh;
        }

        div {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        figure {
            animation-duration: 2s;
            animation-iteration-count: infinite;
            animation-name: rodando;
            width: 300px;
        }
        figure img {
            width: 100%;
        }

        @keyframes rodando {
            from {
                rotate: 0deg;
            } to {
                rotate: 360deg;
            }
        }
    </style>
</head>
<body onload="mudar_pag()">
    <div>
        <figure>
            <img src="../../../logos-projeto/png/logo/com borda/logo.png" alt="Logo Mat-in">
        </figure>
        <h1>Carregando...</h1>
    </div>
    <script>
        function mudar_pag() {
            window.location.replace("home.php")
        }
    </script>
</body>
</html>