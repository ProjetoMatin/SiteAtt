<link rel="stylesheet" href="../ASSETS/GERAL.css">

<style>
    @charset "UTF-8";

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
        flex-direction: column;
        height: max-content;
        padding: 1rem;
        margin: 1.5rem;
        background-color: var(--branco00);
    }

    .card-produto {
        width: 320px;
        margin: 0 1rem;
        height: auto;
        padding: 1rem;
        border-radius: 10px;
        background-color: var(--branco00);
        box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;
    }

    .card-produto .nome-produto {
        margin-bottom: 1rem;
    }

    .card-produto a {
        text-decoration: none;
        color: var(--preto00);
    }

    .card-produto .precoAntigo {
        text-decoration: line-through;
        color: var(--cinza00);
    }

    .card-produto .precoNovo {
        font-size: 1.2em;
    }

    .card-produto .precoNovo span {
        font-size: 0.5em;
        border-radius: 20px;
        padding: 0.2rem;
        font-weight: bold;
        background-color: var(--verde00);
        color: var(--branco00);
    }

    .card-produto figure {
        width: 100%;

    }

    .card-produto .img-produto {
        width: 100%;
        height: 140px;
        object-fit: contain;
    }

    .card-produto strong {
        color: var(--verde00);
    }

    .card-produto .info-cima {
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
</style>

<?php

function gerarCards($cx, $titulosCard)
{
    for ($i = 0; $i < sizeof($titulosCard); $i++) {
        $sql = "SELECT * FROM produto ORDER BY RAND() DESC LIMIT 4";
        $prepare = $cx->prepare($sql);
        $prepare->execute();
?>


    <div class="section-produtos">
            <h1 class='tituloSection'><?php echo $titulosCard[$i]; ?></h1>
            <div class="naoaguentomaisflex">
                <?php
                while ($dados = $prepare->fetch()) {
                ?>
                    <div class="card-produto">
                        <a href="./index.php?page=produto&idProd=<?= $dados['idProduto'] ?>">
                            <div class="info-cima">
                                <p><?= $dados['qnt_vendas'] ?> vendidos</p>
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
                                ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <form action="#">

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar ao Carrinho (1/2)</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="Unidade">Unidade:</label>
                            <input type="radio" name="escolaUnidadeKilo" id="Unidade" value="unidade">

                            <label for="Kg">Kg:</label>
                            <input type="radio" name="escolaUnidadeKilo" id="Kg" value="kg">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Próximo</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel2">Adicionar ao Carrinho (2/2)</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="Unidade">Quantidade:</label>
                            <input type="number" name="quantidadePedida" id="quantidadePedida" style="border-bottom: 1px solid var(--preto00);">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Adicionar ao Carrinho</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

<?php

    }
}

?>

<script>
    // function addCarrinho(idProduto) {
    //     location.href = '?page=index.php';
    // }
</script>