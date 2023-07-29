conteudo(1);

function conteudo(cont) {
    const botaoDC = document.querySelector('.botaoDC');
    const botaoAV = document.querySelector('.botaoAV');
    const botaoPE = document.querySelector('.botaoPE');
    const conteudo = document.querySelector('.conteudo');

    switch (cont) {
        case 1: //Descrição
            const conteudoDesc = `
            <div class="desc">
                <div class="desc-encl">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias fugit doloribus quaerat consequuntur, incidunt ea, eligendi vel minima iusto molestiae enim nihil soluta, at voluptas reprehenderit harum beatae ad voluptates! Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam dolorum soluta amet ipsum quia. Quo est ipsum consectetur minus sunt placeat delectus aut. Aspernatur recusandae distinctio eius enim repellendus sequi?</p>
                    <hr>
                </div>
                <div class="desc-encl">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis quos pariatur saepe, eos reiciendis minima laboriosam! Voluptas eius blanditiis impedit maiores, quam quisquam minima sint dolores expedita nulla atque autem.
                        Et harum consectetur, laboriosam veniam dolorem corporis recusandae optio quam cum alias exercitationem accusamus veritatis officia quidem cumque illum corrupti, voluptatum a beatae enim totam dicta iusto quis. Fuga, exercitationem!</p>
                    <hr>
                </div>
                <div class="desc-encl">
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At suscipit ipsam recusandae eligendi esse, cumque vel doloremque reiciendis, minima illo asperiores incidunt laudantium sit, voluptates dolorem perspiciatis molestiae modi nemo.
                        Error aut doloribus laborum iusto possimus minus sit tenetur, corporis repudiandae repellendus vitae consectetur cum dignissimos eum mollitia libero quibusdam, magnam quam illum voluptate distinctio at laudantium alias odio! Modi.</p>
                </div>
            </div>
            `;
            conteudo.innerHTML = conteudoDesc;

            //NÃO MUDA NADA AQUI PELOAMORDEDEUS ISSO É UMA GAMBIARRA QUE EU FIZ

            //AQUI VAI TROCAR A COR E O TXT-DECOR PARA PRETO E NONE PARA QUE QUANDO CLICAR EM OUTRO BOTÃO TRANSFORME OS OUTROS BOTÕES EM TEXTO NORMAL, SERIO NAO MEXE AQUI

            botaoAV.style.color = 'var(--preto)';
            botaoAV.style.textDecoration = 'none';

            botaoPE.style.color = 'var(--preto)';
            botaoPE.style.textDecoration = 'none';

            botaoDC.style.color = 'var(--laranja)';
            botaoDC.style.textDecoration = 'underline';
            break;

        case 2: //Avaliação
            const conteudoAval = `
            
                <div class="aval-encl">
                    <div class="avaliacao">
                        <div class="estr-data">
                            <figure>
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                            </figure>
                            <p>11/04/2023</p>
                        </div>
                        <h1>Nome do Usuário</h1>
                        <div class="estado">
                            <img src="../../IMG/275px-Bandeira_do_estado_do_Rio_de_Janeiro.svg.png" alt="">
                            <p>Rio De Janeiro</p>
                        </div>
                        <h2 class="txt">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum rem similique in enim facilis qui, distinctio perspiciatis dolore quis, cupiditate cum expedita. Numquam animi iusto recusandae alias in velit repudiandae.
                        </h2>
                        <div class="info-adic">
                            <div class="compart">
                                <figure>
                                    <img src="../../IMG/compartilhar.png" alt="">
                                </figure>
                                <h3>Compartilhar</h3>
                            </div>
                            <div class="likeDeslike">
                                <h3>Este comentário foi útil?</h3>
                                <img src="../../IMG/likebtn.png" alt="">
                                <h3>120</h3>
                                <img src="../../IMG/likebtn.png" alt="" class="invertido">
                                <h3>12</h3>
                            </div>
                        </div>
                    </div>

                    <div class="avaliacao">
                        <div class="estr-data">
                            <figure>
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                            </figure>
                            <p>11/04/2023</p>
                        </div>
                        <h1>Nome do Usuário</h1>
                        <div class="estado">
                            <img src="../../IMG/275px-Bandeira_do_estado_do_Rio_de_Janeiro.svg.png" alt="">
                            <p>Rio De Janeiro</p>
                        </div>
                        <h2 class="txt">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum rem similique in enim facilis qui, distinctio perspiciatis dolore quis, cupiditate cum expedita. Numquam animi iusto recusandae alias in velit repudiandae.
                        </h2>
                        <div class="info-adic">
                            <div class="compart">
                                <figure>
                                    <img src="../../IMG/compartilhar.png" alt="">
                                </figure>
                                <h3>Compartilhar</h3>
                            </div>
                            <div class="likeDeslike">
                                <h3>Este comentário foi útil?</h3>
                                <img src="../../IMG/likebtn.png" alt="">
                                <h3>120</h3>
                                <img src="../../IMG/likebtn.png" alt="" class="invertido">
                                <h3>12</h3>
                            </div>
                        </div>
                    </div>

                    <div class="avaliacao">
                        <div class="estr-data">
                            <figure>
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                                <img src="../../IMG/estrela.png" alt="">
                            </figure>
                            <p>11/04/2023</p>
                        </div>
                        <h1>Nome do Usuário</h1>
                        <div class="estado">
                            <img src="../../IMG/275px-Bandeira_do_estado_do_Rio_de_Janeiro.svg.png" alt="">
                            <p>Rio De Janeiro</p>
                        </div>
                        <h2 class="txt">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum rem similique in enim facilis qui, distinctio perspiciatis dolore quis, cupiditate cum expedita. Numquam animi iusto recusandae alias in velit repudiandae.
                        </h2>
                        <div class="info-adic">
                            <div class="compart">
                                <figure>
                                    <img src="../../IMG/compartilhar.png" alt="">
                                </figure>
                                <h3>Compartilhar</h3>
                            </div>
                            <div class="likeDeslike">
                                <h3>Este comentário foi útil?</h3>
                                <img src="../../IMG/likebtn.png" alt="">
                                <h3>120</h3>
                                <img src="../../IMG/likebtn.png" alt="" class="invertido">
                                <h3>12</h3>
                            </div>
                        </div>
                    </div>
                    
                </div>
            
            `;

            //NÃO MUDA NADA AQUI PELOAMORDEDEUS ISSO É UMA GAMBIARRA QUE EU FIZ

            //AQUI VAI TROCAR A COR E O TXT-DECOR PARA PRETO E NONE PARA QUE QUANDO CLICAR EM OUTRO BOTÃO TRANSFORME OS OUTROS BOTÕES EM TEXTO NORMAL, SERIO NAO MEXE AQUI

            conteudo.innerHTML = conteudoAval;

            botaoDC.style.color = 'var(--preto)';
            botaoDC.style.textDecoration = 'none';

            botaoPE.style.color = 'var(--preto)';
            botaoPE.style.textDecoration = 'none';

            botaoAV.style.color = 'var(--laranja)';
            botaoAV.style.textDecoration = 'underline';
            break;

        case 3:
            const conteudoPerg = `
            
                <div class="pergunta">
                <div class="nome-data">
                    <h1>Nome do Usuario</h1>
                    <p>dia/mes/ano</p>
                </div>

                <p class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad corrupti at et hic assumenda doloribus! Voluptatibus nobis corrupti nesciunt, esse magnam culpa velit beatae ipsa, mollitia commodi a! Unde, iste.</p>

                <div class="respostas">
                    <div class="respTxt">
                        <img src="../../IMG/kisspng-computer-icons-dialog-box-conversation-online-chat-dialogue-5abcd7505a9191.760984061522325328371.png" alt="">
                        <p>Respostas (1):</p>
                    </div>
                    <div class="resp-vend">
                        <div class="foto-nome-data">
                            <img src="../../IMG/vetor-guest.png" alt="">
                            <h3>Yuri Esteves</h3>
                            <p>dia/mes/ano</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quisquam deleniti officiis magnam quo beatae, dolores corporis omnis est voluptatem veniam error fugiat hic! Sequi, id omnis. Provident, doloremque eius.</p>
                    </div>
                </div>

            </div>
            <div class="pergunta">
                <div class="nome-data">
                    <h1>Nome do Usuario</h1>
                    <p>dia/mes/ano</p>
                </div>

                <p class="txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad corrupti at et hic assumenda doloribus! Voluptatibus nobis corrupti nesciunt, esse magnam culpa velit beatae ipsa, mollitia commodi a! Unde, iste.</p>

                <div class="respostas">
                    <div class="respTxt">
                        <img src="../../IMG/kisspng-computer-icons-dialog-box-conversation-online-chat-dialogue-5abcd7505a9191.760984061522325328371.png" alt="">
                        <p>Respostas (1):</p>
                    </div>
                    <div class="resp-vend">
                        <div class="foto-nome-data">
                            <img src="../../IMG/vetor-guest.png" alt="">
                            <h3>Yuri Esteves</h3>
                            <p>dia/mes/ano</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto quisquam deleniti officiis magnam quo beatae, dolores corporis omnis est voluptatem veniam error fugiat hic! Sequi, id omnis. Provident, doloremque eius.</p>
                    </div>
                </div>

            </div>
            
            `;

            conteudo.innerHTML = conteudoPerg;

            //NÃO MUDA NADA AQUI PELOAMORDEDEUS ISSO É UMA GAMBIARRA QUE EU FIZ

            //AQUI VAI TROCAR A COR E O TXT-DECOR PARA PRETO E NONE PARA QUE QUANDO CLICAR EM OUTRO BOTÃO TRANSFORME OS OUTROS BOTÕES EM TEXTO NORMAL, SERIO NAO MEXE AQUI

            botaoAV.style.color = 'var(--preto)';
            botaoAV.style.textDecoration = 'none';

            botaoDC.style.color = 'var(--preto)';
            botaoDC.style.textDecoration = 'none';

            botaoPE.style.color = 'var(--laranja)';
            botaoPE.style.textDecoration = 'underline';
            break;
        default:
            break;
    }
};
