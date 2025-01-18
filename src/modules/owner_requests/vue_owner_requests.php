<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueOwnerRequests extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function followUpRequests($requestData)
    {
?>

        <link rel="stylesheet" href="./src/css/owner_requests.css">
        <script type="text/javascript" src="./src/scripts/filter_student_owner_request.js"></script>
        <script type="text/javascript" src="./src/scripts/redirect_student_file.js"></script>
        <div class="page-wrapper">
            <main id="main-content" class="main-content-owner_request" role="main">
                <div class="container-owner_request">
                    <?php
                    include "./src/menu_my_account.php";
                    ?>

                    <section class="content-area" aria-label="Suivi des demandes">
                        <div class="section-header-owner">
                            <h1 class="section-title-owner">Mes demandes</h1>
                        </div>
                        <div class="filters" role="group" aria-label="Filtres de recherche">
                            <?php
                            // Extraire les valeurs uniques pour chaque filtre
                            $types = array_unique(array_column($requestData['requests'], 'type_habitation'));
                            $cities = array_unique(array_column($requestData['requests'], 'city'));
                            $statuses = array_unique(array_column($requestData['requests'], 'current_status'));
                            $zipCodes = array_unique(array_column($requestData['requests'], 'zipCode'));
                            $dates = array_unique(array_column($requestData['requests'], 'date'));
                            ?>

                            <!-- Type de logement -->
                            <div>
                                <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
                                    Type logement
                                    <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                                </button>
                                <ul class="filter-menu" data-filter="type_habitation">
                                    <?php foreach ($types as $type): ?>
                                        <li data-value="<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($type) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- Ville -->
                            <div>
                                <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
                                    Ville
                                    <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                                </button>
                                <ul class="filter-menu" data-filter="city">
                                    <?php foreach ($cities as $city): ?>
                                        <li data-value="<?= htmlspecialchars($city) ?>"><?= htmlspecialchars($city) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div>
                                <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
                                    Date
                                    <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                                </button>
                                <ul class="filter-menu" data-filter="date">
                                    <?php foreach ($dates as $date): 
                                        $date = new DateTime($date);
                                        $formattedDate = $date->format('Y-m-d');?>
                                        <li data-value="<?= htmlspecialchars($formattedDate) ?>"><?= htmlspecialchars($formattedDate) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>


                            <!-- Status -->
                            <div>
                                <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
                                    Status
                                    <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                                </button>
                                <ul class="filter-menu" data-filter="current_status">
                                    <?php foreach ($statuses as $status): ?>
                                        <li data-value="<?= htmlspecialchars($status) ?>"><?= htmlspecialchars($status) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <!-- Code postal -->
                            <div>
                                <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
                                    Code postal
                                    <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                                </button>
                                <ul class="filter-menu" data-filter="zipCode">
                                    <?php foreach ($zipCodes as $zipCode): ?>
                                        <li data-value="<?= htmlspecialchars($zipCode) ?>"><?= htmlspecialchars($zipCode) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="requests-table" aria-label="Liste des demandes">
                                <thead>
                                    <tr>
                                        <th scope="col" class="table-header">Annonce</th>
                                        <th scope="col" class="table-header">Type de logement</th>
                                        <th scope="col" class="table-header">Adresse</th>
                                        <th scope="col" class="table-header">Ville</th>
                                        <th scope="col" class="table-header">Code postal</th>
                                        <th scope="col" class="table-header">Date de la demande</th>
                                        <th scope="col" class="table-header">Status</th>
                                        <th scope="col" class="table-header">Dossier étudiant</th>
                                        <th scope="col" class="table-header">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($requestData['requests'])) {
                                        foreach ($requestData['requests'] as $request) { 
                                            $date = new DateTime($request['date']);
                                            $formattedDate = $date->format('Y-m-d');
                                            ?>

                                            <tr class="table-row" data-type_habitation="<?= htmlspecialchars($request['type_habitation']) ?>"
                                                data-city="<?= htmlspecialchars($request['city']) ?>"
                                                data-current_status="<?= htmlspecialchars($request['current_status']) ?>"
                                                data-zipCode="<?= htmlspecialchars($request['zipCode']) ?>">
                                                <td class="table-cell"><?= htmlspecialchars($request['ad_title']) ?></td>
                                                <td class="table-cell"><?= htmlspecialchars($request['type_habitation']) ?></td>
                                                <td class="table-cell"><?= htmlspecialchars($request['address_line']) ?></td>
                                                <td class="table-cell"><?= htmlspecialchars($request['city']) ?></td>
                                                <td class="table-cell"><?= htmlspecialchars($request['zipCode']) ?></td>
                                                <td class="table-cell"><?= htmlspecialchars($formattedDate) ?></td>
                                                <td class="table-cell"><?= htmlspecialchars($request['current_status']) ?></td>
                                                <td class="table-cell">
                                                    <button class="action-button primary" data-file-url="<?= htmlspecialchars($request['file_name']) ?>">Voir le dossier</button>
                                                </td>
                                                <td class="table-cell">
                                                    <form action="index.php?module=owner_requests&action=manage_application" method="POST">
                                                        <input hidden value="<?= htmlspecialchars($request['id_application']) ?>" name="id_application">
                                                        <input hidden value="<?= htmlspecialchars($request['id_student']) ?>" name="id_student">
                                                        <input hidden value="<?= htmlspecialchars($request['id_owner']) ?>" name="id_owner">
                                                        <button type="submit" name="submit" class="action-button secondary">Gérer la demande</button>
                                                    </form>
                                                    </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                    </section>
                </div>
            </main>
        </div>
    <?php
    }

    public function show_application($requestData)
    {
    ?>

        <link rel="stylesheet" href="./src/css/owner_manage_application.css">
        <script type="text/javascript" src="./src/scripts/redirect_student_file.js"></script>
        <?php
        include "./src/menu_my_account.php";
        ?>
        <div class="applications-container">
            <div class="applications-frame">
                <div class="applications-header">
                    <div class="header-top">
                        <a href="index.php?module=owner_requests&action=follow-up_owner_requests">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18 8C18 8.41421 17.6642 8.75 17.25 8.75H2.56031L8.03063 14.2194C8.32368 14.5124 8.32368 14.9876 8.03063 15.2806C7.73757 15.5737 7.26243 15.5737 6.96937 15.2806L0.219375 8.53063C0.0785422 8.38995 -0.000590086 8.19906 -0.000590086 8C-0.000590086 7.80094 0.0785422 7.61005 0.219375 7.46937L6.96937 0.719375C7.26243 0.426319 7.73757 0.426319 8.03063 0.719375C8.32368 1.01243 8.32368 1.48757 8.03063 1.78062L2.56031 7.25H17.25C17.6642 7.25 18 7.58579 18 8Z" fill="black" />
                            </svg>
                        </a>
                    </div>
                    <div class="section-header-owner_application">
                        <h1 class="section-title-owner_application">Gestion des demandes</h1>
                    </div>

                    <div class="applications-list">
                        <?php
                        if (!empty($requestData)) {
                            $apply = $requestData[0];
                            $date = new DateTime($apply['date']);
                            $formattedDate = $date->format('Y-m-d');
                        ?>

                            <div class="application-item">
                                <div class="application-details">
                                    <span class="property-name"><?= htmlspecialchars($apply['ad_title']) ?></span>
                                    <span class="property-address"><?= htmlspecialchars($apply['address_line']) ?></span>
                                    <span class="property-address"><?= htmlspecialchars($apply['city']) ?></span>
                                    <span class="property-address"><?= htmlspecialchars($apply['zipCode']) ?></span>
                                    <span class="application-date"><?= htmlspecialchars($formattedDate) ?></span>
                                </div>
                                <div class="status-indicator" role="status" aria-label="Statut de la demande"></div>
                            </div>
                       
                    </div>
                </div>

                <div class="actions-container">
                    <button class="action-button primary-button" data-file-url="<?= htmlspecialchars($apply['file_name']) ?>">Voir le dossier étudiant</button>
                    <button type="submit" name="submit" class="action-button secondary-button">Accepter la demande</button>
                    <button type="submit" name="submit" class="action-button outline-button">Rejeter la demande</button>
                </div>
                <?php
                        } ?>
            </div>
        </div>
<?php
    }
}
