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
    <title>GIT Bot</title>
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
                        <a class="dropdown-item" href="GIT_bot.php">GIT Bot <span class="sr-only">(actuel)</span></a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Guardian Tale
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="GT_herosheet.php">Hero Sheet</a>
                        <a class="dropdown-item" href="GT_addhero.php">Add Hero</a>
                        <a class="dropdown-item" href="GT_updatehero.php">Update Hero</a>
                    </div>
                </div>
            </ul>
            <div class="nav-item">
                <a class="nav-link" href="http://yweelon.fr/phpmyadmin">PHPMyAdmin</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="https://github.com/ThomasBacheley">Github</a>
            </div>
            <button id="connexion_button" onclick="window.location.href='/login.php'" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="font-size: 10px !important;font-family: poppins !important;">Connexion</button>
        </div>
    </nav>
    <!---->
    <div class="heading">
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-bs-html="true" title="Text in English, because it's a English bot">
            <div>
                <div>
                    <img src="https://cdn.discordapp.com/attachments/922554541419921470/922554649905602560/1.png" alt=".." style="width: 128px;height: 128px;" />
                    <img src="https://cdn.discordapp.com/icons/446662355720601601/0bf80e54b84f1ea2d7b3ed4b869aa4f0.png" alt=".." style="width: 128px;height: 128px;" />
                </div>
                <h1 class="display-5 title"><span class="highlight">G</span>reen <span class="highlight">I</span>ce
                    <span class="highlight">T</span>eam Bot
                </h1>
                <p class="subtitle">GIT bot is a bot made for Green Ice Tea and devoted to Guardian Tales Game</p>
                <br />
                <p class="subtitle">Made in <span class="highlight">Javascript</span> and host on a <span class="highlight">Raspberry PI 4</span>, GIT Bot is pretty efficient.</p>
                <p class="subtitle">You can check hero's build or Informations with commands.</p>
                <a class="btn btn-primary btn-lg" href="https://github.com/ThomasBacheley/GIT_bot_GT" target="_blank" role="button">GitHub</a>
            </div>
        </span>
    </div>
    <br /><br /><br />
    <div class="stats">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="heroes_value_title">0</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922565743319584838/heroes_icon.png" alt="heroes_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="heroes_value" class="highlight">0</span> Heroes are currently in a Database</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="items_value_title">0</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922563773921898568/items_icon.png" alt="items_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="items_value" class="highlight">0</span> Items are currently in a Database</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="cmds_value_title">0</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922563836056338452/commands_icon.png" alt="commands_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="cmds_value" class="highlight">0</span> Commands are currently avaible</p>
            </div>
        </div>
    </div>
    <br /><br /><br /><br /><br />
    <div class="page_end">
        <div class="footer">
            <div class="bot-footer">
                <img src="assets/BotLogoWord.png" width="150" style="margin-left:-45px;"><br />
            </div><br />
            <div class="nouridio">website designed by <span style="color: #ffa500;">nouridio</span></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script>
        var username = '<?php echo $_SESSION['username']; ?>';

        var btn_connexion = document.getElementById('connexion_button')


        if (username !== "") {
            btn_connexion.innerText = username
            btn_connexion.setAttribute('title', 'Deconnexion');
            btn_connexion.setAttribute('data-bs-toggle', 'tooltip');
            btn_connexion.setAttribute('data-bs-placement', 'bottom');
        }


        load_info()

        function load_info() {
            var xhr = new XMLHttpRequest();

            var heroes_value = document.getElementById('heroes_value')
            var items_value = document.getElementById('items_value')
            var cmds_value = document.getElementById('cmds_value')

            var heroes_value_title = document.getElementById('heroes_value_title')
            var items_value_title = document.getElementById('items_value_title')
            var cmds_value_title = document.getElementById('cmds_value_title')

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var data = JSON.parse(this.responseText)

                        heroes_value.innerText = data.heroes_value
                        items_value.innerText = data.items_value
                        cmds_value.innerText = data.cmds_value

                        heroes_value_title.innerText = data.heroes_value
                        items_value_title.innerText = data.items_value
                        cmds_value_title.innerText = data.cmds_value

                    } else {
                        alert('erreur : status -> ' + this.status)
                    }
                }
            };
            xhr.open("GET", "http://yweelon.fr:8084/getinfosite", true);
            xhr.send();
        }
    </script>
</body>

</html>