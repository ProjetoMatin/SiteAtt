<!DOCTYPE html>
<html lang="pt-br">
<!-- TERMINAR -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                if ($total != 0) {
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";

                    echo "<h5 class='card-title'>{$dados['nomeUsu']}</h5>";
                    echo "<h6 class='card-subtitle mb-2 text-body-secondary'>Nome:</h6>";
                    echo "<p class='card-text'>{$dados['nomeUsu']}</p>";
                    echo "<h6 class='card-subtitle mb-2 text-body-secondary'>Tel:</h6>";
                    echo "<p class='card-text'>{$dados['telUsu']}</p>";
                    echo "<br>";

                    if ($dados['TCIR'] == 'CNPJ') {
                        echo "<h6 class='card-subtitle mb-2 text-body-secondary'>CNPJ:</h6>";
                        echo "<p class='card-text'>{$dados['NRCIR']}</p>";
                    } else {
                        echo "<h6 class='card-subtitle mb-2 text-body-secondary'>CPF:</h6>";
                        echo "<p class='card-text'>{$dados['NRCIR']}</p>";
                    }

                    echo "<h6 class='card-subtitle mb-2 text-body-secondary'>Bairro:</h6>";
                    echo "<p class='card-text'>{$dados['bairro']}</p>";
                    echo "<button class='btnEncl'><a href='excluir.php?ref={$dados['idUsu']}&tbl=usuario' class='cardBtn excluir'>Excluir</a></button>";
                    echo "<button class='btnEncl'><a href='editar.php?ref={$dados['idUsu']}&tbl=usuario' class='cardBtn editar'>Editar</a></button>";
                    // MODAL LINK BOTAO
                    echo "<button class='btnEncl' onclick='return trocarCont(\'content8\')'>";
                    echo "<a href='#?ref={$dados['idUsu']}&tbl=usuario' class='cardBtn visualizar'>Visualizar</a>";
                    echo "</button>";

                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "VAZIO";
                }
            } ?>

        </div>

        <div class="content" id="content3"> <!-- Localidade -->
            <div class="add_comp_encl">
                <h1>LOCALIDADES</h1>
                <button class="btnAdd" onclick="return trocarCont('content7')"><a href="#" class="cardBtn">Adicionar</a></button>
            </div>

            <?php

            $selectQ2 = "SELECT * FROM localidade l";
            $selectP2 = $cx->prepare($selectQ2);
            $selectP2->setFetchMode(PDO::FETCH_ASSOC);
            $selectP2->execute();
            $total2 = $selectP2->rowCount();

            ?>

            <?php while ($dados = $selectP2->fetch()) {
                if ($total2 = 0) {
                    echo "Oi";
                } else {
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";

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
                    echo "<button class='btnEncl'><a href='editar.php?ref={$dados['idCep']}' class='cardBtn editar'>Editar</a></button>";
                    echo "<button class='btnEncl' onclick='return trocarCont(\'content8\')'>";
                    echo "<a href='#?ref={$dados['idCep']}&tbl=usuario' class='cardBtn visualizar'>Visualizar</a>";
                    echo "</button>";
                    echo "</div>";
                    echo "</div>";
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
                <h1>Adicionar</h1>
            </div>
            <div class="form-encl">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="inputs-encl">
                        <div class="input">
                            <input type="text" required name="nomeInput" id="nomeInput" placeholder="Nome de usuário">
                            <input type="email" required name="emailInput" id="emailInput" placeholder="E-mail:">
                        </div>

                        <div class="input">
                            <input type="password" required name="senhaInput" id="senhaInput" placeholder="Senha">
                            <input type="password" required name="senhaInput2" id="senhaInput2" placeholder="Repita a senha">
                        </div>

                        <div class="input">
                            <label for="ativo">Ativo</label>
                            <input type="checkbox" name="ativo" id="ativo">
                            <label for="premium">Premium</label>
                            <input type="checkbox" name="premium" id="premium">
                        </div>

                        <div class="input">
                            <input type="tel" required name="telefoneInput" id="telefoneInput" placeholder="Numero de telefone" minlength="14" maxlength="14" value="+55">
                            <select name="nivel" id="nivel">
                                <option value="C">Cliente</option>
                                <option value="A">Administração</option>
                                <option value="F">Funcionário</option>
                            </select>
                        </div>

                        <div class="input">
                            <label for="CPF">CPF</label>
                            <input type="radio" required name="TCIR" id="CPF" onchange="atualizarPlaceholder('CPF')" checked>
                            <label for="CNPJ">CNPJ</label>
                            <input type="radio" required name="TCIR" id="CNPJ" onchange="atualizarPlaceholder('CNPJ')">

                        </div>

                        <div class="input">
                            <script>
                                function atualizarPlaceholder(tipo) {
                                    var nrcirInput = document.getElementById('NRCIR');

                                    if (tipo === 'CPF') {
                                        nrcirInput.placeholder = 'Insira seu CPF';
                                    } else if (tipo === 'CNPJ') {
                                        nrcirInput.placeholder = 'Insira seu CNPJ';
                                    }
                                }
                            </script>
                            <input type="number" required name="NRCIR" id="NRCIR" placeholder="Insira seu CPF">
                        </div>

                        <div class="input">
                            <input type="file" name="fotoInput" id="fotoInput">
                        </div>

                        <h4>Residencia</h4>

                        <div class="input">
                            <input type="text" required name="CEP" id="CEP" placeholder="CEP">
                        </div>

                        <div class="input">
                            <input type="text" required name="logradouro" id="logradouro" placeholder="Logradouro">
                            <select name="UF" id="UF">
                                <option value="RJ">Rio de janeiro</option>
                                <option value="SP">São Paulo</option>
                                <option value="MG">Minas Gerais</option>
                            </select>
                        </div>

                        <div class="input">
                            <input type="text" required name="bairro" id="bairro" placeholder="Bairro">
                            <input type="text" required name="cidade" id="cidade" placeholder="Cidade">
                        </div>

                        <div class="input">
                            <input type="number" required name="NR" id="NR" placeholder="Numero da residencia">
                            <input type="text" name="comp" id="comp" placeholder="Complemento">
                        </div>

                        <div class="input">
                            <input type="submit" value="Cadastrar" name="cadastrar">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="content" id="content7"> <!-- ADICIONARBTN -->
            <div class="add_comp_encl">
                <h1>Adicionar</h1>
            </div>
            <div class="form-encl">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="inputs-encl">

                        <div class="input">
                            <input type="text" required name="CEP" id="CEP" placeholder="CEP">
                        </div>

                        <div class="input">
                            <input type="text" required name="logradouro" id="logradouro" placeholder="Logradouro">
                            <select name="UF" id="UF">
                                <option value="RJ">Rio de janeiro</option>
                                <option value="SP">São Paulo</option>
                                <option value="MG">Minas Gerais</option>
                            </select>
                        </div>

                        <div class="input">
                            <input type="text" required name="bairro" id="bairro" placeholder="Bairro">
                            <input type="text" required name="cidade" id="cidade" placeholder="Cidade">
                        </div>

                        <div class="input">
                            <input type="submit" value="Cadastrar" name="cadastrarLoc">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="content" id="content8">
            CU XERECA PEIDO BUNDA
        </div>

    </main>

    <?php

    if (isset($_REQUEST['cadastrar'])) {
        $nomeInput = $_REQUEST['nomeInput'] ?? '';
        $emailInput = $_REQUEST['emailInput'] ?? '';
        $senhaInput = $_REQUEST['senhaInput'] ?? '';
        $senhaInput2 = $_REQUEST['senhaInput2'] ?? '';
        $ativo = $_REQUEST['ativo'] ?? '';
        $premium = $_REQUEST['premium'] ?? '';
        $telefoneInput = $_REQUEST['telefoneInput'] ?? '';
        $fotoInput = $_REQUEST['fotoInput'] ?? '';
        $TCIR = $_REQUEST['TCIR'] ?? '';
        $NRCIR = $_REQUEST['NRCIR'] ?? '';
        $logradouro = $_REQUEST['logradouro'] ?? '';
        $UF = $_REQUEST['UF'] ?? '';
        $bairro = $_REQUEST['bairro'] ?? '';
        $cidade = $_REQUEST['cidade'] ?? '';
        $NR = $_REQUEST['NR'] ?? '';
        $comp = $_REQUEST['comp'] ?? '';
        $CEP = $_REQUEST['CEP'] ?? '';
        $dataAtual = date('Y-m-d');
        $nvl = $_REQUEST['nivel'];

        $selectQ = "SELECT * FROM usuario WHERE NRCIR = :NRCIR";
        $selectP = $cx->prepare($selectQ);
        $selectP->bindValue(":NRCIR", $NRCIR, PDO::PARAM_INT);
        $selectP->execute();
        $total = $selectP->rowCount();

        if ($total != 0) {
            echo "<script>alert('CPF $NRCIR JA CADASTRADO')</script>";
            die();
        } else {
            if ($senhaInput == $senhaInput2) {

                $selectQ2 = "SELECT * FROM localidade WHERE bairro = :bairro";
                $selectP2 = $cx->prepare($selectQ2);
                $selectP2->bindValue(':bairro', $bairro, PDO::PARAM_STR);
                $selectP2->execute();
                $total = $selectP2->rowCount();

                if ($total == 0) {
                    $insertQ3 = "INSERT INTO localidade(idCep, logradouro, bairro, cidade, uf) VALUES ('$CEP', '$logradouro', '$bairro', '$cidade', '$UF')";
                    $insertP3 = $cx->prepare($insertQ3);
                    $insertP3->execute();

                    $insertQ4 = "INSERT INTO usuario(nomeUsu, ativo, dataCriacao, emailUsu, TCIR, NRCIR, senhaUsu, telUsu, idCep , fotosUsu, premium, NR, comp, nvl_usu) VALUES ('$nomeInput', '$ativo', '$dataAtual', '$emailInput', '$TCIR', '$NRCIR', '$senhaInput', '$telefoneInput', '$CEP', '$fotoInput', '$premium', '$NR', '$comp', '$nvl')";

                    $insertP4 = $cx->prepare($insertQ4);
                    $insertP4->execute();

                    echo '<script>window.location.href = "../DASHBOARD/adminDash.php?valor=content2";</script>';
                    exit;
                } else {
                    $lnu = $selectP2->fetch();
                    $idCep = $lnu['idCep'];
                    $insertQ4 = "INSERT INTO usuario(nomeUsu, ativo, dataCriacao, emailUsu, TCIR, NRCIR, senhaUsu, telUsu, idCep , fotosUsu, premium, NR, comp) VALUES ('$nomeInput', '$ativo', '$dataAtual', '$emailInput', '$TCIR', '$NRCIR', '$senhaInput', '$telefoneInput', '$idCep', '$fotoInput', '$premium', '$NR', '$comp')";

                    $insertP4 = $cx->prepare($insertQ4);
                    $insertP4->execute();
                    echo '<script>window.location.href = "../DASHBOARD/adminDash.php?valor=content2";</script>';
                    exit;
                }
            }
        }
    }

    if (isset($_REQUEST['cadastrarLoc'])) {
        $CEP = $_REQUEST['CEP'] ?? '';
        $logradouro = $_REQUEST['logradouro'] ?? '';
        $UF = $_REQUEST['UF'] ?? '';
        $bairro = $_REQUEST['bairro'] ?? '';
        $cidade = $_REQUEST['cidade'] ?? '';

        $selectQ2 = "SELECT * FROM localidade WHERE bairro = :bairro";
        $selectP2 = $cx->prepare($selectQ2);
        $selectP2->bindValue(':bairro', $bairro, PDO::PARAM_STR);
        $selectP2->execute();
        $total = $selectP2->rowCount();

        if ($total == 0) {
            $insertQ3 = "INSERT INTO localidade(idCep, logradouro, bairro, cidade, uf) VALUES ('$CEP', '$logradouro', '$bairro', '$cidade', '$UF')";
            $insertP3 = $cx->prepare($insertQ3);
            $insertP3->execute();
            echo '<script>window.location.href = "../DASHBOARD/adminDash.php?valor=content2";</script>';
            exit;
        }
    }

    ?>

    <?php
    require_once '../PAGS-REP/footer-dash.php';
    require_once '../BANCO/fecharBanco.php';
    ?>
</body>
<script src="../../JAVASCRIPT/GERAL/DASHBOARD/sidebar-dash.js"></script>

</html>