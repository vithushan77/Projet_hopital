<?php

session_start();
session_destroy();
echo '<body onLoad="alert(\'Vous êtes maintenant déconnecté(e)\')">';
echo '<meta http-equiv="refresh" content="0;URL=/Projet_hopital/index.php">';

 ?>
