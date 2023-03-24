<?php
require_once('./src/models/class/database.class.php');


// class Felins (users) qui va gérer toute les actions sur la table felins
class Felins extends Database
{

  public int $id;
  public string $pseudo;
  public string $mail;
  private string $password;
  public string $avatar;

  public function __construct()
  {
    parent::__construct();
  }

 
/**
 * fonction qui vérifie si l'utilisateur existe deja dans la base de données
 * 
 * @param string $pseudo pseudo rentré par l'user
 * @param string $mail mail rentré par l'user 
 * @return array vide si existe pas 
 */
  public function checkIfFelinExist( $pseudo, $mail) {
    $checkIfFelinExist = $this->pdo->prepare("SELECT * FROM felins WHERE pseudo = :pseudo OR mail = :mail");
    $checkIfFelinExist->bindParam('pseudo', $pseudo);
    $checkIfFelinExist->bindParam('mail', $mail);
    $checkIfFelinExist->execute();

    return $checkIfExist = $checkIfFelinExist->fetch();
  }
/**
 * fonction qui enregistre un utilisateur dans la base de donnée 
 * 
 * @param string $pseudo pseudo du nouvel user 
 * @param string $mail mail du nouvel user
 * @param string $passwordhash password hasher du nouvel user
 */
  public function felinRegistred( $pseudo , $mail , $passwordhash){
    $felinRegistred = $this->pdo->prepare("INSERT INTO felins (pseudo , mail , password) VALUES (:pseudo , :mail , :password)");
    $felinRegistred->bindParam(':pseudo', $pseudo);
    $felinRegistred->bindParam(':mail', $mail);
    $felinRegistred->bindParam(':password', $passwordhash);
    $felinRegistred->execute();
  }

  /**
   * Fonction qui récupère les info d'un user 
   * 
   * @param string $pseudo pseudo de l'user
   * @return array informations de l'user
   */
  public function getInfoFelin($pseudo){
    $getInfoUser = $this->pdo->prepare("SELECT * FROM felins WHERE pseudo=:pseudo");
    $getInfoUser->BindParam(":pseudo", $pseudo);
    $getInfoUser->execute();
    $getInfoUser = $getInfoUser->fetchAll();

    return $getInfoUser;
  }

  /**
   * Fonction qui modifie les information d'un user 
   * 
   * @param string $pseudo nouveau pseudo de l'user
   * @param string $mail nouveeau mail de l'user
   * @param int  $id id de l'user 
   */
  public function editFelinProfilInfo($pseudo , $mail , $id) {
    $editFelinProfilInfo = $this->pdo->prepare("UPDATE felins SET pseudo = :pseudo, mail = :mail WHERE id = :id");
    $editFelinProfilInfo->BindParam(":pseudo", $pseudo);
    $editFelinProfilInfo->BindParam(":mail", $mail);
    $editFelinProfilInfo->BindParam(":id", $id);
    $editFelinProfilInfo->execute();
  }

  /**
   * Fonction qui récupère les commentaire d'un user pour sa page profil
   * 
   * @param int $id id de l'user
   * @return array les commentaires de l'user 
   */
  public function getCommentProfil($id){
    $getCommentProfil = $this->pdo->prepare("SELECT * FROM comment INNER JOIN sous_topic ON sous_topic.id_sous=comment.id_soustopic WHERE comment.id_felin=:id");
    $getCommentProfil->bindParam(":id" , $id);
    $getCommentProfil->execute();
    $data = $getCommentProfil->fetchAll();

    return $data;
  }

  /**
   * Fonction qui récupère les sous topics d'un user pour sa page profil
   * 
   * @param int $id id de l'user
   * @return array les sous topics de l'user 
   */
  public function getSoustopicProfil($id){
    $getSoustopicProfil = $this->pdo->prepare("SELECT * FROM sous_topic WHERE id_felin=:id");
    $getSoustopicProfil->bindParam(":id" , $id);
    $getSoustopicProfil->execute();
    $data = $getSoustopicProfil->fetchAll();

    return $data;
  }

  /**
   * Fonction qui modifie le password d'un user 
   * 
   * @param string $password nouveau password 
   * @param int $id id de l'user
   */
  public function editFelinPassword($password , $id ) {
    $editFelinPassWord = $this->pdo->prepare("UPDATE felins SET password=:password WHERE id=:id");
    $editFelinPassWord->BindParam(":password", $password);
    $editFelinPassWord->BindParam(":id", $id);
    $editFelinPassWord->execute();
  }

   /**
   * Fonction qui modifie l'avatar d'un user 
   * 
   * @param string $name nom du fichier avatar stocké en base de donnée 
   * @param int $id id de l'user
   */
  public function modifAvatarFelin( $name , $id ) {
    $modifAvatarFelin = $this->pdo->prepare("UPDATE felins set avatar=:avatar WHERE id=:id");
    $modifAvatarFelin->BindParam(':avatar' , $name);
    $modifAvatarFelin->BindParam(':id' , $id);
    $modifAvatarFelin->execute();
  }


}