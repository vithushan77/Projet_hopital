<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/dossier-ad.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$user = new user($_POST);
$newDossier = new dossier($_POST);
$manager = new manager();
$manager->ajoutDossierAdmission($user, $newDossier);

 ?>
