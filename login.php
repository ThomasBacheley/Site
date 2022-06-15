<?php
session_start();
?>
<html>

<head>
    <?php include './components/head.html'; ?>
    <title>Connexion</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <div id="container">
        <form id="login-form" action="./verification/verification_login.php" method="POST">
            <h3>Connexion</h3>
            <label><b>Nom d 'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <input type="submit" id='submit' value='LOGIN'>
            <a href="./inscription.php">Inscription ?</a>
            <?php
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
            }
            ?>
        </form>

    </div>
    <div id="snackbar_failed">❌ Erreur <span id="snackbar_content"></span></div>
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script>
        var erreur = '<?php echo $err; ?>';

        var snackbar = document.getElementById("snackbar_failed");
        var snackbar_content = document.getElementById("snackbar_content");

        if (erreur == '1') {
            // Add the "show" class to DIV
            snackbar.className = "show";
            snackbar_content.innerText = "utilisateur ou mot de passe incorrect"

            // After 3 seconds, remove the show class from DIV
            setTimeout(function() {
                snackbar.className = snackbar.className.replace("show", "");
                snackbar_content.innerText = ""
            }, 3000);
        } else {
            if (erreur == '2') {

                // Add the "show" class to DIV
                snackbar.className = "show";
                snackbar_content.innerText = "utilisateur ou mot de passe vide"

                // After 3 seconds, remove the show class from DIV
                setTimeout(function() {
                    snackbar.className = snackbar.className.replace("show", "");
                    snackbar_content.innerText = ""
                }, 3000);
            }
        }
    </script>
</body>

</html>