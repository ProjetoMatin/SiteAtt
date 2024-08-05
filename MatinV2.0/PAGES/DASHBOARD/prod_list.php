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
</style>
<div class="conteudo" id="conteudo2">
    <div class="top-cont">
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Produtos</mark></h6>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Produtos</h4>
        </div>

        <div class="pesq">
            <div class="input-group flex-nowrap search-bar">
                <input type="search" class="form-control" placeholder="Filtre por ID's, nome de usuário ou situação" aria-label="Search" aria-describedby="addon-wrapping">
            </div>
            <a href="?page=add_usu&NdPAdd=1"><button class="btnAdd" type="button">Adicionar</button></a>
        </div>

        <?php require_once '../BASE/alerts.php'; ?>

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

                if ($idUsu != 1) {

                    $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria INNER JOIN cria c2 ON c2.idProduto = p.idProduto WHERE c2.idUsu = $idUsu ORDER BY p.idProduto LIMIT $inicio, $limite";
                } else {
                    $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria INNER JOIN cria c2 ON c2.idProduto = p.idProduto LIMIT $inicio, $limite";
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
                        echo "<td>{$dados['data_criacao_prod']}</td>";
                        echo "<td>R$ {$dados['preco_prod']}</td>";
                        echo "<td>{$dados['qnt_vendas']}</td>";
                        echo "<td>{$dados['nome_cat']}</td>";
                        echo "<td><a href='#'><button type='button' class='btn btn-primary'>Editar</button></a> <a href='#'><button type='button' class='btn btn-danger'>Excluir</button></a> <a href='#'><button type='button' class='btn btn-warning'>Visualizar</button></a></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </tbody>
        </table>

        <?php 
        
        $selectAllQ = "SELECT COUNT(*) AS total FROM usuario";
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
            $active = $i == $pagina ? "active" : "";
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