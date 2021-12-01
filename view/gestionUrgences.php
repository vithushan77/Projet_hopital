<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Gestion d'urgences</title>
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
        <span class="site-heading-lower">Gestion d'urgences</span>
    </h1>
</header>
<!-- Navbar-->
<?php
include '../include/header.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');
$manager = new manager();
$hopitaux = $manager->afficherHopitaux();
?>
<section class="page-section about-heading">
    <div class="container">

        <br>

        <br>

        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <a href="/Projet_hopital/view/listepatients.php"/>Retour</a></p>
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Gestion d'urgences</span>
                        </h2>

                        <form action="../back/urgentisteAjout.php" method="post" >
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="">Numéro du patient</label>
                                    <input type="text" class="form-control" name="id_patient" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="">Priorité du patient :</label>
                                    <select name="priorite" class="form-control" required>
                                        <optgroup label="">
                                            <option value="--/--">--/--</option>
                                            <option value="Basse">Basse</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="Haute">Haute</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Le patient est-affecté dans un cabinet ?</label>
                                    <select name="affectationCabinet" class="form-control" required>
                                      <option value="--/--">--/--</option>
                                      <option value="Pas encore">Pas encore</option>
                                      <option value="Oui">Oui</option>
                                      <option value="Non">Non</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="">Le patient est-il affecté dans un hôpital ?</label>
                                    <select name="passageHopital" class="form-control" required>
                                      <option value="--/--">--/--</option>
                                      <option value="Pas encore">Pas encore</option>
                                      <option value="Oui">Oui</option>
                                      <option value="Non">Non</option>
                                    </select>
                                </div>

                                <!-- Liste déroulante pour sélectionner un hôpital -->

                                <div class="col-md-12">
                                  <label for="">Passage aux urgences à :</label>
                                  <select name="nomHopitaux" class="form-control" required>
                                    <option value="Aucun">Aucun</option>
                                    <?php foreach ($hopitaux as $keys => $values) { ?>
                                    <option value="<?=$values['id']?>"><?="L'",$values['nomHopitaux'],',&nbsp',$values['adresse']?></option>
                                  <?php } ?>
                                  </select>
                                </div>

                                <!-- Ajout de style du champs de texte -->

                                <style>
                                textarea {
                                  font-size: .8rem;
                                  letter-spacing: 1px;
                                  padding: 10px;
                                  max-width: 100%;
                                  line-height: 1.5;
                                  border-radius: 5px;
                                  border: 1px solid #ccc;
                                  box-shadow: 1px 1px 1px #999;
                                }
                                </style>


                                <!-- Champs de texte pour décrire les symptômes du patient -->
                                <div class="col-md-12">
                                  <label for="">Description des symptômes du patient :</label>
                                  <textarea class="form-control" name="symptomes" rows="5" cols="30" maxlength="255" required></textarea>
                                </div>

                                <div>
                                    <button type="submit" class="btninsc">Créer un compte</button>
                                    <button type="reset" class="btninsc">Réinitialiser</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer text-faded text-center py-5">
    <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/Projet_hopital/js/scripts.js"></script>
</body>
</html>
