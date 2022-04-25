<?php
echo '
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
    <li class="nav-item active">
        <a class="nav-link" href="CV.php">Mon CV</a>
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
            <a class="dropdown-item" href="GT.php">Guardian Tale Home</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="GT_herosheet.php">Hero Sheet</a>
            <a class="dropdown-item" href="GT_addhero.php">Add Hero</a>
            <a class="dropdown-item" href="GT_updatehero.php">Update Hero</a>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Autres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="minecraft.php">Minecraft</a>
        </div>
    </div>
</ul>
<button id="connexion_button" class="btn login-btn btn-outline-accent my-2 my-sm-0" style="font-size: 10px !important;font-family: poppins !important;">Connexion</button>
</div>'
?>