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

    .produtos {
        background-color: var(--bege00);
    }

    .cards-produtos {
        background-color: var(--bege03);
        padding: 1.5rem;
    }

    .tituloSection {
        font-size: 1.4em;
        margin: 1.5rem!important;
    }

    .section-produtos {
        display: flex;
        justify-content: space-evenly;
        flex-direction: row;
        height: max-content;
        padding: 1rem;
        margin: 1.5rem;
        background-color: var(--branco00);
    }

    .card-produto-home {
        width: 250px!important;
        margin: 0 0.5rem;
        height: auto;
        padding: 1rem;
        border-radius: 10px;
        background-color: var(--branco00);
        box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
    }

    .card-produto-home a {
        text-decoration: none;
        color: var(--preto00);
    }

    .card-produto-home .precoAntigo {
        text-decoration: line-through;
        color: var(--cinza00);
    }

    .card-produto-home .precoNovo {
        font-size: 1.2em;
    }

    .card-produto-home .precoNovo span {
        font-size: 0.5em;
        border-radius: 20px;
        padding: 0.2rem;
        font-weight: bold;
        background-color: var(--verde00);
        color: var(--branco00);
    }

    .card-produto-home figure {
        width: 150px;
        margin: auto!important;
    }

    .card-produto-home .img-produto {
        width: 100%;
        height: 140px;
        object-fit: contain;
    }

    .card-produto-home strong {
        color: var(--verde00);
    }

    .card-produto-home .info-cima {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .add-cart {
        display: flex;
        justify-content: space-evenly;
        align-items: flex-start;
    }

    .acao {
        z-index: 1;
        background-color: var(--branco00);
        box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.098);
        max-width: 50px;
        height: auto;
        padding: 0.5rem;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .acao img {
        width: 100%;
        padding: 5px;
    }

    .info-cima {
        margin: 0 0 2rem 0;
    }

    .info-meio {
        text-align: center;
        margin: 2rem 0;
    }

    .info-baixo {
        margin-top: 2rem;
    }

    .card-produto p {
        margin: 1rem 0;
    }

    .preco-parcela {
        margin: 2rem 0 !important;
    }

    .naoaguentomaisflex {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .button-card {
        background-color: var(--laranja00);
        color: var(--branco00);
        text-align: center;
        width: 100%;
        height: 30px;
        transition: .2s;
    }

    .button-card:hover {
        background-color: var(--branco00);
        color: var(--laranja00);
    }

    .espec {
        display: flex;
        flex-direction: column;
        align-items: space-evenly;
        gap: 20px;
    }

    .espec-meio {
        height: 200px;
    }

</style>

<div class="card-produto-home">
    <h1 class="titulo-info">Visto recentemente</h1>
    <div class="info-meio">
        <?php
        echo "<a href='./index.php?page=produto&idProd=" . $dados['idProduto'] . "'><figure><img class='img-produto' src='./IMAGES-BD/PRODUTOS/" . $dados['fotos_prod'] . "' alt='" . $dados['nome_prod'] . "'></figure></a>"
        ?>
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
    <div class="card-produto-home">
    <h1 class="titulo-info">Oferta do Dia</h1>
    <div class="info-meio">
        <?php
        echo "<a href='./index.php?page=produto&idProd=" . $dados['idProduto'] . "'><figure><img class='img-produto' src='./IMAGES-BD/PRODUTOS/" . $dados['fotos_prod'] . "' alt='" . $dados['nome_prod'] . "'></figure></a>"
        ?>
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
    <div class="card-produto-home">
    <h1 class="titulo-info">Mais vendido</h1>
    <div class="info-meio">
        <?php
        echo "<a href='./index.php?page=produto&idProd=" . $dados['idProduto'] . "'><figure><img class='img-produto' src='./IMAGES-BD/PRODUTOS/" . $dados['fotos_prod'] . "' alt='" . $dados['nome_prod'] . "'></figure></a>"
        ?>            
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

<div class="card-produto-home espec">
    <h1 class="titulo-info">Acesse nosso app!</h1>
    <div class="info-meio espec-meio">
        <figure><img src="IMAGES/celular.png" alt="App"></figure>
        <p>Disponível para Android e IOS</p>
    </div>
    <div class="info-baixo">
        <button class="button-card">Baixar agora</button>
    </div>
</div>
<div class="card-produto-home espec">
    <h1 class="titulo-info">Administre sua conta</h1>
    <div class="info-meio espec-meio">
        <figure><img src="IMAGES/conta.png" alt="Conta"></figure>
        <p>Desfrute de diversas vantagens e compre livremente</p>
    </div>
    <div class="info-baixo">
        <button class="button-card">Entrar na conta</button>
    </div>
</div>
