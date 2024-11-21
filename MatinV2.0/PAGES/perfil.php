
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/perfil.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/SAC.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/compras.css">
<link rel="stylesheet" href="ASSETS/PAGINAS-CSS/politicas.css">

<?php require_once 'BASE/config.php'; ?>
<?php require_once 'MODEL/autenticacao.php'; ?>

<?php

$id = $_SESSION['idUsu'] ?? '';
$type = $_GET['type'] ?? '';
if (!isset($_SESSION['idUsu'])) {
    echo "<script>location.href='CREDENTIALS/loginUsu.php?aviso=3'</script>";
}

$selectQ = "SELECT * FROM usuario WHERE idUsu = :id";


$selectP = $cx->prepare($selectQ);
$selectP->setFetchMode(PDO::FETCH_ASSOC);
$selectP->bindParam("id", $id);


$selectP->execute();


$dados = $selectP->fetch(PDO::FETCH_ASSOC);

?>

<main>
    <?php
        
        echo "<div class='info-perfil'>
        <div class='flex-mais-flex'>
            <img src='IMAGES-BD/USUARIOS/" . $dados['fotos_usu'] . "?>' class='img-perfil' alt='Foto de perfil'><div class='flex-perfil'>";
                    if ($selectP->rowCount() > 0) {
                        echo '<h2>' . $dados['nome_usu'] . '</h2>';
                    } else {
            
                        echo 'oi';
                    }
                    echo "<a href='?page=editPerfil' class='btn_acoes_perfil icone_perfil'><img src='IMAGES/editar.png'></a></div>
        </div>
            <div class='visao-geral'>
               
                <div class='itens'>
                ";
                switch($type) {
                    case "minhas_compras":
                        echo "
                        <ul>
                            <li><a href='?page=perfil'>Visão Geral</a></li>
                            <hr>    
                            <li><a href='?page=perfil&type=minha_conta'>Minha Conta</a></li>
                            <li><a href='?page=perfil&type=minhas_compras'><h3><img src='IMAGES/quadrado_verde.png'> Minhas Compras</a></h3></li>
                            <li><a href='?page=perfil&type=sac'>Serviço ao Cliente</a></li>
                            <li><a href='PAGES/dashboard.php'>Dashboard</a></li>

                            <li><a href='?page=perfil&type=politicas'>Políticas</a></li> 
                            </ul>
                        <hr>";
                        break;
                    case "minha_conta":
                        echo "
                        <ul>
                            <li><a href='?page=perfil'>Visão Geral</a></li>
                            <hr>    
                            <li><a href='?page=perfil&type=minha_conta'><h3><img src='IMAGES/quadrado_verde.png'> Minha Conta</a></h3></a></li>
                            <li><a href='?page=perfil&type=minhas_compras'>Minhas Compras</li>
                            <li><a href='?page=perfil&type=sac'>Serviço ao Cliente</a></li>
                            <li><a href='PAGES/dashboard.php'>Dashboard</a></li>
                            <li><a href='?page=perfil&type=politicas'>Políticas</a></li> 
                            </ul>
                        <hr>";
                        break;
                    case "sac":
                        echo "
                        <ul>
                            <li><a href='?page=perfil'>Visão Geral</a></li>
                            <hr>    
                            <li><a href='?page=perfil&type=minha_conta'>Minha Conta</li>
                            <li><a href='?page=perfil&type=minhas_compras'>Minhas Compras</li>
                             <li><a href='?page=perfil&type=sac'><h3><img src='IMAGES/quadrado_verde.png'> Serviço ao Cliente</a></h3></a></li>

                             <li><a href='PAGES/dashboard.php'>Dashboard</a></li>

                            <li><a href='?page=perfil&type=politicas'>Políticas</a></li> 
                            </ul>
                        <hr>";
                        break;
                    case "politicas":
                        echo "
                        <ul>
                            <li><a href='?page=perfil'>Visão Geral</a></li>
                            <hr>    
                            <li><a href='?page=perfil&type=minha_conta'>Minha Conta</li>
                            <li><a href='?page=perfil&type=minhas_compras'>Minhas Compras</li>
                            <li><a href='?page=perfil&type=sac'>Serviço ao Cliente</a></li>

                            <li><a href='PAGES/dashboard.php'>Dashboard</a></li>

                             <li><a href='?page=perfil&type=politicas'><h3><img src='IMAGES/quadrado_verde.png'> Políticas</a></h3></a></li>
                            </ul>
                        <hr>";
                        break;
                    default:
                        echo "
                        <ul>
                            <li>
                            <h3><img src='IMAGES/quadrado_verde.png'> Visão Geral</h3>
                            </li>
                            <hr>    
                            <li><a href='?page=perfil&type=minha_conta'>Minha Conta</a></li>
                            <li><a href='?page=perfil&type=minhas_compras'>Minhas Compras</a></li>
                            <li><a href='?page=perfil&type=sac'>Serviço ao Cliente</a></li>

                            <li><a href='PAGES/dashboard.php'>Dashboard</a></li>

                            <li><a href='?page=perfil&type=politicas'>Políticas</a></li> 
                        </ul>
                        <hr>";
                        break;
                }
                
                echo "</div>
            </div>
            <a href='?config=sair' class='btn_acoes_perfil link_perfil'>Sair</a>
        </div>
                    ";
        switch($type) {
            case "minhas_compras":
                echo "";
                break;
            case "minha_conta":
                echo "<div class='minha_conta'>
                        <div class='flex-infos'>
                            <div class='info-perfil2'>
                                <a href='#' class='link_info'>
                                    <div class='lado1'>
                                        <div class='icon'>
                                            <figure><img src='IMAGES/info_perfil.png' alt='Informações do Perfil'></figure>
                                            <h2>Suas informações</h2>
                                        </div>
                                        <p>Nome de preferência e dados para se identificar.</p>
                                    </div>
                                </a>
                                <div class='lado2'>
                                    <a href='#' class='ver-tudo'>></a>
                                </div>
                            </div>
                            <div class='info-perfil2'>
                                <div class='lado1'>
                                    <a href='#' class='link_info'>
                                        <div class='icon'>
                                            <figure><img src='IMAGES/dados_conta.png' alt='Dados da sua conta Mat-in'></figure>
                                            <h2>Dados da sua conta</h2>
                                        </div>
                                        <p>Dados que representam sua conta Mat-in.</p>
                                    </a>
                                </div>
                                <div class='lado2'>
                                    <a href='#' class='ver-tudo'>></a>
                                </div>
                            </div>
                            <div class='info-perfil2'>
                                <div class='lado1'>
                                    <a href='#' class='link_info'>
                                        <div class='icon'>
                                            <figure><img src='IMAGES/seguranca.png' alt='Segurança'></figure>
                                            <h2>Segurança</h2>
                                        </div>
                                        <p>Você tem configurações pendentes.</p>
                                    </a>
                                </div>
                                <div class='lado2'>
                                    <a href='#' class='ver-tudo'>></a>
                                </div>
                            </div>
                            <div class='info-perfil2'>
                                <div class='lado1'>
                                    <a href='#' class='link_info'>
                                        <div class='icon'>
                                            <figure><img src='IMAGES/cartoes_icon.png' alt='Cartões salvos'></figure>
                                            <h2>Cartões</h2>
                                        </div>
                                        <p>Gerencie os cartões salvos na sua conta.</p>
                                    </a>
                                </div>
                                <div class='lado2'>
                                    <a href='#' class='ver-tudo'>></a>
                                </div>
                            </div>
                            <div class='info-perfil2'>
                                <div class='lado1'>
                                    <a href='#' class='link_info'>
                                        <div class='icon'>
                                            <figure><img src='IMAGES/privacy2.png' alt='Privacidade'></figure>
                                            <h2>Privacidade</h2>
                                        </div>
                                        <p>Preferências e controle do uso dos seus dados</p>
                                    </a>
                                </div>
                                <div class='lado2'>
                                    <a href='#' class='ver-tudo'>></a>
                                </div>
                            </div>
                            <div class='info-perfil2'>
                                <div class='lado1'>
                                    <a href='#' class='link_info'>
                                        <div class='icon'>
                                            <figure><img src='IMAGES/comunicacoes.png' alt='Comunicações e Notificações'></figure>
                                            <h2>Comunicações e Notificações</h2>
                                        </div>
                                        <p>Escolha que tipo de informação você deseja receber.</p>
                                    </a>
                                </div>
                                <div class='lado2'>
                                    <a href='#' class='ver-tudo'>></a>
                                </div>
                            </div>
                        </div>'
                    </div>";
                break;
            case "sac":
                echo "<div class='flex-servicos'>
                        <div class='servico'>
                            <div class='icon'>
                                <figure>
                                    <img src='IMAGES/perguntas_frequentes.png' alt='Perguntas Frequentes'>
                                </figure>
                                <h2>Perguntas Frequentes sobre Compras</h2>
                            </div>
                            <p>Encontre respostas para suas dúvidas sobre o processo de compra, incluindo pagamentos, prazos de entrega e políticas de devolução.</p>
                        </div>
                        <div class='servico'>
                            <div class='icon'>
                                <figure>
                                    <img src='IMAGES/perguntas_frequentes.png' alt='Perguntas Frequentes'>
                                </figure>
                                <h2>Perguntas Frequentes sobre Vendas</h2>
                            </div>
                            <p>Descubra informações importantes sobre como vender, desde o cadastro de produtos até as taxas aplicáveis e a gestão das suas listagens.</p>
                        </div>
                        <div class='servico'>
                                <div class='icon'>
                                    <figure>
                                        <img src='IMAGES/entre_contato.png' alt='Entre em Contato'>
                                    </figure>
                                    <h2>Entre em Contato</h2>
                                </div>
                            <p>Comunique-se conosco facilmente através do formulário de contato, telefone, e-mail ou chat ao vivo. Estamos prontos para ajudar com qualquer dúvida ou necessidade.</p>
                        </div>
                        <div class='servico'>
                                <div class='icon'>
                                    <figure>
                                        <img src='IMAGES/ouvidoria.png' alt='Ouvidoria'>
                                    </figure>
                                    <h2>Ouvidoria</h2>
                                </div>
                            <p>Envie sugestões, críticas ou reclamações diretamente para nossa ouvidoria. Use o formulário ou e-mail para compartilhar seu feedback.</p>
                        </div>
                        <div class='servico'>
                                <div class='icon'>
                                    <figure>
                                        <img src='IMAGES/premium.png' alt='Parceiros Mat-in'>
                                    </figure>
                                    <h2>Parceiros Mat-In</h2>
                                </div>
                            <p>Descubra como se tornar um Parceiro MAT-IN e aproveite os benefícios de fazer parte da nossa rede. Veja os critérios e o processo para se unir a nós.</p>
                        </div>
                    </div>";
                break;
            case "politicas":
                echo "<div class='flex-servicos'>
                <div class='servico politicas'>
                    <div class='icon'>
                        <figure>
                            <img src='IMAGES/termos_condicoes.png' alt='Termos e Condições'>
                        </figure>
                        <h2>Termos e Condições de Uso</h2>
                    </div>
                    <p>Veja os termos que regulam o uso do nosso site e serviços.</p>
                </div>
                <div class='servico politicas'>
                    <div class='icon'>
                        <figure>
                            <img src='IMAGES/privacy.png' alt='Políticas de Privacidade'>
                        </figure>
                        <h2>Perguntas Frequentes sobre Vendas</h2>
                    </div>
                    <p>Descubra como protegemos suas informações pessoais e garantimos sua privacidade.</p>
                </div>
                <div class='servico politicas'>
                    <div class='icon'>
                        <figure>
                            <img src='IMAGES/cookies.png' alt='Preferência de Cookies'>
                        </figure>
                        <h2>Preferências de Cookies</h2>
                    </div>
                    <p>Gerencie suas preferências de cookies para personalizar sua experiência no nosso site.</p>
                </div>
                <div class='servico politicas'>
                    <div class='icon'>
                        <figure>
                            <img src='IMAGES/acessibilidade.png' alt='acessibilidade'>
                        </figure>
                        <h2>Acessibilidade</h2>
                    </div>
                    <p>Conheça as opções de acessibilidade disponíveis para melhorar sua experiência.</p>
                </div>
            </div>";
                break;
            default:
                echo "
                <div class='flex-divs'>
                    <div class='info1'>
                    <h2>Olá, <strong>" . $dados['nome_usu'] . "!</strong></h2>
                    <div class='botoes'>
                        <div class='botoes-gerais'>
                            <a href='?page=perfil&type=historico' class='link_perfil'><img src='IMAGES/historico.png' alt='Histórico'></a>
                            Histórico
                        </div>
                        <div class='botoes-gerais'>
                            <a href='?page=perfil&type=cupons' class='link_perfil'><img src='IMAGES/cupons.png' alt='Cupons'></a>
                            Cupons
                        </div>
                        <div class='botoes-gerais'>
                            <a href='?page=perfil&type=seguindo' class='link_perfil'><img src='IMAGES/seguindo.png' alt='Seguindo'></a>
                            Seguindo
                        </div>
                        <div class='botoes-gerais'>
                            <a href='?page=perfil&type=notificacoes' class='link_perfil'><img src='IMAGES/notificacoes.png' alt='Notificações'></a>
                            Notificações
                        </div>
                        <div class='botoes-gerais'>
                            <a href='?page=perfil&type=mensagens' class='link_perfil'><img src='IMAGES/mensagens.png' alt='Mensagens'></a>
                            Mensagens
                        </div>
                    </div>
                </div>";
            echo "<div class='pedidos'><div class='ver-tudo'>";
                    echo '<h2>Minhas compras - Resumo</h2>';
                    echo "  <a href='#'>Ver tudo ></a></div>
                    <div class='flex-pagamentos'>
                        <div class='pag-situacao'>
                            <figure class='icone-pag'>
                                <img src='IMAGES/pedidos_pagamento.png' alt='Pedidos Aguardando Pagamento'>
                            </figure>
                            <h2>Pedidos Aguardando Pagamento</h2>
                        </div>
                        <div class='pag-situacao'>
                            <figure class='icone-pag'>
                                <img src='IMAGES/aguardando_envio.png' alt=''>
                            </figure>
                            <h2>Aguardando Envio</h2>
                        </div>
                        <div class='pag-situacao'>
                            <figure class='icone-pag'>
                                <img src='IMAGES/enviado.png' alt=''>
                            </figure>
                            <h2>Enviado</h2>
                        </div>
                        <div class='pag-situacao'>
                            <figure class='icone-pag'>
                                <img src='IMAGES/aguardando_avaliacao.png' alt=''>
                            </figure>
                            <h2>Aguardando Avaliação</h2>
                        </div>
                    </div>
                    <div class='reembolsos'><p style='display: flex; align-items: center; gap:5px;'><img src='IMAGES/moeda.png'><a href='#'>     Reembolsos e Devoluções</a></p>
                    <p><a href='#'>></a></a></p></div>    
                    </div>";
            if($dados['nvl_usu'] == 'F' || $dados['nvl_usu'] == 'A') {
                echo "<div class='minhas_vendas'>
                        <div class='ver-tudo'>
                            <h2>Minhas vendas - Resumo</h2>
                            <a href='#'>Ver tudo ></a>
                        </div>
                        <hr>";
        
                    echo "
                    <div class='selos'>
                    <a href='?page=selos' class='selos'>
                            <figure>
                                <img src='IMAGES/sem_selo.png' alt='Sem selos'>
                            </figure>
                            <div>
                                <h2>Selos e Certificados</h2>
                                <p>Verifique e adicione suas certificações de qualidade e confiança para começar a vender.</p>
                            </div>
                            </a>
                            </div>";
                
                }
                    echo "</div>";
            }
        echo "</div>";     
    ?>
</main>

<?php require_once 'BASE/footer.php'; ?>