<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>Guardian Tale</title>
</head>

<body>
<nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <!---->
    <div class="heading">
        <div>
            <img src="/assets/GT_pp.png" alt="GT PP" style="width: 128px;height: 128px;" />
        </div>
        <div>
            <h1 class="display-5 title">Guardian Tale</h1>
            <p class="subtitle">Guardian Tale est un jeu mobile conçu par Kakao Games</p>
            <br />
            <p class="subtitle">C'est un MMORPG / gacha jouable largement en F2P, qui as un bon lore et de bonnes réferences POP</p>
            <br />
            <p class="subtitle">Ps : je ne possède aucun élement graphique, tout appartient à KaKao Games</p>
        </div>
    </div>
    <br /><br /><br />
    <div class="features" style="background:none !important">
        <div class="cards" style="background-color:none">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <a href="./GT_herosheet.php" class="btn btn-primary">Hero Sheet</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <a href="./GT_addhero.php" class="btn btn-primary">Add Hero</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <a href="./GT_updatehero.php" class="btn btn-primary">Update Hero</a>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br /><br /><br />
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script src="./js/customjs.js"></script>
</body>

</html>