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

        $_SESSION['home_page'] = 0;
?>
        <link rel="stylesheet" href="./src/css/ad_search.css">
        <script type="text/javascript" src="./src/scripts/init_map.js"></script>
        <script type="text/javascript" src="./src/scripts/filter_search_ad.js"></script>
        <script type="text/javascript" src="./src/scripts/key_research.js"></script>
        <script type="text/javascript" src="./src/scripts/favorite.js"></script>
        <script type="text/javascript" src="./src/scripts/furnished_event.js"></script>
        <script id="adData" type="application/json">
            <?= json_encode($adData['results']); ?>
        </script>
        <script type="text/javascript" src="./src/scripts/annonce.js"></script>


        <div class="student-housing">
            <main class="main-content">
                <div id="google-map" class="google-map"></div>
                <form action="index.php?module=ad_search&action=recherche_annonce" method="POST">
                    <section class="search-section">
                        <div class="search-container">
                            <div class="search-container">
                                <label for="searchInput" class="visually-hidden">Rechercher une annonce</label>
                                <input type="text" id="searchInput" name="search_ad" class="search-input" placeholder="Rechercher une annonce" />
                                <ul id="suggestions" class="suggestions-list"></ul>
                                <button type="submit" name="submit" class="search-button">
                                    <img src="assets/icon_search_home.svg" alt="Search">
                                </button>
                            </div>

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
                                        <?php
                                        $selectedHousingTypes = $adData['search_criteria']['housing_type'] ?? [];
                                        ?>
                                        <label class="filter_label">
                                            <input type="checkbox" name="housing_type[]" value="Collocation" <?= in_array('Collocation', $selectedHousingTypes) ? 'checked' : '' ?>> Collocation
                                        </label>
                                        <label class="filter_label">
                                            <input type="checkbox" name="housing_type[]" value="Appartement" <?= in_array('Appartement', $selectedHousingTypes) ? 'checked' : '' ?>> Appartement entier
                                        </label>
                                        <label class="filter_label">
                                            <input type="checkbox" name="housing_type[]" value="chambre" <?= in_array('chambre', $selectedHousingTypes) ? 'checked' : '' ?>> Chambre
                                        </label>
                                        <label class="filter_label">
                                            <input type="checkbox" name="housing_type[]" value="Maison" <?= in_array('Maison', $selectedHousingTypes) ? 'checked' : '' ?>> Maison
                                        </label>
                                        <label class="filter_label">
                                            <input type="checkbox" name="housing_type[]" value="Logement contre aide à la personne" <?= in_array('Logement contre aide à la personne', $selectedHousingTypes) ? 'checked' : '' ?>> Logement contre aide
                                        </label>
                                        <label class="filter_label">
                                            <input type="checkbox" name="housing_type[]" value="Résidence étudiante publique" <?= in_array('Résidence étudiante publique', $selectedHousingTypes) ? 'checked' : '' ?>> Résidence étudiante publique
                                        </label>
                                        <label class="filter_label">
                                            <input type="checkbox" name="housing_type[]" value="Résidence étudiante privée" <?= in_array('Résidence étudiante privée', $selectedHousingTypes) ? 'checked' : '' ?>> Résidence étudiante privée
                                        </label>

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
                                        <div class="wrapper-input">
                                            <div>
                                                <input type="number" id="surface_min" name="surface_min" min="0" placeholder="min" value="<?= htmlspecialchars($adData['search_criteria']['surface_min'] ?? '') ?>">
                                            </div>
                                            <div>
                                                <input type="number" id="surface_max" name="surface_max" min="0" placeholder="max" value="<?= htmlspecialchars($adData['search_criteria']['surface_max'] ?? '') ?>">
                                            </div>
                                        </div>
                                        <label class="filter_label" for="rooms">Nombre de pièces :</label>
                                        <input type="number" id="rooms" name="rooms" min="1" placeholder="Nombre de pièces" value="<?= htmlspecialchars($adData['search_criteria']['rooms'] ?? '') ?>">


                                    </div>
                                </div>

                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h3 class="filter-title">Meublé</h3>
                                        <button class="toggle-filter">
                                            <img src="assets\arrow_down_blue.svg" class="arrow_filter" alt="" />
                                        </button>
                                    </div>

                                    <div class="filter-content">
                                        <div>
                                            <?php
                                            $habitationFurnished = $adData['search_criteria']['habitation_furnished'] ?? '';
                                            ?>
                                            <label class="filter_label">
                                                <input type="checkbox" id="furnishedYes" name="habitation_furnished" value="oui" <?= $habitationFurnished === 'oui' ? 'checked' : '' ?>> oui
                                            </label>
                                            <label class="filter_label">
                                                <input type="checkbox" id="furnishedNo" name="habitation_furnished" value="non" <?= $habitationFurnished === 'non' ? 'checked' : '' ?>> non
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <!-- Durée de location -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h3 class="filter-title">Durée de location</h3>
                                        <button class="toggle-filter">
                                            <img src="assets/arrow_down_blue.svg" class="arrow_filter" alt="" />
                                        </button>
                                    </div>
                                    <div class="filter-content">
                                        <label class="filter_label" for="start_date">Date de début :</label>
                                        <input type="date" id="start_date" name="start_date"
                                            value="<?= htmlspecialchars($adData['search_criteria']['start_date'] ?? '') ?>">

                                        <label class="filter_label" for="end_date">Date de fin :</label>
                                        <input type="date" id="end_date" name="end_date"
                                            value="<?= htmlspecialchars($adData['search_criteria']['end_date'] ?? '') ?>">
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
                                        <div class="wrapper-input">
                                            <div>
                                                <input type="number" id="price_min" name="price_min" min="0" placeholder="min" value="<?= htmlspecialchars($adData['search_criteria']['price_min'] ?? '') ?>">
                                            </div>
                                            <div>
                                                <input type="number" id="price_max" name="price_max" min="0" placeholder="max" value="<?= htmlspecialchars($adData['search_criteria']['budget'] ?? '') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Localisation -->
                                <div class="filter-section">
                                    <div class="filter-header">
                                        <h3 class="filter-title">Localisation</h3>
                                        <button class="toggle-filter">
                                            <img src="assets/arrow_down_blue.svg" class="arrow_filter" alt="" />
                                        </button>
                                    </div>
                                    <div class="filter-content">
                                        <label class="filter_label" for="city">Ville :</label>
                                        <input type="text" id="city" name="city" placeholder="Ville"
                                            value="<?= htmlspecialchars($adData['search_criteria']['city'] ?? '') ?>">

                                        <label class="filter_label" for="postal_code">Code postal :</label>
                                        <input type="text" id="postal_code" name="postal_code" placeholder="Code postal"
                                            value="<?= htmlspecialchars($adData['search_criteria']['postal_code'] ?? '') ?>">

                                        <label class="filter_label" for="country">Pays :</label>
                                        <input type="text" id="country" name="country" placeholder="Pays"
                                            value="<?= htmlspecialchars($adData['search_criteria']['country'] ?? '') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="listings-container">
                                <<div class="listings-wrapper">
                                    <?php
                                    if (!empty($adData['results'])) {
                                        foreach ($adData['results'] as $ad) {
                                            $imageSrc = !empty($ad['ImageData'])
                                                ? 'data:image/jpeg;base64,' . base64_encode($ad['ImageData'])
                                                : 'assets/logement_etudiant_1.jpg';
                                            $imageName = !empty($ad['ImageName']) ? htmlspecialchars($ad['ImageName']) : 'Image par défaut';
                                    ?>
                                            <article class="listing-card">
                                                <img src="assets/icon_favoris.svg" alt="Apartment interior view" class="image-annonce_favoris" />
                                                <div onclick="redirectTo(this)">
                                                    <span class="annonceId" hidden><?= htmlspecialchars($ad['id_ad']) ?></span>
                                                    <!-- Affichage de l'image -->
                                                    <img src="<?= $imageSrc ?>" alt="<?= $imageName ?>" class="listing-image" />
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
                                                </div>
                                            </article>
                                    <?php }
                                    } ?>
                            </div>

                        </div>
        </div>

        </section>
        </main>
        </div>
<?php
    }
}
?>