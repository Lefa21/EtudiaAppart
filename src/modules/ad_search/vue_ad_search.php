<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueSearchAd extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    
    public function showSearchAd(){
        ?>
           <main class="main-content-ad_search" role="main">
  <img loading="lazy" src="img_map.png" class="background-image" alt="" />
  
  <section class="filter-container" aria-label="Search and Filter Options">
    <div class="search-bar" role="search">
      <span class="search-text">Rechercher une annonce</span>
      <img loading="lazy" src="assets/icon_research.svg" class="search-icon" alt="Search Icon" />
    </div>

    <div class="filter-header">
      <span>Filtrer</span>
      <img loading="lazy" src="assets/arrow_down_blue.svg" class="filter-icon" alt="" />
    </div>

    <div class="housing-type-section">
      <div class="section-header">
        <h2 class="section-title">Type de logement</h2>
        <img loading="lazy" src="assets/arrow_up_blue.svg" class="section-icon" alt="" />
      </div>

      <form>
        <fieldset class="checkbox-group">
          <legend class="visually-hidden">Options de logement</legend>
          
          <div class="checkbox-wrapper">
            <input type="checkbox" id="colocation" class="checkbox">
            <label for="colocation" class="checkbox-label">Collocation</label>
          </div>

          <div class="checkbox-wrapper">
            <input type="checkbox" id="apartment" class="checkbox">
            <label for="apartment" class="checkbox-label">Appartement entier</label>
          </div>

          <div class="checkbox-wrapper">
            <input type="checkbox" id="room" class="checkbox">
            <label for="room" class="checkbox-label">Chambre</label>
          </div>

          <div class="checkbox-wrapper">
            <input type="checkbox" id="house" class="checkbox">
            <label for="house" class="checkbox-label">Maison</label>
          </div>

          <div class="checkbox-wrapper">
            <input type="checkbox" id="assisted" class="checkbox">
            <label for="assisted" class="checkbox-label">Logement contre aide à la personne</label>
          </div>

          <div class="checkbox-wrapper">
            <input type="checkbox" id="public-residence" class="checkbox">
            <label for="public-residence" class="checkbox-label">Résidence étudiante publique</label>
          </div>

          <div class="checkbox-wrapper">
            <input type="checkbox" id="private-residence" class="checkbox">
            <label for="private-residence" class="checkbox-label">Résidence étudiante privée</label>
          </div>
        </fieldset>
      </form>
    </div>

    <div class="price-section">
      <span>Prix</span>
      <div class="price-range">
        <span class="price-value">500€</span>
        <span class="price-value">1500€</span>
      </div>
    </div>
  </section>

  <div class="navigation-arrows">
    <img loading="lazy" src="assets/icon_map_red" class="arrow-icon" alt="Previous" />
    <img loading="lazy" src="assets/icon_map_red" class="arrow-icon" alt="Next" />
  </div>
</main>
        <?php
    }
}
?>