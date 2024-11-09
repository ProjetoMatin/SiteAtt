<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link rel="stylesheet" href="../ASSETS/PAGINAS-CSS/pagar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../IMAGES/matin-logo-png.png" type="image/x-icon">
</head>

<body>
    <header>
        <div class="esquerda">
            <a href="../index.php">
                <img src="../IMAGES/arrowLeft.png" alt="">
                <p>Voltar</p>
            </a>
        </div>

        <div class="direita">
            <img id="logo" src="../IMAGES/matin-logo-png.png" alt="">
            <h1>Mat-in</h1>
            <img id="pix" src="../IMAGES/pix.png" alt="">

        </div>
    </header>

    <main>
        <div class="card-esquerda">

            <h1 class="card-title">
                Pague via Pix para garantir sua compra!
            </h1>
            <div class="direita-esquerda">
                <div class="esquerdaMain">
                    <img src="../IMAGES/qrCodeMatin.png" alt="">
                    <p>Pague e será creditado na hora!</p>
                </div>
                <hr>

                <div class="direitaMain">
                    <p>Ou copie este código para fazer o pagamento</p>
                    <p class="txtCorrido">Escolha pagar via Pix pelo seu Internet Banking ou app de pagamentos. Depois, cole o seguinte código:</p>
                    <div class="input-btn">
                        <input type="text" name="txtpix" id="txtpix" value="CodigoDoPix" disabled>
                        <button>Copiar</button>
                    </div>
                </div>
            </div>
            <div class="direita-esquerda">
                <button class="btnlaranja">Ver em minhas compras</button>
                <div class="top-bottom">
                    <p id="countdown">Pague em até <mark>30 minutos 0 segundos</mark></p>
                    <p class="vencimento">Vencimento em dia mes ano, 00:00</p>
                </div>
            </div>
        </div>

        <div class="card-direita">
            <p class="card-title">Por favor siga as instruções</p>

            <div class="bolinha-txt">
                <p class="bolinha">1</p>
                <p class="texto">Acesse o app do seu banco ou internet banking de preferência.</p>
            </div>

            <hr class="separadorDireita">

            <div class="bolinha-txt">
                <p class="bolinha">2</p>
                <p class="texto">Escolha pagar via Pix. </p>
                <br>
                <br>
            </div>
            
            <hr class="separadorDireita">
            
            <div class="bolinha-txt">
                <p class="bolinha">3</p>
                <p class="texto">Escaneie o QR Code ou copie e cole o código Pix acima.</p>
                <br>
                <br>
            </div>

            <hr class="separadorDireita">

            <div class="bolinha-txt">
                <p class="bolinha">4</p>
                <p class="texto">Seu pagamento será aprovado em alguns segundos.</p>
            </div>
        </div>

    </main>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Definir o tempo de contagem regressiva (30 minutos a partir de agora)
        let countdownTime = new Date().getTime() + 30 * 60 * 1000;

        // Função para formatar a data e a hora
        function formatDateTime(date) {
            let day = date.getDate().toString().padStart(2, '0');
            let month = (date.getMonth() + 1).toString().padStart(2, '0'); // Meses são baseados em zero
            let year = date.getFullYear();
            let hours = date.getHours().toString().padStart(2, '0');
            let minutes = date.getMinutes().toString().padStart(2, '0');
            return `${day}/${month}/${year}, ${hours}:${minutes}`;
        }

        // Função para atualizar a contagem regressiva
        function updateCountdown() {
            let now = new Date().getTime();
            let distance = countdownTime - now;

            // Cálculos de tempo para horas, minutos e segundos
            let hours = Math.floor((distance % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
            let minutes = Math.floor((distance % (60 * 60 * 1000)) / (60 * 1000));
            let seconds = Math.floor((distance % (60 * 1000)) / 1000);

            // Exibir o resultado da contagem regressiva
            document.getElementById("countdown").innerHTML = `Pague em até <mark>${hours} horas ${minutes} minutos ${seconds} segundos</mark>`;

            // Se a contagem regressiva terminar, exibir "EXPIRADO"
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRADO";
            }
        }

        // Calcular e exibir o tempo de vencimento
        let expirationDate = new Date(countdownTime);
        document.querySelector(".vencimento").innerHTML = `Vencimento em ${formatDateTime(expirationDate)}`;

        // Atualizar a contagem regressiva a cada 1 segundo
        let x = setInterval(updateCountdown, 1000);
        updateCountdown(); // Chamada inicial para definir a contagem regressiva imediatamente
    });
</script>

</html>
