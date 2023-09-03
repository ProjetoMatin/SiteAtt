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
        <div class="content" id="content1">
            OI1
        </div>

        <div class="content" id="content2">
            <h1>VENDEDORES</h1>
            <?php while ($dados2 = $selectP2->fetch()) { if($total != 0){?>
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
            <?php }else{echo"VAZIO";}} ?>
        </div>

        <div class="content" id="content3">
            <h1>COMPRADORES</h1>
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

        <div class="content" id="content4">
            OI4
        </div>

        <div class="content" id="content5">
            OI5
        </div>
    </main>

    <?php
    require_once '../PAGS-REP/footer-dash.php';
    require_once '../BANCO/fecharBanco.php';
    ?>
</body>

</html>