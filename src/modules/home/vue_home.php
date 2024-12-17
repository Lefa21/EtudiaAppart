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

<main>

    <section class="vie-etudiante">
        <div class="dropdown">
            <button class="v-e-btn">
                <img src="assets/banner_etudiant_home.svg" alt="" class="banner-icon" /> Vie Etudiante
            </button>
            <div class="dropdown-content">
                <a href="#link1">Option 1</a>
                <a href="#link2">Option 2</a>
                <a href="#link3">Option 3</a>
            </div>
        </div>
    </section>

    

    <div class="filter-section-home">

      <div class="filter-group">

        <img src="assets/icon_euro.png" alt="" class="filter-icon" />

        <span>Budget</span>

      </div>

      <div class="filter-group">

        <div class="filter-divider"></div>

        <img src="assets/icon_date" alt="" class="filter-icon" />

        <span>Date</span>

      </div>

      <div class="filter-group">

        <div class="filter-divider"></div>

        <img src="icon_map_black.png" alt="" class="filter-icon" />

        <span>Emplacement</span>

      </div>

      <button class="search-button">

        <img src="assets/icon_search_home.svg" alt="Search" />

      </button>

    </div>

    

    <h2 class="section-title">Nos logements les mieux notés</h2>

  </section>



  <section class="property-grid">

    <article class="property-card">

      <img src="assets/img_logement.png" alt="Property" class="property-image" />

      <div class="property-info">

        <p>Titre : Titre</p>

        <p>Emplacment : Emplacement</p>

        <p>Durée : Durée</p>

        <p>Type de logement : Type de</p>

      </div>

    </article>

    

    <article class="property-card">

      <img src="assets/img_logement.png" alt="Property" class="property-image" />

      <div class="property-info">

        <p>Titre : Titre</p>

        <p>Emplacment : Emplacement</p>

        <p>Durée : Durée</p>

        <p>Type de logement : Type de</p>

      </div>

    </article>

    

    <article class="property-card">

      <img src="assets/img_logement.png" alt="Property" class="property-image" />

      <div class="property-info">

        <p>Titre : Titre</p>

        <p>Emplacment : Emplacement</p>

        <p>Durée : Durée</p>

        <p>Type de logement : Type de</p>

      </div>

    </article>

  

</main>

<?php

    }

}
