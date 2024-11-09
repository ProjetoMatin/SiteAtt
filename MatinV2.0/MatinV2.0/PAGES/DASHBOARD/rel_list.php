<style>
    #conteudo2 {
        padding: 30px;
    }

    h6 a {
        color: var(--preto);
        text-decoration: none;
    }

    mark {
        background-color: transparent !important;
        color: var(--verde02);
    }

    .search-bar {
        margin: 20px 0 !important;
    }

    .search-bar input {
        margin-right: 10px !important;
    }

    .local {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .local button {
        padding: 10px;
        background-color: var(--verde01);
        border-radius: 05px;
        color: var(--branco00);
    }

    .local button a {
        color: var(--branco00);
    }

    .slot {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .slot .rel {
        background-color: var(--branco00);
        padding: 20px;
        border-radius: 10px;
        width: 600px;
        margin-top: 15px;
    }

    .apagado {
        color: var(--cinza01);
        margin-top: 5px;
    }

    .pagination {
        margin: 20px 0;
    }

    .navigation {
        margin-top: 10px !important;
    }
</style>
<?php require_once '../BASE/alerts.php'; ?>

<?php

function voltarUmaPasta($path)
{
    return dirname($path);
}

function filtrarNome($nomeArquivo)
{
    $nomeNovo = explode("-", $nomeArquivo);
    return $nomeNovo[0];
}

function filtrarData($nomeArquivo)
{
    $nomeNovo0 = explode("z", $nomeArquivo);
    $nomeNovo1 = explode(".", $nomeNovo0[1]);
    $nomeNovo2 = explode("_", $nomeNovo1[0]);
    $nomeNovo3 = str_replace("-", "/", $nomeNovo2[0]);
    return $nomeNovo3;
}

$directory = voltarUmaPasta(__DIR__) . '/RELATORIO/RELATORIO-USUARIO/';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$limite = 4;
$inicio = ($pagina * $limite) - $limite;

$idUsuario = $_SESSION['idUsu'];
$limiteRelatorios = 5;

$query = "SELECT * FROM relatorios WHERE idUsu = :idUsu";
$selectQ = $cx->prepare($query);
$selectQ->bindParam(':idUsu', $idUsuario, PDO::PARAM_INT);
$selectQ->execute();
$RC = $selectQ->rowCount();

$queryPremium = "SELECT premium FROM usuario WHERE idUsu = :idUsu";
$stmtPremium = $cx->prepare($queryPremium);
$stmtPremium->bindParam(':idUsu', $idUsuario, PDO::PARAM_INT);
$stmtPremium->execute();
$isPremium = $stmtPremium->fetch(PDO::FETCH_ASSOC)['premium'];

if ($RC >= $limiteRelatorios && $isPremium == '0') {
    $podeGerarRelatorio = false;
    $mensagemErro = "Você atingiu o limite de $limiteRelatorios relatórios. Atualize para premium para gerar mais relatórios.";
} else {
    $podeGerarRelatorio = true;
}

?>

<div class="conteudo" id="conteudo2">
    <div class="top-cont">
        <div class="local">
            <h6><a href="../DASHBOARD/adminDash.php">Painel</a> > <mark>Relatórios</mark></h6>
        </div>
    </div>
    <div class="main-cont">
        <div class="main-tit">
            <img src="../../IMG/folder-preto.png" alt="">
            <h4>Lista de Relatórios Gerados (<?php echo $RC; ?>/5)</h4>
        </div>
    </div>

    <?php

    if (!$podeGerarRelatorio) {
    ?>
        <p class="txtVermelho"><?php echo $mensagemErro; ?>
            <?php
        } else {
            while ($dados = $selectQ->fetch(PDO::FETCH_ASSOC)) {
            ?>

        <div class="slot">
            <div class='rel'>
                <?php 
                
                $nomeNovo = filtrarNome($dados['nomeArquivo']);
                $data = filtrarData($dados['nomeArquivo']);
                $letraMaiuscula = ucfirst($nomeNovo);

                ?>
                <h6>Relatório de <?= $letraMaiuscula?></h6>
                <p class='apagado'>Nome arquivo: <?= $dados['nomeArquivo'] ?></p>
                <div class='flex-dir-esq'>
                    <p>Data emissão: <?= $data?></p>
                </div>
            </div>
        </div>

    <?php
            }
        }

    ?>

    
    <nav aria-label="Page navigation example" class="navigation">
        <ul class="pagination">
            <?php
            if ($pagina > 1) {
                echo "<li class='page-item'><a class='page-link' href='?page=rel_list&pagina=" . ($pagina - 1) . "'>Anterior</a></li>";
            }

            for ($i = 1; $i <= $RC; $i++) {
                $active = $i == $pagina ? "active" : "";
                echo "<li class='page-item $active'><a class='page-link' href='?page=rel_list&pagina=$i'>$i</a></li>";
            }

            if ($pagina < $RC) {
                echo "<li class='page-item'><a class='page-link' href='?page=rel_list&pagina=" . ($pagina + 1) . "'>Próximo</a></li>";
            }
            ?>
        </ul>
    </nav>
        </div>

        <script>
            function goToParentUrl(urlString) {
                let url = new URL(urlString);

                url.pathname = url.pathname.split('/').slice(0, -1).join('/');

                return url.href;
            }

            let currentUrl = "http://localhost/MatinV2.0/PAGES/DASHBOARD";
            let parentUrl = goToParentUrl(currentUrl);

            document.querySelectorAll('.rel').forEach(div => {
                div.addEventListener('click', function() {
                    const nomeArquivo = this.querySelector('.apagado').innerText.split(": ")[1].trim();
                    const caminhoArquivo = `${parentUrl}/RELATORIO/RELATORIO-USUARIO/${encodeURIComponent(nomeArquivo)}`;
                    let oi = `${encodeURIComponent(nomeArquivo)}`
                    console.log(oi)
                    // Cria um link temporário
                    console.log(caminhoArquivo);
                    const link = document.createElement('a');
                    link.href = caminhoArquivo;
                    link.download = nomeArquivo; // Define o nome do arquivo para download

                    // Adiciona o link ao DOM
                    document.body.appendChild(link);
                    link.click(); // Simula o clique no link para iniciar o download

                    // Remove o link do DOM
                    document.body.removeChild(link);
                });
            });
        </script>