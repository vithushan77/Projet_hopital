<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$modify = new user($_POST);
$manager = new manager();
$manager->modifierProfil();
$result = $manager->afficherInfoProfil();
if($result) {
  session_start();
  $_SESSIO['user'] = serialize($result);
  echo '<body onLoad="alert(\'Informations enregistrées\')">';
  echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/moncompte.php">';
} else {
  echo '<body onLoad="alert(\'Enregistrements non valides ! Veuillez réessayer ultérieurement !\')">';
  echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/moncompte.php">';
}
 ?>
