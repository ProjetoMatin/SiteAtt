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
}

$tipoRelatorio = $_REQUEST['tipoRelatorio'] ?? "";
$recibo = $_REQUEST['recibo'] ?? "";
date_default_timezone_set("America/Sao_Paulo");
$dataAtual = date("d-m-Y_H-m-s");
$idUsu = $_REQUEST['idUsu'] ?? ""; 
// echo $dataAtual;
$titulo = $_REQUEST['titulo'] ?? "";

switch ($tipoRelatorio) {
    case 'compra':
        $sql = "
    SELECT 
        p.idProduto, 
        p.nome_prod, 
        p.qnt_vendas, 
        np.situacao, 
        np.qnt_pedida, 
        np.tipoqnt_ped, 
        uv.nome_usu AS vendedor, 
        uc.nome_usu AS comprador
    FROM produto p
    JOIN npedido np ON p.idProduto = np.idProduto
    JOIN usuario uv ON np.idUsuVendedor = uv.idUsu
    JOIN usuario uc ON np.idUsuComprador = uc.idUsu
";
        break;

    default:
        header("Location: ../dashboard.php");
        break;
}


$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ------------------------------------------------------------------------------------------------------

//HTML

// ------------------------------------------------------------------------------------------------------

$h = "<div style='text-align:right;'>Página {PAGENO} de {nbpg}</div>";

$fornecedor = "DISTRIBUIDORA Mat-In PRODUTOS AGRONOMOS Ltda.";


$html = "
<fieldset> " . $dataAtual . "

<div class='header'>
    <div class='titulo'><h2>SRMI - Sistema de Relatório Mat-In</h2></div>

</div>

</div>

<div class='main'>
    <div class='tituloRel'><h1>" . $titulo . "</h1></div>

    <div class='referencia'>
    
        <h4>
            <div class='ref1'>Recibo: " . $recibo . " </div>
			<div class='ref2'>Fornecedor: " . $fornecedor . "</div>
        </h4>

    </div>
</div>

<hr>

";

switch ($tipoRelatorio) {
    case 'compra':

        $html .= "

<div class='dados'>
    <table class='fontedados' cellspacing='2' cellpadding='2' width='100%'>
   
        <tr>
            <th width='10%'>Código</th>
            <th width='20%'>Produto</th>
            <th width='10%'>Vendedor</th>
            <th width='10%'>Comprador</th>
            <th width='10%'>Situação</th>
            <th width='10%'>Qnt.</th>
            <th width='10%'>Preço</th>
        </tr>";

        foreach ($produtos as $produto) {
            $html .= "
        <tr>
            <td>{$produto['idProduto']}</td>
            <td>{$produto['nome_prod']}</td>
            <td>{$produto['vendedor']}</td>
            <td>{$produto['comprador']}</td>
            <td>{$produto['situacao']}</td>
            <td>{$produto['qnt_pedida']} {$produto['tipoqnt_ped']}</td>
            <td>R\$ {$produto['qnt_vendas']}</td>
        </tr>";
        }
        break;

    default:
        break;
}


$html .= "
    </table>
</div>
<br>

</fieldset>
";

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
$mpdf->OutputFile(__DIR__ . "/RELATORIO-USUARIO/" . $tipoRelatorio . "-(" . $idUsu . ")-" . $dataAtual . ".pdf");
$mpdf->Output();
