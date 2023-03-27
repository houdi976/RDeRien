<?php
require('../config/database.php');
require('../includes/functions.php');

//SI le formulaire est soumis
if (isset($_POST['register'])) {

    //Si tous les champs sont remplis
    if (not_empty(['name', 'surname', 'sexe', 'email', 'pass', 'passConfirm', 'number', 'typeUsers'])) {
        extract($_POST);

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $sexe = $_POST['sexe'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $passwordConfirm = $_POST['passConfirm'];
        $number = $_POST['number'];
        $typeUsers = $_POST['typeUsers'];
        //Si l'utilisateur charge une photo
        // if (not_empty(['photo'])) {
        //     // $photo = $_POST['photo'];
        //     $photo = file_get_contents($_POST['photo']);
        // } else {
        //     $photo = "";
        // }
      
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

            // $rUser = $db->prepare('SELECT u.name FROM users u');
            //          $rUser->execute();
            //          $rUserResult = $rUser->fetch();
                    // Affichage des données dans la liste déroulante
           
                                            
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

                $id = $db->lastInsertId();
                if ($typeUsers == "Consommateur") {
                    $req = $db->prepare("INSERT INTO consumers(consumer_id)
                    VALUES(:consumer_id)");
                    $req->bindParam('consumer_id', $id);
                    $req->execute();

                    set_flash('Inscription réussie ! Veuillez Vous<a href="../login.php"> connecter</a>', 'success');
                } else if ($typeUsers == "Collecteur") {

                } else if ($typeUsers == "Recycleur") {

                }
            }
        }
    }
}

//     $password = $_POST['password'];
// $hashed_password = get_hashed_password_from_db($username);

// if (password_verify($password, $hashed_password)) {
//     // Mot de passe valide
// } else {
//     // Mot de passe invalide
// }
