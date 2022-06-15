<?php
session_start();
?>
<html>

<head>
    <?php include './components/head.html'; ?>
    <title>Inscription</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <div id="container">
        <form id="signin-form" action="/verification/verification_inscription.php" method="POST">
            <h3>Inscription</h3>
            <label><b>Nom d 'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <label><b>Confirmation Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe une nouvelle fois" name="password_confirmation" required>
            <input type="submit" id='submit' value='SIGNIN'>
            <a href="./login.php">Connexion ?</a>
            <?php
            if (isset($_GET['erreur'])) {
                $err = $_GET['erreur'];
            }
            ?>
        </form>
    </div>
    <div id="snackbar_failed">❌ Erreur : <span id="snackbar_content"></span></div>
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script>
        var erreur = '<?php echo $err; ?>';

        if (erreur) {
            var snackbar = document.getElementById("snackbar_failed");
            var snackbar_content = document.getElementById("snackbar_content");
            snackbar.className = "show";
            switch (erreur) {
                case '1':
                    snackbar_content.innerText = "utilisateur ou mot de passe vide"
                    break;
                case '2':
                    snackbar_content.innerText = "les mot de passe ne sont pas identique"
                    break;
                case '3':
                    snackbar_content.innerText = "l'utilisateur existe déja"
                    break;
                case '4':
                    snackbar_content.innerText = "Une erreur est survenue, l'ajout n'as pas aboutit"
                    break;
                default:
                    snackbar_content.innerText = "Une erreur est survenue"
                    break;
            }
            setTimeout(function() {
                snackbar.className = snackbar.className.replace("show", "");
                snackbar_content.innerText = ""
            }, 3000);
        }
    </script>
</body>

</html>