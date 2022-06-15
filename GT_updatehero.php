<?php
session_start();
if (isset($_GET['update'])) {
    $update = $_GET['update'];
}
if (isset($_GET['heroname'])) {
    $heroname = $_GET['heroname'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>GT Update Hero</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <!-- The actual snackbar -->
    <div id="snackbar_success">✅ Hero succesfully updated</div>
    <div id="snackbar_failed">❌ Hero not updated</div>
    <div class="heading">
        <form action="./verification/verif_updatehero.php" method="post">
            <!-- <form action="http://yweelon.fr:8084/updatehero" method="post"> -->
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
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script src="./js/customjs.js"></script>
    <script>
        var username = '<?php echo $_SESSION['username']; ?>';
        var heroname = '<?php echo $heroname; ?>';
        var update = '<?php echo $update; ?>';

        connexion_button(document.getElementById('connexion_button'), '<?php echo $_SESSION['username']; ?>')

        if (username !== "") {
            document.getElementById('txtinput_username').value = username
        }

        if (heroname !== "") {
            document.getElementById('heronameinput').value = heroname.split('_').join(' ')
        }

        if (update == 'true') {
            console.log('here')
            var x = document.getElementById("snackbar_success");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }
        if (update == 'false') {
            var x = document.getElementById("snackbar_failed");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        }

        var div_newvalue = document.getElementById('div_newvalue')
        var lbl = '<label for="newvalue" class="form-label">new Value</label>'

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
            xhr.open("GET", "http://yweelon.fr:8084/paramlist", true);
            xhr.send();
        }

        function param_choisis(param) {
            var xhr = new XMLHttpRequest();

            if (param == 'cards' || param == 'pp_link' || param == 'hero_link' || param == 'hero_pic' || param == 'name' || param == 'nickname') {
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
                xhr.open("GET", "http://yweelon.fr:8084/listof" + param, true);
                xhr.send();
            }
        }
    </script>
</body>

</html>