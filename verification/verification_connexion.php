<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['permission']))
{
    if($_SESSION['permission']=='ADMIN'){
        header('Location: ../admin_dashboard.php');
    }else{
        header('Location: ../dashboard.php');
    }
}else{
    header('Location: ../login.php');
}
?>
