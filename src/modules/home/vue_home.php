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
    <style>
        .vie-etudiante {
                margin-top: 30px;
                margin-right: 20px;
                display: flex;
                justify-content: flex-end;
            }


            .v-e-btn{
                height: 100px;
                font-size: 50px;
                display: flex;
                align-items: center;
                background-color: #041a8f;
                color: #fff;
                border-radius: 15px;
                width: 740px;
                justify-content: space-around;
                font-family: Inter, sans-serif;
                margin-right: 0;
                padding-right: 35px;
            }

            .v-e-btn img{
                width: 70px;
                margin-left: -25px;
            }

            .v-e-btn:hover{
                background-color: #000e5c;
            }

            .v-e-btn.no-border {
                border-bottom-left-radius: 0; /* Supprime l'arrondi en bas à gauche */
                border-bottom-right-radius: 0; /* Supprime l'arrondi en bas à droite */
            }


            .dropdown {
                position: relative; /* Positionnement pour le menu déroulant */
                display: inline-block; /* Limite la largeur de la div à son contenu */
            }

            .dropdown-content {
                display: none; /* Masqué par défaut */
                position: absolute; /* Absolu pour apparaître sous le bouton */
                top: 100%; /* Positionne juste en dessous du bouton */
                right: 0; /* Aligné à droite du conteneur parent */
                background-color: #ccd8ff; /* Fond blanc */
                box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Ombre subtile */
                border-radius: 0 0 8px 8px; /* Coins arrondis */
                overflow: hidden; /* Empêche le débordement */
                z-index: 1; /* Affiche par-dessus les autres éléments */
                width: 740px; /* Largeur minimale du menu */
                font-size: 40px;
                border:1px solid #041a8f;
            }

            .dropdown-content a {
                display: block; /* Chaque lien occupe toute une ligne */
                padding: 10px 15px; /* Espacement interne */
                color:rgb(0, 0, 0); /* Texte bleu */
                text-decoration: none; /* Pas de soulignement */
                font-family: Inter, sans-serif; /* Police identique au bouton */
            }

            .dropdown-content img {
                width: 50px;
                margin-right: 25px;
            }

            .dropdown-content a:hover {
                background-color: #f1f1f1; /* Fond gris clair au survol */
            }

            .dropdown-content.show {
                display: block; /* Affiche le menu déroulant */
            }



            .filter-group input{
                border: none;
                background-color: rgba(255, 255, 255, 0);
                font-size: 25px;
                width: 250px;
                text-align: center;
            }

            .filter-group input::placeholder{
                color: #000;
            }

            input:focus {
                outline: none; /* Supprime le contour par défaut */
                border-bottom: 2px solid #041a8f;
            }



    </style>
    
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

    <div class="filter-section-home">
      
        <div class="filter-group">
            <img src="assets/icon_euro.png" alt="" class="filter-icon" />
            <input type="number" placeholder="Budget" min="0" max="1000000" step="1">

        </div>

      <div class="filter-group">

        <div class="filter-divider"></div>
        <img src="assets/calendrier.svg" alt="" class="filter-icon" />
        <input type="text" placeholder="Durée">

      </div>

      <div class="filter-group">

        <div class="filter-divider"></div>
        <img src="assets/pin.svg" alt="" class="filter-icon" />
        <input type="text" placeholder="Emplacement">

      </div>

      <button class="search-button">
        <img src="assets/icon_search_home.svg" alt="Search" />
      </button>

    </div>



    

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

    <script>
        document.querySelector('.v-e-btn').addEventListener('click', () => {
    const dropdownContent = document.querySelector('.dropdown-content');
    const button = document.querySelector('.v-e-btn');

    // Afficher ou masquer le menu
    dropdownContent.classList.toggle('show');

    // Ajouter ou supprimer la classe pour changer les bordures
    button.classList.toggle('no-border');
});

// Fermer le menu si on clique en dehors
window.addEventListener('click', (event) => {
    if (!event.target.matches('.v-e-btn')) {
        const dropdowns = document.querySelectorAll('.dropdown-content');
        dropdowns.forEach((dropdown) => {
            dropdown.classList.remove('show');
        });

        const buttons = document.querySelectorAll('.v-e-btn');
        buttons.forEach((button) => {
            button.classList.remove('no-border');
        });
    }
});

    </script>

</main>

<?php

    }

}
