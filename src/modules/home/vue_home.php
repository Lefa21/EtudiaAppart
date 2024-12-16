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

        <main class="student-life">

  <section class="student-life-banner">

    <div class="banner-header">

      <img src="assets/banner_etudiant_home.svg" alt="" class="banner-icon" />

      <h2 class="banner-title">VIE ETUDIANTE</h2>

    </div>

    

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

  </section>

</main>

<?php

    }

}
