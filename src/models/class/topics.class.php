<?php

require_once('./src/models/class/database.class.php');

class Topics extends Database {


  public string $name;

  public function __construct()
  {
    parent::__construct();
  }
  // foncion qui récupère tous les sujets du forum
  public function getTopics () {
      $getTopics = $this->pdo->prepare("SELECT * FROM topics ");
      $getTopics->execute();
      $data = $getTopics->fetchAll();

      return $data ;


  }
  // fonction qui récupèere le sujet cliqué ainsi que ses sous sujets
  public function getThisTopics ($id) {
      $getThisTopics = $this->pdo->prepare("SELECT * FROM topics LEFT JOIN sous_topic ON topics.id=sous_topic.id_topic WHERE topics.id=:id");
      $getThisTopics->bindParam(':id' , $id );
      $getThisTopics->execute();
      $data = $getThisTopics->fetchAll();

      return $data;
  }

  // fonction qui ajoute un sous topic dans la base de donnée
  public function addPost($id_topic , $id_user , $title , $description) {
    $addPost = $this->pdo->prepare("INSERT INTO sous_topic (id_topic , id_felin , name_sous , question) VALUES ( :id_topic , :id_user , :title , :descrip )");
    $addPost->bindParam(':id_topic' , $id_topic );
    $addPost->bindParam(':id_user' , $id_user );
    $addPost->bindParam(':title' , $title );
    $addPost->bindParam(':descrip' , $description );
    $addPost->execute();
  }

  // fonction qui récupère la discussion selectionné par l'utilisateur 
  public function getThisPost ($id) {
    $getThisPost = $this->pdo->prepare("SELECT * FROM sous_topic LEFT JOIN comment ON sous_topic.id_sous=comment.id_soustopic LEFT JOIN felins ON felins.id = comment.id_felin WHERE sous_topic.id_sous=:id");
    $getThisPost->bindParam(':id' , $id );
    $getThisPost->execute();
    $data = $getThisPost->fetchAll();

    return $data ;


  }
}