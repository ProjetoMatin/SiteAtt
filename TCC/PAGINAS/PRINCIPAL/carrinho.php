<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/carrinho.css">
</head>

<body>
    <?php

    require_once '../PAGS-REP/header.php';

    ?>

    <main>
        <div class="info-container">
            <div class="table-container">
                <table>
                    <tr>
                        <th id='th1'>Nome do Produto</th>
                        <th id='th2'>Quantidade</th>
                        <th id='th3'>Valor Unit</th>
                        <th id='th4'>Subtotal</th>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/patinho.png" alt="">
                                <p>Patinho Pedaço Bandeja</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="45,99">
                                <p class='precoNovo'>R$45,99</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="45,99">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/azeite.png" alt="">
                                <p>Azeite extra virgem</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="25,50">
                                <p class='precoNovo'>R$25,50</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="25,50">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/AF-mkp-Almondega-Bovi-1.025kg.png" alt="">
                                <p>Almondega Bovina</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="36,80">
                                <p class='precoNovo'>R$36,80</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="36,80">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/Pao-de-Queijo-Congelado-Tradicional-Forno-de-Minas-Pacote-400g-.png" alt="">
                                <p>Pão de queijo congelado</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="72,50">
                                <p class='precoNovo'>R$72,50</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="72,50">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/m-6ce57a4422a74fc28e3adc02def83eac.png" alt="">
                                <p>Ovo caipira organico</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="13,32">
                                <p class='precoNovo'>R$13,32</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="13,32">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/frutas-vermelhas.png" alt="">
                                <p>Frutas vermelhas</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="35,69">
                                <p class='precoNovo'>R$35,69</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="35,69">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/molho-pesto.png" alt="">
                                <p>Molho pesto organico</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="20,00">
                                <p class='precoNovo'>R$20,00</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="20,00">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/Ovo-de-Codorna-em-Conserva-Danimar-Vidro-300g.png" alt="">
                                <p>Ovo de codorna</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="69,49">
                                <p class='precoNovo'>R$69,49</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="69,49">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="info-table nome-foto">
                                <img src="../../IMG/granola-nova-stand-granola-tradicional-1000px.png" alt="">
                                <p>Granola nova tradicional</p>
                            </div>
                        </td>
                        <td>
                            <div class="info-table">

                                <input type="button" value="-" class="subtrair" onclick="return calcPreco('diminuir')">
                                <input type="number" name="qnt_prod" class="qnt_prod" readonly value="1" min='0'>
                                <input type="button" value="+" class="adicionar" onclick="return calcPreco('aumentar')">
                            </div>
                        </td>
                        <td>
                            <div class="precos">
                                <p class='precoAntigo'>De R$60,99</p>
                                <input type="hidden" name="precoNov" class="precoNov" value="10,15">
                                <p class='precoNovo'>R$10,15</p>
                            </div>
                        </td>
                        <td>
                            <input type="text" name="subtotal" class="subtotal" readonly value="10,15">
                        </td>
                    </tr>

                </table>


            </div>
            <div class="cupom">
                <input type="text" name="cupom-inp" id="cupom-inp" placeholder="Cupom de desconto">
                <input type="button" value="APLICAR CUPOM">
            </div>
        </div>

        <div class="resumo">
            <h1>RESUMO</h1>

            <p>Qtd de Produtos: <strong>10</strong></p>
            <p>Valor Unit. dos Produtos: <strong>R$375,43</strong></p>
            <p>Frete Total: <strong>R$10,00</strong></p>
            <p>Subtotal: <strong>R$3.187,35</strong></p>

            <input type="button" value="Ir para o pagamento" class='resBtn pagar'>
            <input type="button" value="Continuar comprando" class="resBtn continuarComp">
        </div>

    </main>

    <?php 
    
    require_once '../PAGS-REP/footerVers1.php';

    ?>

</body>
<script src="../../JAVASCRIPT/valorProd.js"></script>

</html>