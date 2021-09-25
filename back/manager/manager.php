<?php

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
      $signin->getMail(),
      $signin->getMdp()
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
    $sql = $this->connexionBdd()->prepare('UPDATE projet_hopital SET :nom, :prenom, :mail, :mdp, :role WHERE id=:id');
    $sql->execute(array(
      'id'=>$u->getId(),
      'nom'=>$u->getNom(),
      'prenom'=>$u->getPrenom(),
      'mail'=>$u->getMail(),
      'mdp'=>$u->getMdp(),
      'role'=>$u->getRole()
    ));
  }

  public function afficherInfoProfil($id) {
    $sql = $this->connexionBdd()->prepare('SELECT * FROM user WHERE id=:id');
    $sql->execute(array(
      'id'=>$id
    ));
    return $id;
  }


}

?>
