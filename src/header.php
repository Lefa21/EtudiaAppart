<?php
$isUserLoggedIn = isset($_SESSION['identifiant_utilisateur']);
?>

<header id="headerAnchor">
    <section class="banner">
        <nav class="navigation-bar">
            <div id="logoIcon">
                <a href="./"><img src="./assets/site_icon_banner.png" alt="site Logo image" id="logoImg" height="80" /><span id="logoText">EtudiAppart</span></a>
            </div>
            <ul>
                <li><a id='aboutButton' href="">A propos</a></li>
                <li><a href="">Déposer une annonce</a></li>
                <?php if (!$isUserLoggedIn): ?>
                    <li><a id='loginButton' href="index.php?module=connexion&action=formulaireConnexion">Connexion</a></li>
                    <li><a id='registerButton' href="index.php?module=inscription&action=formulaireInscription">Inscription</a></li>
                <?php else: ?>
                    <li>
                        <div id="myAccount" onmouseenter="toggleMenu(true)" onmouseleave="toggleMenu(false)" onclick="toggleMenu(null)">
                            <span>Mon compte</span><img id="dropdown_menu_arrow" src="./assets/arrow-right.svg" height='13' alt="" />
                            <div class="dropdown-menu">
                                <a href="#">Profil</a>
                                <a href="#">Mon dossier</a>
                                <a href="#">Mes demandes</a>
                                <a href="#">Messagerie</a>
                                <a href="#">Paramètres</a>
                                <a href="index.php?module=connexion&action=deconnexion">Déconnexion</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </section>
</header>
