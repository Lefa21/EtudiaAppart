<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleSearchAd extends Connexion
{
    public function __construct() {}

    public function getAd()
    {
        if ($_SESSION['home_page'] == 1) {
            $previousSearch = [];
        } else {
            $previousSearch = isset($_SESSION['search']) ? $_SESSION['search'] : [];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

            $_SESSION['search'] = array_merge($previousSearch, $_POST);
            $currentSearch = $_SESSION['search'];


            $search_ad = isset($currentSearch['search_ad']) && !empty($currentSearch['search_ad']) ? trim(strtolower($currentSearch['search_ad'])) : null;
            $start_date = isset($currentSearch['start_date']) && !empty($currentSearch['start_date']) ? $currentSearch['start_date'] : null;
            $end_date = isset($currentSearch['end_date']) && !empty($currentSearch['end_date']) ? $currentSearch['end_date'] : null;
            $city = isset($currentSearch['city']) && !empty($currentSearch['city']) ? trim(strtolower($currentSearch['city'])) : null;
            $country = isset($currentSearch['country']) && !empty($currentSearch['country']) ? trim(strtolower($currentSearch['country'])) : null;
            $surfaceMin = isset($currentSearch['surface_min']) && $currentSearch['surface_min'] !== '' ? (int)$currentSearch['surface_min'] : null;
            $surfaceMax = isset($currentSearch['surface_max']) && $currentSearch['surface_max'] !== '' ? (int)$currentSearch['surface_max'] : null;
            $rooms = isset($currentSearch['rooms']) && $currentSearch['rooms'] !== '' ? (int)$currentSearch['rooms'] : null;
            $budget = isset($currentSearch['budget']) && $currentSearch['budget'] !== '' ? (int)$currentSearch['budget'] : null;
            $priceMin = isset($currentSearch['price_min']) && $currentSearch['price_min'] !== '' ? (int)$currentSearch['price_min'] : null;
            $priceMax = isset($currentSearch['price_max']) && $currentSearch['price_max'] !== '' ? (int)$currentSearch['price_max'] : null;
            $selectedHousingTypes = !empty($currentSearch['housing_type']) ? $currentSearch['housing_type'] : null;
            $habitationFurnished = isset($currentSearch['habitation_furnished']) && !empty($currentSearch['habitation_furnished']) ? $currentSearch['habitation_furnished'] : null;
            $start_date = isset($currentSearch['start_date']) && !empty($currentSearch['start_date']) ? $currentSearch['start_date'] : null;

            $query = "
            SELECT 
                Ad.*, 
                Habitation.*, 
                Address.*, 
                Images.ImageID, 
                Images.ImageName, 
                Images.ImageData 
            FROM Ad
            INNER JOIN Habitation ON Ad.id_habitation = Habitation.id_habitation
            INNER JOIN Address ON Habitation.id_address = Address.id_address
            LEFT JOIN Images ON Ad.id_ad = Images.id_ad
            WHERE 1=1
        ";

            $params = [];

            // Ajout conditionnel des filtres
            if ($budget !== null) {
                $query .= " AND Ad.rent_price <= :budget";
                $params[':budget'] = $budget;
            }
            if ($priceMin !== null) {
                $query .= " AND Ad.rent_price >= :priceMin";
                $params[':priceMin'] = $priceMin;
            }
            if ($priceMax !== null) {
                $query .= " AND Ad.rent_price <= :priceMax";
                $params[':priceMax'] = $priceMax;
            }
            if ($search_ad !== null) {
                $query .= " AND Ad.ad_title LIKE :keyword";
                $params[':keyword'] = "%$search_ad%";
            }
            if ($start_date !== null && $end_date !== null) {
                $query .= " AND (
                (Ad.lease_start BETWEEN :start_date AND :end_date) OR 
                (Ad.lease_end BETWEEN :start_date AND :end_date) OR 
                (:start_date BETWEEN Ad.lease_start AND Ad.lease_end) OR
                (:end_date BETWEEN Ad.lease_start AND Ad.lease_end)
            )";
                $params[':start_date'] = $start_date;
                $params[':end_date'] = $end_date;
            }
            if ($country !== null) {
                $query .= " AND LOWER(Address.country) = LOWER(:country)";
                $params[':country'] = $country;
            }
            if ($city !== null) {
                $query .= " AND LOWER(Address.city) = LOWER(:city)";
                $params[':city'] = $city;
            }
            if ($surfaceMin !== null) {
                $query .= " AND Habitation.surface_area >= :surfaceMin";
                $params[':surfaceMin'] = $surfaceMin;
            }
            if ($surfaceMax !== null) {
                $query .= " AND Habitation.surface_area <= :surfaceMax";
                $params[':surfaceMax'] = $surfaceMax;
            }
            if ($habitationFurnished !== null) {
                $habitationFurnished = ($habitationFurnished === "oui") ? 1 : 0;
                $query .= " AND Habitation.furnished = :habitationFurnished";
                $params[':habitationFurnished'] = $habitationFurnished;
            }
            if ($rooms !== null) {
                $query .= " AND Habitation.numbers_rooms = :rooms";
                $params[':rooms'] = $rooms;
            }
            if (!empty($selectedHousingTypes) && is_array($selectedHousingTypes)) {
                $placeholders = [];
                foreach ($selectedHousingTypes as $index => $type) {
                    $placeholder = ":housing_type_" . $index;
                    $placeholders[] = $placeholder;
                    $params[$placeholder] = $type;
                }
                if (!empty($placeholders)) {
                    $query .= " AND Habitation.type_habitation IN (" . implode(", ", $placeholders) . ")";
                }
            }
            
            $stmt = Connexion::getBdd()->prepare($query);

            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return [
                'results' => $results,
                'search_criteria' => $currentSearch
            ];
        }

        return [];
    }

    public function searchAdTitles($keyword)
    {
        $query = "SELECT ad_title FROM Ad WHERE ad_title LIKE :keyword LIMIT 10";
        $stmt = Connexion::getBdd()->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertFavorite($userId, $adId)
    {

        $query = "INSERT INTO Favorites_ad (id_user, id_ad) VALUES (:id_user, :id_ad)";
        $stmt = Connexion::getBdd()->prepare($query);

        // Point de contrôle 4 : Logguez les valeurs bindées
        var_dump("Binding - User ID : $userId, Ad ID : $adId");

        $stmt->bindParam(':id_user', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':id_ad', $adId, PDO::PARAM_INT);

        $result = $stmt->execute();

        // Point de contrôle 5 : Logguez le succès ou l'échec de l'exécution
        var_dump("Insertion SQL : " . ($result ? 'Succès' : 'Échec') . " - Erreur SQL : " . print_r($stmt->errorInfo(), true));

        return $result;
    }
}
