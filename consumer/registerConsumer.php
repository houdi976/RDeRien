<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="../css/shop.css" type="text/css" rel="stylesheet" media="all">
    <link href="../css/styleRegister.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login-form section text-center">
        <div class="container">

            <div class="container">



                <div id="loginbox" style="margin-top:30px;" class="mainbox  loginbox">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Inscription</div>
                        </div>
                        <div style="padding-top:30px" class="panel-body">
                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <form id="signupform" class="form-horizontal" method="post" enctype="multipart/form-data">

                                <?php session_start();
                            require_once('registerConsumerTreatment.php');?>
                                <?php include_once('../partials/_flash.php');?>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name" placeholder="Nom"
                                        required="true">
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="surname" placeholder="Prénom"
                                        required="true">
                                </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        required="true">
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-sm-9 col-xs-9">
                                        <select id="sexe" name="sexe" class="col-md-5 col-sm-9 col-xs-9"
                                            style="height:40px" required="true">
                                            <option value="" disabled selected>--- Sexe ---</option>
                                            <?php 
                                            require_once('../includes/functions.php'); $sexe = getSexe();
                                            foreach ($sexe as $donnees)
                                            {
                                                echo '<option value="' . $donnees["sexe"] . '">' . $donnees["libelleSexe"] . '</option>';
                                            }
            
                                        ?>
                                        </select>
                                        <div class="col-md-2 col-sm-9 col-xs-9 "></div>
                                        <select name="typeUsers" class="col-md-5 col-sm-9 col-xs-9" style="height:40px"
                                            required="true">
                                            <?php $typeUser = getTypeUser();
                                            // Affichage des données dans la liste déroulante
                                                foreach ($typeUser as $donnees) {
                                                echo '<option value="' . $donnees["libelleTypeUser"] . '">' . $donnees["libelleTypeUser"] . '</option>';
                                            }
            
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-earphone"></i>
                                    </span>
                                    <input type="number" id="number" class="form-control" name="number"
                                        placeholder="Numéro de téléphone" required="true">
                                </div>
                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-map-marker"></i>
                                    </span>
                                    <input type="text" id="adresse" class="form-control" name="adresse"
                                        placeholder="votre adresse" required="true">
                                    <script>
                                    $(function() {
                                        $("#adresse").autocomplete({
                                            source: function(request, response) {
                                                $.ajax({
                                                    url: "https://api-adresse.data.gouv.fr/search/",
                                                    dataType: "json",
                                                    data: {
                                                        q: request.term
                                                    },
                                                    success: function(data) {
                                                        response($.map(data
                                                            .features,
                                                            function(item) {
                                                                return {
                                                                    label: item
                                                                        .properties
                                                                        .label,
                                                                    value: item
                                                                        .properties
                                                                        .housenumber +
                                                                        ' ' +
                                                                        item
                                                                        .properties
                                                                        .street,
                                                                    code_postal: item
                                                                        .properties
                                                                        .postcode,
                                                                    ville: item
                                                                        .properties
                                                                        .city,
                                                                    adresse: item
                                                                        .properties
                                                                }
                                                            }));
                                                    }
                                                });
                                            },
                                            minLength: 3,
                                            select: function(event, ui) {
                                                console.log("Adresse sélectionnée : " + ui.item
                                                    .value);
                                                var adresse = ui.item.adresse;
                                                $("#code_postal").val(adresse.postcode);
                                                $("#ville").val(adresse.city);
                                                $("#adresse").val(adresse.housenumber + ' ' +
                                                    adresse.street);
                                                console.log("Adresse voulue : " + adresse
                                                    .housenumber + ' ' + adresse.street);
                                            }
                                        });
                                    });
                                    </script>
                                </div>
                                <!-- <div class="cont">
                                
                                        <input type="text" id="code_postal" name="code_postal" style="margin-bottom: 25px; width:200px" class="form-control"
                                            required="true">
                                
                                        <input type="text" id="ville" name="ville" style="margin-bottom: 25px; width:200px"  class="form-control"  required="true">
                               
                                </div> -->
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-9 col-xs-9">

                                        <input type="text" id="code_postal" name="code_postal" style="height:40px"
                                            class="col-md-5 col-sm-9 col-xs-9" placeholder="Code postal">

                                        <div class="col-md-2 col-sm-9 col-xs-9"></div>

                                        <input type="text" id="ville" name="ville" style="height:40px"
                                            class="col-md-5 col-sm-9 col-xs-9" placeholder="Ville">
                                    </div>
                                </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-picture"></i>
                                    </span>
                                    <input required="false" type="file" class="form-control" name="photo"
                                        placeholder="photo de profil">
                                </div>

                                <div style="margin-bottom: 25px;" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="pass" placeholder="Mot de passe"
                                        required="true">
                                </div>
                                <div style="margin-bottom: 25px;" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" name="passConfirm"
                                        placeholder="Confirmation mot de passe" required="true">

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12 controls">
                                        <button id="btn-login" name="register"
                                            class="btn btn-success">Inscription</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
                                            <h4><a class="navbar-brand" href="../index.php">ACCUEIL</a></h4>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('../partials/footer.html');?>
</body>

</html>
<script>
// Sélectionner l'élément HTML correspondant au champ "number"
const numberField = document.getElementById("number");

// Ajouter un écouteur d'événements pour intercepter la saisie de l'utilisateur
numberField.addEventListener("input", function(event) {

    // Récupérer la valeur saisie par l'utilisateur
    const value = event.target.value;

    // Vérifier si la valeur saisie ne contient que des chiffres et a une longueur de 10 caractères
    if (/^\d{10}$/.test(value)) {
        // La saisie est valide, on peut laisser le champ inchangé
        numberField.setCustomValidity("");
    } else {
        // La saisie n'est pas valide, on indique à l'utilisateur qu'il doit entrer exactement 10 chiffres
        numberField.setCustomValidity("Numéro de téléphone non valide.");
    }

});
</script>