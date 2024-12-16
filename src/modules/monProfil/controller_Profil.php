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
        $this->vue->Profil();
    }

    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}