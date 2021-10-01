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
    $sql = $this->connexionBdd()->prepare('SELECT * FROM user WHERE mail=:mail AND mdp=:mdp');
    $sql->execute(array(
      'mail'=>$signin->getMail(),
      'mdp'=>$signin->getMdp()
    ));
    $result = $sql->fetch();

    $isPwdCorrect = password_verify($signin->getMdp(), $result['mdp']);
    if($isPwdCorrect) {
      return 1;
    } else {
      return 0;
    }
  }

  public function insertUser(User $u) {
    $sql = $this->connexionBdd()->prepare('SELECT COUNT(*) as nbEmail FROM user WHERE mail=:mail');
    $sql->execute(array(
      'mail'=>$u->getMail()
    ));
    $ifemailexists = $sql->fetch();

    $request = $this->connexionBdd()->prepare('SELECT COUNT(*) as nbMdp FROM user WHERE mdp=:mdp');
    $request->execute(array(
      'mdp'=>$u->getMdp()
    ));
    $ifpwdexists = $request->fetch();

    $option = ['cost' => 15];
    $hashedPwd = password_hash($u->getMdp(), PASSWORD_DEFAULT, $option);

    if($ifemailexists['nbEmail'] == 0 AND $ifpwdexists['nbMdp'] == 0) {
      $sql = $this->connexionBdd()->prepare("INSERT INTO user (nom, nom_usage, prenom, sexe, mail, mdp, role)
      VALUES(:nom, :nom_usage, :prenom, :sexe, :mail, :mdp, :role)");
      $sql->execute(array(
        'nom'=>$u->getNom(),
        'nom_usage'=>$u->getNom_usage(),
        'prenom'=>$u->getPrenom(),
        'sexe'=>$u->getSexe(),
        'mail'=>$u->getMail(),
        'mdp'=>$hashedPwd,
        'role'=>$u->getRole()
    ));
      echo '<body onLoad="alert(\'Compte créé avec succès\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/connexion.php">';
    }
    else{
      echo '<body onLoad="alert(\'Adresse mail ou mot de passe déjà existants\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/inscription.php">';
    }
  }

  public function modifierProfil(User $u) {
    $sql = $this->connexionBdd()->prepare('UPDATE user SET nom=:nom, nom_usage=:nom_usage, prenom=:prenom, mail=:mail WHERE id=:id');
    $sql->execute(array(
      'id'=>$u->getId(),
      'nom'=>$u->getNom(),
      'nom_usage'=>$u->getNom_usage(),
      'prenom'=>$u->getPrenom(),
      'mail'=>$u->getMail(),
    ));
  }

  public function modifyPwd(User $u) {
    $sql = $this->connexionBdd()->prepare('UPDATE user SET mdp=:mdp WHERE id=:id');
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
    $sql = $this->connexionBdd()->prepare('SELECT COUNT(*) as nb FROM user WHERE mail=:mail');
    $sql->execute(array('mail'=>$mail->getMail()));
    $sql->fetch();
  }

  public function nouveauMdp(User $u) {
    $option = ['cost' => 15];
    $hashedPwd = password_hash($u->getMdp(), PASSWORD_DEFAULT, $option);
    $sql = $this->connexionBdd()->prepare('UPDATE user SET mdp=:mdp WHERE mail=:mail');
    $result = $sql->execute(array(
      'mail'=>$u->getMail(),
      'mdp'=>$hashedPwd
    ));
  }


}

?>
