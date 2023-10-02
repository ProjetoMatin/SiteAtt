<!DOCTYPE html>
<html lang="pt-br">
<!-- TERMINAR -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/DASHBOARD/adminDash.css">
</head>

<body>
    <?php
    require_once '../BANCO/abrirBanco.php';
    require_once '../PAGS-REP/header-dash.php';
    require_once '../PAGS-REP/sidebar-dash.php';

    ?>

    <main>
        <div class="content" id="content1"> <!--DASHBOARD-->
            OI1
        </div>

        <div class="content" id="content2"> <!--VENDEDORES -->

            <?php

            $selectQ = "SELECT u.idUsu, u.nomeUsu, u.ativo, u.dataCriacao, u.emailUsu, u.TCIR, u.NRCIR, u.senhaUsu, u.telUsu, u.idCep, u.fotosUsu, u.premium, u.NR, u.comp, l.bairro FROM usuario u INNER JOIN localidade l ON u.idCep = l.idCep";
            $selectP = $cx->prepare($selectQ);
            $selectP->setFetchMode(PDO::FETCH_ASSOC);
            $selectP->execute();
            $total = $selectP->rowCount();

            ?>
            <div class="add_comp_encl">
                <h1>VENDEDORES</h1>
                <button class="btnAdd" onclick="return trocarCont('content6')"><a href="#" class="cardBtn">Adicionar</a></button>
            </div>
            <?php while ($dados = $selectP->fetch()) {
                if ($total != 0) { ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $dados['nomeUsu'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Nome:</h6>
                            <p class="card-text"><?= $dados['nomeUsu'] ?></p>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Tel:</h6>
                            <p class="card-text"><?= $dados['telUsu'] ?></p>
                            <br>
                            <?php
                            if ($dados['TCIR'] == 'CNPJ') {
                                echo "<h6 class='card-subtitle mb-2 text-body-secondary'>CNPJ:</h6>";
                                echo "<p class='card-text'>{$dados['NRCIR']}</p>";
                            } else {
                                echo "<h6 class='card-subtitle mb-2 text-body-secondary'>CPF:</h6>";
                                echo "<p class='card-text'>{$dados['NRCIR']}</p>";
                            }
                            ?>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Logradouro:</h6>
                            <p class="card-text"><?= $dados['bairro'] ?></p>
                            <button class="btnEncl"><a href="excluir.php?ref=<?=$dados['idUsu']?>&tbl=usuario" class="cardBtn excluir">Excluir</a></button>
                            <button class="btnEncl"><a href="#" class="cardBtn editar">Editar</a></button>

                        </div>
                    </div>
            <?php } else {
                    echo "VAZIO";
                }
            } ?>
        </div>

        <div class="content" id="content3"> <!-- Localidade -->
            <div class="add_comp_encl">
                <h1>Localidades</h1>
                <button class="btnAdd" onclick="return trocarCont('content6')"><a href="#" class="cardBtn">Adicionar</a></button>
            </div>

            <?php

            $selectQ = "SELECT * FROM localidade l";
            $selectP = $cx->prepare($selectQ);
            $selectP->setFetchMode(PDO::FETCH_ASSOC);
            $selectP->execute();
            $total = $selectP->rowCount();

            ?>

            <?php while ($dados = $selectP->fetch()) {
                if ($total != 0) { ?>
                    <div class="card">
                        <div class="card-body">
                            <?php 
                            
                            echo "<h5 class='card-title'>{$dados['bairro']} - {$dados['cidade']}</h5>";
                            echo "<h6 class='card-subtitle mb-2 text-body-secondary'>Cep: </h6>";
                            echo "<p class='card-text'>{$dados['idCep']}</p>";
                            echo "<h6 class='card-subtitle mb-2 text-body-secondary'>Logradouro: </h6>";
                            echo "<p class='card-text'>{$dados['logradouro']}</p>";
                            echo "<br>";
                            echo "<h6 class='card-subtitle mb-2 text-body-secondary'>Logradouro: </h6>";
                            echo "<p class='card-text'>{$dados['bairro']}</p>";

                            echo "<h6 class='card-subtitle mb-2 text-body-secondary'>Uf: </h6>";
                            echo "<p class='card-text'>{$dados['uf']}</p>";
                            echo "<button class='btnEncl' onclick='return confirm('Deseja excluir?')'><a href='excluir.php?ref={$dados['idCep']}&tbl=localidade' class='cardBtn excluir'>Excluir</a></button>";
                            echo "<button class='btnEncl'><a href='#' class='cardBtn editar'>Editar</a></button>";
                            ?>

                        </div>
                    </div>
            <?php } else {
                    echo "VAZIO";
                }
            } ?>
        </div>

        <div class="content" id="content4"> <!-- PEDIDOS -->
            OI4
        </div>

        <div class="content" id="content5"> <!-- PAG. PEND. -->
            OI5
        </div>

        <div class="content" id="content6"> <!-- ADICIONARBTN -->
            <div class="add_comp_encl">
                <h1>ADICIONAR</h1>
            </div>
            <form action="#" method="get">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio1" value="option1" checked>
                    <label class="form-check-label" for="inlineRadio1">Vendedor</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">Comprador</label>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">$</span>
                    <input type="text" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Coloque seu E-mail" aria-label="Coloque seu E-mail" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@exemplo.com</span>
                </div>

                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="CNPJ" aria-label="CNPJ">
                    <span class="input-group-text">#</span>
                    <input type="number" class="form-control" placeholder="Telefone" aria-label="Telefone">
                </div>

                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="CEP" aria-label="CEP">
                    <span class="input-group-text">#</span>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Default checkbox
                        </label>

                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php
    require_once '../PAGS-REP/footer-dash.php';
    require_once '../BANCO/fecharBanco.php';
    ?>
</body>

</html>