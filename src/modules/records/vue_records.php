<?php

class VueRecords extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function monDossier($documents)
    {
        if (isset($_SESSION['userId']) && isset($documents)) {
            $values = [];
            foreach ($documents as $item) {
                switch ($item['file_name']) {
                    case 'url_dossierFacile':
                        $values['url_dossierFacile'] = trim(htmlspecialchars($item['description']));
                        $urlFound = true;
                        break;

                    case 'birthdate':
                        $values['birthdate'] = $item['description'];
                        break;

                    case 'nationality':
                        $values['nationality'] = $item['description'];
                        break;

                    case 'presentation':
                        $values['presentation'] = trim(htmlspecialchars($item['description']));
                        break;

                    case 'scholarship':
                        if ($item['description'] == 'yes') $values['scholarship'] = true;
                        else $values['scholarship'] = false;
                        break;

                    case 'status':
                        if ($item['description'] == 'owner') $values['status'] = true;
                        else $values['status'] = false;
                        break;

                    default:
                        # code...
                        break;
                }
            }
        }
?>
        <link rel="stylesheet" href="./src/css/records.css">
        <link rel="stylesheet" href="./src/css/menu_my_account.css">
        <script type="text/javascript" src="./src/scripts/records.js"></script>

        <div class="blockPage">
            <?php
            include "./src/menu_my_account.php";
            ?>
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
                                    <?php if (isset($values['scholarship']) && $values['scholarship'] == 'yes') { ?>
                                        <input type="radio" id="scholarship-yes" name="scholarship" value="yes" checked />
                                        <label for="scholarship-yes">Oui</label>
                                        <input type="radio" id="scholarship-no" name="scholarship" value="no" />
                                        <label for="scholarship-no">Non</label>
                                    <?php } else { ?>
                                        <input type="radio" id="scholarship-yes" name="scholarship" value="yes" />
                                        <label for="scholarship-yes">Oui</label>
                                        <input type="radio" id="scholarship-no" name="scholarship" value="no" checked />
                                        <label for="scholarship-no">Non</label>
                                    <?php } ?>
                                </div>
                            </section>
                            <section class="info_section">
                                <span class="info_section_text">Quel est votre status ?</span>
                                <div class="info_section_zone">
                                    <?php if (isset($values['status']) && $values['status'] == 'owner') {  ?>
                                        <input type="radio" id="status-owner" name="status" value="owner" checked />
                                        <label for="status-owner">Propriétaire</label>
                                        <input type="radio" id="status-tenant" name="status" value="tenant" />
                                        <label for="status-tenant">Locataire</label>
                                    <?php } else { ?>
                                        <input type="radio" id="status-owner" name="status" value="owner" />
                                        <label for="status-owner">Propriétaire</label>
                                        <input type="radio" id="status-tenant" name="status" value="tenant" checked />
                                        <label for="status-tenant">Locataire</label>
                                    <?php } ?>
                                </div>
                            </section>
                            <section class="info_section">
                                <span class="info_section_text">Date de naissance</span>
                                <div class="info_section_zone">
                                    <?php if (!isset($values['birthdate']) || empty($values['birthdate'])) {
                                        $values['birthdate'] = '';
                                    }
                                    ?>
                                    <input type="date" id="birthdate" name="birthdate" value="<?= $values['birthdate'] ?>" />
                                </div>
                            </section>
                            <section class="info_section">
                                <span class="info_section_text">Nationalité</span>
                                <div class="info_section_zone">
                                    <?php
                                    require_once __DIR__ . '/nationalities.php';
                                    if (isset($values['nationality']))
                                        echo nationalities($values['nationality']);
                                    else echo nationalities('');
                                    ?>
                                </div>
                            </section>
                            <section class="info_section">
                                <span class="info_section_text">Présentation</span>
                                <div class="info_section_zone">
                                    <textarea id="presentation" name="presentation"><?php if (isset($values['presentation'])) echo $values['presentation']; ?></textarea>
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
