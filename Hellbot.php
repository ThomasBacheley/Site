<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>Hellbot</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <!---->
    <div class="heading">
        <div>
            <img src="https://cdn.discordapp.com/avatars/769180597045690418/98291e1cf7a0644d64012b0b7347aa76.png" alt="Hellbot PP" style="width: 128px;height: 128px;" />
        </div>
        <div>
            <h1 class="display-5 title"><span class="highlight">Hell</span>Bot
            </h1>
            <p class="subtitle">Hellbot est un bot dévélopper par moi meme depuis ~ Novembre 2020</p>
            <br />
            <p class="subtitle">Fait en <span class="highlight">Javascript</span> et hebergé sur une <span class="highlight">Raspberry PI 4</span>, Hellbot est capable de plein de choses.</p>
            <p class="subtitle">Comme par exemple, fournir de manière aléatoire des images de <span class="highlight">Renard</span> (<span style="font-style: italic;">petit plaisir personnel</span>😜)
            </p>
            <p class="subtitle">Donner la <span class="highlight">Température de la RPI</span> ou consulter une <span class="highlight">BDD Custom</span> afin de restituer les données</p>
            <br />
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="(NSFW) Clique dessus pour afficher le Texte">
                <div class="NSFW" onclick="removeblur(this)">
                    <p class="subtitle">Hellbot possède un systeme "<span class="highlight">Anti Fake</span>".</p>
                    <p class="subtitle">Plusieurs vérifications interviennent comme par exemple lorsqu'un utilisateur <span class="highlight">rejoint</span> le serveur, sa photo de profil est scanné via une <span class="highlight">API</span> qui permet de savoir si la dîtes photo est <span class="highlight">NSFW</span></p>
                    <p class="subtitle">Les messages sont aussi vérifiés auprès d'un <span class="highlight">JSON</span> customisé et completer au fur et à mesure</p>
                    <br />
                    <p class="subtitle">Si la personne a une photo NSFW ou envois un message avec une phrase qu'un fake pourrait dire, Le bot <span class="highlight">génere</span> un JSON avec de nombreuses informations, ainsi qu'un lien vers une API pour le bannir</p>
                </div>
            </span>
            <a class="btn btn-primary btn-lg" onclick="alert('Le bot étant privé, le Github n\'est pas disponible.\nDésolé')" target="_blank" role="button">GitHub</a>
        </div>
    </div>
    <br /><br /><br />
    <div class="stats">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="user_count_title">2016</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922565743319584838/heroes_icon.png" alt="heroes_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="heroes_value" class="highlight">2016</span> Utilisateur gérer</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="cmds_value_title">14</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922563836056338452/commands_icon.png" alt="commands_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="cmds_value" class="highlight">14</span> Commandes disponibles</p>
            </div>
        </div>
    </div>
    <br /><br /><br /><br /><br />
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

        function removeblur(el) {
            el.classList.remove("NSFW")
        }
    </script>
</body>

</html>