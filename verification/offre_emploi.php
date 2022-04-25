<?php
session_start();
    $db_username = 'webapi';
    $db_password = 'lWOwlHYlG5HdOXoC';
    $db_name     = 'universal_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    $lien = mysqli_real_escape_string($db,htmlspecialchars($_POST['lien_emploi']));
    $sql = "INSERT INTO offre_emploi (lien) VALUES ('" . $lien . "')";

    if (mysqli_query($db, $sql)) {
        header('Location: ../offre_emploi.php?send=true');        
    } else {
        header('Location: ../offre_emploi.php?send=false'); 
    }
?>