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

    .search-bar input {
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

$selectUltimoId = "SELECT MAX(idUsu) AS ultimo FROM usuario";
$stmtUltimoId = $cx->prepare($selectUltimoId);
$stmtUltimoId->execute();
$dados = $stmtUltimoId->fetch(PDO::FETCH_ASSOC);


?>

<?php require_once '../BASE/alerts.php'; ?>
<div class="conteudo" id="conteudo2">
    <div class="top-cont">
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Usuarios</mark></h6>
            <?php $tituloRelatorio = "Gerenciamento de compras"; ?>
            <a href="RELATORIO/relatorio.php?tipoRelatorio=usuario&idUsu=<?= $idUsu ?>&recibo=<?= $dados['ultimo'] ?>&titulo=<?= $tituloRelatorio ?>" target="_blank"><button>Gerar Relatório</button></a>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Usuários</h4>
        </div>

        <div class="pesq">
            <div class="input-group flex-nowrap search-bar">
                <input type="search" class="form-control" id="searchInput" placeholder="Filtre por ID's ou Nomes de Usuário" aria-label="Search" aria-describedby="addon-wrapping" name="search">
                <a href="?page=add_usu&NdPAdd=1"><button type="button" class="btn btn-outline-success">Adicionar</button></a>
            </div>
            <a href="?page=add_usu&NdPAdd=1"><button class="btnAdd" type="button">Adicionar</button></a>
        </div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Situação</th>
                    <th scope="col">CPF/CNPJ</th>
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
                    $selectQ = "SELECT * FROM usuario WHERE nome_usu LIKE '%$search%' OR idUsu = '$search' ORDER BY idUsu LIMIT $inicio, $limite";
                }else{
                    $selectQ = "SELECT * FROM usuario ORDER BY idUsu LIMIT $inicio, $limite";
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
                        echo "<td scope='row'>{$dados['idUsu']}</td>";
                        echo "<td>{$dados['nome_usu']}</td>";
                        if ($dados['ativo'] == 1) {
                            echo "<td class='txtVerde'>Ativo</td>";
                        } else {
                            echo "<td class='txtVermelho'>Bloqueado</td>";
                        }
                        echo "<td>{$dados['NRCIR']} - {$dados['TCIR']}</td>";
                        echo "<td><a href='#'><button type='button' class='btn btn-primary'>Editar</button></a> <a href='DASHBOARD/FUNCOES/excluir.php?ref=" . $dados['idUsu'] . "&tbl=usuario'><button type='button' class='btn btn-danger'>Excluir</button></a> <a href='#'><button type='button' class='btn btn-warning'>Visualizar</button></a></td>";
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
            echo "<li class='page-item'><a class='page-link' href='?page=usu_list&pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
        }

        for ($i = 1; $i <= $totalPaginas; $i++) {
            $active = $i == $pagina ? "active" : "";
            echo "<li class='page-item $active'><a class='page-link' href='?page=usu_list&pagina=$i'>$i</a></li>";
        }

        if ($pagina < $totalPaginas) {
            echo "<li class='page-item'><a class='page-link' href='?page=usu_list&pagina=" . ($pagina + 1) . "'>Próximo</a></li>";
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

            window.location.href = "?page=usu_list" + "&search=" + encodeURIComponent(searchValue);
        }
    });
</script>