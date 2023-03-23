<?php
// session_start();

require_once __DIR__ . './../models/autoload.php';

// Si USER n'est pas connecté alors, je lui empêche : La Vue Profil (Modification)
if(empty($_SESSION['pseudo'])){
  header('location: ./');
}


function getViewProfi() {
    // ici récupérer les topics de l'utilisateur
    require_once __DIR__.'./../views/profilView.php';

}

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


function getModifPassword() {
  // if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //   $patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';  
   

  //  $_SESSION['validateMdp'] = '';
  //  $_SESSION['erreur'] = '';

  //   $input = filter_input_array(INPUT_POST, [
  //     'mdp1' => FILTER_SANITIZE_SPECIAL_CHARS,
  //     'mdp2' => FILTER_SANITIZE_EMAIL
      
  //   ]);

  //   $mdp1 = $input['mdp1'];
  //   $mdp2 = $input['mdp2'];
  //   $id = $_SESSION['id'];

  //   if ( (empty($mdp1) || !isset($mdp1)) || (empty($mdp2) || !isset($mdp2))  ) {
  //     $_SESSION['erreur'] = "rentrez un nouveau mot de passe";
     
  //   } else if ( $mdp1 !== $mdp2){
  //     $_SESSION['erreur'] = "Votre nouveau mot de passe doit être identique";
      
  //   } else if (!preg_match($patternPassword, $mdp1) || !preg_match($patternPassword , $mdp2)) {
  //     $_SESSION['erreur'] = "min 1 majuscule , 1 chiffre et 8 caractères ";
  //   } else {
  //     $password = password_hash($mdp1, PASSWORD_BCRYPT);
  //     $user = new User();
  //     $user->editUserPassWord($password , $id);
  //     $_SESSION['validateMdp']= "Votre mot de passe a été modifié";
  //     $_SESSION['erreur'] = '';

  //   }
    
    header('location: ./?action=profil');


  }
