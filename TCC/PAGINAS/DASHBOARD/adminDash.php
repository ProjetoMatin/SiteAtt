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

    $selectQ = "SELECT * FROM comprador";
    $selectP = $cx->prepare($selectQ);
    $selectP->setFetchMode(PDO::FETCH_ASSOC);
    $selectP->execute();
    $total = $selectP->rowCount();

    $selectQ2 = "SELECT * FROM vendedor";
    $selectP2 = $cx->prepare($selectQ2);
    $selectP2->setFetchMode(PDO::FETCH_ASSOC);
    $selectP2->execute();
    $total = $selectP2->rowCount();
    ?>

    <main>
        <div class="content" id="content1"> <!--DASHBOARD-->
            OI1
        </div>

        <div class="content" id="content2"> <!--VENDEDORES -->
            <div class="add_comp_encl">
                <h1>VENDEDORES</h1>
                <button class="btnAdd" onclick="return trocarCont('content6')"><a href="#" class="cardBtn">Adicionar</a></button>
            </div>
            <?php while ($dados2 = $selectP2->fetch()) {
                if ($total != 0) { ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $dados2['nome_vend'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Nome:</h6>
                            <p class="card-text"><?= $dados2['nome_vend'] ?></p>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Tel:</h6>
                            <p class="card-text"><?= $dados2['tel_vend'] ?></p>
                            <br>
                            <h6 class="card-subtitle mb-2 text-body-secondary">CNPJ:</h6>
                            <p class="card-text"><?= $dados2['CNPJ_vend'] ?></p>
                            <button class="btnEncl"><a href="#" class="cardBtn excluir">Excluir</a></button>
                            <button class="btnEncl"><a href="#" class="cardBtn editar">Editar</a></button>

                        </div>
                    </div>
            <?php } else {
                    echo "VAZIO";
                }
            } ?>
        </div>

        <div class="content" id="content3"> <!-- COMPRADORES -->
            <div class="add_comp_encl">
                <h1>COMPRADORES</h1>
                <button class="btnAdd" onclick="return trocarCont('content6')"><a href="#" class="cardBtn">Adicionar</a></button>
            </div>
            <?php while ($dados = $selectP->fetch()) { ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $dados['nome_comp'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Nome:</h6>
                        <p class="card-text"><?= $dados['nome_comp'] ?></p>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Tel:</h6>
                        <p class="card-text"><?= $dados['tel_comp'] ?></p>
                        <br>
                        <h6 class="card-subtitle mb-2 text-body-secondary">CPF:</h6>
                        <p class="card-text"><?= $dados['CPF_comp'] ?></p>
                        <button class="btnEncl"><a href="#" class="cardBtn excluir">Excluir</a></button>
                        <button class="btnEncl"><a href="#" class="cardBtn editar">Editar</a></button>

                    </div>
                </div>
            <?php } ?>
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