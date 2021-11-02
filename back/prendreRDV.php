<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');
$manager = new manager();
$resrdv = $manager->getRdvHeure($_POST);
//var_dump($_POST);
//echo $resrdv;
//print_r($resrdv);
//var_dump($resrdv);
//printf($resrdv);
//if (is_null($resrdv)){
//    echo "AAAAA";
//}
//if (empty($resrdv)){
//    echo "BBBBB";
//}
//if (is_null($resrdv)){
//    echo "AAAAA";
//}
//if ($resrdv = ""){
//    echo "CCCCC";
//}
//if ($resrdv = false){
//    echo "DDDDD";
//}
//exit;
if (empty($resrdv)) {
    $result = $manager->insertDate($_POST);
    $res = $manager->priseRDV($_POST);
}
else{
    echo '<body onLoad="alert(\'Cette horraire de RDV est déjà prise\')">';
    echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/forms/rdvmedecins.php">';
}

?>