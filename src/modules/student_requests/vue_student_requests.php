<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueStudentRequests extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function followUpRequests()
    {
?>
        <link rel="stylesheet" href="./src/css/student_requests.css">
        <div class="page-wrapper">
        <main id="main-content" class="main-content" role="main">
        <?php
            include "./src/menu_my_account.php";
        ?>

            <section class="content-area" aria-label="Suivi des demandes">
                <div class="filters" role="group" aria-label="Filtres de recherche">
                    <button class="filter-button" aria-expanded="false" aria-haspopup="listbox">
                        Date
                        <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                    </button>
                    <button class="filter-button" aria-expanded="false" aria-haspopup="listbox">
                        Status
                        <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                    </button>
                    <button class="filter-button" aria-expanded="false" aria-haspopup="listbox">
                        Type de logment
                        <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="requests-table" aria-label="Liste des demandes">
                        <thead>
                            <tr>
                                <th scope="col" class="table-header">Type de logement</th>
                                <th scope="col" class="table-header">Date de la demande</th>
                                <th scope="col" class="table-header">Statut actuel</th>
                                <th scope="col" class="table-header">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-row">
                                <td class="table-cell">Résidence crous</td>
                                <td class="table-cell">2023-04-10</td>
                                <td class="table-cell">
                                    <button class="statut-actuel_info secondary">En cours</button>
                                </td>
                                <td class="table-cell">
                                    <a class="action-link">Voir/modifier la <br> demande</a>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="table-cell">Studio à Paris 15 ème</td>
                                <td class="table-cell">2023-04-05</td>
                                <td class="table-cell">
                                    <button class="statut-actuel_info secondary">Accepté</button>
                                </td>
                                <td class="table-cell">
                                    <a class="action-link">Voir/modifier la <br> demande</a>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="table-cell">Studio à Issy-Les-Moulineaux</td>
                                <td class="table-cell">2023-04-01</td>
                                <td class="table-cell">
                                    <button class="statut-actuel_info secondary">En cours</button>
                                </td>
                                <td class="table-cell">
                                <a class="action-link">Voir/modifier la <br> demande</a>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="table-cell">T2 Paris 13 ème</td>
                                <td class="table-cell">2023-03-28</td>
                                <td class="table-cell">
                                    <button class="statut-actuel_info secondary">Accepté</button>
                                </td>
                                <td class="table-cell">
                                <a class="action-link">Voir/modifier la <br> demande</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="notifications" role="region" aria-label="Notifications">
                    <h2 class="notification-title">Notifications/Mise à jour</h2>
                    <p class="notification-text">Consultez cette page pour connaître l'état d'avancement de votre candidature.</p>
                    <a href="#updates" class="notification-link">
                        Voir toutes les mises à jour
                        <img src="assets/icon_arrow_left.svg" alt="" width="25" height="25" aria-hidden="true" />
                    </a>
                </div>
            </section>
        </main>
    </div>
<?php
    }
}
