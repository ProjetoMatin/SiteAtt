<div class="conteudo" id="conteudo5">
    <div class="form-encl">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="inputs-encl">

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
                    <input type="submit" value="Cadastrar" name="cadastrarLoc">
                </div>
            </div>
        </form>
    </div>
</div>