<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr" style="scroll-behavior: smooth !important;">

<head>
    <?php include '../components/head.html'; ?>
    <title>Yanno</title>
    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include '../components/navbar.html'; ?>
    </nav>
    <link rel="stylesheet" href="./ulrich.css">
    <div class="container">
        <div class="frame">
            <div class="corner_topleft"></div>
            <div class="corner_topright"></div>
            <div class="corner_bottomleft"></div>
            <div class="corner_bottomright"></div>

            <div>
                <div class="camera">
                    <div class="map pixel-art">
                        <div class="character" facing="down" walking="false">
                            <div class="fishing"></div>
                            <div class="shadow pixel-art"></div>
                            <div class="interraction_bubble pixel-art"></div>
                            <div class="character_spritesheet pixel-art"></div>
                        </div>
                    </div>
                    <iframe src='http://yweelon.fr:3600/' height="200px" width="600px"></iframe>
                    <div class="tchat_div">
                        <img id="pp" alt="pp" />
                        <textarea class="tchat" id="tchat" rows="5" autocapitalize="sentences" readonly></textarea>
                    </div>
                </div>
                <div class="blackscreen">
                </div>
            </div>
        </div>
        <div id="control" style="color:white">
            <ul>
                <li>Q D ou ← → pour ce deplacer</li>
                <li>I : affiche les informations</li>
                <li>Espace (Hold) : Sprint</li>
                <li>R : restart</li>
                <li>E : Interraction</li>
            </ul>
        </div>
    </div>

    <!-- <div id="colorpicker">
        <h2 style="color:white">Couleur du ciel</h2>
        <div id="picker"></div>
    </div> -->
    <br /><br /><br />
    <script src="./ulrich.js"></script>
    <footer>
        <?php include '../components/footer.html'; ?>
    </footer>
</body>

</html>