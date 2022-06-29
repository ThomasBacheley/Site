<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>Mon CV</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <div class="heading">
        <h1 class="display-5 title">Test Technique <span style="color: #994B9A; text-decoration:underline; text-decoration-color: white;">Dokki</span></h1>
        <div id="sujet">
            <p class="h4" style="text-decoration:underline; text-decoration-color: white;"><span class="highlight">Sujet</span> :</p>
            <br />
            <div id="intitule" style="font-style: italic;">
                <p>" Créer une application React,</p>
                <p>Dans ce mini test il vous sera demandé de créer à partir de rien,</p>
                <p>un nouveau projet Node, sur une base d’une CRA (Create React App),</p>
                <p>d'effectuer des traitement de données reçu par une API, et d’intégrer les résultats visuellement.</p>
                <br />
                <p>Vous récupérez les données depuis l’API (ouverte/gratuite) : <a href="https://dummyjson.com/users" target="_blank">https://dummyjson.com/users</a> "</p>
            </div>
        </div>
        <br /><br /><br />
        <div id="resultat">
            <p class="h4" style="text-decoration:underline; text-decoration-color: white;">Voici le <span class="highlight">résultat</span> :</p>
            <iframe width="100%" height="750px" src="http://yweelon.fr:3003"></iframe>
        </div>

        <br />
        <br />
        <div style="display: flex; flex-direction:row; justify-content:space-evenly;">
            <a href="https://github.com/ThomasBacheley/Dokki_UserDisplay" target="_blank" class="btn btn-primary">Github</a>
            <a href="http://yweelon.fr/Dokki_UserDisplay/sujet.pdf" target="_blank" class="btn btn-primary">PDF</a>
        </div>

    </div>
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