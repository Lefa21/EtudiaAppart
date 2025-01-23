<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleFavorites extends Connexion
{
    public function __construct() {}

    public function recupFavorites($userId)
    {
        $query = "
            SELECT 
                Ad.id_ad, 
                Ad.ad_title, 
                Ad.rent_price, 
                Ad.lease_start, 
                Ad.lease_end
            FROM Ad
            INNER JOIN Favorites_ad ON Ad.id_ad = Favorites_ad.id_ad
            WHERE Favorites_ad.id_user = :userId
            ORDER BY Ad.lease_start ASC;
        ";

        $stmt = Connexion::getBdd()->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function formatDate($date){
        if (empty($date)) {
            return 'Non spécifié';
        }

        $dateObj = new DateTime($date);
        $formatter = new IntlDateFormatter(
            'fr_FR',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE
        );

        return $formatter->format($dateObj);
    }
}
