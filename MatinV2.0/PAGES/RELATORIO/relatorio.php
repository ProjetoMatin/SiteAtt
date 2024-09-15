    <?php

    require_once __DIR__ . '../../../vendor/autoload.php';

    // ------------------------------------------------------------------------------------------------------
    //BANCO DE DADOS
    // ------------------------------------------------------------------------------------------------------

    $host = 'localhost';
    $db = 'matin';
    $user = 'root';
    $pass = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro de conexão: " . $e->getMessage());
        header("Location: ../dashboard.php");
    }

    $tipoRelatorio = $_REQUEST['tipoRelatorio'] ?? "";

    $idCat = explode("_", $tipoRelatorio);

    echo "<script>alert('" . $idCat[0] .  "');</script>";

    $recibo = $_REQUEST['recibo'] ?? "";
    date_default_timezone_set("America/Sao_Paulo");

    $dataAtual = date("Y-m-d");
    $dataInicio = date("Y-m-d", strtotime("-1 month"));

    $dataAtualFormatada = date("d/m/Y");
    $dataInicioFormatada = date("d/m/Y", strtotime("-1 month"));

    $idUsu = $_REQUEST['idUsu'] ?? "";
    $titulo = $_REQUEST['titulo'] ?? "";

    switch ($tipoRelatorio) {
        case 'venda':
            if ($idUsu == 1) { //ADM
                $sql = "
                SELECT 
                DATE(np.data_criacao) AS data_venda, 
                p.idProduto, 
                p.nome_prod, 
                np.qnt_pedida, 
                np.tipoqnt_ped, 
                p.preco_prod, 
                np.idNPedido AS NPedido,
                uv.nome_usu AS vendedor, 
                uc.nome_usu AS comprador
                FROM produto p
                JOIN npedido np ON p.idProduto = np.idProduto
                JOIN usuario uv ON np.idUsuVendedor = uv.idUsu
                JOIN usuario uc ON np.idUsuComprador = uc.idUsu
                WHERE np.situacao = 'CF' AND np.data_criacao >= DATE_SUB('$dataAtual', INTERVAL 1 MONTH)
                GROUP BY DATE(np.data_criacao), p.idProduto
                ORDER BY DATE(np.data_criacao) ASC
                ";
            } else { //USUARIO NORMAL
                $sql = "
                SELECT 
                DATE(np.data_criacao) AS data_venda, 
                p.idProduto, 
                p.nome_prod, 
                np.qnt_pedida, 
                np.tipoqnt_ped, 
                p.preco_prod, 
                np.idNPedido AS NPedido,
                uv.nome_usu AS vendedor, 
                uc.nome_usu AS comprador
                FROM produto p
                JOIN npedido np ON p.idProduto = np.idProduto
                JOIN usuario uv ON np.idUsuVendedor = uv.idUsu
                JOIN usuario uc ON np.idUsuComprador = uc.idUsu
                WHERE np.idUsuVendedor = '$idUsu' AND np.situacao = 'CF' AND np.data_criacao >= DATE_SUB('$dataAtual', INTERVAL 1 MONTH)
                GROUP BY DATE(np.data_criacao), p.idProduto
                ORDER BY DATE(np.data_criacao) ASC
                ";
            }


            $titRel = "Gerenciamento de vendas";
            $titbo01 = "RESUMO DE VENDAS";
            break;

        case 'usuario':
            if ($idUsu == 1) { //ADM
                $sql = "
                    SELECT
                    DATE(data_criacao) AS data_criacao,
                    idUsu,
                    nome_usu,
                    email_usu,
                    tel_usu,
                    ativo,
                    NRCIR
                    FROM usuario WHERE data_criacao >= DATE_SUB('$dataAtual', INTERVAL 1 MONTH)
                
                ";
            }

            $titRel = "Gerenciamento de Usuarios";
            $titbo01 = "RESUMO DE USUARIOS";
            break;

        case 'produtos':
            if ($idUsu == 1) { //ADM
                $sql = "
                    SELECT DATE(data_criacao_prod) AS data_criacao_prod, p.idProduto, p.nome_prod, cat.nome_cat, p.preco_prod, p.qnt_vendas, p.qnt_prod_estoque FROM produto p INNER JOIN categoria cat ON p.idCategoria = cat.idCategoria WHERE data_criacao_prod >= DATE_SUB('$dataAtual', INTERVAL 1 MONTH);
                ";
            } else { //USUARIO NORMAL
                $sql = "
                SELECT DATE(data_criacao_prod) AS data_criacao_prod, p.idProduto, p.nome_prod, cat.nome_cat, p.preco_prod, p.qnt_vendas, p.qnt_prod_estoque FROM produto p INNER JOIN categoria cat ON p.idCategoria = cat.idCategoria INNER JOIN cria c ON p.idProduto = c.idProduto WHERE data_criacao_prod >= DATE_SUB('$dataAtual', INTERVAL 1 MONTH) AND c.idUsu = '$idUsu';
            ";
            }
            $titRel = "Gerenciamento de Produtos";
            $titbo01 = "RESUMO DE PRODUTOS";
            break;

        case 'localizacao':
            if ($idUsu == 1) { //ADM   
                $sql = "SELECT l.CEP, l.Logradouro, l.Bairro, l.Cidade, l.UF, COUNT(u.idUsu) AS quantidade_usuarios FROM local l INNER JOIN usuario u ON l.CEP = u.Local_CEP GROUP BY l.CEP ORDER BY quantidade_usuarios DESC";

                $titRel = "Gerenciamento de Localizações";
                $titbo01 = "RESUMO DE PRODUTOS";
            }
            break;

        case $idCat[0] == "categorias": //CATEGORIAS
            if ($idUsu == 1) { //ADM 
                if ($idCat[1] != "geral") {
                    echo "<script>alert('" . $idCat[1] .  "');</script>";
                    $sql = "SELECT DATE(data_criacao_prod) AS data_criacao_prod, p.idProduto, p.nome_prod, cat.nome_cat, p.preco_prod, p.qnt_vendas, p.qnt_prod_estoque FROM produto p INNER JOIN categoria cat ON p.idCategoria = cat.idCategoria WHERE p.idCategoria = " . $idCat[1];
                } else {
                    $sql = "SELECT cat.nome_cat, COUNT(prod.idProduto) AS qnt_cat, prod.data_criacao_prod AS dt_cria, cat.qnt_vis FROM produto prod INNER JOIN categoria cat ON prod.idCategoria = cat.idCategoria GROUP BY prod.idCategoria";
                }

                $titRel = "Gerenciamento de Categorias";
                $titbo01 = "RESUMO DE CATEGORIAS";
            }
            break;
        default:
            // header("Location: ../dashboard.php");
            break;
    }

    $stmt = $pdo->query($sql);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $RC = $stmt->rowCount();
    $caminho_fotos = dirname(__DIR__, 2) . "/IMAGES/caixa.png";

    // ------------------------------------------------------------------------------------------------------
    //HTML
    // ------------------------------------------------------------------------------------------------------

    $h = "<div style='text-align:right;'>Página {PAGENO} de {nbpg}</div>";

    switch ($tipoRelatorio) {
        case 'venda':
            $html = "
            <fieldset>
            
                <h1 class='h1-header'>SRMI - Sistema de Relatório de Mat-In</h1>
            
                <h1 class='title'>$titRel</h1>
            
                <div class='bo01'> <!-- BorderOutline01 -->
                    <h2 class='titbo01'>$titbo01</h2>
                    <h3 class='periodo'>Periodo de: $dataInicioFormatada até $dataAtualFormatada</h3>
                    <h3 class='status'>Status: todos</h3>

                <table border='0' cellspacing='20' cellpadding='0'>
                <thead>
                    <tr>
                        <th>Data da Venda</th>
                        <th>Nº Pedido</th>
                        <th>Comprador</th>
                        <th>Quantidade</th>
                        <th>Total Produto</th>
                        <th>Frete</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
            ";

            $somaDeTudo = 0;
            foreach ($dados as $venda) {
                $dataVendaFormatada = date("d/m/Y", strtotime($venda['data_venda']));

                $formulaPrecoTotProd = $venda['preco_prod'] * $venda['qnt_pedida'];
                $frete = rand(0, 100);
                $formulaTotal = $formulaPrecoTotProd + $frete;
                $somaDeTudo = $somaDeTudo + $formulaTotal;

                $html .= "
                <tr>
                    <td>{$dataVendaFormatada}</td>
                    <td>{$venda['NPedido']}</td>
                    <td>{$venda['comprador']}</td>
                    <td>{$venda['qnt_pedida']}</td>
                    <td>R$ " . number_format($formulaPrecoTotProd, 2, ',', '.') . "</td>
                    <td>R$ " . number_format($frete, 2, ',', '.') . "</td>
                    <td>R$ " . number_format($formulaTotal, 2, ',', '.') . "</td>
                </tr>";
            }

            $html .= "
                    </tbody>
                </table>
                <hr>

                <div class='resumo'>
                    <p>Total de produtos emitidos: <strong>$RC</strong></p>
                    <p>Total Geral: R$" . number_format($somaDeTudo, 2, ',', '.') . "</p>
                </div>

                </div>

            </fieldset>";
            break;

        case 'usuario':

            $html = "
            <fieldset>
            
                <h1 class='h1-header'>SRMI - Sistema de Relatório de Mat-In</h1>
            
                <h1 class='title'>$titRel</h1>
            
                <div class='bo01'> <!-- BorderOutline01 -->
                    <h2 class='titbo01'>$titbo01</h2>
                    <h3 class='periodo'>Periodo de: $dataInicioFormatada até $dataAtualFormatada</h3>
                    <h3 class='status'>Status: todos</h3>

                <table border='0' cellspacing='20' cellpadding='0'>
                <thead>
                    <tr>
                        <th>Data Criação</th>
                        <th>Nº Usuario</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ativo</th>
                        <th>NRCIR</th>
                    </tr>
                </thead>
                <tbody>
                ";

            foreach ($dados as $usuario) {
                $dataFormatada = date("d/m/Y", strtotime($usuario['data_criacao']));
                $html .= "
                <tr>
                    <td>$dataFormatada</td>
                    <td>{$usuario['idUsu']}</td>
                    <td>{$usuario['nome_usu']}</td>
                    <td>{$usuario['email_usu']}</td>
                    <td>{$usuario['tel_usu']}</td>
                    <td>{$usuario['ativo']}</td>
                    <td>{$usuario['NRCIR']}</td>
                    
                </tr>";
            }

            $html .= "
                </tbody>
                </table>
                <hr>

                </div>

            </fieldset>
            ";

            break;

        case 'produtos':
            $html = "
            <fieldset>
            
                <h1 class='h1-header'>SRMI - Sistema de Relatório de Mat-In</h1>
            
                <h1 class='title'>$titRel</h1>
            
                <div class='bo01'> <!-- BorderOutline01 -->
                    <h2 class='titbo01'>$titbo01</h2>
                    <h3 class='periodo'>Periodo de: $dataInicioFormatada até $dataAtualFormatada</h3>
                    <h3 class='status'>Status: todos</h3>

                <table border='0' cellspacing='20' cellpadding='0'>
                <thead>
                    <tr>
                        <th>Data Criação</th>
                        <th>Nº Produto</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preco</th>
                        <th>Qnt. Vendas</th>
                        <th>Qnt. Estoque</th>
                    </tr>
                </thead>
                <tbody>
                ";

            foreach ($dados as $produtos) {
                $dataFormatada = date("d/m/Y", strtotime($produtos['data_criacao_prod']));
                $html .= "
                <tr>
                    <td>$dataFormatada</td>
                    <td>{$produtos['idProduto']}</td>
                    <td>{$produtos['nome_prod']}</td>
                    <td>{$produtos['nome_cat']}</td>
                    <td>{$produtos['preco_prod']}</td>
                    <td>{$produtos['qnt_vendas']}</td>
                    <td>{$produtos['qnt_prod_estoque']}</td>
                    
                </tr>";
            }

            $html .= "
                </tbody>
                </table>
                <hr>

                </div>

            </fieldset>";

            break;

        case 'localizacao':
            $html = "
            <fieldset>
            
                <h1 class='h1-header'>SRMI - Sistema de Relatório de Mat-In</h1>
            
                <h1 class='title'>$titRel</h1>
            
                <div class='bo01'> <!-- BorderOutline01 -->
                    <h2 class='titbo01'>$titbo01</h2>
                    <h3 class='periodo'>Periodo Completo</h3>
                    <h3 class='status'>Status: todos</h3>

                <table border='0' cellspacing='20' cellpadding='0'>
                <thead>
                    <tr>
                        <th>CEP</th>
                        <th>QPC (?)</th>
                        <th>Logradouro</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                    </tr>
                </thead>
                <tbody>
                ";

            foreach ($dados as $produtos) {
                $dataFormatada = date("d/m/Y", strtotime($produtos['data_criacao_prod']));
                $html .= "
                <tr>
                    <td>{$produtos['CEP']}</td>
                    <td>{$produtos['quantidade_usuarios']}</td>
                    <td>{$produtos['Logradouro']}</td>
                    <td>{$produtos['Bairro']}</td>
                    <td>{$produtos['Cidade']}</td>
                    <td>{$produtos['UF']}</td>
                    
                </tr>";
            }

            $html .= "
                </tbody>
                </table>
                <hr>

                <div class='explicacao'>
                    <p>QPCEP = Quantidade de Pessoas por CEP</p>
                </div>

                </div>

            </fieldset>";

            break;

        case $idCat[0] == "categorias": // CATEI GURIAS (categorias)
            if ($idCat[1] != "geral") {
                $html = "
            <fieldset>
            
                <h1 class='h1-header'>SRMI - Sistema de Relatório de Mat-In</h1>
            
                <h1 class='title'>$titRel</h1>
            
                <div class='bo01'> <!-- BorderOutline01 -->
                    <h2 class='titbo01'>$titbo01</h2>
                    <h3 class='periodo'>Periodo Completo</h3>
                    <h3 class='status'>Status: todos</h3>

                <table border='0' cellspacing='20' cellpadding='0'>
                <thead>
                    <tr>
                        <th>Data Criação</th>
                        <th>Nº Produto</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preco</th>
                        <th>Qnt. Vendas</th>
                        <th>Qnt. Estoque</th>
                    </tr>
                </thead>
                <tbody>
                ";

                foreach ($dados as $produtos) {
                    $dataFormatada = date("d/m/Y", strtotime($produtos['data_criacao_prod']));
                    $html .= "
                <tr>
                    <td>$dataFormatada</td>
                    <td>{$produtos['idProduto']}</td>
                    <td>{$produtos['nome_prod']}</td>
                    <td>{$produtos['nome_cat']}</td>
                    <td>{$produtos['preco_prod']}</td>
                    <td>{$produtos['qnt_vendas']}</td>
                    <td>{$produtos['qnt_prod_estoque']}</td>
                    
                </tr>";
                }

                $html .= "
                </tbody>
                </table>
                <hr>

                </div>

            </fieldset>";
            } else {
                $html = "
            <fieldset>
            
                <h1 class='h1-header'>SRMI - Sistema de Relatório de Mat-In $idCat</h1>
            
                <h1 class='title'>$titRel</h1>
            
                <div class='bo01'> <!-- BorderOutline01 -->
                    <h2 class='titbo01'>$titbo01</h2>
                    <h3 class='periodo'>Periodo Completo</h3>
                    <h3 class='status'>Status: todos</h3>

                <table border='0' cellspacing='20' cellpadding='0'>
                <thead>
                    <tr>
                        <th>Data Criação</th>
                        <th>Nome Categoria</th>
                        <th>QPCAT (?)</th>
                        <th>VPCAT (?)</th>
                    </tr>
                </thead>
                <tbody>
                ";

                foreach ($dados as $categorias) {
                    $dataFormatada = date("d/m/Y", strtotime($categorias['dt_cria']));
                    $html .= "
                <tr>
                    <td>$dataFormatada</td>
                    <td>{$categorias['nome_cat']}</td>
                    <td>{$categorias['qnt_cat']}</td>
                    <td>{$categorias['qnt_vis']}</td>
                    
                </tr>";
                }

                $html .= "
                </tbody>
                </table>
                <hr>

                <div class='explicacao'>
                    <p>QPCAT = Quantidade de Produtos por CATEGORIA</p>
                    <p>VPCAT = Visualizações Por CATEGORIA</p>
                </div>

                </div>

            </fieldset>";
            }


            break;
        default:
            # code...
            break;
    }

    $htmlfooter = "
            <hr>
            <div class='rodape'>Emissão: " . date('d/m/Y - H:i:s') . " </div>
        </fieldset>
        ";

    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => [190, 236],
        'orientation' => 'L',
        'default_font' => 'DejaVuSans'
    ]);

    $mpdf->SetDisplayMode('fullpage');
    $css = file_get_contents('../../ASSETS/PAGINAS-CSS/relatorio.css');

    $mpdf->WriteHTML($css, 1);

    $mpdf->SetHTMLHeader($h);
    $mpdf->SetHTMLFooter($htmlfooter);

    $mpdf->WriteHTML($html);
    $mpdf->Output();
    $mpdf->showImageErrors = true;
