<style>
    .selos {
        display: flex;
    }

    .selos .selo img {
        width: 150px;
    }
</style>
<?php

$selectQ = "SELECT * FROM selos";
$selectP = $cx->prepare($selectQ);
$selectP->execute();

?>
<div class="selos">
    <?php
    while ($dados = $selectP->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="selo">
            <img src="IMAGES/<?= $dados['imagemSelo'] ?>" alt="">
        </div>
    <?php
    }
    ?>
</div>