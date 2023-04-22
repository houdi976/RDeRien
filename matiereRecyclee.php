<?php require_once ('connexion.php');?>
<!DOCTYPE html>
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
    <body>
        <!-- Navigation-->
        <?php include_once('partials/nav.php');?>
        <div>
            <!-- Portfolio Grid-->
            <section class="page-section bg-light" id="portfolio">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Matières recyclées</h2>
                        <h3 class="section-subheading text-muted">Ici, retrouvez toutes les matières qu'il est possible de recycler, comment elles peuvent être recyclées et en quoi elles peuvent se métamorphoser!</h3>
                    </div>
                <div class="row">
                <div class="col-3">
                        <form class="d-flex pb-5" role="search">
                            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                            <button name="btsearch" class="btn btn-outline-success" type="submit">Rechercher</button>
                        </form>

                        <form>
                            <button type="submit" name="btmetaux"  style="width:90%" class="btn btn-outline-secondary mb-3 select-Matire">Métaux</button>

                            <button type="submit" name="btplastique" style="width:90%" class="btn btn-outline-secondary  mb-3 select-Plastiques">Plastiques</button>

                            <button type="submit" name="btceramique" style="width:90%"class="btn btn-outline-secondary  mb-3 select-Ceramique">Céramiques</button>

                            <button type="submit" name="btorganique" style="width:90%" class="btn btn-outline-secondary mb-3 select-Organique">Organiques</button>

                            <button type="submit" name="btcomposite" style="width:90%" class="btn btn-outline-secondary  mb-3 select-Composite">Composites</button>

                            <button type="submit" name="bttout" style="width:90%" class="btn btn-outline-secondary  mb-3 select-Composite">TOUT</button>

                        </form>

                    </div>
                <div class="col-9 ">
                <div class="row d-flex justify-content-between">
                    <?php


                        // Vérifier la connexion
                        if ($conn->connect_error) {
                            die("La connexion a échoué : " . $conn->connect_error);
                        }

                        // Exécution de la requête SQL
                        
                        
                        // 
                        if(isset($_GET['btmetaux'])){
                             $sql = "SELECT * FROM waste WHERE id_category = 1";
                             //echo "Le bouton a été appuyé !";



                        }
                        else if(isset($_GET['btplastique'])){
                            $sql = "SELECT * FROM waste WHERE id_category = 2";
                        }
                        else if(isset($_GET['btorganique'])){
                            $sql = "SELECT * FROM waste WHERE id_category = 4";
                        }
                        else{
                            $sql = "SELECT * FROM waste ";
                        }
                        
                        // Vérifier si la requête a renvoyé des résultats
                        $result = $conn->query($sql);  
                        while($row = $result->fetch_assoc()) 
                        {
                        ?>
                            <?php  
                            echo "<div class='col-lg-4 col-sm-5 mb-4'>";
                            echo "<div class='portfolio-item'>";
                            echo "<a class='portfolio-link' data-bs-toggle='modal' href='#portfolioModal1'>";
                            echo "<div class='portfolio-hover'>";
                            echo "<div class='portfolio-hover-content'><i class='fas fa-plus fa-3x'></i></div>";
                            echo "</div>";
                            echo "<img class='img-fluid' src='" . $row['waste_photo'] . "' alt='...' />";
                            echo "</a>";
                            echo "<div class='portfolio-caption'>";
                            echo "<div class='portfolio-caption-heading'>" . $row['waste_name'] . "</div>";
                            echo "<div class='portfolio-caption-subheading text-muted'>" . $row['waste_description'] . "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            ?>
                        <?php } ?>
                       <!--//if ($result->num_rows > 0) {
                            // Afficher les résultats
                           //$sql = "SELECT * FROM waste "; 
                           
                            
                        //}
 //else {
                          //  echo "Aucun résultat trouvé.";
                        //}

                        // Fermer la connexion
                        //$conn->close(); -->
                        

                       

                    </div>
                </div>

                </div>
                </div>
            </section>
        </div>
        <!-- Footer-->
        <?php include_once('partials/footer.html');?>
   

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