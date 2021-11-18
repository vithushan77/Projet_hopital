<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/dossier-ad.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$newPatient = new user($_POST);
$newDossier = new dossier($_POST);
$newPatient->setStatut('patient');
$newPatient->setEtat('Activé');
$manager = new manager();
$manager->comptePatientUrgences($newPatient, $newDossier);

?>
