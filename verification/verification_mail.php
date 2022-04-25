<?php
session_start();
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['validationMessage'])) {

    // connexion à la base de données
    $db_username = 'webapi';
    $db_password = 'lWOwlHYlG5HdOXoC';
    $db_name     = 'universal_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
        or die('could not connect to database');

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $sender = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));
    $email = mysqli_real_escape_string($db, htmlspecialchars($_POST['email']));
    $subject = mysqli_real_escape_string($db, htmlspecialchars($_POST['subject']));
    $message = mysqli_real_escape_string($db, htmlspecialchars($_POST['validationMessage']));

    if (str_contains($message, 'speed-seo.net')) {
        header('Location: ../index.php?sendmail=false');
    }

    if ($sender !== "" && $email !== "" && $subject !== "" && $message !== "") {
        $sql = "INSERT INTO mail (sender,email,subject,message)VALUES ('" . strtolower($sender) . "', '" .  $email . "', '" .  $subject . "', '" .  $message . "')";

        if (mysqli_query($db, $sql)) {
            header('Location: ../index.php?sendmail=true');
        } else {
            header('Location: ../index.php?sendmail=false'); // ajout pas fait
        }
    } else {
        header('Location: ../index.php?sendmail=false'); // champ vide
    }
} else {
    header('Location: ../index.php?sendmail=false');
}
?>