<!DOCTYPE html>
<html>

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
<?php $title="Page Perso "; ?>

<body>
    <!-- Navigation-->
    <?php include_once('partials/nav.php');?>
    <?php include_once('includes/functions.php'); ?>
    <?php
      require_once('partials/_flash.php');
      require_once('config/database.php');
      $userInfo = getUserInfo($_SESSION['email']); 
      $chemin = "consumer/files/".$userInfo['photo'];

?>
    <section>
        <div class="container">
            <div class="row">

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img style="margin-top: 100px; border-radius: 50%;" src="<?php echo $chemin; ?>" alt=""
                            class="img-thumbnail img-circle" />
                        <p class="text-muted"><?php echo"".$userInfo['name']. " ".$userInfo['surname']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</body>

</html>