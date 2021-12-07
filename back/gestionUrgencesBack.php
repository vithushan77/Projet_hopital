<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/urgences.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$urg = new urgences($_POST);
$manager = new manager();
$manager->gestionUrgences($urg);
header('Location: ../view/listepatients.php');

 ?>
