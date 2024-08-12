<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/carrinho.css">
<?php require_once 'MODEL/autenticacao.php'; ?>
<?php require_once 'BASE/viaCep.php'; ?>
<?php

$idUsu = $_SESSION['idUsu'] ?? "";

if ($idUsu) {
    $selectQ = "SELECT *, nome_usu AS nomeUsuario, nome_prod AS nomeProduto, fotos_prod AS fotosProduto 
    FROM carrinho ca 
    INNER JOIN usuario usu ON ca.idUsu = usu.idUsu 
    INNER JOIN produto prod ON ca.idProduto = prod.idProduto 
    WHERE ca.idUsu = :idUsu";
    $selectP = $cx->prepare($selectQ);
    $selectP->bindParam(':idUsu', $idUsu, PDO::PARAM_INT);
    $selectP->execute();

    $totalCarrinho = 0;

    $excluir = $_REQUEST['excluir'] ?? "";
    $idCarrinho = $_REQUEST['idCarrinho'] ?? "";
    $qntPedida = $_REQUEST['qntPedida'] ?? "";

    // Função excluir muito maneira

    if ($excluir == "true" && !empty($idCarrinho && !empty($qntPedida))) {
        $selectQ2 = "DELETE FROM carrinho WHERE idCarrinho = :idCarrinho";
        $selectP2 = $cx->prepare($selectQ2);
        $selectP2->bindParam(':idCarrinho', $idCarrinho, PDO::PARAM_INT);
        $selectP2->execute();
        echo "<script>location.href='?page=carrinho'</script>";

        $novoEstoque = $qntProdEstoque + $qntPedida;

        $updateQ = "UPDATE produto SET qnt_prod_estoque = :novoEstoque WHERE idProduto = :idProduto";
        $updateP = $cx->prepare($updateQ);
        $updateP->bindParam(':novoEstoque', $novoEstoque, PDO::PARAM_INT);
        $updateP->bindParam(':idProduto', $idProd, PDO::PARAM_INT);
        $updateP->execute();
    }

?>
    <main>
        <p>
            <img src="IMAGES/grocery-store.png" alt="" class="carrinho-icone">
            Carrinho de compras
        </p>

        <div class="info-carrinho-encl">
            <div class="top">
                <div class="esquerda">
                    <input type="checkbox" name="todosProdutos" id="todosProdutos">
                    <label for="todosProdutos">Todos os Produtos(<?php echo $RC + 1?>)</label>
                </div>

                <div class="info-table">
                    <p>Preço unitário</p>
                    <p>Quantidade</p>
                    <p>Preço Total</p>
                    <p>Ações</p>
                </div>
            </div>

            <div class="main">
                <?php
                while ($dados = $selectP->fetch(PDO::FETCH_ASSOC)) {
                    if ($dados) {
                        // Calcular o preço total por produto considerando a quantidade e desconto
                        $precoUnitario = $dados['preco_prod'];
                        $qntPedida = $dados['qntPedida'] ?? 0;
                        $precoProduto = $precoUnitario * $qntPedida;

                        if ($dados['promocao']) {
                            $promocao = $dados['promocao'];
                            $desconto = ($promocao / 100) * $precoUnitario;
                            $precoProduto -= $desconto * $qntPedida;
                        }

                        $precoProdutoFormatado = number_format($precoProduto, 2, ',', '.');

                        // Adicionar ao total do carrinho
                        $totalCarrinho += $precoProduto;

                ?>
                        <div class="produtos-encl">
                            <label for='<?php echo "checkboxProduto" . $dados['idCarrinho'] ?>' class="checkBoxProduto">
                                <div class="info-produto">
                                    <div class="esquerda">
                                        <input type="checkbox" name='<?php echo "checkboxProduto" . $dados['idCarrinho'] ?>' id='<?php echo "checkboxProduto" . $dados['idCarrinho'] ?>'>
                                        <?php echo "<img src='IMAGES-BD/PRODUTOS/" . $dados['fotosProduto'] . "' alt=''>" ?>

                                        <p><?php echo htmlspecialchars($dados['nomeProduto'], ENT_QUOTES, 'UTF-8'); ?></p>
                                    </div>
                                    <div class="direita">
                                        <div class="top-bottom">
                                            <?php
                                            if ($dados['promocao']) {
                                            ?>
                                                <p class="precoAntigo">R$<?php echo number_format($dados['preco_prod'], 2, ',', '.'); ?></p>
                                                <p class="precoNovo">R$<?php echo number_format($precoProduto / $qntPedida, 2, ',', '.'); ?></p>
                                            <?php
                                            } else {
                                            ?>
                                                <p class="precoNovo">R$<?php echo number_format($precoUnitario, 2, ',', '.'); ?></p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="top-bottom">
                                            <div class="btns-encl">
                                                <?php
                                                if ($dados['tipoPedido'] == 'unidade') {
                                                    echo "<button id='btnUnidade' class='ativo' style='margin-right: 10px'>Unidade</button>";
                                                    echo "<button id='btnKg'>Kg</button>";
                                                } else if ($dados['tipoPedido'] == 'kg') {
                                                    echo "<button id='btnUnidade' style='margin-right: 10px'>Unidade</button>";
                                                    echo "<button id='btnKg' class='ativo'>Kg</button>";
                                                }
                                                ?>
                                            </div>

                                            <label for="qntPedida">Quantidade:</label>
                                            <input type="number" name="qntPedida" id="qntPedida" max="99" value="<?php echo $dados['qntPedida'] ?>" disabled>
                                        </div>
                                        <div class="precoTotal">R$<?php echo $precoProdutoFormatado ?></div>
                                        <div class="top-bottom">
                                            <?php echo "<p><a href='?page=carrinho&excluir=true&idCarrinho=" . $dados['idCarrinho'] . "&qntPedida=" . $dados['qntPedida'] . "'>Excluir</a></p>" ?>
                                            <p><a href="#">Mover para Favoritos</a></p>
                                            <p><a href="#" class="semelhante">Encontrar semelhantes</a></p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <hr>
                <?php
                    } // Fim do if ($dados)
                }
                ?>
            </div>

            <div class="divs-left-right">
                <div class="pagamentos">
                    <p class="cardTitle">Pagamento</p>
                    <img src="IMAGES/cartoes.png" alt="">
                </div>

                <div class="resumoPedido">
                    <div class="acoesPedido">
                        <p class="cardTitle">Resumo do Pedido</p>
                        <input type="checkbox" name="selecionar_tudo" id="selecionar_tudo">
                        <label for="selecionar_tudo">Selecionar Tudo (<?php echo $RC + 1;?>)</label>
                        <a href="#" class="acoesPedidoProduto">Excluir</a>
                        <a href="#" class="acoesPedidoProduto" id="laranja">Mover para Favoritos</a>
                    </div>
                    <div class="divPrecoTotal">
                        <div class="precoEconomia">
                            <?php
                            $totalCarrinhoFormatado = number_format($totalCarrinho, 2, ',', '.');

                            if ($RC != 0) {
                            ?>
                                <p class="tot">Total(<?php echo $RC + 1; ?> item): <span class="precoNovo">R$<?php echo $totalCarrinhoFormatado; ?></span></p>
                            <?php
                            } else {
                            ?>
                                <p class="tot">Total(0 itens): <span class="precoNovo">R$0</span></p>
                            <?php
                            }

                            // Calcular economia, se houver promoção
                            $formulaEconomizou = 0;
                            $selectP->execute(); // Re-executa a consulta para verificar promoção
                            while ($dados = $selectP->fetch(PDO::FETCH_ASSOC)) {
                                if (isset($dados['promocao']) && $dados['promocao']) {
                                    $promocao = $dados['promocao'];
                                    $precoUnitario = $dados['preco_prod'];
                                    $qntPedida = $dados['qntPedida'] ?? 0;
                                    $desconto = ($promocao / 100) * $precoUnitario;
                                    $economiaPorProduto = $desconto * $qntPedida;
                                    $formulaEconomizou += $economiaPorProduto;
                                }
                            }

                            if ($formulaEconomizou != 0) {
                                $formulaEconomizouFormatada = number_format($formulaEconomizou, 2, ',', '.');
                            ?>
                                <p class="economiaUsuario">Economizou <strong>R$ <?php echo $formulaEconomizouFormatada; ?></strong></p>
                            <?php
                            } else {
                            ?>
                                <p class="economiaUsuario" style="opacity: 0;">Economizou <strong>R$ <?php echo number_format($formulaEconomizou, 2, ',', '.'); ?></strong></p>
                            <?php
                            }
                            ?>
                            <button id="btnComprarAgora" class="comprar"><a href="#">Comprar agora</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
    require_once "BASE/footer.php";
} else {
?>

    <main class='height90'>
        <p>
            <img src="IMAGES/grocery-store.png" alt="" class="carrinho-icone">
            Carrinho de compras
        </p>

        <section>
            <div class="bolsaDescontoEncl"><img src="IMAGES/bolsaDesconto.png" alt=""></div>
            <h1>Seu Carrinho De Compras Está Vazio!</h1>
            <a href="?page=home"><button>Ir às compras agora!</button></a>
        </section>
    </main>

<?php
    require_once 'BASE/footer.php';
}
?>