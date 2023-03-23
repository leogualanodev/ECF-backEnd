<?php
var_dump($data);
var_dump($info);
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

    <div>
        <div>
            <img src="./public/image/imports/<?= $info[0]['avatar']?>" alt="">
            <p> <?= $info[0]["pseudo"] ?></p>
        </div>
        <div>
            <h1><?= $data[0]['name_sous'] ?></h1>
            <p> <?= $data[0]['question'] ?></p>
        </div>
        <div>
            <p><?= $data[0]['date_sous'] ?></p>
        </div>
    </div>
    <div>
<?php 
if ( $data[0]["id_soustopic"] === null ){

} else {
for ( $i = 0 ; $i < count($data) ; $i++){
?>
<!-- on affiche les réponses du post -->
    <div>
        <div>
            <img src="./public/image/imports/<?= $data[$i]['avatar']?>" alt="" >
            <p><?= $data[$i]["pseudo"] ?></p>
        </div>
        <div>
            <p><?= $data[$i]["reponse"] ?></p>
            <p><?= $data[$i]["date"] ?></p>
        </div> 
    </div>   
<?php
}
}
?>
</div>
<?php
if ( isset($_SESSION["pseudo"]) && !empty($_SESSION["pseudo"])){ ?>
        <form action="./?action=comment&id=<?= $data[0]["id_sous"] ?>" method='post'>
            <textarea  name='reponse' cols="30" rows="5"></textarea>
            <input type="submit">
        </form>

<?php
}
$content = ob_get_clean();




require_once __DIR__.'./../templates/mainTemp.php';