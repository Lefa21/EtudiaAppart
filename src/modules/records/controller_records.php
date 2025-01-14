<?php

require_once 'modele_records.php';
require_once 'vue_records.php';

class ControllerRecords
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "monDossier";
        $this->modele = new ModeleRecords();
        $this->vue = new VueRecords();
    }

    function getUserId($email)
    {
        $query = "
        SELECT 
            u.id_user, u.email
        FROM 
            User u
        WHERE 
            u.email = :email
    ";
        $stmt = Connexion::getBdd()->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id_user'];
    }

    public function getAction()
    {
        return $this->action;
    }

    public function monDossier()
    {
        $_SESSION['userId'] = $this->getUserId($_SESSION['identifiant_utilisateur']);
        $userInfo = $this->modele->getUserData();
        $documents = $this->modele->fetchUserDocuments();
        $this->vue->monDossier($userInfo, $documents);
    }

    public function updateUserDocument()
    {
        $this->modele->updateUserDocument();
    }

    public function deleteFile()
    {
        $this->modele->deleteFile();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
