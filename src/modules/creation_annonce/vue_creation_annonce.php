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
<script type="text/javascript" src="./src/scripts/navigation_create_ad.js"></script>

<main class="owner-depot_annonce" role="main">
    <div class="main-content-depot_annonce">

        <aside id="sidebar" class="sidebar">
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
                    <span class="user-name"><?= $_SESSION['user_first_name'] . " " .  $_SESSION['user_last_name'] ?></span>
                    <span class="user-role">Profil <?= $_SESSION['user_status'] ?></span>
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
            <form id="form_infos" action="index.php?module=creation_annonce&action=ajoutInfos" method="POST" enctype="multipart/form-data">

                <div id="container_information" class="form-step active">
                    <span id="text_titre_form" class="container-title_creation-annonce">
                        <a id="titre_form">Informations générales</a>
                        <a id="ss_titre_form">Modifier les informations générales de votre annonce</a>
                    </span>
                    <div class="champs_titre" id="titre_annonce">
                        Titre
                        <input class="champs" id="titre" name="titre_form" placeholder="Titre" aria-label="titre_annonce" required>
                        <span class="required">*</span>
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
                        <span class="required">*</span>
                    </div>

                    <div class="champs_titre">
                        Prix
                        <input id="prix" type="number" class="champs" placeholder="Prix" name="prix_form" aria-label="prix" required aria-required="true">
                        <span class="required">*</span>
                    </div>
                    <div class="champs_titre">
                        Superficie
                        <input class="champs" id="superficie" type="number" placeholder="Superficie" name="superficie_form" aria-label="superficie" required aria-required="true">
                        <span class="required">*</span>
                    </div>
                    <div class="champs_titre">
                        Nombre de pièces
                        <input class="champs" id="input_nb" type="number" placeholder="Nombre de pièces" name="nb_pieces_form" aria-label="nb_pièces" required aria-required="true">
                        <span class="required">*</span>
                    </div>
                    <div class="champs_titre" id="duree">
                        Durée de disponibilité
                        <div id="debut_fin">
                            <input type="date" class="champs debut_fin" id="debut" placeholder="Début" name="debut_form" aria-label="debut" required aria-required="true">
                            <input type="date" class="champs debut_fin" id="fin" placeholder="Fin" name="fin_form" aria-label="fin" required aria-required="true">
                        </div>
                        <span class="required">*</span>
                    </div>

                    <div class="champs_titre" id="adresse">
                        Localisation
                        <input class="champs" id="input_adresse" placeholder="adresse" name="loc_form" aria-label="adresse" required aria-required="true">
                        <span class="required">*</span>
                    </div>

                    <div class="rest_loc">
                        <div class="champs_titre" id="zipcode">
                            Code postal
                            <input class="champs" id="input_zipcode" placeholder="Code postal" name="zipcode_form" aria-label="zipcode" required aria-required="true">
                            <span class="required">*</span>
                        </div>
                        <div class="champs_titre" id="city">
                            Ville
                            <input class="champs" id="input_ville" placeholder="Ville" name="ville_form" aria-label="ville" required aria-required="true">
                            <span class="required">*</span>
                        </div>
                        <div class="champs_titre" id="region">
                            Pays
                            <input class="champs" id="input_region" placeholder="Pays" name="region_form" aria-label="region" required aria-required="true">
                            <span class="required">*</span>
                        </div>
                        <input type="hidden" id="longitude" name="longitude">
                        <input type="hidden" id="latitude" name="latitude">
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
                    <div id="galerie">
                        <input class="champs" type="file" name="input_photo1" accept="image/*" aria-label="photo1" required aria-required="true">
                        <span class="required">*</span>
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
                        <span class="required">*</span>
                        <div class="nav_save">
                            <button id="previous-to_description" class="button sub1" data-step="-1">Précédent</button>
                            <button type="submit" name="submit_button" class="button">Envoyer</button>
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
