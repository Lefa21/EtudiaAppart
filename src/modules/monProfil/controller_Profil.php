<?php

require_once 'vue_Profil.php';
require_once __DIR__  . '/../../connexion.php';
require_once 'modele_Profil.php';

class ControllerProfil
{
    private $action;
    private $vue;
    private $modele;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "Profil";
        $this->modele = new ModeleProfil();
        $this->vue = new VueProfil();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function profil($emailIdentification)
    {

        $userData = $this->modele->getUserData($emailIdentification);
        $this->vue->profil($userData);
    }
    

public function handleAjaxRequest($emailIdentification)
{
    $requestData = json_decode(file_get_contents('php://input'), true);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($requestData['action'])) {

         switch ($requestData['action']) {
                case 'updateProfile':
                $data = $requestData['data'];
                $updateSuccess = $this->modele->updateUserData($data);

                if (!empty($data['newPassword'])) {
                    if ($data['newPassword'] === $data['confirmPassword']) {
                        $passwordSuccess = $this->modele->updatePassword($emailIdentification, $data['newPassword']);
                        $updateSuccess = $updateSuccess && $passwordSuccess;
                    } else {
                        echo json_encode(['success' => false, 'error' => 'Les mots de passe ne correspondent pas.']);
                        return;
                    }
                }
                echo json_encode(['success' => $updateSuccess]);
                break;
/*
                default:
                    http_response_code(400);
                    echo json_encode(['error' => 'Action inconnue']);
                    */
            }

            $updatedUserData = $this->modele->getUserData($emailIdentification);
            echo json_encode([
                'success' => $updateSuccess,
                'userData' => $updatedUserData
            ]);

    } else {
        /*
        http_response_code(400);
        echo json_encode(['error' => 'Requête invalide']);
        */
    }
}

    public function displayContent()
    {
        return $this->vue->getAffichage(); // Retourne le contenu capturé
    }
}
