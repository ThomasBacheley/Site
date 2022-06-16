<?php
session_start();
if (isset($_GET['sendmail'])) {
    $sendmail = $_GET['sendmail'];
}
?>

<!DOCTYPE html>
<html lang="fr" style="scroll-behavior: smooth !important;">

<head>
    <?php include './components/head.html'; ?>
    <title>Yweelon.fr</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <button onclick="topFunction()" id="topbtn" title="Go to top">↑</button>
    <!-- The actual snackbar -->
    <div id="snackbar_success">✅ Mail envoyer avec succes</div>
    <div id="snackbar_failed">❌ Le mail n\'a pas été envoyer</div>
    <br /><br /><br />
    <div class="heading">
        <h1 class="ml1" style="margin-left:auto;margin-right:auto">
            <span class="text-wrapper">
                <span class="line line1"></span>
                <span class="letters">Bienvenue</span>
                <span class="line line2"></span>
            </span>
        </h1>
        <br /><br />
        <p class="subtitle">Bienvenue sur <span style="text-decoration: underline;">Yweelon.fr</span><br />Un site
            dévéloppé par Yweelon</p>
        <br />
        <a class="btn btn-primary btn-lg" href="#mailform" role="button">Mail <img alt="mail icon" src="./bootstrap_icons/envelope-fill.svg"/></a>
        <a class="btn btn-secondary btn-lg" href="#about" role="button">En savoir plus</a>
        <br /><br /><br /><br /><br /><br /><br /><br /><br />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <script src="./js/ml1.js"></script>
    </div>
    <br id="about" />
    <div style="text-align: center;">
        <div>
            <img alt="Logo Site" src="./assets/Logo.png" />
        </div>
        <br />
        <p class="subtitle" style="font-size:22px !important;">Ici tu pourras trouver la plupart de <span class="highlight">mes projets</span> personnels et professionnels!<br />Ainsi que <span class="highlight">mon parcours</span> et autres</p>
        <p class="subtitle" style="font-size:22px !important;">Je mets très souvent à jour ce site, je t'invite donc à le <span class="highlight">visiter</span> via les différentes pages disponible</p>
    </div>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
    <p style="font-style: italic;text-align: center">(En construction)</p>
    <div id="mailform" class="text-center">
        <div>
            <h2 class="h1-responsive font-weight-bold text-center my-4" style="color: white;">Contact</h2>
            <p class="text-center w-responsive mx-auto mb-5" style="color: white;">Une Question ? Je t'invite à
                m'envoyer un mail et j'y repondrais le plus tot possible</p>
        </div>
        <!--<section class="mb-4" style="display:flex; justify-content:center;">
            <div class="row">
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" class="was-validated" name="contact-form" action="/verification/verification_mail.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="name" style="color: white;">Nom :</label>
                                    <input style="background-color: white;" type="text" id="name" name="name" pattern="[a-zA-Z]+" class="form-control" required>
                                    <div class="invalid-feedback feedback-pos">
                                        Le nom semble vide
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="email" style="color: white;">Email :</label>
                                    <input style="background-color: white;" type="email" placeholder="Ton email ici" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                    <div class="invalid-feedback feedback-pos">
                                        L'Email ne semble pas correct
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <label for="subject" style="color: white;">Objet :</label>
                                    <input style="background-color: white;" type="text" id="subject" name="subject" pattern="[a-zA-Z]+" class="form-control" required>
                                    <div class="invalid-feedback feedback-pos">
                                        L'objets semble vide
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="validationMessage" style="color: white;">Message :</label>
                                    <textarea style="background-color: white; border-radius:15px; padding:5px; min-height: 150px;" rows="15" class="form-control" pattern="*" id="validationMessage" name="validationMessage" placeholder="Entre ton message ici" required></textarea>
                                    <div class="invalid-feedback feedback-pos">
                                        S'il te plait, entre ton message
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-md-left">
                            <button type="submit" value="SEND_MAIL" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>-->
    </div>
    <br /><br /><br /><br /><br />
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
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

        function sendmail() {
            <?php
            header('Location: index.php?sendmail=true'); // l'utilisateur existe déja
            ?>
        }

        // When the user clicks on the button, scroll to the top of the document

        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }

        if ('<?php echo $sendmail; ?>' == 'true') {
            var x = document.getElementById("snackbar_success");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
        if ('<?php echo $sendmail; ?>' == 'false') {

            var x = document.getElementById("snackbar_failed");
            x.className = "show";

            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        connexion_button(document.getElementById('connexion_button'), '<?php echo $_SESSION['username']; ?>')

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