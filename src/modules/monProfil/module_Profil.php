<?php

include_once 'controller_Profil.php';
require_once 'modele_Profil.php';

class ModuleProfil
{
    private $controller;

    public function __construct()
    {
        $this->controller = new ControllerProfil();
        $emailIdentification = $_SESSION['identifiant_utilisateur'] ?? null;
        switch ($this->controller->getAction()) {
            
            case 'Profil':
                if ($emailIdentification === null) {
                    header('Location: login.php');
                    exit();
                }else{
                    $this->controller->profil($emailIdentification);
                }

            case 'updateProfil': 
                if ($emailIdentification) {
                    $this->controller->handleAjaxRequest($emailIdentification);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Utilisateur non authentifié']);
                }
                break;

            default:
                http_response_code(400);
                echo json_encode(['error' => 'Action inconnue']);
                break;
        }
    }

    public function displayContent()
    {
        return $this->controller->displayContent();
    }
}