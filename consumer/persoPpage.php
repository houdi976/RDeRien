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
        <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
<?php $title="Page Perso "; ?>

<body>

    <!-- Navigation-->
    <?php include_once('../partials/nav.php');?>
    <?php
      require_once('../partials/_flash.php');
      require_once('../config/database.php');
      $userInfo = getUserInfo($_SESSION['email']);


?>
    <?php 
//    echo"".$userInfo['name']. " ".$userInfo['surname'];
?>
    <div class="collapse navbar-collapse navbar-ex1-collapse nav-right">
        <ul class="nav navbar-nav navbar-left cl-effect-15">
            <li><a href="../deconnexion.php">Déconnexion</a></li>
        </ul>
    </div>
    
    <?php
//    echo"".$userInfo['name']. " ".$userInfo['surname'];?>

    <br><br><br><br><br><br><br>


<div class="container">
    <!--    bar vertical-->
    <div class="row">
        <!--        profil-->
        <div class="col-md-2 d-flex align-items-center justify-content-center">
            <div class="image-container rounded-circle">
                <?php
                $chemin = "../consumer/files/".$_SESSION['photo'];
                ?>
                <img src="<?php echo $chemin; ?>"class="img-fluid rounded-circle">

            </div>

            <br>

        </div>


        <div class="col-md-5 d-flex align-items-center justify-content-center">

            <canvas id="bar"></canvas>

        </div>


        <!--    pie chart-->


        <div class="col-md-5 d-flex align-items-center justify-content-center">
            <div class="square">
                <canvas id="pie"></canvas>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-3 ">
            <button class="btn btn-success btn-block">Editer mon compte</button>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary btn-block right">Consulter mes RDV</button>
        </div>
    </div>
    <br><br>


    <div class="row justify-content-center">
        <div class="col-md-7 text-center">
            <div class="site-section-title">
                <h2>Ma participation</h2>
            </div>
            <p></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container rounded-circle">
                        <img src="waste/bouchons-de-liege-association-pierre-favre.jpg" class="img-thumbnail shadow " height="350px" width="350px">
                    </div>
                </div>
                <div class="col-md-6">

                    <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet et in maiores minus nulla tempore totam? At fuga molestias quia, sapiente vero voluptatum. Accusamus iure nemo officiis porro quas sunt! </p>
                </div>
            </div>
        </div>

    </div>
    <br><br>

    <div class="row">
        <div class="container">
            <div class="row">

                <div class="col-md-6">

                    <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet et in maiores minus nulla tempore totam? At fuga molestias quia, sapiente vero voluptatum. Accusamus iure nemo officiis porro quas sunt! </p>
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container rounded-circle">
                        <img src="waste/B9726916347Z.1_20210504153745_000+G12I1MFAG.1-0.jpg" class="img-fluid "  height="350px" width="350px">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <br><br>

    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container rounded-circle">
                        <img src="waste/matiere-recyclables.jpg" class="img-fluid " height="350px" width="350px">
                    </div>
                </div>
                <div class="col-md-6">

                    <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet et in maiores minus nulla tempore totam? At fuga molestias quia, sapiente vero voluptatum. Accusamus iure nemo officiis porro quas sunt! </p>
                </div>
            </div>
        </div>

    </div>
    <br><br>

    <div class="row">
        <div class="container">
            <div class="row">

                <div class="col-md-6">

                    <p class="text-justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet et in maiores minus nulla tempore totam? At fuga molestias quia, sapiente vero voluptatum. Accusamus iure nemo officiis porro quas sunt! </p>
                </div>

                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container rounded-circle">
                        <img src="waste/dechets-verre-recyclage-tri-maison.jpg" class="img-fluid "  height="350px" width="350px">
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>


<!--bar vertical-->
<script>
    var ctx = document.getElementById('bar').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Bouchon', 'chaussures', 'plastiques', 'verres', 'habits'],
            datasets: [{
                label:'Données',
                data: [12, 19, 3, 5, 2],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Diagramme en batons',
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }

            }
        }
    });
</script>

<!--pie chart-->

<script>
    var ctx = document.getElementById('pie').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Bouchons', 'chaussures', 'plastiques'],
            datasets: [{
                label: 'Données',
                data: [12, 19, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Diagramme circulaire',
                    position: 'bottom'
                }
            },
            responsive: true
        }
    });
</script>
    <br>
<?php include_once('../partials/footer.html');?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>