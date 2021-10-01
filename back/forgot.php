<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$user = new user($_POST);
$manager = new manager();
$user->setMdp($_POST['mdp']);
$manager->nouveauMdp($user);
header('Location: ../forms/connexion.php');


 ?>
