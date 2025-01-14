<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueSearchAd extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }
  
    
    public function showSearchAd($adData){
      ?>
      <link rel="stylesheet" href="./src/css/ad_search.css">
      <script type="text/javascript" src="./src/scripts/search_address.js"></script>
      <script type="text/javascript" src="./src/scripts/init_map.js"></script>
  
        <div class="student-housing">
          <main class="main-content">
          <div id="google-map" class="google-map"></div>              
              <form action="index.php?module=ad_search&action=recherche_annonce" method="POST">
              <section class="search-section">
                  <div class="search-container">
                    <div>
                    <label for="searchInput" class="visually-hidden">Rechercher une annonce</label>
                    <input type="search" id="location-input" class="search-input" placeholder="Rechercher une annonce"/>
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
                          <a>Filtrer</a>
                          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/930ed09bdd7c7d1d5f487849bb0435f7b3c002d5c4644665b4dca196c4fc511c?placeholderIfAbsent=true&apiKey=6a478c02df5747629a6f45b8f66c4701" alt="" />
                      </div>
                  </div>
  
                  <div class="listings-container">
                      <?php
                      // Vérifier s'il y a des annonces à afficher
                      if (!empty($adData)) {
                          foreach ($adData as $ad) {
                              ?>
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
                                      <p class="listing-description"><?= htmlspecialchars($ad['description']) ?></p>
                                  </div>
                              </article>
                              <?php
                          }
                      }
                      ?>
                  </div>
              </section>
              </form>
          </main>
      </div>
      <?php
  }
  
}
?>