<link rel="stylesheet" href="../../STYLES/GERAL/basico.css">
<link rel="stylesheet" href="../../STYLES/GERAL/header.css">
<header>
    <div class='logodiv'>
        <a href="../PRINCIPAL/index.php">
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
            <a href='../PRINCIPAL/carrinho.php'>
                <img src='../../IMG/cart.png' alt=''>
            </a>
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
        <figure>
            <img src='../../IMG/admin-icon-branco.png' alt=''>
        </figure>
        <a href='#'>
            <p>Admin</p>
        </a>
    </div>

    <nav>
        <ul>
            <li><a href='#'>Categorias</a></li>
            <li><a href='#'><img src='../../IMG/estrela-branco.png' alt=''>Favoritos</a></li>
            <li><a href='#'>Histórico</a></li>
            <li><a href='#'>Contato</a></li>
        </ul>
    </nav>

    <div class='cepbtn'>
        <div class='divcpf'>
            <a href='#'>
                <p>Informe seu</p>
            </a>
            <a href='#' id='CEPletra'>
                <p>CEP</p>
            </a>
        </div>
        <figure>
            <a href='#'><img src='../../IMG/cep-icon-vetor-branco.png' alt=''></a>
        </figure>
    </div>
</aside>