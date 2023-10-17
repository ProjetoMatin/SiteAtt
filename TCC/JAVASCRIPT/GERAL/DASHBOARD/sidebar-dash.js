function mostrarConteudo(parametro) {
  // Limitar o parâmetro aos valores de 1 a 4
  parametro = Math.min(Math.max(parametro, 1), 4);

  // Atualizar a URL com o novo parâmetro
  window.history.pushState({}, "", "?parametro=" + parametro);

  // Esconder todos os conteúdos
  const conteudos = document.querySelectorAll(".conteudo");
  conteudos.forEach(function (conteudo) {
    conteudo.style.display = "none";
  });

  // Mostrar o conteúdo correspondente ao parâmetro
  const conteudoSelecionado = document.getElementById("conteudo" + parametro);
  conteudoSelecionado.style.display = "block";
}

// Verificar o parâmetro na URL ao carregar a página
window.addEventListener("load", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const parametro = parseInt(urlParams.get("parametro")) || 1;
  mostrarConteudo(parametro);
});

