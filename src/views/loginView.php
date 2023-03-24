<?php

$title = 'Connexion' ;

ob_start(); ?>

<div>
    <a class="button-home" href="./inscription">S'inscrire</a>
</div>
<?php
$nav = ob_get_clean();
$zone_flot = '';

ob_start(); ?>


<form id="login" action="index.php?action=connexion" method="post">
    <h1 id="h1_login">Un chat qui se connecte ..</h1>
    <?php if ( !empty($errors["error"])) { ?>
        <div class="erreur"> <?= $errors['error'] ?></div>
    <?php } ?>
    <div>
        <p>Pseudo :</p>
        <input type="text" name="pseudo">
        <p>Mot de passe :</p>
        <input type="password" name="password">
    </div>
    <input id="submit_login" type="submit" value="Se connecter">

</form>

<?php 
$content = ob_get_clean();

require_once __DIR__.'./../templates/mainTemp.php';