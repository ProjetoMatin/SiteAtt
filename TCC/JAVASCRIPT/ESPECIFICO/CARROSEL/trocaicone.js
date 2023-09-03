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
            } else {
                iconeElemento.src = carrinhoAntigo;
                iconeElemento.setAttribute('data-icone-atual', carrinhoAntigo);
            }


        default:
            break;
    }

}