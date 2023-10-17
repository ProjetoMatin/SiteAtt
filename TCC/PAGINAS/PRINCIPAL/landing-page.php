<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/footer_v2.css">
    <link rel="stylesheet" href="../../STYLES/GERAL/basico.css">
    <link rel="stylesheet" href="../../STYLES/GERAL/header.css">
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/landing-page.css">
</head>
<body>
    <header>
        <div class='logodiv'>
            <a href="../PRINCIPAL/home.php">
                <figure>
                    <img src='../../IMG/logo.png' alt=''>
                </figure>
                <h1>Mat-in</h1>
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li class="li-premium"><a href="paginaPremium.php">Premium</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="div-img-principal">
            <h1>Agricultura de ponta a ponta para todos.</h1>
            <p>Encontre todos os tipos de produtos no ramo do agronegócio familiar.</p>
            <a href="home.php"><button class="button-entrar">ENTRAR</button></a>
        </div>
        <section class="section-fala-cliente">
            <p>"Um problema que todos nós enfrentávamos nessa era da Internet, que agora foi resolvido com este incrível site!"</p>
            <div class="cliente-matin">
                <figure class="logo-matin">
                    <img src="../../IMG/logo.png" alt="">
                </figure>
                <p class="cliente-matin-texto"><strong>CLIENTE MAT-IN</strong></p>
            </div>
        </section>
        <section class="vantagens-app">
            <div class="vantagem-img">
                <figure>
                    <img src="../../IMG/vantagem-img.jpg" alt="">
                </figure>
            </div>
            <div class="vantagens">
                <div class="vantagem">
                    <figure>
                        <img src="../../IMG/smartphone.png" alt="App Mobile">
                    </figure>
                    <p>Aplicativo Mobile</p>
                    <p class="subtexto-vantagem">Entre quando quiser no portal do agronegócio Mat-in</p>
                </div>
                <div class="vantagem">
                    <figure>
                        <img src="../../IMG/edit.png" alt="App Mobile">
                    </figure>
                    <p>Customize do jeito que quiser</p>
                    <p class="subtexto-vantagem">Deixe o Mat-in do jeitinho que você gostar</p>
                </div>
                <div class="vantagem">
                    <figure>
                        <img src="../../IMG/no-money.png" alt="Grátis para Uso">
                    </figure>
                    <p>Grátis para Uso</p>
                    <p class="subtexto-vantagem">Não é necessário pagar para utilizar nossos serviços</p>
                </div>
                <div class="vantagem">
                    <figure>
                        <img src="../../IMG/global.png" alt="Acessar em qualquer lugar">
                    </figure>
                    <p>Acesso por todo o Brasil</p>
                    <p class="subtexto-vantagem">O Mat-in se expande por todo o território nacional</p>
                </div>
            </div>
        </section>
        <section class="nova-era-agronegocio">
            <div class="nova-era-texto">
                <h1>Entre em uma nova era do Agronégocio.</h1>
                <p> Junte-se a nós nessa jornada rumo a um agronegócio mais inteligente, conectado e sustentável, onde estamos plantando as sementes da inovação para colher os frutos de um futuro agrícola promissor.</p>
            </div>
            <figure class="logo-matin">
                    <img src="../../IMG/logo.png" alt="">
                </figure>
        </section>
        <section class="entre-ja">
            <a href="home.php">
                <h1>Entre no site agora!</h1>
            </a>
        </section>
    </main>
    <?php 
        require_once "../PAGS-REP/footerVers2.php";
    ?>
</body>
</html>


