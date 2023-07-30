const primeiraPag = document.getElementById("primeiraPagCarrosel")
const segundaPag = document.getElementById("segundaPagCarrosel")

const btnPrimeira = document.getElementById("btnPrimeiraPag")
const btnSegunda = document.getElementById("btnSegundaPag")

function mudarSecao(numPag) {
  switch (numPag) {
    case 1:
      primeiraPag.classList.add("show")
      segundaPag.classList.remove("show")
      segundaPag.classList.add("hide")
  
      btnPrimeira.classList.add("ativo")
      btnSegunda.classList.remove("ativo")
      break
    case 2:
      primeiraPag.classList.remove("show")
      segundaPag.classList.add("show")
      primeiraPag.classList.add("hide")

      btnSegunda.classList.add("ativo")
      btnPrimeira.classList.remove("ativo")
    default:
      break
  }
  console.log(numPag)
}