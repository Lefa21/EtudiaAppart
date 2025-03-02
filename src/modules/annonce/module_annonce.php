<?php

include_once 'controller_annonce.php';

class ModuleAnnonce
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerAnnonce();

        switch ($this->controller->getAction()) {
            case 'annoncePage':
                if (isset($_GET['id_ad'])) {
                    $annonceId = htmlspecialchars($_GET['id_ad']); // Sanitize the input

                    // Perform actions with the $idAd, like querying the database
                } else {
                    //echo "No Ad ID provided!";
                }
                $this->controller->annoncePage($annonceId);
                break;

            case 'annonceApply':
                if (!isset($_SESSION['userId'])) {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Vous devez être connecté pour postuler.',
                        'redirect' => 'index.php?module=connexion&action=formulaireConnexion'
                    ]);
                    exit;
                } else {
                    if (!isset($_GET['id_ad'])) {
                        echo json_encode([
                            'success' => false,
                            'message' => 'Unspecified ad id',
                            'redirect' => 'index.php?module=ad_search'
                        ]);
                        exit;
                    }
                    $annonceId = htmlspecialchars($_GET['id_ad']);
                    $this->controller->annonceApply($annonceId);
                }
                break;

            case 'reportAd':
                if (!isset($_SESSION['userId'])) {
                    echo json_encode([
                        'success' => false,
                        'message' => 'Vous devez être connecté pour signaler une annonce.',
                        'redirect' => 'index.php?module=connexion&action=formulaireConnexion'
                    ]);
                    exit;
                } else {
                    if (!isset($_GET['id_ad'])) {
                        echo json_encode([
                            'success' => false,
                            'message' => 'Unspecified ad id',
                        ]);
                        exit;
                    }
                    $annonceId = htmlspecialchars($_GET['id_ad']);
                    $this->controller->reportAd($annonceId);
                }
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}
