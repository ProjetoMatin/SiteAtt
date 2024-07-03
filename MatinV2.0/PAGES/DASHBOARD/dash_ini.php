<style>
    .container-main {
        padding: 30px 30px 0 30px !important;
    }

    mark {
        background-color: transparent !important;
        color: var(--verde02);
    }

    .card-encl .row .col-md-3 {
        padding: 0 !important;
    }

    h6 a {
        color: var(--preto);
        text-decoration: none;
    }

    .card-encl .row {
        margin: 0 !important;
        padding: 0 !important;
        display: flex;
        justify-content: space-between !important;
        align-items: center;
    }

    .card-encl .cardS {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 30px;
        background-color: var(--branco00);
        min-width: 300px;
        padding: 25px;
    }

    .card-encl .azul {
        border-bottom: 5px solid var(--azulClaro);
    }

    .card-encl .verde {
        border-bottom: 5px solid var(--verde02);
    }

    .card-encl .vermelho {
        border-bottom: 5px solid var(--vermelho00);
    }

    .card-encl .laranja {
        border-bottom: 5px solid var(--laranja01);
    }

    #fotocard {
        width: 45px;
    }

    .card-encl {
        display: flex;
        justify-content: space-evenly;
    }

    .card-encl .cardS .card-title h6 {
        font-weight: normal;
    }

    .card-encl .cardS .card-title .azulT {
        color: var(--azulClaro);
    }

    .card-encl .cardS .card-title .verdeT {
        color: var(--verde02);
    }

    .card-encl .cardS .card-title .vermelhoT {
        color: var(--vermelho00);
    }

    .card-encl .cardS .card-title .laranjaT {
        color: var(--laranja01);
    }

    .card-encl .cardS .card-title h4 {
        font-weight: normal;
    }

    .card-encl .cardS .card-foto img {
        width: 35px;
    }

    .listas {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-evenly;
    }

    .listUsu,
    .prodlist {
        width: 590px !important;
        margin-top: 30px;
        padding: 15px;
        background-color: var(--branco00);
        width: 45vw;
    }

    table {
        margin-top: 10px;
    }

    table tr th,
    table tr td {
        text-align: center;
    }

    .listUsu table tr th,
    .prodlist table tr th,
    .main-cont .table tr th {
        background-color: var(--cinza5);
        color: var(--branco);
        border-left: 3px solid var(--cinza5);
        border-right: 3px solid var(--cinza5);
    }

    .listUsu table tr,
    .prodlist table tr,
    .main-cont .table tr {
        border-left: 3px solid var(--cinza5);
        border-right: 3px solid var(--cinza5);
    }

    .listUsu table tr:last-child,
    .prodlist table tr:last-child,
    .main-cont .table tr:last-child {
        border-bottom: 3px solid var(--cinza5);

    }
    
    tbody, td, tfoot, th, thead, tr{
        border: none;
    }

    .txtVermelho {
        color: var(--vermelho) !important;
    }

    .txtVerde {
        color: var(--verdeescuroTabela3) !important;
    }

    .txtAzul {
        color: var(--azulClaro) !important;
    }
</style>

<?php
if ($idUsu == '1') {


?>

    <div class="container-main">
        <div class="info-tela">
            <div class="local">
                <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Inicio</mark></h6>
            </div>
        </div>
        <div class="card-encl">
            <div class="row">
                <div class="col-md-3">
                    <?php

                    $selectQ = "SELECT * FROM NPedido";
                    $selectP = $cx->prepare($selectQ);
                    $selectP->execute();
                    $RC = $selectP->rowCount();
                    ?>
                    <div class="cardS azul">
                        <div class="card-title">
                            <h6 class="azulT">Vendas Feitas</h6>
                            <h4><?php echo $RC ?></h4>
                        </div>
                        <div class="card-foto">
                            <img src="../IMAGES/down-arrow.png" alt="">
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cardS vermelho">
                        <?php

                        $selectQ = "SELECT * FROM usuario";
                        $selectP = $cx->prepare($selectQ);
                        $selectP->execute();
                        $total = $selectP->rowCount();

                        ?>
                        <div class="card-title">
                            <h6 class="vermelhoT">Usuarios Cadastrados</h6>
                            <?php echo "<h4>$total</h4>"; ?>
                        </div>
                        <div class="card-foto">
                            <img src="../IMAGES/folder.png" alt="">
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cardS verde">
                        <?php

                        $selectQ = "SELECT * FROM usuario WHERE premium = '1'";
                        $selectP = $cx->prepare($selectQ);
                        $selectP->execute();
                        $total = $selectP->rowCount();

                        ?>
                        <div class="card-title">
                            <h6 class="verdeT">Contas Premium</h6>
                            <?php echo "<h4>$total</h4>"; ?>
                        </div>
                        <div class="card-foto">
                            <img src="../IMAGES/coroaPremium.png" alt="" id="fotocard">
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <?php

                    $selectQ = "SELECT * FROM usuario_has_pergunta";
                    $selectP = $cx->prepare($selectQ);
                    $selectP->execute();
                    $total = $selectP->rowCount();

                    ?>
                    <div class="cardS laranja">
                        <div class="card-title">
                            <h6 class="laranjaT">Perguntas N.R</h6>
                            <h4><?php echo $total; ?></h4>
                        </div>
                        <div class="card-foto">
                            <img src="../IMAGES/question-sign.png" alt="">
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="listas">
            <div class="row" style="display: flex; justify-content: space-between !important; ">
                <div class="col-md-6">


                    <div class="listUsu">
                        <h5>Últimos Usuários Cadastrados</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">CNPJ/CPF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $selectP = "SELECT * FROM usuario ORDER BY idUsu DESC LIMIT 5";
                                $selectP = $cx->prepare($selectP);
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
                                        echo "</tr>";
                                    }
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="prodlist">
                        <h5>Últimos Produtos Comprados</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Pedido</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $selectP = "SELECT * from npedido n INNER JOIN produto p ON n.idProduto = p.idProduto ORDER BY n.idProduto DESC LIMIT 5";
                                $selectP = $cx->prepare($selectP);
                                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                                $selectP->execute();
                                $total = $selectP->rowCount();

                                if ($total == 0) {
                                    echo "<p class='txtVermelho'>Não há registros no momento...</p>";
                                } else {
                                    while ($dados = $selectP->fetch()) {
                                        echo "<tr>";
                                        echo "<td scope='row'>{$dados['idNPedido']}</td>";
                                        echo "<td>{$dados['nome_prod']}</td>";
                                        if ($dados['situacao'] == 'CNR') {
                                            echo "<td class='txtVermelho'>Desistência</td>";
                                        } elseif ($dados['situacao'] == 'CF') {
                                            echo "<td class='txtVerde'>Vendido</td>";
                                        } elseif ($dados['situacao'] == 'A') {
                                            echo "<td class='txtAzul'>Em Processamento</td>";
                                        }
                                        echo "<td>R$ {$dados['preco_prod']}</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>

    <div class="container-main">
        <div class="info-tela">
            <div class="local">
                <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Inicio</mark></h6>
            </div>
        </div>
        <div class="card-encl">
            <div class="row">
                <div class="col-md-3">
                    <?php

                    $selectQ = "SELECT * FROM seguidores WHERE idSeguido = $idUsu";
                    $selectP = $cx->prepare($selectQ);
                    $selectP->execute();
                    $RC = $selectP->rowCount();
                    ?>
                    <div class="cardS azul">
                        <div class="card-title">
                            <h6 class="azulT">Qnt Seguidores (Hoje)</h6>
                            <h4><?php echo $RC ?></h4>
                        </div>
                        <div class="card-foto">
                            <img src="../IMAGES/down-arrow.png" alt="">
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cardS vermelho">
                        <?php

                        $selectQ = "SELECT * FROM NPEdido WHERE idUsuVendedor = $idUsu AND situacao = 'CF'";
                        $selectP = $cx->prepare($selectQ);
                        $selectP->execute();
                        $total = $selectP->rowCount();

                        ?>
                        <div class="card-title">
                            <h6 class="vermelhoT">Vendas Feitas</h6>
                            <?php echo "<h4>$total</h4>"; ?>
                        </div>
                        <div class="card-foto">
                            <img src="../IMAGES/folder.png" alt="">
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="cardS verde">
                        <?php

                        $selectQ = "SELECT * FROM usuario WHERE idUsu = $idUsu";
                        $selectP = $cx->prepare($selectQ);
                        $selectP->execute();
                        $dados = $selectP->fetch(PDO::FETCH_ASSOC);

                        ?>
                        <div class="card-title">
                            <h6 class="verdeT">Contas Premium</h6>
                            <?php 
                            
                            if($dados['premium'] == '1'){
                                echo "<h4>Adquirido</h4>"; 

                            }else{
                                echo "<h4>Não adquirido</h4>"; 
                            }
                            ?>
                        </div>
                        <div class="card-foto">
                            <img src="../IMAGES/coroaPremium.png" alt="" id="fotocard">
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
                <div class="col-md-3">
                    <?php

                    $selectQ = "SELECT * FROM usuario_has_pergunta WHERE id_vendedor = $idUsu";
                    $selectP = $cx->prepare($selectQ);
                    $selectP->execute();
                    $total = $selectP->rowCount();

                    ?>
                    <div class="cardS laranja">
                        <div class="card-title">
                            <h6 class="laranjaT">Perguntas N.R</h6>
                            <h4><?php echo $total; ?></h4>
                        </div>
                        <div class="card-foto">
                            <img src="../IMAGES/question-sign.png" alt="">
                        </div>
                        <!-- <hr> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="listas">
            <div class="row" style="display: flex; justify-content: space-between !important; ">
                <div class="col-md-6">


                    <div class="listUsu">
                        <h5>Perguntas não respondidas</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Identificador</th>
                                    <th scope="col">Nome Usuario</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Data Pergunta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $selectP = "SELECT * FROM usuario_has_pergunta uhp INNER JOIN usuario u ON uhp.Usuario_idUsu = u.idUsu WHERE id_vendedor = $idUsu AND sitPerg = 'NR' LIMIT 5";
                                $selectP = $cx->prepare($selectP);
                                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                                $selectP->execute();
                                $total = $selectP->rowCount();

                                if ($total == 0) {
                                    echo "<p class='txtVermelho'>Não há registros no momento...</p>";
                                } else {
                                    while ($dados = $selectP->fetch()) {
                                        echo "<tr>";
                                        echo "<td scope='row'>{$dados['Pergunta_idPergunta']}</td>";
                                        echo "<td>{$dados['nome_usu']}</td>";
                                        if($dados['sitPerg'] == 'NR'){
                                            echo "<td>Não respondida</td>";
                                        }
                                        
                                        echo "<td>{$dados['dataPerg']}</td>";
                                        echo "</tr>";
                                    }
                                }


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="prodlist">
                        <h5>Últimos Produtos Comprados</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Pedido</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $selectP = "SELECT * from npedido n INNER JOIN produto p ON n.idProduto = p.idProduto WHERE n.idUsuVendedor = $idUsu ORDER BY n.idProduto DESC LIMIT 5";
                                $selectP = $cx->prepare($selectP);
                                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                                $selectP->execute();
                                $total = $selectP->rowCount();

                                if ($total == 0) {
                                    echo "<p class='txtVermelho'>Não há registros no momento...</p>";
                                } else {
                                    while ($dados = $selectP->fetch()) {
                                        echo "<tr>";
                                        echo "<td scope='row'>{$dados['idNPedido']}</td>";
                                        echo "<td>{$dados['nome_prod']}</td>";
                                        if ($dados['situacao'] == 'CNR') {
                                            echo "<td class='txtVermelho'>Desistência</td>";
                                        } elseif ($dados['situacao'] == 'CF') {
                                            echo "<td class='txtVerde'>Vendido</td>";
                                        } elseif ($dados['situacao'] == 'A') {
                                            echo "<td class='txtAzul'>Em Processamento</td>";
                                        }
                                        echo "<td>R$ {$dados['preco_prod']}</td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>