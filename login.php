<?php
session_start();
if (isset($_GET['deconnexion'])) {
    if ($_GET['deconnexion'] == true) {
        session_unset();
        header("location:index.php");
    }
}
?>
<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>

<body>
    <div id="container">
        <!-- zone de connexion -->

    </div>
</body>
<script>
    var username = '<?php echo $_SESSION['username']; ?>';

    var container = document.getElementById('container');

    container.innerHTML = `<a href='login.php?deconnexion=true'><span>Déconnexion</span></a>`

    if (username == "") {
        container.innerHTML = `<form action = "verification.php" method = "POST" ><h1> Connexion </h1><label> <b> Nom d 'utilisateur</b></label> <input type = "text" placeholder = "Entrer le nom d'utilisateur" name = "username" required ><label> <b> Mot de passe </b></label ><input type = "password" placeholder = "Entrer le mot de passe" name = "password" required ><input type = "submit" id = 'submit' value = 'LOGIN' > \<?php if (isset($_GET['erreur'])) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                $err = $_GET['erreur'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($err == 1 || $err == 2) echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                                                                                                                                                                                                                                                                                                                                                                                                                 } ?> </form>`
    }
</script>

</html>