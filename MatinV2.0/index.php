<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="stylesheet" href="ASSETS/GERAL.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="IMAGES/matin-logo-png.png" type="image/x-icon">
</head>

<body>

    <?php 

    session_start();

    $config = $_REQUEST['config'] ?? "";
    
    if($config == "sair"){
        session_destroy();
        header("Location: CREDENTIALS/loginUsu.php?aviso=3");
    }
    
    ?>

    <?php
    require_once 'BASE/config.php';
    require_once 'BASE/header.php';
    require_once 'BASE/chPages.php';

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>