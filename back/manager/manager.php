<?php

class manager {

//Connexion à la base de données
  public function connexionBdd($db) {
    try {
      $db = new PDO('mysql:host=localhost;dbname=;charset=utf8', 'root', '');
    }
    catch(Exception $e) {
      die('Error' : $e->getMessage());
    }
  }

  public function connexion() {

  }

  public function inscription() {

  }

  public function modifierProfil() {

  }
}

?>
