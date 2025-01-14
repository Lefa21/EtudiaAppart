<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueSearchAd extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }


    public function showSearchAd($adData)
    {
?>
        <link rel="stylesheet" href="./src/css/ad_search.css">
        <script type="text/javascript" src="./src/scripts/ad_search_location.js"></script>
        <script type="text/javascript" src="./src/scripts/init_map.js"></script>
        <script type="text/javascript" src="./src/scripts/filter_search_ad.js"></script>
        <div class="student-housing">
            <main class="main-content">
                <div id="google-map" class="google-map"></div>
                <form action="index.php?module=ad_search&action=recherche_annonce" method="POST">
                    <section class="search-section">
                        <div class="search-container">
                            <div class="search-container">
                                <label for="searchInput" class="visually-hidden">Rechercher une annonce</label>
                                <input type="text" id="location-ad_search" class="search-input" placeholder="Rechercher une annonce" />
                                <button type="submit" name="submit" class="search-button">
                                    <img src="assets/icon_search_home.svg" alt="Search">
                                </button>
                            </div>
                            <input type="hidden" id="city" name="city">
                            <input type="hidden" id="address_line" name="address_line">
                            <input type="hidden" id="country" name="country">
                            <input type="hidden" id="longitude" name="longitude">
                            <input type="hidden" id="latitude" name="latitude">
                            <input type="hidden" id="postal_code" name="postal_code" />

                            <div class="filter-container">

                                <div class="filter-header">
                                    <h3 class="filter-title">Filtrer</h3>
                                    <button class="toggle-filter_generic">
                                        <img src="assets\arrow_down_blue.svg" class="arrow_filter" alt="" />
                                    </button>
                                </div>
                                <!-- Type de logement -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h3 class="filter-title">Type de logement</h3>
                                        <button class="toggle-filter">
                                            <img src="assets\arrow_down_blue.svg" class="arrow_filter" alt="" />
                                        </button>
                                    </div>

                                    <div class="filter-content">


                                        <label class="filter_label"><input type="checkbox" name="housing_type" value="collocation"> Collocation</label>
                                        <label class="filter_label"><input type="checkbox" name="housing_type" value="appartement_entier"> Appartement entier</label>


                                        <label class="filter_label"><input type="checkbox" name="housing_type" value="chambre"> Chambre</label>


                                        <label class="filter_label"><input type="checkbox" name="housing_type" value="maison"> Maison</label>


                                        <label class="filter_label"><input type="checkbox" name="housing_type" value="logement_contre_aide"> Logement contre aide</label>

                                        <label class="filter_label"><input type="checkbox" name="housing_type" value="residence_publique"> Résidence étudiante publique</label>


                                        <label class="filter_label"><input type="checkbox" name="housing_type" value="residence_privee"> Résidence étudiante privée</label>


                                    </div>
                                </div>

                                <!-- Surface et nombre de pièces -->
                                <div class="filter-section">

                                    <div class="filter-header">
                                        <h3 class="filter-title">Surface et Nombre de pièces</h3>
                                        <button class="toggle-filter">
                                            <img src="assets\arrow_down_blue.svg" class="arrow_filter" alt="" />
                                        </button>
                                    </div>
                                    <div class="filter-content">
                                        <label class="filter_label" for="surface">Surface (m²) :</label>
                                        <input type="number" id="surface" name="surface" min="0" placeholder="Surface en m²">




                                        <label class="filter_label" for="rooms">Nombre de pièces :</label>
                                        <input type="number" id="rooms" name="rooms" min="1" placeholder="Nombre de pièces">


                                    </div>
                                </div>

                                <!-- Durée de location -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h3 class="filter-title">Durée de location</h3>
                                        <button class="toggle-filter">
                                            <img src="assets\arrow_down_blue.svg" class="arrow_filter" alt="" />
                                        </button>
                                    </div>
                                    <div class="filter-content">
                                        <label class="filter_label" for="start_date">Date de début :</label>


                                        <input type="date" id="start_date" name="start_date">

                                        <label class="filter_label" for="end_date">Date de fin :</label>


                                        <input type="date" id="end_date" name="end_date">


                                    </div>
                                </div>

                                <!-- Prix -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h3 class="filter-title">Prix</h3>
                                        <button class="toggle-filter">
                                            <img src="assets\arrow_down_blue.svg" class="arrow_filter" alt="" />
                                        </button>
                                    </div>
                                    <div class="filter-content">
                                        <label for="price-range">Prix :</label>
                                        <input type="range" id="price-range" name="price" min="0" max="3000" step="10">
                                        <span id="price-value">0 €</span>
                                    </div>
                                </div>

                                <!-- Localisation -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h3 class="filter-title">Localisation</h3>
                                        <button class="toggle-filter">
                                            <img src="assets\arrow_down_blue.svg" class="arrow_filter" alt="" />
                                        </button>
                                    </div>
                                    <div class="filter-content">
                                        <label class="filter_label" for="city">Ville :</label>
                                        <input type="text" id="city" name="city" placeholder="Ville">



                                        <label class="filter_label" for="zipcode">Code postal :</label>


                                        <input type="text" id="zipcode" name="zipcode" placeholder="Code postal">

                                        <label class="filter_label" for="country">Pays :</label>
                                        <input type="text" id="country" name="country" placeholder="Pays">
                                    </div>
                                </div>
                            </div>
                            <div class="listings-container">
            <div class="listings-wrapper">
                <?php
                if (!empty($adData)) {
                    foreach ($adData as $ad) { ?>
                        <article class="listing-card">
                            <img src="https://via.placeholder.com/300" alt="Apartment interior view" class="listing-image" />
                            <div class="listing-details">
                                <h2 class="listing-title"><?= htmlspecialchars($ad['ad_title']) ?></h2>
                                <p class="listing-location"><?= htmlspecialchars($ad['city']) . ' ' . htmlspecialchars($ad['zipCode']) ?></p>
                                <div class="listing-meta">
                                    <time class="listing-date">
                                        Publiée le <?= date("d/m/y H:i", strtotime($ad['date_publication'])) ?>
                                    </time>
                                    <p class="listing-price"><?= htmlspecialchars(number_format($ad['rent_price'], 2)) ?>€</p>
                                </div>
                            </div>
                        </article>
                <?php }
                } ?>
            </div>
        </div>
                        </div>

        </section>
        </form>
        </main>
        </div>
<?php
    }
}
?>