<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/minhas-compras.css">
<?php
require_once "BASE/config.php";


$situacao = isset($_GET['situacao']) ? $_GET['situacao'] : 'TD';

$query = "SELECT np.*, p.nome_prod AS produto_nome, p.preco_prod AS produto_preco, p.fotos_prod AS imagemProduto, u.nome_usu AS vendedor_nome, u.premium AS premium
            FROM npedido np
            JOIN produto p ON np.idProduto = p.idProduto
            JOIN usuario u ON np.idUsuVendedor = u.idUsu
            WHERE np.idUsuComprador = :usuarioId";

if ($situacao != 'tudo') {
    $query .= " AND np.situacao = :situacao";
}


$exec = $cx->prepare($query);

$usuarioId = 1;

$exec->bindParam(':usuarioId', $usuarioId, PDO::PARAM_INT);

if ($situacao != 'tudo') {
    $exec->bindParam(':situacao', $situacao, PDO::PARAM_STR);
}

$exec->execute();

?>

<div class='minhas-compras'>
    <div class='situacoes-compra'>
        <div class="situacao-compra">
            <a href="?page=perfil&type=minhas_compras&situacao=tudo">
                <h2>Tudo</h2>
            </a>
        </div>
        <div class="situacao-compra">
            <a href="?page=perfil&type=minhas_compras&situacao=CA">
                <h2>A pagar</h2>
            </a>
        </div>
        <div class="situacao-compra">
            <a href="?page=perfil&type=minhas_compras&situacao=A">
                <h2>Preparando</h2>
            </a>
        </div>
        <div class="situacao-compra">
            <a href="?page=perfil&type=minhas_compras&situacao=CAC">
                <h2>A caminho</h2>
            </a>
        </div>
        <div class="situacao-compra">
            <a href="?page=perfil&type=minhas_compras&situacao=CF">
                <h2>Finalizado</h2>
            </a>
        </div>
        <div class="situacao-compra">
            <a href="?page=perfil&type=minhas_compras&situacao=CNR">
                <h2>Cancelado</h2>
            </a>
        </div>
        <div class="situacao-compra">
            <a href="?page=perfil&type=minhas_compras&situacao=D">
                <h2>Devolução/Reembolso</h2>
            </a>
        </div>
    </div>

    <?php
    if ($exec->rowCount() > 0) {
        while ($dados = $exec->fetch(PDO::FETCH_ASSOC)) {
            // Pegando os dados da compra
            $nomeVendedor = $dados['vendedor_nome'];
            $premium = $dados['premium'];
            $fotosProd = $dados['imagemProduto'];
            $produtoNome = $dados['produto_nome'];
            $produtoPreco = $dados['produto_preco'];
            $situacaoPedido = $dados['situacao'];
            $valorTotal = $dados['produto_preco'] + 5;
            $dataPedido = $dados['data_criacao'];
            $idPedido = $dados['idNPedido'];
            ?>
        <div class="info-compras">
            <div class="info-compra">
                <div class="info-vendedor">
                    <div class="infos">
                            <?php
                                if($premium == 1) {
                                    echo "<img src='IMAGES/Premium.png'>";
                                }
                            ?>
                            <h3><?=$nomeVendedor?></h3>
                            <img src="IMAGES/chat.png" alt="Conversar com o vendedor">
                    </div>
                    <div class="situacao-pedido">
                        <h2 class="situacao1">
                        <?php 
                        switch($situacaoPedido) {
                            case 'CNR':
                                // compra não realizada
                                echo "COMPRA NÃO REALIZADA";
                                break;
                            case 'CAC':
                                // compra a caminho
                                echo "COMPRA A CAMINHO";
                                break;
                            case 'CA':
                                // compra em andamento
                                echo "COMPRA EM ANDAMENTO";
                                break;
                            case 'A':
                                // compra em analise
                                echo "COMPRA EM ANÁLISE";
                                break;
                            case 'D':
                                // devolução ou reembolso
                                echo "DEVOLUÇÃO / REEMBOLSO";
                                break;
                            case 'CF':
                                // compra finalizada
                                echo "COMPRA FINALIZADA";
                                break;
                            }
                    ?>
                        </h2>
                        <div class="borda"></div>
                        <h2 class="situacao2"><?=$situacaoPedido?></h2>
                    </div>
                </div>           
                <hr>
                <div class="info-produto">
                    <div class="nome-prod">
                        <div>
                            <figure class="img-produto">
                                <img src="IMAGES-BD/PRODUTOS/<?=$fotosProd?>" alt="Imagem do Produto">
                            </figure>
                        </div>
                        <div>
                            <h3><?=$produtoNome?></h3>
                            <p><?=$dados['qnt_pedida']?> unidades</p>
                        </div>
                    </div>
                    <div class="preco">
                        <p class="precoAntigo">R$ <?php echo number_format($produtoPreco, 2, ',', '.'); ?></p>
                        <p class="precoNovo">R$ <?php echo number_format($produtoPreco, 2, ',', '.'); ?></p>
                    </div>
                </div>
            </div>
            <hr>    
            <div class="valor-total">
                <p>Valor total: <strong class="tot">R$ <?php echo number_format($valorTotal, 2, ',', '.'); ?></strong></p>
            </div>
            <div class="info-data-pedido">
                <div>
                    <p>Pedido feito em: <?php echo date("d M, Y", strtotime($dataPedido)); ?></p>
                    <p>ID do pedido: <?php echo $idPedido; ?></p>
                </div>
                <div class="botoes-acoes-pedido">
                <?php 
                        switch($situacao) {
                            case 'CNR':
                                // compra não realizada
                                echo " <button class='btn pagar'>Comprar novamente</button>
                                        <button class='btn outras-acoes'>Comprar semelhantes</button>";
                                break;
                        case 'CAC':
                            // compra a caminho
                            echo "  <button class='btn pagar'>Comprar novamente</button>
                                    <button class='btn outras-acoes'>Falar com Vendedor</button>
                                    <button class='btn outras-acoes'>Método de pagamento</button>";
                            break;
                        case 'CA':
                            // compra em andamento
                            echo "  <button class='btn pagar'>Pagar Agora</button>
                                    <button class='btn outras-acoes'>Falar com Vendedor</button>
                                    <button class='btn outras-acoes'>Método de pagamento</button>
                                    <button class='btn outras-acoes'>Cancelar Pedido</button> ";
                            break;
                        case 'A':
                            // compra em analise
                            echo "
                                    <button class='btn outras-acoes'>Falar com Vendedor</button>
                                    <button class='btn outras-acoes'>Método de pagamento</button>
                                    <button class='btn outras-acoes'>Cancelar Pedido</button> ";
                            break;
                        case 'D':
                            // devolução ou reembolso
                            echo " <button class='btn outras-acoes'>Falar com Vendedor</button>";
                            break;
                        }
                    ?>
                </div>
            </div>
        </div>
    <?php
        }
    } else {
        echo "<p>Nenhuma compra encontrada.</p>";
    }
    ?>
    </div>
</div>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const situacao = urlParams.get('situacao'); 

    if (situacao) {
        document.querySelectorAll('.situacao-compra').forEach((compra) => {
            const linkSituacao = compra.querySelector('a').href;
            const situacaoLink = new URL(linkSituacao).searchParams.get('situacao');
            if (situacaoLink === situacao) {
                compra.querySelector('h2').classList.add('selecionado');
            }
        });
    }
</script>

<?php

$cx = null;
?>
