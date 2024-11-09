<style>
    footer {
        background-color: var(--preto00);
        display: flex;
        justify-content: space-evenly;
        align-items: flex-start;
        padding: 2rem 0.5rem;
        gap: 1.5rem;
    }

    footer .logo {
        display: flex;
        width: 120px;
        justify-content: center;
        align-items: center;
        font-size: 1.2em;
        color: var(--branco00);
    }

    footer .logo img {
        width: 50%;
    }


    footer .links {
        display: flex;
        justify-content: space-evenly;
        gap: 7rem;
        align-items: flex-start;
    }

    footer .redes-sociais {
        display: flex;
        align-items: flex-start;
    }


    footer .rede-social {
        width: 45px;
        margin: 10px;
        padding: 0.5rem;
        background-color: #3d3d3d;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: .2s;
    }

    footer .rede-social:hover {
        background-color: var(--laranja00);
    }

    footer .rede-social img {
        width: 100%;
    }

    footer .link-title {
        color: #3d3d3d;
        font-weight: bold;
    }

    footer .link-item {
        margin-top: 1rem !important;
        margin-bottom: 1.5rem !important;
    }

    footer .link-item a {
        color: var(--branco00);
        text-decoration: none;
        transition: .2s;
    }

    footer .link-item a:hover {
        color: var(--laranja00);
    }

    .sub-footer {
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--cinza00);
        padding: 1rem;
        background-color: var(--preto00);
        font-size: 0.8em;
        cursor: default;
    }
</style>

<footer>
    <div class="logo">
        <img src="IMAGES/matin-logo-png.png" alt="logo Mat-in">
        <p>Mat-in</p>
    </div>

    <div class="links">
        <div class="link">
            <p class='link-title'>EMPRESA</p>
            <p class="link-item"><a href="#">Sobre nós</a></p>
            <p class="link-item"><a href="#">Endereço</a></p>
            <p class="link-item"><a href="#">Contato</a></p>
        </div>
        <div class="link">
            <p class='link-title'>COMUNIDADES</p>
            <p class="link-item"><a href="#">Vendedores</a></p>
            <p class="link-item"><a href="#">Compradores</a></p>
            <p class="link-item"><a href="#">Premium</a></p>
            <p class="link-item"><a href="#">Desenvolvedores</a></p>
        </div>
        <div class="link">
            <p class='link-title'>LINKS ÚTEIS</p>
            <p class="link-item"><a href="#">Suporte</a></p>
            <p class="link-item"><a href="#">Aplicativo mobile gratuito</a></p>
            <p class="link-item"><a href="#">Termos e Condições de Uso</a></p>
        </div>
    </div>

    <div class="redes-sociais">
        <div class="rede-social">
            <a href="#">
                <figure>
                    <img src="IMAGES/facebook.png" alt="Facebook">
                </figure>
            </a>
        </div>
        <div class="rede-social">
            <a href="#">
                <figure>
                    <img src="IMAGES/whatsapp.png" alt="WhatsApp">
                </figure>
            </a>
        </div>
        <div class="rede-social">
            <a href="#">
                <figure>
                    <img src="IMAGES/twitter.png" alt="Twitter">
                </figure>
            </a>
        </div>
        <div class="rede-social">
            <a href="#">
                <figure>
                    <img src="IMAGES/telegram.png" alt="Telegram">
                </figure>
            </a>
        </div>
    </div>
</footer>
<div class="sub-footer">
    <p>&copy;2024 | Mat-in. Todos os direitos reservados.</p>
</div>