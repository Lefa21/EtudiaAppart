<?php

class VueRecords extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function monDossier($userInfo, $documents)
    {
?>
        <link rel="stylesheet" href="./src/css/acc_records.css">
        <link rel="stylesheet" href="./src/css/menu_my_account.css">
        <script type="text/javascript" src="./src/scripts/records.js"></script>

        <div class="blockPage">
            <aside class="sidebar" role="complementary" aria-label="Navigation latérale">
                <div class="user-info">
                    <img src="assets/photo_profil.png" alt="Photo de profil de l'utilisateur" class="profile-icon" width="49" height="49" />
                    <div class="user-details">
                        <span class="user-name"><?= $userInfo['first_name'] . ' ' . $userInfo['last_name'] ?></span>
                        <span class="user-role"><?php if (isset($userInfo['profile_status'])) {
                                                    echo "Profil " . $userInfo['profile_status'];
                                                } ?></span>
                    </div>
                </div>

                <nav class="nav-menu" role="navigation" aria-label="Menu principal">
                    <a href="index.php?module=monProfil&action=Profil" class="nav-item">
                        <img src="assets/icon_profil.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Profil</span>
                    </a>
                    <a href="index.php?module=records&action=monDossier" class="nav-item active">
                        <img src="assets/icon_documents_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Mon dossier</span>
                    </a>
                    <a href="index.php?module=owner_requests&action=follow-up_owner_requests" class="nav-item" aria-current="page">
                        <img src="assets/icon_follow_request.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Suivi des demandes</span>
                    </a>
                    <a href="index.php?module=owner_requests&action=manage_application" class="nav-item">
                        <img src="assets/gerer_demande.svg" alt="" class="nav-item-icon">
                        <span>Gérer mes demandes</span>
                    </a>
                    <a href="#messages" class="nav-item">
                        <img src="assets/icon_messages_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Messagerie</span>
                    </a>
                    <a href="#favorites" class="nav-item">
                        <img src="assets/icon_wishlist.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Mes favoris</span>
                    </a>
                    <button type="button" class="settings-button" aria-label="Accéder aux paramètres" onclick="window.location.replace('index.php?module=monProfil&action=Profil')">Paramètres</button>
                </nav>
            </aside>
            <section class="records_section">
                <div class="menu_container">
                    <div id="docs_general" class="menu_button" onclick="toggleMenu(this, null)">
                        <span class="menu_button_text">Mes documents</span><img class="menu_button_arrow" src="./assets/black_arrow-right.svg" alt="" />
                    </div>
                    <div class="dropdown-menu document_section">
                        <form class="url_form" action="" method="POST">
                            <section id="url_records" class="url_section">
                                <div class="url_info">
                                    <span>Lien vers votre dossier numérique DossierFacile<br />
                                        <a class="description" href="https://aide.dossierfacile.logement.gouv.fr/fr/article/comment-visualiser-et-partager-son-dossier-valide-1orckmm">Comment visualiser et partager son dossier ?</a></span>
                                    <span class="tooltip">&#9432;
                                        <p class="tooltiptext">
                                            Exemple de lien: https://www.VotreNom.dossierfacile.fr
                                        </p>
                                    </span>
                                </div>
                                <div class="url_input">
                                    <?php
                                    if (isset($_SESSION['userId']) && isset($documents)) {
                                        $urlFound = false;

                                        foreach ($documents as $item) {
                                            if ($item['file_name'] === 'url_dossierFacile') {
                                                // Print the input and button
                                    ?>
                                                <input type="text" name="url_dossierFacile"
                                                    value="<?php echo htmlspecialchars($item['description']); ?>"
                                                    placeholder="Insérez l'URL" />
                                                <button type="button" class="btn-delete" onclick="deleteFile(this)" data-docname="url_dossierFacile">&#10006;</button>
                                            <?php
                                                $urlFound = true;
                                                break;
                                            }
                                        }

                                        // If no matching file_name is found, print only the input
                                        if (!$urlFound) {
                                            ?>
                                            <input type="text" name="url_dossierFacile" placeholder="Insérez l'URL" />
                                        <?php
                                        }
                                    } else {
                                        // Print the input if session or documents array is not set
                                        ?>
                                        <input type="text" name="url_dossierFacile" placeholder="Insérez l'URL" />
                                    <?php
                                    }
                                    ?>
                                </div>
                            </section>
                            <p id="wrong_url" hidden class="description">Le lien doit avoir la forme: https://www.VotreNom.dossierfacile.fr</p>

                            <button id="save_urls" class="save_button" type="button" onclick="updateUserInfos(this)">Sauvegarder</button>
                        </form>
                    </div>
                </div>
                <div class=" menu_container">
                    <div id="docs_infos" class="menu_button" onclick="toggleMenu(this, null)">
                        <span class="menu_button_text">Informations complémentaires</span><img class="menu_button_arrow" src="./assets/black_arrow-right.svg" alt="" />
                    </div>
                    <div class="dropdown-menu document_section">
                        <form action="index.php?module=records&action=updateUserDocument" method="POST">
                            <section class="info_section">
                                <span class="info_section_text">Êtes-vous étudiant boursier ?</span>
                                <div class="info_section_zone">
                                    <input type="radio" id="scholarship-yes" name="scholarship" value="yes" />
                                    <label for="scholarship-yes">Oui</label>
                                    <input type="radio" id="scholarship-no" name="scholarship" value="no" />
                                    <label for="scholarship-no">Non</label>
                                </div>
                            </section>
                            <section class="info_section">
                                <span class="info_section_text">Quel est votre status ?</span>
                                <div class="info_section_zone">
                                    <input type="radio" id="status-owner" name="status" value="owner" />
                                    <label for="status-owner">Propriétaire</label>
                                    <input type="radio" id="status-tenant" name="status" value="tenant" />
                                    <label for="status-tenant">Locataire</label>
                                </div>
                            </section>
                            <section class="info_section">
                                <span class="info_section_text">Date de naissance</span>
                                <div class="info_section_zone">
                                    <input type="date" id="birthdate" name="birthdate" value="birthdate" />
                                </div>
                            </section>
                            <section class="info_section">
                                <span class="info_section_text">Nationalité</span>
                                <div class="info_section_zone">
                                    <?php
                                    require_once __DIR__ . '/nationalities.php';
                                    echo nationalities();
                                    ?>
                                </div>
                            </section>
                            <section class="info_section">
                                <span class="info_section_text">Présentation</span>
                                <div class="info_section_zone">
                                    <textarea id="presentation"></textarea>
                                </div>
                            </section>
                            <button id="save_docs-more_information" class="save_button" type="button" onclick="updateUserInfos(this)">Sauvegarder</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
<?php
    }
}
