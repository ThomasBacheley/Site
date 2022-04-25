<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'head.php'; ?>
    <title>Mon CV</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include 'navbar.php'; ?>
    </nav>
    <!---->

    <div class="heading" id="div_presentation">
        <div id="presentation">
            <div>
                <img src="https://cdn.discordapp.com/avatars/663153459226345501/fb2641134780a5c5fe8f92f9814cc580.png" alt="Ywee PP" style="width: 128px;height: 128px; border-radius:15px" />
            </div>
            <h1 class="display-5 title">Thomas <span class="highlight">/</span> Yweelon</h1>
            <p class="subtitle">Salut, je m'appelle <span class="highlight">Thomas</span>, j'ai 22 ans et je suis <span class="highlight">développeur</span> Junior.</p>
            <br />
            <p class="subtitle">Je code depuis <span class="highlight">2017</span> des applications pour mes études ou des projets personnels (<a href="Hellbot.php">Hellbot</a> / <a href="GIT_bot.php">GIT Bot</a>).</p>
            <p class="subtitle">J'héberge tout ça sur des <span>Raspberry pi (modèle 3B et modèle 4)</span>.</p>
            <p class="subtitle">Je fais beaucoup de <span class="highlight">JavaScript</span> ou de développement <span class="highlight">Web / Mobile</span> pour me simplifier la vie et gérer ma base de données</p>
            <p class="subtitle">Je m'intéresse aussi à la <span class="highlight">domotique</span> via des minis projets autour d'<span class="highlight">ESP8266</span></p>

        </div>
        <br />
        <div id="objectif">
            <p class="subtitle">En Septembre 2022 je rejoins l'école <span class="highlight">Créative</span> dans la license Web mobile & Business Intelligence pour une durée de <span class="highlight">1 an</span></p>
        </div>
    </div>
    <br /><br />
    <p style="text-align: center; color:white;">--------------------------------------------------------------</p>
    <br /><br />
    <div id="div_CV">
        <div id="formations" style="text-align: left;">
            <h3 class="display-3 title CV_title">Formations</h3>
            <ul class="CV_ul">
                <li><span class="highlight">Créative</span> - (BAC +3 - 2022-2023)</li>
                <li><span class="highlight">BTS SNIR</span> - (2019)</li>
                <li><span class="highlight">BAC STI2D</span> - (2017)</li>
            </ul>
        </div>
        <div id="experiences" style="text-align: right;">
            <h3 class="display-3 title CV_title">Experiences</h3>
            <ul class="CV_ul">
                <li><span class="highlight">Fiber Academy</span> (Colombelles) : Developpeur - Mi Aout → Fin Octobre 2020 (10 semaines)</li>
                <li><span class="highlight">ATV</span> (Mathieu) : Developpeur Stagiaire - Mai → Juin 2018 (6 semaines)</li>
                <li><span class="highlight">DL Négoce</span> (Colombelles) : Stage de Decouverte - Fevrier 2014 (1 semaine)</li>
            </ul>
        </div>
        <div id="langages" style="text-align: left;">
            <h3 class="display-3 title CV_title">Langes de Programmation</h3>
            <ul class="CV_ul">
                <li>HTML, PHP, CSS</li>
                <li>Javascript (nodeJS, Express, React Native)</li>
                <li>SQL</li>
            </ul>
        </div>
        <div id="projets" style="text-align: right;">
            <h3 class="display-3 title CV_title">Projets</h3>
            <ul class="CV_ul">
                <li><span class="highlight">Yweelon.fr</span> : Principalement en PHP</li>
                <li><span class="highlight">GIT Bot</span> : Réalisation d'un bot Discord en JS pour aider une communauté sur un jeu mobile.<br /> Le Bot à une API et une Base de données attitré</li>
                <li><span class="highlight">Chronocross</span> : Réalisation d'une DLL (en C#) et d'une base de données pour l'institut lemonnier,<br /> dans le but d'actualiser et numériser le deroulement du Cross annuel</li>
                <li><span class="highlight">ATV</span> : Réalisation d'une application de gestion de bon de commande (en C#), <br />ainsi que d'une base de données pour la société ATV</li>
            </ul>
        </div>
        <br /><br /><br /><br /><br /><br />
        <div id="CV_end" style="font-size:18px; text-align:center">
            <p>Vous pouvez telecharger mon CV en cliquant <a href="/BACHELEY_CV.pdf" download>ici</a> et accéder à mon github <a target="_blank" href="https://github.com/ThomasBacheley">la</a></p>
            <div id="contact">
                <p>Si vous etes interesser par mon profil, n'hesitez pas à me contacter à l'addresse <span class="highlight">thom.bacheley@gmail.com</span></p>
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
</body>

</html>