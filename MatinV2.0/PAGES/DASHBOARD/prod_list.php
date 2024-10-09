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

    .search-bar input{
        margin-right: 10px !important;    
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
require_once '../BASE/alerts.php';

// Função para gerar o relatório e adicionar ao banco de dados
function gerarRelatorio($cx, $idUsu, $tituloRelatorio, $tipoRelatorio, $recibo)
{
    $sql = "INSERT INTO relatorios (idUsu, titulo, tipoRelatorio, recibo) VALUES (:idUsu, :titulo, :tipoRelatorio, :recibo)";
    $stmt = $cx->prepare($sql);
    $stmt->bindParam(':idUsu', $idUsu, PDO::PARAM_INT);
    $stmt->bindParam(':titulo', $tituloRelatorio, PDO::PARAM_STR);
    $stmt->bindParam(':tipoRelatorio', $tipoRelatorio, PDO::PARAM_STR);
    $stmt->bindParam(':recibo', $recibo, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return $cx->lastInsertId(); // Retorna o ID do relatório gerado
    } else {
        return false;
    }
}

// Obtém o ID do último produto para usar como "recibo" no relatório
$selectUltimoId = "SELECT MAX(idProduto) AS ultimo FROM produto";
$stmtUltimoId = $cx->prepare($selectUltimoId);
$stmtUltimoId->execute();
$dados = $stmtUltimoId->fetch(PDO::FETCH_ASSOC);

// Verifica se o botão "Gerar Relatório" foi clicado
if (isset($_GET['gerarRelatorio']) && $_GET['gerarRelatorio'] == 'true') {
    $idUsu = $_SESSION['idUsu']; // Pega o ID do usuário logado
    $tituloRelatorio = "Gerenciamento de compras";
    $tipoRelatorio = "produtos";
    $recibo = $dados['ultimo'];

    // Gera o relatório e insere no banco de dados
    $idRelatorio = gerarRelatorio($cx, $idUsu, $tituloRelatorio, $tipoRelatorio, $recibo);
    
    if ($idRelatorio) {
        echo "<script>window.open('RELATORIO/relatorio.php?idRelatorio=$idRelatorio', '_blank');</script>"; // Abre o relatório
        echo "<p class='alert-success'>Relatório gerado com sucesso e registrado no banco de dados.</p>";
    } else {
        echo "<p class='alert-danger'>Erro ao gerar o relatório.</p>";
    }
}

?>

<div class="conteudo" id="conteudo2">
    <div class="top-cont">
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Produtos</mark></h6>
            <?php $tituloRelatorio = "Gerenciamento de compras"; ?>
            <a href="?page=prod_list&gerarRelatorio=true" target="_blank"><button>Gerar Relatório</button></a>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Produtos</h4>
        </div>

        <div class="pesq">
            <div class="input-group flex-nowrap search-bar">
            <input type="search" class="form-control" id="searchInput" placeholder="Filtre por ID's ou Nomes de Produtos" aria-label="Search" aria-describedby="addon-wrapping" name="search">
                <a href="?page=add_prod"><button type="button" class="btn btn-outline-success">Adicionar</button></a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Qnt Estoque</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Qnt. Vendas</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                $limite = 4;
                $inicio = ($pagina * $limite) - $limite;

                $search = $_REQUEST['search'] ?? "";

                if($search){
                    if ($idUsu != 1) {
                        $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria INNER JOIN cria c2 ON c2.idProduto = p.idProduto WHERE c2.idUsu = $idUsu AND (p.nome_prod LIKE '%$search%' OR p.idProduto = '$search') ORDER BY p.idProduto LIMIT $inicio, $limite";
                    } else {
                        $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria WHERE p.nome_prod LIKE '%$search%' OR p.idProduto LIKE '$search' ORDER BY idProduto LIMIT $inicio, $limite";
                    }
                }else{
                    if ($idUsu != 1) {
                        $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria INNER JOIN cria c2 ON c2.idProduto = p.idProduto WHERE c2.idUsu = $idUsu ORDER BY p.idProduto LIMIT $inicio, $limite";
                    } else {
                        $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria ORDER BY idProduto LIMIT $inicio, $limite";
                    }
                    
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
                        echo "<td scope='row'>{$dados['idProduto']}</td>";
                        echo "<td>{$dados['nome_prod']}</td>";
                        echo "<td>{$dados['qnt_prod_estoque']}</td>";
                        echo "<td>R$ {$dados['preco_prod']}</td>";
                        echo "<td>{$dados['qnt_vendas']}</td>";
                        echo "<td>{$dados['nome_cat']}</td>";
                        echo "<td><a href='#'><button type='button' class='btn btn-primary'>Editar</button></a> <a href='DASHBOARD/FUNCOES/excluir.php?ref=" . $dados['idProduto'] . "&tbl=produto'><button type='button' class='btn btn-danger'>Excluir</button></a> <a href='../index.php?page=produto&idProd=" . $dados['idProduto'] . "''><button type='button' class='btn btn-warning'>Visualizar</button></a></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </tbody>
        </table>

        <?php 
        
        $selectAllQ = "SELECT COUNT(*) AS total FROM produto";
        $selectAllP = $cx->prepare($selectAllQ);
        $selectAllP->execute();
        $totalRegistros = $selectAllP->fetch()['total'];
        $totalPaginas = ceil($totalRegistros / $limite);

        echo "<nav aria-label='Page navigation example' class='navigation'>";
        echo "<ul class='pagination'>";
        if ($pagina > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=prod_list&pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
        }

        for ($i = 1; $i <= $totalPaginas; $i++) {
            $active = $i    == $pagina ? "active" : "";
            echo "<li class='page-item $active'><a class='page-link' href='?page=prod_list&pagina=$i'>$i</a></li>";
        }

        if ($pagina < $totalPaginas) {
            echo "<li class='page-item'><a class='page-link' href='?page=prod_list&pagina=" . ($pagina + 1) . "'>Próximo</a></li>";
        }
        echo "</ul>";
        echo "</nav>";

        
        ?>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            var searchValue = document.getElementById('searchInput').value;

            window.location.href = "?page=prod_list" + "&search=" + encodeURIComponent(searchValue);
        }
    });
</script>