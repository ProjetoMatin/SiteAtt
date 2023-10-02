//AQUI VAI DIMINUIR UM NUMERO DA PÁGINA DE COMPRA DO PRODUTO
function diminuir(){
    
    let valorB = document.querySelector(".valorB");
    
    let transfNum = parseInt(valorB.innerText);
    
    let novaQnt = transfNum - 1;
    
    if(novaQnt < 0){
        valorB.innerHTML = 0;
    }else{
        valorB.innerHTML = novaQnt;
    }
    
}

//AQUI VAI AUMENTAR UM NUMERO DA PÁGINA DE COMPRA DO PRODUTO
function aumentar(){
    
    let valorB = document.querySelector(".valorB");

    let transfNum = parseInt(valorB.innerText);

    let novaQnt = transfNum + 1;

    valorB.innerHTML = novaQnt;
}