<?php
require __DIR__ . '/Minecraft/MinecraftPing.php';
require __DIR__ . '/Minecraft/MinecraftPingException.php';

use xPaw\MinecraftPing;
use xPaw\MinecraftPingException;

define('MQ_SERVER_ADDR', '192.168.1.66');
define('MQ_SERVER_PORT', 25565);
define('MQ_TIMEOUT', 1);

$Info = false;
$Query = null;

try {
    $Query = new MinecraftPing(MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT);

    $Info = $Query->Query();

    if ($Info === false) {
        $Query->Close();
        $Query->Connect();

        $Info = $Query->QueryOldPre17();
    }

    $MOTD = array();

    for ($i = 0; $i < count($Info['description']['extra']); $i++) {

        $temp_val = $Info['description']['extra'][$i];

        if ($temp_val['color'] != null) {
            array_push($MOTD, [$temp_val['color'], $temp_val['text']]);
        }
    }

    $Connected_Players = $Info['players']['online'];
    $MaxPlayers = $Info['players']['max'];
    $ServerIcon = $Info['favicon'];
} catch (MinecraftPingException $e) {
    $Exception = $e;
}

if ($Query !== null) {
    $Query->Close();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>Minecraft</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <div class="heading">
        <div id="serverinfo">
            <img width="64px;" height="64px;" alt='server icon' id='servericon' />
            <div id='serverinfo_player'>
                <p id="motd"></p>
                <p><span id="connected_players"></span> / <span id="maxplayers"></span> Players</span></p>
            </div>
        </div>
        <div class="embed-responsive embed-responsive-21by9" id="dynmap">
            <p>Un <span class="highlight">problème</span> est survenu, le <span class="highlight">serveur MC</span> n'est peut etre pas ouvert</p>
            <iframe class="embed-responsive-item" src="http://yweelon.fr:8123"></iframe>
        </div>
        <div id="mc_stats">
            <div id="map_avant">
                <h4>Voici à quoi ressembler la map avant les Builds</h4>
                <img alt="Map Minecraft Avant" src="./assets/map_mc_avant.png" />
            </div>
            <div>
                <h4>Seed de la map : <span id="seed" class="highlight">-59954170039369622</span></h4>
            </div>
        </div>
    </div>
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script>
        connexion_button(document.getElementById('connexion_button'), '<?php echo $_SESSION['username']; ?>');

        var span_connectedplayer = document.getElementById('connected_players')

        // checkplayer()
        renduplayer()

        function checkplayer() {
            setInterval(() => {
                renduplayer();
                console.log('tick');
            }, 5000)
        }

        function renduplayer() {
            var connectedplayer = '<?php echo $Connected_Players ?>';
            span_connectedplayer.innerText = connectedplayer;
            parseInt(connectedplayer) > 0 ? span_connectedplayer.style.color = '#55FF55' : span_connectedplayer.style.color = '#FF5555';
        }



        document.getElementById('maxplayers').innerText = '<?php echo $MaxPlayers ?>';
        document.getElementById('servericon').src = '<?php echo $ServerIcon ?>';

        var spanmotd = document.getElementById('motd')

        var motd_array = JSON.parse('<?php echo json_encode($MOTD); ?>');

        traitementMOTD(spanmotd, motd_array)
    </script>

</body>

</html>