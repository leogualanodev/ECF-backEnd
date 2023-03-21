<?php

$title = 'Inscription' ;

ob_start(); ?>

<div>
    <a href="./?action=connexion">Se connecter</a>
</div>
<?php
$nav = ob_get_clean();
$zone_flot = '';

ob_start(); ?>


    <form id="register" action="index.php?action=inscription" method="post">
        <h1 id="h1_register">Un chat qui s'inscrit ..</h1>
        <div id="inputs">
            <div>
                <p>Votre pseudo :</p>
                <?php if ( !empty($errors["pseudo"])) { ?>
                    <div class="erreur"> <?= $errors['pseudo'] ?></div>
                 <?php } ?>
                <input type="text" name="pseudo">
                <p>Votre email :</p>
                <?php if ( !empty($errors["mail"])) { ?>
                    <div class="erreur"> <?= $errors['mail'] ?></div>
                 <?php } ?>
                <input type="text" name="mail">
            </div>
            <div>
                <p>Mot de passe :</p>
                <?php if ( !empty($errors["password"])) { ?>
                    <div class="erreur"> <?= $errors['password'] ?></div>
                 <?php } ?>
                <input type="password" name="password">
                <p>Confirmer votre mot de passe :</p>
                <?php if ( !empty($errors["confirmPass"])) { ?>
                    <div class="erreur"> <?= $errors['confirmPass'] ?></div>
                 <?php } ?>
                <input type="password" name="confirmpassword">
            </div>
        </div>
        <div id="select">
            
                <p> <span>“La méfiance est mère de la sûreté.” </span> : Voici un petit questionnaire, en espérant que vous êtes un chat ..</p>
                <?php if ( !empty($errors["question"])) { ?>
                    <div class="erreur"> <?= $errors['question'] ?></div>
                 <?php } ?>
            <div class="options">
                <label for="cat-1">Que fais tu le matin au réveil ?</label>
                <select name="1" id="cat-1">
                    <option value="">Choisir la réponse</option>
                    <option value="1">je réveille mon humain</option>
                    <option value="2">je demande des calins a mon humain</option>
                    <option value="3">je fais mes besoin dans la litière</option>
                </select>
            </div>
            <div class="options">
                <label for="cat-2">Pourquoi es-tu là ?</label>
                <select name="2" id="cat-2">
                    <option value="">Choisir la réponse</option>
                    <option value="1">Pour conquérir la race humaine</option>
                    <option value="2">M'informer sur ma race</option>
                    <option value="3">Pour le plaisir</option>
                </select>
            </div>
        </div>
        <div id="submit_register">
            <input type="submit" value="Inscription">
            
        </div>
    </form>




<?php 
$content = ob_get_clean();

require_once __DIR__.'./../templates/mainTemp.php';