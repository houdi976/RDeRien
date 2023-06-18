<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Un R de Rien</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
     <!-- Navigation-->
     <?php include_once('partials/nav.php');?>
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Choisir un profil</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="consumer/registerConsumer.php">
                            <div class="portfolio-hover-content">
                            </div>
                        <img class="img-fluid" src="assets/img/register/espaceconsommateur.png" alt="..." />
                    </a>
                    
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="collector/registerCollector.php">
                            <div class="portfolio-hover-content">
                            </div>
                        <img class="img-fluid" src="assets/img/register/espacecollecteur.png" alt="..." />
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="consumer/registerConsumer.php">
                            <div class="portfolio-hover-content">
                            </div>
                        <img class="img-fluid" src="assets/img/register/espacerecycleur.png" alt="..." />
                    </a>
                </div>
            </div>           
        </div>
    </div>
</section>
       
<?php include_once('partials/footer.html');?>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>