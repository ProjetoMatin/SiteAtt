<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

<link rel="stylesheet" href="../../STYLES/GERAL/basico.css">

<style>
    nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: linear-gradient(to right, var(--verdeescuro), var(--verdeescuroTabela3));
        padding: 10px 15px;
        width: 100%;
    }

    a{
        margin: 0;
        text-decoration: none;
    }

    figure,
    h1 {
        margin: 0;
    }

    nav .logo,
    nav .usuario {
        display: flex;
        align-items: center;
    }

    nav .logo h1 {
        font-size: var(--ftamheader);
        color: var(--branco);
    }

    nav .usuario h1 {
        font-size: 1.2em;
        color: var(--branco);
    }

    .logo figure img {
        width: 50px;
    }

    .usuario figure img {
        width: 30px;
        margin-right: 5px;
    }
</style>

<nav>
    <a href="../PRINCIPAL/home.php">

        <div class="logo">
            <figure>
                <img src="../../IMG/logo.png" alt="Matin">
            </figure>
            <h1>Matin</h1>
        </div>
    </a>
    <div class="usuario">
        <figure>
            <img src="../../IMG/guest-vetor-branco.png" alt="">
        </figure>
        <h1>Yuri</h1>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>