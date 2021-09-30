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
        $r = $manager->afficherInfoProfil(unserialize($_SESSION['user'])->getId());
        $r = unserialize($_SESSION['user']);
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
                                <p class="text-center text-muted">Vous pouvez à tout moment changer les informations de votre compte en cas d'erreur de saisie.</p>

                                <form action="../back/modifier.php" method="post" >
                                  <div class="form-group row">
                                    <div class="col-md-6">
                                      <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                                    </div>

                                    <div class="col-md-6">
                                      <label for="">Nom de naissance</label>
                                      <input type="text" class="form-control" name="nom" value="<?php echo $r->getNom(); ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                      <label for="">Nom d'usage</label>
                                      <input type="text" class="form-control" name="nom_usage" value="<?php echo $r->getNom_usage(); ?>">
                                    </div>

                                    <div class="col-md-6">
                                      <label for="">Prénom</label>
                                      <input type="text" class="form-control" name="prenom" value="<?php echo $r->getPrenom(); ?>" required>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="">Sexe</label>
                                      <select name="sexe" class="form-control" required>
                                        <optgroup label="">
                                          <option value="homme">HOMME</option>
                                          <option value="femme">FEMME</option>
                                        </optgroup>
                                      </select>
                                    </div>

                                    <div class="col-md-12">
                                      <label for="">Adresse mail</label>
                                      <input type="email" class="form-control" name="mail" value="<?php echo $r->getMail(); ?>" required>
                                    </div>

                                      <div>
                                          <button type="submit" class="btninsc">Valider</button>
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
