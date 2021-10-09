<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$u = new user($_POST);
$manager = new manager();
$res = $manager->signIn($u);

 ?>
