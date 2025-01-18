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

        if(isset($_POST['submit']) && $_POST["update_profil"]){
            $this->modele->updateUserData();
        }else{
            $userData = $this->modele->getUserData($emailIdentification);
            $this->vue->profil($userData);
        }
    }


    public function displayContent()
    {
        return $this->vue->getAffichage(); // Retourne le contenu capturé
    }
}
