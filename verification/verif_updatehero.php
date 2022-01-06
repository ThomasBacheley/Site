<?php
session_start();
if (isset($_POST['select_hero']) && isset($_POST['select_param']) && isset($_POST['newvalue'])) {
    $db_username = 'webapi';
    $db_password = 'lWOwlHYlG5HdOXoC';
    $db_name     = 'guardiantale';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
        or die('could not connect to database');

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $select_hero = mysqli_real_escape_string($db, htmlspecialchars($_POST['select_hero']));
    $select_param = mysqli_real_escape_string($db, htmlspecialchars($_POST['select_param']));
    $newvalue = mysqli_real_escape_string($db, htmlspecialchars($_POST['newvalue']));

    $requete = "SELECT count(*),id FROM heroes where name LIKE '%" . $select_hero . "%' ";
    $exec_requete = mysqli_query($db, $requete);
    $reponse      = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    if ($count == 1) //hero trouver
    {
        if($newvalue == 'NULL') {$newvalue= NULL;}
        $sql = "UPDATE heroes SET " . $select_param . "=";
        switch ($select_param) {
            case 'type':
                $sql .= "(SELECT id from hero_type WHERE type = '" . $newvalue . "')";
                break;
            case 'role':
                $sql .= "(SELECT id from hero_role WHERE role = '" . $newvalue . "')";
                break;
            case 'shield':
                $sql .= "(SELECT id from shield_item WHERE name = '" . $newvalue . "')";
                break;
            case 'accesory':
                $sql .= "(SELECT id from accesory_item WHERE name = '" . $newvalue . "')";
                break;
            case 'merch_item':
                $sql .= "(SELECT id from merch_item WHERE name = '" . $newvalue . "')";
                break;
            default:
                $sql .= "'" . $newvalue . "'";
                break;
        }
        if(isset($_POST['username'])){
            $updater = mysqli_real_escape_string($db, htmlspecialchars($_POST['username']));
            if($updater !== ''){
                $sql .= ",lastupdateby ='".$updater."'";
            }
        }

        $sql .= " WHERE heroes.id = '" . $reponse['id'] . "'";

        if (mysqli_query($db, $sql)) {
            header('Location: ../GT_updatehero.php?update=true');
        } else {;
            header('Location: ../GT_updatehero.php?update=false_3');
        }
    } else {
        header('Location: ../GT_updatehero.php?update=false_2');
    }
} else {
    header('Location: ../GT_updatehero.php?update=false_1');
}
