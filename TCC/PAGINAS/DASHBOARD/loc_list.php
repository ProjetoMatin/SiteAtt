<div class="conteudo" id="conteudo3">
    <div class="top-cont">
        <h5>Localizações</h5>
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
            <div class="input-group flex-nowrap">
                <input type="search" class="form-control" placeholder="Filtre por ID's, nome de usuário ou situação" aria-label="Search" aria-describedby="addon-wrapping">
            </div>
            <a href="?page=add_loc"><button class="btnAdd" type="button">Adicionar</button></a>
        </div>

        <?php require_once '../AVISOS/avisos.php' ;?>

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

                $selectQ = "SELECT * FROM localidade ORDER BY idCep";
                $selectP = $cx->prepare($selectQ);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->execute();
                $total = $selectP->rowCount();

                if ($total == 0) {
                    echo "<p class='txtVermelho'>Não há registros no momento...</p>";
                } else {
                    while ($dados = $selectP->fetch()) {
                        echo "<tr>";
                        echo "<td scope='row'>{$dados['idCep']}</td>";
                        echo "<td>{$dados['logradouro']}</td>";
                        echo "<td>{$dados['bairro']}</td>";
                        echo "<td>{$dados['cidade']}</td>";
                        echo "<td>{$dados['uf']}</td>";
                        echo "<td><a href='#'>&#x1F4DD; Editar</a> <a href='excluir.php?ref={$dados['idCep']}&tbl=localidade''>&#x274C; Apagar </a><a href='#'>&#x2714; Visualizar</a></td>";
                        echo "</tr>";
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</div>