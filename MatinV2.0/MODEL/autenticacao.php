<?php 

function autenticar($idUsu){

    if(is_null($idUsu) || empty($idUsu)){
        echo "<script>window.location.href='CREDENTIALS/loginUsu.php?aviso=3'</script>";
        return false;
    }else{
        return true;
    }
}


?>