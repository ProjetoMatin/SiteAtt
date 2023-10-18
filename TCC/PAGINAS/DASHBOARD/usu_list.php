<div class="conteudo" id="conteudo2">
    <div class="top-cont">
        <h5>Usuarios</h5>
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Usuarios</mark></h6>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Usuários</h4>
        </div>

        <div class="pesq">
            <div class="input-group flex-nowrap">
                <input type="search" class="form-control" placeholder="Filtre por ID's, nome de usuário ou situação" aria-label="Search" aria-describedby="addon-wrapping">
            </div>
            <a href="?page=add_usu&NdPAdd=1"><button class="btnAdd" type="button">Adicionar</button></a>
        </div>

        <?php require_once '../AVISOS/avisos.php' ;?>

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

                $selectQ = "SELECT * FROM usuario ORDER BY idUsu";
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
                        echo "<td>{$dados['nomeUsu']}</td>";
                        if ($dados['ativo'] == 1) {
                            echo "<td class='txtVerde'>Ativo</td>";
                        } else {
                            echo "<td class='bloqueado'>Bloqueado</td>";
                        }
                        echo "<td>{$dados['NRCIR']} - {$dados['TCIR']}</td>";
                        echo "<td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>