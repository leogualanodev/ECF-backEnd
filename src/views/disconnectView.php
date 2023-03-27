<?php

$title = 'Déconnexion' ;

ob_start(); ?>

<div>
    <a class="button-home" href="http://localhost/ECF-backEnd/connexion">Se connecter</a>
</div>
<?php
$nav = ob_get_clean();
$zone_flot = '';

ob_start(); ?>

<div>
    <p>A bientot petit chat ..</p>
</div>

<style>
    p {
        text-align:center;
    }
</style>

<?php 
$content = ob_get_clean();
require_once __DIR__.'./../templates/mainTemp.php';