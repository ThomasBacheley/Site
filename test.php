<?php
session_start();

// connexion à la base de données
// $db_username = 'root';
// $db_password = 'jjE72Dak';
// $db_name     = 'universal_db';
// $db_host     = 'localhost';
// $db = mysqli_connect($db_host, $db_username, $db_password, $db_name)
//     or die('could not connect to database');
// // $requete = "SELECT id,temperature,date FROM rpi_temp ORDER BY id DESC";
// $requete = "SELECT id,temperature,date FROM rpi_temp ORDER BY id DESC";
// $exec_requete = mysqli_query($db, $requete);

// while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
//     printf("ID : %s  Nom : %s", $row[0], $row[1]);
//  }


?>
<html>

<head>
    <title>
        Raspberry Pi Temperature Logger
    </title>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {
            packages: ["corechart"]
        });
        google.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Time', 'Temperature'],['100','100']
            ]);

            var options = {
                title: 'Temperature'
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }

    </script>
</head>

<body>
    <h1>Raspberry Pi Temperature Logger</h1>
    <hr>
    <!-- <form action="/cgi-bin/webgui.py" method="POST">
        Show the temperature logs for
        <select name="timeinterval">
            <option value="6">the last 6 hours</option>
            <option value="12">the last 12 hours</option>
            <option value="24" selected="selected">the last 24 hours</option>
        </select>
        <input type="submit" value="Display">
    </form> -->
    <h2>Temperature Chart</h2>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
    <hr>
    <h2>Minumum temperature&nbsp</h2>
    2016-02-01 16:00:45&nbsp&nbsp&nbsp77.07C
    <h2>Maximum temperature</h2>
    2016-02-02 01:46:34&nbsp&nbsp&nbsp79.858C
    <h2>Average temperature</h2>
    78.956C
    <hr>
</body>

</html>