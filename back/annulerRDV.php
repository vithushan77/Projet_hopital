<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/dossier-ad.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$manager = new manager();
$manager->annulerRDV($_POST);

?>