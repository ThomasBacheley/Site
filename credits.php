<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'head.php'; ?>
    <title>Crédits</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include 'navbar.php'; ?>
    </nav>
    <!---->
    <div class="heading">
        <br />
        <p>Ce site à pour but <span class="highlight">d'informer</span> et est <span class="highlight">non lucratif</span></p>
        <br /><br />
        <div style="padding:10px" id="guardiantale" class="borderBlink">
            <p>Toutes les données à propos du jeu "<a href="https://guardiantales.com/" target="_blank">Guardian Tale</a>" sont en aucun cas les miennes, je décline <span class="highlight">toutes</span> responsabilités les concernants</p>
            <p>Le contenu graphique de Guardian Tales est la propriété de <a target="_blank" href="https://www.playkakaogames.com/">Kakao Games Corp</a></p>
            <p>Données GuardianTale basées sur des connaissances personnelles<br />ainsi que prise sur <a target="_blank" href="https://guardiantalesguides.com/">guardiantalesguides.com</a> et <a target="_blank" href="https://heavenhold.com/">heavenhold.com</a></p>
        </div>
        <br /><br />
        <p>Site design par <a href="https://github.com/Nouridio" target="_blank">nouridio</a></p>
        <br />
        <p>Mail icon par <a href="https://icons8.com/icon/86840/mail" target="_blank">Icons8</a> </p>
        <br />
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
        connexion_button(document.getElementById('connexion_button'), '<?php echo $_SESSION['username']; ?>')
    </script>
</body>

</html>