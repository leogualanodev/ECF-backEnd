<?php 

$title = 'chatForum' ;

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

ob_start(); ?>

    <div>
        <img src="" alt="">
    </div>
    <div>
        <p>Bienvenue sur le ChatForum, un forum pour la conquête du monde par la race feline</p>
        <a href="">Viens conquérir le monde</a>
    </div>

<?php $zone_flot= ob_get_clean();
$content = '';

require_once __DIR__.'./../templates/mainTemp.php';



