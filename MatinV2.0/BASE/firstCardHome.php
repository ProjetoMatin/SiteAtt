<?php 
    require_once 'config.php';

    $selectQ = "SELECT * FROM produto WHERE idProduto = 3 LIMIT 1";
    $selectP = $cx->prepare($selectQ);
    $selectP->setFetchMode(PDO::FETCH_ASSOC);
    $selectP->execute();
    $row = $selectP->rowCount();

    while ($dados = $selectP->fetch()) {
?>

<style>
    .titulo-info {
        font-size: 1.2em;
        text-align: center;
    }

</style>

<div class="card-produto">
    <h1 class="titulo-info">Visto recentemente</h1>
    <div class="info-meio">
        <div class="add-cart">
            <button class="acao" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img src="./IMAGES/shoppingcart.png" alt="Adicionar ao carrinho" onclick="addCarrinho(<?php echo $dados['idProduto']; ?>);">
            </button>
            <?php
            echo "<a href='./index.php?page=produto&idProd=" . $dados['idProduto'] . "'><figure><img class='img-produto' src='./IMAGES-BD/PRODUTOS/" . $dados['fotos_prod'] . "' alt='" . $dados['nome_prod'] . "'></figure></a>"
            ?>
            <button class="acao">
                <img src="./IMAGES/Union.png" alt="Adicionar ao carrinho">
            </button>
        </div>
    </div>
    <div class="info-baixo">
        <a href="./index.php?page=produto&idProd=<?= $dados['idProduto'] ?>">
            <p class="nome-produto"><?= $dados['nome_prod'] ?></p>
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
           
        }
        ?>
        </a>
    </div>
</div>

<?php 
   try {
    $selectQ = "SELECT * FROM produto ORDER BY RAND() LIMIT 1";
    $selectP = $cx->prepare($selectQ);
    $selectP->setFetchMode(PDO::FETCH_ASSOC);
    $selectP->execute();
    $row = $selectP->rowCount();

    while ($dados = $selectP->fetch()) {
?>
    <div class="card-produto">
    <h1 class="titulo-info">Oferta do Dia</h1>
    <div class="info-meio">
        <div class="add-cart">
            <button class="acao" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img src="./IMAGES/shoppingcart.png" alt="Adicionar ao carrinho" onclick="addCarrinho(<?php echo $dados['idProduto']; ?>);">
            </button>
            <?php
            echo "<a href='./index.php?page=produto&idProd=" . $dados['idProduto'] . "'><figure><img class='img-produto' src='./IMAGES-BD/PRODUTOS/" . $dados['fotos_prod'] . "' alt='" . $dados['nome_prod'] . "'></figure></a>"
            ?>
            <button class="acao">
                <img src="./IMAGES/Union.png" alt="Adicionar ao carrinho">
            </button>
        </div>
    </div>
    <div class="info-baixo">
        <a href="./index.php?page=produto&idProd=<?= $dados['idProduto'] ?>">
            <p class="nome-produto"><?= $dados['nome_prod'] ?></p>
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
           
        }
        ?>
        </a>
    </div>
</div>
<?php 
        } catch(Exception $e) {
            echo "". $e->getMessage() ."";
        }
    
?>

<?php 
   try {
    $selectQ = "SELECT * FROM produto ORDER BY qnt_vendas DESC LIMIT 1";
    $selectP = $cx->prepare($selectQ);
    $selectP->setFetchMode(PDO::FETCH_ASSOC);
    $selectP->execute();
    $row = $selectP->rowCount();

    while ($dados = $selectP->fetch()) {
?>
    <div class="card-produto">
    <h1 class="titulo-info">Mais vendido</h1>
    <div class="info-meio">
        <div class="add-cart">
            <button class="acao" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img src="./IMAGES/shoppingcart.png" alt="Adicionar ao carrinho" onclick="addCarrinho(<?php echo $dados['idProduto']; ?>);">
            </button>
            <?php
            echo "<a href='./index.php?page=produto&idProd=" . $dados['idProduto'] . "'><figure><img class='img-produto' src='./IMAGES-BD/PRODUTOS/" . $dados['fotos_prod'] . "' alt='" . $dados['nome_prod'] . "'></figure></a>"
            ?>
            <button class="acao">
                <img src="./IMAGES/Union.png" alt="Adicionar ao carrinho">
            </button>
        </div>
    </div>
    <div class="info-baixo">
        <a href=".  /index.php?page=produto&idProd=<?= $dados['idProduto'] ?>">
            <p class="nome-produto"><?= $dados['nome_prod'] ?></p>
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
           
        }
        ?>
        </a>
    </div>
</div>
<?php 
    } catch(Exception $e) {
        echo "". $e->getMessage() ."";
    }  
?>

<div class="card-produto">
    <h1 class="titulo-info">Acesse nosso app!</h1>
</div>
<div class="card-produto">
    <h1 class="titulo-info">Acesse nosso app!</h1>
</div>
<div class="card-produto">
    <h1 class="titulo-info">Acesse nosso app!</h1>
</div>