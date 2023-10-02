<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seus favoritos</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/favoritos.css">
    <link rel="shortcut icon" href="../../IMG/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
    <?php

    require_once '../../PAGINAS/PAGS-REP/header.php';

    ?>
    <main>
        <h1>Seus Favoritos</h1>
        <div class="fav-div">
            <div class="card mb-3" onclick="return trocapag(1)">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../IMG/abobrinha.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="nome-fechar">
                                <h5 class="card-title">Abobrinha Laminada</h5>
                                <i class="material-symbols-outlined">close</i>
                            </div>
                            <h6>R$1.90</h6>
                            <div class="info-vend">
                                <img src="../../IMG/vetor-guest.png" alt="">
                                <h6>Yuri Esteves</h6>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique cumque nobis possimus labore! Aliquam blanditiis non ea eos temporibus? Saepe atque facere doloribus id quia magni expedita enim minima dicta?</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" onclick="return trocapag(1)">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../IMG/Capsula-3-Coracoes-Cafe-Coado-Classic-10×75.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="nome-fechar">
                                <h5 class="card-title">Café em capsula 3 corações</h5>
                                <i class="material-symbols-outlined">close</i>
                            </div>
                            <h6>R$12.90</h6>
                            <div class="info-vend">
                                <img src="../../IMG/vetor-guest.png" alt="">
                                <h6>Nome do Vendedor</h6>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique cumque nobis possimus labore! Aliquam blanditiis non ea eos temporibus? Saepe atque facere doloribus id quia magni expedita enim minima dicta?</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-3" onclick="return trocapag(1)">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../IMG/ovo-Caipira.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="nome-fechar">
                                <h5 class="card-title">Ovo Caipira</h5>
                                <i class="material-symbols-outlined">close</i>
                            </div>
                            <h6>R$9.99</h6>
                            <div class="info-vend">
                                <img src="../../IMG/vetor-guest.png" alt="">
                                <h6>Nome do Vendedor</h6>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique cumque nobis possimus labore! Aliquam blanditiis non ea eos temporibus? Saepe atque facere doloribus id quia magni expedita enim minima dicta?</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" onclick="return trocapag(1)">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../IMG/Abacaxi--unidade-.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="nome-fechar">
                                <h5 class="card-title">Abacaxi Unidade</h5>
                                <i class="material-symbols-outlined">close</i>
                            </div>
                            <h6>R$5.99</h6>
                            <div class="info-vend">
                                <img src="../../IMG/vetor-guest.png" alt="">
                                <h6>Nome do Vendedor</h6>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique cumque nobis possimus labore! Aliquam blanditiis non ea eos temporibus? Saepe atque facere doloribus id quia magni expedita enim minima dicta?</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-3" onclick="return trocapag(1)">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../IMG/mel.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="nome-fechar">
                                <h5 class="card-title">Mel Silvestre</h5>
                                <i class="material-symbols-outlined">close</i>
                            </div>
                            <h6>R$9.99</h6>
                            <div class="info-vend">
                                <img src="../../IMG/vetor-guest.png" alt="">
                                <h6>Nome do Vendedor</h6>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique cumque nobis possimus labore! Aliquam blanditiis non ea eos temporibus? Saepe atque facere doloribus id quia magni expedita enim minima dicta?</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3" onclick="return trocapag(1)">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../../IMG/Geleia-Queensberry-Amora-320g.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="nome-fechar">
                                <h5 class="card-title">Geleia De Amora</h5>
                                <i class="material-symbols-outlined">close</i>
                            </div>
                            <h6>R$5.99</h6>
                            <div class="info-vend">
                                <img src="../../IMG/vetor-guest.png" alt="">
                                <h6>Nome do Vendedor</h6>
                            </div>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique cumque nobis possimus labore! Aliquam blanditiis non ea eos temporibus? Saepe atque facere doloribus id quia magni expedita enim minima dicta?</p>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

    </main>
    <?php 
    
    require_once '../PAGS-REP/footerVers1.php';

    ?>
</body>
<script src="../../JAVASCRIPT/GERAL/trocapag.js"></script>
</html>