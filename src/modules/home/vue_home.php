<?php



class VueHome extends VueGenerique

{

    public function __construct()

    {

        parent::__construct();

    }



    public function welcome()

    {

?>

<link rel="stylesheet" href="./src/css/home.css">
<script type="text/javascript" src="./src/scripts/search_address_home.js"></script>




<main>
    <section class="vie-etudiante">
        <div class="dropdown">
            <button class="v-e-btn">
                <img src="assets/banner_etudiant_home.svg" alt="" class="banner-icon" /> Vie Etudiante
            </button>
            <div class="dropdown-content">
                <a href="#link1"> <img src="assets/tcheck.svg" alt="">Bons Plans</a>
                <a href="#link2"><img src="assets/food.svg" alt="">Réstauration étudiante</a>
                <a href="#link3"><img src="assets/party.svg" alt="">Evenements</a>
            </div>
        </div>
    </section>

    <form action="index.php?module=ad_search&action=recherche_annonce" method="POST">
        <div class="filter-section-home">
            <div class="filter-group mid">
                <img src="assets/icon_euro.png" alt="" class="filter-icon" />
                <input id="budget" type="number" name="budget" placeholder="Budget" min="0" max="1000000" step="1">
            </div>

            <div class="filter-group">
            <div class="filter-divider"></div>
            <div class="filter-group calendar-group">
                <img src="assets/calendrier.svg" alt="" class="filter-icon" />
                <div class="inputs">
                <div class="start">
                    <label for="start-date">Date de début :</label>
                    <input type="date" id="start_date" name="start_date" placeholder="Date de début">
                </div>
                <div class="end">
                    <label for="end-date">Date de fin :</label>
                    <input type="date" id="end_date" name="end_date" placeholder="Date de fin">
                </div>
                </div>
            </div>
            </div>

            <div class="filter-group">
            <div class="filter-divider"></div>
            <img src="assets/pin.svg" alt="" class="filter-icon" />
            <input type="text" id="location-input" placeholder="Entrez une localisation">
            <input type="hidden" id="city" name="city">
            <input type="hidden" id="address_line" name="address_line">
            <input type="hidden" id="country" name="country">
            <input type="hidden" id="longitude" name="longitude">
            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="postal_code" name="postal_code" />
            </div>

            <button type="submit" name="submit" class="search-button">
            <img src="assets/icon_search_home.svg" alt="Search" />
            </button>
        </div>
    </form>



    <div class="property-title">
        <h1>Les meilleurs logements du moment</h1>
    </div>
    
    <section class="apparts">
        <button class="btn">
            <img src="assets/open.svg" class="arrow" alt="">
        </button>
        
        <section class="property-grid">
        
                <article class="property-card">
                    <img src="assets/logement_etudiant_1.jpg" alt="Property" class="property-image" />
                    <div class="property-info">
                        <p>Titre : Studio proche de Odéon</p>
                        <p>Emplacment : Métro Odéon</p>
                        <p>Durée : 36 mois</p>
                        <p>Type de logement : studio</p>
                    </div>
                </article>

                <article class="property-card">
                    <img src="assets/logement_etudiant_2.jpg" alt="Property" class="property-image" />
                    <div class="property-info">
                        <p>Titre : studio spacieux</p>
                        <p>Emplacment : Issy-Les-Moulineaux</p>
                        <p>Durée : 12 mois renouvelable</p>
                        <p>Type de logement : studio</p>
                    </div>
                </article>

                <article class="property-card">
                    <img src="assets/logement_etudiant_3.jpg" alt="Property" class="property-image" />
                    <div class="property-info">
                        <p>Titre : Studio à côté de Saint-Michel</p>
                        <p>Emplacment : métro Saint Michel</p>
                        <p>Durée : 24 mois</p>
                        <p>Type de logement : studio</p>
                    </div>
                </article>
        </section>

            <button class="btn">
                <img src="assets/close.svg" class="arrow" alt="">
            </button>


    </section>
</main>

<?php

    }

}