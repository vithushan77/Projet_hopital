<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Connexion HSP</title>
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
        <span class="site-heading-lower">Espace utilisateur</span>
    </h1>
</header>
<!-- Navbar-->
<?php include '../include/header.php';
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');
$manager = new Manager();
$res = $manager->displayHours();
$results = $manager->displayUser();
$resultrdv = $manager->getUserRdv();
?>
<br><br>
<section class="page-section about-heading">
    <div class="container">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span style="text-align: center" class="section-heading-upper">Prendre un RDV</span>
                        </h2>
                        <span class="section-heading-upper"></span>
                        </h2>
                        <form action="../back/prendreRDV.php" method="post" >
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="">Choisir le patient :</label>
                                    <select name="utilisateur">
                                        <?php foreach ($results as $value){ ?>
                                            <option value="<?= $value['nom']?>"><?= $value['nom']?></option>
                                      <?php  } ?>
                                    </select>
                                </div>
                                <br><br>
                                <div class="col-md-12">
                                    <label for="">Choisir la date  :</label>
                                    <input type="date" name="daterdv" class="" id="date" min="<?= date('Y-m-d'); ?>"/>
                                </div>
                                <br><br>
                                <div class="col-md-12">
                                    <label for="">Choisir l'heure :</label>
                                    <select name="heure">
                                        <?php foreach ($res as $value){ ?>
                                            <option value="<?= $value['heure']?>"><?= $value['heure']?></option>
                                        <?php  } ?>
                                    </select> <br>
                                </div>
                                <div>
                                    <br>
                                    <button type="submit" class="btninsc">Valider</button>
                                    <br>
                                </div>
                        </form>
                                <br>
                                <hr style="height: 7px; margin-top: 7px; color: black">
                                <div style="border: solid; border-radius: 3px; border-color: #c8ad7f;">
                                    <form action="../back/annulerRDV.php" method="post">
                                    <h2 class="section-heading mb-4">
                                        <span style="text-align: center" class="section-heading-upper">Vos rendez-vous</span>
                                    </h2>
                                    <?php foreach ($resultrdv as $value){ ?>
                                        <p>
                                            <?= $value['nom'] ?>
                                            <?= $value['heure'] ?>
                                            <?= $value ['date_rdv'] ?>
                                            <?php if ($value['date_rdv'] > date("Y-m-d")){ ?>
                                            <input type="submit" value="Annuler" class="btninsc" />
                                            <?php } ?>
                                            <input type="hidden" name="id" value="<?= $value['id'] ?>">

                                        </p>
                                    <?php } ?>
                                </div>
                        </form>
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

