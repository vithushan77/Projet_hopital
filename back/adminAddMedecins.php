<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/medecin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

$_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$newMember = new user($_POST);
$newDoctor = new medecin($_POST);
$manager = new manager();

if(isset($_POST['nomSpe']))
{
  $newMember->setStatut('medecin');
  $newDoctor->setId_specialite($_POST['nomSpe']);
  $manager->adminAddMedecins($newMember, $newDoctor);
}
else
{
  header('Location: ../forms/adminAjoutPraticiens.php');
}

 ?>
