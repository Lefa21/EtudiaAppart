<?php

require_once 'vue_Profil.php';
require_once __DIR__ . '/../../connexion.php';
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
        $requestData = json_decode(file_get_contents('php://input'), true);
      if(isset($requestData['action']) && $requestData['action'] == "updateProfil"){
        $this->handleAjaxRequest($emailIdentification);
      }
      else{
        $userData = $this->modele->getUserData($emailIdentification);
        $this->vue->profil($userData);
      } 
    }

    public function handleAjaxRequest($emailIdentification)
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($requestData['action'])) {
                $data = $requestData['data'];

                // Validez les champs obligatoires
                $requiredFields = ['last_name', 'first_name', 'email', 'mobile_number', 'gender', 'address_line', 'zipcode', 'city', 'country', 'school_name', 'student_email'];
                foreach ($requiredFields as $field) {
                    if (!isset($data[$field])) {
                        echo json_encode(['success' => false, 'error' => "Le champ {$field} est requis."]);
                        return;
                    }
                }

                // Vérifiez les mots de passe
                if (!empty($data['newPassword']) && $data['newPassword'] !== $data['confirmPassword']) {
                    echo json_encode(['success' => false, 'error' => 'Les mots de passe ne correspondent pas.']);
                    return;
                }

                // Mettre à jour les données utilisateur
                $updateSuccess = $this->modele->updateUserData($data);
                if (!empty($data['newPassword'])) {
                    $passwordSuccess = $this->modele->updatePassword($emailIdentification, $data['newPassword']);
                    $updateSuccess = $updateSuccess && $passwordSuccess;
                }

                if ($updateSuccess) {
                    $updatedUserData = $this->modele->getUserData($emailIdentification);
                    echo json_encode(['success' => true, 'userData' => $updatedUserData]);
                } else {
                    echo json_encode(['success' => false, 'error' => 'Échec de la mise à jour.']);
                }
                return;
        
        }else{
            http_response_code(400);
            echo json_encode(['error' => 'Requête invalide ou action inconnue.']);
        }

    }

    public function displayContent()
    {
        return $this->vue->getAffichage(); // Retourne le contenu capturé
    }
}
