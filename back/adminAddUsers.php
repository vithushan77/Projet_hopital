<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$newMembers = new user($_POST);
$manager = new manager();
$newMembers->setStatut($_POST['statut']);
$newMembers->setEtat('Activé');
$manager->adminAddUsers($newMembers);

 ?>
