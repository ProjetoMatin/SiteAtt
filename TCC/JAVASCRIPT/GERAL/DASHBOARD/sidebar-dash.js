function trocarCont(id) {
  var contentElements = document.querySelectorAll('.content');
  for (var i = 0; i < contentElements.length; i++) {
    contentElements[i].style.display = 'none';
  }
  var selectedContent = document.getElementById(id);
  if (selectedContent) {
    selectedContent.style.display = 'block';
  }
}

window.addEventListener('DOMContentLoaded', function () {
  // Mostrar "content1" por padrão
  trocarCont('content3');
});