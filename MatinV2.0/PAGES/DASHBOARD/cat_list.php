<style>
    #conteudo3 {
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

    table tr td a button{
        background-color: var(--verde01);
        color: var(--branco00) !important;
        padding: 5px 10px;
        border-radius: 5px ;
    }
</style>

<?php

$idCat = $_REQUEST['idCat'] ?? "";

if (!isset($idCat) || empty($idCat)) {
    echo "<script>location.href='?page=dash_ini'</script>";
}

?>

<?php

if ($idCat != "geral") {
?>

    <div class="conteudo" id="conteudo3">
        <div class="top-cont">
            <div class="local">
                <?php

                $pagina = 1;

                $limite = 4;

                $inicio = ($pagina * $limite) - $limite;

                $selectQ = "SELECT * FROM categoria WHERE idCategoria = $idCat ORDER BY idCategoria LIMIT $inicio,$limite";
                $selectP = $cx->prepare($selectQ);
                $selectP->execute();

                $dado = $selectP->fetch(PDO::FETCH_ASSOC);

                ?>
                <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > Categorias > <mark><?php echo $dado['nome_cat'] ?></mark></h6>
            </div>
        </div>
        <div class="main-cont">
            <div class="main-tit">
                <img src="../../IMG/folder-preto.png" alt="">
                <h4>Lista de <?php echo $dado['nome_cat'] ?></h4>
            </div>

            <div class="pesq">
                <div class="input-group flex-nowrap search-bar">
                    <input type="search" class="form-control" placeholder="Filtre por ID's" aria-label="Search" aria-describedby="addon-wrapping">
                </div>
                <a href="?page=add_loc"><button class="btnAdd" type="button">Adicionar</button></a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nº</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Qnt Estoque</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Qnt. Vendas</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $selectQ = "SELECT * FROM produto WHERE idCategoria = $idCat";
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
                            echo "<td><a href='#'><button type='button' class='btn btn-primary'>Editar</button></a> <a href='#'><button type='button' class='btn btn-danger'>Excluir</button></a> <a href='#'><button type='button' class='btn btn-warning'>Visualizar</button></a></td>";
                            
                            echo "</tr>";
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
}else{
    ?>
<div class="conteudo" id="conteudo3">
    <div class="top-cont">
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> ><mark>Categorias</mark></h6>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Categorias</h4>
        </div>

        <div class="pesq">
            <div class="input-group flex-nowrap search-bar">
                <input type="search" class="form-control" placeholder="Filtre por ID's" aria-label="Search" aria-describedby="addon-wrapping">
            </div>
            <a href="?page=add_loc"><button class="btnAdd" type="button">Adicionar</button></a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Link_img</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Qnt. Visualizações</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $selectQ = "SELECT * FROM categoria";
                $selectP = $cx->prepare($selectQ);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->execute();
                $total = $selectP->rowCount();

                if ($total == 0) {
                    echo "<p class='txtVermelho'>Não há registros no momento...</p>";
                } else {
                    while ($dados = $selectP->fetch()) {
                        $descricao = (strlen($dados['desc_cat']) > 30) ? substr($dados['desc_cat'], 0, 30) . '...' : $dados['desc_cat'];
                        echo "<tr>";
                        echo "<td scope='row'>{$dados['idCategoria']}</td>";
                        echo "<td>{$dados['nome_cat']}</td>";
                        echo "<td>{$dados['img_cat']}</td>";
                        echo "<td>{$descricao}</td>";
                        echo "<td>{$dados['qnt_vis']}</td>";
                        echo "<td><a href='#'><button type='button' class='btn btn-primary'>Editar</button></a> <a href='#'><button type='button' class='btn btn-danger'>Excluir</button></a> <a href='#'><button type='button' class='btn btn-warning'>Visualizar</button></a></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>

    <?php 
}

?>