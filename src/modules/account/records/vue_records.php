<?php

class VueRecords extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function welcome()
    {
?>
        <link rel="stylesheet" href="./src/css/acc_records.css">
        <div class="blockPage">
            <section class="side_navbar">
                <div id="profile_info">
                    <img src="./" alt="user pfp" id="user_pfp" height="64" />
                    <span id="profile_name">Prénom Nom</span>
                    <span id="profile_type">Profil étudiant</span>
                </div>
                <nav>
                    <ul>
                        <li><a href="#">Profil</a></li>
                        <li><a href="#">Mon dossier</a></li>
                        <li><a href="#">Suivi des demandes</a></li>
                        <li><a href="#">Messagerie</a></li>
                        <li><a href="#">Favoris</a></li>
                    </ul>
                </nav>
            </section>
            <section class="records_section">
                <div class="menu_container">
                    <div id="docs_general" class="menu_button" onclick="toggleMenu(this, null)">
                        <span class="menu_button_text">Mes documents</span><img class="menu_button_arrow" src="./assets/black_arrow-right.svg" alt="" />
                    </div>
                    <div class="dropdown-menu document_section"></div>
                </div>
                <div class="menu_container">
                    <div id="docs_situation" class="menu_button" onclick="toggleMenu(this, null)">
                        <span class="menu_button_text">Ma situation financière</span><img class="menu_button_arrow" src="./assets/black_arrow-right.svg" alt="" />
                    </div>
                    <div class="dropdown-menu document_section"></div>
                </div>
                <div class="menu_container">
                    <div id="docs_infos" class="menu_button" onclick="toggleMenu(this, null)">
                        <span class="menu_button_text">Informations complémentaires</span><img class="menu_button_arrow" src="./assets/black_arrow-right.svg" alt="" />
                    </div>
                    <div class="dropdown-menu document_section"></div>
                </div>
            </section>
        </div>
<?php
    }
}
