<style>
    h6,
    h5 {
        margin: 0 !important;
    }

    li {
        list-style: none;
    }

    .sidebar {
        background-color: var(--pretoAzulado);
        padding-bottom: 20px;
        height: 105vh;
    }

    #offcanvasScrollingLabel {
        color: var(--branco00);
    }

    .sidebar button {
        display: block;
        margin: auto;
        margin-top: 20px;
    }

    .dropend .dropdown-toggle::after {
        display: none;
    }

    .btn-group,
    .btn-group-vertical {
        display: block;
    }

    .offcanvas,
    .offcanvas-lg,
    .offcanvas-md,
    .offcanvas-sm,
    .offcanvas-xl,
    .offcanvas-xxl {
        background-color: var(--pretoAzulado) !important;
        --bs-offcanvas-width: 250px !important;
        transform: translateX(-100%);
        opacity: 0;
        transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
    }

    .offcanvas.show {
        transform: translateX(0);
        opacity: 1;
    }

    .offcanvas h6 {
        color: var(--branco00);
    }

    img {
        width: 25px;
    }

    .close {
        margin: 0 !important;
    }

    .btnoffcanvas {
        margin-top: 20px;
    }

    .btnoffcanvas .doffcanvas {
        display: flex;
        align-items: center;
        margin: 0;
    }

    .btnoffcanvas .doffcanvas h6 {
        margin-left: 15px !important;
    }

    .offcanvas-body li .icon-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sidebar.close .nav-links li .icon-link {
        display: block;
    }

    .offcanvas-body li .icon-link i {
        height: 50px;
        min-width: 78px;
        text-align: center;
        line-height: 50px;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .offcanvas-body li .sub-menu {
        padding-left: 50px;
        margin-top: -10px;
        background: var(--pretoAzulado);
        display: none;
    }

    .offcanvas-body li.showMenu .sub-menu {
        display: block;
    }

    .offcanvas-body li .sub-menu a {
        color: #fff;
        font-size: 15px;
        padding: 5px 0;
        white-space: nowrap;
        opacity: 0.6;
        transition: all 0.3s ease;
    }

    .offcanvas-body li .sub-menu a:hover {
        opacity: 1;
    }

    .sidebar.close .nav-links li .sub-menu {
        position: absolute;
        left: 100%;
        top: -10px;
        margin-top: 0;
        padding: 10px 20px;
        border-radius: 0 6px 6px 0;
        opacity: 0;
        display: block;
        pointer-events: none;
        transition: 0s;
    }

    .sidebar.close .nav-links li:hover .sub-menu {
        top: 0;
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
    }

    .sidebar .nav-links li .sub-menu .link_name {
        display: none;
    }

    .sidebar.close .nav-links li .sub-menu .link_name {
        font-size: 18px;
        opacity: 1;
        display: block;
    }
</style>

<?php

if ($idUsu == '1') {
?>

    <div class="sidebar">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="../IMAGES/botao-de-menu.png" alt=""></button>

        <a href="?page=dash_ini"><button class="btn" type="button"><img src="../IMAGES/computador-portatil.png" alt=""></button></a>

        <a href="?page=usu_list"><button class="btn" type="button"><img src="../IMAGES/grupo-de-usuarios.png" alt=""></button></a>

        <a href="?page=prod_list"><button class="btn" type="button"><img src="../IMAGES/caixa.png" alt=""></button></a>

        <a href="?page=compra_list"><button class="btn" type="button"><img src="../IMAGES/compra.png" alt=""></button></a>

        <a href="?page=loc_list"><button class="btn" type="button"><img src="../IMAGES/local.png" alt=""></button></a>

        <a href="?page=rel_list"><button class="btn" type="button"><img src="../IMAGES/relatorio.png" alt=""></button></a>

        

        <div class="btnoffcanvas">
            <div class="btn-group dropend">
                <button type="button" class="btn btn-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../IMAGES/categorias.png" alt="">
                </button>

               <ul class="dropdown-menu">
               <li><a class='dropdown-item' href='?page=cat_list&idCat=geral'>Geral</a></li>
                <?php 
                
                $selectQ = "SELECT * FROM categoria";
                $selectP = $cx->prepare($selectQ);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->execute();

                while($dados = $selectP->fetch()){
                    echo "<li><a class='dropdown-item' href='?page=cat_list&idCat=" . $dados['idCategoria'] . "'>" . $dados['nome_cat'] . "</a></li>";
                }
                
                ?>
                </ul>
            </div>
        </div>

        <a href="?sair=true"><button class="btn" type="button"><img src="../IMAGES/sair.png" alt=""></button></a>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h5>
                <button type="button" class="btn close" data-bs-dismiss="offcanvas" aria-label="Close"><img src="../IMAGES/close.png" alt=""></button>
            </div>

            <div class="offcanvas-body">
                <div class="btnoffcanvas">
                    <a href="?page=dash_ini">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/computador-portatil.png" alt="">
                            <h6>Inicio</h6>
                        </button>
                    </a>
                </div>

                <div class="btnoffcanvas">
                    <a href="?page=usu_list">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/grupo-de-usuarios.png" alt="">
                            <h6>Usuarios</h6>
                        </button>
                    </a>
                </div>

                <div class="btnoffcanvas">
                    <a href="?page=prod_list">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/caixa.png" alt="">
                            <h6>Produtos</h6>
                        </button>
                    </a>
                </div>

                <div class="btnoffcanvas">
                    <a href="?page=compra_list">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/compra.png" alt="">
                            <h6>Compras</h6>
                        </button>
                    </a>
                </div>

                <div class="btnoffcanvas">
                    <a href="?page=loc_list">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/local.png" alt="">
                            <h6>Localizações</h6>
                        </button>
                    </a>
                </div>

                <li>

                    <div class="btnoffcanvas">
                        <a href="#" class="arrow">
                            <button class="btn doffcanvas" type="button"><img src="../IMAGES/categorias.png" alt="">
                                <h6>Categorias</h6>
                            </button>
                        </a>
                    </div>

                    <ul class="sub-menu">
                    <?php 
                        
                        $selectQ = "SELECT * FROM categoria";
                        $selectP = $cx->prepare($selectQ);
                        $selectP->setFetchMode(PDO::FETCH_ASSOC);
                        $selectP->execute();
                        
                        while($dados = $selectP->fetch()){
                            echo "<li><a href='?page=cat_list&idCat=" . $dados['idCategoria'] .  "'>". $dados['nome_cat'] . "</a></li>";
                        }

                        ?>
                    </ul>
                </li>

                <div class="btnoffcanvas">
                    <a href="?sair=true">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/sair.png" alt="">
                            <h6>Sair</h6>
                        </button>
                    </a>
                </div>
            </div>


        </div>

    </div>

<?php
} else {
?>

    <div class="sidebar">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="../IMAGES/botao-de-menu.png" alt=""></button>

        <a href="?page=dash_ini"><button class="btn" type="button"><img src="../IMAGES/computador-portatil.png" alt=""></button></a>

        <a href="?page=prod_list"><button class="btn" type="button"><img src="../IMAGES/caixa.png" alt=""></button></a>

        <a href="?page=perg_list"><button class="btn" type="button"><img src="../IMAGES/question.png" alt=""></button></a>

        <div class="btnoffcanvas">
            <div class="btn-group dropend">
                <button type="button" class="btn btn-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../IMAGES/categorias.png" alt="">
                </button>

               <ul class="dropdown-menu">
               <li><a class='dropdown-item' href='?page=cat_list&idCat=geral'>Geral</a></li>
                <?php 
                
                $selectQ = "SELECT * FROM categoria";
                $selectP = $cx->prepare($selectQ);
                $selectP->setFetchMode(PDO::FETCH_ASSOC);
                $selectP->execute();

                while($dados = $selectP->fetch()){
                    echo "<li><a class='dropdown-item' href='?page=cat_list&idCat=" . $dados['idCategoria'] . "'>" . $dados['nome_cat'] . "</a></li>";
                }
                
                ?>
                </ul>
            </div>
        </div>

        <a href="?sair=true"><button class="btn" type="button"><img src="../IMAGES/sair.png" alt=""></button></a>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h5>
                <button type="button" class="btn close" data-bs-dismiss="offcanvas" aria-label="Close"><img src="../IMAGES/close.png" alt=""></button>
            </div>

            <div class="offcanvas-body">
                <div class="btnoffcanvas">
                    <a href="?page=dash_ini">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/computador-portatil.png" alt="">
                            <h6>Inicio</h6>
                        </button>
                    </a>
                </div>

                <div class="btnoffcanvas">
                    <a href="?page=prod_list">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/caixa.png" alt="">
                            <h6>Produtos</h6>
                        </button>
                    </a>
                </div>

                <div class="btnoffcanvas">
                    <a href="?page=perg_list">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/question.png" alt="">
                            <h6>Perguntas</h6>
                        </button>
                    </a>
                </div>

                <li>

                    <div class="btnoffcanvas">
                        <a href="#" class="arrow">
                            <button class="btn doffcanvas" type="button"><img src="../IMAGES/categorias.png" alt="">
                                <h6>Categorias</h6>
                            </button>
                        </a>
                    </div>

                    <ul class="sub-menu">
                    <?php 
                        
                        $selectQ = "SELECT * FROM categoria";
                        $selectP = $cx->prepare($selectQ);
                        $selectP->setFetchMode(PDO::FETCH_ASSOC);
                        $selectP->execute();
                        
                        while($dados = $selectP->fetch()){
                            echo "<li><a href='?page=cat_list&idCat=" . $dados['idCategoria'] .  "'>". $dados['nome_cat'] . "</a></li>";
                        }

                        ?>
                    </ul>
                </li>

                <div class="btnoffcanvas">
                    <a href="?sair=true">
                        <button class="btn doffcanvas" type="button"><img src="../IMAGES/sair.png" alt="">
                            <h6>Sair</h6>
                        </button>
                    </a>
                </div>


            </div>


        </div>

    </div>

<?php
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var offcanvasElement = document.getElementById('offcanvasScrolling');
        var offcanvasButton = document.querySelector('[data-bs-toggle="offcanvas"]');
        var closeButton = document.querySelector('.close');
        var arrowElements = document.querySelectorAll('.arrow');

        offcanvasButton.addEventListener('click', function() {
            offcanvasElement.classList.add('transition'); // Garantir que a classe de transição esteja presente
            requestAnimationFrame(function() {
                offcanvasElement.classList.add('show');
            });
        });

        closeButton.addEventListener('click', function() {
            offcanvasElement.classList.remove('show');
            setTimeout(function() {
                offcanvasElement.classList.remove('transition');
            }, 400); // Duração da transição
        });

        //ESSE QAUYQ

        arrowElements.forEach(function(arrow) {
            arrow.addEventListener('click', function() {
                var parentLi = this.parentElement.parentElement;
                parentLi.classList.toggle('showMenu');
            });
        });
    });
</script>