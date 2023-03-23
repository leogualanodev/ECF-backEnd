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

// fonction qui vérifie si l'utilisateur existe deja dans la base de données 
  public function checkIfFelinExist( $pseudo, $mail) {
    $checkIfFelinExist = $this->pdo->prepare("SELECT * FROM felins WHERE pseudo = :pseudo OR mail = :mail");
    $checkIfFelinExist->bindParam('pseudo', $pseudo);
    $checkIfFelinExist->bindParam('mail', $mail);
    $checkIfFelinExist->execute();

    return $checkIfExist = $checkIfFelinExist->fetch();
  }
// fonction qui enregistre un utilisateur dans la base de donnée 
  public function felinRegistred( $pseudo , $mail , $passwordhash){
    $felinRegistred = $this->pdo->prepare("INSERT INTO felins (pseudo , mail , password) VALUES (:pseudo , :mail , :password)");
    $felinRegistred->bindParam(':pseudo', $pseudo);
    $felinRegistred->bindParam(':mail', $mail);
    $felinRegistred->bindParam(':password', $passwordhash);
    $felinRegistred->execute();
  }

  public function getInfoFelin($pseudo){
    $getInfoUser = $this->pdo->prepare("SELECT * FROM felins WHERE pseudo=:pseudo");
    $getInfoUser->BindParam(":pseudo", $pseudo);
    $getInfoUser->execute();
    $getInfoUser = $getInfoUser->fetchAll();

    return $getInfoUser;
  }

  public function editFelinProfilInfo($pseudo , $mail , $id) {
    $editFelinProfilInfo = $this->pdo->prepare("UPDATE felins SET pseudo = :pseudo, mail = :mail WHERE id = :id");
    $editFelinProfilInfo->BindParam(":pseudo", $pseudo);
    $editFelinProfilInfo->BindParam(":mail", $mail);
    $editFelinProfilInfo->BindParam(":id", $id);
    $editFelinProfilInfo->execute();
  }

  public function getCommentProfil($id){
    $getCommentProfil = $this->pdo->prepare("SELECT * FROM comment INNER JOIN sous_topic ON sous_topic.id_sous=comment.id_soustopic WHERE comment.id_felin=:id");
    $getCommentProfil->bindParam(":id" , $id);
    $getCommentProfil->execute();
    $data = $getCommentProfil->fetchAll();

    return $data;
  }

  public function getSoustopicProfil($id){
    $getSoustopicProfil = $this->pdo->prepare("SELECT * FROM sous_topic WHERE id_felin=:id");
    $getSoustopicProfil->bindParam(":id" , $id);
    $getSoustopicProfil->execute();
    $data = $getSoustopicProfil->fetchAll();

    return $data;
  }

  public function editFelinPassword($password , $id ) {
    $editFelinPassWord = $this->pdo->prepare("UPDATE felins SET password=:password WHERE id=:id");
    $editFelinPassWord->BindParam(":password", $password);
    $editFelinPassWord->BindParam(":id", $id);
    $editFelinPassWord->execute();
  }

  public function modifAvatarFelin( $name , $id ) {
    $modifAvatarFelin = $this->pdo->prepare("UPDATE felins set avatar=:avatar WHERE id=:id");
    $modifAvatarFelin->BindParam(':avatar' , $name);
    $modifAvatarFelin->BindParam(':id' , $id);
    $modifAvatarFelin->execute();
  }


}