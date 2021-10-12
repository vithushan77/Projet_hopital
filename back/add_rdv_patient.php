<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$new_rdv = new rdv($_POST);
$manager = new manager();
$new_user->setStatut($_POST['statut']);
$manager->insertUser($new_user);

