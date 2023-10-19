<!-- BOOTSTRAP ESTÁ NO ARQUIVO BASICO.CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../../STYLES/GERAL/basico.css">
<link rel="stylesheet" href="../../STYLES/GERAL/header.css">
<header>
    <div class='logodiv'>
        <a href="../PRINCIPAL/home.php">
            <figure>
                <img src='../../IMG/logo.png' alt=''>
            </figure>
            <h1>Mat-in</h1>
        </a>
    </div>

    <div class='pesquisadiv'>

        <select name='pesquisaFiltro' id='pesquisaFiltro'>
            <option value='todos'>Todos</option>
            <option value='op1'>Op1</option>
            <option value='op2'>Op2</option>
            <option value='op3'>Op3</option>
            <option value='op4'>Op4</option>
        </select>

        <input type='search' name='pesquisar' id='pesquisar' placeholder='Buscar produtos, marcas e muito mais...'>

        <figure>
            <img src='../../IMG/search-icon-vetor-branco.png' alt=''>
        </figure>
    </div>

    <div class='logindiv'>

        <figure id='cart-btn'>
            <img src='../../IMG/cart.png' alt='' onclick="trocapag(2)">

        </figure>

        <div class='loginbtn'>
            <figure>
                <a href='../PRINCIPAL/login.php'>
                    <img src='../../IMG/guest-vetor-branco.png' alt=''>
                </a>
            </figure>
            <a href='../PRINCIPAL/login.php'>Login</a>
        </div>
    </div>
</header>

<aside>
    <div class='adminbtn'>
        <a href="../DASHBOARD/adminDash.php">
            <figure>
                <img src='../../IMG/admin-icon-branco.png' alt=''>
            </figure>
            <a href='../DASHBOARD/adminDash.php?page=dash_ini'>
                <p>Admin</p>
            </a>
        </a>
    </div>

    <nav>
        <ul>
            <li><a href='#'>Categorias</a></li>
            <li><a href='../PRINCIPAL/favoritos.php'><img src='../../IMG/estrela-branco.png' alt=''>Favoritos</a></li>
            <li><a href='#'>Histórico</a></li>
            <li><a href='../PRINCIPAL/contato.php'>Contato</a></li>
        </ul>
    </nav>

    <div class='cepbtn'>
        <button onclick="return btnCEP(0)" id='CEPletra'>
            <div class='divcpf'>
                <p>Informe seu</p>
                <p id="cepTxt">CEP</p>
            </div>
            <figure>
                <a href='#'><img src='../../IMG/cep-icon-vetor-branco.png' alt=''></a>
            </figure>
        </button>

        <div class="txtCEP">
            <input type="text" name="cep" id="cep" min='0'>
            <button class="confirm" onclick="return btnCEP(1)">
                <p>OK</p>
            </button>
        </div>
    </div>

</aside>

<!-- SCRIPT QUE SERVE PARA QUE QUANDO CLICADO NO BOTÃO DE CEP, APARECER UMA CAIXA DE DIÁLOGO PARA O USUARIO INFORMAR O CEP, E SALVAR EM UM LOCALSTORAGE! (4 - YURI - me-leia-dev) -->

<script>
    function btnCEP(value) {
        let cepL = document.querySelector('#CEPletra');
        let txtC = document.querySelector('.txtCEP');
        if (value == 0) {
            cepL.style.display = 'none';
            txtC.style.display = 'flex';
        } else if (value == 1) {
            let inpuser = document.querySelector('#cep').value
            let regex = /^[0-9]+$/;

            if (regex.test(inpuser) || inpuser != '') {
                cepL.style.display = 'flex';

                //
                // CORRIGIR ISSO AQUI
                //

                localStorage.setItem('cepInput', inpuser);
                txtC.style.display = 'none';

            } else {
                alert("Preencha o campo somente com numeros!");
            }

        }
    }
</script>

<script src="../../JAVASCRIPT/GERAL/trocapag.js"></script>