<div class="conteudo" id="conteudo4"> <!-- ADICIONAR -->
    <div class="form-encl">
        <div class="inputs-encl">
            <?php

            $NdPAdd = $_REQUEST['NdPAdd'] ?? '';

            if ($NdPAdd == '1') {
                echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="GET">';
                echo "<ul class='nav nav-underline'>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link active' aria-current='page' href='?page=add_usu&NdPAdd=1'>Usuário</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link'>Residencia</a>";
                echo "</li>";
                echo "</ul>";

                echo '<input type="hidden" name="page" value="add_usu">';
                echo '<input type="hidden" name="NdPAdd" value="2">';

                echo "<div class='input'>";
                echo "<input type='text' required name='nomeInput' id='nomeInput' placeholder='Nome de usuário'>";
                echo "<input type='email' required name='emailInput' id='emailInput' placeholder='E-mail:'>";
                echo "</div>";

                echo "<div class='input'>";
                echo "<input type='password' required name='senhaInput' id='senhaInput' placeholder='Senha'>";
                echo "<input type='password' required name='senhaInput2' id='senhaInput2' placeholder='Repita a senha'>";
                echo "</div>";

                echo "<div class='input'>";
                echo "<input type='tel' required name='telefoneInput' id='telefoneInput' placeholder='Numero de telefone' minlength='14' maxlength='14' value='+55'>";
                echo "<select name='nivel' id='nivel'>";
                echo "<option value='C'>Cliente</option>";
                echo "<option value='A'>Administração</option>";
                // echo "<option value='F'>Vendedor</option>";
                echo "</select>";
                echo "</div>";

                echo "<div class='input'>";

                echo "<label for='premium'>Premium</label>";
                echo "<input type='checkbox' name='premium' id='premium'>";
                echo "</div>";


                echo "<div class='input'>";
                // echo "<label for='CPF'>CPF</label>";
                // echo "<input type='radio' required name='TCIR' id='CPF' onchange=\"atualizarPlaceholder('CPF')\" checked>";
                // echo "<label for='CNPJ'>CNPJ</label>";
                // echo "<input type='radio' required name='TCIR' id='CNPJ' onchange=\"atualizarPlaceholder('CNPJ')\">";
                echo "<select name='TCIR' id='TCIR'>";
                echo "<option value='CNPJ'>CNPJ</option>";
                echo "<option value='CPF'>CPF</option>";
                echo "</select>";
                echo "<input type='number' required name='NRCIR' id='NRCIR' placeholder='Insira seu CPF/CNPJ' maxlength='11' minlength='11'>";
                echo "</div>";

                echo "<div class='input'>";
                echo "<input type='submit' value='Avançar' name='avancar'>";

                echo "</div>";
                echo "</form>";
            } elseif ($NdPAdd == '2') {
                $nomeInput = $_REQUEST['nomeInput'] ?? '';
                $emailInput = $_REQUEST['emailInput'] ?? '';
                $senhaInput = $_REQUEST['senhaInput'] ?? '';
                $senhaInput2 = $_REQUEST['senhaInput2'] ?? '';
                $ativo = 1;
                
                $premium = $_REQUEST['premium'] ?? '';
                if ($premium == "") {
                    $premium = 0;
                } elseif ($premium == "on") {
                    $premium = 1;
                }
                $telefoneInput = $_REQUEST['telefoneInput'] ?? '';
                $nivel = $_REQUEST['nivel'] ?? '';
                $TCIR = $_REQUEST['TCIR'] ?? '';
                $NRCIR = $_REQUEST['NRCIR'] ?? '';

                // echo "nome: " . $nomeInput . "/email: " . $emailInput . "/senha: " . $senhaInput . "/senha2: " . $senhaInput2 . "/ativo: " . $ativo . "/premium: " . $premium . "/telefoneInput: " . $telefoneInput . "/nivel: " . $nivel . "/TCIR: " . $TCIR . "/NRCIR: " . $NRCIR;

                echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="GET">';
                echo '<input type="hidden" name="page" value="add_usu">';
                echo '<input type="hidden" name="NdPAdd" value="2">';
                echo '<input type="hidden" name="nomeInput" value="' . $nomeInput . '">';
                echo '<input type="hidden" name="emailInput" value="' . $emailInput . '">';
                echo '<input type="hidden" name="senhaInput" value="' . $senhaInput . '">';
                echo '<input type="hidden" name="senhaInput2" value="' . $senhaInput2 . '">';
                echo '<input type="hidden" name="ativo" value="' . $ativo . '">';
                echo '<input type="hidden" name="premium" value="' . $premium . '">';
                echo '<input type="hidden" name="telefoneInput" value="' . $telefoneInput . '">';
                echo '<input type="hidden" name="TCIR" value="' . $TCIR . '">';
                echo '<input type="hidden" name="NRCIR" value="' . $NRCIR . '">';
                echo '<input type="hidden" name="nivel" value="' . $nivel . '">';

                echo "<ul class='nav nav-underline'>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='?page=add_usu&NdPAdd=1'>Usuário</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link active' aria-current='page' href='?page=add_usu&NdPAdd=2'>Residência</a>";
                echo "</li>";
                echo "</ul>";

                echo "<div class='input'>";
                echo "<input type='text' required name='CEP' id='CEP' placeholder='CEP' minlength='8' maxlength='8'>";
                echo "</div>";

                echo "<div class='input'>";
                echo "<input type='text' required name='logradouro' id='logradouro' placeholder='Logradouro'>";
                echo "<select name='UF' id='UF'>";
                echo "<option value='RJ'>Rio de Janeiro</option>";
                echo "<option value='SP'>São Paulo</option>";
                echo "<option value='MG'>Minas Gerais</option>";
                echo "</select>";
                echo "</div>";

                echo "<div class='input'>";
                echo "<input type='text' required name='bairro' id='bairro' placeholder='Bairro'>";
                echo "<input type='text' required name='cidade' id='cidade' placeholder='Cidade'>";
                echo "</div>";

                echo "<div class='input'>";
                echo "<input type='number' required name='NR' id='NR' placeholder='Numero da residencia'>";
                echo "<input type='text' name='comp' id='comp' placeholder='Complemento'>";
                echo "</div>";

                echo "<div class='input'>";
                echo "<input type='submit' value='Cadastrar' name='cadastrar'>";
                echo "</div>";
                echo "</form>";

                if (isset($_REQUEST['cadastrar'])) {
                    $CEP = $_REQUEST['CEP'] ?? '';
                    $logradouro = $_REQUEST['logradouro'] ?? '';
                    $UF = $_REQUEST['UF'] ?? '';
                    $bairro = $_REQUEST['bairro'] ?? '';
                    $cidade = $_REQUEST['cidade'] ?? '';
                    $NR = $_REQUEST['NR'] ?? '';
                    $comp = $_REQUEST['comp'] ?? '';
                    $dataAtual = date('Y-m-d');

                    // echo "nome: " . $nomeInput . "/email: " . $emailInput . "/senha: " . $senhaInput . "/senha2: " . $senhaInput2 . "/ativo: " . $ativo . "/premium: " . $premium . "/telefoneInput: " . $telefoneInput . "/TCIR: " . $TCIR . "/NRCIR: " . $NRCIR . "/cep: " . $CEP . "/log: " . $logradouro . "/uf: " . $UF . "/bairro: " . $bairro . "/cidade: " . $cidade . "/nivel: " . $nivel;

                    $selectQ = "SELECT * FROM usuario WHERE NRCIR = :NRCIR";
                    $selectP = $cx->prepare($selectQ);
                    $selectP->bindValue(":NRCIR", $NRCIR, PDO::PARAM_INT);
                    $selectP->execute();
                    $total = $selectP->rowCount();

                    if ($total != 0) {
                        echo "<script>alert('CPF $NRCIR JA CADASTRADO')</script>";
                        echo "<script>window.location.href='../DASHBOARD/adminDash.php?page=usu_list&aviso=3'</script>";
                        // header("location: ../DASHBOARD/adminDash.php?page=usu_list&aviso=3");
                    } else {
                        if ($senhaInput == $senhaInput2) {

                            $selectQ2 = "SELECT * FROM localidade WHERE bairro = :bairro";
                            $selectP2 = $cx->prepare($selectQ2);
                            $selectP2->bindValue(':bairro', $bairro, PDO::PARAM_STR);
                            $selectP2->execute();
                            $total = $selectP2->rowCount();

                            if ($total == 0) {
                                try {

                                    $insertQ3 = "INSERT INTO localidade(idCep, logradouro, bairro, cidade, uf) VALUES ('$CEP', '$logradouro', '$bairro', '$cidade', '$UF')";
                                    $insertP3 = $cx->prepare($insertQ3);
                                    $insertP3->execute();

                                    $insertQ4 = "INSERT INTO usuario(nomeUsu, ativo, dataCriacao, emailUsu, TCIR, NRCIR, senhaUsu, telUsu, idCep, premium, NR, comp, nvl_usu) VALUES ('$nomeInput', '$ativo', '$dataAtual', '$emailInput', '$TCIR', '$NRCIR', '$senhaInput', '$telefoneInput', '$CEP', '$premium', '$NR', '$comp', '$nivel')";


                                    $insertP4 = $cx->prepare($insertQ4);
                                    $insertP4->execute();
                                    echo "<script>window.location.href='../DASHBOARD/adminDash.php?page=usu_list&aviso=4'</script>";
                                    // header("location: ../DASHBOARD/adminDash.php?page=usu_list&aviso=4");
                                    exit;
                                } catch (PDOException $e) {
                                    // $cx->rollback();
                                    throw $e;
                                    echo "<script>window.location.href='../DASHBOARD/adminDash.php?page=usu_list&aviso=3'</script>";
                                    echo "<script>alert('ERRO CATCH')</script>";
                                }
                            } else {
                                $lnu = $selectP2->fetch();
                                $idCep = $lnu['idCep'];
                                $insertQ4 = "INSERT INTO usuario(nomeUsu, ativo, dataCriacao, emailUsu, TCIR, NRCIR, senhaUsu, telUsu, idCep, premium, NR, comp, nvl_usu) VALUES ('$nomeInput', '$ativo', '$dataAtual', '$emailInput', '$TCIR', '$NRCIR', '$senhaInput', '$telefoneInput', '$idCep', '$premium', '$NR', '$comp', '$nivel')";

                                $insertP4 = $cx->prepare($insertQ4);
                                $insertP4->execute();
                                // header("location: ../DASHBOARD/adminDash.php?page=usu_list&aviso=4");
                                echo "<script>window.location.href='../DASHBOARD/adminDash.php?page=usu_list&aviso=4'</script>";
                                exit;
                            }
                        }
                    }
                }
            }



            ?>

        </div>
    </div>
</div>