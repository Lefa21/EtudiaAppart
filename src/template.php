<?php global $tampon; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EtudiAppart</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" rel="stylesheet">
    <script type="text/javascript" src="./src/scripts/main.js"></script>
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="./src/css/utilities.css">
</head>

<body>
    <header id="headerAnchor">
        <section class="banner">
            <nav class="navigation-bar">
                <div id="logoIcon">
                    <a href="./"><img src="./assets/site_icon_banner.png" alt="site Logo image" id="logoImg" height="80" /><span id="logoText">EtudiAppart</span></a>
                </div>
                <ul>
                    <li><a id='aboutButton' href="">A propos</a></li>
                    <li><a href="">Déposer une annonce</a></li>
                    <li><a id='loginButton' href="index.php?module=connexion&action=formulaireConnexion">Connexion</a></li>
                    <li><a id='registerButton' href="index.php?module=inscription&action=formulaireInscription">Inscription</a></li>

                    <li>
                        <div hidden id="myAccount" onmouseenter="toggleMenu(true)" onmouseleave="toggleMenu(false)" onclick="toggleMenu(null)">
                            <span>Mon compte</span><img id="dropdown_menu_arrow" src="./assets/arrow-right.svg" height='13' alt="" />
                            <div class="dropdown-menu">
                                <a href="#">Profil</a>
                                <a href="#">Mon dossier</a>
                                <a href="#">Mes demandes</a>
                                <a href="#">Messagerie</a>
                                <a href="#">Paramètres</a>
                                <a href="#">Déconnexion</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </section>
    </header>

    <main>
        <?php echo $tampon; ?>
    </main>

    <footer>
        <p>&copy; 2024 EtudiAppart. All rights reserved.</p>
    </footer>

</body>

</html>