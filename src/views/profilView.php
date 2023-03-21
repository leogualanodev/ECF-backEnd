<?php

$title = 'Profil' ;

ob_start(); ?>

<div>
    <a class="button-home" href="./?action=disconnect">Se déconnecter</a>
</div>
<?php
$nav = ob_get_clean();
$zone_flot = '';
// ici afficher les topics et les info de l'user

$content = 'ici les données du félin ; et ses topics';

require_once __DIR__.'./../templates/mainTemp.php';