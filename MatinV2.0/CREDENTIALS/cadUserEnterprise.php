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

<?php require_once '../BASE/config.php'; ?>
<?php include_once '../BASE/viaCep.php' ?>
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
        <button type="button" class="cadastroBtn" name="cadastrar" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Cadastrar sua conta</button>
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
                        <button type="submit" class="btn btn-primary" id="cadastrar1"
                            name="cadastrar1">Cadastrar</button>
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

if (isset($_REQUEST['cadastrar1'])) {
    // echo "<script>alert('FOI CRIA')</script>";
    $cep = $_REQUEST['cep'] ?? '';

    if ($cep != "") {
        $url = "https://viacep.com.br/ws/{$cep}/json/";

        $endereco = json_decode(file_get_contents($url));

        if (isset($endereco->erro)) {
            echo "<script>alert('digite um CEP válido!')</script>";
        } else {
            $nome = $_REQUEST['nome'] ?? '';
            $email = $_REQUEST['email'] ?? '';
            $senha = $_REQUEST['senha'] ?? '';
            $cnpj = $_REQUEST['cnpj'] ?? '';
            $cep = $_REQUEST['cep'] ?? '';
            $telefone = $_REQUEST['telefone'] ?? '';
            $senha = $_REQUEST['senha'] ?? '';
            $NR = $_REQUEST['NR'] ?? '';
            $comp = $_REQUEST['comp'] ?? '';

            if (!empty($nome && $email && $senha && $cep && $telefone && $NR && $comp) || !is_null($nome && $email && $senha && $cep && $telefone && $NR && $comp)) {
                try {

                    date_default_timezone_set('America/Sao_Paulo');

                    $currentDate = date('Y-m-d H:i:s');

                    if (!is_null($cnpj) || !empty($cnpj)) {
                        echo "<script>console.log('foi até aqui')</script>";
                        $selectQ = "SELECT * FROM usuario WHERE nomeUsu = :nome";
                        $selectP = $cx->prepare($selectQ);
                        $selectP->bindParam(":nome", $nome);
                        $selectP->execute();
                        $count = $selectP->rowCount();

                        if ($count == 0) {
                            echo "<script>console.log('foi até aqui')</script>";
                            $selectQ2 = "INSERT INTO usuario (nomeUsu, dataCriacao, emailUsu, TCIR, NRCIR, senhaUsu, telUsu, idCep, NR, comp)VALUES (:nome, :datacriacao, :email, 'CNPJ', :nrcir, :senha, :tel, :idcep, :NR, :comp)";
                            echo "<script>console.log('foi até aqui')</script>";

                            $selectP2 = $cx->prepare($selectQ2);
                            echo "<script>console.log('foi até aqui')</script>";

                            $selectP2->bindParam(':nome', $nome);
                            $selectP2->bindParam(':datacriacao', $currentDate);
                            $selectP2->bindParam(':email', $email);
                            $selectP2->bindParam(':nrcir', $cnpj);
                            $selectP2->bindParam(':senha', $senha);
                            $selectP2->bindParam(':tel', $telefone);
                            $selectP2->bindParam(':idcep', $cep);
                            $selectP2->bindParam(':NR', $NR);
                            $selectP2->bindParam(':comp', $comp);
                            echo "<script>console.log('foi até aqui')</script>";

                            $selectP2->execute();
                            
                            echo "<script>console.log('foi até aqui')</script>";
                        }
                    }
                } catch (PDOException $e) {
                    $erro = $e->getMessage();
                    echo "<script>alert($erro)</script>";
                }
            }
        }
    }
}



?>

<script>
// Obtém o elemento do botão de cadastro
const cadastrarBtn = document.getElementById('cadastrar1');

// Adiciona um evento de clique ao botão
cadastrarBtn.addEventListener('click', function() {
    // Obtém o valor do CEP do input
    const cep = document.getElementById('cepinp').value;

    // Verifica se o CEP não está vazio
    if (cep.trim() !== "") {
        // Faz a verificação do CEP no servidor antes de salvar no localStorage
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                // Verifica se o CEP é válido
                if (!data.erro) {
                    // Verifica se o navegador suporta localStorage
                    if (typeof(Storage) !== "undefined") {
                        // Salva o CEP no localStorage com uma chave específica
                        localStorage.setItem("cepUsuario", cep);
                        console.log('CEP salvo no localStorage: ' + cep);
                    } else {
                        // Se o navegador não suportar localStorage, exibe um aviso
                        console.log('Seu navegador não suporta localStorage.');
                    }
                } else {
                    console.log('CEP inválido.');
                }
            })
            .catch(error => {
                console.error('Erro ao verificar o CEP:', error);
            });
    } else {
        console.log('O campo de CEP está vazio.');
    }
});
</script>