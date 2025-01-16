<?php

include_once 'modele_annonce.php';
include_once 'vue_annonce.php';

class ControllerAnnonce
{
    private $action;
    private $vue;

    public function __construct()
    {
        $this->action = $_GET['action'] ?? "annoncePage";
        $this->vue = new VueAnnonce();
    }

    public function getAction()
    {
        return $this->action;
    }

    public function annoncePage()
    {
        $this->vue->annoncePage();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}
