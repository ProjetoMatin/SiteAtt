<style>
    .input-encl {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .input-encl .input {
        margin-top: 20px;
    }

    .input-encl .input label {
        font-size: 1.3em;
    }

    .input-encl .input .spaninput {
        display: flex;
        align-items: center;
        margin-top: 10px;
        box-shadow: 1px;
    }

    .input-encl .input .spaninput span {
        padding: 10px;
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
        background-color: var(--verde00);
    }

    .input-encl .input .spaninput span img {
        width: 30px;
    }

    .input-encl .input .spaninput input {
        height: 54px;
        width: 300px;
        background-color: var(--cinza02) !important;
        outline: none !important;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
        border: none !important;
        font-size: 1.2em;
        padding: 0 15px;
    }

    button {
        display: block;
        margin: 100px auto 30px auto;
        background-color: var(--verde00);
        color: var(--branco00);
        padding: 20px 60px;
        font-size: 1.4em;
        cursor: pointer;
        border-radius: 15px;
        transition: all 0.2s ease-in-out;
    }

    button:active {
        background-color: var(--verdePressed);
    }

    .lifted {
        transform: scale(1.1);
        transition: transform 0.3s ease;
        background-color: var(--verde00) !important;
    }

    .modal-body {
        display: flex;
        flex-direction: column;
    }

    .modal-body #nrinp,
    .modal-body #compinp {
        font-size: 1em;
        outline: none !important;
        margin: 10px 0;
        padding: 5px;
        width: 200px;
        border-bottom: 1px solid var(--laranja00);
    }

    .btn-primary {
        background-color: var(--laranja00) !important;
        border: none !important;
    }
</style>

<?php require_once '../BASE/config.php'; ?>

<main>
    <div class="backbtn">
        <img src="../IMAGES/back.png" alt="" class="backbtnImg">
    </div>
    <div class="logo">
        <img src="../IMAGES/matin-logo-png.png" alt="">
        <h1>Mat-in</h1>

    </div>
    <h1 style="font-size: 1.5em; text-align:center; margin: 30px 0 !important;">Cadastro de novo usuario</h1>
    <hr>
    <form action="cadUserCommonAccount.php">
        <div class="input-encl">
            <div class="input">
                <label for="nomeinp">Nome:</label>
                <div class="spaninput">
                    <span><img src="../IMAGES/userBranco.png" alt=""></span>
                    <input type="text" required name="nome" id="nomeinp" placeholder="ex: Carlos Dos Santos">
                </div>
            </div>

            <div class="input">
                <label for="emailinp">Email:</label>
                <div class="spaninput">
                    <span><img src="../IMAGES/email.png" alt=""></span>
                    <input type="email" required name="email" id="emailinp" placeholder="seuemaillegal@gmail.com">
                </div>
            </div>

            <div class="input">
                <label for="cpfinp">CPF:</label>
                <div class="spaninput">
                    <span><img src="../IMAGES/buildingBranco.png" alt=""></span>
                    <input type="text" required name="cpf" id="cpfinp" placeholder="000.000.000-00">
                </div>
            </div>
        </div>

        <div class="input-encl">
            <div class="input">
                <label for="cepinp">CEP:</label>
                <div class="spaninput">
                    <span><img src="../IMAGES/home.png" alt=""></span>
                    <input type="text" required name="cep" id="cepinp" placeholder="00000-000">
                </div>
            </div>

            <div class="input">
                <label for="telinp">Telefone:</label>
                <div class="spaninput">
                    <span><img src="../IMAGES/phone-call.png" alt=""></span>
                    <input type="tel" required name="telefone" id="telinp" placeholder="(00) 00000-0000">
                </div>
            </div>

            <div class="input">
                <label for="senhainp">Senha:</label>
                <div class="spaninput">
                    <span><img src="../IMAGES/padlock.png" alt=""></span>
                    <input type="password" required name="senha" id="senhainp" placeholder="XXXXXXXXXXXXX">
                </div>
            </div>
        </div>

        <button type="button" class="cadastroBtn" name="cadastrar" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar sua conta</button>
        <p class="cadTxt" style="margin-top: 0px;">Já possui um cadastro? <a href="loginUsu.php" style="color: var(--laranja00)">Faça o login</a></p>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Endereço</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="number" required name="NR" id="nrinp" placeholder="Numero de Residência">
                        <input type="text" name="comp" id="compinp" placeholder="Complemento">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="cadastrar">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script>
    $(document).ready(function() {
        $('#cpfinp').mask('000.000.000-00');
        $('#telinp').mask('(00) 00000-0000');
        $('#cepinp').mask('00000-000');

        $(".cadastroBtn").hover(
            function() {
                $(this).addClass("lifted");
            },

            function() {
                $(this).removeClass("lifted");
            }
        )
    })

    const backbtnImg = document.querySelector(".backbtnImg");

    backbtnImg.addEventListener("click", () => {
        location.href = "cadastroUsu.php";
    })
</script>

<?php

$nome = $_REQUEST['nome'] ?? '';
$email = $_REQUEST['email'] ?? '';
$senha = $_REQUEST['senha'] ?? '';
$cpf = $_REQUEST['cpf'] ?? '';
$cep = $_REQUEST['cep'] ?? '';
$telefone = $_REQUEST['telefone'] ?? '';
$senha = $_REQUEST['senha'] ?? '';
$NR = $_REQUEST['NR'] ?? '';
$comp = $_REQUEST['comp'] ?? '';

if (!empty($nome && $email && $senha && $cep && $telefone && $NR && $comp) || !is_null($nome && $email && $senha && $cep && $telefone && $NR && $comp)) {
    try {

        date_default_timezone_set('America/Sao_Paulo');

        $currentDate = date('Y-m-d H:i:s');

        if (!is_null($cpf) || !empty($cpf)) {
            echo "<script>console.log('foi até aqui')</script>";
            $selectQ = "SELECT * FROM usuario WHERE nomeUsu = :nome";
            $selectP = $cx->prepare($selectQ);
            $selectP->bindParam(":nome", $nome);
            $selectP->execute();
            $count = $selectP->rowCount();

            if ($count == 0) {
                echo "<script>console.log('foi até aqui')</script>";
                $selectQ2 = "INSERT INTO usuario (nomeUsu, dataCriacao, emailUsu, TCIR, NRCIR, senhaUsu, telUsu, idCep, NR, comp)VALUES (:nome, :datacriacao, :email, 'CPF', :nrcir, :senha, :tel, :idcep, :NR, :comp)";
                echo "<script>console.log('foi até aqui')</script>";

                $selectP2 = $cx->prepare($selectQ2);
                echo "<script>console.log('foi até aqui')</script>";

                $selectP2->bindParam(':nome', $nome);
                $selectP2->bindParam(':datacriacao', $currentDate);
                $selectP2->bindParam(':email', $email);
                $selectP2->bindParam(':nrcir', $cpf);
                $selectP2->bindParam(':senha', $senha);
                $selectP2->bindParam(':tel', $telefone);
                $selectP2->bindParam(':idcep', $cep);
                $selectP2->bindParam(':NR', $NR);
                $selectP2->bindParam(':comp', $comp);
                echo "<script>console.log('foi até aqui')</script>";

                $selectP2->execute();
                echo "<script>console.log('foi até aqui')</script>";
                // header("Location: loginUsu.php?aviso=4");
                echo "<script>location.href='loginUsu.php?aviso=4'</script>";
            }
        }
    } catch (PDOException $e) {
        $erro = $e->getMessage();
        echo "<script>alert($erro)</script>";
    }
}

?>