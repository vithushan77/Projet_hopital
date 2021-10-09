<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$new_user = new user($_POST);
$manager = new manager();
$new_user->setStatut($_POST['statut']);
$manager->insertUser($new_user);

 ?>
