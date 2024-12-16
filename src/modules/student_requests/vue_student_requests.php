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
        <div class="page-wrapper">
        <main id="main-content" class="main-content" role="main">
            <aside class="sidebar" role="complementary" aria-label="Navigation latérale">
                <div class="profile-header">
                    <img src="assets/photo_profil.png" alt="Photo de profil de Ben youssef Faël" class="profile-icon" width="49" height="49" />
                    <div class="profile-info">
                        <span class="profile-name">Ben youssef Faël</span>
                        <span class="profile-type">Profil étudiant</span>
                    </div>
                </div>

                <nav class="nav-menu" role="navigation" aria-label="Menu principal">
                    <a href="#profile" class="nav-item">
                        <img src="assets/icon_profil.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Profil</span>
                    </a>
                    <a href="#dossier" class="nav-item">
                        <img src="assets/icon_documents_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Mon dossier</span>
                    </a>
                    <a href="#requests" class="nav-item active" aria-current="page">
                        <img src="assets/icon_follow_request.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Suivi des demandes</span>
                    </a>
                    <a href="#messages" class="nav-item">
                        <img src="assets/icon_messages_profile.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Messagerie</span>
                    </a>
                    <a href="#favorites" class="nav-item">
                        <img src="assets/icon_wishlist.svg" alt="" class="nav-icon" width="30" height="30" aria-hidden="true" />
                        <span>Mes favoris</span>
                    </a>
                </nav>

                <button class="action-button primary" aria-label="Accéder aux paramètres">Paramètres</button>
            </aside>

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
