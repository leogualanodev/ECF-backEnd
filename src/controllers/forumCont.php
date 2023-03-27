<?php

// ce controller servira a gérer les sujets et les questions
require_once __DIR__ . './../models/autoload.php';

/**
 * Fonction qui récupère les topics et qui appelle la vue Forum
 */
function getViewForum () {
    $topics = new Topics();
    $data = $topics->getTopics();
    require_once __DIR__.'./../views/forumView.php';

}

/**
 * fonction qui récupère les sous topics d'un topic
 * fonction qui redirige vers la page des sous topics
 */
function getViewThisSubject ($id) {
    $topics = new Topics();
    $data = $topics->getThisTopics($id);
    require_once __DIR__.'./../views/thisForumView.php';

}

/**
 * fonction qui controle l'ajout d'un sous topic
 * fonction qui redirige vers le sous topic en question
 * 
 * @param int $id_topic id du topic 
 * @param int $id_user id de l'user qui ajoute le sous topic
 */
function getViewPost ($id_topic , $id_user){
    //on vérifier si la method d'envoie du formulaire est bien post
    if( $_SERVER['REQUEST_METHOD'] === 'POST'){

        // on récupère les entrées de l'user
        $input = filter_input_array(INPUT_POST , [
            'title' => FILTER_SANITIZE_SPECIAL_CHARS,
            'description' => FILTER_SANITIZE_SPECIAL_CHARS,
        ]);

        $title = $input['title'];
        $description = $input['description'];
       
        // on définie la variable d'erreur
        $errors['erreur'] = '';


        // Vérification 
        if ( empty($title)) {
            $errors['erreur'] = 'Veuillez donnez un titre';
            echo 'cool';
        }
        if ( empty($description)){
            $errors['erreur'] = 'Veuillez Parlez du sujet ou poser une question';
        }
        if ( strlen($description) < 20 ){
            $errors['erreur'] = 'Veuillez être plus précis';
        }
        if ( strlen($description) > 254 ){
            $errors['erreur'] = 'Veuillez être plus succinct';
        }
        if ( strlen($title) > 50 ){
            $errors['erreur'] = 'Titre trop grand';
        }

        // si vérification passé et $errors vide , on ajoute dqns la base de donnée
        if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
            $topics = new Topics();
            $topics->addPost($id_topic , $id_user , $title , $description);
        } 
    }
    // on redirige vers la page ou l'utilisateur était 
    header("location: ./?action=forum&id=$id_topic");
}

/**
 * fonction qui redirige vers la vue du sous topic (et ses commentaires)
 * 
 * @param int $id id du sous topic 
 */
function getViewThisPost ($id) {
    $topics = new Topics();
    $data = $topics->getThisPost($id);
    $info = $topics->getInfoSoustopic($id);
    require_once __DIR__.'./../views/postView.php';

}

/**
 * fonction qui redirige vers la vue du sous topic (et ses commentaires)
 * fonction qui vérifie l'ajout d'un commentaire sur le sous topic par l'user
 * 
 * @param int $id_soustopic id du sous topic 
 * @param int $id_user id de l'user
 */
function getViewComment ($id_soustopic , $id_user) {
    //on vérifier si la method d'envoie du formulaire est bien post
    if( $_SERVER['REQUEST_METHOD'] === 'POST'){

        // on récupère les entrées de l'user
        $input = filter_input_array(INPUT_POST , [
            'reponse' => FILTER_SANITIZE_SPECIAL_CHARS,
        ]);

        $comment = $input['reponse'];

        // on définie la variable d'erreur
        $errors['erreur'] = '';

        if ( empty($comment)) {
            $errors['erreur'] = "Veuillez ajouter un commentaire";
        }
        // la limite en bdd est de 255 
        if ( strlen($comment) > 254 ) {
            $errors['erreur'] = "Veuillez être plus succinct";
        }
        // si pas d'erreur alors on ajoute le commentaire a la bdd
        if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
            $topics = new Topics();
            $topics->addComment($comment , $id_soustopic , $id_user );
        }
    }
    // on redirige l'utilisateur vers la page de la discussion 
    header("location: http://localhost/ECF-backEnd/discussion/$id_soustopic");
}