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

    .search-bar {
        margin: 20px 0 !important;
    }

    .search-bar input {
        margin-right: 10px !important;
    }
</style>

<?php

$selectQ = "SELECT max(idProduto) AS ultimo FROM produto";
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
            <form action="DASHBOARD/FUNCOES/addProdutoFuncao.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idProduto" value="<?php echo $proximo; ?>">
                <input type="hidden" name="idUsu" value="<?php echo $idUsu; ?>">
                <div class="input">
                    <input type="text" required name="Nome" id="Nome" placeholder="Nome do produto">
                </div>

                <div class="input">
                    <input type="number" required name="qntProd" id="qntProd" placeholder="Qnt. de Produtos">

                </div>

                <div class="input">
                    <input type="number" required name="preco" id="preco" placeholder="Preço" step="0.1">
                </div>

                <div class="input">
                    <label for="parcela">Parcela</label>
                    <input type="checkbox" name="parcela" id="parcela">

                    <label for="promocao">Promoção</label>
                    <input type="checkbox" name="promocao" id="promocao">

                    <input type="number" name="promocaoNumero" id="promocaoNumero" required value="0" placeholder="Insira a porcentagem de promoção" max="100">
                </div>

                <div class="input">
                    <?php

                    $selectQ = "SELECT * FROM categoria";
                    $selectP = $cx->prepare($selectQ);
                    $selectP->execute();

                    ?>
                    <select name="categoria" id="categoria">
                        <?php

                        while ($dados = $selectP->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?= $dados['idCategoria'] ?>"><?= $dados['nome_cat'] ?></option>

                        <?php
                        }

                        ?>
                    </select>
                </div>

                <div class="input">
                    <label for="fotos">Fotos do produto: </label>
                    <input type="file" name="fotos" id="fotos">
                </div>

                <div class="input">
                    <input type="submit" value="Cadastrar" name="cadastrar">
                </div>
            </form>
        </div>
        <?php

        if (isset($_REQUEST['cadastrar'])) {
            // echo "<script>alert('oi')</script>";
            $Nome = $_REQUEST['Nome'] ?? '';
            $qntProd = $_REQUEST['qntProd'] ?? '';
            $preco = $_REQUEST['preco'] ?? '';
            $dataProd = date('Y-m-d');

            $selectQ2 = "SELECT * FROM produto WHERE nomeProd = :nomeProd";
            $selectP2 = $cx->prepare($selectQ2);
            $selectP2->bindValue(':nomeProd', $Nome, PDO::PARAM_STR);
            $selectP2->execute();
            $total = $selectP2->rowCount();

            if ($total == 0) {
                $insertQ4 = "INSERT INTO pedido(data_pedido, situacao) VALUES ('$dataProd', 'DI')";
                $insertP4 = $cx->prepare($insertQ4);
                $insertP4->execute();

                $ultimoId = $cx->lastInsertId();

                $insertQ3 = "INSERT INTO produto(nomeProd, qntProd, dataProd, precoProd, idPed) VALUES ('$Nome', '$qntProd', '$dataProd', '$preco', '$ultimoId')";
                $insertP3 = $cx->prepare($insertQ3);
                $insertP3->execute();

                echo '<script>window.location.href = "../DASHBOARD/adminDash.php?page=prod_list&aviso=4";</script>';
                exit;
            }
        }

        ?>

    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const promocaoCheckbox = document.getElementById('promocao');
        const promocaoNumero = document.getElementById('promocaoNumero');

        // Inicialmente, esconde o campo promoçãoNumero
        promocaoNumero.style.display = 'none';

        // Adiciona um listener para o evento de mudança no checkbox
        promocaoCheckbox.addEventListener('change', function() {
            if (promocaoCheckbox.checked) {
                promocaoNumero.style.display = 'block';
            } else {
                promocaoNumero.style.display = 'none';
            }
        });
    });
</script>
