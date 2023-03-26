<?php $title="Page Perso "; 
session_start(); 
?>
<body>
<?php require_once('../includes/functions.php'); 
      require_once('../config/database.php');
      $userInfo = getUserInfo($_SESSION['email']); 
?>  
<?php 
    echo"".$userInfo['name']. " ".$userInfo['surname'];
?>
<div class="collapse navbar-collapse navbar-ex1-collapse nav-right">
    <ul class="nav navbar-nav navbar-left cl-effect-15">
        <li><a href="../deconnexion.php">Déconnexion</a></li>
    </ul>
</div>      