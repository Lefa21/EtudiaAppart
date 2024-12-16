<?php

include_once 'vue_Profil.php';

class ControllerProfil
{
    private $action;
    private $vue;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "Profil";
        $this->vue = new VueProfil();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function profil()
    {
        $this->vue->profil(); // Génère le contenu de la vue
    }

    public function displayContent()
    {
        return $this->vue->getAffichage(); // Retourne le contenu capturé
    }
}
