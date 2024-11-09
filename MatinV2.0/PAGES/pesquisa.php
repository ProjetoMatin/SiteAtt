<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/pesquisa.css">

<?php

$pesquisa = $_REQUEST['search'] ?? "";
$pesquisaUPPER = strtoupper($pesquisa);

$selectQ = "SELECT AVG(aval.avaliacao) AS media, COUNT(aval.avaliacao) AS qntAval, COUNT(np.idNPedido) AS qntVendida, p.idProduto, p.nome_prod, p.preco_prod, p.fotos_prod, p.promocao 
FROM produto p 
LEFT JOIN avaliacao aval ON p.idProduto = aval.idProduto 
LEFT JOIN npedido np ON p.idProduto = np.idProduto 
WHERE p.nome_prod LIKE '%$pesquisa%' 
GROUP BY p.idProduto";

$selectP = $cx->prepare($selectQ);
$selectP->execute();
$RC = $selectP->rowCount();

if($RC != 0){
    ?>

<main>
    <div class="flex-direita-esquerda">

        <div class="div-esquerda">
            <?php 
            
            if (strlen($pesquisaUPPER) > 10) {
                $palavraFormatada = substr($pesquisaUPPER, 0, 10) . "...";
            } else {
                $palavraFormatada = $pesquisaUPPER;
            }

            ?>
            <p>Pesquisa para <br> <mark><?= $palavraFormatada ?></mark></p>
            <p><?= $RC; ?> resultados</p>

            <div class="flex-column">
                <p class="title">Preço</p>
                <form method="get">
                    <div class="inputs-encl">
                        <input type="hidden" name="page" value="pesquisa">
                        <input type="hidden" name="search" value="<?= $pesquisa ?>">
                        <input type="number" name="minimo" id="minimo" placeholder="Minimo">
                        <hr>
                        <input type="number" name="maximo" id="maximo" placeholder="Máximo">
                        <button type="submit"><img src="IMAGES/check.png" class="check" alt=""></button>
                    </div>
                </form>

                <hr>

                <div class="avaliacoes-encl">
                    <p class="title">Avaliação</p>

                    <p>Acima de:</p>
                    <div class="flex-numeros">
                        <p>1</p>
                        <p>2</p>
                        <p>3</p>
                        <p>4</p>
                        <p class="selected">5</p>
                    </div>
                    <p>média</p>
                </div>

                <hr>

                <div class="frete-encl">
                    <p class="title">Frete</p>

                    <form method="get" id="freteForm">
                        <input type="hidden" name="page" value="pesquisa">
                        <input type="hidden" name="search" value="<?= $pesquisa ?>">

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="freteG" value="true" id="flexSwitchCheckDefault" onchange="toggleFreteGratis()">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Frete Grátis</label>
                        </div>
                    </form>

                </div>
            </div>


        </div>

        <div class="div-direita">
            <div class="card-encl">
                <?php

                while ($dados = $selectP->fetch(PDO::FETCH_ASSOC)) {
                ?>

                    <a href="?page=produto&idProd=<?= $dados['idProduto'] ?>">

                        <div class="card">
                            <div class="foto-esquerda">
                                <?= "<img src='IMAGES-BD/PRODUTOS/" . $dados['fotos_prod'] . "' alt=''>" ?>
                            </div>
                            <div class="parte-direita">
                                <div class="title-fav">
                                    <p class="title"><?= $dados['nome_prod'] ?></p>
                                    <img src="IMAGES/heart.png" alt="">
                                </div>
                                <p class="freteAnuncio"><mark class="frete">FRETE GRÁTIS</mark> PARA COMPRAS ACIMA DE R$50,00</p>

                                <div class="info-card">
                                    <div class="parte-esquerda-card">
                                        <?php

                                        if ($dados['promocao']) {
                                            $precoAntigo = $dados['preco_prod'];
                                            $porcentagemDesconto = $dados['promocao'];
                                            $valorDesconto = ($precoAntigo * $porcentagemDesconto) / 100;
                                            $precoNovo = $precoAntigo - $valorDesconto;
                                            $precoNovoFormatado = number_format($precoNovo, 2, '.', ',');

                                            $avaliacaoFormatada = number_format($dados['media'], 2, '.', ',');

                                        ?>
                                            <p class="precoAntigo">De: R$<?= $dados['preco_prod'] ?></p>
                                            <div class="precos">
                                                <p class="precoNovo">Por: <mark class="letraGrande">R$ <?= $precoNovoFormatado ?></mark></p>
                                                <p class="promocao"><?= $porcentagemDesconto ?>% OFF</p>
                                            </div>

                                        <?php
                                        } else {
                                            $avaliacaoFormatada = number_format($dados['media'], 2, '.', ',');
                                        ?>
                                            <p class="preco precoNovo">Por: <mark class="letraGrande">R$ <?= $dados['preco_prod'] ?></mark></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="parte-direita-card">
                                        <div class="avaliacoes-card-encl">
                                            <p class="media"><mark class="aval"><?= $avaliacaoFormatada ?></mark> de média</p>
                                            <div class="avaliacoes-card">
                                                <hr>
                                                <div class="aval-card-flex">
                                                    <?php
                                                    // Formata o número de avaliações
                                                    if ($dados['qntAval'] >= 1000) {
                                                        $avaliacoesFormatadas = floor($dados['qntAval'] / 1000) . 'k';
                                                    } else {
                                                        $avaliacoesFormatadas = $dados['qntAval'];
                                                    }

                                                    if ($dados['qntVendida'] >= 1000) {
                                                        $quantidadeVendida = floor($dados['qntVendida'] / 1000) . 'k';
                                                    } else {
                                                        $quantidadeVendida = $dados['qntVendida'];
                                                    }
                                                    ?>
                                                    <p><?= $avaliacoesFormatadas ?> avaliações</p>
                                                    <p><?= $quantidadeVendida ?> vendidos</p>
                                                </div>
                                            </div>

                                            <button type="submit"> <img src="IMAGES/compra.png" alt=""> Adicionar ao carrinho</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </a>

                <?php
                }

                ?>

            </div>
        </div>
    </div>
</main>

    <?php 
}else{
    ?>

<main>
    <div class="flex-direita-esquerda">

        <div class="div-esquerda">
            <?php 
            
            if (strlen($pesquisaUPPER) > 10) {
                $palavraFormatada = substr($pesquisaUPPER, 0, 10) . "...";
            } else {
                $palavraFormatada = $pesquisaUPPER;
            }

            ?>
            <p>Pesquisa para <br> <mark><?= $palavraFormatada ?></mark></p>
            <p><?= $RC; ?> resultados</p>

            ?>

            <div class="flex-column">
                <p class="title">Preço</p>
                <form method="get">
                    <div class="inputs-encl">
                        <input type="hidden" name="page" value="pesquisa">
                        <input type="hidden" name="search" value="<?= $pesquisa ?>">
                        <input type="number" name="minimo" id="minimo" placeholder="Minimo">
                        <hr>
                        <input type="number" name="maximo" id="maximo" placeholder="Máximo">
                        <button type="submit"><img src="IMAGES/check.png" class="check" alt=""></button>
                    </div>
                </form>

                <hr>

                <div class="avaliacoes-encl">
                    <p class="title">Avaliação</p>

                    <p>Acima de:</p>
                    <div class="flex-numeros">
                        <p>1</p>
                        <p>2</p>
                        <p>3</p>
                        <p>4</p>
                        <p class="selected">5</p>
                    </div>
                    <p>média</p>
                </div>

                <hr>

                <div class="frete-encl">
                    <p class="title">Frete</p>

                    <form method="get" id="freteForm">
                        <input type="hidden" name="page" value="pesquisa">
                        <input type="hidden" name="search" value="<?= $pesquisa ?>">

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" name="freteG" value="true" id="flexSwitchCheckDefault" onchange="toggleFreteGratis()">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Frete Grátis</label>
                        </div>
                    </form>

                </div>
            </div>


        </div>

        <div class="div-direita">
            <p class="warning">NÃO HÁ PRODUTOS COM ESSE TÍTULO</p>
        </div>
    </div>
</main>

    <?php 
}
?>



<script>
    function toggleFreteGratis() {
        document.getElementById("freteForm").submit();

    }
</script>