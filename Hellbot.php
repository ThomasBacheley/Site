<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/now-ui-kit.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <title>Hellbot</title>
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
                        <a class="dropdown-item" href="Hellbot.php">Hellbot <span class="sr-only">(actuel)</span></a>
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
            <button id="connexion_button" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="font-size: 10px !important;font-family: poppins !important;">Connexion</button>
        </div>
    </nav>
    <!---->
    <div class="heading">
        <div>
            <img src="https://cdn.discordapp.com/avatars/769180597045690418/98291e1cf7a0644d64012b0b7347aa76.png" alt="Hellbot PP" style="width: 128px;height: 128px;" />
        </div>
        <div>
            <h1 class="display-5 title"><span class="highlight">Hell</span>Bot
            </h1>
            <p class="subtitle">Hellbot est un bot dévélopper par moi meme depuis ~ Novembre 2020</p>
            <br />
            <p class="subtitle">Fait en <span class="highlight">Javascript</span> et hebergé sur une <span class="highlight">Raspberry PI 4</span>, Hellbot est capable de plein de choses.</p>
            <p class="subtitle">Comme par exemple, fournir de manière aléatoire des images de <span class="highlight">Renard</span> (<span style="font-style: italic;">petit plaisir personnel</span>😜)
            </p>
            <p class="subtitle">Donner la <span class="highlight">Température de la RPI</span> ou consulter une <span class="highlight">BDD Custom</span> afin de restituer les données</p>
            <br />
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="(NSFW) Clique dessus pour afficher le Texte">
                <div class="NSFW" onclick="removeblur(this)">
                    <p class="subtitle">Hellbot possède un systeme "<span class="highlight">Anti Fake</span>".</p>
                    <p class="subtitle">Plusieurs vérifications interviennent comme par exemple lorsqu'un utilisateur <span class="highlight">rejoint</span> le serveur, sa photo de profil est scanné via une <span class="highlight">API</span> qui permet de savoir si la dîtes photo est <span class="highlight">NSFW</span></p>
                    <p class="subtitle">Les messages sont aussi vérifiés auprès d'un <span class="highlight">JSON</span> customisé et completer au fur et à mesure</p>
                    <br />
                    <p class="subtitle">Si la personne a une photo NSFW ou envois un message avec une phrase qu'un fake pourrait dire, Le bot <span class="highlight">génere</span> un JSON avec de nombreuses informations, ainsi qu'un lien vers une API pour le bannir</p>
                </div>
            </span>
            <a class="btn btn-primary btn-lg" onclick="alert('Le bot étant privé, le Github n\'est pas disponible.\nDésolé')" target="_blank" role="button">GitHub</a>
        </div>
    </div>
    <br /><br /><br />
    <div class="stats">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="user_count_title">0</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922565743319584838/heroes_icon.png" alt="heroes_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="heroes_value" class="highlight">0</span> Utilisateur gérer</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="cmds_value_title">0</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922563836056338452/commands_icon.png" alt="commands_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="cmds_value" class="highlight">0</span> Commandes disponibles</p>
            </div>
        </div>
    </div>
    <br /><br /><br /><br /><br />
    <footer>
        <div class="page_end">
            <br />
            <div class="footer">
                <div class="bot-footer">
                    <a href="credits.php" data-bs-toggle="tooltip" title="Vers les Crédits">
                        <img src="assets/BotLogoWord.png" width="150" style="margin-left:-45px;"><br />
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script src="./js/customjs.js"></script>
    <script>

connexion_button(document.getElementById('connexion_button'),'<?php echo $_SESSION['username']; ?>')

       function removeblur(el) {
            el.classList.remove("NSFW")
        }
    </script>
</body>

</html>
