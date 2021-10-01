<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$m = new user($_POST);
$manager = new manager();

if(empty($_POST['mail'])) {
  header('Location: ../mdpOublie.php');
} else {
  $manager->saisirMail($m);
  header('Location: ../forms/mdpOublie2.php');
}


 ?>
