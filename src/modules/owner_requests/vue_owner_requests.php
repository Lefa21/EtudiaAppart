<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueOwnerRequests extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function followUpRequests()
    {
?>

    <link rel="stylesheet" href="./src/css/owner_requests.css">
   <div class="page-wrapper">
    <main id="main-content" class="main-content-owner_request" role="main">
     <div class="container-owner_request">
        <?php
            include "./src/menu_my_account.php";
        ?>
            <section class="content-area" aria-label="Suivi des demandes">
                <div class="filters" role="group" aria-label="Filtres de recherche">
                    <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
                        Date
                        <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                    </button>
                    <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
                        Status
                        <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                    </button>
                    <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
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
                                <th scope="col" class="table-header">Dossier étudiant</th>
                                <th scope="col" class="table-header">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-row">
                                <td class="table-cell">Résidence crous</td>
                                <td class="table-cell">2023-04-10</td>
                                <td class="table-cell">
                                    <button class="action-button primary">voir le dossier</button>
                                </td>
                                <td class="table-cell">
                                    <a href="index.php?module=owner_requests&action=manage_application"><button class="action-button secondary">Gérer la demande</button></a>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="table-cell">Studio à Paris 15 ème</td>
                                <td class="table-cell">2023-04-05</td>
                                <td class="table-cell">
                                    <button class="action-button primary">voir le dossier</button>
                                </td>
                                <td class="table-cell">
                                    <a href="index.php?module=owner_requests&action=manage_application"><button class="action-button secondary">Gérer la demande</button></a>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="table-cell">Studio à Issy-Les-Moulineaux</td>
                                <td class="table-cell">2023-04-01</td>
                                <td class="table-cell">
                                    <button class="action-button primary">voir le dossier</button>
                                </td>
                                <td class="table-cell">
                                    <a href="index.php?module=owner_requests&action=manage_application"><button class="action-button secondary">Gérer la demande</button></a>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="table-cell">T2 Paris 13 ème</td>
                                <td class="table-cell">2023-03-28</td>
                                <td class="table-cell">
                                    <button class="action-button primary">voir le dossier</button>
                                </td>
                                <td class="table-cell">
                                    <a href="index.php?module=owner_requests&action=manage_application"><button class="action-button secondary">Gérer la demande</button></a>
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
    </div>
        </main>
    </div>
<?php
    }

    public function show_application(){
        ?>

<link rel="stylesheet" href="./src/css/owner_manage_application.css">
<?php
            include "./src/menu_my_account.php";
        ?>
    <div class="applications-container">
        <div class="applications-frame">
            <div class="applications-header">
                <div class="header-top">
                    <a href="index.php?module=owner_requests&action=follow-up_owner_requests">
                    <button class="back-button" aria-label="Retour">
                        <img src="assets/icon_arrow_left.svg" alt="" class="back-icon" />
                    </button>
                    </a>
                </div>
                <h1 class="page-title">Demandes</h1>
                
                <div class="filter-section-application">
                    <h2 class="filter-title">Trier par</h2>
                    <div class="filter-options" role="group" aria-label="Options de filtrage">
                        <button class="filter-button-manage">Date</button>
                        <button class="filter-button-manage">Logement</button>
                        <button class="filter-button-manage">Statut</button>
                    </div>
                </div>

                <div class="applications-list">
                    <div class="application-item">
                        <div class="application-details">
                            <span class="property-name">Appartement 1 chambre</span>
                            <span class="application-date">12 jan. 2023</span>
                        </div>
                        <div class="status-indicator" role="status" aria-label="Statut de la demande"></div>
                    </div>

                    <div class="application-item">
                        <div class="application-details">
                            <span class="property-name">Maison 2 chambres</span>
                            <span class="application-date">14 jan. 2023</span>
                        </div>
                        <div class="status-indicator" role="status" aria-label="Statut de la demande"></div>
                    </div>

                    <div class="application-item">
                        <div class="application-details">
                            <span class="property-name">Maison 3 chambres</span>
                            <span class="application-date">17 jan. 2023</span>
                        </div>
                        <div class="status-indicator" role="status" aria-label="Statut de la demande"></div>
                    </div>

                    <div class="application-item">
                        <div class="application-details">
                            <span class="property-name">Maison 4 chambres</span>
                            <span class="application-date">19 jan. 2023</span>
                        </div>
                        <div class="status-indicator" role="status" aria-label="Statut de la demande"></div>
                    </div>
                </div>
            </div>

            <div class="actions-container">
                <button class="action-button primary-button">Voir le dossier étudiant</button>
                <button class="action-button secondary-button">Accepter la demande</button>
                <button class="action-button outline-button">Rejeter la demande</button>
            </div>
        </div>
    </div>
        <?php
    }
}
