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
        background-color: var(--laranja00);
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

    .input-encl .input .spaninput input:focus {
        border: 1px solid var(--laranja00) !important;
    }

    button {
        display: block;
        margin: 100px auto 30px auto;
        background-color: var(--laranja00);
        color: var(--branco00);
        padding: 20px 60px;
        font-size: 1.4em;
        cursor: pointer;
        border-radius: 15px;
        transition: all 0.2s ease-in-out;
    }

    button:active {
        background-color: var(--laranjaPressed);
    }

    .lifted {
        transform: scale(1.1);
        transition: transform 0.3s ease;
        background-color: var(--laranja00);
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

<?php require '../BASE/config.php'; ?>
<?php require '../BASE/viaCep.php'; ?>
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

    <form action="cadUserEnterprise.php">
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
                <label for="cnpjinp">CNPJ:</label>
                <div class="spaninput">
                    <span><img src="../IMAGES/buildingBranco.png" alt=""></span>
                    <input type="text" required name="cnpj" id="cnpjinp" placeholder="00.000.000/0000-00">
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
        </button>

        <p class="cadTxt" style="margin-top: 0px;">Já possui um cadastro? <a href="loginUsu.php">Faça o login</a></p>

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
                        <button type="submit" class="btn btn-primary" id="cadastrar1" name="cadastrar1">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="../JS/FIREBASE/realTimeDatabase.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script>
    $(document).ready(function() {
        $('#cnpjinp').mask('00.000.000/0000-00');
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
    });

    const backbtnImg = document.querySelector(".backbtnImg");

    backbtnImg.addEventListener("click", () => {
        location.href = "cadastroUsu.php";
    })
</script>

<?php

function criarBairro($cx, $endereco, $cepFormatado)
{

    try {
        $insertQ = "INSERT INTO local (CEP, Logradouro, Bairro, Cidade, UF) VALUES (:cep, :logradouro, :bairro, :cidade, :uf)";
        $insertP = $cx->prepare($insertQ);
        $insertP->bindParam(":cep", $cepFormatado);
        $insertP->bindParam(":logradouro", $endereco->logradouro);
        $insertP->bindParam(":bairro", $endereco->bairro);
        $insertP->bindParam(":cidade", $endereco->localidade);
        $insertP->bindParam(":uf", $endereco->uf);
        $insertP->execute();

        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "<script>window.location.href='loginUsu.php?aviso=5&brincadeira=true'</script>";

        return false;
    }
}


function criarusu($cx, $nome, $email, $senha, $cepFormatado, $telefone, $NR, $comp)
{
    try {
        $selectQ = "SELECT * FROM usuario WHERE NRCIR = :cpf";
        $selectP = $cx->prepare($selectQ);
        $selectP->bindParam(":cpf", $NR);
        $selectP->execute();
        $count = $selectP->rowCount();

        if ($count == 0) {
            date_default_timezone_set('America/Sao_Paulo');
            $currentDate = date('Y-m-d H:i:s');

            $insertQ = "INSERT INTO usuario(nome_usu, ativo, data_criacao, email_usu, senha_usu, tel_usu, fotos_usu, premium, NR, comp, TCIR, NRCIR, nvl_usu, Local_CEP) 
                        VALUES (:nome, '1', :dataCriacao, :email, :senha, :tel, 'sem_foto.png', '0', :NR, :comp, 'CNPJ', :cpf, 'C', :cep)";
            $insertP = $cx->prepare($insertQ);
            $insertP->bindParam(':nome', $nome);
            $insertP->bindParam(':dataCriacao', $currentDate);
            $insertP->bindParam(':email', $email);
            $insertP->bindParam(':cpf', $NR);
            $insertP->bindParam(':senha', $senha);
            $insertP->bindParam(':tel', $telefone);
            $insertP->bindParam(':cep', $cepFormatado);
            $insertP->bindParam(':NR', $NR);
            $insertP->bindParam(':comp', $comp);
            $insertP->execute();

            echo "<script>window.location.href='loginUsu.php'</script>";
        } else {
            echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

$nome = $_REQUEST['nome'] ?? '';
$email = $_REQUEST['email'] ?? '';
$senha = $_REQUEST['senha'] ?? '';
$cpf = $_REQUEST['cnpj'] ?? '';
$cep = $_REQUEST['cep'] ?? '';
$telefone = $_REQUEST['telefone'] ?? '';
$NR = $_REQUEST['NR'] ?? '';
$comp = $_REQUEST['comp'] ?? '';

if (isset($_REQUEST['cadastrar1'])) {

    echo "nome: " . $nome . "email: " . $email . "senha: " . $senha . "CEP: " . $cep . "Telefone: " . $telefone . "NR: " . $NR . "CPF: " . $cpf;


    if (!empty($nome) && !empty($email) && !empty($senha) && !empty($cep) && !empty($telefone) && !empty($NR) && !empty($cpf)) {

        $endereco = get_endereco($cep);

        if ($endereco->erro == "true") {
            echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";
            die();
        }

        $cepFormatado = str_replace("-", "", $cep);
        $NRCIRFormatado1 = str_replace(".", "", $cpf);
        $NRCIRFormatado2 = str_replace("-", "", $NRCIRFormatado1);
        $telFormatado1 = str_replace("(", "", $telefone);
        $telFormatado2 = str_replace(")", "", $telFormatado1);

        if (!empty($endereco)) {
            $selectQ = "SELECT * from local WHERE CEP = :cep";
            $selectP = $cx->prepare($selectQ);
            $selectP->bindParam(":cep", $cepFormatado);
            $selectP->execute();
            $count = $selectP->rowCount();

            echo $count;

            if ($count >= 1) {
                criarusu($cx, $nome, $email, $senha, $cepFormatado, $telFormatado2, $NRCIRFormatado2, $comp);
            } else {
                $criarBairroBoolean = criarBairro($cx, $endereco, $cepFormatado);
                if ($criarBairroBoolean == true) {
                    criarusu($cx, $nome, $email, $senha, $cepFormatado, $telFormatado2, $NRCIRFormatado2, $comp);
                } else {
                    echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";
                }
            }
        }
    } else {
        echo "<script>window.location.href='loginUsu.php?aviso=5'</script>";
    }
}
?>

?>