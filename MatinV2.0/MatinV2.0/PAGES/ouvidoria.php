<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link rel="stylesheet" href="../ASSETS/PAGINAS-CSS/ouvidoria.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../IMAGES/matin-logo-png.png" type="image/x-icon">
</head>

<body>

    <?php

    require_once '../BASE/header2.php';

    ?>

    <main>
        <div class="mensagens">
            <h1>Todas as Mensagens</h1>

            <div class="search-inp">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><img src="../IMAGES/search.png" alt=""></span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Busque aqui seu produto" style="    border-left-width: 0px;">
                </div>
            </div>

            <div class="cards-encl" id="card-container"></div>
        </div>

        <div class="chat chat-container">
            <div class="chat-top" id="chat-top">
                <!-- <img src="../IMAGES/pessoaChat.jpg" alt="" id="imgChat">
                <div class="txt-info">
                    <h1 id="userHeaderChat">Nome do Usuario</h1>
                    <h3 id="userTimeChat">Online há 2 dias</h3>
                </div> -->
            </div> 
            <hr>

            <div class="mensagens-encl" style="flex-grow: 1;">
                <div class="mensagem">

                </div>
            </div>

            <div class="caixa-texto">
                <form onsubmit="sendMessage(event)">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><img src="../IMAGES/plus.png" alt=""></span>
                        <input type="text" class="form-control" aria-label="" id="user-msg" placeholder="Digite sua mensagem">
                        <span class="input-group-text"><img src="../IMAGES/Vector (3).png" alt=""></span>
                        <button type="submit" ><span class="input-group-text"><img src="../IMAGES/arrow-right.png" alt="" style="width: 38px;"></span></button>
                    </div>
                </form>
            </div>
        </div>

        <!-- MODAL -->

        <div class="modal fade" id="mensagemModal" tabindex="-1" aria-labelledby="mensagemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mensagemModalLabel">Reportar Mensagem</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Deseja mesmo reportar a mensagem?</p>
                    </div>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sim, quero reportar a mensagem</button>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="../JS/FIREBASE/realTimeDatabase.js"></script>

    <script>
        $(document).ready(function() {
            // Clique em qualquer lugar do documento
            $(document).click(function(event) {
                // Verifica se o clique foi fora dos cards ou não
                if (!$(event.target).closest('.card').length) {
                    // Remove a classe 'active' e 'enlarged' de todos os cards
                    $('.card').removeClass('active enlarged');
                }
            });

            // Clique em um card
            try {
                $('.card').click(function(event) {
                    // Impede que o evento de clique no card se propague para o documento
                    event.stopPropagation();
                    
                    // Remove a classe 'active' e 'enlarged' de todos os cards
                    $('.card').removeClass('active enlarged');
                    
                    // Adiciona a classe 'active' ao card clicado
                    $(this).addClass('active');
                    
                    // Define o tamanho maior para o card clicado
                    $(this).addClass('enlarged');
                    
                    $('.cards-encl').addClass('enlarged');
                    
                });   
            } catch (error) {
                console.log(error);
            }

            $('.laranja').click(function(event) {
                $('#mensagemModal').modal('show');

            });
        });
    </script>


</body>

</html>