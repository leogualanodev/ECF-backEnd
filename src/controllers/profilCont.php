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