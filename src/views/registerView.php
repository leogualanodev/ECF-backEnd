<?php

$title = 'Inscription' ;

ob_start(); ?>

<div>
    <a href="./?action=connexion">Se connecter</a>
</div>
<?php
$nav = ob_get_clean();
$zone_flot = '';

ob_start(); ?>

<div>
    <form action="">
        <input type="text">
        <input type="text">
        <input type="password">
        <input type="submit">
    </form>
</div>

<?php 
$content = ob_get_clean();

require_once __DIR__.'./../templates/mainTemp.php';