<?php
session_start();
if (isset($_GET['deconnexion'])) {
    if ($_GET['deconnexion'] == true) {
        session_unset();
        header("location:index.php");
    }
}
if (!isset($_SESSION['username']) && !isset($_SESSION['permission'])) {
    header('Location: ../login.php');
}
?>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>Admin Dashboard</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <div id="snackbar_success">✅ Mail archivé</div>
    <div id="container_dashboard">
        <div id="dashboard_column">
            <button onclick="window.location.href='/dashboard.php?deconnexion=true'" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="font-size: 10px !important;font-family: poppins !important;">Deconnexion</button>
            <br />
            <p style="color: white;" id="info_user"></p>
            <br />
            <form id="changepswd" action="/verification/verification_changepswd.php" method="POST" style="border: 5px solid pink;">
                <p>Change your password ?</p>
                <label for="actualpswd" class="col-form-label">MDP Actuel</label><br />
                <input type="password" style="width: 150px;" name="actualpswd" id="actualpswd" class="form-control"><br />
                <label for="newpswd" class="col-form-label">Nouveau MDP</label><br />
                <input type="password" style="width: 150px;" name="newpswd" id="newpswd" class="form-control"><br />
                <label for="newpswd_confirmation" class="col-form-label">Retape Nouveau MDP</label><br />
                <input type="password" style="width: 150px;" name="newpswd_confirmation" id="newpswd_confirmation" class="form-control"></br>
                <button type="submit" value="CHANGE_PSWD" class="btn btn-primary">Changer MDP</button>
            </form>
            <p><a href="http://yweelon.fr/BACHELEY_CV.pdf" target="_blank">CV</a> | <a href="http://yweelon.fr/phpmyadmin" target="_blank">PHPMyAdmin</a> | <a href="https://github.com/ThomasBacheley">Github</a> | <a href="http://192.168.1.66:3000">React</a></p>
        </div>
        <div id="dashboard_info">
            <div id="rpi_temp_div">
                <div id="chart_el" style="margin-left:auto;margin-right:auto;"></div>
                <button onclick="drawChart()" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="width:20%;font-size: 10px !important;font-family: poppins !important;">Relever température</button>
            </div>
            <br />
        </div>
    </div>
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
</body>
<script src="./js/customjs.js"></script>
<script>
    async function getTemperature() {
        return new Promise((resolve, reject) => {
            try {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {
                            var temp_data = JSON.parse(this.responseText);
                            resolve(temp_data)
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
                xhr.open("GET", "http://yweelon.fr:8090/gettemperature", true);
                xhr.send();
            } catch (error) {
                reject(error)
            }
        })
    }

    var username = '<?php echo $_SESSION['username']; ?>'
    var perm = '<?php echo $_SESSION['permission']; ?>'
    document.getElementById('info_user').innerHTML = `${username[0].toUpperCase()}${username.slice(1)} (<span class="highlight">${perm}</span>)`
    var dashboard_column = document.getElementById('dashboard_column')
    var dashboard_info = document.getElementById('dashboard_info')

    //---

    var mails_div = document.createElement('div');

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4) {
            if (this.status == 200) {
                var mails = JSON.parse(this.responseText);

                mails.forEach(mail => {
                    var div_mail = document.createElement('div');
                    div_mail.classList.add('div_mail_css')
                    div_mail.id = 'div_mail' + mail.id;
                    var close_button = document.createElement('button');
                    close_button.id = "CloseButton_" + mail.id;
                    close_button.classList.add('close_button');
                    close_button.innerText = ' X'
                    close_button.setAttribute('onclick', 'displayid(this)')

                    div_mail.appendChild(close_button);

                    //--

                    var mail_title = document.createElement('h3')
                    mail_title.innerText = mail.subject;

                    div_mail.appendChild(mail_title)

                    var mail_from = document.createElement('p')
                    mail_from.innerHTML = `De ${mail.sender} (${mail.email}) (${mail.date})<br/>`

                    div_mail.appendChild(mail_from)

                    var mail_msg = document.createElement('p')
                    mail_msg.innerText = mail.message;

                    div_mail.appendChild(mail_msg)

                    mails_div.appendChild(div_mail)
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
    xhr.open("GET", "http://yweelon.fr:8090/recupmail", true);
    xhr.send();

    dashboard_info.appendChild(mails_div)

    var snackbar = document.getElementById("snackbar_success");

    function displayid(el) {
        // Add the "show" class to DIV
        snackbar.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function() {
            snackbar.className = snackbar.className.replace("show", "");
        }, 3000);

        let id_mail = el.id.replace('CloseButton_', '');

        console.log(id_mail)
    }
</script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    // var temperature_date_array = JSON.parse('<?php echo json_encode($temperature_date_array); ?>').reverse();

    google.load("visualization", "1", {
        packages: ["corechart"]
    });
    google.setOnLoadCallback(drawChart);

    async function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Temperature RPI');

        let arr = await getTemperature()

        data.addRows(arr);

        var formatPattern = '#,##0.0 C°';
        var formatNumber = new google.visualization.NumberFormat({
            pattern: formatPattern
        });

        formatNumber.format(data, 1);

        var options = {
            title: 'Température de la RPI 4',
            titleTextStyle: {
                color: 'white',
                fontSize: 18,
                bold: true
            },
            width: 800,
            height: 400,
            legend: {
                position: "none"
            },
            pointSize: 7,
            pointFillColor: '#fff',
            hAxis: {
                tickOptions: {
                    fontWeight: 'bold',
                    color: '#ffffff'
                },
                title: 'Date',
                titleTextStyle: {
                    fontStyle: "normal",
                    italic: false,
                    color: '#ffffff'
                },
                textStyle: {
                    fontStyle: "normal",
                    italic: false,
                    color: '#ffffff'
                }
            },
            vAxis: {
                tickOptions: {
                    fontWeight: 'bold',
                    color: '#ffffff'
                },
                title: 'Celsius',
                titleTextStyle: {
                    fontStyle: "normal",
                    italic: false,
                    color: '#ffffff'
                },
                textStyle: {
                    fontStyle: "normal",
                    italic: false,
                    color: '#ffffff'
                },
                format: formatPattern,
            },
            series: {
                0: {
                    color: '#ffa500'
                }
            },
            backgroundColor: {
                fill: '#272935',
                stroke: '#fff',
                strokeWidth: 3
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_el'));
        chart.draw(data, options);
    }
</script>

</html>