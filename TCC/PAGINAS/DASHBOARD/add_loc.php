<?php require_once '../BANCO/abrirBanco.php';?>
<div class="conteudo" id="conteudo5">
    <div class="form-encl">
        <div class="inputs-encl">
            <form action="add_loc.php" method="get">

                <div class="input">
                    <input type="text" required name="CEP" id="CEP" placeholder="CEP" maxlength="8" minlength="8">
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
                    <input type="submit" value="Cadastrar" name="cadastrar">
                </div>
            </form>
        </div>
        <?php

        if (isset($_REQUEST['cadastrar'])) {
            // echo "<script>alert('oi')</script>";
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
                echo '<script>window.location.href = "../DASHBOARD/adminDash.php?page=loc_list&aviso=4";</script>';
                exit;
            }
        }

        ?>

    </div>
</div>