<?php 



// fonction qui déconnect l'utilisateur, appellé quand l'utilisateur clique sur "se déconnecter"
function getViewDisconnect(){
    // empeche un utilisateur non connecté d'accéder a la page de déconnexion
    if ( empty($_SESSION['pseudo'])){
        header ('location: ./');
    } else {
        // require la vue disconnect => affiche un message a l'utilisateur lui précisant qu'il est déconnecté 
        require_once __DIR__ .'./../views/disconnectView.php';
        // destruction des variables $_SESSION 
        session_destroy();
    }
}