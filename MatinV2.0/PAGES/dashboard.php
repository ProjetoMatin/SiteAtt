<?php 

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link rel="stylesheet" href="../ASSETS/PAGINAS-CSS/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    <?php session_start(); ?>
    <?php require_once '../MODEL/autenticacao.php';?>
    <?php 

    $idUsu = pegarIDUsuario();

    $sair = $_REQUEST['sair'] ?? ""; 
    
    if($sair == 'true'){
        session_destroy();
        header("Location: ../index.php");
    }

    ?>
    <?php require_once '../BASE/config.php'?>
    <div class="container">

        <div class="sidebar">
            <?php require_once 'DASHBOARD/sidebarDash.php' ?>
        </div>

        <main>
            <?php require_once 'DASHBOARD/headerDash.php'; ?>

            <?php require_once '../BASE/chPagesDashboard.php';?>
        </main>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>