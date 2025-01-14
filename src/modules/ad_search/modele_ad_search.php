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
            $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
            $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
            $city = isset($_POST['city']) ? trim($_POST['city']) : null;
            $address_line = isset($_POST['address_line']) ? trim($_POST['address_line']) : null;
            $latitude = isset($_POST['latitude']) ? round((float)$_POST['latitude'], 6) : null;
            $longitude = isset($_POST['longitude']) ? round((float)$_POST['longitude'], 6) : null;
            $postal_code = isset($_POST['postal_code']) ? trim($_POST['postal_code']) : null;
            
            // Vérifier si tous les champs sont vides
            if (empty($budget) && empty($start_date) && empty($end_date) && empty($city) && empty($address_line) && empty($latitude) && empty($longitude)) {
                // Redirection vers la page d'accueil
                header("Location: /index.php");
                exit();
            }

            // Construire la requête SQL
           
        /*   
        $query = "
        SELECT 
            Ad.*,
            Habitation.*,
            Address.*,
            (
                6371 * ACOS(
                    COS(RADIANS(:latitude)) * COS(RADIANS(Address.latitude)) *
                    COS(RADIANS(Address.longitude) - RADIANS(:longitude)) +
                    SIN(RADIANS(:latitude)) * SIN(RADIANS(Address.latitude))
                )
            ) AS distance
        FROM Ad
        INNER JOIN Habitation ON Ad.id_habitation = Habitation.id_habitation
        INNER JOIN Address ON Habitation.id_address = Address.id_address
        WHERE (:budget IS NULL OR Ad.rent_price <= :budget)
          AND (:start_date IS NULL OR Ad.lease_start >= :start_date)
          AND (:end_date IS NULL OR Ad.lease_end <= :end_date)
          AND (
              :latitude IS NULL OR :longitude IS NULL OR
              (
                  6371 * ACOS(
                      COS(RADIANS(:latitude)) * COS(RADIANS(Address.latitude)) *
                      COS(RADIANS(Address.longitude) - RADIANS(:longitude)) +
                      SIN(RADIANS(:latitude)) * SIN(RADIANS(Address.latitude))
                  )
              ) <= 10
          )
        ORDER BY distance ASC
    ";
    */

    $query = "
    SELECT 
        Ad.*,
        Habitation.*,
        Address.* 
    FROM Ad
    INNER JOIN Habitation ON Ad.id_habitation = Habitation.id_habitation
    INNER JOIN Address ON Habitation.id_address = Address.id_address
    WHERE (:budget IS NULL OR Ad.rent_price <= :budget)
      AND (:start_date IS NULL OR Ad.lease_start >= :start_date)
      AND (:end_date IS NULL OR Ad.lease_end <= :end_date)
      AND (:postal_code IS NULL OR Address.zipCode = :postal_code)";
  
// Préparation de la requête
$stmt = Connexion::getBdd()->prepare($query);

// Lier les paramètres
$stmt->bindParam(':budget', $budget);
$stmt->bindParam(':start_date', $start_date);
$stmt->bindParam(':end_date', $end_date);
$stmt->bindParam(':postal_code', $postal_code);

// Exécuter la requête
$stmt->execute();

// Récupérer les résultats
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Afficher les résultats pour le débogage
var_dump("resultat : ", $results);
die();

    
        if ($results) {
            /*
            foreach ($results as $ad) {
                
                echo "<div class='ad'>";
                echo "<h2>" . htmlspecialchars($ad['ad_title']) . "</h2>";
                echo "<p>Prix : " . htmlspecialchars($ad['rent_price']) . " €</p>";
                echo "<p>Surface : " . htmlspecialchars($ad['surface_area']) . " m²</p>";
                echo "<p>Adresse : " . htmlspecialchars($ad['address_line']) . ", " . htmlspecialchars($ad['city']) . "</p>";
                echo "<p>Description : " . htmlspecialchars($ad['description']) . "</p>";
                echo "</div>";
            }
                */
                return $results;
            
        } else {
            echo "<p>Aucune annonce trouvée pour vos critères.</p>"; // afficher message en bas de la barre de recherche
        }
        
    }
}
}
