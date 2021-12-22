<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" style="scroll-behavior: smooth !important;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/now-ui-kit.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <title>Yweelon.fr</title>
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
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(actuel)</span></a>
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
            <button id="connexion_button" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="font-size: 10px !important;font-family: poppins !important;">Connexion</button>
        </div>
    </nav>
    <button onclick="topFunction()" id="topbtn" title="Go to top">↑</button>
    <br /><br /><br />
    <div class="heading">
        <h1 class="ml1">
            <span class="text-wrapper">
                <span class="line line1"></span>
                <span class="letters">Bienvenue</span>
                <span class="line line2"></span>
            </span>
        </h1>
        <p class="subtitle">Bienvenue sur <span style="text-decoration: underline;">Yweelon.fr</span><br />Un site
            dévéloppé par Yweelon</p>
        <a class="btn btn-primary btn-lg" href="#mailform" role="button">Mail <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 226 226" style=" fill:#000000;">
                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                    <path d="M0,226v-226h226v226z" fill="none"></path>
                    <g fill="#ffffff">
                        <path d="M37.66667,37.66667c-10.40542,0 -18.83333,8.42792 -18.83333,18.83333v16.31364l9.41667,5.90381l9.41667,5.90381l75.33333,47.21208l75.33333,-46.89941l9.41667,-5.86702l9.41667,-5.84863v-16.71826c0,-10.40542 -8.42792,-18.83333 -18.83333,-18.83333zM37.66667,56.5h150.66667v7.24642l-75.33333,46.88102l-75.33333,-47.21208zM18.83333,95.03109v74.46891c0,10.40542 8.42792,18.83333 18.83333,18.83333h150.66667c10.40542,0 18.83333,-8.42792 18.83333,-18.83333v-74.10108l-18.83333,11.71566v62.38542h-150.66667v-62.6613z">
                        </path>
                    </g>
                </g>
            </svg></a>
        <a class="btn btn-secondary btn-lg" href="#about" role="button">En savoir plus</a>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    </div>
    <div class="heading" id="about">
        <div>
            <img src="https://cdn.discordapp.com/avatars/663153459226345501/3170e3e92eb1101d7be7550453924593.png" alt="Ywee PP" style="width: 128px;height: 128px; border-radius:15px" />
        </div>
        <h1 class="display-5 title"><span class="highlight">Yweelon</span></h1>
        <p class="subtitle">Salut, je m'appelle <span class="highlight">Thomas</span>, j'ai 22 ans et je suis <span class="highlight">développeur</span> Junior.</p>
        <br />
        <p class="subtitle">Je code depuis <span class="highlight">2017</span> des applications pour mes études ou des projets personnel (<a href="Hellbot.php">Hellbot</a> / <a href="GIT_bot.php">GIT Bot</a>).</p>
        <p class="subtitle">J'heberge tous ça sur des <span>Raspberry pi (modèle 3B et modèle 4)</span>.</p>
        <p class="subtitle"> Je m'interesse aussi à la <span class=highlight>domotique</span> en essayant de mettre en place un système de contrôle de LED avec des <span class="highlight">ESP8266</span></p>
    </div>
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div id="mailform" class="text-center" style="background-color: #292933;width: 80%;margin-left: auto;margin-right: auto;border-radius: 3%;padding: 20px; box-shadow: white;">
        <!--Section: Contact v.2-->
        <section class="mb-4">
            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4" style="color: white;">Contact</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5" style="color: white;">Une Question ? Je t'invite à
                m'envoyer un mail et j'y repondrais le plus tot possible</p>

            <div class="row" style="margin-right: auto;margin-left: auto;">
                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" class="was-validated" name="contact-form" action="http://yweelon.fr:3000/mail" method="post">

                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="name" style="color: white;">Nom :</label>
                                    <input style="background-color: white;" type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="email" style="color: white;">Email :</label>
                                    <input style="background-color: white;" type="email" placeholder="Ton email ici" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                    <div class="invalid-feedback feedback-pos">
                                        L'Email ne semble pas correct
                                    </div>
                                </div>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="subject" style="color: white;">Objet :</label>
                                    <input style="background-color: white;" type="text" id="subject" name="subject" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <label for="validationMessage" style="color: white;">Message :</label>
                                    <textarea style="background-color: white; border-radius:15px; padding:5px; min-height: 150px;" rows="15" class="form-control is-invalid" id="validationMessage" placeholder="Entre ton message ici" required></textarea>
                                    <div class="invalid-feedback feedback-pos">
                                        S'il te plait, entre ton message
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                        <div class="text-center text-md-left">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>

                    <div class="status"></div>
                </div>
                <!--Grid column-->

            </div>

        </section>
        <!--Section: Contact v.2-->
    </div>
    <br /><br /><br /><br /><br />

    <div class="page_end">
        <div class="footer">
            <div class="bot-footer">
                <img src="assets/BotLogoWord.png" width="150" style="margin-left:-45px;"><br />
            </div><br />
            <div class="nouridio">website designed by <span style="color: #ffa500;">nouridio</span> | <a style="color: #ffa500;" href="https://icons8.com/icon/86840/mail">Mail icon by Icons8</a></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script>
        mybutton = document.getElementById("topbtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

        var username = '<?php echo $_SESSION['username']; ?>';

        var btn_connexion = document.getElementById('connexion_button')


        if (username !== "") {
            btn_connexion.innerText = username
            document.getElementById('name').value = username
            btn_connexion.setAttribute('title', 'Dashboard');
            btn_connexion.setAttribute('data-bs-toggle', 'tooltip');
            btn_connexion.setAttribute('data-bs-placement', 'bottom');
            btn_connexion.setAttribute('onclick', 'window.location.href=\'/dashboard.php\'')
        } else {
            btn_connexion.setAttribute('onclick', 'window.location.href=\'/login.php\'')
        }

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>