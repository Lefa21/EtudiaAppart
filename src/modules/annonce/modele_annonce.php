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

  public function annonceApply($annonceId)
  {
    $pdo = Connexion::getBdd();
    // Check if the ad exists in the database
    $stmt = $pdo->prepare("SELECT id_ad FROM Ad WHERE id_ad = ?");
    $stmt->execute([$annonceId]);
    $ad = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$ad) {
      echo json_encode([
        'success' => false,
        'message' => "Asked ad does not exist.",
        'redirect' => 'index.php?module=annonce&action=ad_search'
      ]);
      exit;
    }

    // Perform the application logic (e.g., save to a database)
    try {
      $userId = $_SESSION['userId'];
      $applyStmt = $pdo->prepare("INSERT INTO Application (id_user, id_ad, date) VALUES (?, ?, NOW())");
      $applyStmt->execute([$userId, $annonceId]);

      echo json_encode([
        'success' => true,
        'message' => 'Votre candidature a été enregistrée avec succès.',
        'redirect' => null
      ]);
    } catch (PDOException $e) {
      echo json_encode([
        'success' => false,
        'message' => $e,
        'redirect' => null
      ]);
    }
  }
}
