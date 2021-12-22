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
    <title>GT Hero's Sheet</title>
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
                    <a class="nav-link" href="./index.php">Accueil</a>
                </li>
            </ul>
        </div>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Guardian Tale
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="GT_herosheet.php">Hero Sheet <span class="sr-only">(actuel)</span></a>
                <a class="dropdown-item" href="GT_addhero.php">Add Hero</a>
                <a class="dropdown-item" href="GT_updatehero.php">Update Hero</a>
            </div>
        </div>
    </nav>

    <button onclick="topFunction()" id="topbtn" title="Go to top">↑</button>

    <div class="modal fade" id="modal_hero" tabindex="-1" role="dialog" aria-labelledby="modal_heroLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #343540;color: white;">
                <div class="modal-body">
                    <h2 class="text-secondary" id="modal_heroLabel"></h2>
                    <h3 class="modal-title text-secondary" id="modal_heroLabel" style="font-size: 18px;"></h3>
                    <p>His EX Weapon is : <span id="weapon_name" style="font-weight: bold;"></span></p>
                    <p>He/She is a <span id="type" style="font-weight: bold;"></span> <span id="role" style="font-weight: bold;"></span> Hero</p>
                    <p>It's recommended to put <span id="accesory" style="font-weight: bold;"></span> as accesory item
                    </p>
                    <img id="hero_pic" src="https://upload.wikimedia.org/wikipedia/commons/7/71/Black.png" alt="hero pic img" style="width: auto;height: auto;border-radius: 5%;">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" id="moreinfo_link" role="button">More Information</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="heading" id="heading">
        <div class="input-group mb-3">
            <input type="text" id="heroname_input" class="form-control" placeholder="Hero's name" aria-label="Hero's name" aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="button" id="button-addon2" onclick="research_hero()">Research</button>
        </div>
        <br /><br />
        <div id="list-cards" style="display: flex;flex-direction: row;flex-wrap: wrap;justify-content:space-evenly">

        </div>
    </div>

    <div class="page_end">
        <br />
        <div class="footer">
            <div class="bot-footer">
                <a href="credits.php">
                    <img src="assets/BotLogoWord.png" width="150" style="margin-left:-45px;"><br />
                </a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script>
        // var username = '<?php echo $_SESSION['username']; ?>';

        // if (username !== "") {
        //     document.getElementById('connexion_button').innerText = username
        // }

        $("#heroname_input").on('keyup', function(e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                research_hero()
            }
        });

        function research_hero() {
            var heroname_input = document.getElementById('heroname_input').value;

            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var data = JSON.parse(this.responseText)
                        if (data) {
                            openmodal(data.name);
                            $('#modal_hero').modal('show')
                        } else {
                            alert('The hero seems doesn\'t exist')
                        }
                    }
                }
            }
            xhr.open("GET", "http://yweelon.fr:8084/gethero/" + heroname_input, true);
            xhr.send();
        }

        function openmodal(val) {
            var heroname = val.replace('btn_modal_', '').replace('_', ' ').replace('_', ' ').replace('_', ' ').replace('_', ' ');

            var xhr = new XMLHttpRequest();

            var moreinfo_button = document.getElementById('moreinfo_link')

            var weapon_name = document.getElementById('weapon_name')

            var role = document.getElementById('role')
            var type = document.getElementById('type')
            var accesory = document.getElementById('accesory')
            var hero_pic = document.getElementById('hero_pic')

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {

                        var data = JSON.parse(this.responseText)

                        weapon_name.innerText = data.ex_weapon
                        moreinfo_link.href = data.hero_link
                        role.innerText = data.role
                        type.innerText = data.type
                        accesory.innerText = data.accesory_item
                        hero_pic.src = data.hero_pic
                    } else {
                        alert('erreur : status -> ' + this.status)
                    }
                }
            };
            xhr.open("GET", "http://yweelon.fr:8084/gethero/" + heroname, true);
            xhr.send();


            var modal_heroLabel = document.getElementById('modal_heroLabel');
            modal_heroLabel.innerText = heroname
        }

        createcards()

        function createcards() {
            var xhr = new XMLHttpRequest();
            var div = document.getElementById('list-cards');

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var datas = JSON.parse(this.responseText);

                        datas.forEach(data => {
                            var card = document.createElement('div');
                            card.style.width = '13rem';
                            card.classList.add('card', 'text-white', 'bg-secondary');

                            var img = document.createElement('img');

                            img.src = data.pp_link
                            img.classList.add('card-img-top')
                            img.alt = 'hero profil pic img';

                            var btn_modal = document.createElement('button');
                            btn_modal.setAttribute('id', 'btn_modal_' + data.name.replace(' ', '_').replace(' ', '_').replace(' ', '_'));
                            btn_modal.setAttribute('onclick', 'openmodal(this.id)');
                            btn_modal.setAttribute('data-toggle', 'modal');
                            btn_modal.setAttribute('data-target', '#modal_hero');
                            btn_modal.innerText = data.name
                            btn_modal.classList.add('btn', 'btn-primary')

                            card.appendChild(img);
                            card.appendChild(btn_modal)

                            div.appendChild(card)
                        })
                    }
                }
            }
            xhr.open("GET", "http://yweelon.fr:8084/getallheroinfo/", true);
            xhr.send();
        }
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

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
</body>

</html>