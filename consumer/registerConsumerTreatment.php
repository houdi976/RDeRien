<?php
require('../config/database.php');
require('../includes/functions.php');

//SI le formulaire est soumis
if (isset($_POST['register'])) {

    //Si tous les champs sont remplis
    if (not_empty(['name', 'surname', 'sexe', 'email', 'pass', 'passConfirm', 'number', 'typeUsers','adresse','ville','code_postal'])) {
        extract($_POST);

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $sexe = $_POST['sexe'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $passwordConfirm = $_POST['passConfirm'];
        $number = $_POST['number'];
        $typeUsers = $_POST['typeUsers'];
        //Adresse
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['code_postal'];

        // var_dump($adresse);
        // var_dump($ville);
        // var_dump($code_postal);
        
        if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            // Lecture du contenu de l'image
            $file_name = $_FILES['photo']['name'];
            $file_tmp_name = $_FILES['photo']['tmp_name'];
            $file_dest = 'files/'.$file_name;
            if(move_uploaded_file($file_tmp_name, $file_dest));
        }else {
            $photo = "";
        }

        if ($pass  != $passConfirm) {
            $register_errors = "<br>Veuillez saisir le même mot de passe SVP!";
            echo '<div class="bg-danger">';
            echo $register_errors;
            echo '</div>';
        }

        if (!isset($register_errors)) {
                                            
            $query = $db->prepare("SELECT * FROM users WHERE email= :email");
            $query->bindParam('email', $email);
            $query->execute();
            $userIsFound = $query->rowCount();
            if ($userIsFound != 0) {
                $register_errors = "Vous êtes déjà inscrit avec cet email!";
                echo '<div class="bg-danger">';
                echo "$register_errors";
                echo '</div>';
            } else {

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $requete = $db->prepare("INSERT INTO 
                                        users(name ,surname,sexe,email,password,phone_number,photo, type_user)
                                        VALUES(:name,:surname,:sexe,:email,:password,:number,:photo, :typeUsers)");
                $requete->bindParam('name', $name);
                $requete->bindParam('surname', $surname);
                $requete->bindParam('sexe', $sexe);
                $requete->bindParam('email', $email);
                $requete->bindParam('password', $hashed_password);
                $requete->bindParam('number', $number);
                $requete->bindParam('photo', $file_name);
                $requete->bindParam('typeUsers', $typeUsers);
                $requete->execute();

                //HAVE USER ID
                $id = $db->lastInsertId();
                //INSERT TYPE USER TABLE
                if ($typeUsers == "Consommateur") {
                    $req = $db->prepare("INSERT INTO consumers(consumer_id)
                    VALUES(:consumer_id)");
                    $req->bindParam('consumer_id', $id);
                    $req->execute();

                    set_flash('Inscription réussie ! Veuillez Vous<a href="../login.php"> connecter</a>', 'success');
                } else if ($typeUsers == "Collecteur") {

                } else if ($typeUsers == "Recycleur") {

                }
                //INSERT Adress
                $re = $db->prepare("INSERT INTO 
                    address(adresse,postal_code,city,id_user)
                    VALUES(:adresse,:postal_code,:city,:id_user)");
                $re->bindParam('adresse', $adresse);
                $re->bindParam('postal_code', $code_postal);
                $re->bindParam('city', $ville);
                $re->bindParam('id_user', $id);
                $re->execute();

                // INSERT NOTIFICATION
                $texte_notification = 'Bienvenue sur le site RdeRien, premier pas pour protéger notre planète';
                $r = $db->prepare("INSERT INTO notifications (texte, id_utilisateur) VALUES (:texte_notification, :id)");
                $r->bindParam('texte_notification', $texte_notification);
                $r->bindParam('id', $id);
                $r->execute();

            }
        }
    }
}
