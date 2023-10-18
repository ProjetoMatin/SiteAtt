<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" conteudo="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="shortcut icon" href="../../IMG/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/DASHBOARD/dashboard.css">
</head>

<body>
    <div class="conteiner">

        <?php

        
        require_once '../PAGS-REP/sidebar-dash.php';

        ?>

        <div class="cont-right">
            <?php
            require_once '../PAGS-REP/header-dash.php';

            ?>

            <main>
                <?php

                require_once '../BASE/ch_pages.php';

                ?>
            </main>
        </div>
    </div>
    
</body>

</html>