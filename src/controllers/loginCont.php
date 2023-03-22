<?php

require_once __DIR__ . './../models/autoload.php';

function getViewLogin () {
    if ( $_SERVER['REQUEST_METHOD'] === 'POST'){

        // on définie les patterns de vérification
        
        

        // on récupère les entrés de l'utilisateur et on les filtres
        $input = filter_input_array(INPUT_POST , [
            'pseudo' => FILTER_SANITIZE_SPECIAL_CHARS,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
        ]);

        $pseudo = $input['pseudo'];
        $password = $input["password"];

        // on déclare notre variable d'erreur
        $errors['error'] = '';

        // Vérification pour que l'utilisateur (FELIN) se connecte

        if ( empty($pseudo)){
            $errors['error'] = 'Veuillez rentrez votre pseudo' ;
        } 

        if (empty($password)){
            $errors['error'] = 'Veuillez rentrez votre mot de passe';
            
        } 


        // action effectué si $errors est vide
        if (empty(array_filter($errors , fn ($e) => $e !== ''))){
            $felin = new Felins();
            $result = $felin->checkIfFelinExist($pseudo , $pseudo); // je lui passe ici les 2 memes parametres pour ne pas avoir à écrire une nouvelle fonction

            if ( empty($result) ) {
                $errors["error"] = 'Identifient ou mot de passe incorrect';
            } else {
                $user = $felin->getInfoFelin($pseudo);
                if (password_verify($password , $user[0]['password'])) {
                    $_SESSION['pseudo'] = $user[0]["pseudo"];
                    $_SESSION['avatar'] = $user[0]["avatar"];
                    $_SESSION['id'] = $user[0]["id"];
                    $_SESSION['mail'] = $user[0]["mail"];

                    header('location: index.php');

                } else {
                    $errors['error'] = 'Identifient ou mot de passe incorrect';
                }
            }
        }




    }

    require_once __DIR__.'./../views/loginView.php';
}