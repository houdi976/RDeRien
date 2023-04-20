<?php include_once('includes/functions.php');  ?>
<?php session_start(); 
 include_once('partials/_flash.php');?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                    $notif = $_SESSION['notif'];
                    ?>
                <!-- href="persoPpage.php" -->
                <a class="navbar-brand" href="#" id="notification-icon-link">
                    <div style="position: relative; display: inline-block;">
                        <img src="assets/img/cloche.png" alt="..." id="notification-icon" />
                        <?php  
                                // afficher le nombre de notifications non lues en exposant
                                echo "<sup style='position: absolute; top: -10px; right: -10px; background-color: red;
                                color: white; border-radius: 50%; padding: 10px;'>". $_SESSION['nbNotif'] ."</sup>";
                        ?>
                    </div>
                </a>
                

                <a class="navbar-brand" href="persoPpage.php" title="<?php echo "".$_SESSION['email'] ; ?>">
                    <img src="<?php echo $chemin; ?>" alt="..." style="width:40px;height:40px;border-radius: 50%;" />
                </a>

                <!-- <a class="navbar-brand" href="deconnexion.php">
                    <img src="assets/img/logout0.png" alt="..." style="width:40px;height:40px;" />
                </a> -->
                <a style="color:yellowgreen; font-weight: bold;" class="nav-link" href="deconnexion.php">
                    <button id="btn-login" class="btn btn-success">
                        Deconnexion
                    </button>
                </a>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>

<form method="post" action="">
    <?php require_once('notification.php');?>
    <div class="dialog " id="notification-dialog">
        <div class="dialog-content ">
            <h3>Notifications</h3>
            <table class="table table-bordered table-striped "><br />
                <tr>
                    <th>Labelle</th>
                    <th>Date</th>
                </tr>
                <?php if (is_array($notif) && !empty($notif)) { ?>
                <?php foreach ($notif as $ligne) { ?>
                <tr style="text-align:left">
                    <td><?php echo $ligne['texte']; ?></td>
                    <td><?php echo $ligne['date_creation']; ?></td>
                </tr>
                <?php } ?>

                <?php } else { ?>
                <tr>
                    <td>Pas de notification</td>
                </tr>
                <?php } ?>
            </table>
            <!-- <button type="submit" name="updateNombreNotifications" id="notification-dialog-close">Ok</button> -->
            <input id="notification-dialog-close" name="updateNombreNotifications" type="submit" class="btn btn-success"
                value="Ok " />
        </div>
    </div>
</form>

<style>
.dialog {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 999;
}

.dialog-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    max-width: 800px;
    max-height: 90vh;
    overflow-y: auto;
    text-align: center;
}

#notification-icon {
    cursor: pointer;
}

#notification-list {
    list-style-type: none;
    padding: 0;
}

#notification-dialog-close {
    background-color: #d9534f;
    border: none;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}
</style>
<script>
    function getMAJ() {
        // Créer une instance de l'objet XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Configurer la requête
        xhr.open('GET', 'notification.php?action=getMAJ', true);

        // Envoyer la requête
        xhr.send();

        // Recharger la page après la mise à jour
        location.reload();
    }
// Récupération des éléments du DOM
const notificationIconLink = document.getElementById("notification-icon-link");
const notificationDialog = document.getElementById("notification-dialog");
const notificationDialogClose = document.getElementById("notification-dialog-close");

// Ajout d'un événement clic sur l'icône de notification
notificationIconLink.addEventListener("click", function(event) {
    event.preventDefault();
    // Affichage de la boîte de dialogue
    notificationDialog.style.display = "flex";
});
// Ajout d'un événement clic sur le bouton "Ok" de la boîte de dialogue
notificationDialogClose.addEventListener("click", function(event) {
    event.preventDefault();

    // Fermeture de la boîte de dialogue
    notificationDialog.style.display = "none";
     // Appeler la fonction getMAJ() en PHP
    getMAJ();
});
</script>