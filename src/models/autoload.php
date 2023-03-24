<?php

// Fichier qui permet d'appeler les class dans les controllers

spl_autoload_register(function ($class) {
  require_once './src/models/class/' . $class . '.class.php';
});

