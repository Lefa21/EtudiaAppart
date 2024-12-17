<?php

require_once __DIR__ . '/../../vue_generique.php';

class VueCreationAnnonce extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function etapesCreation()
    {
        ?>
            <link rel="stylesheet" type="text/css" href="./src/css/style_creation_annonce.css">
        <div id="bodycontainer">
        <div id="menu_creation_annonce">
            <div id="bouton_profil">
                <div id="profil_pic">PP</div>
                <div id="tekst_bouton_profil">
                    <span id="nom_compte">Fael Ben Youssef</span>
                    <span id="type_profil">Profil Propriétaire</span>
                </div>
            </div>
            <div id="selecteur_etape_creation">
                <a class="etape_creation" href="index.php?module=creation_annonce&action=formulaireCreationAnnonce" id="info_generales">
                    <svg id="icon_info_generale" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 25" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M20.5459 7.1602L14.0372 0.6515C13.8627 0.47717 13.626 0.379335 13.3794 0.379529H2.22159C1.19454 0.379529 0.361959 1.21211 0.361959 2.23916V22.6951C0.361959 23.7221 1.19454 24.5547 2.22159 24.5547H18.9582C19.9853 24.5547 20.8179 23.7221 20.8179 22.6951V7.81804C20.8181 7.57136 20.7202 7.33472 20.5459 7.1602ZM14.3092 3.55368L17.6437 6.88823H14.3092V3.55368ZM18.9582 22.6951H2.22159V2.23916H12.4495V7.81804C12.4495 8.33156 12.8658 8.74785 13.3794 8.74785H18.9582V22.6951ZM15.239 13.3969C15.239 13.9104 14.8227 14.3267 14.3092 14.3267H6.87066C6.35713 14.3267 5.94084 13.9104 5.94084 13.3969C5.94084 12.8834 6.35713 12.4671 6.87066 12.4671H14.3092C14.8227 12.4671 15.239 12.8834 15.239 13.3969ZM15.239 17.1162C15.239 17.6297 14.8227 18.046 14.3092 18.046H6.87066C6.35713 18.046 5.94084 17.6297 5.94084 17.1162C5.94084 16.6027 6.35713 16.1864 6.87066 16.1864H14.3092C14.8227 16.1864 15.239 16.6027 15.239 17.1162Z" fill="black"/></svg>
                    <span class="text_selecteur" id="text_info_generale">
                            Informations générales
                        </span>
                </a>
                <a class="etape_creation" href="index.php?module=creation_annonce&action=photosCreationAnnonce" id="photos">
                    <svg class="icon" id="icon_photo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25" fill="none"><path d="M14.7288 18.08L12.6073 15.9762C11.6322 15.0093 11.1447 14.5258 10.5834 14.3445C10.0896 14.1849 9.55818 14.1849 9.06434 14.3445C8.50305 14.5258 8.01551 15.0093 7.04043 15.9762L2.10062 20.9514M14.7288 18.08L15.1504 17.6617C16.146 16.6745 16.6437 16.1809 17.2149 16.0008C17.7172 15.8423 18.2569 15.8484 18.7554 16.0184C19.3222 16.2117 19.8085 16.7166 20.7811 17.7265L21.8135 18.7747M14.7288 18.08L19.6147 23.0522M2.10062 20.9514C2.13856 21.2731 2.20427 21.5257 2.31811 21.7492C2.55497 22.214 2.93293 22.592 3.39779 22.8288C3.92628 23.0981 4.6181 23.0981 6.00177 23.0981H17.8606C18.6281 23.0981 19.1827 23.0981 19.6147 23.0522M2.10062 20.9514C2.04883 20.5122 2.04883 19.9439 2.04883 19.1452V7.28638C2.04883 5.90273 2.04883 5.21089 2.31811 4.6824C2.55497 4.21753 2.93293 3.83958 3.39779 3.60272C3.92628 3.33344 4.6181 3.33344 6.00177 3.33344H10.6959M19.6147 23.0522C19.9615 23.0153 20.2293 22.9488 20.4646 22.8288C20.9294 22.592 21.3074 22.214 21.5442 21.7492C21.8135 21.2207 21.8135 20.5289 21.8135 19.1452V14.4511M19.3429 9.50991V5.80403M19.3429 5.80403V2.09814M19.3429 5.80403H23.0488M19.3429 5.80403H15.6371" stroke="black" stroke-width="2.67" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <span class="text_selecteur" id="text_photo">
                            Photos
                        </span>
                </a>
                <a class="etape_creation" href="index.php?module=creation_annonce&action=descriptionCreationAnnonce" id="description">
                    <svg id="icon_description" class="icon" xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M22.7477 8.79938V10.659C22.7477 11.1725 22.3314 11.5888 21.8179 11.5888H1.36196C0.848437 11.5888 0.432146 11.1725 0.432146 10.659V8.79938C0.432146 8.28586 0.848437 7.86957 1.36196 7.86957H21.8179C22.3314 7.86957 22.7477 8.28586 22.7477 8.79938ZM21.8179 15.3081H1.36196C0.848437 15.3081 0.432146 15.7244 0.432146 16.2379V18.0975C0.432146 18.611 0.848437 19.0273 1.36196 19.0273H21.8179C22.3314 19.0273 22.7477 18.611 22.7477 18.0975V16.2379C22.7477 15.7244 22.3314 15.3081 21.8179 15.3081ZM21.8179 0.431056H1.36196C0.848437 0.431056 0.432146 0.847347 0.432146 1.36087V3.2205C0.432146 3.73402 0.848437 4.15031 1.36196 4.15031H21.8179C22.3314 4.15031 22.7477 3.73402 22.7477 3.2205V1.36087C22.7477 0.847347 22.3314 0.431056 21.8179 0.431056Z" fill="black"/></svg>
                    <span class="text_selecteur" id="text_description">
                            Description
                        </span>
                </a>

            </div>
        </div>

        <?php
    }
    public function formulaireCreationAnnonce(){
        ?>
        <script type="text/javascript">
            document.getElementById('suivant').addEventListener('click', function() {
                const titre = document.querySelector('[name="titre_form"]').value;
                const type = document.querySelector('[name="type_logement_form"]').value;
                const prix = document.querySelector('[name="prix_form"]').value;
                const superficie = document.querySelector('[name="superficie_form"]').value;
                const nb_pieces = document.querySelector('[name="nb_pieces_form"]').value;
                const debut = document.querySelector('[name="debut_form"]').value;
                const fin = document.querySelector('[name="fin_form"]').value;
                const adresse = document.querySelector('[name="adresse_form"]').value;
                const ville = document.querySelector('[name="ville_form"]').value;
                const cp = document.querySelector('[name="cp_form"]').value;
                const region = document.querySelector('[name="region_form"]').value;

                if (titre) {
                    localStorage.setItem('titre_form', titre);
                } else {
                    alert('Veuillez remplir le champ Titre.');
                }
                if (type) {
                    localStorage.setItem('type_logement_form', type);
                } else {
                    alert('Veuillez remplir le champ Type de logement.');
                }
                if (prix) {
                    localStorage.setItem('prix_form', prix);
                } else {
                    alert('Veuillez remplir le champ Prix.');
                }
                if (superficie) {
                    localStorage.setItem('superficie_form', superficie);
                } else {
                    alert('Veuillez remplir le champ Superficie.');
                }
                if (nb_pieces) {
                    localStorage.setItem('nb_pieces_form', nb_pieces);
                } else {
                    alert('Veuillez remplir le champ Nombre de pièces.');
                }
                if (debut) {
                    localStorage.setItem('debut_form', debut);
                } else {
                    alert('Veuillez remplir le champ Début.');
                }
                if (fin) {
                    localStorage.setItem('fin_form', fin);
                } else {
                    alert('Veuillez remplir le champ Fin.');
                }
                if (adresse) {
                    localStorage.setItem('adresse_form', adresse);
                } else {
                    alert('Veuillez remplir le champ Adresse.');
                }
                if (ville) {
                    localStorage.setItem('ville_form', ville);
                } else {
                    alert('Veuillez remplir le champ Ville.');
                }
                if (cp) {
                    localStorage.setItem('cp_form', cp);
                } else {
                    alert('Veuillez remplir le champ Code postal.');
                }
                if (region) {
                    localStorage.setItem('region_form', region);
                } else {
                    alert('Veuillez remplir le champ Région.');
                }
            });
        </script>
        <form id="form_infos" action="index.php?module=creation_annonce&action=ajoutInfos" method="POST">
            <link rel="stylesheet" type="text/css" href="../../css/style_creation_annonce.css">
            <span id=text_titre_form>
                <a id="titre_form">Informations générales</a>
                <a id="ss_titre_form">Modifier les informations générales de votre annonce</a>
            </span>

            <div id="ens_champs_titre">
                <div class="champs_titre" id="titre_annonce">
                    Titre
                    <input class="champs" id="titre" name="titre_form" placeholder="Titre" aria-label="titre_annonce" required>
                </div>
                <div class="champs_titre" id="type_logement">
                    Type de logement
                    <div id="type">
                        <select class="champs" id="input_type" name="type_logement_form" aria-label="type_logement" required>
                            <option name="collocation">Collocation</option>
                            <option name="appart">Appartement</option>
                            <option name="chambre">Chambre</option>
                            <option name="maison">Maison</option>
                            <option name="aide_personne">Logement contre aide à la personne</option>
                            <option name="r_u">Résidence étudiante</option>
                        </select>
                        <div id="meuble">
                            <input type="checkbox" id="check_meuble" name="meuble">
                            <span id>Meublé</span>
                        </div>
                    </div>
                </div>
                <div class="champs_titre" >
                    Prix
                    <input id="prix" type="number" class="champs" placeholder="Prix" name="prix_form" aria-label="prix" required>
                </div>
                <div class="champs_titre">
                    Superficie
                    <input class="champs" id="superficie" type="number" placeholder="Superficie" name="superficie_form" aria-label="superficie" required>
                </div>
                <div class="champs_titre">
                    Nombre de pièces
                    <input class="champs" id="input_nb" type="number" placeholder="Nombre de pièces" name="nb_pieces_form" aria-label="nb_pièces" required>
                </div>
                <div class="champs_titre" id="duree">
                    Durée de disponibilité
                    <div id="debut_fin" >
                        <input type="date" class="champs debut_fin" id="debut" placeholder="Début" name="debut_form" aria-label="debut" required>
                        <input type="date" class="champs debut_fin" id="fin" placeholder="Fin" name="fin_form" aria-label="fin" required>
                    </div>
                </div>
                <div  class="champs_titre" id="adresse">
                    Localisation
                    <input class="champs" id="input_adresse" placeholder="adresse" name="adresse_form" aria-label="adresse" required>
                </div>
                <div class="rest_loc">
                    <div class="champs_titre" id="city">
                        Ville
                        <input class="champs" id="input_ville" placeholder="Ville" name="ville_form" aria-label="ville" required>
                    </div>
                    <div class="champs_titre" id="code_postal">
                        Code postal
                        <input class="champs" id="input_cp" placeholder="Code postal" name="cp_form" aria-label="cp" required>
                    </div>
                    <div class="champs_titre" id="region">
                        Région
                        <input class="champs" id="input_region" placeholder="Region" name="region_form" aria-label="region" required>
                    </div>
                </div>

                <a class="suivant" href="index.php?module=creation_annonce&action=photosCreationAnnonce" aria-label="save">Suivant</a>

            </div>
        </form>
        </div>
        <?php
    }
    public function photosCreationAnnonce(){
        ?>
        <form id="form_photos">
            <link rel="stylesheet" type="text/css" href="../../css/style_creation_annonce.css">
            <span id=text_titre_form>
                <a id="titre_form">Photos</a>
                <a id="ss_titre_form">Ajouter des photos</a>
            </span>
            <input class="champs" type="file" name="input_photo1" aria-label="photo1">
            <div id="galerie">
                <div class="logo_img">
                    <svg class="logo" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.2647 15.9377L12.5473 14.2346C11.758 13.4519 11.3633 13.0605 10.9089 12.9137C10.5092 12.7845 10.079 12.7845 9.67922 12.9137C9.22485 13.0605 8.83017 13.4519 8.04082 14.2346L4.04193 18.2622M14.2647 15.9377L14.606 15.5991C15.412 14.7999 15.8149 14.4003 16.2773 14.2545C16.6839 14.1262 17.1208 14.1312 17.5244 14.2688C17.9832 14.4253 18.3769 14.834 19.1642 15.6515L20 16.5001M14.2647 15.9377L18.22 19.9628M18.22 19.9628C17.8703 20 17.4213 20 16.8 20H7.2C6.07989 20 5.51984 20 5.09202 19.782C4.7157 19.5903 4.40973 19.2843 4.21799 18.908C4.12583 18.7271 4.07264 18.5226 4.04193 18.2622M18.22 19.9628C18.5007 19.9329 18.7175 19.8791 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V13M11 4H7.2C6.07989 4 5.51984 4 5.09202 4.21799C4.7157 4.40973 4.40973 4.71569 4.21799 5.09202C4 5.51984 4 6.0799 4 7.2V16.8C4 17.4466 4 17.9066 4.04193 18.2622M18 9V6M18 6V3M18 6H21M18 6H15" stroke="#041A8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>


            </div>
            <a class="suivant" href="index.php?module=creation_annonce&action=descriptionCreationAnnonce" aria-label="save">Suivant</a>
            </div>
        </form>
        </div>
        <?php
    }
    public function descriptionCreationAnnonce(){
        ?>

        <link rel="stylesheet" type="text/css" href="../../css/style_creation_annonce.css">
        <div id="form_description">
                <span id=text_titre_form>
                    <a id="titre_form">Description de l'annonce</a>
                    <a id="ss_titre_form">Ecrivez la description de votre annonce</a>
                </span>
            <form>
                <textarea id="champs_description" name="description" placeholder="Description" aria-label="description"></textarea>
                <button class="suivant" type="submit">Envoyer</button>
            </form>
        </div>
        </div>
        <?php
    }
}

