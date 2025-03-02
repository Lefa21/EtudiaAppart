<?php
$isUserLoggedIn = isset($_SESSION['identifiant_utilisateur']);
$isStudent = isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "etudiant";
$isAdmin = isset($_SESSION["user_status"]) && $_SESSION["user_status"] === "admin";
?>

<header id="headerAnchor">
    <section class="banner">
        <nav class="navigation-bar">
            <div id="logoIcon">
                <a href="./"><img src="./assets/site_icon_banner.png" alt="site Logo image" id="logoImg" height="80" /><span id="logoText">EtudiAppart</span></a>
            </div>
            <ul>
                <li><a id='recherche_annonce' href="index.php?module=ad_search&action=recherche_annonce">Rechercher une annonce</a></li>
                <?php if (!$isStudent): ?>
                    <li><a href="index.php?module=creation_annonce&action=formulaireCreationAnnonce">Déposer une annonce</a></li>
                <?php endif; ?>
                <?php if (!$isUserLoggedIn): ?>
                    <li><a id='loginButton' href="index.php?module=connexion&action=formulaireConnexion">Connexion</a></li>
                    <li><a id='registerButton' href="index.php?module=inscription&action=formulaireInscription">Inscription</a></li>
                <?php else: ?>
                    <?php if ($isAdmin): ?>
                        <li><a href="index.php?module=reports&action=viewReports">Signalements</a></li>
                    <?php endif; ?>
                    <li>
                        <div id="myAccount" onmouseenter="toggleMenu(true)" onmouseleave="toggleMenu(false)" onclick="toggleMenu(null)">
                            <span>Mon compte</span><img id="dropdown_menu_arrow" src="./assets/white_arrow-right.svg" height='13' alt="" />
                            <div class="dropdown-menu">
                                <a href="index.php?module=monProfil&action=Profil">Profil</a>
                                <a href="index.php?module=records&action=monDossier">Mon dossier</a>
                                <?php if ($isStudent): ?>
                                    <a href="index.php?module=student_requests&action=follow-up_student_requests">Mes demandes</a>
                                <?php endif; ?>
                                <a href="index.php?module=messagerie&action=messagerie">Messagerie</a>
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