<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$connexion = new user($_POST);
$manager = new manager();
$res = $manager->signIn($connexion);
session_start();
$_SESSION['user'] = serialize($res);
header('Location: ../index.php');

 ?>
