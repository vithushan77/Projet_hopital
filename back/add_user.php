<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

session_start();

$new_user = new user($_POST);
$manager = new manager();
$new_user->setRole('patient');
$result = $manager->insertUser($new_user);
if($result) {
  header('Location: ../forms/inscription.php');
} else {
  header('Location: ../forms/connexion.php');
}

 ?>
