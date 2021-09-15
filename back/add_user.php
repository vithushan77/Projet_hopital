<?php

require_once($_SERVER['DOCUMENT_ROOT'].'Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'Projet_hopital/back/manager/manager.php')

$new_user = new user($_POST);
$manager = new manager();
$manager->insertUser($new_user);

 ?>
