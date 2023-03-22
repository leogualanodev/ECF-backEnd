<?php

session_start();

if ( !empty($_GET) && isset($_GET)) {
    if ( !empty($_GET["action"] === 'inscription')){
        require_once __DIR__ . './src/controllers/registerCont.php';
        getViewRegister();
    } else if ( !empty($_GET["action"] === 'connexion')){
        require_once __DIR__ . './src/controllers/loginCont.php';
        getViewLogin();
    } else if ( !empty($_GET['action'] === 'profil')){
        require_once __DIR__ . './src/controllers/profilCont.php';
        getViewProfi();
    } else if ( !empty($_GET['action'] === 'disconnect')){
        require_once __DIR__ . './src/controllers/disconnectCont.php';
        getViewDisconnect();
    } else if ( !empty($_GET['action'] === 'forum') && (!isset($_GET["id"]) || empty($_GET["id"]))){
        require_once __DIR__ . './src/controllers/forumCont.php';
        getViewForum();
    } else if ( !empty($_GET['action'] === 'forum') && isset($_GET["id"])){
        require_once __DIR__ . './src/controllers/forumCont.php';
        $id = $_GET['id'];
        getViewThisSubject($id);
    }
} else {
    require_once __DIR__ . './src/controllers/homePageCont.php';
    getViewHomepage();
}