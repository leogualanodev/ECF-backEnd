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
    } else if ( !empty($_GET["action"] === 'post') && isset($_GET['id'])){
        require_once __DIR__ . './src/controllers/forumCont.php';
        $id_topic = $_GET["id"];
        $id_user = $_SESSION['id'];
        getViewPost($id_topic , $id_user);
    } else if ( !empty($_GET["action"] === 'discussion') && isset($_GET['id'])){
        require_once __DIR__ . './src/controllers/forumCont.php';
        $id = $_GET["id"];
        getViewThisPost($id);
    } else if ( !empty($_GET["action"] === 'comment') && isset($_GET['id'])){
        require_once __DIR__ . './src/controllers/forumCont.php';
        $id_soustopic = $_GET["id"];
        $id_user = $_SESSION["id"];
        getViewComment($id_soustopic , $id_user);
    } else if ( !empty($_GET['action'] === 'editProfil') && isset($_GET['travail']) && $_GET['travail'] === 'editInfo'){
        require_once __DIR__ . './src/controllers/profilCont.php';
        getModifInfo();
    } else if ( ( !empty($_GET['action'] === 'editProfil') && isset($_GET['travail']) && $_GET['travail'] === 'editMdp')){
        require_once __DIR__ . './src/controllers/profilCont.php';
        getModifPassword();
    } else if ( !empty($_GET["action"] === 'deleteCom') && isset($_GET['id'])){
        require_once __DIR__ . './src/controllers/profilCont.php';
        $id = $_GET["id"];
        getDeleteComment($id);
    } else if ( !empty($_GET["action"] === 'deletetopic') && isset($_GET['id'])){
        require_once __DIR__ . './src/controllers/profilCont.php';
        $id = $_GET["id"];
        getDeleteTopic($id);
    } else if ( ( !empty($_GET['action'] === 'editAvatar') && isset($_GET['travail']) && $_GET['travail'] === 'editAvatar')) {
        require_once __DIR__ . './src/controllers/profilCont.php';
        getModifAvatar();
    }
} else {
    require_once __DIR__ . './src/controllers/homePageCont.php';
    getViewHomepage();
}