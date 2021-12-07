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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
<header>
    <h1 class="site-heading text-center text-faded d-none d-lg-block">
        <span class="site-heading-lower">Espace utilisateur</span>
    </h1>
</header>
<!-- Navbar-->
<?php include '../include/header.php';
require_once ($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/identifiant.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/Projet_hopital/back/manager/manager.php');
$manager = new Manager();
$res = $manager->displayHours();
$med = $manager->lemedecin();
$rdv = $manager->getLesrdv();
$resultrdv = $manager->getUserRdv();
$categoriesMotifs = $manager->afficherCategoriesMotifs();
$typesConsultations = $manager->afficherTypesConsultations();
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
                        <form action="../back/add_rdv_patient.php" method="post" >
                            <div class="form-group row">
                                <div class="col-md-12">
                                        <label for="">Choisissez votre médecin:</label>
                                        <select name="nom" class="selectrdv" required>
                                            <?php
                                            foreach ($med as $value1){ ?>
                                                <option value="<?= $value1['id']?>"><?='Dr','.',$value1['nom']?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <br></br>
                                <div class="col-md-12">
                                <label for="">Motif de consultation :</label>
                                <select name="libelle" class="selectmot" required>
                                    <?php foreach($typesConsultations as $keys => $values) { ?>
                                    <option value="<?=$values['id']?>"><?=$values['libelle']?></option>
                                    <?php } ?>
                                </select>
                                    <div class="col-md-12">
                                        <label for="">Catégorie de motif :</label>
                                        <select name="libelle" class="selectmot" required>
                                            <?php foreach($categoriesMotifs as $keys => $values) { ?>
                                                <option value="<?=$values['id']?>"><?=$values['libelle']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <div class="col-md-12">
                                    <label for="">Choisir la date  :</label>
                                    <input type="date" name="daterdv" class="" id="date" min="<?= date('Y-m-d'); ?>"/>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Choisir l'heure du RDV:</label>
                                    <select name="heure" class="selectrdv">
                                        <?php
                                        foreach ($res as $value){?>
                                            <option value="<?php echo $value['heure'];?>"><?php echo $value['heure'];?></option>

                                        <?php }?>
                                    </select>
                                    <br>
                                </div>
                                <div>
                                    <button id="buttonrdv" type="submit" class="btninsc">Prendre RDV</button>
                                </div>

                            </div>
                        </form>
                <br>

                <div class="card">
                    <h5 class="card-header">Vos Rendez-vous à venir</h5>
                    <?php
                    foreach ($resultrdv as $value2){
                    ?>
                    <div class="card-body">
                        <p class="card-text">
                            <table id="example" class="display">
                            <thead>
                            <tr>
                                <th>Heure</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Medecin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?=$value2['heure']?></td>
                                <td><?=$value2['nom']?></td>
                                <td><?=$value2['prenom']?></td>
                                <td><?=$value2['nom_medecin']?></td>
                            </tr>
                            </tbody>
                        </table>
                        <form action="../back/deleterdvpatient.php" method="post">
                            <input type="hidden" name="id" value="<?= $value2['id']?>">
                        <input type="submit" value="Annuler" class="btninsc" />
                        </form>
                    </div>
                    <?php }?>
                </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include '../include/footer.php'; ?>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Core theme JS-->
<script src="/Projet_hopital/js/scripts.js"></script>
</body>
</html>
