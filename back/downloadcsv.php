<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');
$manager = new manager();
$manager->pdoToCsv();
?>
