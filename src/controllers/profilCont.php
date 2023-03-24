<?php

// Controller qui va gérer les actions sur le profil de l'user

require_once __DIR__ . './../models/autoload.php';

// Si USER n'est pas connecté alors, je lui empêche : La Vue Profil (Modification)
if(empty($_SESSION['pseudo'])){
  header('location: ./');
}

/**
 * Fonction qui appelle la vue profil de l'user
 */
function getViewProfi() {
    $id = $_SESSION["id"];
    $felin = new Felins();
    $comment = $felin-> getCommentProfil($id);
    $sous_topic = $felin->getSoustopicProfil($id);
    require_once __DIR__.'./../views/profilView.php';

}

/**
 * Fonction qui redirige vers la page profil 
 * Fonction qui va vérifier la modification des infos de l'user 
 */
function getModifInfo () {
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $patternLetterNumbers = '/^[a-zA-Z0-9]+$/'; 

    $_SESSION["erreurInfo"] = "";
    
    // récupère et filtre les valeurs entrés par user 
    $input = filter_input_array(INPUT_POST, [
      'pseudo' => FILTER_SANITIZE_SPECIAL_CHARS,
      'mail' => FILTER_SANITIZE_EMAIL
      
    ]);

    $pseudo = $input['pseudo'];
    $mail = $input['mail']; 
    $id = $_SESSION['id'];
    // Vérification et modification si vérif passé 
    if (empty($pseudo)) {
      $_SESSION['erreurInfo'] = "veuillez remplir un nouveau pseudo";
      header('location: ./?action=profil');
      
    } 
    if (!preg_match($patternLetterNumbers, $pseudo)) {
      $_SESSION['erreurInfo'] = "Caractères invalide";
      header('location: ./?action=profil');
    }
      
    if (empty($mail)) {
      $_SESSION['erreurInfo'] = "veuillez remplir un nouvel email" ;
      header('location: ./?action=profil');
    }
      
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
      $_SESSION['erreurInfo'] = "email invalide";
      header('location: ./?action=profil');
    }
      
    if ($_SESSION["erreurInfo"] === "" ){
      $felin = new Felins() ;
      $felin->editFelinProfilInfo($pseudo , $mail , $id);
      $_SESSION["pseudo"] = $pseudo;
      $_SESSION["mail"] = $mail;
      $_SESSION["validateInfo"] = "Information modfié";
      $_SESSION['erreurInfo'] = "";

    }
    
   
      
      
    
  }

  header('location: ./?action=profil');
}

/**
 * Fonction qui redirige vers la page profil
 * Fonction qui vérifie la modification du mot de passe de l'user
 */
function getModifPassword() {
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';  
   

    $_SESSION['validateMdp'] = '';
    $_SESSION['erreurMdp'] = '';

    $input = filter_input_array(INPUT_POST, [
      'mdp1' => FILTER_SANITIZE_SPECIAL_CHARS,
      'mdp2' => FILTER_SANITIZE_EMAIL
      
    ]);

    $mdp1 = $input['mdp1'];
    $mdp2 = $input['mdp2'];
    $id = $_SESSION['id'];

    if ( (empty($mdp1) || !isset($mdp1)) || (empty($mdp2) || !isset($mdp2))  ) {
      $_SESSION['erreurMdp'] = "rentrez un nouveau mot de passe";
     
    } else if ( $mdp1 !== $mdp2){
      $_SESSION['erreurMdp'] = "Votre nouveau mot de passe doit être identique";
      
    } else if (!preg_match($patternPassword, $mdp1) || !preg_match($patternPassword , $mdp2)) {
      $_SESSION['erreurMdp'] = "min 1 majuscule , 1 chiffre et 8 caractères ";
    }


    if( $_SESSION['erreurMdp'] === ""){
      $password = password_hash($mdp1, PASSWORD_BCRYPT);
      $felin = new Felins();
      $felin->editFelinPassWord($password , $id);
      $_SESSION['validateMdp']= "Votre mot de passe a été modifié";
      $_SESSION['erreur'] = '';
    }
      
  }
  header('location: ./?action=profil');
}

/**
 * Fonction qui supprime un commetaire de l'user (par l'user)
 * fonction qui redirige vers la page profil
 * @param int $id id du commentaire 
 */
function getDeleteComment ($id) {
  $topic = new Topics();
  $topic->deleteComment($id);
  header('location: ./?action=profil');
}

/**
 * Fonction qui supprime un sous topic de l'user (par l'user)
 * fonction qui redirige vers la page profil
 * @param int $id id du sous topic 
 */
function getDeleteTopic ($id) {
  $topic = new Topics();
  $topic->deleteTopic($id);
  header('location: ./?action=profil');
}

/**
 * Fonction qui redirige vers la page profil
 * Fonction qui vérifie la modification de l'avatar de l'user (par l'user)
 */
function getModifAvatar () {
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    // définie le chemin dans lequel le fichier sera upload
    $cheminPicture = 'C:\wamp64\www\ECF-backEnd\public\image\imports\\';
    $avatar = $_FILES['post'];
    

    $tmp_name = $avatar['tmp_name'] ?? '';
    $type = $avatar['type'] ?? '';
    $name = $avatar['name'] ?? '';
    $name = md5($name);
    $chemin_final_picture = "$cheminPicture"."$name" ;
    
    // id de l'user 
    $id = $_SESSION['id'];

    // session d'erreur et de validation
    $_SESSION['erreurAvatar'] = '' ;
    $_SESSION['validateAvatar'] = '' ;


    // vérification si il y a un fichier, que le fichier est inferieur à 5mo , et le type de fichier 
    if ( $avatar["size"] === 0 ){
      $_SESSION['erreurAvatar'] = 'veuillez choisir un fichier';
    } else if ( $avatar["size"] > 5000000 ) {
      $_SESSION['erreurAvatar'] = 'Votre fichier ne doit pas dépasser 5Mo';
    } else if ( $avatar['type'] == 'image/jpeg' ){
      // si fichier est jpeg
        $felin = new Felins ();
        $name = $name.'.jpeg';
        $_SESSION['avatar'] = $name ;
        // on modifer l'avatar dans la base de donné
        $felin->modifAvatarFelin( $name , $id );
        // on upload le fichier dans notre dossier
        move_uploaded_file($tmp_name , $chemin_final_picture.'.jpeg');
        $_SESSION['validateAvatar'] = 'Avatar modifié' ;
        
    } else if ( $avatar['type'] == 'image/png'){
        $felin = new Felins ();
        $name = $name.'.png';
        $_SESSION['avatar'] = $name ;
        $felin->modifAvatarFelin( $name , $id );
        move_uploaded_file($tmp_name , $chemin_final_picture.'.png');
        $_SESSION['validateAvatar'] = 'Avatar modifié' ;
        echo "coucou";
    } else if ( $avatar['type'] == 'image/gif'){
        $felin = new Felins ();
        $name = $name.'.gif';
        $_SESSION['avatar'] = $name ;
        
        $felin->modifAvatarFelin( $name , $id );
        move_uploaded_file($tmp_name , $chemin_final_picture.'.gif');
        $_SESSION['validateAvatar'] = 'Avatar modifié' ;
        
    } else if ( $avatar['type'] == 'image/jpg'){
        $felin = new Felins();
        $name = $name.'.jpg';
        $_SESSION['avatar'] = $name ;
        $felin->modifAvatarFelin( $name , $id );
        move_uploaded_file($tmp_name , $chemin_final_picture.'.jpg');
        $_SESSION['validateAvatar'] = 'Avatar modifié' ;
        
    } else {
      $_SESSION['erreurAvatar'] = 'Type de fichier incorrect';
    }

    
  }
  header('Location: ./?action=profil');
}
