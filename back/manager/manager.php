<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/medecin.php');
session_start();

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

  public function signIn($u) {
    $sql = $this->connexionBdd()->prepare('SELECT * FROM utilisateur WHERE mail = :mail');
    $sql->execute(array(
      'mail'=>$u->getMail()
    ));
    $result = $sql->fetch();
    if ($result['statut'] == "admin") {
      $_SESSION['mail'] = $u->getMail();
      $_SESSION['statut'] = $result['statut'];     // Si la colonne id = 1, on le redirige vers le panel_admin
      header('Location: ../../vue/admin/panel_admin.php ');
    }
    elseif(password_verify($u->getMdp(), $result['mdp'])) { // On décrypte le mot de passe, et on vérifie qu'il correspond au POST['pwd']
      $_SESSION['statut'] = $result['statut'];
      $_SESSION['mail'] = $u->getMail();
      echo '<body onLoad="alert(\'Bienvenue sur votre compte\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/index.php">';
    }
    else {
      echo '<body onLoad="alert(\'Mot de passe ou mail incorrect !\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/connexion.php">';
    }
  }

  public function insertUser(User $u) {
    $sql = $this->connexionBdd()->prepare('SELECT mail FROM utilisateur WHERE mail = :mail');
    $sql->execute(array('mail'=>$u->getMail()));
    $res = $sql->fetch();
    if($res)
    {
      echo '<body onLoad="alert(\'Adresse mail déjà utilisée\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/inscription.php">';
    }

    else{
      $sql = $this->connexionBdd()->prepare("INSERT INTO utilisateur (nom, prenom, sexe, mail, mdp, statut)
      VALUES(:nom, :prenom, :sexe, :mail, :mdp, :statut)");
      $sql->execute(array(
        'nom'=>$u->getNom(),
        'prenom'=>$u->getPrenom(),
        'sexe'=>$u->getSexe(),
        'mail'=>$u->getMail(),
        'mdp'=>$u->getMdp(),
        'statut'=>$u->getStatut()
    ));
      echo '<body onLoad="alert(\'Compte créé avec succès\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/connexion.php">';
    }
  }

  public function modifierProfil(User $u) {
    $sql = $this->connexionBdd()->prepare('UPDATE utilisateur SET nom=:nom, prenom=:prenom, mail=:mail, sexe=:sexe WHERE id=:id');
    $res = $sql->execute(array(
      'nom'=>$u->getNom(),
      'prenom'=>$u->getPrenom(),
      'mail'=>$u->getMail(),
      'sexe'=>$u->getSexe(),
      'id'=>$u->getId()
    ));
    if($res) {
      echo '<body onLoad="alert(\'Informations enregistrées\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/moncompte.php">';
    } else {
      echo '<body onLoad="alert(\'Enregistrements non valides ! Veuillez réessayer ultérieurement !\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/moncompte.php">';
    }
  }

  public function modifyPwd(User $u) {
    $sql = $this->connexionBdd()->prepare('UPDATE user SET mdp=:mdp WHERE id=:id');
    $sql->execute(array(
      'mdp'=>$u->getMdp()
    ));
  }

  public function afficherInfoProfil($mail) {
    $sql = $this->connexionBdd()->prepare('SELECT * FROM utilisateur WHERE mail=:mail');
    $sql->execute(array(
      'mail'=>$mail
    ));
    $result = $sql->fetch();
    return $result;
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

  public function displayHours() {
    $sql = $this->connexionBdd()->prepare('SELECT * FROM heure_rdv');
    $sql->execute();
    $result = $sql->fetchAll();
    return $result;
  }
  public function lemedecin(){
    $sql = $this->connexionBdd()->prepare('SELECT * FROM medecin');
    $sql->execute();
    $result = $sql->fetchAll();
    return $result;

  }

  public function displayUser() {
    $sql = $this->connexionBdd()->prepare('SELECT * FROM utilisateur');
    $sql->execute();
    $result = $sql->fetchAll();
    return $result;
  }

  public function ajoutDossierAdmission(Dossier $folder) {
    $sql = $this->connexionBdd()->prepare("INSERT INTO dossier (date_naissance, adresse_post, mutuelle, num_ss, optn, regime)
    VALUES (:date_naissance, :adresse_post, :mutuelle, :num_ss, :optn, :regime)");
    $res = $sql->execute(array(
      'date_naissance'=>$folder->getDate_naissance(),
      'adresse_post'=>$folder->getAdresse_post(),
      'mutuelle'=>$folder->getMutuelle(),
      'optn'=>$folder->getOptn(),
      'regime'=>$folder->getRegime()
    ));
    if($res) {
      echo '<body onLoad="alert(\'Informations du dossier enregistrées\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/moncompte.php">';
    }
    else {
      echo '<body onLoad="alert(\'Veuillez remplir les champs du formulaire\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/dossierAdmission.php">';
    }
  }

}

?>
