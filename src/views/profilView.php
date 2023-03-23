<?php
// bloque l'accés par l'url si l'utilisateur pas connecté 
if ( !isset($_SESSION["pseudo"]) || empty($_SESSION["pseudo"])){
    header('location: ./');
}
$title = $_SESSION["pseudo"] ;

ob_start(); ?>

<div>
    <a class="button-home" href="./?action=disconnect">Se déconnecter</a>
</div>
<?php
$nav = ob_get_clean();
$zone_flot = '';
ob_start(); ?>

<section class="container-modif">
  <!-- <div id="formProfil">
    <h1>Votre profil</h1>
    <p class="para">Modifier votre profil</p>
    <img src="./public/image/import/<?= $_SESSION['avatar'] ?? 'avatar_default.png'; ?>" alt=""> -->
  

    <form class="form-modif" action="./?action=editProfil&travail=editInfo" method="post">
    <h2>Modifer votre pseudo et votre mail :</h2>
    <?php if ( !empty($_SESSION['erreurInfo'])){ ?>
        <div class="erreur"><?=   $_SESSION['erreurInfo'] ?></div>
      <?php } ?>
      <?php if ( !empty($_SESSION['validateInfo'])){ ?>
        <div class="erreur"><?=   $_SESSION['validateInfo'] ?></div>
      <?php } ?>
        <div>
          <p>Pseudo :</p>
          <input type="text" name="pseudo"  value="<?= $_SESSION['pseudo'] ?? ''; ?>">
          
        </div>
        <div>
          <p>Mail :</p>
          <input type="mail" name="mail"  value="<?= $_SESSION['mail'] ?? ''; ?>">
          
        </div>
        <div> 
          <input class="modifier-info" type="submit" value="modifier">
        </div>
      </form>

      <form class="form-modif" action="./?action=editProfil&travail=editAvatar" method="post" enctype="multipart/form-data">
        <div class='relative'>
      <h2>Modifier votre avatar :</h2>
            <?php if ( !empty($_SESSION['erreurAvatar'])){ ?>
          <div class="retourmodif"><?=   $_SESSION['erreurAvatar'] ?></div>
          <?php }  ?>
          <?php if ( !empty($_SESSION['validateAvatar'])){ ?>
          <div class="retourmodif"><?=   $_SESSION['validateAvatar'] ?></div>
          <?php }  ?>
        </div>
      <div>
          <p>Avatar :</p>
          <input type="file" name="post" id="avatar" value="./public/image/import/<?= $_SESSION['avatar'] ?? 'avatar_default.png'; ?>">
          <span id="uploadImage">* < 5MO, Gif,JPEG,JPG,GIF</span>
          <input class="modifier-info1" type="submit" value="Modifier">
             
        </div>
    </form>
  
  
    <form class="form-modif" action="./?action=editProfil&travail=editMdp" method="POST">
      <div class="relative">
      <h2>Modifier Votre mot de passe :</h2>
          <?php if ( !empty($_SESSION['erreur'])){ ?>
        <div class="retourmodif"><?=   $_SESSION['erreur'] ?></div>
      <?php } ?>
      <?php if ( !empty($_SESSION['validateMdp'])){ ?>
        <div class="retourmodif"><?=   $_SESSION['validateMdp'] ?></div>
      <?php } ?>
      </div>
      <div>
        <p>Mot de passe :</p>
        <input type="text" name="mdp1">
      </div>
      <div>
        <p>Confirmer votre Mot de passe :</p>
        <input type="text" name="mdp2">
      </div>
      <div>
        <input class="modifier-info" type="submit" value="Modifier">
      </div>
    </form>

    
    

    
    

      
   
  </div>
</section>

<?php

$content = ob_get_clean();

require_once __DIR__.'./../templates/mainTemp.php';