<div class="conteudo" id="conteudo3">
    <div class="top-cont">
        <h5>Produtos</h5>
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Localizações</mark></h6>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Produtos</h4>
        </div>

        <div class="pesq">
            <div class="input-group flex-nowrap">
                <input type="search" class="form-control" placeholder="Filtre por ID's, nome de usuário ou situação" aria-label="Search" aria-describedby="addon-wrapping">
            </div>
            <a href="?page=add_prod"><button class="btnAdd" type="button">Produtos</button></a>
        </div>

        <?php require_once '../AVISOS/avisos.php'; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $selectP = "SELECT pr.idProd, pr.nomeProd, pr.precoProd, pe.idPed, pe.situacao FROM produto pr INNER JOIN pedido pe ON pr.idPed = pe.idPed ORDER BY idProd DESC LIMIT 5";
                $selectP = $cx->prepare($selectP);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->execute();
                $total = $selectP->rowCount();

                if ($total == 0) {
                    echo "<p class='txtVermelho'>Não há registros no momento...</p>";
                } else {
                    while ($dados = $selectP->fetch()) {
                        echo "<tr>";
                        echo "<td scope='row'>{$dados['idPed']}</td>";
                        echo "<td>{$dados['nomeProd']}</td>";
                        if($dados['situacao'] == 'D'){
                            echo "<td class='txtVermelho'>Desistencia</td>";
                        }elseif ($dados['situacao'] == 'E'){
                            echo "<td class='txtAzul'>Em Processamento</td>";
                        }elseif ($dados['situacao'] == 'V'){
                            echo "<td class='txtVerde'>Vendido</td>";
                        }elseif ($dados['situacao'] == 'DI'){
                            echo "<td class='txtVerde'>Disponível</td>";
                        }
                        echo "<td>{$dados['precoProd']}</td>";
                        echo "<td><a href='#'>&#x1F4DD; Editar</a> <a href='excluir.php?ref={$dados['idProd']}&tbl=produto''>&#x274C; Apagar </a><a href='#'>&#x2714; Visualizar</a></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>