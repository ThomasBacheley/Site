<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>Mon CV</title>
    <link rel="stylesheet" href="/css/card.css">
    <link rel="stylesheet" href="/css/icon.css">
    <script src="./js/ml11.js"></script>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>

    <div class="heading" id="div_presentation">
        <div id="presentation">
            <div>
                <img class="pp" src="https://cdn.discordapp.com/avatars/663153459226345501/38db3bef89bf56571bb66b11442c2fa3.png" alt="Ywee PP" />
            </div>
            <br />
            <h1 class="ml11">
                <span class="text-wrapper">
                    <span class="line line1"></span>
                    <h1 class="display-5 title letters">Thomas</h1>
                </span>
            </h1>
            <p>(À la recherche d'une alternance)</p>
            <p class="subtitle">Salut, je m'appelle <span class="highlight">Thomas</span>, j'ai 22 ans et je suis <span class="highlight">développeur</span> Junior.</p>
            <br />
            <p class="subtitle">Je code depuis <span class="highlight">2017</span> des applications pour mes études ou des projets personnels (<a href="Hellbot.php">Hellbot</a> / <a href="GIT_bot.php">GIT Bot</a>).</p>
            <p class="subtitle">J'héberge tout ça sur des <span>Raspberry pi (modèle 3B et modèle 4)</span>.</p>
            <p class="subtitle">Je fais beaucoup de <span class="highlight">JavaScript</span> ou de développement <span class="highlight">Web / Mobile</span> pour me simplifier la vie et gérer ma base de données</p>
            <p class="subtitle">Je m'intéresse aussi à la <span class="highlight">domotique</span> via des minis projets autour d'<span class="highlight">ESP8266</span></p>

        </div>
        <br />
        <div id="objectif">
            <p class="subtitle">En Septembre 2022, je rejoins l'école <span class="highlight">Créative</span> dans la formation BAC+3 "<a href="Bac3_CDA.pdf" target="_blank">Concepteur Développeur D'Application</a>" pour une durée de <span class="highlight">1 an</span></p>
        </div>
    </div>
    <br /><br />
    <hr class="roundedHR">
    <br /><br />
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div style="bottom: 10px;" class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>


        <div id="div_CV" class="carousel-inner">
            <div class="carousel-item active">
                <div class="text-center">
                    <h3 class="display-3 title CV_title">Formations</h3>
                    <ul class="CV_ul">
                        <li><span class="highlight">Créative</span> - (BAC +3 - 2022-2023)</li><br />
                        <li><span class="highlight">BTS SNIR</span> - (2019)</li><br />
                        <li><span class="highlight">BAC STI2D</span> - (2017)</li>
                    </ul>
                </div>
            </div>
            <div class="carousel-item">
                <div class="text-center">
                    <h3 class="display-3 title CV_title">Experiences</h3>
                    <ul class="CV_ul">
                        <li><span class="highlight">Fiber Academy</span> (Colombelles) : Developpeur<br />Mi Aout → Fin Octobre 2020 (10 semaines)</li><br />
                        <li><span class="highlight">ATV</span> (Mathieu) : Developpeur Stagiaire<br />Mai → Juin 2018 (6 semaines)</li><br />
                        <li><span class="highlight">DL Négoce</span> (Colombelles) : Stage de Decouverte<br />Fevrier 2014 (1 semaine)</li>
                    </ul>
                </div>
            </div>
            <div class="carousel-item">
                <div class="text-center">
                    <h3 class="display-3 title CV_title">Langages de Programmation</h3>
                    <ul class="CV_ul">
                        <li>HTML, PHP, CSS<br />(<span class="highlight">1 an</span> en formation / <span class="highlight">3 ans</span> en autodidacte)</li><br />
                        <li>Javascript (nodeJS, Express, React Native)<br />(<span class="highlight">1 an</span> en formation / <span class="highlight">3 ans</span> en autodidacte)</li><br />
                        <li>SQL<br />(<span class="highlight">2 ans</span> en formation / <span class="highlight">3 ans</span> en autodidacte)</li>
                    </ul>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
    <br /><br />
    <hr class="roundedHR">
    <div class="heading" style="padding-top:5px !important;">
        <h1 class="display-5 title underline">Réalisation</h1>
        <br />
        <div id="div_realisation">
            <div class="div_realisation">
                <article class="reacards animate pop" id="c1">
                    <div class="reacards_content">
                        <h3 class="reacards_title underline">Yweelon.fr</h3>
                        <span class="reacards_language">PHP</span>
                        <p class="reacards_description">Site principalement en PHP, j'y affiches mes créations et y fixe plein de petit modules et projets.</p>
                        <a href="https://github.com/ThomasBacheley/Site" target="_blank" class="btn btn-primary">Github</a>
                    </div>
                </article>
                <article class="reacards animate pop" id="c2">
                    <div class="reacards_content">
                        <h3 class="reacards_title underline">GIT Bot</h3>
                        <span class="reacards_language">JS</span>
                        <p class="reacards_description">Bot Discord pour aider une communauté sur un jeu mobile, le Bot a une API et une base de données</p>
                        <a href="https://github.com/ThomasBacheley/GIT_bot_GT" target="_blank" class="btn btn-primary">Github</a>
                    </div>
                </article>
            </div>
            <div class="div_realisation">
                <article class="reacards animate pop" id="c3">
                    <div class="reacards_content">
                        <h3 class="reacards_title underline">Chronocross</h3>
                        <span class="reacards_language">C#, SQL</span>
                        <p class="reacards_description">Applis qui à pour but d'actualiser et numériser le déroulement du cross annuel à l'institut Lemonnier</p>
                        <a href="https://github.com/ThomasBacheley/ProjetCross2019" target="_blank" class="btn btn-primary">Github</a>
                    </div>
                </article>
                <article class="reacards animate pop" id="c4">
                    <div class="reacards_content">
                        <h3 class="reacards_title underline">ATV</h3>
                        <span class="reacards_language">C#, SQL</span>
                        <p class="reacards_description">Applis de gestion de bon de commande pour la société ATV</p>
                        <a href="https://github.com/ThomasBacheley/ATV-Application" target="_blank" class="btn btn-primary">Github</a>
                    </div>
                </article>
            </div>
        </div>

    </div>
    <br /><br /><br /><br /><br /><br />
    <div id="CV_end" style="text-align:center">
        <p>Vous pouvez télécharger mon CV en cliquant <a href="/BACHELEY_CV.pdf" download>ici</a> <img src="./assets/loupe.png" onClick="loupe()" title="Visionner le CV" height="16px;" width="16px" alt="loupe" /> et accéder à mon github <a target="_blank" href="https://github.com/ThomasBacheley">la</a></p>
        <div id="contact">
            <p>Si vous êtes intéresser par mon profil, n'hésitez pas à me contacter à l'adresse <span class="highlight">thom.bacheley@gmail.com</span></p>
        </div>
        <div class="icons">
            <a title="github" href="https://github.com/ThomasBacheley" target="_blank" class="icon icon--github">
                <img alt="icon github" width="40px" height="40px" src="./bootstrap_icons/github.svg" />
            </a>
            <a title="linkedin" href="https://www.linkedin.com/in/thomas-bacheley/" target="_blank" class="icon icon--linkedin">
                <img alt="icon linkedin" width="35px" height="35px" src="./bootstrap_icons/linkedin.svg" />
            </a>
            <a title="mail" href="mailto:thom.bacheley@gmail.com" class="icon icon--mail">
                <img alt="icon mail" width="40px" height="40px" src="./bootstrap_icons/envelope-fill.svg" />
            </a>
        </div>
    </div>
    </div>
    <br /><br /><br /><br /><br />
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script src="./js/ml11.js"></script>
    <script>
        function loupe() {
            window.open("http://yweelon.fr/BACHELEY_CV.pdf");
        }
    </script>
</body>

</html>