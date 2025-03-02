<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueHome extends VueGenerique

{

    public function __construct()

    {

        parent::__construct();
    }



    public function welcome($result)

    {
        $_SESSION['home_page'] = 1;
?>
        <script type="text/javascript" src="./src/scripts/search_address_home.js"></script>
        <link rel="stylesheet" href="./src/css/home.css">
        <main>
            <section class="vie-etudiante">
                <div class="dropdown">
                    <button class="v-e-btn">
                        <img src="assets/banner_etudiant_home.svg" alt="" id="banner-icon" /> Vie Etudiante
                    </button>
                    <div class="dropdown-content">
                        <a href="index.php?module=home&action=bonsPlans"> <img src="assets/tcheck.svg" alt="">Bons Plans</a>
                        <a href="index.php?module=home&action=restauration"><img src="assets/food.svg" alt="">Restauration étudiante</a>
                        <a href="index.php?module=home&action=events"><img src="assets/party.svg" alt="">Evenements</a>
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
                <h1>Les 3 logements les plus demandés</h1>
            </div>




            <section class="apparts">

                    <section class="property-grid">
                        <?php if (!empty($result) && is_array($result)): ?>
                            <?php foreach ($result as $ad): ?>
                                <article class="property-card">
                                    <img src="assets/default_property.jpg" alt="Property" class="property-image" />
                                    <div class="property-info">
                                        <div style="display: flex; justify-content: space-between;">
                                            <p style="margin: 0;">
                                                <i class="fas fa-heart" style="color: red;"></i> <?php echo htmlspecialchars("Likes : " . $ad['favorite_count']); ?>
                                            </p>
                                        </div>
                                        <p><strong>Titre :</strong> <?php echo htmlspecialchars($ad['ad_title']); ?></p>
                                        <p><strong>Prix :</strong> <?php echo htmlspecialchars($ad['rent_price']); ?> €</p>
                                        <p><strong>Date début :</strong> <?php echo htmlspecialchars($ad['lease_start']); ?></p>
                                        <p><strong>Date fin :</strong> <?php echo htmlspecialchars($ad['lease_end']); ?></p>

                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Aucune annonce disponible pour le moment. Revenez plus tard ou modifiez vos critères de recherche.</p>
                        <?php endif; ?>
                    </section>
                </section>


            <script defer>
                const startDateInput = document.getElementById('start_date');
                const endDateInput = document.getElementById('end_date');
                const menuBannerIcon = document.getElementById('banner-icon');

                startDateInput.addEventListener('change', () => {
                    if (endDateInput.value && new Date(endDateInput.value) < new Date(startDateInput.value)) {
                        endDateInput.value = ''; // Réinitialise si invalide
                    }
                    endDateInput.min = startDateInput.value; // Définit la limite minimale
                });
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


                function openMenu() {
                    const dropdownContent = document.querySelector('.dropdown-content');
                    const button = document.querySelector('.v-e-btn');

                    // Afficher ou masquer le menu
                    dropdownContent.classList.toggle('show');

                    // Ajouter ou supprimer la classe pour changer les bordures
                    button.classList.toggle('no-border');
                }

                menuBannerIcon.addEventListener('click', () => {
                    openMenu();
                })
                document.querySelector('.v-e-btn').addEventListener('click', () => {
                    openMenu();
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
    <?php
    }

    public function notPermitted()
    {
    ?>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Accès refusé</title>
        </head>
        <main>
            <h1>Accès refusé</h1>
            <p>Vous n'avez pas l'autorisation d'accéder à cette page.</p>
            <a href="index.php">Retour à l'accueil</a>
        </main>

<?php
    }
}
