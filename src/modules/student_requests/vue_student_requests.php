<?php

require_once __DIR__  . '/../../vue_generique.php';

class VueStudentRequests extends VueGenerique
{
    public function __construct()
    {
        parent::__construct();
    }

    public function followUpRequests($requestData)
    {
?>
        <link rel="stylesheet" href="./src/css/student_requests.css">
        <script type="text/javascript" src="./src/scripts/filter_student_owner_request.js"></script>
        <main id="main-content" class="main-content-student_request" role="main">
            <?php
            include "./src/menu_my_account.php";
            ?>
            <section class="content-area" aria-label="Suivi des demandes">
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

                    <!-- Date -->
                    <div>
                        <button class="filter-button-request" aria-expanded="false" aria-haspopup="listbox">
                            Date
                            <img src="assets/icon_arrow_down.svg" alt="" width="25" height="25" aria-hidden="true" />
                        </button>
                        <ul class="filter-menu" data-filter="date">
                            <?php foreach ($dates as $date):
                                $date = new DateTime($date);
                                $formattedDate = $date->format('Y-m-d'); ?>
                                <li data-value="<?= htmlspecialchars($formattedDate) ?>"><?= htmlspecialchars($formattedDate) ?></li>
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
                                <th scope="col" class="table-header">Statut actuel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($requestData['requests'])) {
                                foreach ($requestData['requests'] as $request) {
                                    $date = new DateTime($request['date']);
                                    $formattedDate = $date->format('Y-m-d'); ?>
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
                                        <td class="table-cell">
                                            <button class="statut-actuel_info secondary"><?= htmlspecialchars($request['current_status']) ?></button>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
<?php
    }
}
