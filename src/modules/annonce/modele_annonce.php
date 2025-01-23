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
        'redirect' => 'index.php?module=ad_search'
      ]);
      exit;
    }

    // Perform the application logic (e.g., save to a database)
    try {
      $userId = $_SESSION['userId'];

      $query = "
      SELECT 
            u.id_user, d.file_name, d.description
        FROM 
            User u
        LEFT JOIN 
            Document d ON u.id_user = d.id_user
        WHERE 
            u.id_user = ? AND d.file_name = 'url_dossierFacile'
      ";

      $stmt = $pdo->prepare($query);
      $stmt->execute([$userId]);
      $isUrlSet = $stmt->fetch(PDO::FETCH_ASSOC);

      if (!$isUrlSet) {
        echo json_encode([
          'success' => false,
          'message' => "User Record (dossierFacile) inexistent.",
          'redirect' => null
        ]);
        exit;
      }

      $applyStmt = $pdo->prepare("INSERT INTO Application (id_user, id_ad, date, url_dossierFacile) VALUES (?, ?, NOW(), ?)");
      $applyStmt->execute([$userId, $annonceId, $isUrlSet['description']]);

      echo json_encode([
        'success' => true,
        'message' => 'Votre candidature a été enregistrée avec succès.',
        'redirect' => null
      ]);
      exit;
    } catch (PDOException $e) {
      echo json_encode([
        'success' => false,
        'message' => $e,
        'redirect' => 'index.php?module=home'
      ]);
      exit;
    }
  }

  public function reportAd($annonceId)
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
      ]);
      exit;
    }

    // Perform the application logic (e.g., save to a database)
    try {
      // Ensure the request is POST and the user is logged in
      if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['userId'])) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Invalid request or user not logged in.']);
        exit;
      }
      $inputs = json_decode(file_get_contents('php://input'), true);

      $userId = $_SESSION['userId'];

      if (empty($inputs['reportType'])) {
        echo json_encode([
          'success' => false,
          'message' => "Report reason is missing.",
          'redirect' => null
        ]);
        exit;
      }

      $report_type = $inputs['reportType'];
      //var_dump($report_type);

      if (!empty($inputs['reportInfo'])) {
        $message = $inputs['reportInfo'];
      } else {
        $message = null;
      }

      $query = "
      SELECT 
            r.id_user, r.id_ad, r.report_type
        FROM 
            Report r
        WHERE 
            r.id_user = ? AND r.id_ad = ? AND r.report_type = ?
      ";

      $stmt = $pdo->prepare($query);
      $stmt->execute([$userId, $annonceId, $report_type]);
      $isReportAlready = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($isReportAlready) {
        echo json_encode([
          'success' => false,
          'message' => "You already have report this ad for the same reason.",
          'redirect' => null
        ]);
        exit;
      }

      $applyStmt = $pdo->prepare("INSERT INTO Report (date_report, message, report_type, id_user, id_ad) VALUES (NOW(), ?, ?, ?, ?)");
      $applyStmt->execute([$message, $report_type, $userId, $annonceId]);

      echo json_encode([
        'success' => true,
        'message' => 'Votre signalement a été enregistrée avec succès.',
        'redirect' => 'index.php?module=annonce&action=annoncePage&id_ad=' . $annonceId,
      ]);
      exit;
    } catch (PDOException $e) {
      echo json_encode([
        'success' => false,
        'message' => $e,
        'redirect' => 'index.php?module=home',
      ]);
      exit;
    }
  }
}
