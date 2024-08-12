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

    table tr td a button {
        background-color: var(--verde01);
        color: var(--branco00) !important;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .search-bar input {
        margin-right: 10px !important;
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
                    <input type="search" class="form-control" id="searchInput" placeholder="Filtre por ID's" aria-label="Search" aria-describedby="addon-wrapping" name="search">
                    <a href="?page=add_cat"><button type="button" class="btn btn-outline-success">Adicionar</button></a>
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
                        $selectQ = "SELECT * FROM produto WHERE idCategoria = $idCat AND (nome_prod LIKE '%$search%' OR idProduto LIKE '$search') LIMIT $inicio, $limite";
                    } else {
                        $selectQ = "SELECT * FROM produto WHERE idCategoria = $idCat LIMIT $inicio, $limite";
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
                echo "<li class='page-item'><a class='page-link' href='?page=cat_list&idCat=$idCat&&pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
            }

            for ($i = 1; $i <= $totalPaginas; $i++) {
                $active = $i == $pagina ? "active" : "";
                echo "<li class='page-item $active'><a class='page-link' href='?page=cat_list&idCat=$idCat&pagina=$i'>$i</a></li>";
            }

            if ($pagina < $totalPaginas) {
                echo "<li class='page-item'><a class='page-link' href='?page=cat_list&idCat=$idCat&pagina=" . ($pagina + 1) . "'>Próximo</a></li>";
            }
            echo "</ul>";
            echo "</nav>";

            ?>
        </div>
    </div>

<?php
} else {
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
                <input type="search" class="form-control" id="searchInput" placeholder="Filtre por ID's" aria-label="Search" aria-describedby="addon-wrapping" name="search">
                    <a href="?page=add_cat"><button type="button" class="btn btn-outline-success">Adicionar</button></a>
                </div>
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

                    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                    $limite = 4;
                    $inicio = ($pagina * $limite) - $limite;
                    $search = $_REQUEST['search'] ?? "";

                    if ($search) {
                        $selectQ = "SELECT * FROM categoria WHERE nome_cat LIKE '%$search%' OR idCategoria = '$search' LIMIT $inicio, $limite";
                    } else {
                        $selectQ = "SELECT * FROM categoria LIMIT $inicio, $limite";
                    }

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

            <?php

            $selectAllQ = "SELECT COUNT(*) AS total FROM usuario";
            $selectAllP = $cx->prepare($selectAllQ);
            $selectAllP->execute();
            $totalRegistros = $selectAllP->fetch()['total'];
            $totalPaginas = ceil($totalRegistros / $limite);

            echo "<nav aria-label='Page navigation example' class='navigation'>";
            echo "<ul class='pagination'>";
            if ($pagina > 1) {
                echo "<li class='page-item'><a class='page-link' href='?page=cat_list&idCat=geral&pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
            }

            for ($i = 1; $i <= $totalPaginas; $i++) {
                $active = $i == $pagina ? "active" : "";
                echo "<li class='page-item $active'><a class='page-link' href='?page=cat_list&idCat=geral&pagina=$i'>$i</a></li>";
            }

            if ($pagina < $totalPaginas) {
                echo "<li class='page-item'><a class='page-link' href='?page=cat_list&idCat=geral&pagina=" . ($pagina + 1) . "'>Próximo</a></li>";
            }
            echo "</ul>";
            echo "</nav>";

            ?>
        </div>
    </div>

<?php
}

?>

<script>
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Evita o comportamento padrão de submit do formulário
            var searchValue = document.getElementById('searchInput').value;
            var idCat = "<?php echo $idCat; ?>"; // Pega o valor de idCat do PHP

            // Redireciona para a página com o valor do search como parâmetro
            window.location.href = "?page=cat_list&idCat=" + idCat + "&search=" + encodeURIComponent(searchValue);
        }
    });
</script>