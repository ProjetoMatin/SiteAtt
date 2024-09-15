<?php

require_once '../BASE/config.php';

$nome = $_REQUEST['nome'] ?? "";
$senha = $_REQUEST['senha'] ?? "";
$email = $_REQUEST['email'] ?? "";
$cpf = $_REQUEST['cpf'] ?? "";
$telefone = $_REQUEST['telefone'] ?? "";
$CEP = $_REQUEST['CEP'] ?? "";
$Numero = $_REQUEST['Numero'] ?? "";
$SN = $_REQUEST['SN'] ?? "";
$Complemento = $_REQUEST['Complemento'] ?? "";
$escolha = $_REQUEST['escolha'] ?? "";
$InfoAdd = $_REQUEST['InfoAdd'] ?? "";

function inserirUsu($valorSwitch, $cx, $nome, $senha, $email, $cpf, $telefone, $CEP, $Numero, $SN, $Complemento, $escolha, $InfoAdd)
{

    switch ($valorSwitch) {
        case 1:
            if ($Numero) {
                try {

                    $diaAtual = date("Y-m-d");

                    if ($InfoAdd == "" || is_null($InfoAdd)) {
                        $InfoAdd = "S/C";
                    }
                    // echo "<script>alert('$cpf')</script>";

                    $insertQ = "INSERT INTO usuario (nome_usu, ativo, data_criacao, email_usu, senha_usu, tel_usu, fotos_usu, premium, NR, comp, TCIR, NRCIR, nvl_usu, Local_CEP, tipoLocal, infoAddLocal) VALUES ('$nome', '1', '$diaAtual', '$email', '$senha', '$telefone', 'sem_foto.png', '0', $Numero, '$Complemento', 'CPF', '$cpf', 'C', '$CEP', '$escolha', '$InfoAdd')";

                    $insertP = $cx->prepare($insertQ);
                    $insertP->execute();

                    echo "<script>location.href='loginUsu.php';</script>";

                    return true;
                } catch (PDOException $e) {
                    echo "<br>" . $e->getMessage() . "<br>";
                    return new Exception("Erro ao adicionar usuario!");
                } 
            } else {

                try {

                    $diaAtual = date("Y-m-d");

                    if ($InfoAdd == "" || is_null($InfoAdd)) {
                        $InfoAdd = "S/C";
                    }
                    // echo "<script>alert('$cpf')</script>";

                    $insertQ = "INSERT INTO usuario (nome_usu, ativo, data_criacao, email_usu, senha_usu, tel_usu, fotos_usu, premium, NR, comp, TCIR, NRCIR, nvl_usu, Local_CEP, tipoLocal, infoAddLocal) VALUES ('$nome', '1', '$diaAtual', '$email', '$senha', '$telefone', 'sem_foto.png', '0', 'S/N', '$Complemento', 'CPF', '$cpf', 'C', '$CEP', '$escolha', '$InfoAdd')";

                    $insertP = $cx->prepare($insertQ);
                    $insertP->execute();

                    echo "<script>location.href='loginUsu.php';</script>";

                    return true;
                } catch (PDOException $e) {
                    echo "<br>" . $e->getMessage() . "<br>";
                    return new Exception("Erro ao adicionar usuario!");
                }
            }
            break;
        case 0:
            break;
    }
}

function verifEndereco($cx, $CEP)
{
    $selectQ = "SELECT * FROM local WHERE CEP = :cep ";
    $selectP = $cx->prepare($selectQ);
    $selectP->bindParam('cep', $CEP);
    $selectP->execute();
    $RC = $selectP->rowCount();

    if ($RC == 0) {
        $endereco = getEnderecoByCEP($CEP);
        if ($endereco) {
            $cadEnd = cadastrarEndereco($endereco, $cx, $CEP);
            if ($cadEnd == true) {
                return true;
            }
        } else {
            throw new Exception("CEP não encontrado.");
            return false;
        }
    } else {
        return true;
    }
    echo "<br>" . $RC;
}

function cadastrarEndereco($endereco, $cx, $CEP)
{
    $logradouro = $endereco['logradouro'];
    $bairro = $endereco['bairro'];
    $localidade = $endereco['localidade'];
    $uf = $endereco['uf'];

    try {
        $insertQ = "INSERT INTO local (CEP, Logradouro, Bairro, Cidade, UF) VALUES (:cep, :logradouro, :bairro, :localidade, :uf)";
        $insertP = $cx->prepare($insertQ);
        $insertP->bindParam('cep', $CEP);
        $insertP->bindParam('logradouro', $logradouro);
        $insertP->bindParam('bairro', $bairro);
        $insertP->bindParam('localidade', $localidade);
        $insertP->bindParam('uf', $uf);
        $insertP->execute();

        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getEnderecoByCEP($CEP)
{
    $url = "https://viacep.com.br/ws/$CEP/json/";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (isset($data['erro']) && $data['erro'] == true) {
        return false;
    }

    return [
        'logradouro' => $data['logradouro'],
        'bairro' => $data['bairro'],
        'localidade' => $data['localidade'],
        'uf' => $data['uf']
    ];
}

echo $nome . $senha . $email . $cpf . $telefone . $CEP . $Numero . $SN . $Complemento . $escolha . $InfoAdd;

$selectQ = "SELECT * FROM usuario WHERE NRCIR = :cpf";
$selectP = $cx->prepare($selectQ);
$selectP->bindParam('cpf', $cpf);
$selectP->execute();
$RC = $selectP->rowCount();

$cepFormatado = str_replace("-", "", $CEP);

$NRCIRFormatado1 = str_replace(".", "", $cpf);
$NRCIRFormatado2 = str_replace("-", "", $NRCIRFormatado1);

$telFormatado1 = str_replace("(", "", $telefone);
$telFormatado2 = str_replace(")", "", $telFormatado1);

if ($RC == 0) {
    if ($SN == true || $SN == "on") {
        $verifEnd = verifEndereco($cx, $cepFormatado);

        if ($verifEnd) {
            inserirUsu(1, $cx, $nome, $senha, $email, $NRCIRFormatado2, $telFormatado2, $cepFormatado, $Numero, $SN, $Complemento, $escolha, $InfoAdd);
        }
    } else {
        $verifEnd = verifEndereco($cx, $cepFormatado);

        if ($verifEnd) {
            inserirUsu(1, $cx, $nome, $senha, $email, $NRCIRFormatado2, $telFormatado2, $cepFormatado, $Numero, $SN, $Complemento, $escolha, $InfoAdd);
        }
    }

    // echo "--->" . $Numero . $SN;
}
