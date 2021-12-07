<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Compte HSP</title>
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
        <?php
        include '../include/header.php';
        $manager = new manager();
        $r = $manager->afficherInfoProfil($_SESSION['mail']);
        ?>
        <section class="page-section about-heading">
            <div class="container">

<br>
<br>

                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Informations du compte</span>
                                </h2>
                                <p class="text-center text-muted">Vous pouvez à tout moment changer les informations de votre compte en cas d'erreur de saisie. <a href="/Projet_hopital/forms/dossierAdmission.php"/>Cliquez ici pour constituer votre dossier.</a></p>

                                <form action="../back/modifier.php" method="post">
                                  <div class="form-group row">

                                      <div class="col-md-12">
                                          <input type="hidden" class="form-control" name="id" value="<?php echo $r['id']; ?>" required>
                                      </div>

                                    <div class="col-md-6">
                                      <label for="">Nom de naissance</label>
                                      <input type="text" class="form-control" name="nom" value="<?php echo $r['nom']; ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                      <label for="">Prénom</label>
                                      <input type="text" class="form-control" name="prenom" value="<?php echo $r['prenom']; ?>" required>
                                    </div>

                                      <div class="col-md-6">
                                          <label for="">SEXE</label>
                                          <input type="text" class="form-control" name="sexe" value="<?php echo $r['sexe']; ?>" required>
                                      </div>

                                    <div class="col-md-12">
                                      <label for="">Adresse mail</label>
                                      <input type="email" class="form-control" name="mail" value="<?php echo $r['mail']; ?>" required>
                                    </div>

                                      <div>
                                          <br>
                                          <button type="submit" class="btninsc">Valider</button>
                                      </div>
                                </form>
                                <br>
                                <form action="../back/congemedecin.php" method="post">
                                <div class="col-md-12">
                                    <input type="date" min="<?= date('Y-m-d'); ?>" name="dateconge" required>
                                    <input type="submit" class="btninsc" value="Partir en congé">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <?php
        include '../include/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/Projet_hopital/js/scripts.js"></script>
    </body>
</html>
