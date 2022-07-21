<?php
session_start();

// connexion à la base de données
$db_username = 'site';
$db_password = 'ESeoejBGEx[Xm23u';
$db_name     = 'lol';
$db_host     = 'localhost';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name)
    or die('could not connect to database');
$query = mysqli_query($conn, "SELECT * FROM champions ORDER BY prix ASC");

$champs_array = [];
while ($row = mysqli_fetch_assoc($query)) {
    array_push($champs_array, $row);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include './components/head.html'; ?>
    <title>League Of Legend</title>
</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg bg-transparent">
        <?php include './components/navbar.html'; ?>
    </nav>
    <!---->
    <button onclick="topFunction()" id="topbtn" title="Go to top">↑</button>
    <!---->
    <div class="heading">
        <div class="input-group mb-3">
            <input type="text" id="champsname_input" oninput="tapeinput(this.value)" class="form-control" placeholder="Champion's name" aria-label="Champion's name" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" onclick="research_champ()">Research</button>
            </div>
        </div>
        <div class="d-flex flex-row flex-wrap justify-content-around" id="champslist">

        </div>
    </div>
    <footer>
        <?php include './components/footer.html'; ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/now-ui-kit.min.js"></script>
    <script src="./js/customjs.js"></script>
</body>
<script type="text/javascript">
    mybutton = document.getElementById("topbtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }


    var champs_array = JSON.parse('<?php echo json_encode($champs_array); ?>');

    var div_champslist = document.getElementById('champslist');

    loadallchamp()

    function loadallchamp(array = champs_array) {
        array.forEach(champion => {
            createCard(champion)
        })
    }

    function tapeinput(val) {
        div_champslist.innerHTML = ''
        if (val == '') {
            loadallchamp()
        } else {
            let newchamps_array = champs_array.filter(el => (el.nom).toLowerCase().startsWith(val.toLowerCase()));
            loadallchamp(newchamps_array)
        }
    }

    function createCard(champ) {
        var img = document.createElement('img');
        img.classList.add('card-img-top');
        img.alt = champ.nom;
        img.src = champ.img;
        img.style.borderRadius = '5%';

        var cardtitle = document.createElement('h4');
        var cardtext = document.createElement('div');

        cardtitle.classList.add('card-title', 'bg-secondary');
        cardtext.classList.add('card-text', 'bg-secondary');

        cardtitle.innerText = champ.nom;
        cardtext.innerText = champ.prix + ' (' + (champ.prix / 100) * 60 + ') EB';

        var card = document.createElement('div');

        card.classList.add('card-header', 'bg-secondary');
        card.style.margin = '10px';
        card.style.borderRadius = '5%';

        card.appendChild(img);
        card.appendChild(cardtitle);
        card.appendChild(cardtext);
        div_champslist.appendChild(card);
    }
</script>

</html>