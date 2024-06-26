<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/produto.css">

<?php
require_once 'BASE/config.php';
require_once 'MODEL/FreteAPI.php';

$idProd = $_REQUEST['idProd'] ?? "";

if (!empty($idProd || !is_null($idProd))) {
    $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria WHERE idProduto = :idProd";
    $selectP = $cx->prepare($selectQ);
    $selectP->bindParam("idProd", $idProd);
    $selectP->execute();
    $RC = $selectP->rowCount();
    if ($RC != 0) {
        $dado = $selectP->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "<script>location.href='index.php'</script>";
    }
}
?>

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
                
                $selectQPE = $cx->prepare("SELECT COUNT(*) as total FROM avaliacao WHERE idProduto = $idProd");
                $selectQPE->execute();
                $dadoQPE = $selectQPE->fetch(PDO::FETCH_ASSOC);
                    // echo count($dadoQPE);
                if($dadoQPE['total'] > 1 || $dadoQPE['total'] == 0) {
                    echo "<p>".$dadoQPE['total'] ." Avaliações</p>";
                } elseif($dadoQPE['total'] = 1) {
                    echo "<p>" . $dadoQPE['total'] . " Avaliação </p>";
                }

                ?>

                <hr>

                <?php 
                    $select_venda = $cx->prepare("SELECT qnt_vendas as vendas FROM produto WHERE idProduto = $idProd");
                    $select_venda->execute();
                    $dado_venda = $select_venda->fetch(PDO::FETCH_ASSOC);
                ?>
                <p><?=number_format($dado_venda['vendas'], 0, ',', '.')?> vendas</p>
            </div>

            <p id="freteAD"><mark id="palavraMARCADA">FRETE GRÁTIS</mark> PARA COMPRAS ACIMA DE R$50,00</p>

            <div class="precos">
                <?php

                if ($dado['promocao']) {
                ?>

                    <p id="precoAntigo">De: R$ <?php echo $dado['preco_prod'] ?></p>
                    <?php

                    $precoAntigo = $dado['preco_prod'];
                    $porcentagemDesconto = $dado['promocao'];
                    $valorDesconto = ($precoAntigo * $porcentagemDesconto) / 100;
                    $precoNovo = $precoAntigo - $valorDesconto;

                    ?>
                    <p id="precoNovo">Por: <span id="preco"><?php echo "R$ " . $precoNovo ?></span> <span id="desconto"><?php echo $dado['promocao'] ?>% OFF</span></p>


                <?php
                } else {
                ?>

                    <p id="precoNovo">Por: <span id="preco"><?php echo "R$ " . $dado['preco_prod'] ?></span></p>

                <?php
                }

                ?>

            </div>
        </div>

        <div class="resumoCompraEncl">
            <div class="resumoCompra">
                <p class="valorFrete">Frete: R$7,00</p>
                <p class="descResumoCompra">Saiba os prazos de entrega e as formas de envio.</p>

                <a href="#" class="textoVerde">Calcular prazo de entrega</a>

                <p class="qntEstoque">Estoque disponivel para entrega: <mark style="color: var(--preto00); font-weight: bolder;"><?php echo $dado['qnt_prod_estoque'] ?> Unidades</mark></p>

                <div class="btns-encl">
                    <button class="comprarBTN"><a href="#" class="comprarA">Comprar agora</a></button>
                    <button class="addCarrinhoBTN"><a href="#" class="addCarrinho">Adicionar ao carrinho</a></button>
                </div>

                <div class="infoContaVendedor">

                    <?php 
                    
                    $selectQ3 = "SELECT * FROM cria c INNER JOIN usuario u ON c.idUsu = u.idUsu INNER JOIN produto p ON c.idProduto = p.idProduto WHERE c.idProduto = $idProd";
                    $selectP3 = $cx->prepare($selectQ3);
                    $selectP3->execute();

                    $dado = $selectP3->fetch(PDO::FETCH_ASSOC);
                    
                    ?>

                    <figure>
                        <img src="IMAGES-BD/USUARIOS/<?php echo $dado['fotos_usu'] ?>" alt="">
                    </figure>
                    <div class="infoPerfil">
                        <p class="nomeUsu"><?php echo $dado['nome_usu'] ?></p>
                        <?php 
                        
                        if($dado['qnt_vendas_usuario'] > 1000){
                            echo "<p class='qntVendas'>+1000 vendas</p>";
                        }else{
                            echo "<p class='qntVendas'>" . $dado['qnt_vendas_usuario'] . " vendas</p>";
                        }

                        if($dado['premium'] == 1){
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