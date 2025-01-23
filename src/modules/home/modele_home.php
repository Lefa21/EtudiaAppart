<?php


require_once 'controller_home.php';

class ModHome
{
    private $controleur;

    public function __construct() {}

    public function recupereTop3()
    {
        $query = "
            SELECT 
                Ad.id_ad, 
                Ad.ad_title, 
                Ad.rent_price, 
                Ad.lease_start, 
                Ad.lease_end, 
                COUNT(Favorites_ad.id_user) AS favorite_count
            FROM Ad
            LEFT JOIN Favorites_ad ON Ad.id_ad = Favorites_ad.id_ad
            GROUP BY Ad.id_ad
            ORDER BY favorite_count DESC
            LIMIT 3;
        ";

        $stmt = Connexion::getBdd()->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
