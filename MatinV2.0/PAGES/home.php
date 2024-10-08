<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/home.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/cards.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<?php require_once 'BASE/config.php'; ?>
<style>
    .img-produto {
        width: 200px;
    }

    .carrossel {
        position: relative;
        width: 100%;
        max-width: 100vw;
        margin: auto;
        overflow: hidden;
    }

    .carrossel-container {
        display: flex;
        transition: transform 0.5s ease; 
    }

    .imagem {
        min-width: 100%;
    }

    .imagem img {
        width: 100%;
        height: auto; 
        object-fit: contain; 
    }

    .botoes-carrossel {
        position: absolute;
        top: 50%;
        width: 100%;
        display: flex;
        justify-content: space-between;
        transform: translateY(-50%);
    }

    .botoes-carrossel button {
        background-color: var(--branco00);
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin: 0.5rem;
        padding: 10px;
    }

    .botoes-carrossel button:hover {
        background-color: var(--verde00);
        color: var(--branco00);
    }

    .cards-encl {
        background-color: var(--bege00);
        display: flex;
        justify-content: center;
        gap: 10px;
        padding: 1.5rem; 
    }
</style>

<main>
    <!-- Carrossel -->
    <section class="carrossel">
        <div class="carrossel-container">
            <div class="imagem">
                <img src="./IMAGES/matinBanner.png" alt="Imagem 1">
            </div>
            <div class="imagem">
                <img src="./IMAGES/matinBanner2.png" alt="Imagem 2">
            </div>
        </div>
        <div class="botoes-carrossel">
            <button class="botao-esquerda">&#10094;</button>
            <button class="botao-direita">&#10095;</button>
        </div>
    </section>

    <div class="cards-encl">
        <div class="cards" style="display:flex;">
            <?php 
                require_once "BASE/firstCardHome.php";                
            ?>
        </div>            
    </div>

    <!-- Categorias -->
    <section class="categorias">
        <h1 class="tituloSection">Categorias mais buscadas</h1>
        <div class="cards-encl-categoria">
            <?php
            $selectQ = "SELECT * FROM categoria ORDER BY qnt_vis DESC LIMIT 5";
            $selectP = $cx->prepare($selectQ);
            $selectP->setFetchMode(PDO::FETCH_ASSOC);
            $selectP->execute();

            while ($dados = $selectP->fetch()) {
                echo "<div class='card-redondo'>";
                echo "<img src='IMAGES-BD/CATEGORIAS/{$dados['img_cat']}' alt=''>";
                echo "<p class='card-text'>{$dados['nome_cat']}</p>";
                echo "</div>";
            }
            ?>
        </div>
    </section>

    <?php
        require_once "BASE/cards.php";
        $arrayTitulosProduto = ["Inspirado pelo seu visto por ultimo", "Para você", "Ofertas do dia"];
        gerarCards($cx, $arrayTitulosProduto);
    ?>
</main>

<?php require_once 'BASE/footer.php'; ?>

<form id="localStorageForm" action="" method="POST" style="display: none;">
    <input type="hidden" name="idVistoPorUltimo" id="idVistoPorUltimo">
    <input type="submit" value="Enviar">
</form>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentIndex = 0;
    const imagens = document.querySelectorAll('.imagem');
    const totalImagens = imagens.length;
    const carrosselContainer = document.querySelector('.carrossel-container');

    function mostrarImagem(index) {
        const offset = -index * 100; 
        carrosselContainer.style.transform = `translateX(${offset}%)`;
    }

    function mudarImagemAutomaticamente() {
        currentIndex = (currentIndex + 1) % totalImagens; 
        mostrarImagem(currentIndex);
    }

    setInterval(mudarImagemAutomaticamente, 10000);

    document.querySelector('.botao-direita').addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalImagens; 
        mostrarImagem(currentIndex);
    });

    document.querySelector('.botao-esquerda').addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalImagens) % totalImagens; 
        mostrarImagem(currentIndex);
    });

    mostrarImagem(currentIndex);

    document.addEventListener('DOMContentLoaded', function() {
        const idVistoPorUltimo = localStorage.getItem('idVistoPorUltimo');

        if (idVistoPorUltimo) {
            document.getElementById('idVistoPorUltimo').value = idVistoPorUltimo;
            document.getElementById('localStorageForm').submit();
        }
    });
</script>
<script src="https://unpkg.com/scrollreveal"></script> 
<script>
    window.sr = ScrollReveal({
        reset: true
    });
    sr.reveal('.cards-encl', {
        duration: 800
    });
    sr.reveal('.cards-encl-categoria');
    sr.reveal('.cards-encl-ofertas');
</script>