<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="stylesheet" href="../ASSETS/CREDENTIALS/cadastro.css">
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../IMAGES/matin-logo-png.png" type="image/x-icon">
</head>

<body>

    <?php require_once '../BASE/config.php'; ?>
    <?php require_once '../BASE/chPagesCad.php'; ?>

    <?php
    $page = $_REQUEST['page'] ?? '';

    if (empty($page) || $page == "verif") {
    ?>

        <main>
            <div class="logo">
                <img src="../IMAGES/matin-logo-png.png" alt="">
                <h1>Mat-in</h1>

            </div>
            <hr>

            <h1 class="h1cad">Como deseja se cadastrar?</h1>

            <div class="card-encl">
                <div class="card card1" style="width: 18rem;">
                    <img src="../IMAGES/building.png" class="card-img-top" alt="...">
                    <hr style="width: 100% !important; margin: 50px auto !important;">
                    <div class="card-body">
                        <h1 class="card-title">Empresa</h1>
                    </div>
                </div>

                <div class="card card2" style="width: 18rem;">
                    <img src="../IMAGES/user(1).png" class="card-img-top" alt="...">
                    <hr style="width: 100% !important; margin: 50px auto !important;">
                    <div class="card-body">
                        <h1 class="card-title">Conta Comum</h1>
                    </div>
                </div>
            </div>

            <p class="cadTxt">Já possui um cadastro? <a href="loginUsu.php">Faça login</a></p>
        </main>

    <?php
    }
    ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script>
    const logo = document.querySelector(".logo");
    const card1 = document.querySelector(".card1") ?? '';
    const card2 = document.querySelector(".card2") ?? '';

    logo.addEventListener("click", () => {
        location.href = "../index.php";
    });

    card1.addEventListener("click", () => {
        location.href = "?page=cadUserEnterpriseAccount";
    })

    card2.addEventListener("click", () => {
        location.href = "?page=cadUserCommonAccount";
    })

    $(document).ready(function() {
        $(".card1").hover(
            function() {
                $(this).addClass("lifted");
                // Salvar a imagem original
                $(this).data("original", $(this).find(".card-img-top").attr("src"));
                // Trocar a imagem
                $(this).find(".card-img-top").attr("src", "../IMAGES/buildingBranco.png");
            },
            function() {
                $(this).removeClass("lifted");
                // Restaurar a imagem original
                $(this).find(".card-img-top").attr("src", $(this).data("original"));
            }
        );

        $(".card2").hover(
            function() {
                $(this).addClass("lifted");
                // Salvar a imagem original
                $(this).data("original", $(this).find(".card-img-top").attr("src"));
                // Trocar a imagem
                $(this).find(".card-img-top").attr("src", "../IMAGES/userBranco.png");
            },
            function() {
                $(this).removeClass("lifted");
                // Restaurar a imagem original
                $(this).find(".card-img-top").attr("src", $(this).data("original"));
            }
        );
    });
</script>

</html>