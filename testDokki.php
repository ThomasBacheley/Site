<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>Test Technique Dokki</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <!---->
    <div class="heading">
        <h1 class="display-5 title">Test Technique <span style="color: #994B9A; text-decoration:underline; text-decoration-color: white;">Dokki</span></h1>
        <div id="sujet" style="border: 2px lightgray solid; border-radius:10px;">
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
        <a href="https://github.com/ThomasBacheley/Dokki_UserDisplay" target="_blank" class="btn btn-primary">Github</a>
    </div>
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script src="./js/customjs.js"></script>
    <script>
        connexion_button(document.getElementById('connexion_button'), '<?php echo $_SESSION['username']; ?>')
    </script>
</body>

</html>