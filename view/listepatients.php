<!DOCTYPE html>
<html lang="en">
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/entity/user.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel d'administration</title>
    <link rel="icon" type="image/x-icon" href="/Projet_hopital/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/Projet_hopital/css/styles.css" rel="stylesheet" />
</head>
<body>
<header>
    <h1 class="site-heading text-center text-faded d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3">A Free Bootstrap Business Theme</span>
        <span class="site-heading-lower">Business Casual</span>
    </h1>
</header>
<!-- Navbar-->
<?php include '../include/header.php'; ?>
<br>
<br>
<section class="page-section about-heading">
    <div class="container">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Strong Coffee, Strong Roots</span>
                            <span class="section-heading-lower">About Our Cafe</span>
                        </h2>
                        <p>Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich coffee sourced from artisan farmers in various regions of South and Central America. We are dedicated to travelling the world, finding the best coffee, and bringing back to you here in our cafe.</p>
                        <p class="mb-0">
                            We guarantee that you will fall in
                            <em>lust</em>
                            with our decadent blends the moment you walk inside until you finish your last sip. Join us for your daily routine, an outing with friends, or simply just to enjoy some alone time.
                        </p>

                        <!-- Ajout de style du tableau -->

                        <style>
                            table {
                                border-collapse: collapse;
                            }
                            td, th {
                                border: 1px solid black;
                                padding: 10px;
                            }
                            caption{
                                margin-top: 10px;
                                margin-bottom: 10px;
                            }
                        </style>

                        <!-- Boutons permettannt d'exporter les informations d'une des tables de la bdd en XLS -->

                        <caption>
                            <h4>
                                Exportation de données
                            </h4>
                        </caption>
                        <form action="" method="post">
                            <input type="button" class="btninsc" value="Exporter en XLS">
                        </form>

                        <hr>

                        <!-- Bouton redirigeant vers un formulaire permettant d'ajouter des patients -->

                        <caption>
                            <h4>
                                Ajout de nouveaux patients
                            </h4>
                        </caption>
                        <input type="button" class="btninsc" value="Ajouter nouveaux patients" onClick="location.href='../forms/urgentisteAjoutPatient.php'">
                        <hr>

                        <!-- Tableau affichant une liste d'utilisateurs -->

                        <caption>
                            <h4>
                                Visualisation des patients
                            </h4>
                        </caption>

                        <div class="table">
                            <table>
                                <?php
                                $manager = new manager();
                                $patients = $manager->afficherPatients();
                                ?>
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Adresse électronique</th>
                                    <th>Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($patients as $keys => $values) {
                                    ?>
                                    <tr>
                                        <td> <?=$values['nom']; ?> </td>
                                        <td> <?=$values['prenom']; ?></td>
                                        <td> <?=$values['mail']; ?></td>
                                        <td> <?=$values['statut']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include '../include/footer.php'; ?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/Projet_hopital/js/scripts.js"></script>
</body>
</html>