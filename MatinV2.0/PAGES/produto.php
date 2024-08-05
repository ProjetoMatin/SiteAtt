<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/produto.css">

<?php
require_once 'BASE/config.php';
require_once 'MODEL/FreteAPI.php';

$idUsu = $_SESSION['idUsu'] ?? "";
$idProd = $_REQUEST['idProd'] ?? "";

// Verificação da função caso o usuário clique em adicionar ao carrinho
$escolhaQnt = $_REQUEST['escolhaQnt'] ?? "";
$qntPedida = isset($_REQUEST['qntPedida']) ? (int)$_REQUEST['qntPedida'] : 0;
$qntProdEstoque = isset($_REQUEST['qntProdEstoque']) ? (int)$_REQUEST['qntProdEstoque'] : 0;

if (!empty($escolhaQnt) && !empty($qntPedida) && $qntPedida > 0 && $qntPedida <= $qntProdEstoque) {
    // Inserir o item no carrinho
    $insertQ = "INSERT INTO carrinho (idUsu, idProduto, qntPedida, tipoPedido) VALUES (:idUsu, :idProduto, :quantidadePedida, :escolhaQntSelecionada)";
    $insertP = $cx->prepare($insertQ);
    $insertP->bindParam(':idUsu', $idUsu);
    $insertP->bindParam(':idProduto', $idProd);
    $insertP->bindParam(':quantidadePedida', $qntPedida);
    $insertP->bindParam(':escolhaQntSelecionada', $escolhaQnt);
    $insertP->execute();
    
    // Calcular o novo estoque
    // $novoEstoque = $qntProdEstoque - $qntPedida;

    // Atualizar o estoque no banco de dados
    // $updateQ = "UPDATE produto SET qnt_prod_estoque = :novoEstoque WHERE idProduto = :idProduto";
    // $updateP = $cx->prepare($updateQ);
    // $updateP->bindParam(':novoEstoque', $novoEstoque, PDO::PARAM_INT);
    // $updateP->bindParam(':idProduto', $idProd, PDO::PARAM_INT);
    // $updateP->execute();

    // Redirecionar para a página do produto
    echo "<script>location.href='index.php?page=produto&idProd=$idProd'</script>";
}


if (!empty($idProd) && !is_null($idProd)) {
    $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria WHERE idProduto = :idProd";
    $selectP = $cx->prepare($selectQ);
    $selectP->bindParam("idProd", $idProd);
    $selectP->execute();
    $RC = $selectP->rowCount();
    if ($RC != 0) {
        $dado = $selectP->fetch(PDO::FETCH_ASSOC);

        echo "
            <script>
            localStorage.setItem('idProdVistoPorUltimo', '" . $dado['idProduto'] . "');
            </script>
        ";
    } else {
        echo "<script>location.href='index.php'</script>";
    }
}

function formatarCEP($cep)
{
    return substr_replace($cep, '-', 5, 0);
}
?>

<form action="" method="get">
    <input type="hidden" name="page" value="produto">
    <input type="hidden" name="idProd" value="<?php echo $idProd ?>">

    <section>
        <p class="paginasTopo"><a href="index.php">Voltar para o inicio</a> > <mark><?php echo $dado['nome_cat'] ?></mark> > <a href="#" class="laranjaTxt"><?php echo $dado['nome_prod'] ?></a></p>

        <div class="produto-encl">
            <div class="produto-main">
                <div class="fotos-prod">
                    <img src="IMAGES-BD/PRODUTOS/<?php echo $dado['fotos_prod'] ?>" alt="" class="fotoPrincipal">
                    <hr>
                    <div class="outras-fotos-encl">
                        <?php
                        $idProd = $dado['idProduto'];

                        $selectQ2 = "SELECT * FROM produto_has_foto phf INNER JOIN fotos f ON phf.idFoto = f.idFoto WHERE phf.idProd = :idProd LIMIT 4";
                        $selectP2 = $cx->prepare($selectQ2);
                        $selectP2->setFetchMode(PDO::FETCH_ASSOC);
                        $selectP2->bindParam(':idProd', $idProd, PDO::PARAM_INT);
                        $selectP2->execute();
                        $RC2 = $selectP2->rowCount();

                        $fotos = [];

                        if ($RC2 >= 1) {
                            while ($dado2 = $selectP2->fetch()) {
                                $fotos[] = $dado2['fotoNome'];
                            }
                        }

                        while (count($fotos) < 4) {
                            $fotos[] = 'sem_foto.png';
                        }

                        foreach ($fotos as $fotoNome) {
                            echo "<div class='fotos-encl'><img src='IMAGES-BD/PRODUTOS/" . $fotoNome . "' alt='' class='outra-foto'></div>";
                        }
                        ?>
                        <input type="hidden" name="qntProdEstoque" value="<?php echo $dado['qnt_prod_estoque'] ?>">
                    </div>
                </div>
            </div>

            <div class="produto-info-main">
                <h1 class="titulo"><?php echo $dado['nome_prod'] ?></h1>

                <div class="lado-lado">
                    <div class="avaliacao-prod-main-encl">
                        <img src="IMAGES/fullStar.png" alt="">
                        <img src="IMAGES/fullStar.png" alt="">
                        <img src="IMAGES/fullStar.png" alt="">
                        <img src="IMAGES/halfStar.png" alt="">
                        <img src="IMAGES/emptyStar.png" alt="">
                        <p>(4.2)</p>
                    </div>
                    <hr>

                    <?php
                    $selectQPE = $cx->prepare("SELECT COUNT(*) as total FROM avaliacao WHERE idProduto = :idProd");
                    $selectQPE->bindParam(':idProd', $idProd, PDO::PARAM_INT);
                    $selectQPE->execute();
                    $dadoQPE = $selectQPE->fetch(PDO::FETCH_ASSOC);
                    if ($dadoQPE['total'] > 1 || $dadoQPE['total'] == 0) {
                        echo "<p>" . $dadoQPE['total'] . " Avaliações</p>";
                    } elseif ($dadoQPE['total'] == 1) {
                        echo "<p>" . $dadoQPE['total'] . " Avaliação </p>";
                    }
                    ?>

                    <hr>

                    <?php
                    $select_venda = $cx->prepare("SELECT qnt_vendas as vendas FROM produto WHERE idProduto = :idProd");
                    $select_venda->bindParam(':idProd', $idProd, PDO::PARAM_INT);
                    $select_venda->execute();
                    $dado_venda = $select_venda->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <p><?= number_format($dado_venda['vendas'], 0, ',', '.') ?> vendas</p>
                </div>

                <p id="freteAD"><mark id="palavraMARCADA">FRETE GRÁTIS</mark> PARA COMPRAS ACIMA DE R$50,00</p>

                <div class="precos">
                    <?php
                    if ($dado['promocao']) {
                        $precoAntigo = $dado['preco_prod'];
                        $porcentagemDesconto = $dado['promocao'];
                        $valorDesconto = ($precoAntigo * $porcentagemDesconto) / 100;
                        $precoNovo = $precoAntigo - $valorDesconto;
                        ?>
                        <p id="precoAntigo">De: R$ <?php echo number_format($precoAntigo, 2, ',', '.') ?></p>
                        <p id="precoNovo">Por: <span id="preco"><?php echo "R$ " . number_format($precoNovo, 2, ',', '.') ?></span> <span id="desconto"><?php echo $dado['promocao'] ?>% OFF</span></p>
                    <?php
                    } else {
                        ?>
                        <p id="precoNovo">Por: <span id="preco"><?php echo "R$ " . number_format($dado['preco_prod'], 2, ',', '.') ?></span></p>
                    <?php
                    }
                    ?>
                </div>

                <div class="top-bottom">
                    <div class="btns-encl-qnt">
                        <div class="input">
                            <label for="escolhaQntUnidade">Unidade:</label>
                            <input type="radio" name="escolhaQnt" id="escolhaQntUnidade" value="unidade" checked>
                        </div>

                        <div class="input">
                            <label for="escolhaQntKG">KG:</label>
                            <input type="radio" name="escolhaQnt" id="escolhaQntKG" value="kg">
                        </div>
                    </div>

                    <label for="qntPedida">Quantidade:</label>
                    <input type="number" name="qntPedida" id="qntPedida" max="<?php echo $dado['qnt_prod_estoque'] ?>" required>
                </div>

                <div class="info-produto">
                    <div class="freteCalc">
                        <p>Frete </p>
                        <div class="info-resposta">
                            <?php
                            $selectQ = "SELECT * FROM usuario usu INNER JOIN local loc ON usu.Local_CEP = loc.CEP WHERE idUsu = :idUsu";
                            $selectP = $cx->prepare($selectQ);
                            $selectP->bindParam(':idUsu', $idUsu, PDO::PARAM_INT);
                            $selectP->execute();
                            $dados = $selectP->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <p class="casaUsuario"><?php echo formatarCEP($dados['CEP']) . ", " . $dados['Cidade'] . ", " . $dados['Bairro'] ?></p>
                            <p class="valor">Valor: R$7,00</p>
                        </div>
                    </div>

                    <div class="segurancaMatin">
                        <div class="seguranca">
                            <img src="IMAGES/segurancaMatinLaranja.png" alt="">
                            <p>GARANTIA <mark>Mat-In</mark></p>
                        </div>
                        <p class="txtRecebaLaEleUi">Receba seu pedido ou seu dinheiro de volta. Nunca transfira dinheiro ou se comunique fora do app Mat-in.</p>
                    </div>
                </div>
            </div>

            <div class="resumoCompraEncl">
                <div class="resumoCompra">
                    <p class="valorFrete">Frete: R$7,00</p>
                    <p class="descResumoCompra">Saiba os prazos de entrega e as formas de envio.</p>
                    <a href="#" class="textoVerde">Calcular prazo de entrega</a>
                    <p class="qntEstoque">Estoque disponível para entrega: <mark style="color: var(--preto00); font-weight: bolder;"><?php echo $dado['qnt_prod_estoque'] ?> Unidades</mark></p>

                    <div class="btns-encl">
                        <a href="?page=pagar&idProduto=<?php echo  $dado['idProduto']?>&qntPedida=" class="btnReformuladoLinkNaoMexe"><input type="button" value="Comprar Agora" class="comprarA"></a>
                        <input type="submit" value="Adicionar ao carrinho" class="addCarrinhoBTN">
                    </div>

                    <div class="infoContaVendedor">
                        <?php
                        $selectQ3 = "SELECT * FROM cria c INNER JOIN usuario u ON c.idUsu = u.idUsu INNER JOIN produto p ON c.idProduto = p.idProduto WHERE c.idProduto = :idProd";
                        $selectP3 = $cx->prepare($selectQ3);
                        $selectP3->bindParam(':idProd', $idProd, PDO::PARAM_INT);
                        $selectP3->execute();

                        $dado = $selectP3->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <figure>
                            <img src="IMAGES-BD/USUARIOS/<?php echo $dado['fotos_usu'] ?>" alt="">
                        </figure>
                        <div class="infoPerfil">
                            <p class="nomeUsu"><?php echo $dado['nome_usu'] ?></p>
                            <?php
                            if ($dado['qnt_vendas_usuario'] > 1000) {
                                echo "<p class='qntVendas'>+1000 vendas</p>";
                            } else {
                                echo "<p class='qntVendas'>" . $dado['qnt_vendas_usuario'] . " vendas</p>";
                            }
                            if ($dado['premium'] == 1) {
                                echo "<div class='perfilVerificado'>";
                                echo "<p class='verificado'>Vendedor verificado</p>";
                                echo "<img src='IMAGES/premium.png' alt=''>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="informacoes-extras">
                        <div class="devolucao">
                            <figure>
                                <img src="IMAGES/back.png" alt="">
                            </figure>
                            <p><mark style="font-weight: bolder;">Devolução ou reembolso gratuita/o</mark>, você tem 7 dias a partir da data de recebimento.</p>
                        </div>

                        <div class="segurancaCompra" style="margin-top: 30px !important;">
                            <figure>
                                <img src="IMAGES/escudo.png" alt="">
                            </figure>
                            <p><mark style="font-weight: bolder;">Segurança de Compra</mark>, receba o produto que está esperando ou devolvemos o dinheiro.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<?php require_once 'BASE/footer.php' ?>
