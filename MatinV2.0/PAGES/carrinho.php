<?php require_once 'MODEL/autenticacao.php'; ?>
<?php require_once 'BASE/viaCep.php'?>

<?php 

$idUsu = $_SESSION['idUsu'] ?? "";

//METODO AUTENTICAÇÃO
$verifUsu = autenticar($idUsu);



?>
