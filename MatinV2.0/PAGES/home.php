<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/home.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/cards.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<?php require_once 'BASE/config.php'; ?>
<style>
    .img-produto {
        width: 200px;
    }
</style>
<main>
    <!-- CARROSSEL A FAZER -->
    <!-- CARDS -->
</main>

<!--

SECTION 1

-->

<section class="categorias">
    <h1 class="tituloSection">Categorias mais buscadas</h1>
    <div class="cards-encl-categoria">
        <?php
        $selectQ = "SELECT * FROM categoria ORDER BY qnt_vis DESC LIMIT 5";
        $selectP = $cx->prepare($selectQ);
        $selectP->setFetchMode(PDO::FETCH_ASSOC);
        $selectP->execute();
        $dados = $selectP->rowCount();

        while ($dados = $selectP->fetch()) {
            echo "<div class='card-redondo'>";
            echo "<img src='IMAGES-BD/CATEGORIAS/{$dados['img_cat']}' alt=''>";

                echo "<p class='card-text'>{$dados['nome_cat']}</p>";
            echo "</div>";
        }
        ?>
    </div>

</section>

<body>
<?php 

require_once "BASE/cards.php";

$arrayTitulosProduto = ["Inspirado no visto por último", "Também pode se interessar", "Ofertas do Dia"];
gerarCards($cx, $arrayTitulosProduto);

?> 
    
</body>
    <?php require_once 'BASE/footer.php'?> 

    <form id="localStorageForm" action="" method="POST" style="display: none;">
        <input type="hidden" name="idVistoPorUltimo" id="idVistoPorUltimo">
        <input type="submit" value="Enviar">
    </form>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Recupera o dado do localStorage
            const idVistoPorUltimo = localStorage.getItem('idVistoPorUltimo');

            if (idVistoPorUltimo) {
                // Define o valor do input hidden
                document.getElementById('idVistoPorUltimo').value = idVistoPorUltimo;

                // Envia o formulário automaticamente
                document.getElementById('localStorageForm').submit();
            }
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