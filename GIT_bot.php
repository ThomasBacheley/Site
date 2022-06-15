<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './components/head.html'; ?>
    <title>GIT Bot</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <!---->
    <div class="heading">
        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-bs-html="true" title="Text in English, because it's a English bot">
            <div>
                <div>
                    <img src="/assets/GT_pp.png" alt=".." style="width: 128px;height: 128px;" />
                    <img src="/assets/GIT_pp.png" alt=".." style="width: 128px;height: 128px;" />
                </div>
                <h1 class="display-5 title"><span class="highlight">G</span>reen <span class="highlight">I</span>ce
                    <span class="highlight">T</span>eam Bot
                </h1>
                <p class="subtitle">GIT bot is a bot made for Green Ice Tea and devoted to Guardian Tales Game</p>
                <br />
                <p class="subtitle">Made in <span class="highlight">Javascript</span> and host on a <span class="highlight">Raspberry PI 4</span>, GIT Bot is pretty efficient.</p>
                <p class="subtitle">You can check hero's build or Informations with commands.</p>
                <a class="btn btn-primary btn-lg" href="https://github.com/ThomasBacheley/GIT_bot_GT" target="_blank" role="button">GitHub</a>
            </div>
        </span>
    </div>
    <br /><br /><br />
    <div class="stats">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="heroes_value_title">0</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922565743319584838/heroes_icon.png" alt="heroes_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="heroes_value" class="highlight">0</span> Heroes are currently in a Database</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="items_value_title">0</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922563773921898568/items_icon.png" alt="items_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="items_value" class="highlight">0</span> Items are currently in a Database</p>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><span id="cmds_value_title">20</span> <img src="https://cdn.discordapp.com/attachments/922554541419921470/922563836056338452/commands_icon.png" alt="commands_icon" style="width: 32px;height: 32px;" /></h5>
                <p class="card-text"><span id="cmds_value" class="highlight">20</span> Commands are currently avaible</p>
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

            load_info()

            function load_info() {
                var xhr = new XMLHttpRequest();

                var heroes_value = document.getElementById('heroes_value')
                var items_value = document.getElementById('items_value')

                var heroes_value_title = document.getElementById('heroes_value_title')
                var items_value_title = document.getElementById('items_value_title')

                xhr.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            var data = JSON.parse(this.responseText)

                            heroes_value.innerText = data.heroes_value
                            items_value.innerText = data.items_value

                            heroes_value_title.innerText = data.heroes_value
                            items_value_title.innerText = data.items_value

                        } else {
                            switch (this.status) {
                                case 400:
                                    alert('Erreur : 400 Bad Request')
                                    break;
                                case 0:
                                    alert('Erreur : 0 API OFFLINE')
                                    break;
                                default:
                                    alert('erreur : status -> ' + this.status)
                                    break;
                            }

                        }
                    }
                };
                xhr.open("GET", "http://yweelon.fr:8084/getinfosite", true);
                xhr.send();
            }
        </script>
</body>

</html>