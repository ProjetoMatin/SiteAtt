<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/pagPremium.css">
    <link rel="stylesheet" href="../../STYLES/GERAL/basico.css">
    <link rel="stylesheet" href="../../STYLES/GERAL/header.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php 
        require_once "../PAGS-REP/header.php";
        
    ?>
    <main>
        <div class="section-img-principal">
            <div class="texto-premium">
                <h1>Crie sua página personalizável e retire os anúncios!</h1>
                <p>3 meses de Mat-in Premium por apenas R$39,90.</p>
                <p>Assine para ter acesso aos melhores benefícios da nossa plataforma.</p>
                <div class="preco-premium">
                    <label for="preco-texto">De: R$69,99</label> <span>30% OFF</span>
                    <p class="preco-texto"><strong>Para: R$39,90</strong></p>
                </div>
                <button class="botao-quero-assinar">QUERO ASSINAR</button>
                <p class="termos">Ao assinar, você concorda com os <u>Termos e condições da empresa.</u> Você pode cancelar quando quiser.</p>
            </div>
            <figure class="figure-img-principal">
                <img src="../../IMG/coroaPremium.png" alt="" class="img-principal">
            </figure>
        </div>
        <div class="beneficios-premium">
            <h1>Por que comprar o Premium?</h1>
            <div class="lista-beneficios">
                <div class="beneficio">
                    <figure>
                        <img src="../../IMG/edit.png" alt="Personalizar suas páginas">
                    </figure>
                    <p><strong>Personalizar suas Páginas</strong></p>
                    <p>Crie, edite, atualize a sua página de comércio do jeito que achar melhor.</p>
                </div>
                <div class="beneficio">
                    <figure>
                        <img src="../../IMG/lock.png" alt="Sem anúncios">
                    </figure>
                    <p><strong>Sem anúncios</strong></p>
                    <p>Com o Premium, você estará livre dos anúncios presentes na plataforma.</p>
                </div>
                <div class="beneficio">
                    <figure>
                        <img src="../../IMG/warning.png" alt="Sem limite de compra e vendas">
                    </figure>
                    <p><strong>Sem limite de compra e vendas</strong></p>
                    <p>Com o Premium, você poderá registrar e comprar quantos produtos você quiser.</p>
                </div>
                <div class="beneficio">
                    <figure>
                        <img src="../../IMG/filter.png" alt="Filtros otimizados">
                    </figure>
                    <p><strong>Filtros otimizados</strong></p>
                    <p>Com o Premium, aparecerão os produtos nos quais você tem preferência.</p>
                </div>
            </div>
        </div>
    </main>
    <section class="section-compre-premium">
        <div class="compre-premium">
            <h1>Compre agora o seu Premium!</h1>
            <div class="usuario-premium">
                <div class="img-user-premium">
                    <figure>
                        <img src="../../IMG/usuario.jpg" alt="">
                    </figure>
                </div>
                <div class="texto-user-premium">
                    <h2>Usuário Premium</h2>
                    <p>Acesso total à página personalizada, sem anúncios, limite de compras, personalização de filtragem e muito mais! </p>
                    <p class="texto-preco">Por apenas <strong>R$39,90</strong>/mês</p>
                    <button class="botao-premium">ASSINAR</button>
                </div>
            </div>
            <br>
            <br>
            <div class="div-avaliacoes-premium">
                <h1>Algumas avaliações sobre o Premium</h1>
                <div class="avaliacoes-premium-flex">
                    <div class="avaliacao-premium">
                        <figure>
                            <img src="../../IMG/jose-silveira.jpg" alt="Foto usuario">
                        </figure>
                        <div class="usuario">

                                <h2>Bom custo-benefício!</h2>
                                <div class="user-flex">
                                    <figure>
                                        <img src="../../IMG/logo.png" alt="">
                                    </figure>
                                    <p>José Silveira</p>
                                </div>
                            
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="avaliacao-premium">
                        <figure>
                            <img src="../../IMG/chi-hang.jpg" alt="Foto usuario">
                        </figure>
                        <div class="usuario">
                            <div>
                                <h2>Adorei a página personalizável!</h2>
                                <div class="user-flex">
                                    <figure>
                                        <img src="../../IMG/logo.png" alt="">
                                    </figure>
                                    <p>Chi Hang</p>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="avaliacao-premium">
                        <figure>
                            <img src="../../IMG/bernardo-ramon.jpg" alt="Foto usuario">
                        </figure>
                        <div class="usuario">
                            <div>
                                <h2>Os anúncios me incomodavam, não tenho mais isso!</h2>
                                <div class="user-flex">
                                    <figure>
                                        <img src="../../IMG/logo.png" alt="">
                                    </figure>
                                    <p>Bernardo Ramon</p>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
                        </div>
                    </div>
                    <div class="avaliacao-premium">
                        <figure>
                            <img src="../../IMG/simone-cattuzzo.jpg" alt="Foto usuario">
                        </figure>
                        <div class="usuario">
                            <div>
                                <h2>A lista de produtos que quero é muito útil, eu sempre me perdia sem ela!</h2>
                                <div class="user-flex">
                                    <figure>
                                        <img src="../../IMG/logo.png" alt="">
                                    </figure>
                                    <p>Simone Cattuzzo</p>
                                </div>
                            </div>
                            <p>Perfeito, agora consigo me organizar e comprar leite e queijo dos produtores mais baratos para meus 6 filhos!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
        require_once "../PAGS-REP/footerVers2.php";
    ?>
</body>
</html>