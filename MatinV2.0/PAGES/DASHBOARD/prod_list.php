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

                $selectQ = "SELECT * FROM produto p INNER JOIN categoria c ON p.idCategoria = c.idCategoria INNER JOIN cria c2 ON c2.idProduto = p.idProduto WHERE c2.idUsu = $idUsu";
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
                        echo "<td><a href='#'>&#x1F4DD; Editar</a> <a href='excluir.php?ref={$dados['idProduto']}&tbl=localidade''>&#x274C; Apagar </a><a href='#'>&#x2714; Visualizar</a></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>