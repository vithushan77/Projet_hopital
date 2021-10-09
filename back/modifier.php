<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$modify = new user($_POST);
$manager = new manager();
$res = $manager->modifierProfil($modify);

 ?>
