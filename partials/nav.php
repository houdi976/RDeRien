
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <!-- <li class="nav-item"><a  href="login.php">Login</a></li> -->
                <li class="nav-item"><a  href="preregister.php">Register</a></li>
                <?php if (!isLogged()) { ?>
                        <li><a href="login.php">Connexion</a></li>
                        <?php } else { ?>
                        <li><a href="../consumer/persoPpage.php" >
                        <?php $userInfo = getUserInfo($_SESSION['email']); ?> 
                        </a></li>
                        <li><a href="deconnexion.php">Déconnexion</a></li>  
                <?php } ?>
                
            </ul>
        </div>
    </div>
</nav>