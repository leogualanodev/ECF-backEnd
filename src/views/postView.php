<?php

$newdate = date(" d-m-Y à H:i", strtotime($data[0]['date_sous']));


$title = '';

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


$zone_flot = '';

ob_start(); ?>

    <div class="container_discussion">
        <div id="img_pseudo">
            <div id="flex_image">
                <img src="./public/image/imports/<?= $info[0]['avatar']?>" alt="">
                <p> <?= $info[0]["pseudo"] ?></p>
            </div>
            <div>
                <p>le <?= $newdate ?></p>
            </div>
        </div>
        <div>
            <h1><?= $data[0]['name_sous'] ?></h1>
            <p id="question_felin"> <?= $data[0]['question'] ?></p>
        </div>
        <div>
            
        </div>
    </div>
    <div class="container_discussion">
        <h2>Les réponses de nos amis les félins ..</h2>
<?php 
if ( $data[0]["id_soustopic"] === null ){

} else {
for ( $i = 0 ; $i < count($data) ; $i++) {
    $newdatecomment =   date(" d-m-Y à H:i", strtotime($data[$i]["date"]));
?>
<!-- on affiche les réponses du post -->
    
        <div class="container_comment">
            <div class="image_pseudo_comment">
                <img src="./public/image/imports/<?= $data[$i]['avatar']?>" alt="" >
                <p class="comment_pseudo"><?= $data[$i]["pseudo"] ?></p>
            </div>
            <div>
                <p> le <?= $newdatecomment  ?></p>
            </div>
        </div>
        <div class="comment_reponse">
            <p><?= $data[$i]["reponse"] ?></p>
           
        </div> 
      
<?php
}
}
?>
</div>
<?php
if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){ ?>
        <form id="form_comment" action="./?action=comment&id=<?= $data[0]["id_sous"] ?>" method='post'>
            <h3>Répond a ton amis Félin :</h3>
            <textarea  name='reponse' cols="30" rows="5"></textarea>
            <input type="submit">
        </form>

<?php
}
$content = ob_get_clean();




require_once __DIR__.'./../templates/mainTemp.php';