<!DOCTYPE html>
<html lang="en">
<?php session_start()?>
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
              if(empty($_SESSION['user'])) {
               ?>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/index.php">Home</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/about.php">About</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/products.php">Products</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/store.php">Store</a></li>
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/Projet_hopital/view/urgence.php">Urgence</a></li>
              <?php }
                ?>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
