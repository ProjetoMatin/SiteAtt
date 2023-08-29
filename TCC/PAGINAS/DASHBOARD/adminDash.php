<!DOCTYPE html>
<html lang="pt-br">
<!-- TERMINAR -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../STYLES/ESPECIFICO/adminDash.css">
    <style>
        #content1, #content2 {
            display: none;
        }
    </style>
</head>

<body>
    <?php
    require_once '../PAGS-REP/header-dash.php';
    require_once '../PAGS-REP/sidebar-dash.php';
    ?>

    <main>
        <main>
            <div id="content1">
                OI1
            </div>

            <div id="content2">
                OI2
            </div>
        </main>
    </main>

    <?php
    require_once '../PAGS-REP/footer-dash.php';
    ?>
</body>

</html>