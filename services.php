
<div class="dialog" id="notification-dialog" >
  <div class="dialog-content">
    <!-- <h3>Notifications</h3> -->
    <th> <div class="panel-heading" style="text-align:center;">Liste des livres par categorie</div></th>
    <table><br/>
        <tr>
            <th>Labelle</th>
            <th>Date</th>
        </tr>
        <tr>
            <td><?php echo $notif['texte']; ?></td>
            <td><?php echo $notif['date_creation']; ?></td>
        </tr>
    </table>
    <button id="notification-dialog-close">Ok</button>
  </div>
</div>
</html>
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
// Récupération des éléments du DOM
    const notificationIconLink = document.getElementById("notification-icon-link");
    const notificationDialog = document.getElementById("notification-dialog");
    const notificationDialogClose = document.getElementById("notification-dialog-close");

    // Ajout d'un événement clic sur l'icône de notification
    notificationIconLink.addEventListener("click", function (event) {
        event.preventDefault();
        // Affichage de la boîte de dialogue
        notificationDialog.style.display = "flex";
    });
    // Ajout d'un événement clic sur le bouton "Ok" de la boîte de dialogue
    notificationDialogClose.addEventListener("click", function (event) {
        event.preventDefault();

        // Fermeture de la boîte de dialogue
        notificationDialog.style.display = "none";
    });

</script>