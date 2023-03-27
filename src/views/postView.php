<?php


// on définie le nouveau format de la date du sous topic 
$newdate = date(" d-m-Y à H:i", strtotime($data[0]['date_sous']));


$title = '';

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


$zone_flot = '';

ob_start(); ?>
<!-- on affiche le sous topic -->
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
    // on affiche les commentaire du sous topic
for ( $i = 0 ; $i < count($data) ; $i++) {
    // on définie les nouveau formats de date des commentaire 
    $newdatecomment =   date(" d-m-Y à H:i", strtotime($data[$i]["date"]));
?>

    
        <div class="container_comment">
            <div class="image_pseudo_comment">
                <img src="http://localhost/ECF-backEnd/public/image/imports/<?= $data[$i]['avatar']?>" alt="" >
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
<!-- si user connecté alors formulaire de post d'un commentaire -->
<?php
if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){ ?>
        <form id="form_comment" action="http://localhost/ECF-backEnd/comment/<?= $data[0]["id_sous"] ?>" method='post'>
            <h3>Répond a ton amis Félin :</h3>
            <textarea  name='reponse' cols="30" rows="5"></textarea>
            <input type="submit">
        </form>

<?php
}
$content = ob_get_clean();




require_once __DIR__.'./../templates/mainTemp.php';