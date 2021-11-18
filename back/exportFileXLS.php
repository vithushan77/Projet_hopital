<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/medecin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/specialites.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$user = new user($_POST);
$specialities = new specialites($_POST);
$exportFileXLS = new medecin($_POST);
$manager = new manager();
$manager->exportFile($user, $specialities,$exportFileXLS);
