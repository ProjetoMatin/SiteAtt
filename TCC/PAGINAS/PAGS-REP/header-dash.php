<!-- BOOTSTRAP ESTÁ NO ARQUIVO BASICO.CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<link rel="stylesheet" href="../../STYLES/GERAL/header-dash.css">

<header>
    <nav class="nav nav-pills nav-justified">
        <a href="../PRINCIPAL/index.php">
            <div class="logo-encl">
                <figure>
                    <img src="../../IMG/logo.png" alt="">
                </figure>
                <h1>Mat-in</h1>
            </div>
        </a>

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

        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
            <img src="../../IMG/menu.png" alt="" >
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLabel">DashBoard</h5>
                <img src="../../IMG/close.png" alt="" style="cursor: pointer; width: 25px;" data-bs-toggle="offcanvas">
            </div>
            <div class="offcanvas-body">
                <div class="list-group">
                    <a href="../DASHBOARD/adminDash.php" class="list-group-item list-group-item-action active" aria-current="true">
                        <img src="../../IMG/back.png" alt="">DashBoard
                    </a>
                    <a href="../PRINCIPAL/index.php" class="list-group-item list-group-item-action"><img src="../../IMG/home.png" alt="">Home</a>
                    <a href="../PRINCIPAL/carrinho.php" class="list-group-item list-group-item-action"><img src="../../IMG/shopping-cart.png" alt="">Carrinho</a>
                    <a href="../PRINCIPAL/login.php" class="list-group-item list-group-item-action"><img src="../../IMG/logout.png" alt="">Sair</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>