<?php

require_once 'modele_settings.php';
require_once 'vue_settings.php';
require_once __DIR__  . '/../../connexion.php';

class ContSettings
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->vue = new VueSettings();
        $this->modele = new ModeleSettings();
        $this->action = isset($_GET['action']) ? $_GET['action'] : 'showSettingsPage';
    }

    public function showSettingsPage(){
        $this->vue->showSettingsPage();
    }

    public function getAction(){
        return $this->action;
    }
    public function displayContent()
    {
        return $this->vue->getAffichage();
    }
}