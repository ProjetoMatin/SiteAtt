<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" conteudo="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="shortcut icon" href="../../IMG/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/DASHBOARD/dashboard.css">
</head>

<body>
    <div class="conteiner">

        <?php

        require_once '../PAGS-REP/sidebar-dash.php';

        ?>

        <div class="cont-right">
            <?php
            require_once '../PAGS-REP/header-dash.php';

            ?>

            <main>
                <div class="conteudo" id="conteudo1">
                    <div class="info-tela">
                        <h5>Painel</h5>
                        <div class="local">
                            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Inicio</mark></h6>
                        </div>
                    </div>
                    <div class="card-encl">
                        <div class="cardS azul">
                            <div class="card-title">
                                <h6 class="azulT">Vendas Feitas</h6>
                                <h4>40</h4>
                            </div>
                            <div class="card-foto">
                                <img src="../../IMG/down-arrow.png" alt="">
                            </div>
                            <!-- <hr> -->
                        </div>
                        <div class="cardS vermelho">
                            <div class="card-title">
                                <h6 class="vermelhoT">Usuarios Cadastrados</h6>
                                <h4>40</h4>
                            </div>
                            <div class="card-foto">
                                <img src="../../IMG/folder.png" alt="">
                            </div>
                            <!-- <hr> -->
                        </div>
                        <div class="cardS verde">
                            <div class="card-title">
                                <h6 class="verdeT">Contas Premium</h6>
                                <h4>40</h4>
                            </div>
                            <div class="card-foto">
                                <img src="../../IMG/coroaPremium.png" alt="" id="fotocard">
                            </div>
                            <!-- <hr> -->
                        </div>
                        <div class="cardS laranja">
                            <div class="card-title">
                                <h6 class="laranjaT">Perguntas N.R</h6>
                                <h4>40</h4>
                            </div>
                            <div class="card-foto">
                                <img src="../../IMG/question-sign.png" alt="">
                            </div>
                            <!-- <hr> -->
                        </div>
                    </div>
                    <div class="listas">
                        <div class="listUsu">
                            <h5>Últimos Usuários Cadastrados</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nº</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col">CNPJ/CPF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Mark Otto</td>
                                        <td class="ativo">Ativo</td>
                                        <td>19234019023</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">2</td>
                                        <td>Jacob Thornton</td>
                                        <td class="ativo">Ativo</td>
                                        <td>19542049014</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">3</td>
                                        <td>Larry Marcus</td>
                                        <td class="bloqueado">Bloqueado</td>
                                        <td>19234102932</td>
                                    </tr>

                                    <tr>
                                        <td scope="row">3</td>
                                        <td>Davis De Freitas</td>
                                        <td class="ativo">Ativo</td>
                                        <td>11932059012</td>
                                    </tr>

                                    <tr>
                                        <td scope="row">3</td>
                                        <td>Marcos Paulo</td>
                                        <td class="bloqueado">Bloqueado</td>
                                        <td>19240290123</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="prodlist">
                            <h5>Últimos Produtos Comprados</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nº</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col">Preço</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Banana Prata</td>
                                        <td class="emProc">Em processamento</td>
                                        <td>R$20,90</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">2</td>
                                        <td>Maracujá</td>
                                        <td class="emProc">Em processamento</td>
                                        <td>R$15,20</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">3</td>
                                        <td>Maçã</td>
                                        <td class="Desistencia">Desistencia</td>
                                        <td>R$10,00</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">4</td>
                                        <td>Kiwí</td>
                                        <td class="Desistencia">Desistencia</td>
                                        <td>R$10,00</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">5</td>
                                        <td>Manga</td>
                                        <td class="Desistencia">Desistencia</td>
                                        <td>R$10,00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="conteudo" id="conteudo2">
                    <div class="top-cont">
                        <h5>Usuarios</h5>
                        <div class="local">
                            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Usuarios</mark></h6>
                        </div>
                    </div>
                    <div class="main-cont">
                        <div class="main-tit">
                            <img src="../../IMG/folder-preto.png" alt="">
                            <h4>Lista de Usuários</h4>
                        </div>

                        <div class="pesq">
                            <div class="input-group flex-nowrap">
                                <input type="search" class="form-control" placeholder="Filtre por ID's, nome de usuário ou situação" aria-label="Search" aria-describedby="addon-wrapping">
                            </div>
                            <button class="btnAdd" type="button" onclick="return mostrarConteudo(4)">Adicionar</button>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">CPF/CNPJ</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Osiris Iuri</td>
                                    <td class="ativo">Ativo</td>
                                    <td>19231284023</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                                <tr>
                                    <td scope="row">2</td>
                                    <td>Carlos Augusto</td>
                                    <td class="ativo">Ativo</td>
                                    <td>192301923586</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                                <tr>
                                    <td scope="row">3</td>
                                    <td>Davis De Freitas</td>
                                    <td class="ativo">Ativo</td>
                                    <td>12496019285</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                                <tr>
                                    <td scope="row">4</td>
                                    <td>Yuri Esteves</td>
                                    <td class="bloqueado">Bloqueado</td>
                                    <td>19452501923</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                                <tr>
                                    <td scope="row">5</td>
                                    <td>Lucas Barboza</td>
                                    <td class="ativo">Ativo</td>
                                    <td>10618920921</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="conteudo" id="conteudo3">
                    <div class="top-cont">
                        <h5>Localizações</h5>
                        <div class="local">
                            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Localizações</mark></h6>
                        </div>
                    </div>
                    <div class="main-cont">
                        <div class="main-tit">
                            <img src="../../IMG/folder-preto.png" alt="">
                            <h4>Lista de localizações</h4>
                        </div>

                        <div class="pesq">
                            <div class="input-group flex-nowrap">
                                <input type="search" class="form-control" placeholder="Filtre por ID's, nome de usuário ou situação" aria-label="Search" aria-describedby="addon-wrapping">
                            </div>
                            <button class="btnAdd" type="button" onclick="return mostrarConteudo(4)">Adicionar</button>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Logradouro</th>
                                    <th scope="col">Bairro</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Uf</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>Rua 1</td>
                                    <td>Estácio</td>
                                    <td>Rio de Janeiro</td>
                                    <td>RJ</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                                <tr>
                                    <td scope="row">2</td>
                                    <td>Rua 2</td>
                                    <td>Estácio</td>
                                    <td>Rio De Janeiro</td>
                                    <td>RJ</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                                <tr>
                                    <td scope="row">3</td>
                                    <td>Rua 3</td>
                                    <td>Estácio</td>
                                    <td>Rio de Janeiro</td>
                                    <td>RJ</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                                <tr>
                                    <td scope="row">4</td>
                                    <td>Rua dos Franceses</td>
                                    <td>São Paulo</td>
                                    <td>Bela Vista</td>
                                    <td>SP</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                                <tr>
                                    <td scope="row">5</td>
                                    <td>Rua 5</td>
                                    <td>Estácio</td>
                                    <td>Rio de Janeiro</td>
                                    <td>RJ</td>
                                    <td>&#x1F4DD; Editar &#x274C; Apagar &#x2714; Visualizar</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php require_once '../PAGS-REP/footer-dash.php'; ?>
</body>
<script src="../../JAVASCRIPT/GERAL/DASHBOARD/sidebar-dash.js"></script>

</html>