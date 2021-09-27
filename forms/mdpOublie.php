<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Réinitialisation du mot de passe</title>
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
        <span class="site-heading-lower">Réinitialisation</span>
    </h1>
</header>
<!-- Navbar-->
<?php include '../include/header.php'; ?>
<section class="page-section about-heading">
    <div class="container">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span style="text-align: center" class="section-heading-upper">Problèmes de connexion ?</span>
                        </h2>
                            <span class="section-heading-upper"></span>
                        </h2>
                        <p class="text-center text-muted">Pas encore membre ?<a href="inscription.php">Inscrivez vous ici.</a>. </p>
                        <p class="text-center text-muted">Veuillez saisir votre adresse mail, nous vous enverrons un lien pour récupérer votre compte.</p>

                        <form action="../back/enterMail.php" method="post" >
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="">Adresse mail</label>
                                    <input type="email" class="form-control" name="mail"  minlength="4" maxlength="62" required>
                                </div>
                             </div>

                             <div class="form-group row">
                               <div class="">
                                   <button type="submit" class="btninsc">Valider</button>
                               </div>
                             </div>

                        </form>
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
