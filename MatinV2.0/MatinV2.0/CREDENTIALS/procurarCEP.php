<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mat-in</title>
    <link rel="stylesheet" href="../ASSETS/GERAL.css">
    <link rel="stylesheet" href="../ASSETS/CREDENTIALS/procurarCEP.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="../IMAGES/matin-logo-png.png" type="image/x-icon">
</head>

<body>
    <?php require_once '../BASE/headerCredentials.php'; ?>
    <?php

    $pg = $_REQUEST['pg'] ?? "";
    $nome = $_REQUEST['nome'] ?? "";
    $senha = $_REQUEST['senha'] ?? "";
    $email = $_REQUEST['email'] ?? "";
    $cpf = $_REQUEST['cpf'] ?? "";
    $telefone = $_REQUEST['telefone'] ?? "";

    echo "<script>
        localStorage.setItem('nome', '" . $nome . "');
        localStorage.setItem('senha', '" . $senha . "');
        localStorage.setItem('email', '" . $email . "');
        localStorage.setItem('cpf', '" . $cpf . "');
        localStorage.setItem('telefone', '" . $telefone . "');
    </script>";

    if ($pg == 1) {
    ?>
        <main>
            <script>alert('TERMINAR!');</script>
            <h1 id="titulo">Buscar CEP</h1>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                <div class="inputs-encl">
                    <div class="input">
                        <input type="hidden" name="pg" value="2">
                        <label for="Endereco">Endereço</label>
                        <input type="text" name="Endereco" id="Endereco" placeholder="UF, Municipio, Bairro (Ex: RJ, Realengo, )">
                        <p class="aviso">Não utilize número de casa, apartamento, lote, prédio ou abreviatura.</p>
                    </div>

                    <input type="submit" value="Buscar">
                </div>
            </form>
        </main>

    <?php

    } else if ($pg == 2) {

        // Função para separar a string em variáveis
        function separarString($string) {
            // Usa a função explode para dividir a string por vírgula
            $partes = explode(',', $string);

            // Verifica se há exatamente 3 partes
            if (count($partes) == 3) {
                // Atribui cada parte a uma variável
                $variavel1 = trim($partes[0]);
                $variavel2 = trim($partes[1]);
                $variavel3 = trim($partes[2]);

                // Retorna as variáveis como um array associativo
                return [
                    'variavel1' => $variavel1,
                    'variavel2' => $variavel2,
                    'variavel3' => $variavel3
                ];
            } else {
                // Lança um erro se a string não tiver exatamente 3 partes
                throw new Exception("O texto deve ser formatado dessa forma: 'UF, MUNICIPIO, BAIRRO'.");
            }
        }

        // Função para buscar o endereço na API ViaCEP
        function buscarEndereco($uf, $cidade, $bairro) {
            // Codifica os parâmetros para serem usados na URL
            $uf = urlencode($uf);
            $cidade = urlencode($cidade);
            $bairro = urlencode($bairro);

            // Constroi a URL de consulta para a API ViaCEP
            $url = "https://viacep.com.br/ws/$uf/$cidade/$bairro/json/";
            
            // Busca o conteúdo da URL
            $response = @file_get_contents($url);

            // Verifica se a resposta é nula
            if ($response === FALSE) {
                return null;
            }

            // Decodifica o JSON da resposta
            return json_decode($response, true);
        }

        $endereco = $_REQUEST['Endereco'] ?? "";

        try {
            $resultado = separarString($endereco);

            // Imprime as variáveis separadas
            $uf = $resultado['variavel1'];
            $cidade = $resultado['variavel2'];
            $bairro = $resultado['variavel3'];

            // Busca o endereço na API ViaCEP
            $enderecos = buscarEndereco($uf, $cidade, $bairro);

        ?>
            <main>
                <h2 id="titulo" style="font-weight: normal;">Resultados encontrados para:</h2>
                <h1 id="titulo"> <?php echo htmlspecialchars($endereco, ENT_QUOTES, 'UTF-8') ?> </h1>

                <?php
                if (!empty($enderecos) && !isset($enderecos['erro'])) {
                    echo "<h2>Endereços encontrados:</h2>";
                    foreach ($enderecos as $endereco) {
                        echo "<p>CEP: " . htmlspecialchars($endereco['cep'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>Logradouro: " . htmlspecialchars($endereco['logradouro'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>Bairro: " . htmlspecialchars($endereco['bairro'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>Cidade: " . htmlspecialchars($endereco['localidade'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<p>UF: " . htmlspecialchars($endereco['uf'], ENT_QUOTES, 'UTF-8') . "</p>";
                        echo "<hr>";
                    }
                } else {
                    echo "<p style='text-align: center; color: red; margin-top: 30px;'>Nenhum endereço encontrado para os dados fornecidos.</p>";
                }
                ?>

            </main>

        <?php
        } catch (Exception $e) {
            // Captura e exibe qualquer exceção lançada
            echo '<p style="color: red;">Erro: ' . $e->getMessage() . '</p>';
        }

    }
    ?>
</body>

</html>
