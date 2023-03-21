<?php

session_start();

if ( !empty($_GET) && isset($_GET)) {
    if ( !empty($_GET["action"] === 'inscription')){
        require_once __DIR__ . './src/controllers/registerCont.php';
        getViewRegister();
    } else if ( !empty($_GET["action"] === 'connexion')){
        require_once __DIR__ . './src/controllers/loginCont.php';
        getViewLogin();

    }
} else {
    require_once __DIR__ . './src/controllers/homePageCont.php';
    getViewHomepage();
}