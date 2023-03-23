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
      $getTopics = $this->pdo->prepare("SELECT *  , COUNT(sous_topic.id_topic) AS nb_sous_topic FROM topics LEFT JOIN sous_topic ON topics.id=sous_topic.id_topic GROUP BY topics.name ");
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
  // 
  /**
   * fonction qui récupère les infos de l'user qui a mis le sous topic
   * 
   * @param int $id id du sous topic 
   * @return array infos sous topics
   */
  public function getInfoSoustopic ( $id ) {
    $getInfoSoustopic = $this->pdo->prepare("SELECT * FROM felins INNER JOIN sous_topic ON felins.id= sous_topic.id_felin WHERE sous_topic.id_sous =:id ");
    $getInfoSoustopic->bindParam(':id' , $id ); 
    $getInfoSoustopic->execute();

    $data =  $getInfoSoustopic->fetchAll();
    return $data;
  }

  // Fonction qui ajoute un commentaire à un sous topic
  public function addComment($comment , $id_soustopic , $id_user) {
    $addComment = $this->pdo->prepare("INSERT INTO comment ( id_soustopic , id_felin , reponse ) VALUES ( :id_soustopic , :id_user , :comment )");
    $addComment->bindParam(':id_soustopic' , $id_soustopic );
    $addComment->bindParam(':id_user' , $id_user );
    $addComment->bindParam(':comment' , $comment );
    $addComment->execute();

  }

  public function deleteComment ($id) {
    $deleteComment = $this->pdo->prepare('DELETE FROM comment WHERE id_comment=:id');
    $deleteComment->bindParam(':id' , $id );
    $deleteComment->execute();

  }

  public function deleteTopic ($id) {
    $deleteComment = $this->pdo->prepare('DELETE FROM sous_topic WHERE id_sous=:id');
    $deleteComment->bindParam(':id' , $id );
    $deleteComment->execute();

  }
}