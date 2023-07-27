function calcPreco(acao) {
    let inputQntProd = document.querySelector(".qnt_prod");
    let qntAtual = parseInt(inputQntProd.value);

    let InputValorAtual = document.querySelector(".precoNov");
    let valorAtual = parseFloat(InputValorAtual.value.replace(",", "."));

    let InputValorTotal = document.querySelector(".subtotal");
    let valorTotal = parseFloat(InputValorTotal.value.replace(",", "."));

    switch (acao) {
        case "diminuir":
            if (qntAtual <= 0) {
                alert("Não tem como diminuir!");
            } else {
                qntAtual--;
                inputQntProd.value = qntAtual;
                valorTotal = qntAtual * valorAtual;
                InputValorTotal.value = valorTotal.toFixed(2).toString().replace(".", ",");
            }
            break;
        case "aumentar":
            qntAtual++;
            inputQntProd.value = qntAtual;
            valorTotal = qntAtual * valorAtual;
            InputValorTotal.value = valorTotal.toFixed(2).toString().replace(".", ",");
            break;
        default:
            break;
    }
}