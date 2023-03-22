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

}