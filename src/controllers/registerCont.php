<?php 

require_once __DIR__ . './../models/autoload.php';


/**
 * Fonction qui appelle la vue register
 * Fonctin qui vérifie l'inscription d'un user
 */
function getViewRegister () {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // on définie les patterns de vérification

        $patternLetterNumbers = '/^[a-zA-Z0-9]+$/'; // Pattern : qui accepte seulement lettres et chiffres
        $patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';  // Pattern : 1 Majuscule , 8 caractères minimum, et un chiffre minimum

        // on déclare notre tableau d'erreur
        $errors = [
            'pseudo' => '',
            'mail' => '',
            'password' => '',
            'confirmPass' => '',
            'question' => ''
          ];
          
        
        // on récupère les entrés de l'utilisateur et on les filtres
        $input = filter_input_array(INPUT_POST, [
            'pseudo' => FILTER_SANITIZE_SPECIAL_CHARS,
            'mail' => FILTER_SANITIZE_EMAIL,
            'password' => FILTER_SANITIZE_SPECIAL_CHARS,
            'confirmpassword' => FILTER_SANITIZE_SPECIAL_CHARS
          ]);

        $pseudo = $input['pseudo'];
        $mail = $input['mail'];
        $password = $input['password'];
        $confirmpassword = $input['confirmpassword'];
        
        // Vérification éffectué pour que l'utilisateur s'inscrive

        if ( empty($pseudo)) {
            $errors['pseudo'] = 'Veuillez choisir un pseudo';
        } else if ( !preg_match($patternLetterNumbers , $pseudo)){
            $errors['pseudo'] = 'Seulement chiffres et caractères';
        }

        if (empty($mail)) {
            $errors['mail'] = 'Veuillez rentrez votre email';
        } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "votre email n'est pas valide";
        }

        if (empty($password)) {
            $errors['password'] = "Veuillez rentrer un mot de passe";
        } else if (!preg_match($patternPassword, $password)) {
            $errors['password'] = "Une Majuscule, un chiffre, 8 caractères minimum";
        }

        if (empty($confirmpassword)) {
            $errors['confirmPass'] = "Veuillez confirmer votre mot de passe";
        } else if (!preg_match($patternPassword, $confirmpassword)) {
            $errors['confirmPass'] = "Une Majuscule, un chiffre, 8 caractères";
        } else if ($confirmpassword !== $password) {
            $errors['confirmPass'] = "Veuillez confirmer votre mot de passe";
        }

        // Vérifiaction du questionnaire
        if ( empty($_POST["1"]) && empty($_POST['2']) ){
            $errors['question'] = "Veuillez répondre aux questions";
        } else if ( $_POST["1"] != "1") {
            $errors['question'] = "Veuillez répondre correctement";
        } else if ( $_POST['2'] != "1" ) {
            $errors['question'] = "Veuillez répondre correctement";
        }




        // Action si le tableau d'erreurs est vide 


        if (empty(array_filter($errors, fn ($e) => $e !== ''))) { 
            $passwordhash = password_hash($password, PASSWORD_BCRYPT);
            
            $felin = new Felins();
            $result = $felin->checkIfFelinExist($pseudo , $mail);
            if ( empty($result)){
                $felin->felinRegistred($pseudo , $mail , $passwordhash);
                header( 'location: ./connexion');
            }   
            
        }
        
    }

    require_once __DIR__.'./../views/registerView.php';
}