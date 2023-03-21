<?php 

$title = 'chatForum' ;

if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
    ob_start(); ?>
    <div>
        <img src="" alt="">
        <p>Welcome <a href="">Léo</a></p>
    </div>
<?php $nav = ob_get_clean(); 
} else {
    ob_start(); ?>
    <div>
        <a href="./?action=connexion"> Se connecter</a>
        <a href="./?action=register">S'inscrire</a>
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



