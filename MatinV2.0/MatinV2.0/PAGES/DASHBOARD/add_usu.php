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

    #conteudo4{
        padding: 30px;
    }

    .search-bar {
        margin: 20px 0 !important;
    }


    .inputs-encl .input {
        margin-top: 15px;
    }

    .inputs-encl .input input {
        width: 400px;
        padding: 10px;
        margin-right: 15px;
        font-size: 1em;
        border: 1px solid transparent;
        outline: none;
    }

    .inputs-encl .input input[type='file'] {
        padding: 0;
        margin: 5px 0;
    }

    .inputs-encl .input label {
        font-size: 1.2em;
    }

    .inputs-encl .input input[type='radio'],
    .inputs-encl .input input[type='checkbox'] {
        width: 20px;
        margin-right: 30px;
    }

    .inputs-encl .input input:focus {
        border-color: var(--laranja);
    }

    .inputs-encl h4 {
        margin-top: 15px;
    }

    .inputs-encl .input select {
        padding: 13px;
        margin-right: 15px;
        font-size: 1em;
    }

    .inputs-encl .input input[type='submit'],
    .inputs-encl .input input[type='button'] {
        background-color: var(--laranja00) !important;
        color: var(--branco00) !important;
        width: 200px;
        box-shadow: var(--sombra);
        transition: transform 0.1s ease;
        margin-bottom: 30px;
    }

    .inputs-encl .input input[type='submit']:active {
        transform: scale(0.9);
    }

    .nav-link {
        color: var(--preto) !important;
    }

    .nav-link:hover {
        color: var(--preto) !important;
        border-bottom: none !important;
    }

    td a {
        color: var(--preto) !important;
        /* text-decoration: underline; */
    }

    .inputDisabled{
        border: 1px solid var(--cinza02) !important;
    }
</style>

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
                echo "<input type='text' disabled class='inputDisabled' name='logradouro' id='logradouro' placeholder='Logradouro'>";
                echo "</div>";

                echo "<div class='input'>";
                echo "<input type='text' disabled class='inputDisabled' name='bairro' id='bairro' placeholder='Bairro'>";
                echo "<input type='text' disabled class='inputDisabled' name='cidade' id='cidade' placeholder='Cidade'>";
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
                
                    // Verifica se o CEP foi informado
                    if (!empty($CEP)) {
                        // Faz a requisição à API do ViaCEP
                        $url = "https://viacep.com.br/ws/$CEP/json/";
                
                        // Utilizando file_get_contents
                        $response = file_get_contents($url);
                        $cepData = json_decode($response, true);
                
                        // Verifica se a API retornou um erro
                        if (isset($cepData['erro']) && $cepData['erro'] === true) {
                            echo "<script>alert('CEP não encontrado.');</script>";
                        } else {
                            // Preenche os campos com os dados recebidos da API
                            $logradouro = $cepData['logradouro'];
                            $bairro = $cepData['bairro'];
                            $cidade = $cepData['localidade'];
                            $UF = $cepData['uf'];
                
                            // Continuar com o processamento dos outros dados e inserção no banco de dados
                            // Exemplo de código:
                            $nomeInput = $_REQUEST['nomeInput'] ?? '';
                            $emailInput = $_REQUEST['emailInput'] ?? '';
                            $senhaInput = $_REQUEST['senhaInput'] ?? '';
                            $senhaInput2 = $_REQUEST['senhaInput2'] ?? '';
                            $ativo = 1;
                            $premium = $_REQUEST['premium'] ?? '';
                            $premium = $premium == "on" ? 1 : 0;
                            $telefoneInput = $_REQUEST['telefoneInput'] ?? '';
                            $nivel = $_REQUEST['nivel'] ?? '';
                            $TCIR = $_REQUEST['TCIR'] ?? '';
                            $NRCIR = $_REQUEST['NRCIR'] ?? '';
                            $NR = $_REQUEST['NR'] ?? '';
                            $comp = $_REQUEST['comp'] ?? '';
                            $dataAtual = date('Y-m-d');

                            $selectQ = "SELECT * FROM local WHERE CEP = $CEP";
                            $selectP = $cx->prepare($selectQ);
                            $selectP->execute();
                            $total = $selectP->rowCount();

                            if($total == 0){
                                $insertQ = "INSERT INTO local(CEP, Logradouro, Bairro, Cidade, UF) VALUES ('$CEP', '$logradouro', '$bairro', '$cidade', '$UF')";
                                $insertP = $cx->prepare($insertQ);
                                $insertP->execute();
                            }

                            // Verifica se o CPF/CNPJ já está cadastrado
                            $selectQ = "SELECT * FROM usuario WHERE NRCIR = :NRCIR";
                            $selectP = $cx->prepare($selectQ);
                            $selectP->bindValue(":NRCIR", $NRCIR, PDO::PARAM_INT);
                            $selectP->execute();
                            $total = $selectP->rowCount();
                
                            if ($total != 0) {
                                echo "<script>alert('CPF $NRCIR já cadastrado.');</script>";
                                echo "<script>window.location.href='?page=usu_list'</script>";
                            } else {
                                if ($senhaInput == $senhaInput2) {
                                    // Insere os dados no banco de dados
                                    $insertQ4 = "INSERT INTO usuario(nome_usu, ativo, data_criacao, email_usu, TCIR, NRCIR, senha_usu, tel_usu, Local_CEP, premium, NR, comp, nvl_usu) 
                                                 VALUES (:nomeInput, :ativo, :dataAtual, :emailInput, :TCIR, :NRCIR, :senhaInput, :telefoneInput, :CEP, :premium, :NR, :comp, :nivel)";
                                    $insertP4 = $cx->prepare($insertQ4);
                                    $insertP4->bindValue(':nomeInput', $nomeInput);
                                    $insertP4->bindValue(':ativo', $ativo);
                                    $insertP4->bindValue(':dataAtual', $dataAtual);
                                    $insertP4->bindValue(':emailInput', $emailInput);
                                    $insertP4->bindValue(':TCIR', $TCIR);
                                    $insertP4->bindValue(':NRCIR', $NRCIR);
                                    $insertP4->bindValue(':senhaInput', $senhaInput);
                                    $insertP4->bindValue(':telefoneInput', $telefoneInput);
                                    $insertP4->bindValue(':CEP', $CEP);
                                    $insertP4->bindValue(':premium', $premium);
                                    $insertP4->bindValue(':NR', $NR);
                                    $insertP4->bindValue(':comp', $comp);
                                    $insertP4->bindValue(':nivel', $nivel);
                                    $insertP4->execute();
                
                                    echo "<script>window.location.href='page=usu_list'</script>";
                                } else {
                                    echo "<script>alert('As senhas não coincidem.');</script>";
                                }
                            }
                        }
                    } else {
                        echo "<script>alert('Por favor, insira um CEP.');</script>";
                    }
                }
                
            }



            ?>

        </div>
    </div>
</div>