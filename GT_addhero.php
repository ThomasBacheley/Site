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
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <title>GT Add Hero</title>
    <meta content="Yweelon.fr" property="og:title" />
    <meta content="Site d'Yweelon" property="og:description" />
    <meta content="http://yweelon.fr" property="og:url" />
    <meta content="https://cdn.discordapp.com/attachments/770357581549535233/922704792260866058/BotLogo.png" property="og:image" />
    <meta content="#ffa500" data-react-helmet="true" name="theme-color" />
</head>

<body>
<nav class="navbar navbar-expand-lg bg-transparent">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="assets/menuIcon.svg" width="20px" height="20px" style="max-width: none !important;">
        </button>
        <a href="index.php">
            <img src="assets/BotLogo.png" width="40" height="40">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 20px !important">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bot
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="Hellbot.php">Hellbot</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="GIT_bot.php">GIT Bot</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Guardian Tale
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="GT.php">Guardian Tale Home</a>
						<div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="GT_herosheet.php">Hero Sheet</a>
                        <a class="dropdown-item" href="GT_addhero.php">Add Hero</a>
                        <a class="dropdown-item" href="GT_updatehero.php">Update Hero</a>
                    </div>
                </div>
            </ul>
            <button id="connexion_button" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="font-size: 10px !important;font-family: poppins !important;">Connexion</button>
        </div>
    </nav>
    <button onclick="myFunction()">Show Snackbar</button>

    <!-- The actual snackbar -->
    <div id="snackbar_success">✅ Hero succesfully added</div>
    <div class="heading">
        <form action="http://yweelon.fr:8084/addhero" method="post">
            <fieldset>
                <legend>Add a hero</legend>
                <div class="mb-3">
                    <label for="hero_name" class="form-label">Hero Name</label>
                    <input required type="text" name="hero_name" id="txtinput_heroname" class="form-control" style="background-color: white;">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="hero_type" class="form-label">Which Type ?</label>
                        <select required name="hero_type" id="select_hero_type" class="form-select">
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="hero_role" class="form-label">Which Role ?</label>
                        <select required id="select_hero_role" name="hero_role" class="form-select">
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" onclick="load_exweapontype()" data-target="#modal_weapon">
                    Add weapon
                </button>
                <div class="modal fade" id="modal_weapon" tabindex="-1" role="dialog" aria-labelledby="modal_weaponLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-secondary" id="modal_weaponLabel">New Ex Weapon</h5>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="ex-weapon-name" class="col-form-label text-secondary">Ex Weapon Name :</label>
                                        <input type="text" class="form-control" name="ex_weapon_name" id="ex-weapon-name" placeholder="Can\'t be NULL">
                                    </div>
                                    <div class="form-group">
                                        <label for="ex-weapon-type" class="col-form-label text-secondary">Ex Weapon Type:</label>
                                        <select id="ex-weapon-type" name="ex_weapon_type" class="form-select">
                                            <option value="NULL">NULL</option>
                                            <option value="NULL">----------------</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="delmodalcontent()">Close</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="shield_name" class="form-label">Shield name</label>
                        <select required name="shield_name" id="shield_name" class="form-select">
                            <option value="NULL">NULL</option>
                            <option value="NULL">----------------</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="accesory_name" class="form-label">Accesory name</label>
                        <select required name="accesory_name" id="accesory_name" class="form-select">
                            <option value="NULL">NULL</option>
                            <option value="NULL">----------------</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cards_name" class="form-label">Cards</label>
                        <input type="text" name="cards_name" class="form-control" placeholder="ex:2x atk or 2x crit" style="background-color: white;">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="merchitem_name" class="form-label">Merch Item name</label>
                        <select required name="merchitem_name" id="merchitem_name" class="form-select">
                            <option value="NULL">NULL</option>
                            <option value="NULL">----------------</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="pp_link" class="form-label">Profil photo of Hero</label>
                        <input required type="text" name="pp_link" class="form-control" placeholder="try to get the pic from https://guardiantalesguides.com/game/guardians" style="background-color: white;">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hero_link" class="form-label">Link to the Hero</label>
                        <input type="text" name="hero_link" class="form-control" placeholder="try to get the link from https://heavenhold.com/heroes/" style="background-color: white;">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="hero_pic" class="form-label">Link to the Hero's Illustration</label>
                        <input type="text" name="hero_pic" class="form-control" placeholder="try to get the link from https://heavenhold.com/heroes/" style="background-color: white;"><a href="https://heavenhold.com/wp-content/uploads/2020/11/future_princess.jpg">(example)</a>
                    </div>
                </div>
                <input type="text" name="username" id="txtinput_username" class="form-control" style="background-color: white;" placeholder="You can put your username if you want :)">
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
    </div>
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
        connexion_button(document.getElementById('connexion_button'),'<?php echo $_SESSION['username']; ?>')
        function myFunction() {
            // Get the snackbar DIV
            var x = document.getElementById("snackbar_success");

            // Add the "show" class to DIV
            x.className = "show";

            // After 3 seconds, remove the show class from DIV
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        function delmodalcontent() {
            document.getElementById('ex-weapon-name').value = '';
        }


        load_exweapontype()

        function load_exweapontype() {
            var xhr = new XMLHttpRequest();

            var selecter = document.getElementById('ex-weapon-type')
            selecter.innerHTML = ''
            var option1 = document.createElement('option');
            option1.value = 'NULL'
            option1.innerText = 'NULL'
            var option2 = document.createElement('option');
            option2.value = 'NULL'
            option2.innerText = '----------------'

            selecter.appendChild(option1);
            selecter.appendChild(option2);

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var items = JSON.parse(this.responseText)

                        items.forEach(item => {
                            var option = document.createElement('option');
                            option.value = `${item}`;
                            option.innerText = `${item}`;

                            selecter.appendChild(option);
                        })
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
            xhr.open("GET", "http://yweelon.fr:8084/listofexweapontype", true);
            xhr.send();
        }


        loadtype();

        function loadtype() {
            var xhr = new XMLHttpRequest();

            var selecter = document.getElementById('select_hero_type')

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var items = JSON.parse(this.responseText)

                        items.forEach(item => {
                            var option = document.createElement('option');
                            option.value = `${item}`;
                            option.innerText = `${item}`;

                            selecter.appendChild(option);
                        })
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
            xhr.open("GET", "http://yweelon.fr:8084/listoftype", true);
            xhr.send();
        }

        loadrole();

        function loadrole() {
            var xhr = new XMLHttpRequest();

            var selecter = document.getElementById('select_hero_role')

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var items = JSON.parse(this.responseText)

                        items.forEach(item => {
                            var option = document.createElement('option');
                            option.value = `${item}`;
                            option.innerText = `${item}`;

                            selecter.appendChild(option);
                        })
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
            xhr.open("GET", "http://yweelon.fr:8084/listofrole", true);
            xhr.send();
        }


        loadaccesory();

        function loadaccesory() {
            var xhr = new XMLHttpRequest();

            var selecter = document.getElementById('accesory_name')

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var items = JSON.parse(this.responseText)

                        items.forEach(item => {
                            var option = document.createElement('option');
                            option.value = `${item}`;
                            option.innerText = `${item}`;

                            selecter.appendChild(option);
                        })
                    } else {
                        alert('erreur : status -> ' + this.status)
                    }
                }
            };
            xhr.open("GET", "http://yweelon.fr:8084/listofaccesory", true);
            xhr.send();
        }

        loadmerch();

        function loadmerch() {
            var xhr = new XMLHttpRequest();

            var selecter = document.getElementById('merchitem_name')

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var items = JSON.parse(this.responseText)

                        items.forEach(item => {
                            var option = document.createElement('option');
                            option.value = `${item}`;
                            option.innerText = `${item}`;

                            selecter.appendChild(option);
                        })
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
            xhr.open("GET", "http://yweelon.fr:8084/listofmerch_item", true);
            xhr.send();
        }


        loadshield()

        function loadshield() {
            var xhr = new XMLHttpRequest();

            var selecter = document.getElementById('shield_name')

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var items = JSON.parse(this.responseText)

                        items.forEach(item => {
                            var option = document.createElement('option');
                            option.value = `${item}`;
                            option.innerText = `${item}`;

                            selecter.appendChild(option);
                        })
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
            xhr.open("GET", "http://yweelon.fr:8084/listofshield", true);
            xhr.send();
        }
    </script>

</body>

</html>
