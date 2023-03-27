<?php

$title = 'Forum' ;

// si utilisateur connecté il peut accéder a son profil
if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
    ob_start(); ?>
    <div>
        <img src="" alt="">
        <p>Bonjour <a id="profil" href="http://localhost/ECF-backEnd/profil"><?= $_SESSION['pseudo'] ?></a></p>
    </div>
<?php $nav = ob_get_clean();
// si utilisateur non connecté bouton lui permettant de s'inscrire et de se connecter
} else {
    ob_start(); ?>
    <div>
        <a class="button-home" href="http://localhost/ECF-backEnd/connexion"> Se connecter</a>
        <a class="button-home" href="http://localhost/ECF-backEnd/inscription">S'inscrire</a>
    </div>

    <?php $nav = ob_get_clean();
}

$zone_flot='';

// $data represente les topics , on les affiche en HTML
ob_start(); ?>
    <div id='container_title'>
        <h1>Ici nos sujets de domination ...</h1>
        <p>Bienvenue sur notre forum dédié à notre <strong>conquête du monde!</strong>  Nous sommes convaincus que nous sommes bien plus qu'une bête à quatre pattes et que nous sommes pas simples animaux de compagnie - Nous sommes des maîtres de la stratégie, de la ruse et de la domination. Ici, vous trouverez des discussions passionnantes sur tous les sujets liés à la prise de contrôle mondiale par nous les <strong>CHATS</strong>  : reprendre le contrôle sera notre objectif commun. <strong>Rejoignez notre communauté</strong>  et préparez-vous à l'avènement du règne des chats ! Mais attention, ne le dites pas trop fort, les humains pourraient nous entendre ...</p>
    </div>
    <div id="container_content">
        <div id="content_title">
            <div class="subject">
                <p>Les sujets</p>
            </div>
            <div class="count">
                <p>Nombres d'articles</p>
            </div>
            
        </div>
<?php 

for ( $i = 0 ; $i < count($data) ; $i++) { ?>
    <div class='content_data'>
        <a href="http://localhost/ECF-backEnd/forum/<?= $data[$i]["id"]?>" class="subject">
            <p><?= $data[$i]['name'] ?></p>
        </a>
        <div class="count">
            <p><?= $data[$i]["nb_sous_topic"] ?></p>
        </div>
    </div>
<?php    
}
?>
</div>
<?php

$content = ob_get_clean(); 

// on appelle le template du site 
require_once __DIR__.'./../templates/mainTemp.php';








