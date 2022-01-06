<?php
session_start();
if (isset($_POST['actualpswd']) && isset($_POST['newpswd']) && isset($_POST['newpswd_confirmation'])) {
    // connexion à la base de données
    $db_username = 'webapi';
    $db_password = 'lWOwlHYlG5HdOXoC';
    $db_name     = 'universal_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
        or die('could not connect to database');

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $actualpswd = mysqli_real_escape_string($db, htmlspecialchars($_POST['actualpswd']));
    $newpswd = mysqli_real_escape_string($db, htmlspecialchars($_POST['newpswd']));
    $newpswd_confirmation = mysqli_real_escape_string($db, htmlspecialchars($_POST['newpswd_confirmation']));

    if ($actualpswd !== "" && $newpswd !== "" && $newpswd_confirmation !== "" && $newpswd === $newpswd_confirmation) {
        $requete = "SELECT count(*) FROM website_user where 
              username = '" . strtolower($_SESSION['username']) . "' and password = SHA1('" . $actualpswd . "') ";
        $exec_requete = mysqli_query($db, $requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if ($count != 0) // nom d'utilisateur et mot de passe correctes
        {
            $sql = "UPDATE website_user SET password=SHA1('".$newpswd."') WHERE username = '".strtolower($_SESSION['username'])."'";

            if (mysqli_query($db, $sql)) {
                header('Location: ../dashboard.php?changemdp=true');
            } else {
                header('Location: ../dashboard.php?erreur=3'); // ajout pas fait
            }
        } else {
            header('Location: ../dashboard.php?erreur=2'); // utilisateur ou mot de passe incorrect
        }
    } else {
        header('Location: ../dashboard.php?erreur=1'); // utilisateur ou mot de passe vide
    }
} else {
    header('Location: ../dashboard.php');
}
mysqli_close($db); // fermer la connexion
