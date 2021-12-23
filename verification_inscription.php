<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_confirmation'])) {

    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'jjE72Dak';
    $db_name     = 'universal_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
        or die('could not connect to database');
    
    $username = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db, htmlspecialchars($_POST['password']));
    $password_confirmation = mysqli_real_escape_string($db, htmlspecialchars($_POST['password_confirmation']));

    if ($username !== "" && $password !== "" && $password_confirmation !== "") {
        if ($password === $password_confirmation) {

            // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
            // pour éliminer toute attaque de type injection SQL et XSS
            $requete = "SELECT count(*) FROM website_user where 
              username = '" . strtolower($username) . "'";
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            //test si l'utilisateur est deja creer
            if ($count == 0) {
                $sql = "INSERT INTO website_user (username,password)VALUES ('" . strtolower($username) . "', '" .  sha1($password) . "')";

                if (mysqli_query($db, $sql)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['permission'] = 'USER';
                    header('Location: index.php');
                } else {
                    header('Location: inscription.php?erreur=4'); // erreur l'ajout c'est pas fait
                }
            } else {
                header('Location: inscription.php?erreur=3'); // l'utilisateur existe déja
            }
        } else {
            header('Location: inscription.php?erreur=2'); // pswd != pswd confirmation
        }
    } else {
        header('Location: inscription.php?erreur=1'); // utilisateur ou mot de passe vide
    }
} else {
    header('Location: inscription.php');
}
mysqli_close($db); // fermer la connexion
