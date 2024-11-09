<?php
// require_once 'autenticacao.php';
// require_once 'BASE/config.php';

// function pegarCEPUsuario($idUsu, $cx){
//     if($idUsu){
//         $selectQ = "SELECT * FROM usuario WHERE idUsu = :id ";
//         $selectP = $cx->prepare($selectQ);
//         $selectP->bindParam(':id', $idUsu);
//         $selectP->execute();

//         $dado = $selectP->fetch(PDO::FETCH_ASSOC);

//         return $dado['Local_CEP'];
//     }
// }

// function calcularFrete($dado, $cx)
// {
//     $idUsu = pegarIDUsuario(); // Supondo que você já tem uma função para pegar o ID do usuário

//     $CEP = pegarCEPUsuario($idUsu, $cx);

//     $cep_origem = '21610330'; // CEP de origem fixo (exemplo)
//     $cep_destino = $CEP; // CEP de destino do usuário

//     $peso = $dado['peso'];
//     $comprimento = $dado['comprimento'];
//     $largura = $dado['largura'];
//     $altura = $dado['altura'];

//     // Formato da URL da API dos Correios
//     $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
//     $url .= "nCdEmpresa=";
//     $url .= "&sDsSenha=";
//     $url .= "&sCepOrigem=" . $cep_origem;
//     $url .= "&sCepDestino=" . $cep_destino;
//     $url .= "&nVlPeso=" . $peso;
//     $url .= "&nCdFormato=1"; // Formato da encomenda (caixa)
//     $url .= "&nVlComprimento=" . $comprimento;
//     $url .= "&nVlAltura=" . $altura;
//     $url .= "&nVlLargura=" . $largura;
//     $url .= "&sCdMaoPropria=n";
//     $url .= "&nVlValorDeclarado=0";
//     $url .= "&sCdAvisoRecebimento=n";
//     $url .= "&nCdServico=40010,41106"; // Códigos de serviço: Sedex (40010) e PAC (41106)
//     $url .= "&nVlDiametro=0";
//     $url .= "&StrRetorno=xml";

//     // Faz a requisição HTTP
//     $xml = simplexml_load_file($url);

//     // Verifica se a requisição foi bem sucedida
//     if ($xml !== false) {
//         $frete_sedex = $xml->cServico[0]->Valor;
//         $prazo_sedex = $xml->cServico[0]->PrazoEntrega;

//         $frete_pac = $xml->cServico[1]->Valor;
//         $prazo_pac = $xml->cServico[1]->PrazoEntrega;

//         // Exibe os resultados (ou retorna, dependendo da sua aplicação)
//         echo "<h2>Resultados do Frete:</h2>";
//         echo "<p><strong>Sedex:</strong> R$ " . $frete_sedex . " - Prazo de entrega: " . $prazo_sedex . " dias úteis</p>";
//         echo "<p><strong>PAC:</strong> R$ " . $frete_pac . " - Prazo de entrega: " . $prazo_pac . " dias úteis</p>";
//     } else {
//         echo "Erro ao calcular o frete. Tente novamente mais tarde.";
//     }
// }

?>