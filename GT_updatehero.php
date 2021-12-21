<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/now-ui-kit.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <title>GT Update Hero</title>
    <meta content="Yweelon.fr" property="og:title" />
    <meta content="Site d'Yweelon" property="og:description" />
    <meta content="http://yweelon.fr" property="og:url" />
    <meta content="https://cdn.discordapp.com/attachments/770357581549535233/922704792260866058/BotLogo.png" property="og:image" />
    <meta content="#ffa500" data-react-helmet="true" name="theme-color" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-transparent">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <a href="index.php">
                <img src="assets/BotLogo.png" width="40" height="40">
            </a>
        </button>
        <img src="assets/BotLogo.png" width="40" height="40">
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 20px !important">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Accueil <span class="sr-only">(actuel)</span></a>
                </li>
            </ul>
        </div>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Guardian Tale
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="GT_herosheet.php">Hero Sheet</a>
                <a class="dropdown-item" href="GT_addhero.php">Add Hero</a>
                <a class="dropdown-item" href="GT_updatehero.php">Update Hero</a>
            </div>
        </div>
    </nav>
    <div class="heading">
        <form action="http://yweelon.fr:8084/updatehero" method="post">
            <fieldset>
                <legend>Suggest a modification for</span></legend>
                <div class="mb-3">
                    <input id="heronameinput" required type="text" name="select_hero" class="form-control" style="background-color: white;">
                </div>
                <div class="mb-3">
                    <label for="select_param" class="form-label">Which parameter ?</label>
                    <select name="select_param" id="option_parameter" onchange="param_choisis(this.value)" class="form-select" required>
                    </select>
                </div>
                <div class="mb-3" style="display: block;" id="div_newvalue">
                </div>
                <input type="text" name="username" id="txtinput_username" class="form-control" style="background-color: white;" placeholder="You can put your username if you want :)">
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
    </div>
    <div class="page_end">
        <div class="footer">
            <div class="bot-footer">
                <img src="assets/BotLogoWord.png" width="150" style="margin-left:-45px;"><br />
            </div><br />
            <div class="nouridio">website designed by <span style="color: #ffa500;">nouridio</span></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script>
        var username = '<?php echo $_SESSION['username']; ?>';


        if (username !== "") {
            document.getElementById('txtinput_username').value = username
        }


        if (window.location.search) {
            document.getElementById('heronameinput').value = window.location.search.substring(1).split('=')[1].split('_').join(' ');
        }

        var div_newvalue = document.getElementById('div_newvalue')
        var lbl = '<label for="newvalue" class="form-label">new Value</label>'

        /*loadfirstselecter()
        function loadfirstselecter(){
            var xhr = new XMLHttpRequest();

            div_newvalue.innerHTML = lbl + '<select name=\"newvalue\" id=\"option_value\" class=\"form-select\" required><option value="NULL">NULL (don\'t know or don\'t have item)</option></select>'

            var option_value = document.getElementById('option_value')

                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            var donnees = JSON.parse(this.responseText)

                            donnees.forEach(donnee => {
                                var option = document.createElement('option');
                                option.value = donnee;
                                option.innerText = donnee;

                                option_value.appendChild(option);
                            })
                        } else {
                            alert('erreur : status -> ' + this.status)
                        }
                    }
                };
            xhr.open("GET", "http://yweelon.fr:8084/listoftype", true);
            xhr.send();
        }*/

        loadparam();

        function loadparam() {
            var xhr = new XMLHttpRequest();

            var selecter = document.getElementById('option_parameter')

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var params = JSON.parse(this.responseText)

                        param_choisis(params[0])

                        params.forEach(param => {
                            var option = document.createElement('option');
                            option.value = param;
                            option.innerText = param;

                            selecter.appendChild(option);
                        })
                    } else {
                        alert('erreur : status -> ' + this.status)
                    }
                }
            };
            xhr.open("GET", "http://yweelon.fr:8084/paramlist", true);
            xhr.send();
        }

        function param_choisis(param) {
            var xhr = new XMLHttpRequest();

            if (param == 'cards' || param == 'pp_link' || param == 'hero_link' || param == 'hero_pic' || param == 'name') {
                div_newvalue.innerHTML = lbl + '<input id=\"newvalue_input\" required type=\"text\" name=\"newvalue\" class=\"form-control\" style=\"background-color: white;\">'
            } else {
                div_newvalue.innerHTML = lbl + '<select name=\"newvalue\" id=\"option_value\" class=\"form-select\" required><option value="NULL">NULL (don\'t know or don\'t have item)</option></select>'

                var option_value = document.getElementById('option_value')

                xhr.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            var donnees = JSON.parse(this.responseText)

                            donnees.forEach(donnee => {
                                var option = document.createElement('option');
                                option.value = donnee;
                                option.innerText = donnee;

                                option_value.appendChild(option);
                            })
                        } else {
                            alert('erreur : status -> ' + this.status)
                        }
                    }
                };
                xhr.open("GET", "http://yweelon.fr:8084/listof" + param, true);
                xhr.send();
            }
        }
    </script>
</body>

</html>