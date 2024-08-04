
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/carrinho.css">
<?php require_once 'MODEL/autenticacao.php'; ?>
<?php require_once 'BASE/viaCep.php' ?>
<?php

$idUsu = $_SESSION['idUsu'] ?? "";

if ($idUsu) {
    $selectQ = "SELECT *, nome_usu AS nomeUsuario, nome_prod AS nomeProduto, fotos_prod AS fotosProduto FROM carrinho ca INNER JOIN usuario usu ON ca.idUsu = usu.idUsu INNER JOIN produto prod ON ca.idProduto = prod.idProduto WHERE ca.idUsu = $idUsu";
    $selectP = $cx->prepare($selectQ);
    $selectP->execute();

    $formula = 0;
    $precoTotal = [];

    $excluir = $_REQUEST['excluir'] ?? "";
    $idProduto = $_REQUEST['idProduto'] ?? "";
    
    if($excluir == "true"){
        $selectQ2 = "DELETE FROM carrinho WHERE idUsu = $idUsu AND idProduto = $idProduto";
        $selectP2 = $cx->prepare($selectQ2);
        $selectP2->execute();
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
                    <label for="todosProdutos">Todos os Produtos(1)</label>
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


                ?>
                    <div class="produtos-encl">
                        <!-- <div class="info-vendedor">
                            <input type="checkbox" name="checkboxUsuario" id="checkboxUsuario">
                            <div class="nome-vendedor">
                                <?php if ($dados['premium'] == 1) {
                                ?>
                                    <img src="IMAGES/matin-logo-png.png" class="logo" alt="">
                                <?php
                                }
                                ?>
                                <label for="checkboxUsuario" style="font-weight: bold;">NOME VENDEDOR</label>
                                <img src="IMAGES/Subtract.png" alt="">
                            </div>
                        </div>
                         -->
                        <label for='<?php echo "checkboxProduto" . $dados['idProduto'] ?>' class="checkBoxProduto">


                            <div class="info-produto">
                                <div class="esquerda">
                                    <input type="checkbox" name='<?php echo "checkboxProduto" . $dados['idProduto'] ?>' id='<?php echo "checkboxProduto" . $dados['idProduto'] ?>'>
                                    <?php echo "<img src='IMAGES-BD/PRODUTOS/" . $dados['fotosProduto'] . "' alt=''>" ?>

                                    <p><?php echo $dados['nomeProduto'] ?></p>
                                </div>
                                <div class="direita">
                                    <div class="top-bottom">

                                        <?php

                                        if ($dados['promocao']) {
                                            $precoProduto = $dados['preco_prod'];
                                            $promocao = $dados['promocao'];
                                            $formula = ($promocao / 100) * $precoProduto;
                                            $formulaFinal = $precoProduto - $formula;
                                            array_push($precoTotal, $formulaFinal);
                                        ?>
                                            <p class="precoAntigo">R$<?php echo $dados['preco_prod'] ?></p>
                                            <p class="precoNovo">R$<?php echo $formulaFinal; ?></p>
                                        <?php
                                        } else {
                                        ?>
                                            <p class="precoNovo">R$<?php echo $dados['preco_prod']; ?></p>
                                        <?php
                                            $formulaFinal = $dados['preco_prod'];
                                            array_push($precoTotal, $formulaFinal);
                                        }

                                        ?>
                                    </div>
                                    <div class="top-bottom">
                                        <div class="btns-encl">
                                            <button id="btnUnidade">Unidade</button>
                                            <button id="btnKg">Kg</button>
                                        </div>
                                        
                                        <label for="qntPedida">Quantidade:</label>
                                        <input type="number" name="qntPedida" id="qntPedida" max="99" disabled>
                                    </div>
                                    <?php

                                    $somaPrecosTotal = 0;

                                    foreach ($precoTotal as $somaPrecos) {
                                        $somaPrecosTotal = $somaPrecosTotal + $somaPrecos;
                                    }


                                    ?>
                                    <div class="precoTotal">R$<?php echo $somaPrecosTotal; ?></div>
                                    <div class="top-bottom">
                                        <?php echo "<p><a href='?page=carrinho&excluir=true&idProd=" . $dados['idProduto'] . "'>Excluir</a></p>" ?>
                                        <p><a href="#">Mover para Favoritos</a></p>
                                        <p><a href="#" class="semelhante">Encontrar semelhantes</a></p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <hr>

                <?php

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
                        <label for="selecionar_tudo">Selecionar Tudo (1)</label>
                        <a href="#" class="acoesPedidoProduto">Excluir</a>
                        <a href="#" class="acoesPedidoProduto" id="laranja">Mover para Favoritos</a>
                    </div>
                    <div class="divPrecoTotal">
                        <div class="precoEconomia">
                            <p class="tot">Total(1 item): <span class="precoNovo">R$<?php echo $somaPrecosTotal; ?></span></p>
                            <?php

                            if ($formula != 0) {
                            ?>
                                <p class="economiaUsuario">Economizou <strong>R$ <?php echo $formula;?></strong></p>

                            <?php
                            }else{
                                ?>
                                <p class="economiaUsuario" style="opacity: 0;">Economizou <strong>R$ <?php echo $formula;?></strong></p>

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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnUnidade = document.getElementById('btnUnidade');
        const btnKg = document.getElementById('btnKg');
        const btnComprarAgora = document.getElementById('btnComprarAgora');

        // Função para atualizar o URL do botão "Comprar agora"
        function atualizarUrlComprarAgora() {
            const params = new URLSearchParams(window.location.search);
            let medida = 'unidadeativo'; // Valor padrão
            
            if (btnKg.classList.contains('ativo')) {
                medida = 'kgativo';
            }

            params.set('medida', medida);
            btnComprarAgora.querySelector('a').href = `?page=carrinho&${params.toString()}`;
        }

        // Evento de clique nos botões "Unidade" e "Kg"
        btnUnidade.addEventListener('click', function() {
            btnUnidade.classList.add('ativo');
            btnUnidade.classList.remove('inativo');
            btnKg.classList.add('inativo');
            btnKg.classList.remove('ativo');

            atualizarUrlComprarAgora();
        });

        btnKg.addEventListener('click', function() {
            btnKg.classList.add('ativo');
            btnKg.classList.remove('inativo');
            btnUnidade.classList.add('inativo');
            btnUnidade.classList.remove('ativo');

            atualizarUrlComprarAgora();
        });

        // Inicializa o estado dos botões com base no parâmetro da URL
        const params = new URLSearchParams(window.location.search);
        const medida = params.get('medida');
        if (medida === 'unidadeativo') {
            btnUnidade.classList.add('ativo');
            btnUnidade.classList.remove('inativo');
            btnKg.classList.add('inativo');
            btnKg.classList.remove('ativo');
        } else if (medida === 'kgativo') {
            btnKg.classList.add('ativo');
            btnKg.classList.remove('inativo');
            btnUnidade.classList.add('inativo');
            btnUnidade.classList.remove('ativo');
        } else {
            // Define o estado padrão dos botões se nenhum parâmetro estiver presente
            btnUnidade.classList.add('ativo');
            btnUnidade.classList.remove('inativo');
            btnKg.classList.add('inativo');
            btnKg.classList.remove('ativo');
        }

        // Atualiza o URL do botão "Comprar agora" inicialmente
        atualizarUrlComprarAgora();
    });
</script>