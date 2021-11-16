<?php
$file = $_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/fichier/'.$_POST['fichier'];
$filename = basename($file);
header("Content-Type: application/pdf");

header("Content-Length: " . filesize($file));

header("Content-Disposition: attachment; filename=". $filename);

readfile($file);

?>