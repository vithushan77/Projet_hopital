<!DOCTYPE html>
<html lang="en">
<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');

?>
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="Projet_hopital/index.php">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <?php
              if(empty($_SESSION['mail'])) {
               ?>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/index.php">Accueil</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/medecins.php">Nos médecins</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/locaux.php">Nos locaux</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/store.php">Store</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/urgence.php">Urgence</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/forms/inscription.php">Espace utilisateur</a></li>
              <?php }
              if (isset($_SESSION['statut'])){
                if($_SESSION['statut'] == "medecin") {
                  ?>
                  <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/index.php">Home</a></li>
                  <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/urgence.php">Urgence</a></li>
                  <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/forms/rdvmedecins.php">Prendre un RDV</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/forms/rdv.php">Voir vos RDV</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/forms/moncompte.php">Mon compte</a></li>
                  <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/back/deconnexion.php">Déconnexion</a></li>
                <?php }}
                ?>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
