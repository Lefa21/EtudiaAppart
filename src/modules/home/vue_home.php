<?php



class VueHome extends VueGenerique

{

    public function __construct()

    {

        parent::__construct();
    }



    public function welcome()

    {
        $_SESSION['home_page'] = 1;
?>
        <script type="text/javascript" src="./src/scripts/search_address_home.js"></script>
        <link rel="stylesheet" href="./src/css/home.css">
        <main>

<<<<<<< HEAD
=======
        <link rel="stylesheet" href="./src/css/home.css">

        <main>
            <style>
                .vie-etudiante {
                    margin-top: 30px;
                    margin-right: 20px;
                    display: flex;
                    justify-content: flex-end;
                }


                .v-e-btn {
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

                .v-e-btn img {
                    width: 60px;
                    margin-left: -20px;
                }

                .v-e-btn:hover {
                    background-color: #000e5c;
                }

                .v-e-btn.no-border {
                    border-bottom-left-radius: 0;
                    /* Supprime l'arrondi en bas à gauche */
                    border-bottom-right-radius: 0;
                    /* Supprime l'arrondi en bas à droite */
                }


                .dropdown {
                    position: relative;
                    /* Positionnement pour le menu déroulant */
                    display: inline-block;
                    /* Limite la largeur de la div à son contenu */
                }

                .dropdown-content {
                    display: none;
                    /* Masqué par défaut */
                    position: absolute;
                    /* Absolu pour apparaître sous le bouton */
                    top: 100%;
                    /* Positionne juste en dessous du bouton */
                    right: 0;
                    /* Aligné à droite du conteneur parent */
                    background-color: #ccd8ff;
                    /* Fond blanc */
                    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
                    /* Ombre subtile */
                    border-radius: 0 0 8px 8px;
                    /* Coins arrondis */
                    overflow: hidden;
                    /* Empêche le débordement */
                    z-index: 1;
                    /* Affiche par-dessus les autres éléments */
                    width: 400px;
                    /* Largeur minimale du menu */
                    font-size: 20px;
                    border: 1px solid #041a8f;
                }

                .dropdown-content a {
                    display: block;
                    /* Chaque lien occupe toute une ligne */
                    padding: 10px 15px;
                    /* Espacement interne */
                    color: rgb(0, 0, 0);
                    /* Texte bleu */
                    text-decoration: none;
                    /* Pas de soulignement */
                    font-family: Inter, sans-serif;
                    /* Police identique au bouton */
                }

                .dropdown-content img {
                    width: 50px;
                    margin-right: 25px;
                }

                .dropdown-content a:hover {
                    background-color: #f1f1f1;
                    /* Fond gris clair au survol */
                }

                .dropdown-content.show {
                    display: block;
                    /* Affiche le menu déroulant */
                }

                .filter-section-home {
                    height: 100px;
                    /* Hauteur fixe */
                    margin-top: 100px;
                    align-self: center;
                    border-radius: 21px;
                    border: 1px solid #000;
                    background: #ccd8ff;
                    display: flex;
                    flex-direction: row;
                    width: 75%;
                    align-items: center;
                    /* Aligne verticalement les groupes */
                    gap: 10px;
                    /* Réduction de l'espace entre les groupes */
                    text-align: center;
                    justify-content: space-between;
                    padding: 0 10px;
                    /* Réduction des marges intérieures */
                    box-sizing: border-box;
                    /* Assure que padding est inclus dans la largeur */
                    overflow: hidden;
                    /* Empêche tout débordement visuel */
                    align-items: center;
                }

                .filter-group {
                    height: 100%;
                    /* Prend toute la hauteur du conteneur parent */
                    flex: 1;
                    /* Occupe un tiers du conteneur */
                    display: flex;
                    flex-direction: row;
                    /* Aligne les éléments horizontalement */
                    align-items: center;
                    /* Centrage vertical des enfants */
                    justify-content: space-between;
                    /* Répartition équilibrée */
                    gap: 5px;
                    /* Réduction de l'espacement entre les enfants */
                    box-sizing: border-box;
                    /* Inclut les marges dans la largeur */
                    margin-bottom: 10px;
                }

                .filter-group input,
                .filter-group select {
                    border: none;
                    background-color: transparent;
                    font-size: 25px;
                    /* Taille de police adaptée */
                    text-align: center;
                    width: calc(100% - 30px);
                    /* Ajustement dynamique en fonction de l'espace */
                    line-height: 1;
                    /* Optimisation de la hauteur du texte */
                    max-width: 70%;
                    /* Limite pour éviter l'encombrement */
                    box-sizing: border-box;
                    /* Gestion correcte de la largeur */
                }

                .filter-section-home img {
                    width: 45px;
                    /* Taille ajustée pour ne pas surcharger la hauteur */
                    height: 45px;
                    margin-left: 10px;
                }

                .filter-group input::placeholder {
                    color: #000;
                    font-size: 18px;
                    /* Taille réduite pour s'intégrer harmonieusement */
                }

                .filter-group select {
                    font-size: 20px;
                    /* Taille uniforme pour les champs de sélection */
                }

                .filter-divider {
                    height: 60px;
                }



                input:focus {
                    outline: none;
                    /* Supprime le contour par défaut */
                    border-bottom: 2px solid #041a8f;
                }


                .property-title {
                    text-align: center;
                    margin: 100px 0 50px 0;
                    font-family: Inter, sans-serif;
                    /* Police identique au bouton */
                }

                .calendar-group {
                    margin-top: 10px;
                }

                .calendar-group input[type="date"] {
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    padding: 5px;
                    font-size: 16px;
                    width: calc(50% - 10px);
                }

                .filter-group label {
                    font-size: 14px;
                }

                .inputs {
                    margin-left: 5px;
                }

                .start,
                .end {
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


                .arrow {
                    width: 100px;
                }

                .apparts {

                    display: flex;
                    align-items: center;
                    justify-content: center;

                }

                .btn {
                    background-color: transparent;
                    border: none;
                    cursor: hand;
                }
            </style>

>>>>>>> c6b4e4e67354746aaa6ac7f19534dc498610da24
            <section class="vie-etudiante">
                <div class="dropdown">
                    <button class="v-e-btn">
                        <img src="assets/banner_etudiant_home.svg" alt="" class="banner-icon" /> Vie Etudiante
                    </button>
                    <div class="dropdown-content">
                        <a href="index.php?module=home&action=bonsPlans"> <img src="assets/tcheck.svg" alt="">Bons Plans</a>
                        <a href="index.php?module=home&action=restauration"><img src="assets/food.svg" alt="">Restauration étudiante</a>
                        <a href="index.php?module=home&action=events"><img src="assets/party.svg" alt="">Evenements</a>
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
                <h1>Les 3 logements les plus demandés</h1>
            </div>




            <section class="apparts">
                <button class="btn">
                    <img src="assets/open.svg" class="arrow" alt="">
                </button>

                <section class="property-grid">

                    <article class="property-card">
                        <img src="assets/logement_etudiant_1.jpg" alt="Property" class="property-image" style="background-color: blue;" />
                        <div class="property-info">
                            <p>Titre : Studio proche de Odéon</p>
                            <p>Emplacment : Métro Odéon</p>
                            <p>Durée : 36 mois</p>
                            <p>Type de logement : studio</p>
                            <button style="
                            display: flex;
                            margin-left: 100%;
                        ">
                                M'EMMENER
                            </button>
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

    public function bonsPlans()
    {
    ?>
        <style>
            .main {
                margin: 20px 10px;
            }

            .btn-home {
                margin-bottom: 50px;
                border: #000 solid 2px;
                color: var(--text-color-white);
                background-color: var(--primary-color);
                border-radius: 3px;
                text-decoration: none;
                padding: 10px;
            }
            .bons-plans-list {
                margin-top: 20px;
                padding: 15px;
                border: 1px solid var(--gray-border);
                border-radius: 8px;
                background-color: var(--secondary-color);
                color: var(--text-color-black);
                font-family: var(--police-text);
            }

            .bons-plans-list h3 {
                color: var(--text-color-blue);
                font-size: 1.5em;
                margin-bottom: 10px;
            }

            .bons-plans-list ul {
                list-style-type: disc;
                padding-left: 20px;
            }

            .bons-plans-list li {
                margin-bottom: 8px;
                line-height: 1.6;
            }
        </style>
        <main>
            <section class="main">
                <a class="btn-home" href="./"><- Accueil</a>
                        <div class="bons-plans-list">
                            <h3>Bons Plans pour étudiants :</h3>
                            <ul>
                                <li>Carte étudiante ISIC : Réductions dans de nombreux commerces.</li>
                                <li>Offres spéciales pour les transports (SNCF, RATP).</li>
                                <li>Plateformes comme UNiDAYS et Student Beans pour des réductions en ligne.</li>
                                <li>Réductions dans les supermarchés comme Carrefour et Leclerc.</li>
                            </ul>
                        </div>
            </section>
        </main>
    <?php
    }

    public function restauration()
    {
    ?>
        <style>
            .main {
                margin: 20px 10px;
            }

            .btn-home {
                border: #000 solid 2px;
                color: var(--text-color-white);
                background-color: var(--primary-color);
                border-radius: 3px;
                text-decoration: none;
                padding: 10px;
            }

            .restauration-info {
                margin-top: 20px;
                padding: 15px;
                border: 1px solid var(--gray-border);
                border-radius: 8px;
                background-color: var(--secondary-color);
                color: var(--text-color-black);
                font-family: var(--police-text);
            }

            .restauration-info h3 {
                color: var(--text-color-blue);
                font-size: 1.5em;
                margin-bottom: 10px;
            }

            .restauration-info ul {
                list-style-type: disc;
                padding-left: 20px;
            }

            .restauration-info li {
                margin-bottom: 8px;
                line-height: 1.6;
            }
        </style>
        <main>
            <section class="main">
                <a class="btn-home" href="./"><- Accueil</a>
                        <div class="restauration-info">
                            <h3>Restauration étudiante :</h3>
                            <ul>
                                <li>Repas à 1 € dans les restaurants universitaires (RU) pour les étudiants boursiers.</li>
                                <li>Carte d'Aide à la Restauration Étudiante disponible pour les étudiants éloignés des RU.</li>
                                <li>Applications comme Too Good To Go pour des repas à prix réduit.</li>
                                <li>Associations locales proposant des distributions alimentaires gratuites.</li>
                            </ul>
                        </div>
            </section>
        </main>
    <?php
    }

    public function events()
    {
<<<<<<< HEAD
    ?>
        <link rel="stylesheet" href="./src/css/home.css">
        <main>
            <style>
                .main {
                    margin: 20px 10px;
                }

                .btn-home {
                    border: #000 solid 2px;
                    color: var(--text-color-white);
                    background-color: var(--primary-color);
                    border-radius: 3px;
                    text-decoration: none;
                    padding: 10px;
                }

                .events-section {
                    margin-top: 20px;
                    padding: 15px;
                    border: 1px solid var(--gray-border);
                    border-radius: 8px;
                    background-color: var(--secondary-color);
                    color: var(--text-color-black);
                    font-family: var(--police-text);
                    text-align: center;
                }

                .events-section h3 {
                    color: var(--text-color-blue);
                    font-size: 1.5em;
                    margin-bottom: 10px;
                }

                .events-section img {
                    max-width: 100%;
                    height: auto;
                    border-radius: 5px;
                    margin-bottom: 15px;
                }

                .events-section a {
                    display: inline-block;
                    margin-top: 10px;
                    padding: 10px 15px;
                    color: var(--text-color-white);
                    background-color: var(--primary-color);
                    border-radius: 3px;
                    text-decoration: none;
                    font-size: 1em;
                }

                .events-section a:hover {
                    background-color: #000e5c;
                }
            </style>
            <section class="main">
                <a class="btn-home" href="./"><- Accueil</a>
                        <div class="events-section">
                            <h3>Découvrez les événements à ne pas manquer !</h3>
                            <img src="https://via.placeholder.com/600x300" alt="Événement" />
                            <p>Participez aux meilleurs événements étudiants de l'année et élargissez votre réseau !</p>
                            <a href="https://www.eventbrite.com" target="_blank">Voir les événements</a>
                        </div>
            </section>
        </main>

=======
?>
    <link rel="stylesheet" href="./src/css/home.css">
    <main>
        <style>
            .main {
                margin: 20px 10px;
            }

            .btn-home {
                border: #000 solid 2px;
                color: var(--text-color-white);
                background-color: var(--primary-color);
                border-radius: 3px;
                text-decoration: none;
                padding: 10px;
            }
            .events-section {
                margin-top: 20px;
                padding: 15px;
                border: 1px solid var(--gray-border);
                border-radius: 8px;
                background-color: var(--secondary-color);
                color: var(--text-color-black);
                font-family: var(--police-text);
                text-align: center;
            }

            .events-section h3 {
                color: var(--text-color-blue);
                font-size: 1.5em;
                margin-bottom: 10px;
            }

            .events-section img {
                max-width: 100%;
                height: auto;
                border-radius: 5px;
                margin-bottom: 15px;
            }

            .events-section a {
                display: inline-block;
                margin-top: 10px;
                padding: 10px 15px;
                color: var(--text-color-white);
                background-color: var(--primary-color);
                border-radius: 3px;
                text-decoration: none;
                font-size: 1em;
            }

            .events-section a:hover {
                background-color: #000e5c;
            }
        </style>
        <section class="main">
            <a class="btn-home" href="./"><- Accueil</a>
            <div class="events-section">
                <h3>Découvrez les événements à ne pas manquer !</h3>
                <img src="https://via.placeholder.com/600x300" alt="Événement" />
                <p>Participez aux meilleurs événements étudiants de l'année et élargissez votre réseau !</p>
                <a href="https://www.eventbrite.com" target="_blank">Voir les événements</a>
            </div>
        </section>
    </main>
>>>>>>> c6b4e4e67354746aaa6ac7f19534dc498610da24
<?php
    }
}
