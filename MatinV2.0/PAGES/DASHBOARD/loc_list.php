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
</style>
<div class="conteudo" id="conteudo3">
    <div class="top-cont">
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Localizações</mark></h6>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de localizações</h4>
        </div>

        <div class="pesq">
            <div class="input-group flex-nowrap search-bar">
            <input type="search" class="form-control" id="searchInput" placeholder="Filtre por ID's ou Nomes de Usuário" aria-label="Search" aria-describedby="addon-wrapping" name="search">
            </div>
            <a href="?page=add_loc"><button class="btnAdd" type="button">Adicionar</button></a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Uf</th>
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
                    $selectQ = "SELECT * FROM local WHERE CEP LIKE '%$search%' OR Logradouro LIKE '%$search%' OR Bairro LIKE '%$search%' OR Cidade LIKE '%$search%' OR UF LIKE '%$search%' ORDER BY CEP LIMIT $inicio, $limite";
                }else{
                    $selectQ = "SELECT * FROM local ORDER BY CEP LIMIT $inicio, $limite";

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
                        echo "<td scope='row'>{$dados['CEP']}</td>";
                        echo "<td>{$dados['Logradouro']}</td>";
                        echo "<td>{$dados['Bairro']}</td>";
                        echo "<td>{$dados['Cidade']}</td>";
                        echo "<td>{$dados['UF']}</td>";
                        echo "<td><a href='#'><button type='button' class='btn btn-primary'>Editar</button></a> <a href='DASHBOARD/FUNCOES/excluir.php?ref=" . $dados['CEP'] . "&tbl=produto'><button type='button' class='btn btn-danger'>Excluir</button></a> <a href='#'><button type='button' class='btn btn-warning'>Visualizar</button></a></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </tbody>
        </table>

        <?php

        $selectAllQ = "SELECT COUNT(*) AS total FROM local";
        $selectAllP = $cx->prepare($selectAllQ);
        $selectAllP->execute();
        $totalRegistros = $selectAllP->fetch()['total'];
        $totalPaginas = ceil($totalRegistros / $limite);

        echo "<nav aria-label='Page navigation example' class='navigation'>";
        echo "<ul class='pagination'>";
        if ($pagina > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=loc_list&pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
        }

        for ($i = 1; $i <= $totalPaginas; $i++) {
            $active = $i == $pagina ? "active" : "";
            echo "<li class='page-item $active'><a class='page-link' href='?page=loc_list&pagina=$i'>$i</a></li>";
        }

        if ($pagina < $totalPaginas) {
            echo "<li class='page-item'><a class='page-link' href='?page=loc_list&pagina=" . ($pagina + 1) . "'>Próximo</a></li>";
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

            window.location.href = "?page=loc_list" + "&search=" + encodeURIComponent(searchValue);
        }
    });
</script>