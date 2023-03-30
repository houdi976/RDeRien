<?php include_once('includes/functions.php');  ?>
<?php session_start(); 
 include_once('partials/_flash.php');?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">

        <a class="navbar-brand" href="./index.php#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                <a style="color:yellowgreen; font-weight: bold;" class="nav-link" href="./matiereRecyclee.php">
                    <button id="btn-login" class="btn btn-success">
                        Matières recyclables
                    </button>
                </a>

                <a style="color:yellowgreen; font-weight: bold;" class="nav-link" href="./index.php#about">
                    <button id="btn-login" class="btn btn-success">
                        J’agis
                    </button>
                </a>

                <?php if (!isLogged()) { ?>
                <a style="color:yellowgreen; font-weight: bold;" class="nav-link" href="preregister.php">
                    <button id="btn-login" class="btn btn-success">
                        Inscription
                    </button>
                </a>
                <a style="color:yellowgreen; font-weight: bold;" class="nav-link" href="login.php">
                    <button id="btn-login" class="btn btn-success">
                        Connexion
                    </button>
                </a>

                <?php } else { 
                    $chemin = "consumer/files/".$_SESSION['photo'];
                    ?>
                <a class="navbar-brand" href="persoPpage.php">
                    <div style="position: relative; display: inline-block;">
                        <img src="assets/img/cloche.png" alt="..." />
                        <?php  
                                // afficher le nombre de notifications non lues en exposant
                                echo "<sup style='position: absolute; top: -10px; right: -10px; background-color: red;
                                color: white; border-radius: 50%; padding: 10px;'>". $_SESSION['nbNotif'] ."</sup>";
                        ?>
                    </div>
                </a>

                <!-- <a class="navbar-brand" href="#page-top">
                    <img  src="assets/img/cloche.png" alt="..." />
                    <?php  
                    // afficher le nombre de notifications non lues
                    echo "<span class='badge'>" .  $_SESSION['nbNotif'] . "</span>";
                    ?>
                </a> -->

                <a class="navbar-brand" href="persoPpage.php" title="<?php echo "".$_SESSION['email'] ; ?>">
                    <img src="<?php echo $chemin; ?>" alt="..." style="width:40px;height:40px;border-radius: 50%;" />
                </a>

                <a class="navbar-brand" href="deconnexion.php">
                    <img src="assets/img/logout0.png" alt="..." style="width:40px;height:40px;" />
                </a>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
<script>
$(document).ready(function() {
    // mettre à jour le nombre de notifications non lues sur l'icone
    function mettreAJourNombreNotifications() {
        $.get("get_nombre_notifications.php", function(data) {
            $(".badge").text(data);
        });
    }

    // appeler la fonction pour mettre à jour le nombre de notifications au chargement de la page
    mettreAJourNombreNotifications();

    // lorsque l'utilisateur clique sur l'icône de notification
    $(".fa-bell").click(function() {
        // récupérer les notifications non lues depuis le serveur
        $.get("get_notifications.php", function(data) {
            // afficher les notifications dans une boîte de dialogue
            alert(data);

            // marquer les notifications comme lues dans la base de données
            $.get("marquer_notifications_lues.php", function() {
                // mettre à jour le nombre de notifications non lues sur l'icone
                mettreAJourNombreNotifications();
            });
        });
    });
});
</script>