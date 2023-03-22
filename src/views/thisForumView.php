<?php


var_dump($data);

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
ob_start(); ?>
<h1><?= $data[0]['name']?></h1>
<?php
if (isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){ ?>
    
    
    <form action="index.php?action=post&id=<?= $data[0]['id'] ?>" method='post'>
        <h2>Parle du sujet, lance toi !! </h2>
        <?php if ( !empty($errors["erreur"])) { ?>
                    <div class="erreur"> <?= $errors['erreur'] ?></div>
        <?php } ?>
        <p>Titre du topic :</p>
        <input type="text" placeholder="Votre titre" name='title'>
        <p>Votre question ou pensée ..</p>
        <textarea  name='description' cols="30" rows="5"></textarea>
        <input type="submit" value="Créer le sujet">
        
    </form>

<?php
}
$zone_flot = ob_get_clean();

if ( $data[0]["question"] === null){
    $content = '';
} else {
    ob_start();
    for ( $i = 0 ; $i < count($data) ; $i++ ) {?>
        <div>
            <div>
                <h3><?= $data[$i]['name_sous'] ?></h3>
                <p><?= $data[$i]['date_sous'] ?></p>
            </div>
            <div>
                <p><?= $data[$i]['question'] ?></p>
            </div>
            <div>
                <a href="./?action=discussion&id=<?= $data[$i]['id_sous']  ?>">Voir la discussion</a>
            </div>
        </div>

<?php
}
$content = ob_get_clean();
}




require_once __DIR__.'./../templates/mainTemp.php';