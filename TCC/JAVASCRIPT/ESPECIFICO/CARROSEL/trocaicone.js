function trocaIcone(num, iconeElemento) {
    switch (num) {
        case 1:
            const coracaoAntigo = '../../IMG/heartpng.png';
            const coracaoNovo = '../../IMG/coracaoVermelho.png';
            let iconeAtualCoracao = iconeElemento.getAttribute('data-icone-atual') || coracaoAntigo;

            if (iconeAtualCoracao === coracaoAntigo) {
                iconeElemento.src = coracaoNovo;
                iconeElemento.setAttribute('data-icone-atual', coracaoNovo);
            } else {
                iconeElemento.src = coracaoAntigo;
                iconeElemento.setAttribute('data-icone-atual', coracaoAntigo);
            }
            break;
        case 2:
            const carrinhoAntigo = '../../IMG/cart.png';
            const certoNovo = '../../IMG/checked.png';
            let iconeCarrinhoAtual = iconeElemento.getAttribute('data-icone-atual') || carrinhoAntigo;

            if (iconeCarrinhoAtual === carrinhoAntigo) {
                iconeElemento.src = certoNovo;
                iconeElemento.setAttribute('data-icone-atual', certoNovo);


                const numConfetes = 10; 
                for (let i = 0; i < numConfetes; i++) {
                    const confeteElemento = document.createElement('div');
                    confeteElemento.classList.add('confete');
                    iconeElemento.parentElement.appendChild(confeteElemento);


                    confeteElemento.style.left = Math.random() * 100 + 'vw';
                    confeteElemento.style.top = Math.random() * 100 + 'vh';
                    confeteElemento.style.animationDuration = (Math.random() * 3 + 1) + 's';


                    confeteElemento.addEventListener('animationend', () => {
                        iconeElemento.parentElement.removeChild(confeteElemento);
                    });
                }
            } else {
                iconeElemento.src = carrinhoAntigo;
                iconeElemento.setAttribute('data-icone-atual', carrinhoAntigo);
            }


        default:
            break;
    }

}