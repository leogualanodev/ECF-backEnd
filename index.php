<?php

session_start();

if ( !empty($_GET) && isset($_GET)) {
    if ( !empty($_GET["action"] === 'register')){
        require_once __DIR__ . './src/controllers/registerCont.php';
        getViewRegister();
    }
} else {
    require_once __DIR__ . './src/controllers/homePageCont.php';
    getViewHomepage();
}