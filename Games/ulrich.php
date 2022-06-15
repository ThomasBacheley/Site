<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr" style="scroll-behavior: smooth !important;">

<head>
    <?php include '../components/head.html'; ?>
    <title>Ulrich</title>
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
            <div class="camera">
                <div class="map pixel-art">
                    <div class="character" facing="down" walking="true">
                        <div class="shadow pixel-art"></div>
                        <div class="character_spritesheet pixel-art"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="control" style="color:white">
            <ul>
                <li>Z,Q,S,D ou flèche directionnelle pour ce deplacer</li>
                <li>I : affiche les informations</li>
                <li>Espace (Hold) : Sprint</li>
                <li>R : restart</li>
                <li>E : Interraction</li>
            </ul>
        </div>
    </div>
    <br /><br /><br />
    <script src="./ulrich.js"></script>
    <footer>
        <?php include '../components/footer.html'; ?>
    </footer>
</body>

</html>