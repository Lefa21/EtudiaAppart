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
        height: 60px;
        font-size: 25px;
        display: flex;
        align-items: center;
        background-color: #041a8f;
        color: #fff;
        border-radius: 15px;
        width: 400px;
        justify-content: space-around;
        font-family: Inter, sans-serif;
        margin-right: 0;
        padding-right: 35px;
    }

    .v-e-btn img{
        width: 60px;
        margin-left: -20px;
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
        width: 400px; /* Largeur minimale du menu */
        font-size: 20px;
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

    .filter-section-home {
    height: 100px; /* Hauteur fixe */
    margin-top: 100px;
    align-self: center;
    border-radius: 21px;
    border: 1px solid #000;
    background: #ccd8ff;
    display: flex;
    flex-direction: row;
    width: 75%;
    align-items: center; /* Aligne verticalement les groupes */
    gap: 10px; /* Réduction de l'espace entre les groupes */
    text-align: center;
    justify-content: space-between;
    padding: 0 10px; /* Réduction des marges intérieures */
    box-sizing: border-box; /* Assure que padding est inclus dans la largeur */
    overflow: hidden; /* Empêche tout débordement visuel */
    align-items: center;
}

.filter-group {
    height: 100%; /* Prend toute la hauteur du conteneur parent */
    flex: 1; /* Occupe un tiers du conteneur */
    display: flex;
    flex-direction: row; /* Aligne les éléments horizontalement */
    align-items: center; /* Centrage vertical des enfants */
    justify-content: space-between; /* Répartition équilibrée */
    gap: 5px; /* Réduction de l'espacement entre les enfants */
    box-sizing: border-box; /* Inclut les marges dans la largeur */
    margin-bottom: 10px;
}

.filter-group input, .filter-group select {
    border: none;
    background-color: transparent;
    font-size: 25px; /* Taille de police adaptée */
    text-align: center;
    width: calc(100% - 30px); /* Ajustement dynamique en fonction de l'espace */
    line-height: 1; /* Optimisation de la hauteur du texte */
    max-width: 70%; /* Limite pour éviter l'encombrement */
    box-sizing: border-box; /* Gestion correcte de la largeur */
}

.filter-section-home img {
    width: 45px; /* Taille ajustée pour ne pas surcharger la hauteur */
    height: 45px;
    margin-left: 10px;
}

.filter-group input::placeholder {
    color: #000;
    font-size: 18px; /* Taille réduite pour s'intégrer harmonieusement */
}

.filter-group select {
    font-size: 20px; /* Taille uniforme pour les champs de sélection */
}

.filter-divider{
    height: 60px;
}



    input:focus {
        outline: none; /* Supprime le contour par défaut */
        border-bottom: 2px solid #041a8f;
    }


    .property-title{
        text-align: center;
        margin: 100px 0 50px 0;
        font-family: Inter, sans-serif; /* Police identique au bouton */
    }

    .calendar-group{
        margin-top: 10px;
    }

    .calendar-group input[type="date"] {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px;
    font-size: 16px;
    width: calc(50% - 10px);
}

.filter-group label{
    font-size: 14px;
}

.inputs{
    margin-left:5px;
}
.start, .end{
    display: flex;
    align-items: center;
}



.property-grid {
    align-self: center;
    margin-top: auto;
    width: 70%;
    max-width: 1826px;
    display: flex;
    gap: 20px;
}

.property-card {
    border-radius: 5px;
    border: 3px solid #000;
    padding: 16px 18px 27px;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s;
    background: #fff;
    flex: 1;
}

.property-card:hover,
.property-card:focus-within {
    transform: translateY(-5px);
}

.property-image {
    width: 100%;
    border-radius: 5px;
    aspect-ratio: 1.05;
    object-fit: cover;
}

.property-info {
    margin-top: 20px;
    font-size: 20px;
}

.property-info h3 {
    margin: 0 0 10px 0;
    font-size: 1em;
}

.property-info p {
    margin: 5px 0;
}

@media (max-width: 991px) {
    .student-life-banner {
        max-width: 100%;
        margin: 40px 10px 0 0;
    }

    .banner-header {
        padding: 0 20px;
    }

    .banner-title {
        max-width: 100%;
    }

    .filter-section-home {
        margin-top: 40px;
        padding: 20px;
    }

    .section-subtitle {
        max-width: 100%;
        margin: 40px 20px 0;
        font-size: 40px;
    }

    .property-grid {
        max-width: 100%;
        margin-top: 40px;
        flex-direction: column;
    }

    .property-card {
        width: 100%;
    }
}

@media (prefers-reduced-motion: reduce) {
    .property-card,
    .search-button {
        transition: none;
    }
}


.arrow{
    width: 100px;
}

.apparts{

    display: flex;
    align-items: center;
    justify-content: center;

}

.btn{
    background-color: transparent;
    border: none;
    cursor: hand;
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
      
        <div class="filter-group mid">

            <img src="assets/icon_euro.png" alt="" class="filter-icon" />
            <input type="number" placeholder="Budget" min="0" max="1000000" step="1">

        </div>

        <div class="filter-group">

        <div class="filter-divider"></div>
        <div class="filter-group calendar-group">
            <img src="assets/calendrier.svg" alt="" class="filter-icon" />
            <div class="inputs">
                <div class="start">
                    <label for="start-date">Date de début :</label>
                <input type="date" id="start-date" name="start-date" placeholder="Date de début">
                </div>
                
                <div class="end">
                    <label for="end-date">Date de fin :</label>
                <input type="date" id="end-date" name="end-date" placeholder="Date de fin">
                </div>
                
            </div>
            
        </div>


        </div>

        <div class="filter-group">

            <div class="filter-divider"></div>
            <img src="assets/pin.svg" alt="" class="filter-icon" />
            <select name="location" id="location">
                <option value="">Emplacement</option>
                <option value="Paris">Paris</option>
                <option value="Issy-les-Moulineaux">Issy-les-Moulineaux</option>
                <option value="Sevran">Sevran</option>
                <option value="Boulogne">Boulogne</option>
            </select>
            

        </div>

        <button class="search-button">
            <img src="assets/icon_search_home.svg" alt="Search" />
        </button>

    </div>


    <div class="property-title">
        <h1>Les meilleurs logements du moment</h1>
    </div>

    
    

    <section class="apparts">
        <button class="btn">
            <img src="assets/open.svg" class="arrow" alt="">
        </button>
        
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

            <button class="btn">
                <img src="assets/close.svg" class="arrow" alt="">
            </button>


    </section>
        
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');

    startDateInput.addEventListener('change', () => {
        if (endDateInput.value && new Date(endDateInput.value) < new Date(startDateInput.value)) {
            endDateInput.value = ''; // Réinitialise si invalide
        }
        endDateInput.min = startDateInput.value; // Définit la limite minimale
    });

    endDateInput.addEventListener('change', () => {
        if (startDateInput.value && new Date(startDateInput.value) > new Date(endDateInput.value)) {
            startDateInput.value = ''; // Réinitialise si invalide
        }
    });
});



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