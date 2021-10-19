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
      $_SESSION['statut'] = $result['statut'];
      $_SESSION['id'] = $result['id']; // Si la colonne id = 1, on le redirige vers le panel_admin
      header('Location: ../../vue/admin/panel_admin.php ');
    }
    elseif(password_verify($u->getMdp(), $result['mdp'])) { // On décrypte le mot de passe, et on vérifie qu'il correspond au POST['pwd']
      $_SESSION['statut'] = $result['statut'];
      $_SESSION['mail'] = $u->getMail();
      $_SESSION['id'] = $result['id'];
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
    $sql = $this->connexionBdd()->prepare('SELECT * FROM heure');
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

  public function ajoutDossierAdmission(User $u, Dossier $dossier) {
    $sql = $this->connexionBdd()->prepare('SELECT id FROM utilisateur WHERE nom=:nom AND prenom=:prenom');
    $sql->execute(array(
      'nom'=>$u->getNom(),
      'prenom'=>$u->getPrenom()
    ));
    $sql->fetch();
    $dossier->setId_patient($sql['id']);
    $sql = $this->connexionBdd()->prepare("INSERT INTO dossier (id_patient, date_naissance, adresse_post, mutuelle, num_ss, optn, regime)
    VALUES (:id_patient, :date_naissance, :adresse_post, :mutuelle, :num_ss, :optn, :regime)");
    $res = $sql->execute(array(
      'date_naissance'=>$dossier->getDate_naissance(),
      'adresse_post'=>$dossier->getAdresse_post(),
      'mutuelle'=>$dossier->getMutuelle(),
      'optn'=>$dossier->getOptn(),
      'regime'=>$dossier->getRegime()
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

  public function priseRDV($infordv){
    var_dump($_POST);
    $sql = $this->connexionBdd()->prepare('SELECT id FROM utilisateur WHERE nom=:nom');
    $sql->execute([
        'nom'=>$_POST['utilisateur']
    ]);
    $resultpatient = $sql->fetch();

    var_dump($resultpatient);

    $sql = $this->connexionBdd()->prepare('SELECT id FROM utilisateur WHERE statut="medecin" AND mail=:mail');
    $sql->execute([
        'mail'=>$_SESSION['mail']
    ]);
    $resultmedecin = $sql->fetch();
    var_dump($resultmedecin);
    var_dump($_SESSION);
    $sql = $this->connexionBdd()->prepare('SELECT id FROM heure WHERE heure=:heure');
    $sql->execute([
        'heure'=>$_POST['heure']
    ]);
    $resultheure = $sql->fetch();
    var_dump($resultheure);
    $sql = $this->connexionBdd()->prepare('INSERT INTO rdv (id_utilisateur, id_heure, id_medecin)
      VALUES (:id_utilisateur, :id_heure, :id_medecin)');
    $res = $sql->execute([
        'id_medecin'=>$resultmedecin['id'],
        'id_utilisateur'=>$resultpatient['id'],
        'id_heure'=>$resultheure['id']
    ]);
    echo "heure : ". $resultheure['id'];
    echo "patient : ".$resultpatient['id'];
    echo "medecin : ".$resultmedecin['id'];
    exit;

    if($res) {
      echo '<body onLoad="alert(\'Prise de rendez-vous réussie\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/rdvmedecins.php">';
    }
    else {
      echo '<body onLoad="alert(\'Erreur dans la prise de RDV\')">';
      echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/rdvmedecins.php">';
    }
  }

  public function getNombySession(){
    $sql = $this->connexionBdd()->prepare('SELECT id from utilisateur where mail=:mail');
    $sql->execute(array(
        'mail'=>$_SESSION['mail']));
    $res=$sql->fetch();
    return $res;


  }
  public function ajtrdv($poitement){
    $sql = $this->connexionBdd()->prepare('INSERT INTO rdv(id_utilisateur, id_medecin, id_heure)value (:id_utilisateur, :id_medecin, :id_heure)');
    $sql->execute(array(
        'id_utilisateur'=>$poitement->getId_utilisateur(),
        'id_medecin'=>$poitement->getId_medecin(),
        'id_heure'=>$poitement->getId_heure()
    ));

  }
  public function getLesrdv(){
    $sql = $this->connexionBdd()->prepare('SELECT * from rdv');
    $sql->execute(array(
        'id'=>$_SESSION['id']
    ));

  }

}
?>
