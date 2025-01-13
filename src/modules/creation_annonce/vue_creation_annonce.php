<?php

require_once __DIR__ . '/../../vue_generique.php';

class VueCreationAnnonce extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function formulaireCreationAnnonce()
    {
        ?>

        <link rel="stylesheet" href="./src/css/style_creation_annonce.css">
        <link rel="stylesheet" href="./src/css/menu_my_account.css">
        <script type="text/javascript" src="./src/scripts/navigation_create_ad.js"></script>

        <main class="owner-depot_annonce" role="main">
            <div class="main-content-depot_annonce">

                <aside class="sidebar">
                    <div class="user-info">
                        <div class="profile-image-container">
                            <img src="assets/photo_profil.png" alt="Profile photo" class="user-avatar">
                            <label for="profile-image" class="image-upload-label" aria-label="Change profile picture">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 8.66667V12.6667C12 13.0203 11.8595 13.3594 11.6095 13.6095C11.3594 13.8595 11.0203 14 10.6667 14H3.33333C2.97971 14 2.64057 13.8595 2.39052 13.6095C2.14048 13.3594 2 13.0203 2 12.6667V5.33333C2 4.97971 2.14048 4.64057 2.39052 4.39052C2.64057 4.14048 2.97971 4 3.33333 4H7.33333" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10 2H14V6" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.66666 9.33333L14 2" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </label>
                            <input type="file" id="profile-image" class="image-upload-input" accept="image/*" aria-label="Upload new profile picture">
                        </div>
                        <div class="user-details">
                            <span class="user-name">Nouredine Tamani</span>
                            <span class="user-role">Profil propriétaire</span>
                        </div>
                    </div>
                    <nav class="nav-menu" aria-label="Main navigation">
                        <a href="javascript:void(0)" class="nav-item" data-step="information">
                            <img src="assets/icon_profil.svg" alt="" class="nav-item-icon">
                            <span>Informations générales</span>
                        </a>
                        <a href="javascript:void(0)" class="nav-item" data-step="photos">
                            <img src="assets/icon_documents_profile.svg" alt="" class="nav-item-icon">
                            <span>Photos</span>
                        </a>
                        <a href="javascript:void(0)" class="nav-item" data-step="description">
                            <img src="assets/icon_follow_request.svg" alt="" class="nav-item-icon">
                            <span>Description</span>
                        </a>
                    </nav>
                </aside>

                <div class="container-creation_annonce">
                    <form id="form_infos" action="index.php?module=creation_annonce&action=ajoutInfos" method="POST">

                        <div class="form-step active" id="container_information">
              <span id="text_titre_form" class="container-title_creation-annonce">
                <a id="titre_form">Informations générales</a>
                <a id="ss_titre_form">Modifier les informations générales de votre annonce</a>
              </span>
                            <div class="champs_titre" id="titre_annonce">
                                Titre
                                <input class="champs" id="titre" name="titre_form" placeholder="Titre" aria-label="titre_annonce" required>
                            </div>

                            <div class="champs_titre" id="type_logement">
                                Type de logement
                                <div id="type">
                                    <select class="champs" id="input_type" name="type_logement_form" aria-label="type_logement" required aria-required="true">
                                        <option name="collocation">Collocation</option>
                                        <option name="appart">Appartement</option>
                                        <option name="chambre">Chambre</option>
                                        <option name="maison">Maison</option>
                                        <option name="aide_personne">Logement contre aide à la personne</option>
                                        <option name="r_u">Résidence étudiante</option>
                                    </select>
                                    <div id="meuble">
                                        <input type="checkbox" id="check_meuble" name="meuble">
                                        <span>Meublé</span>
                                    </div>
                                </div>
                            </div>

                            <div class="champs_titre">
                                Prix
                                <input id="prix" type="number" class="champs" placeholder="Prix" name="prix_form" aria-label="prix" required aria-required="true">
                            </div>
                            <div class="champs_titre">
                                Superficie
                                <input class="champs" id="superficie" type="number" placeholder="Superficie" name="superficie_form" aria-label="superficie" required aria-required="true">
                            </div>
                            <div class="champs_titre">
                                Nombre de pièces
                                <input class="champs" id="input_nb" type="number" placeholder="Nombre de pièces" name="nb_pieces_form" aria-label="nb_pièces" required aria-required="true">
                            </div>
                            <div class="champs_titre" id="duree">
                                Durée de disponibilité
                                <div id="debut_fin">
                                    <input type="date" class="champs debut_fin" id="debut" placeholder="Début" name="debut_form" aria-label="debut" required aria-required="true">
                                    <input type="date" class="champs debut_fin" id="fin" placeholder="Fin" name="fin_form" aria-label="fin" required aria-required="true">
                                </div>
                            </div>

                            <div class="champs_titre" id="adresse">
                                Localisation
                                <input class="champs" id="input_adresse" placeholder="adresse" name="loc_form" aria-label="adresse" required aria-required="true">
                            </div>

                            <div class="rest_loc">
                                <div class="champs_titre" id="city">
                                    Ville
                                    <input class="champs" id="input_ville" placeholder="Ville" name="ville_form" aria-label="ville" required aria-required="true">
                                </div>
                                <div class="champs_titre" id="code_postal">
                                    Code postal
                                    <input class="champs" id="input_cp" placeholder="Code postal" name="cp_form" aria-label="cp" required aria-required="true">
                                </div>
                                <div class="champs_titre" id="region">
                                    Pays
                                    <input class="champs" id="input_region" placeholder="Pays" name="region_form" aria-label="region" required aria-required="true">
                                </div>
                            </div>

                            <div class="nav_save" id="nav_save1">
                                <button id="next-to_photos" class="button" aria-label="Next" data-step="1">Suivant</button>
                            </div>
                        </div>


                        <div id="container_photos" class="form-step">
              <span id="text_titre_form" class="container-title_creation-annonce">
                <a id="titre_form">Photos</a>
                <a id="ss_titre_form">Ajouter des photos</a>
              </span>
                            <input class="champs" type="file" name="input_photo1" aria-label="photo1" required aria-required="true">
                            <div id="galerie">
                                <div class="logo_img">
                                    <svg class="logo" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.2647 15.9377L12.5473 14.2346C11.758 13.4519 11.3633 13.0605 10.9089 12.9137C10.5092 12.7845 10.079 12.7845 9.67922 12.9137C9.22485 13.0605 8.83017 13.4519 8.04082 14.2346L4.04193 18.2622M14.2647 15.9377L14.606 15.5991C15.412 14.7999 15.8149 14.4003 16.2773 14.2545C16.6839 14.1262 17.1208 14.1312 17.5244 14.2688C17.9832 14.4253 18.3769 14.834 19.1642 15.6515L20 16.5001M14.2647 15.9377L18.22 19.9628M18.22 19.9628C17.8703 20 17.4213 20 16.8 20H7.2C6.07989 20 5.51984 20 5.09202 19.782C4.7157 19.5903 4.40973 19.2843 4.21799 18.908C4.12583 18.7271 4.07264 18.5226 4.04193 18.2622M18.22 19.9628C18.5007 19.9329 18.7175 19.8791 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V13M11 4H7.2C6.07989 4 5.51984 4 5.09202 4.21799C4.7157 4.40973 4.40973 4.71569 4.21799 5.09202C4 5.51984 4 6.0799 4 7.2V16.8C4 17.4466 4 17.9066 4.04193 18.2622M18 9V6M18 6V3M18 6H21M18 6H15" stroke="#041A8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="nav_save">
                                <button id="previous-to_photos" class="button sub1" data-step="-1">Précédent</button>
                                <button id="next-to_photos" class="button" aria-label="Next" data-step="1">Suivant</button>
                            </div>
                        </div>

                        <div id="container_description" class="form-step">
              <span id="text_titre_form" class="container-title_creation-annonce">
                <a id="titre_form">Description de l'annonce</a>
                <a id="ss_titre_form">Ecrivez la description de votre annonce</a>
              </span>
                            <div class="wrapper_description">
                                <textarea id="champs_description" name="description" placeholder="Description" aria-label="description" required aria-required="true"></textarea>
                                <div class="nav_save">
                                    <button id="previous-to_description" class="button sub1" data-step="-1">Précédent</button>
                                    <button type="submit" name="submit" class="button">
                                        Envoyer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php
    }
}
