<?php 

require_once __DIR__ . './../models/autoload.php';

function getViewRegister () {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    }

    require_once __DIR__.'./../views/registerView.php';
}