<?php
session_start();
if (isset($_GET['deconnexion'])) {
    if ($_GET['deconnexion'] == true) {
        session_unset();
        header("location:index.php");
    }
}

// connexion à la base de données
// $db_username = 'root';
// $db_password = 'jjE72Dak';
// $db_name     = 'universal_db';
// $db_host     = 'localhost';

// $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name)
//     or die('could not connect to database');
// $query = mysqli_query($conn, "SELECT temperature,date FROM rpi_temp ORDER BY id DESC LIMIT 5");

// $temperature_date_array = [];
// while ($row = mysqli_fetch_assoc($query)) {
//     $temp_str = preg_replace('/202\d{1}-/i', '', $row['date']);
//     array_push($temperature_date_array, [str_replace(':', 'h', preg_replace('/:\d{2}$/i', '', $temp_str)), intval($row['temperature'])]);
// }

?>
<html lang="fr">

<head>
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/now-ui-kit.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <title>Dashboard</title>
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
                        <a class="dropdown-item" href="GT_herosheet.php">Hero Sheet</a>
                        <a class="dropdown-item" href="GT_addhero.php">Add Hero</a>
                        <a class="dropdown-item" href="GT_updatehero.php">Update Hero</a>
                    </div>
                </div>
            </ul>
            <div class="nav-item">
                <a class="nav-link" href="http://yweelon.fr/phpmyadmin">PHPMyAdmin</a>
            </div>
            <div class="nav-item">
                <a class="nav-link" href="https://github.com/ThomasBacheley">Github</a>
            </div>
        </div>
    </nav>
    <div id="container_dashboard">
        <div id="dashboard_column">
            <button onclick="window.location.href='/dashboard.php?deconnexion=true'" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="font-size: 10px !important;font-family: poppins !important;">Deconnexion</button>
            <br />
            <p style="color: white;" id="info_user"></p>
        </div>
        <div id="dashboard_info">
            <div id="chart_el" style="margin-left:auto;margin-right:auto;"></div>
            <button onclick="drawChart()" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="width:20%;font-size: 10px !important;font-family: poppins !important;">Relever température</button>
        </div>
    </div>
</body>
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
                            alert('erreur : status -> ' + this.status)
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
    if (perm == 'ADMIN') {
        var link_cv = document.createElement('a');
        link_cv.href = 'http://yweelon.fr/CV.pdf';
        link_cv.target = '_blank'
        link_cv.style.color = '#ffa500'
        link_cv.innerText = 'CV'
        document.getElementById('dashboard_column').appendChild(link_cv)
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