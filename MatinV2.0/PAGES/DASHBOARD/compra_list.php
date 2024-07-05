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

    .local{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .local button{
        padding: 10px;
        background-color: var(--verde01);
        border-radius: 05px;
    }

    .local button a{
        color: var(--branco00);

    }
</style>
<div class="conteudo" id="conteudo2">
    <div class="top-cont">
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Compras</mark></h6>

            <button><a href="?page=relatorio">Gerar Relatório</a></button>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Produtos Comprados</h4>
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

                $selectQ = "SELECT np.*, p.*, uComprador.nome_usu AS nomeComprador, uComprador.email_usu AS emailComprador, uVendedor.nome_usu AS nomeVendedor, uVendedor.email_usu AS emailVendedor FROM 
                npedido np INNER JOIN produto p ON np.idProduto = p.idProduto INNER JOIN usuario uComprador ON np.idUsuComprador = uComprador.idUsu INNER JOIN usuario uVendedor ON np.idUsuVendedor = uVendedor.idUsu";

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
                        echo "<td>{$dados['nomeVendedor']}</td>";
                        echo "<td>{$dados['nomeComprador']}</td>";

                        if ($dados['situacao'] == 'CNR') {
                            echo "<td class='txtVermelho'>Desistência</td>";
                        } elseif ($dados['situacao'] == 'CF') {
                            echo "<td class='txtVerde'>Vendido</td>";
                        } elseif ($dados['situacao'] == 'A') {
                            echo "<td class='txtAzul'>Em Processamento</td>";
                        }elseif($dados['situacao'] == 'CA'){
                            echo "<td class='txtAzul'>Compra Em Andamento!</td>";
                        }

                        echo "<td>{$dados['qnt_pedida']}</td>";
                        echo "<td>{$dados['data_criacao']}</td>";
                        echo "<td><a href='#'>&#x1F4DD; Editar</a> <a href='excluir.php?ref={$dados['idProduto']}&tbl=localidade''>&#x274C; Apagar </a><a href='#'>&#x2714; Visualizar</a></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>