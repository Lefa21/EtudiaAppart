<?php

include_once 'modele_annonce.php';
include_once 'vue_annonce.php';

class ControllerAnnonce
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->vue = new VueAnnonce();
        $this->modele = new ModeleAnnonce();
        $this->action = $_GET['action'] ?? "annoncePage";
    }

    public function getAction()
    {
        return $this->action;
    }

    public function annoncePage($annonceId)
    {
        $data = $this->modele->getAnnonce($annonceId);
        return $this->vue->annoncePage($data);
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
