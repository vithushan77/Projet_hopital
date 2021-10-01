<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$connexion = new user($_POST);
$manager = new manager();
$res = $manager->signIn($connexion);
session_start();
$_SESSION['user'] = serialize($res);
echo '<body onLoad="alert(\'Bienvenue dans votre espace\')">';
echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/index.php">';

 ?>
