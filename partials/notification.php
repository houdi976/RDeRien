<?php
// Vérifier si le formulaire a été soumis et si l'action est "maFonction"
// if (!function_exists('getMAJ')) {
  
if(isset($_GET['action'])){
          if (isLogged() && $_SESSION['nbNotif']!=0 && $_GET['action'] == 'getMAJ') {
            // Appeler la fonction maFonction
            updateNombreNotifications();
            $_SESSION['nbNotif'] = getNombreNotificationsNonLues();
  }
}

  
// }

// Définir la fonction maFonction
// if (!function_exists('updateNombreNotifications')) {
//   function updateNombreNotifications() {
//     if (isset($_SESSION)) {
//       global $db;
//       // préparer la requête SQL
//       $query = $db->prepare("UPDATE notifications SET etat='lue' WHERE id_utilisateur=:id AND etat='non lue'");
//       $query->bindParam('id', $_SESSION['id']);
//       $query->execute();
//       $query->fetch();
//       $query->closeCursor();
//       }
//   }
// }
?>
<script>
  console.log("getMAJ")
</script>