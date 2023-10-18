<div class="conteudo" id="conteudo4"> <!-- ADICIONAR -->
    <div class="form-encl">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="inputs-encl">
                <?php

                $NdPAdd = $_REQUEST['NdPAdd'] ?? '';
                if ($NdPAdd == '1') {
                    echo "<ul class='nav nav-underline'>";
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link active' aria-current='page' href='?page=add_usu&NdPAdd=1'>Usuário</a>";
                    echo "</li>";
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='?page=add_usu&NdPAdd=2'>Residencia</a>";
                    echo "</li>";
                    echo "</ul>";

                    echo "<div class='input'>";
                    echo "<input type='text' required name='nomeInput' id='nomeInput' placeholder='Nome de usuário'>";
                    echo "<input type='email' required name='emailInput' id='emailInput' placeholder='E-mail:'>";
                    echo "</div>";

                    echo "<div class='input'>";
                    echo "<input type='password' required name='senhaInput' id='senhaInput' placeholder='Senha'>";
                    echo "<input type='password' required name='senhaInput2' id='senhaInput2' placeholder='Repita a senha'>";
                    echo "</div>";

                    echo "<div class='input'>";
                    echo "<label for='ativo'>Ativo</label>";
                    echo "<input type='checkbox' name='ativo' id='ativo'>";
                    echo "<label for='premium'>Premium</label>";
                    echo "<input type='checkbox' name='premium' id='premium'>";
                    echo "</div>";

                    echo "<div class='input'>";
                    echo "<input type='tel' required name='telefoneInput' id='telefoneInput' placeholder='Numero de telefone' minlength='14' maxlength='14' value='+55'>";
                    echo "<select name='nivel' id='nivel'>";
                    echo "<option value='C'>Cliente</option>";
                    echo "<option value='A'>Administração</option>";
                    echo "<option value='F'>Funcionário</option>";
                    echo "</select>";
                    echo "</div>";

                    echo "<div class='input'>";
                    echo "<label for='CPF'>CPF</label>";
                    echo "<input type='radio' required name='TCIR' id='CPF' onchange=\"atualizarPlaceholder('CPF')\" checked>";
                    echo "<label for='CNPJ'>CNPJ</label>";
                    echo "<input type='radio' required name='TCIR' id='CNPJ' onchange=\"atualizarPlaceholder('CNPJ')\">";
                    echo "</div>";

                    echo "<div class='input'>";
                    echo "<script>";
                    echo "function atualizarPlaceholder(tipo) {";
                    echo "var nrcirInput = document.getElementById('NRCIR');";
                    echo "if (tipo === 'CPF') {";
                    echo "nrcirInput.placeholder = 'Insira seu CPF';";
                    echo "} else if (tipo === 'CNPJ') {";
                    echo "nrcirInput.placeholder = 'Insira seu CNPJ';";
                    echo "}";
                    echo "}";
                    echo "</script>";
                    echo "<input type='number' required name='NRCIR' id='NRCIR' placeholder='Insira seu CPF' maxlength='11' minlength='11'>";

                    echo "<div class='input'>";
                    echo "<a href='?page=add_usu&NdPAdd=2'><input type='button' value='Avançar' name='avancar'></a>";
                    echo "</div>";

                    echo "</div>";
                } elseif ($NdPAdd == '2') {
                    echo "<ul class='nav nav-underline'>";
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link' href='?page=add_usu&NdPAdd=1'>Usuário</a>";
                    echo "</li>";
                    echo "<li class='nav-item'>";
                    echo "<a class='nav-link active' aria-current='page' href='?page=add_usu&NdPAdd=2'>Residência</a>";
                    echo "</li>";
                    echo "</ul>";

                    echo "<h4>Residencia</h4>";

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
                }

                ?>

            </div>
        </form>
    </div>
</div>