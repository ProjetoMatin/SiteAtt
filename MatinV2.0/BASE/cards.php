<link rel="stylesheet" href="../ASSETS/PAGINAS-CSS/cards.css">
<link rel="stylesheet" href="../ASSETS/GERAL.css">
<?php 
    require_once "config.php";

    $sql = "SELECT * FROM produto ORDER BY qnt_vendas DESC LIMIT 4";
    $prepare = $cx -> prepare($sql);
    $prepare->execute();
?>
<div class="cards-produtos">
    <?php
        $page = $_REQUEST['page'] ?? '';

        switch($page) {
            case 'produto':
                echo "<h1 class='tituloSection'>Similares com este produto</h1>";
                break;
            default:
                echo "<h1 class='tituloSection'>Inspirado no último visto</h1>";
                break;
        }
    ?>
    
    <div class="section-produtos">
    <?php
        while($dados = $prepare->fetch()) {
    ?>
        <div class="card-produto">
            <a href="./index.php?page=produto&idProd=<?= $dados['idProduto'] ?>">
                <div class="info-cima">
                    <p><?=$dados['qnt_vendas']?> vendidos</p>
                    <div class="avaliacoes">
                        <img src="./IMAGES/fullstar.png" alt="">
                        <img src="./IMAGES/fullstar.png" alt="">
                        <img src="./IMAGES/fullstar.png" alt="">
                        <img src="./IMAGES/fullstar.png" alt="">
                        <img src="./IMAGES/halfstar.png" alt="">
                    </div>
                </div>
            </a>
            <div class="info-meio">
                <div class="add-cart">
                    <button class="acao">
                        <img src="./IMAGES/shoppingcart.png" alt="Adicionar ao carrinho">
                    </button>
                    <?php
                        echo "<a href='./index.php?page=produto&idProd=". $dados['idProduto'] ."'><figure><img class='img-produto' src='./IMAGES-BD/PRODUTOS/".$dados['fotos_prod']."' alt='" . $dados['nome_prod'] . "'></figure></a>"
                    ?>
                    <button class="acao">
                        <img src="./IMAGES/Union.png" alt="Adicionar ao carrinho">
                    </button>
                </div>
            </div>
            <div class="info-baixo">
                <a href="./index.php?page=produto&idProd=<?= $dados['idProduto'] ?>">
                <p class="nome-produto"><?=$dados['nome_prod']?></p>
                <?php
                    if (!is_null($dados['promocao'])) {
                    echo "<p class='precoAntigo'>De: R$ " . $dados['preco_prod'] . "</p>";
                    $precoAntigo = $dados['preco_prod'];
                    $promocao = $dados['promocao'];
                    $formula = $precoAntigo - (($promocao / 100) * $precoAntigo);
                    $formulaFormatada = number_format($formula, 2);
                    echo "<p class='precoNovo'>Por: R$ " . $formulaFormatada . " <span class='promocao'>" . $dados['promocao'] . "% OFF</span></p>";
                    if (!is_null($dados['parcela'])) {
                        $parcela = $dados['parcela'];
                        $formula2 = $formulaFormatada / $parcela;
                        $formulaFormatada2 = number_format($formula2, 2);
                        echo "<p>em<strong class='parcela'> " . $dados['parcela'] . "x de R$" . $formulaFormatada2 . " sem juros.</strong></p>";
                    }
                    } else {
                        echo "<div class='preco-Promocao'>";
                        echo "<p class='preco-parcela'>Não há parcelas para este produto, <strong class='parcela'>pague à vista.</strong></p>";
                        echo "<p class='precoNovo'>R$" . $dados['preco_prod'] . "</p></div>";
                    }
                ?>
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
