<?php




$title = $data[0]['name'] ;
if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){
    ob_start(); ?>
    <div>
        <img src="" alt="">
        <p>Bonjour <a id="profil" href="http://localhost/ECF-backEnd/profil"><?= $_SESSION['pseudo'] ?></a></p>
    </div>
<?php $nav = ob_get_clean(); 
} else {
    ob_start(); ?>
    <div>
        <a class="button-home" href="http://localhost/ECF-backEnd/connexion"> Se connecter</a>
        <a class="button-home" href="http://localhost/ECF-backEnd/inscription">S'inscrire</a>
    </div>

    <?php $nav = ob_get_clean();
}
ob_start(); ?>
<h1 id="h1_forum"><?= $data[0]['name']?> ..</h1>
<?php
if (isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){ ?>
    
    <!-- si user connecté , formulaire de création d'un sous topic -->
    <form id="form_post" action="http://localhost/ECF-backEnd/?action=post&id=<?= $data[0]['id'] ?>" method='post'>
        <h2>Parle du sujet, lance toi !! </h2>
        <?php if ( !empty($errors["erreur"])) { ?>
                    <div class="erreur"> <?= $errors['erreur'] ?></div>
        <?php } ?>
        <p>Titre du topic :</p>
        <input class='inputs_post' type="text" placeholder="Votre titre" name='title'>
        <p>Votre question ou pensée ..</p>
        <textarea class="inputs_post"  name='description' cols="30" rows="5"></textarea>
        <input id="button_post" type="submit" value="Créer le sujet">
        
    </form>

<?php
}
$zone_flot = ob_get_clean();

if ( $data[0]["question"] === null){
    $content = '';
} else {
    ob_start(); ?>
    <h2 id="h2_soustopic">Les différents sujet de nos amis Félins :</h2>
    <div id="container_soustopic">
    <!-- on affiche les sous topics -->
 <?php   for ( $i = 0 ; $i < count($data) ; $i++ ) {
        $new_date = date(" d-m-Y à H:i", strtotime($data[$i]['date_sous']));?>
        <div class="soustopic">
            <div>
                <h3><?= $data[$i]['name_sous'] ?></h3>
                <p class="date_soustopic">le<?= $new_date ?></p>
            </div>
            <div class="question">
                <p><?= $data[$i]['question'] ?></p>
            </div>
            <div>
                <a href="http://localhost/ECF-backEnd/discussion/<?= $data[$i]['id_sous']  ?>">Voir</a>
            </div>
        </div>
    

<?php
}
?>
</div>
<?php
$content = ob_get_clean();
}




require_once __DIR__.'./../templates/mainTemp.php';