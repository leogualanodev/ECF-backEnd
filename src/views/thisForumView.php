<?php

$title = $data[0]['name'] ;
if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
    ob_start(); ?>
    <div>
        <img src="" alt="">
        <p>Bonjour <a id="profil" href="index.php?action=profil"><?= $_SESSION['pseudo'] ?></a></p>
    </div>
<?php $nav = ob_get_clean(); 
} else {
    ob_start(); ?>
    <div>
        <a class="button-home" href="./?action=connexion"> Se connecter</a>
        <a class="button-home" href="./?action=inscription">S'inscrire</a>
    </div>

    <?php $nav = ob_get_clean();
}


if (isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
    ob_start(); ?>
    <form action="" method='post'>
        <p>héhé</p>
        <input type="text">
    </form>

<?php
}
$zone_flot = ob_get_clean();
$content='super ca marche';



require_once __DIR__.'./../templates/mainTemp.php';