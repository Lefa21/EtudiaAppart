<?php

require_once __DIR__  . '/../../connexion.php';

class ModeleAnnonce extends Connexion
{
  public function __construct() {}

  public function getAnnonce($annonceId)
  {
    $pdo = Connexion::getBdd();
    $query = "SELECT 
                    Ad.*,
                    Habitation.*,
                    Address.* 
                FROM Ad
                INNER JOIN Habitation ON Ad.id_habitation = Habitation.id_habitation
                INNER JOIN Address ON Habitation.id_address = Address.id_address
                WHERE id_ad = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$annonceId]);
    $annonce = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($annonce) {
      return $annonce;
    } else {
      return 404;
    }
  }
}
