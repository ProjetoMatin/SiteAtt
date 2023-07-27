function removerselecionado() {
    const buttons = document.querySelectorAll('.highlight-btn');
    buttons.forEach(button => {
        button.classList.remove("clicked");
    });
}


function highlightButton(btn) {
    removerselecionado();
    btn.classList.add("clicked");
}