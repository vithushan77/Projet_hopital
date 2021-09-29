<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/medecin.php');

class manager {

//Connexion à la base de données
  public function connexionBdd() {
    try {
      $db = new PDO('mysql:host=localhost;dbname=projet_hopital;charset=utf8', 'root', '');
    }
    catch(Exception $e) {
      die('Error:' .$e->getMessage());
    }
    return $db;
  }

  public function signIn($signin) {
    $sql = $this->connexionBdd()->prepare('SELECT * FROM user WHERE mail=:mail AND mdp =:mdp');
    $sql->execute(array(
      'mail'=>$signin->getMail(),
      'mdp'=>$signin->getMdp()
    ));
    $rslt = $sql->fetch();

    if($rslt) {
      $user = new user ($rslt);
      return $user;
    }

    else {
      return null;
    }
  }

  public function insertUser(User $u) {
    $sql = $this->connexionBdd()->prepare('SELECT nom, prenom FROM user WHERE nom=:nom AND prenom=:prenom');
    $sql->execute(array(
      'nom'=>$u->getNom(),
      'prenom'=>$u->getPrenom()
    ));
    $rslt = $sql->fetch();

    if($rslt == false) {
      $sql = $this->connexionBdd()->prepare("INSERT INTO user (nom, nom_usage, prenom, sexe, mail, mdp, role)
      VALUES(:nom, :nom_usage, :prenom, :sexe, :mail, :mdp, :role)");
      $sql->execute(array(
        'nom'=>$u->getNom(),
        'nom_usage'=>$u->getNom_usage(),
        'prenom'=>$u->getPrenom(),
        'sexe'=>$u->getSexe(),
        'mail'=>$u->getMail(),
        'mdp'=>$u->getMdp(),
        'role'=>$u->getRole()
    ));
      return 1;
    }
    else{
      return 0;
    }
  }

  public function modifierProfil(User $u) {
    $sql = $this->connexionBdd()->prepare('UPDATE projet_hopital SET nom=:nom, nom_usage=:nom_usage, prenom=:prenom, mail=:mail WHERE id=:id');
    $sql->execute(array(
      'id'=>$u->getId(),
      'nom'=>$u->getNom(),
      'nom_usage'=>$u->getNom_usage(),
      'prenom'=>$u->getPrenom(),
      'mail'=>$u->getMail(),
    ));
  }

  public function modifyPwd(User $u) {
    $sql = $this->connexionBdd()->prepare('UPDATE projet_hopital SET mdp=:mdp WHERE id=:id');
    $sql->execute(array(
      'mdp'=>$u->getMdp()
    ));
  }

  public function afficherInfoProfil($id) {
    $sql = $this->connexionBdd()->prepare('SELECT * FROM user WHERE id=:id');
    $sql->execute(array(
      'id'=>$id
    ));
    return $id;
  }

  public function saisirMail(User $mail) {
    $sql = $this->connexionBdd()->prepare('SELECT mail FROM user WHERE mail=:mail');
    $sql->execute(array('mail'=>$mail->getMail()));
    $sql->fetch();
  }

  public function nouveauMdp(User $u) {
    $sql = $this->connexionBdd()->prepare('UPDATE user SET :mdp WHERE mail=:mail');
    $sql->execute(array(
      'mail'=>$u->getMail(),
      'mdp'=>$u->getMdp()
    ));
  }


}

?>
