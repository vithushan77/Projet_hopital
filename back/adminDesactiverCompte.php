<?php

require_once($_SERVER['DOCUMENT_ROOT'] .'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'] .'/Projet_hopital/back/manager/manager.php');

$accountState = new user($_POST);
$manager = new manager();
$manager->DeactivateAccount($accountState);
header('Location: ../view/panel_admin.php');

?>
