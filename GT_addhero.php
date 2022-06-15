<?php
session_start();
if (isset($_GET['added'])) {
    $added = $_GET['added'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>GT Add Hero</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>

    <!-- The actual snackbar -->
    <div id="snackbar_success">✅ Hero succesfully added</div>
    <div id="snackbar_failed">❌ Hero not added</div>
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
                    <div class="form-group col-md-4">
                        <label for="cards_name" class="form-label">Cards</label>
                        <input type="text" name="cards_name" class="form-control" placeholder="ex:2x atk or 2x crit" style="background-color: white;">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="merchitem_name" class="form-label">Merch Item name</label>
                        <select required name="merchitem_name" id="merchitem_name" class="form-select">
                            <option value="NULL">NULL</option>
                            <option value="NULL">----------------</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <input class="form-check-input" name="collaboration" type="checkbox" value="1" id="collaboration">
                        <label class="form-check-label" for="collaboration">
                            Collaboration
                        </label>
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
        <?php include './components/footer.html'; ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script src="./js/customjs.js"></script>
    <script>
        connexion_button(document.getElementById('connexion_button'), '<?php echo $_SESSION['username']; ?>')

        var added = '<?php echo $added; ?>';

        if (added == 'true') {
            var x = document.getElementById("snackbar_success");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
        if (added == 'false') {
            var x = document.getElementById("snackbar_failed");
            x.className = "show";
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