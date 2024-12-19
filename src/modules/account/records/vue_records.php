<?php

class VueRecords extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function monDossier()
    {
?>
        <link rel="stylesheet" href="./src/css/acc_records.css">
        <link rel="stylesheet" href="./src/css/menu_my_account.css">

        <div class="blockPage">
        <?php
            include "./src/menu_my_account.php";
        ?>
            <section class="records_section">
                <div class="menu_container">
                    <div id="docs_general" class="menu_button" onclick="toggleMenu(this, null)">
                        <span class="menu_button_text">Mes documents</span><img class="menu_button_arrow" src="./assets/black_arrow-right.svg" alt="" />
                    </div>
                    <form>
                        <div class="dropdown-menu document_section">
                            <section id="dropfile_cni" class="dropfile_section">
                                <div class="dropfile_info">
                                    <span>Carte d'identité / Passeport</span><span class="more_info">&#9432;</span>
                                </div>
                                <div class="dropfile_file">
                                    <input type="file" id="cni-file" accept=".pdf" />
                                </div>
                            </section>
                            <section id="dropfile-school_certificate" class="dropfile_section">
                                <div class="dropfile_info">
                                    <span>Justificatif de scolarité</span><span class="more_info">&#9432;</span>
                                </div>
                                <div class="dropfile_file">
                                    <input type="file" id="school_certificate-file" accept=".pdf" />
                                </div>
                            </section>
                            <section id="dropfile-scholarship_proof" class="dropfile_section">
                                <div class="dropfile_info">
                                    <span>Attestation de bourse</span><span class="more_info">&#9432;</span>
                                    <p>* Étudiants boursiers seulement</p>
                                </div>
                                <div class="dropfile_file">
                                    <input type="file" id="scholarship_proof-file" accept=".pdf" />
                                </div>
                            </section>
                            <section id="dropfile-visa" class="dropfile_section">
                                <div class="dropfile_info">
                                    <span>Visa / Titre de séjour</span><span class="more_info">&#9432;</span>
                                    <p>* Étudiants internationnaux seulement</p>
                                </div>
                                <div class="dropfile_file">
                                    <input type="file" id="visa-file" accept=".pdf" />
                                </div>
                            </section>
                            <button id="save_docs-dropfile" class="save_button" type="submit">Sauvegarder</button>
                    </form>
                </div>
        </div>
        <div class="menu_container">
            <div id="docs_situation" class="menu_button" onclick="toggleMenu(this, null)">
                <span class="menu_button_text">Ma situation financière</span><img class="menu_button_arrow" src="./assets/black_arrow-right.svg" alt="" />
            </div>
            <div class="dropdown-menu document_section">
                <button id="save_docs-eco_situation" class="save_button" type="submit">Sauvegarder</button>
            </div>
        </div>
        <div class="menu_container">
            <div id="docs_infos" class="menu_button" onclick="toggleMenu(this, null)">
                <span class="menu_button_text">Informations complémentaires</span><img class="menu_button_arrow" src="./assets/black_arrow-right.svg" alt="" />
            </div>
            <div class="dropdown-menu document_section">
                <form>
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
                        <span class="info_section_text">Nationnalité</span>
                        <div class="info_section_zone">
                            <input type="text" id="nationality" name="nationality" placeholder="Nationality" size="16" />
                        </div>
                    </section>
                    <section class="info_section">
                        <span class="info_section_text">Présentation</span>
                        <div class="info_section_zone relative">
                            <textarea name="presentation" rows="5" cols="30"></textarea>
                        </div>
                    </section>
                </form>
                <button id="save_docs-more_information" class="save_button" type="submit">Sauvegarder</button>
            </div>
        </div>
        </section>
        </div>
<?php
    }
}
