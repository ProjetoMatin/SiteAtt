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

    #conteudo4 {
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

    .inputDisabled {
        border: 1px solid var(--cinza02) !important;
    }
</style>

<?php 
$selectQ = "SELECT max(idCategoria) AS ultimo FROM categoria";
$selectP = $cx->prepare($selectQ);
$selectP->setFetchMode(PDO::FETCH_ASSOC);
$selectP->execute();
$dados = $selectP->fetch();
$proximo = $dados['ultimo'] + 1;

$idUsu = $_SESSION['idUsu'];

?>
<div class="conteudo" id="conteudo2">
    <div class="form-encl">
        <div class="inputs-encl">
            <form action="DASHBOARD/FUNCOES/addCategoriaFuncao.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idCategoria" value="<?php echo $proximo; ?>">
                <input type="hidden" name="idUsu" value="<?php echo $idUsu; ?>">
                <div class="input">
                    <input type="text" required name="Nome" id="Nome" placeholder="Nome da Categoria">
                </div>

                <div class="input">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="descricaoCat"></textarea>
                        <label for="floatingTextarea2">Descreva a categoria</label>
                    </div>
                </div>

                <div class="input">
                    <label for="fotos">Foto da categoria: </label>
                    <input type="file" name="fotos" id="fotos">
                </div>

                <div class="input">
                    <input type="submit" value="Cadastrar" name="cadastrar">
                </div>
            </form>
        </div>
    </div>
</div>