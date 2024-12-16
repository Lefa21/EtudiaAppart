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
            <aside class="sidebar" role="complementary" aria-label="Navigation latérale">
                <div class="profile-header">
                    <img src="assets/photo_profil.png" alt="Photo de profil de Ben youssef Faël" class="profile-icon" width="49" height="49" />
                    <div class="profile-info">
                        <span class="profile-name">Ben youssef Faël</span>
                        <span class="profile-type">Profil propriétaire</span>
                    </div>
                </div>

                <nav class="nav-menu" role="navigation" aria-label="Menu principal">
                    <a href="#profile" class="nav-item">
                        <img src="assets/icon_profil.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Profil</span>
                    </a>
                    <a href="#dossier" class="nav-item">
                        <img src="assets/icon_documents_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Mon dossier</span>
                    </a>
                    <a href="#requests" class="nav-item active" aria-current="page">
                        <img src="assets/icon_follow_request.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Suivi des demandes</span>
                    </a>
                    <a href="#messages" class="nav-item">
                        <img src="assets/icon_messages_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Messagerie</span>
                    </a>
                    <a href="#favorites" class="nav-item">
                        <img src="assets/icon_wishlist.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Mes favoris</span>
                    </a>
                </nav>

                <button class="action-button primary" aria-label="Accéder aux paramètres">Paramètres</button>
            </aside>
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
