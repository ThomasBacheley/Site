<?php
session_start();
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['validationMessage'])) {

    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'jjE72Dak';
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

    if ($sender !== "" && $email !== "" && $subject !== "" && $message !== "") {
        $sql = "INSERT INTO mail (sender,email,subject,message)VALUES ('" . strtolower($sender) . "', '" .  $email . "', '" .  $subject . "', '" .  $message . "')";

        if (mysqli_query($db, $sql)) {
            header('Location: index.php?sendmail=true');
        } else {
            header('Location: index.php?sendmail=false'); // ajout pas fait
        }
    } else {
        header('Location: index.php?sendmail=false'); // champ vide
    }
} else {
    header('Location: index.php?sendmail=false');
}
?>