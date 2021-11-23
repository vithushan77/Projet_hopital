<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');
$manager = new Manager();
//var_dump($_FILES);

//verifie que tout va bien pour le fichier
if ($_FILES['ordonnance']['size']!=0) {
    $idFichier = uniqid().'.pdf';// attribue un id unique
    move_uploaded_file($_FILES['ordonnance']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT']."/Projet_hopital/fichier/".$idFichier);

    $array = ['id_rdv'=>$_POST['id_rdv'],
        'fichier'=>$idFichier,
        'nomFichier'=> $_FILES['ordonnance']['name']];
        $manager->setOrdonnance($array);
        exit();
        header('Location: ../index.php');

}

else {
    echo '<body onLoad="alert(\'Erreur dans lordonnance\')">';
    echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/rdvmedecins.php">';
}
//
//$manager->setSAV($array);
//header('Location: ../index.php');