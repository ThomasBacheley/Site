<?php
session_start();
?>
<html>

<head>
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/now-ui-kit.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <title>Inscription</title>
    <meta content="Yweelon.fr" property="og:title" />
    <meta content="Site d'Yweelon" property="og:description" />
    <meta content="http://yweelon.fr" property="og:url" />
    <meta content="https://cdn.discordapp.com/attachments/770357581549535233/922704792260866058/BotLogo.png" property="og:image" />
    <meta content="#ffa500" data-react-helmet="true" name="theme-color" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-transparent">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="assets/menuIcon.svg" width="20px" height="20px" style="max-width: none !important;">
        </button>
        <a href="index.php">
            <img src="assets/BotLogo.png" width="40" height="40">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 20px !important">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bot
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Hellbot.php">Hellbot</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="GIT_bot.php">GIT Bot</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Guardian Tale
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="GT.php">Guardian Tale Home</a>
						<div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="GT_herosheet.php">Hero Sheet</a>
                        <a class="dropdown-item" href="GT_addhero.php">Add Hero</a>
                        <a class="dropdown-item" href="GT_updatehero.php">Update Hero</a>
                    </div>
                </div>
            </ul>
        </div>
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