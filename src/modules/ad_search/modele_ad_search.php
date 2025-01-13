<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleSearchAd extends Connexion
{
    public function __construct()
    {
    }

     public function getAdd()
    {

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // Récupérer les données
    $budget = isset($_POST['budget']) ? (int)$_POST['budget'] : null;
    $start_date = isset($_POST['start-date']) ? $_POST['start-date'] : null;
    $end_date = isset($_POST['end-date']) ? $_POST['end-date'] : null;
    $location = isset($_POST['location']) ? trim($_POST['location']) : null;
    $city = isset($_POST['city']) ? trim($_POST['city']): null;
    $address_line = isset($_POST['address_line']) ? trim($_POST['address_line']) : null;
    $country = isset($_POST['country']) ? trim($_POST['country']): null;

    // Construire la requête SQL
    $query = "
        SELECT 
            Ad.*,
            Habitation.*,
            Address.*
        FROM Ad
        INNER JOIN Habitation ON Ad.id_habitation = Habitation.id_habitation
        INNER JOIN Address ON Habitation.id_address = Address.id_address
        WHERE Ad.rent_price <= :budget
          AND Ad.lease_start >= :start_date
          AND Ad.lease_end <= :end_date
          AND Address.city = :city
          AND Address.address_line LIKE :address_line
          AND Address.country = :country
    ";

    $stmt = Connexion::getBdd()->prepare($query);
    $stmt->execute([
        ':budget' => $budget,
        ':start_date' => $start_date,
        ':end_date' => $end_date,
        ':city' => $city,
        ':address_line' => "%$address_line%",
        ':country' => $country,
    ]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($results) {
        foreach ($results as $ad) {
            echo "<div class='ad'>";
            echo "<h2>" . htmlspecialchars($ad['ad_title']) . "</h2>";
            echo "<p>Prix : " . htmlspecialchars($ad['rent_price']) . " €</p>";
            echo "<p>Surface : " . htmlspecialchars($ad['surface_area']) . " m²</p>";
            echo "<p>Adresse : " . htmlspecialchars($ad['address_line']) . ", " . htmlspecialchars($ad['city']) . "</p>";
            echo "<p>Description : " . htmlspecialchars($ad['description']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucune annonce trouvée pour vos critères.</p>";
    }

}
}
}
?>
