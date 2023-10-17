<style>
    h6,
    h5 {
        margin: 0 !important;
    }

    .sidebar {
        background-color: var(--pretoAzulado);
        padding-bottom: 20px;
        height: 92vh;
    }

    #offcanvasScrollingLabel {
        color: var(--branco);
    }

    .sidebar button {
        display: block;
        margin: auto;
        margin-top: 20px;
    }

    .offcanvas,
    .offcanvas-lg,
    .offcanvas-md,
    .offcanvas-sm,
    .offcanvas-xl,
    .offcanvas-xxl {
        background-color: var(--pretoAzulado) !important;
        --bs-offcanvas-width: 250px !important;
    }


    .offcanvas h6 {

        color: var(--branco);
    }

    img {
        width: 25px;
    }

    .close {
        margin: 0 !important;
    }

    .btnoffcanvas {
        margin-bottom: 20px;
    }

    .btnoffcanvas .doffcanvas {
        display: flex;
        align-items: center;
        margin: 0;
    }

    .btnoffcanvas .doffcanvas h6 {
        margin-left: 15px !important;
    }
</style>
<div class="sidebar">
    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="../../IMG/botao-de-menu.png" alt=""></button>

    <button class="btn" type="button" onclick="return mostrarConteudo(1)"><img src="../../IMG/computador-portatil.png" alt=""></button>

    <button class="btn" type="button" onclick="return mostrarConteudo(2)"><img src="../../IMG/grupo-de-usuarios.png" alt=""></button>

    <button class="btn" type="button" onclick="return mostrarConteudo(3)"><img src="../../IMG/local.png" alt=""></button>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h5>
            <button type="button" class="btn close" data-bs-dismiss="offcanvas" aria-label="Close"><img src="../../IMG/close.png" alt=""></button>
        </div>

        <div class="offcanvas-body">
            <div class="btnoffcanvas">
                <button class="btn doffcanvas" type="button" onclick="return mostrarConteudo(1)"><img src=" ../../IMG/computador-portatil.png" alt="">
                    <h6>Inicio</h6>
                </button>

            </div>

            <div class="btnoffcanvas">
                <button class="btn doffcanvas" type="button" onclick="return mostrarConteudo(2)"><img src=" ../../IMG/grupo-de-usuarios.png" alt="">
                    <h6>Usuarios</h6>
                </button>

            </div>

            <div class="btnoffcanvas">
                <button class="btn doffcanvas" type="button" onclick="return mostrarConteudo(3)"><img src=" ../../IMG/local.png" alt="">
                    <h6>Localizações</h6>
                </button>

            </div>
        </div>
    </div>
</div>
