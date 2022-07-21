<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>Dessin Tato</title>
    <link rel="stylesheet" href="/css/dessintato.css">
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>

    <div class="heading">
        <div>
            <h1 class="ml3">Les Dessins de Tato</h1>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        </div>
        <div>
            <p class="subtitle">Sur cette page tu peux retrouver les dessins de ma copine "<span class="highlight">Tato</span>" !</p>
            <p class="subtitle">(<span style="font-style: italic;">PS : elle dessine que lorsqu'elle s'ennuie </span>😆)</p>
        </div>
        <div id="dessins">

        </div>
    </div>
    <br /><br /><br /><br /><br />
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script src="/js/ml3.js"></script>
    <?php
    $files = array();
    if ($handle = opendir('./dessintato')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $files[] = $entry;
            }
        }
        closedir($handle);
    }
    $json = json_encode($files);
    ?>
    <script>
        let data = <?php echo $json ?>;
        var div_dessins = document.getElementById('dessins');
        // -----------------------------------
        data.sort().forEach(dessin=>{
            // ---------------
            var h1 = document.createElement('h1')
            h1.innerText = " "+dessin.replace('.png','').replace('_',' ').replace('_',' ').replace('_',' ');
            var div1 = document.createElement('div');
            div1.classList.add('div_txt');
            div1.appendChild(h1);
            // ---------------
            var img = document.createElement('img');
            img.src = './dessintato/'+dessin;
            img.alt = dessin.replace('.png','').replace('_',' ').replace('_',' ').replace('_',' ');
            var div2 = document.createElement('div');
            div2.classList.add('div_img');
            div2.appendChild(img)
            // ---------------
            var div3 = document.createElement('div');
            div3.classList.add('dessin');
            div3.appendChild(div2);
            div3.appendChild(div1);
            // ---------------
            div_dessins.appendChild(div3);
        })
        // -----------------------------------
    </script>
</body>

</html>