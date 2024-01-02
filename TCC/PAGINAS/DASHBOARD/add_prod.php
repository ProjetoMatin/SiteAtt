<?php require_once '../BANCO/abrirBanco.php'; ?>
<div class="conteudo" id="conteudo5">
    <div class="form-encl">
        <div class="inputs-encl">
            <form action="add_prod.php" method="get">
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