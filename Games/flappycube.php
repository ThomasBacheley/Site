<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr" style="scroll-behavior: smooth !important;">

<head>
    <?php include '../components/head.html'; ?>
    <title>Flappy Cube</title>
    <link rel="stylesheet" href="./flappycube.css">
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include '../components/navbar.html'; ?>
    </nav>
    <div class="heading">
        <div id="flappycube">
            <div id="cvs">

            </div>
            <button onmousedown="startGame()">START</button>
            <button onmousedown="accelerate(-0.2)" onmouseup="accelerate(0.05)">ACCELERATE</button>
            <button onmousedown="startGame()">RESTART</button>
        </div>
    </div>
    <br /><br /><br /><br /><br /><br /><br /><br />
    <footer>
        <?php include '../components/footer.html'; ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script src="./js/customjs.js"></script>
    <script src="./flappycube.js"></script>

</body>

</html>