<style>
    #conteudo2 {
        padding: 30px;
    }

    h6 a {
        color: var(--preto);
        text-decoration: none;
    }

    mark {
        background-color: transparent !important;
        color: var(--verde02);
    }

    .search-bar {
        margin: 20px 0 !important;
    }

    .local {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .local button {
        padding: 10px;
        background-color: var(--verde01);
        border-radius: 05px;
        color: var(--branco00);
    }

    .local button a {
        color: var(--branco00);
    }
</style>
<?php
require_once '../MODEL/autenticacao.php';

$idUsu = pegarIDUsuario();

$selectQ = "SELECT max(idNPedido) AS ultimo FROM npedido WHERE idUsuVendedor = :idUsu";
$selectP = $cx->prepare($selectQ);
$selectP->bindValue(':idUsu', $idUsu);
$selectP->execute();
$dados = $selectP->fetch(PDO::FETCH_ASSOC);

?>
<div class="conteudo" id="conteudo2">
    <div class="top-cont">
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Vendas</mark></h6>
            <?php $tituloRelatorio = "Gerenciamento de compras"; ?>
            <a href="RELATORIO/relatorio.php?tipoRelatorio=venda&idUsu=<?= $idUsu ?>&recibo=<?= $dados['ultimo'] ?>&titulo=<?= $tituloRelatorio ?>" target="_blank"><button>Gerar Relatório</button></a>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Produtos Vendidos</h4>
        </div>

        <div class="pesq">
            <div class="input-group flex-nowrap search-bar">
                <input type="search" class="form-control" id="searchInput" placeholder="Filtre por ID's ou Nomes de Usuário" aria-label="Search" aria-describedby="addon-wrapping" name="search">
            </div>
            <a href="?page=add_usu&NdPAdd=1"><button class="btnAdd" type="button">Adicionar</button></a>
        </div>

        <?php require_once '../BASE/alerts.php'; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Nome Produto</th>
                    <th scope="col">Nome Vendedor</th>
                    <th scope="col">Nome Comprador</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Qnt Pedida</th>
                    <th scope="col">Data Expedição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                $limite = 4;
                $inicio = ($pagina * $limite) - $limite;
                $search = $_REQUEST['search'] ?? "";

                if ($search) {


                    $selectQ = "SELECT np.*, p.*, uComprador.nome_usu AS nomeComprador, uComprador.email_usu AS emailComprador, uVendedor.nome_usu AS nomeVendedor, uVendedor.email_usu AS emailVendedor FROM npedido np INNER JOIN produto p ON np.idProduto = p.idProduto INNER JOIN usuario uComprador ON np.idUsuComprador = uComprador.idUsu INNER JOIN usuario uVendedor ON np.idUsuVendedor = uVendedor.idUsu WHERE p.nome_prod LIKE '%$search%' OR np.idNPedido LIKE '%$search%' ORDER BY np.idNPedido LIMIT $inicio,$limite";

                } else {
                    $selectQ = "SELECT np.*, p.*, uComprador.nome_usu AS nomeComprador, uComprador.email_usu AS emailComprador, uVendedor.nome_usu AS nomeVendedor, uVendedor.email_usu AS emailVendedor FROM npedido np INNER JOIN produto p ON np.idProduto = p.idProduto INNER JOIN usuario uComprador ON np.idUsuComprador = uComprador.idUsu INNER JOIN usuario uVendedor ON np.idUsuVendedor = uVendedor.idUsu ORDER BY np.idNPedido LIMIT $inicio,$limite";
                }

                $selectP = $cx->prepare($selectQ);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->execute();
                $total = $selectP->rowCount();

                if ($total == 0) {
                    echo "<p class='txtVermelho'>Não há registros no momento...</p>";
                } else {
                    while ($dados = $selectP->fetch()) {
                        echo "<tr>";
                        echo "<td scope='row'>{$dados['idNPedido']}</td>";
                        echo "<td>{$dados['nome_prod']}</td>";
                        echo "<td>{$dados['nomeVendedor']}</td>";
                        echo "<td>{$dados['nomeComprador']}</td>";

                        if ($dados['situacao'] == 'CNR') {
                            echo "<td class='txtVermelho'>Desistência</td>";
                        } elseif ($dados['situacao'] == 'CF') {
                            echo "<td class='txtVerde'>Vendido</td>";
                        } elseif ($dados['situacao'] == 'A') {
                            echo "<td class='txtAzul'>Em Processamento</td>";
                        } elseif ($dados['situacao'] == 'CA') {
                            echo "<td class='txtAzul'>Compra Em Andamento</td>";
                        }

                        echo "<td>{$dados['qnt_pedida']}</td>";
                        echo "<td>{$dados['data_criacao']}</td>";
                        echo "<td><a href='#'><button type='button' class='btn btn-primary'>Editar</button></a><a href='DASHBOARD/FUNCOES/excluir.php?ref=" . $dados['idNPedido'] . "&tbl=nPedido'> <button type='button' class='btn btn-danger'>Excluir</button></a> </a> <a href='#'><button type='button' class='btn btn-warning'>Visualizar</button></a></td>";

                        echo "</tr>";
                    }

                    // Paginação
                    $selectAllQ = "SELECT COUNT(*) AS total FROM npedido";
                    $selectAllP = $cx->prepare($selectAllQ);
                    $selectAllP->execute();
                    $totalRegistros = $selectAllP->fetch()['total'];
                    $totalPaginas = ceil($totalRegistros / $limite);

                    echo "</tbody>";
                    echo "</table>";

                    echo "<nav aria-label='Page navigation example' class='navigation'>";
                    echo "<ul class='pagination'>";
                    if ($pagina > 1) {
                        echo "<li class='page-item'><a class='page-link' href='?page=compra_list&pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
                    }

                    for ($i = 1; $i <= $totalPaginas; $i++) {
                        $active = $i == $pagina ? "active" : "";
                        echo "<li class='page-item $active'><a class='page-link' href='?page=compra_list&pagina=$i'>$i</a></li>";
                    }

                    if ($pagina < $totalPaginas) {
                        echo "<li class='page-item'><a class='page-link' href='?page=compra_list&pagina=" . ($pagina + 1) . "'>Próximo</a></li>";
                    }
                    echo "</ul>";
                    echo "</nav>";
                }

                ?>
    </div>
</div>
</div>
</div>
<script>
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            var searchValue = document.getElementById('searchInput').value;

            window.location.href = "?page=compra_list" + "&search=" + encodeURIComponent(searchValue);
        }
    });
</script>