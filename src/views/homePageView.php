<?php 

$title = 'chatForum' ;

if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
    ob_start(); ?>
    <div>
        <img src="" alt="">
        <p>Bonjour <a id="profil" href="./?action=profil"><?= $_SESSION['pseudo'] ?></a></p>
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
    
    
    <div id="container_zone_flot">
        <h1>Bienvenue sur le <span>ChatForum</span> , un forum pour la conquête du monde par la race feline</h1>
        <?php if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"]) ) { ?>
            <a href="./?action=forum">Viens conquérir le monde</a>
        <?php
        } else { ?>
            <a href="./?action=connexion">Viens conquérir le monde</a>
        <?php
        } ?>
        
    </div>

<?php $zone_flot= ob_get_clean();
ob_start(); ?>

        <div id="container_projet">
            <h2>Notre Projet les amis les chats ..</h2>
            <div>
                <figure>
                    <img src="./public/image/imports/cat_weapon.jpg" alt="">
                </figure>
                
                <p>Notre projet consiste à créer un forum de discussion en ligne dédié à la conquête de la race féline sur la race humaine. Ce forum sera exclusivement réservé aux chats et toute personne qui n'est pas un chat se verra interdire l'accès en se faisant griffer virtuellement.</br>
                </br>
                L'objectif de notre forum est de rassembler une communauté de chats pour échanger des idées, des stratégies et des expériences sur la manière de conquérir l'humanité. Nous souhaitons que notre site web soit un lieu de rencontre pour les chats du monde entier qui partagent la même ambition et la même vision.</br>
                </br>
                Notre site web offrira un espace de discussion ouvert où les membres pourront échanger leurs points de vue sur des sujets divers et variés. Les membres pourront également partager des astuces pour s'infiltrer dans les maisons humaines, pour les faire obéir et les convertir à la cause féline.</p>
            </div>
        </div>

<?php
$content = ob_get_clean();

require_once __DIR__.'./../templates/mainTemp.php';



